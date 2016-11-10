<?php
require_once '../Modelo/ModeloConsulta.php';
if (isset($_POST["btnguardar"])){
    $id_cita = $_POST["txtidcita"];
    $estado_consulta = $_POST["cbestado"];
    
    $db = ConsultaDAO::getInstancia();
    $respuesta = $db->InsertaConsulta($id_cita,$estado_consulta);
    if ($respuesta == 1){
        echo "<script>alert('Consulta Registrada Con exito'); window.location='../index.php';</script>";
        //header("location: ../View/persona/listarpersona.php");
    }
    else {}
}
if (isset($_POST["btnbuspa"])){
     //header("location: ../View/persona/listarpersona.php");
    $db2 = ConsultaDAO::getInstancia();
    $respuesta2 =$db2->ListarCitaPaciente();

}
?>
