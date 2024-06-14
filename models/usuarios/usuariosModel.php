<?php
require ("../../models/conexion.php");

$call = isset($_POST["call"]) ? $_POST["call"] : '';

$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
$apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : '';
$usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : '';
$estado = isset($_POST["estado"]) ? $_POST["estado"] : '1';

$id_cliente = isset($_POST["id_cliente"]) ? $_POST["id_cliente"] : 0;
$pass = isset($_POST["pass"]) ? $_POST["pass"] : '';
$id_usuario = isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : '';
$activo = isset($_POST["activo"]) ? $_POST["activo"] : '';
$id_perfil = isset($_POST["id_perfil"]) ? $_POST["id_perfil"] : '';
$id_usuario = isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : '';



switch ($call) {
    case "getUsuarios":
        try {
            $tsql = "SELECT u.id_usuario, u.nombre as nombre_usuario , u.apellido, u.usuario, u.id_perfil, p.nombre, u.estado,
             cli.nombre as nombre_cliente, u.id_cliente, p.nombre as nombre_perfil, u.password
            FROM [adminavl].[dbo].[usuario] u
            left JOIN [adminavl].[dbo].[perfil] p ON u.id_perfil = p.id_perfil
            left JOIN [adminavl].[dbo].[cliente] cli ON cli.id_cliente = u.id_cliente;";

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
    case "getPerfil":
        try {
            $tsql = "SELECT [id_perfil],[nombre]
                    FROM [adminavl].[dbo].[perfil]";

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
    case "agregarUsuario":
        try {
            $tsql = "INSERT INTO [adminavl].[dbo].[usuario] (nombre, apellido, usuario, password, id_perfil, estado, id_cliente, token)
                            VALUES ('$nombre', '$apellido', '$usuario', '$pass', $id_perfil, $estado, $id_cliente, 1);";

            $result = sqlsrv_query($conexion, $tsql);
            $arr_msg = array();
            if ($result) {
                $arr_msg[] = array('mensaje' => 'Usuario agregado correctamente.');
            }
            echo json_encode($arr_msg);
        } catch (PDOException $e) {
            die("Error connecting to SQL Server");
        } finally {
            sqlsrv_close($conexion);
        }
        break;
    case "consultaUsuario":
        try {
            $arr_msg = array();
            $consulta = "SELECT * FROM [adminavl].[dbo].[usuario] WHERE usuario='$usuario'";
            $resultado = sqlsrv_query($conexion, $consulta, array(), array("Scrollable" => "buffered"));

            if (sqlsrv_num_rows($resultado) == 0) {
                $arr_msg[] = array('mensaje' => 1);

            } else if (sqlsrv_num_rows($resultado) > 0) {
                $arr_msg[] = array('error' => 0);
            }


            echo json_encode($arr_msg);
        } catch (PDOException $e) {
            die("Error connecting to SQL Server");
        } finally {
            sqlsrv_close($conexion);
        }
        break;
    case "editarUsuario":
        try {
            $tsql = "UPDATE usuario
                        SET nombre = '$nombre',
                            apellido = '$apellido',
                            usuario = '$usuario',
                            password = '$pass',
                            id_perfil = $id_perfil,
                            id_cliente = $id_cliente,
                            estado = $estado
                        WHERE id_usuario = '$id_usuario'";

            $result = sqlsrv_query($conexion, $tsql);
            $arr_msg = array();
            if ($result) {
                $arr_msg[] = array('mensaje' => 'Usuario actualizado correctamente.');
            }
            echo json_encode($arr_msg);
        } catch (PDOException $e) {
            die("Error connecting to SQL Server");
        } finally {
            sqlsrv_close($conexion);
        }
        break;
    case "eliminarUsuario":
        try {
            $tsql = "UPDATE usuario
                            SET estado = 0
                            WHERE id_usuario = $id_usuario;";

            $result = sqlsrv_query($conexion, $tsql);
            $arr_msg = array();
            if ($result) {
                $arr_msg[] = array('mensaje' => 'Usuario suspendido correctamente.');
            }
            echo json_encode($arr_msg);
        } catch (PDOException $e) {
            die("Error connecting to SQL Server");
        } finally {
            sqlsrv_close($conexion);
        }
        break;



}

?>