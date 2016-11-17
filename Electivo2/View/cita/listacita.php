<?php
require("../../Modelo/ModeloCita.php");
    $db = CitaDAO::getInstancia();
    $respuesta = $db->ListarCita();
    if (isset($_POST["btnBuscar"])){
        $area = $_POST["area"];
        $respuesta = $db->BusCita($area);
    }
    if(isset($_POST["btnGuardar"])){
         header("location: regcita.php");
    }
?>
<?php include '../olverall/head.php'; ?>
<body>
<section id="container" >
<?php include '../olverall/topbar.php'; ?>
<?php include '../olverall/aside.php'; ?>
<section id="main-content">
<section class="wrapper">
    <div class="row mt">
      <div class="col-lg-12">
          <div class="form-panel">
             <h4 class="mb" ><i class="fa fa-angle-right" ></i>Cita</h4>
<form name="frmListar" action="" method="post">
<center>
<div>
<div class="form-group">
<label>Cita</label>
<input  type="text" class="form-control" placeholder="Buscar Cita"  id="area" name="cita" >
<button type="submit" name="btnBuscar" class="btn btn-theme">Buscar</button>
<button type="submit" name="btnGuardar" class="btn btn-theme">Nueva Cita</button>
</div>    
</div>
</div>
<div>
<table class="table table-striped">
<thead>
<tr class = "">
<th >ID</th>
<th >DNI</th>
<th >Paciente</th>
<th >Area</th>
<th >Dia</th>
<th >Turno</th>
<th >Dentista</th>
<th >Inicio</th>
<th >Fin</th>
<th >Estado</th>
</tr>
</thead>   
<?php
if ($respuesta!=null) {
foreach($respuesta as $respuesta):

?>
<tr>
<td class=""><?php echo $respuesta["ID"] ?></td>
<td class=""><?php echo $respuesta["DNI"] ?></td>
<td class=""><?php echo $respuesta["Paciente"] ?></td>
<td class=""><?php echo $respuesta["Area"] ?></td>
<td class=""><?php echo $respuesta["Dia"] ?></td>
<td class=""><?php echo $respuesta["Turno"] ?></td>
<td class=""><?php echo $respuesta["Dentista"] ?></td>
<td class=""><?php echo $respuesta["Inicio"] ?></td>
<td class=""><?php echo $respuesta["Fin"] ?></td>
<td class=""><?php echo $respuesta["Estado"] ?></td>
</tr>   
<?php 
endforeach;
}
?>
</table> 
</div>
</center>
</form>
          </div>
      </div>     
    </div>
</section>
</section>
</section>
<?php include '../olverall/footer.php'; ?> 
</body>
</html>
