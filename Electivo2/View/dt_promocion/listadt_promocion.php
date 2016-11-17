<?php
require("../../Modelo/ModeloDt_Promocion.php");
    $db = Dt_PromocionDAO::getInstancia();
    $respuesta = $db->ListarPDt_Promocion();
    if (isset($_POST["btnBuscar"])){
        $promo = $_POST["promo"];
        $respuesta = $db->BusDt_Promocion($promo);
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
             <h4 class="mb" ><i class="fa fa-angle-right" ></i>Detalle de Promocion</h4>
<form name="frmListar" action="" method="post">
<center>
<div>
<div class="form-group">
<label>Promocion</label>
<input  type="text" class="form-control" placeholder="Buscar Promocion"  id="promo" name="promo" >
<button type="submit" name="btnBuscar" class="btn btn-theme">Buscar</button>
<button type="submit" name="btnGuardar" class="btn btn-theme">Nuevo Detalle Promocion</button>
</div>    
</div>
</div>
<div>
<table class="table table-striped">
<thead>
<tr class = "">
<th >ID</th>
<th >Promocion</th>
<th >Servicio</th>
<th >Costo</th>
</tr>
</thead>   
<?php
if ($respuesta!=null) {
foreach($respuesta as $respuesta):

?>
<tr>
<td class=""><?php echo $respuesta["Id"] ?></td>
<td class=""><?php echo $respuesta["Promocion"] ?></td>
<td class=""><?php echo $respuesta["Servicio"] ?></td>
<td class=""><?php echo $respuesta["Costo"] ?></td>
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
