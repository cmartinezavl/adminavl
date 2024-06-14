<?php 
require("../../models/conexion.php");
include('wialon.php');
$wialon_api = new Wialon();

$call = isset($_POST["call"]) ? $_POST["call"] : '';
$id_wialon = isset($_POST["id_wialon"]) ? $_POST["id_wialon"] : '';
$id_speedgps = isset($_POST["id_speedgps"]) ? $_POST["id_speedgps"] : '';
$estado_wialon = isset($_POST["estado_wialon"]) ? $_POST["estado_wialon"] : '';
$estado_speedgps = isset($_POST["estado_speedgps"]) ? $_POST["estado_speedgps"] : '';
$estado = isset($_POST["estado"]) ? $_POST["estado"] : '';
$id_vehiculo = isset($_POST["id_vehiculo"]) ? $_POST["id_vehiculo"] : '';
$imei = isset($_POST["imei"]) ? $_POST["imei"] : '';
$codigo_vehiculo = isset($_POST["codigo_vehiculo"]) ? $_POST["codigo_vehiculo"] : '';
$patente_speed = isset($_POST["patente_speed"]) ? $_POST["patente_speed"] : '';

switch ($call) {
    case "getClientes":
        try {
            $tsql = "SELECT *
            FROM estado_cliente
            ORDER BY estado DESC;"; 
                                
            $result = sqlsrv_query( $conexion,  $tsql);

            $arr = array();
            while($rows = sqlsrv_fetch_object($result) ) {
                $arr[] = $rows;
            }

            echo json_encode($arr);
                    
        }
        catch( PDOException $e ) { 
            die( "Error connecting to SQL Server" );   
        } finally {
            sqlsrv_close( $conexion );
        }
        break;
    case "getVehiculos":
        try {
            $tsql = "SELECT vw.imei, vw.cod_avl, vw.patente, vw.wialon_status, vw.id_vwialon, vs.vehiculo,
            CASE WHEN vs.vehiculo IS NULL THEN 0 ELSE 1 END AS existe
            FROM vehiculos vw
            LEFT JOIN speedarauco.dbo.vehiculos vs ON vs.user_name = imei
            WHERE vw.id_cuenta_wialon = $id_wialon"; 
                                
            $result = sqlsrv_query( $conexion,  $tsql);

            $arr = array();
            while($rows = sqlsrv_fetch_object($result) ) {
                $arr[] = $rows;
            }

            echo json_encode($arr);
        }
        catch( PDOException $e ) { 
            die( "Error connecting to SQL Server" );   
        } finally {
            sqlsrv_close( $conexion );
        }
        break;
    case "setTodos":
        try {
            $token = '20d68fa2fe1299077788f889307156303CD58EDFB7E8B09C0C6E5676CEEDEA8B657E108F';
            $wialon_api->login($token);
            
            $estado_final = 0;

            $tsql = "UPDATE estado_cliente
                SET est_wialon = $estado,
                    est_speedgps = $estado
                WHERE id_wialon = $id_wialon;";
            sqlsrv_query( $conexion,  $tsql);

            $tsql2 = "SELECT TOP 1 * 
                    FROM estado_cliente
                    WHERE id_wialon = $id_wialon;";
            $result2 = sqlsrv_query( $conexion,  $tsql2);

            $response = array();
            while($rows = sqlsrv_fetch_object($result2) ) {
                $response[] = $rows;
            }

            foreach($response as $value){
                
                if($value->est_wialon == 1 && $value->est_speedgps == 1){
                    $estado_final = 2;
                }
                if($value->est_wialon == 0 && $value->est_speedgps == 0){
                    $estado_final = 0;
                }

            }

            if($estado_wialon != $estado){
                
                $datas = json_decode($wialon_api->core_search_items('{"spec":{"itemsType":"avl_unit","propName":"sys_billing_account_guid","propValueMask":"*'.$id_wialon.'*","sortType":"sys_billing_account_guid"},"force":1,"flags":385,"from":0,"to":500}},"flags":0}'), true);
                
                foreach($datas['items'] as $data){

                    $codigot = isset($data['aflds'][1]['v']) ? $data['aflds'][1]['v'] : '';
                    $id = $data['id'];
                    $imei = $data['uid'];
                    $activo = $data['act'];
                    $idEmnify = '';
                    $iccidOrion = '';

                    switch ($estado) {
                        case 0:
                            if($activo == 0){

                                $tsql3 = "INSERT INTO vehiculos_off (imei, estado, id_wialon)
                                VALUES ('$imei', $activo, $id_wialon);"; 
                                sqlsrv_query( $conexion,  $tsql3);

                            }

                            if($activo == 1){
                                $wialon_api->unit_set_active('{"itemId":'.$id.',"active":0}');
                                $tsql3 = "UPDATE vehiculos
                                            SET wialon_status = 0
                                            WHERE imei = '$imei' ;"; 
                                sqlsrv_query( $conexion,  $tsql3);
                            }

                            break;


                        case 1:


                            
                            $tsql4 = "SELECT COUNT(1) as cant FROM vehiculos_off WHERE imei = '$imei';";
                            $result_off = sqlsrv_query( $conexion,  $tsql4);

                            $vehiculosOff = array();
                            while($rows = sqlsrv_fetch_object($result_off) ) {

                                if ($rows->cant > 0) {
                                    $tsql5 = "DELETE FROM vehiculos_off
                                            WHERE imei = '$imei';";
                                    sqlsrv_query( $conexion,  $tsql5);

                                } else {
                                    $wialon_api->unit_set_active('{"itemId":'.$id.',"active":1}');
                                    $tsql3 = "UPDATE vehiculos
                                                SET wialon_status = 1
                                                WHERE imei = '$imei' ;"; 
                                    sqlsrv_query( $conexion,  $tsql3);
                                    
                                }

                            }
                            break;
                    }

                }
            }

            if($estado_speedgps != $estado){
                switch($estado){
                    case 0:
                        require("../../models/conexionmysql.php");
                        $sql = "UPDATE vehiculos
                                SET activo = 0 
                                WHERE id_emsefor IN(".$id_speedgps.")
                                AND estado_cliente = 1;";
                        $conn->query($sql);
                        
                        $tsql = "UPDATE speedarauco.dbo.vehiculos
                                SET activo = 0 
                                WHERE id_emsefor IN(".$id_speedgps.")
                                AND estado_cliente = 1;";
                        sqlsrv_query( $conexion,  $tsql);
                        
                        break;
                    case 1:
                        require("../../models/conexionmysql.php");
                        $sql = "UPDATE vehiculos 
                                SET activo = 1 
                                WHERE id_emsefor IN(".$id_speedgps.")
                                AND estado_cliente = 1;";
                        $conn->query($sql);
                                
                        $tsql = "UPDATE speedarauco.dbo.vehiculos 
                                SET activo = 1 
                                WHERE id_emsefor IN(".$id_speedgps.")
                                AND estado_cliente = 1;";
                        sqlsrv_query( $conexion,  $tsql);
                        break;
                }
            }

            $tsql6 = "UPDATE estado_cliente
                SET estado = $estado_final
                WHERE id_wialon = $id_wialon;";
            $result_estadofinal = sqlsrv_query( $conexion,  $tsql6);

            $arr_msg = array();
            if($result_estadofinal) {
                if($estado == 1){
                    $arr_msg[] = array('mensaje' => 'Wialon y Speedgps activados correctamente.');
                }
                if($estado == 0){
                    $arr_msg[] = array('mensaje' => 'Wialon y Speedgps desactivados correctamente.');
                    
                }
            }
            echo json_encode($arr_msg);
            $wialon_api->logout();

        }
        catch( PDOException $e ) { 
            die( "Error connecting to SQL Server" );   
        } finally {
            sqlsrv_close( $conexion );
        }
        break;
    case "setWialon":
        try {

            $token = '20d68fa2fe1299077788f889307156303CD58EDFB7E8B09C0C6E5676CEEDEA8B657E108F';
            // include 'C:\inetpub\wwwroot\Wialon\token.php';
            $wialon_api->login($token);
            
            $estado_final = 0;

            $tsql = "UPDATE estado_cliente
                SET est_wialon = $estado
                WHERE id_wialon = $id_wialon;";
            sqlsrv_query( $conexion,  $tsql);

            $tsql2 = "SELECT TOP 1 * 
                    FROM estado_cliente
                    WHERE id_wialon = $id_wialon;";
            $result_update = sqlsrv_query( $conexion,  $tsql2);

            $response = array();
            while($rows = sqlsrv_fetch_object($result_update) ) {
                $response[] = $rows;
            }

            foreach($response as $value){
                
                if($value->id_speedgps == 0){
                    if($value->est_wialon == 0){
                        $estado_final = 0;
                    }
                    if($value->est_wialon == 1){
                        $estado_final = 2;
                    }
                }else{
                    if($value->est_wialon == 1 && $value->est_speedgps == 1){
                        $estado_final = 2;
                    }
                    if($value->est_wialon == 0 && $value->est_speedgps == 1){
                        $estado_final = 1;
                    }
                    if($value->est_wialon == 1 && $value->est_speedgps == 0){
                        $estado_final = 1;
                    }
                    if($value->est_wialon == 0 && $value->est_speedgps == 0){
                        $estado_final = 0;
                    }
                }
            }
            
            $datas = json_decode($wialon_api->core_search_items('{"spec":{"itemsType":"avl_unit","propName":"sys_billing_account_guid","propValueMask":"*'.$id_wialon.'*","sortType":"sys_billing_account_guid"},"force":1,"flags":385,"from":0,"to":0}},"flags":0}'), true);
            
            foreach($datas['items'] as $data){
                $id = $data['id'];
                $imei = $data['uid'];
                $activo = $data['act'];

                switch ($estado) {
                    
                    case 0:
                        
                        if($activo == 0){
                            $tsql3 = "INSERT INTO vehiculos_off (imei, estado, id_wialon)
                            VALUES ('$imei', $activo, $id_wialon);"; 
                            sqlsrv_query( $conexion,  $tsql3);
                        }

                        if($activo == 1){
                            $wialon_api->unit_set_active('{"itemId":'.$id.',"active":0}');
                            $tsql3 = "UPDATE vehiculos
                                        SET wialon_status = 0
                                        WHERE imei = '$imei' ;"; 
                            sqlsrv_query( $conexion,  $tsql3);
                        }
                        
                        break;
                    case 1:
                        $tsql4 = "SELECT COUNT(1) as cant FROM vehiculos_off WHERE imei = '$imei';";
                        $result_off = sqlsrv_query( $conexion,  $tsql4);

                        $vehiculosOff = array();
                        while($rows = sqlsrv_fetch_object($result_off) ) {
                            if ($rows->cant > 0) {
                                $tsql5 = "DELETE FROM vehiculos_off
                                        WHERE imei = '$imei';";
                                sqlsrv_query( $conexion,  $tsql5);

                            } else {
                                $wialon_api->unit_set_active('{"itemId":'.$id.',"active":1}');
                                $tsql3 = "UPDATE vehiculos
                                            SET wialon_status = 1
                                            WHERE imei = '$imei';"; 
                                sqlsrv_query( $conexion,  $tsql3);
                                

                            }
                        }
                        break;
                }

            }

            $tsql6 = "UPDATE estado_cliente
                SET estado = $estado_final
                WHERE id_wialon = $id_wialon;";
            $result_estadofinal = sqlsrv_query( $conexion,  $tsql6);

            $arr_msg = array();
            if($result_estadofinal) {
                if($estado == 1){
                    $arr_msg[] = array('mensaje' => 'Wialon activado correctamente.');
                }
                if($estado == 0){
                    $arr_msg[] = array('mensaje' => 'Wialon desactivado correctamente.');
                    
                }
            }
            $wialon_api->logout();

            echo json_encode($arr_msg);

        }
        catch( PDOException $e ) { 
            die( "Error connecting to SQL Server" );   
        } finally {
            sqlsrv_close( $conexion );
        }
        break;

    case "setSpeedgps":
        try {
            $estado_final = 0;

            $tsql = "UPDATE estado_cliente
                SET est_speedgps = $estado
                WHERE id_speedgps = '$id_speedgps';";
            $result = sqlsrv_query( $conexion,  $tsql);

            $tsql2 = "SELECT * 
                    FROM estado_cliente
                    WHERE id_speedgps = '$id_speedgps';";
            $result_update = sqlsrv_query( $conexion,  $tsql2);
            $response = array();
            while($rows = sqlsrv_fetch_object($result_update) ) {
                $response[] = $rows;
            }

            foreach($response as $value){
                if($value->est_wialon == 1 && $value->est_speedgps == 1){
                    $estado_final = 2;
                }
                if($value->est_wialon == 0 && $value->est_speedgps == 1){
                    $estado_final = 1;
                }
                if($value->est_wialon == 1 && $value->est_speedgps == 0){
                    $estado_final = 1;
                }
                if($value->est_wialon == 0 && $value->est_speedgps == 0){
                    $estado_final = 0;
                }
            }

            switch($estado){
                case 0:
                    require("../../models/conexionmysql.php");
                    $sql = "UPDATE speedarauco.vehiculos
                            SET activo = 0 
                            WHERE id_emsefor IN(".$id_speedgps.");";
                    $conn->query($sql);
                    
                    $tsql = "UPDATE speedarauco.dbo.vehiculos
                            SET activo = 0 
                            WHERE id_emsefor IN(".$id_speedgps.");";
                    sqlsrv_query( $conexion,  $tsql);
                    break;
                case 1:
                    require("../../models/conexionmysql.php");
                    $sql = "UPDATE speedarauco.vehiculos 
                            SET activo = 1 
                            WHERE id_emsefor IN(".$id_speedgps.")
                            AND estado_cliente = 1;";
                    $conn->query($sql);
                            
                    $tsql = "UPDATE speedarauco.dbo.vehiculos 
                            SET activo = 1 
                            WHERE id_emsefor IN(".$id_speedgps.")
                            AND estado_cliente = 1;";
                    sqlsrv_query( $conexion,  $tsql);
                    break;
            }

            
            $tsql3 = "UPDATE estado_cliente
                SET estado = $estado_final
                WHERE id_speedgps = '$id_speedgps';";
            $result_estadofinal = sqlsrv_query( $conexion,  $tsql3);

            $arr_msg = array();
            if($result_estadofinal) {
                if($estado == 1){
                    $arr_msg[] = array('mensaje' => 'Speedgps activado correctamente.');
                }
                if($estado == 0){
                    $arr_msg[] = array('mensaje' => 'Speedgps desactivado correctamente.');
                    
                }
            }
            echo json_encode($arr_msg);

        }
        catch( PDOException $e ) { 
            die( "Error connecting to SQL Server" );   
        } finally {
            sqlsrv_close( $conexion );
        }
        break;
    case "setVehiculo":
        try{  
            $token = '20d68fa2fe1299077788f889307156303CD58EDFB7E8B09C0C6E5676CEEDEA8B657E108F';
            $wialon_api->login($token);
            $idEmnify = '';
            $iccidOrion = '';
            $arr_msg = array();
            
            if($estado == 0){
                
                $wialon_api->unit_set_active('{"itemId":'.$id_vehiculo.',"active":0}');
                $tsql = "UPDATE vehiculos
                            SET wialon_status = 0
                            WHERE imei = '$imei' ;"; 

                if(sqlsrv_query( $conexion,  $tsql)){

                    if($patente_speed != ''){
                        require("../../models/conexionmysql.php");
                        $sqlMysql = "UPDATE speedarauco.vehiculos
                                SET activo = 0, 
                                estado_cliente = 0
                                WHERE user_name = '$imei';";
                        $conn->query($sqlMysql);
                        
                        $tsqlServer = "UPDATE speedarauco.dbo.vehiculos
                                SET activo = 0,
                                estado_cliente = 0 
                                WHERE user_name = '$imei';";
                        sqlsrv_query( $conexion,  $tsqlServer);
                    }

                    $datas = json_decode($wialon_api->core_search_items('{"spec":{"itemsType":"avl_unit","propName":"sys_billing_account_guid","propValueMask":"*'.$id_wialon.'*","sortType":"sys_billing_account_guid"},"force":1,"flags":385,"from":0,"to":500}},"flags":0}'), true);
                    $count = 0;
                    $resCount = 0;
                    foreach($datas['items'] as $data){
                        $act = $data['act'];
                        $count++;
                        if($act == 0){
                            $resCount++;
                        }
                    }

                    if($count == $resCount){

                        $estado_final = 0;

                        $tsqlDesac = "UPDATE estado_cliente
                        SET est_wialon = 0
                        WHERE id_wialon = $id_wialon;";
                        sqlsrv_query( $conexion,  $tsqlDesac);

                        $tsql2 = "SELECT TOP 1 * 
                            FROM estado_cliente
                            WHERE id_wialon = $id_wialon;";
                        $result_update = sqlsrv_query( $conexion,  $tsql2);

                        $response = array();
                        while($rows = sqlsrv_fetch_object($result_update) ) {
                            $response[] = $rows;
                        }

                        foreach($response as $value){
                        
                            if($value->id_speedgps == 0){
                                if($value->est_wialon == 0){
                                    $estado_final = 0;
                                }
                            }else{
                                if($value->est_wialon == 0 && $value->est_speedgps == 1){
                                    $estado_final = 1;
                                }
                                if($value->est_wialon == 0 && $value->est_speedgps == 0){
                                    $estado_final = 0;
                                }
                            }
                        }

                        $tsqlEstado = "UPDATE estado_cliente
                        SET estado = $estado_final
                        WHERE id_wialon = $id_wialon;";
                        sqlsrv_query( $conexion,  $tsqlEstado);
                    }

                    $arr_msg[] = array('mensaje' => 'Vehiculo desactivado correctamente.');
                }
                
            }else if($estado == 1){
            
                $wialon_api->unit_set_active('{"itemId":'.$id_vehiculo.',"active":1}');
                $tsql2 = "UPDATE vehiculos
                            SET wialon_status = 1
                            WHERE imei = '$imei' ;"; 

                if(sqlsrv_query( $conexion,  $tsql2)){

                    if($patente_speed != ''){
                        require("../../models/conexionmysql.php");
                        $sqlMysql = "UPDATE speedarauco.vehiculos
                                SET activo = 1, 
                                estado_cliente = 1
                                WHERE user_name = '$imei';";
                        $conn->query($sqlMysql);
                        
                        $tsqlServer = "UPDATE speedarauco.dbo.vehiculos
                                SET activo = 1,
                                estado_cliente = 1 
                                WHERE user_name = '$imei';";
                        sqlsrv_query( $conexion,  $tsqlServer);
                    }

                    $datas = json_decode($wialon_api->core_search_items('{"spec":{"itemsType":"avl_unit","propName":"sys_billing_account_guid","propValueMask":"*'.$id_wialon.'*","sortType":"sys_billing_account_guid"},"force":1,"flags":385,"from":0,"to":500}},"flags":0}'), true);
                    $count = 0;

                    foreach($datas['items'] as $data){
                        $act = $data['act'];
                        if($act == 1){
                            $count++;
                        }
                    }

                    if($count == 1){

                        $estado_final = 0;

                        $tsqlActi = "UPDATE estado_cliente
                        SET est_wialon = 1
                        WHERE id_wialon = $id_wialon;";
                        sqlsrv_query( $conexion,  $tsqlActi);

                        $tsql2 = "SELECT TOP 1 * 
                            FROM estado_cliente
                            WHERE id_wialon = $id_wialon;";
                        $result_update = sqlsrv_query( $conexion,  $tsql2);

                        $response = array();
                        while($rows = sqlsrv_fetch_object($result_update) ) {
                            $response[] = $rows;
                        }

                        foreach($response as $value){
                    
                            if($value->id_speedgps == 0){
                                
                                if($value->est_wialon == 1){
                                    $estado_final = 2;
                                }

                            }else{
                                if($value->est_wialon == 1 && $value->est_speedgps == 1){
                                    $estado_final = 2;
                                }
                                if($value->est_wialon == 1 && $value->est_speedgps == 0){
                                    $estado_final = 1;
                                }
                            }
                        }

                        $tsqlEstado = "UPDATE estado_cliente
                        SET estado = $estado_final
                        WHERE id_wialon = $id_wialon;";
                        sqlsrv_query( $conexion,  $tsqlEstado);
                    }

                    $arr_msg[] = array('mensaje' => 'Vehiculo activado correctamente.');

                }

                
            }

            echo json_encode($arr_msg);

            $wialon_api->logout();
        }catch( PDOException $e ) { 
            die( "Error connecting to SQL Server" );   
        } finally {
            sqlsrv_close( $conexion );
        }
        break;
    
    
}