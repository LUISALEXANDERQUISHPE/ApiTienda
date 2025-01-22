<?php
include_once "conexion.php";
class Tienda
{


    public static function obtener()
    {
        $con = Conexion::conectar();
        $sql = "SELECT * FROM productos";
        $resultado = $con->prepare($sql);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($data));
    }
    public static function guardar()
    {
        $con = Conexion::conectar();
        $nombre = $_POST['nombre'];  // Usar $_POST en lugar de $_GET
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];

        $sql = "INSERT INTO productos (i nombre, precio, cantidad)
        VALUES ('$nombre',$precio,$cantidad)";

        $resultado = $con->prepare($sql);
        $resultado->execute();
    }
    public static function editar()
    {
        parse_str(file_get_contents("php://input"), $_PUT);
        $con = Conexion::conectar();
        $id = $_PUT['id'];
        $nombre =  $_PUT['nombre'];
        $precio =  $_PUT['precio'];
        $cantidad =  $_PUT['cantidad'];

        $sql = "UPDATE  productos SET nombre='$nombre',precio='$precio',cantidad='$cantidad'  WHERE id='$id'";
        $resultado = $con->prepare($sql);
        $resultado->execute();
        $data = json_encode("Se edito correctamente");
        print_r($data);
    }

    public static function editarCantidad()
    {
        parse_str(file_get_contents("php://input"), $_PUT);
        $con = Conexion::conectar();
        $id = $_PUT['id'];
        $cantidad =  $_PUT['cantidad'];

        $sql = "UPDATE  productos SET cantidad='$cantidad'  WHERE id='$id'";
        $resultado = $con->prepare($sql);
        $resultado->execute();
        $data = json_encode("Se edito lla cantidad correctamente");
        print_r($data);
    }
    public static function  borrar()
    {
        $objetoConexion = new Conexion();
        $conn = $objetoConexion->conectar();

        $id = $_GET['id'];
        $borrarEstudiante = "delete from productos where id ='$id' ";
        $result = $conn->prepare($borrarEstudiante);
        $result->execute();
        $dataJson = json_encode("Se elimino correctamente");
        print_r($dataJson);
    }
}
