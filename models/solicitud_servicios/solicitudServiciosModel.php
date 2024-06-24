<?php
require("../../models/conexion.php");

$call = isset($_POST['call']) ? $_POST['call'] : '';


switch ($call) {
    case "getCliente":
        try{

            $tsql = "SELECT id_cliente AS value, nombre AS label
            FROM cliente;";  
                                
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
    case "getEmpresa":
        try{

            $tsql = "SELECT CONCAT(id_empresa, ' - ', nombre) AS label
            FROM empresa;";  
                                
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
}