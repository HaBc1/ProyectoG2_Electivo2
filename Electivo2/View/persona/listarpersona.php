<?php
require("../../Modelo/ModeloPersona.php");
    $db = PersonaDAO::getInstancia();
    $respuesta = $db->ListarPersona();
    if (isset($_POST["btnBuscar"])){
        $dni = $_POST["dni"];
        $respuesta = $db->BusUsuario($dni);
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
             <h4 class="mb" ><i class="fa fa-angle-right" ></i> Registrar Persona</h4>
<form name="frmListar" action="" method="post">
<center>
<div>
<div class="form-group">
<label  >DNI</label>
<input  type="text" class="form-control" placeholder="Buscar DNI"  id="dni" name="dni" pattern="[0-9]{8}" title="El DNI contiene 8 digitos">
<button type="submit" name="btnBuscar" class="btn btn-theme">Buscar</button>
<button type="submit" name="btnGuardar" class="btn btn-theme">Nueva Persona</button>
</div>    
</div>
</div>
<div>
<table class="table table-striped">
<thead>
<tr class = "">
<th >ID</th>
<th >Nombre</th>
<th >Apellido</th>
<th >DNI</th>
<th >Direccion</th>
<th >Email</th>
</tr>
</thead>   
<?php
if ($respuesta!=null) {
foreach($respuesta as $respuesta):

?>
<tr>
<td class=""><?php echo $respuesta["id_persona"] ?></td>
<td class=""><?php echo $respuesta["nom_persona"] ?></td>
<td class=""><?php echo $respuesta["ape_persona"] ?></td>
<td class=""><?php echo $respuesta["dni_persona"] ?></td>
<td class=""><?php echo $respuesta["direccion_persona"] ?></td>
<td class=""><?php echo $respuesta["email_persona"] ?></td>
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
