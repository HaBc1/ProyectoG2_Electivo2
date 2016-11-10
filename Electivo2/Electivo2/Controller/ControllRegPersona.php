<?php
require_once '../Modelo/ModeloPersona.php';
if (isset($_POST["btnGuardar"])){
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dni = $_POST["dni"];
    $direccion = $_POST["direccion"];
    $email = $_POST["email"];
    
    $db = PersonaDAO::getInstancia();
    $respuesta = $db->InsertaPersona($nombre,$apellido,$dni,$direccion,$email);
    if ($respuesta == 1){
        header("location: ../View/persona/listarpersona.php");
    }
    else {}
}
if (isset($_POST["btnRegresar"])){
     header("location: ../View/persona/listarpersona.php");
}
?>

