<?php
require_once '../Modelo/ModeloTratamiento.php';
if (isset($_POST["btnguardar"])){
    $id_consulta = $_POST["txtidconsulta"];
    $id_dtp =$_POST["txtidpromocion"];
    $estado_tratamiento = $_POST["cbestado"];

    
    $db = TratamientoDAO::getInstancia();
    $respuesta = $db->InsertaTratamiento($id_consulta,$id_dtp,$estado_tratamiento);
    if ($respuesta == 1){
        echo "<script>alert('Consulta Registrada Con exito'); window.location='../index.php';</script>";
        //header("location: ../View/persona/listarpersona.php");
    }
    else {
        echo (mysql_error());
    }
}
if (isset($_POST["btnbuspa"])){
     //header("location: ../View/persona/listarpersona.php");
    $db2 = TratamientoDAO::getInstancia();
    $respuesta2 =$db2->ListarCitaPaciente();

}
?>
