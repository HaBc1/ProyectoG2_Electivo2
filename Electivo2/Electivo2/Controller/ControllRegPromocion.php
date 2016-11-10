<?php
require_once '../Modelo/ModeloPromocion.php';
if (isset($_POST["btnGuardar"])){
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $inicio = $_POST["inicio"];
    $fin = $_POST["fin"];
        
    $db = PromocionDAO::getInstancia();
    $respuesta = $db->InsertaPromocion($nombre,$descripcion,$inicio,$fin);
    if ($respuesta == 1){
        header("location: ../View/promocion/listapromocion.php");
    }
    else {}
}
if (isset($_POST["btnRegresar"])){
     header("location: ../View/promocion/listapromocion.php");
}
?>


