<?php
require("../../Modelo/ModeloPromocion.php");
    $db = PromocionDAO::getInstancia();
    $respuesta = $db->ListarPromocion();
    if (isset($_POST["btnBuscar"])){
        $promocion = $_POST["promocion"];
        $respuesta = $db->BusPromocion($promocion);
    }
    if(isset($_POST["btnGuardar"])){
         header("location: regpromocion.php");
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
             <h4 class="mb" ><i class="fa fa-angle-right" ></i>Promocion</h4>
<form name="frmListar" action="" method="post">
<center>
<div>
<div class="form-group">
<label>Promocion</label>
<input  type="text" class="form-control" placeholder="Buscar Promocion"  id="area" name="promocion" >
<button type="submit" name="btnBuscar" class="btn btn-theme">Buscar</button>
<button type="submit" name="btnGuardar" class="btn btn-theme">Nueva Promocion</button>
</div>    
</div>
</div>
<div>
<table class="table table-striped">
<thead>
<tr class = "">
<th >ID</th>
<th >Promocion</th>
<th >Descripcion</th>
<th >Fec. Inicio</th>
<th >Fec. Fin</th>
<th >Estado</th>
</tr>
</thead>   
<?php
if ($respuesta!=null) {
foreach($respuesta as $respuesta):

?>
<tr>
<td class=""><?php echo $respuesta["ID"] ?></td>
<td class=""><?php echo $respuesta["Promocion"] ?></td>
<td class=""><?php echo $respuesta["Descripcion"] ?></td>
<td class=""><?php echo $respuesta["Fec. Inicio"] ?></td>
<td class=""><?php echo $respuesta["Fec. Fin"] ?></td>
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
