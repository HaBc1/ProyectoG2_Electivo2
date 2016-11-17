<?php
require_once '../Modelo/ModeloDentista.php';
if (isset($_POST["btnGuardar"])){
    $id_paciente = $_POST["txtidpaciente"];
    $especialidad = $_POST["especialidad"];
    $db = DentistaDAO::getInstancia();
    $respuesta = $db->InsertaDentista($id_paciente,$especialidad);
    if ($respuesta == 1){
     header("location: ../View/dentista/listadentista.php");
    }
    else {}
}
if (isset($_POST["btnRegresar"])){
     header("location: ../View/dentista/listadentista.php");
}
?>

