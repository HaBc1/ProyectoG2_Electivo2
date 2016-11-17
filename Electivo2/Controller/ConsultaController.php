<?php
require_once '../Modelo/ModeloConsulta.php';
if (isset($_POST["btnguardar"])){
    $id_cita = $_POST["txtidcita"];
    $estado_consulta = $_POST["cbestado"];
    
    $db = ConsultaDAO::getInstancia();
    $respuesta = $db->InsertaConsulta($id_cita,$estado_consulta);
    if ($respuesta == 1){
        echo "<script>alert('Consulta Registrada Con exito'); window.location='../View/consulta/listaconsulta.php';</script>";
        //header("location: ../View/persona/listarpersona.php");
    }
    else {}
}
if (isset($_POST["btnbuspa"])){
    header("location: ../View/consulta/listaconsulta.php");

}
?>
