<?php
require_once '../Modelo/ModeloArea.php';
if (isset($_POST["btnGuardar"])){
    $nombre = $_POST["nombre"];
    
    $db = AreaDAO::getInstancia();
    $respuesta = $db->InsertaArea($nombre);
    if ($respuesta == 1){
        header("location: ../View/area/listaarea.php");
    }
    else {}
}
if (isset($_POST["btnRegresar"])){
     header("location: ../View/area/listaarea.php");
}
?>

