<?php
require("../../Modelo/ModeloDentista.php");
    $db = DentistaDAO::getInstancia();
    $respuesta = $db->ListarDentista();
    if (isset($_POST["btnBuscar"])){
        $dni = $_POST["dni"];
        $respuesta = $db->BusDentista($dni);
    }
    if(isset($_POST["btnGuardar"])){
         header("location: regdentista.php");
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
             <h4 class="mb" ><i class="fa fa-angle-right" ></i>Dentista</h4>
<form name="frmListar" action="" method="post">
<center>
<div>
<div class="form-group">
<label>Dentista</label>
<input  type="text" class="form-control" placeholder="Buscar Dentista"  id="area" name="dni" >
<button type="submit" name="btnBuscar" class="btn btn-theme">Buscar</button>
<button type="submit" name="btnGuardar" class="btn btn-theme">Nuevo Dentista</button>
</div>    
</div>
</div>
<div>
<table class="table table-striped">
<thead>
<tr class = "">
<th >ID</th>
<th >DNI</th>
<th >Dentista</th>
<th >Especialidad</th>
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
<td class=""><?php echo $respuesta["Dentista"] ?></td>
<td class=""><?php echo $respuesta["Especialidad"] ?></td>
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
