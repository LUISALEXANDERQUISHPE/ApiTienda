<?php
include_once "../Models/tineda.php";

#OBTIENE EL MÉTODO 
$opc = $_SERVER['REQUEST_METHOD'];

#OBTIENE UNA VARIABLE PARA RECONOCER EL CRUD DE QUE ES
$action = $_GET["action"];
switch ($opc) {
        #OBTENER
    case 'GET':
        switch ($action) {
            case 'obtener':
                Tienda::obtener();
                break;
            default:
                # code...
                break;
        }
        break;
        #CREAR
    case 'POST':
        switch ($action) {
            case 'producto':
                Tienda::guardar();
                break;

            default:
                # code...
                break;
        }
        break;
        #EDITAR
    case 'PUT':
        switch ($action) {
            case 'editar':
                Tienda::editar();
                break;
            case 'editarCantidad':
                Tienda::editarCantidad();
                break;
            default:
                # code...
                break;
        }
        break;
        #ELIMINAR
    case 'DELETE':
        switch ($action) {
            case 'eliminar':
                Tienda::borrar();
                break;
            default:
                # code...
                break;
        }
        break;
    default:
        # code...
        break;
}
