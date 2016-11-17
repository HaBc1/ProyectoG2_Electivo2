<?php
require("../../Modelo/ModeloPaciente.php");
    $db = PacienteDAO::getInstancia();
    $respuesta = $db->ListarPaciente();
    if (isset($_POST["btnBuscar"])){
        $dni = $_POST["dni"];
        $respuesta = $db->BusPaciente($dni);
    }
    if(isset($_POST["btnGuardar"])){
         header("location: regpaciente.php");
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
             <h4 class="mb" ><i class="fa fa-angle-right" ></i>Paciente</h4>
<form name="frmListar" action="" method="post">
<center>
<div>
<div class="form-group">
<label>Paciente</label>
<input  type="text" class="form-control" placeholder="Buscar Paciente"  id="area" name="dni" >
<button type="submit" name="btnBuscar" class="btn btn-theme">Buscar</button>
<button type="submit" name="btnGuardar" class="btn btn-theme">Nueva Paciente</button>
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
