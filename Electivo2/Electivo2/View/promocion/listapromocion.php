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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title></title>
    <link href="../../Public/css/bootstrap.css" rel="stylesheet">
    <link href="../../Public/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../Public/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../../Public/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../../Public/lineicons/style.css">  
    <link href="../../Public/css/style_1.css" rel="stylesheet">
    <link href="../../Public/css/style-responsive_1.css" rel="stylesheet">

    <script src="../../Public/js/chart-master/Chart.js"></script>
   
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
          <a href="../../index.php" class="logo"><b>CLINICAL DENTAL</b></a>
            <div class="nav notify-row" id="top_menu">
                <ul class="nav top-menu">
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Registro de personas</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="View/persona/listarpersona.php">Persona</a></li>
                          <li><a  href="view/regpaciente.php">Paciente</a></li>
                          <li><a  href="view/regdentista.php">Dentista</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Registro de operaciones</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="view/calendar.html">Cita</a></li>
                          <li><a  href="view/gallery.html">Consulta</a></li>
                          <li><a  href="view/todo_list.html">Tratamiento</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Mantenimiento</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="view/servicios.php">Servicios</a></li>
                          <li><a  href="view/area.php">Areas</a></li>
                          <li><a  href="view/promociones.php">Promociones</a></li>
                          <li><a  href="view/horarios.php">Horario Dentista</a></li>
                          <li><a  href="view/cronograma.php">Cronograma</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Reportes</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="view/form_component.html">Odontograma</a></li>
                          <li><a  href="view/form_component.html">Cronograma x area</a></li>
                          <li><a  href="view/form_component.html">Horario dentista</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.html">Basic Table</a></li>
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
      </aside>
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
    <script src="../../Public/js/jquery.js"></script>
    <script src="../../Public/js/jquery-3.1.0.min.js"></script>
    <script src="../../Public/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../../Public/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../../Public/js/jquery.scrollTo.min.js"></script>
    <script src="../../Public/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../../Public/js/jquery.sparkline.js"></script>
    <script src="../../Public/js/common-scripts.js"></script>
    <script src="../../Public/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../../Public/js/bootstrap-switch.js"></script>
    <script src="../../Public/js/jquery.tagsinput.js"></script> 
    <script type="../../text/javascript" src="Public/js/gritter/js/jquery.gritter.js"></script>
    <script type="../../text/javascript" src="Public/js/gritter-conf.js"></script>
    <script type="../../text/javascript" src="Public/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script src="../../Public/js/sparkline-chart.js"></script>    
    <script src="../../Public/js/zabuto_calendar.js"></script>	
    <script src="../../Public/js/form-component.js"></script>     
  </body>
</html>
