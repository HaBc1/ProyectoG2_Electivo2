<?php
require_once '../Modelo/ModeloCita.php';
if (isset($_POST["btnguardar"])){
    $id_paciente = $_POST["txtidpaciente"];
    $id_horario = $_POST["txtidturno"];
    $inicio_cita = $_POST["txt_inicio_cita"];
    $fin_cita = $_POST["txt_fin_cita"];
    $estado_cita = $_POST["cbestado"];
    
    $db = CitaDAO::getInstancia();
    $respuesta = $db->InsertaCita($id_paciente,$id_horario,$inicio_cita,$fin_cita,$estado_cita);
    if ($respuesta == 1){
        echo "<script>alert('Cita Registrada Con exito'); window.location='../View/cita/listacita.php';</script>";
        //header("location: ../View/persona/listarpersona.php");
    }
    else {}
}
if (isset($_POST["btnbuspa"])){
     header("location: ../View/cita/listacita.php");
}
?>
