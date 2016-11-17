<?php
require_once '../Modelo/ModeloPaciente.php';
if (isset($_POST["btnGuardar"])){
    $id_paciente = $_POST["txtidpaciente"];
    $db = PacienteDAO::getInstancia();
    $respuesta = $db->InsertaPaciente($id_paciente);
    if ($respuesta == 1){
        header("location: ../View/paciente/listapaciente.php");
    }
    else {}
}
if (isset($_POST["btnRegresar"])){
     header("location: ../View/paciente/listapaciente.php");
}
?>

