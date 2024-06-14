<?php
require ("../../models/conexion.php");

$call = isset($_POST["call"]) ? $_POST["call"] : '';

$id = isset($_POST["id"]) ? $_POST["id"] : '';
$nombre_fantasia = isset($_POST["nombre_fantasia"]) ? $_POST["nombre_fantasia"] : '';

switch ($call) {
    case "getCliente":
        try {
            $tsql = "SELECT id_cliente, nombre FROM [adminavl].[dbo].[cliente] WHERE estado = 1;";

            $result = sqlsrv_query($conexion, $tsql);
            $arr = array();
            while ($rows = sqlsrv_fetch_object($result)) {
                $arr[] = $rows;
            }
            echo json_encode($arr);
        } catch (PDOException $e) {
            die("Error connecting to SQL Server");
        } finally {
            sqlsrv_close($conexion);
        }
        break;
    case "getModelo":
        try {
            $tsql = "SELECT id_modelo, nombre FROM [adminavl].[dbo].[modelo];";

            $result = sqlsrv_query($conexion, $tsql);
            $arr = array();
            while ($rows = sqlsrv_fetch_object($result)) {
                $arr[] = $rows;
            }
            echo json_encode($arr);
        } catch (PDOException $e) {
            die("Error connecting to SQL Server");
        } finally {
            sqlsrv_close($conexion);
        }
        break;


}
?>