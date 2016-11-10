<?php
require_once '../Modelo/ModeloPaciente.php';
if (isset($_POST["btnGuardar"])){
    $persona = $_POST["persona"];
    
    $db = PacienteDAO::getInstancia();
    $respuesta = $db->InsertaPaciente($persona);
    if ($respuesta == 1){
        header("location: ../View/paciente/listapaciente.php");
    }
    else {}
}
if (isset($_POST["btnRegresar"])){
     header("location: ../View/paciente/listapaciente.php");
}
?>

