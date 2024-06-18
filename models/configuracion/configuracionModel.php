<?php 
require("../../models/conexion.php");

$call = isset($_POST["call"]) ? $_POST["call"] : '';
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
$apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : '';
$pass = isset($_POST["pass"]) ? $_POST["pass"] : '';
$password_new = isset($_POST["password_new"]) ? $_POST["password_new"] : '';
$id_usuario = isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : 0;

switch($call){
    case 'cargaDatos':
        try {
            $sql = "SELECT nombre, apellido FROM usuario WHERE id_usuario = $id_usuario";
            $res = sqlsrv_query( $conexion, $sql);
            $arr = array();
            while($rows = sqlsrv_fetch_object($res) ) {
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
    case 'verificarContraseña':
        try {
            $sql = "SELECT CASE WHEN password = '".md5($pass)."' THEN 1 ELSE 0 END AS verificado FROM usuario WHERE id_usuario = $id_usuario";
            $res = sqlsrv_query( $conexion, $sql);
            $arr = array();
            while($rows = sqlsrv_fetch_object($res) ) {
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
    case 'actualizarDatos':
        try {
            $sql = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido' WHERE id_usuario = $id_usuario";
            if(sqlsrv_query($conexion, $sql)){
                echo json_encode(array('mensaje' => 'Perfil actualizado'));
            }
        }
        catch( PDOException $e ) { 
            die( "Error connecting to SQL Server" );   
        } finally {
            sqlsrv_close( $conexion );
        }
        break;
    case 'actualizarContrasena':
        try {
            $sql = "UPDATE usuario SET password = '".md5($password_new)."' WHERE id_usuario = $id_usuario";
            if(sqlsrv_query($conexion, $sql)){
                echo json_encode(array('mensaje' => 'Contraseña actualizada'));
            }
        }
        catch( PDOException $e ) { 
            die( "Error connecting to SQL Server" );   
        } finally {
            sqlsrv_close( $conexion );
        }
        break;
    
    
}