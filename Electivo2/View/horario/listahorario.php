<?php
require("../../Modelo/ModeloHorario.php");
    $db = HorarioDAO::getInstancia();
    $respuesta = $db->ListarHorario();
    if (isset($_POST["btnBuscar"])){
        $dentista = $_POST["dentista"];
        $respuesta = $db->BusHorario($dentista);
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
             <h4 class="mb" ><i class="fa fa-angle-right" ></i>Horario</h4>
<form name="frmListar" action="" method="post">
<center>
<div>
<div class="form-group">
<label>Dentista</label>
<input  type="text" class="form-control" placeholder="Buscar DNI Dentista"  id="area" name="dentista" >
<button type="submit" name="btnBuscar" class="btn btn-theme">Buscar</button>
<button type="submit" name="btnGuardar" class="btn btn-theme">Nuevo Horario</button>
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
<th >Dia</th>
<th >Area</th>
<th >H. Inicio</th>
<th >H. Fin</th>
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
<td class=""><?php echo $respuesta["Dia"] ?></td>
<td class=""><?php echo $respuesta["Area"] ?></td>
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
