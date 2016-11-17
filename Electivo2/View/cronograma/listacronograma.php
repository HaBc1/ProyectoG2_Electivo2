<?php
require("../../Modelo/ModeloCronograma.php");
    $db = CronogramaDAO::getInstancia();
    $respuesta = $db->ListarCronograma();
    if (isset($_POST["btnBuscar"])){
        $area = $_POST["area"];
        $respuesta = $db->BusCronograma($area);
    }
    if(isset($_POST["btnGuardar"])){
         header("location: regpersona.php");
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
             <h4 class="mb" ><i class="fa fa-angle-right" ></i>Cronograma</h4>
<form name="frmListar" action="" method="post">
<center>
<div>
<div class="form-group">
<label>Area</label>
<input  type="text" class="form-control" placeholder="Buscar Area"  id="area" name="area" >
<button type="submit" name="btnBuscar" class="btn btn-theme">Buscar</button>
<button type="submit" name="btnGuardar" class="btn btn-theme">Nuevo Cronograma</button>
</div>    
</div>
</div>
<div>
<table class="table table-striped">
<thead>
<tr class = "">
<th >ID</th>
<th >Dia</th>
<th >Area</th>
<th >Turno</th>
<th >H. Inicio</th>
<th >H. Fin</th>
</tr>
</thead>   
<?php
if ($respuesta!=null) {
foreach($respuesta as $respuesta):

?>
<tr>
<td class=""><?php echo $respuesta["Id"] ?></td>
<td class=""><?php echo $respuesta["Dia"] ?></td>
<td class=""><?php echo $respuesta["Area"] ?></td>
<td class=""><?php echo $respuesta["Turno"] ?></td>
<td class=""><?php echo $respuesta["H. Inicio"] ?></td>
<td class=""><?php echo $respuesta["H. Fin"] ?></td>
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
