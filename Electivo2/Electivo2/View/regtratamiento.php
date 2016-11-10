<?php
    $con = new mysqli("localhost","root","","proyecto_g2");

    $result = $con->query("SELECT con.id_consulta as 'id', p.nom_persona as 'nombre',p.ape_persona as 'apellido' from consulta con INNER JOIN cita c ON con.id_cita = c.id_cita INNER JOIN paciente pa ON c.id_paciente = pa.id_paciente INNER JOIN persona p ON pa.id_persona = p.id_persona order by con.id_consulta ASC");

    $result2 = $con->query("SELECT id_servicio, descripcion_servicio FROM servicio");


    $result3 =$con->query("SELECT dt.id_dtp as 'ID',p.descripcion_promocion as 'Promocion', p.estado_promocion as 'Estado', dt.costo_servicio as 'Costo' from promocion p inner join dt_promocion dt on p.id_promocion= dt.id_promocion order by dt.id_dtp ASC");
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Clinical Dent tu dientes en las mejores</title>

    <!-- Bootstrap core CSS -->
    <link href="../Public/css/bootstrap.css" rel="stylesheet">
    <link href="../Public/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../Public/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../Public/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../Public/lineicons/style.css">  
    <link href="../Public/css/style_1.css" rel="stylesheet">
    <link href="../Public/css/style-responsive_1.css" rel="stylesheet">
    <script src="../Public/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>CLINICAL DENT</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">

                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <!--<p class="centered"><a href="profile.html"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"></h5>-->
              	  

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Registro de personas</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="regpersona.php">Persona</a></li>
                          <li><a  href="regpaciente.php">Paciente</a></li>
                          <li><a  href="regdentista.php">Dentista</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Registro de operaciones</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="regcita.php">Cita</a></li>
                          <li><a  href="regconsulta.php">Consulta</a></li>
                          <li><a  href="regtratamiento.php">Tratamiento</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Mantenimiento</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="servicios.php">Servicios</a></li>
                          <li><a  href="area.php">Areas</a></li>
                          <li><a  href="promociones.php">Promociones</a></li>
                          <li><a  href="horarios.php">Horario Dentista</a></li>
                          <li><a  href="cronograma.php">Cronograma</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Reportes</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="form_component.html">Odontograma</a></li>
                          <li><a  href="form_component.html">Cronograma x area</a></li>
                          <li><a  href="form_component.html">Horario dentista</a></li>
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
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Registrar Tratamiento:</h4>
                      <form class="form-horizontal style-form" method="POST" action="../Controller/TratamientoController.php">
                            <div class="form-group">

                              <label class="col-sm-2 col-sm-2 control-label">Estado Tratamiento:</label>
                              <div class="btn-group">
                              <select class="form-control btn btn-theme03 dropdown-toggle" data-toggle="dropdown"  style="margin-left: 13px;" name="cbestado">
                                <option class="">Seleccionar</option>
                                <option>R</option>
                                <option>P</option>
                                <option>A</option>
                              </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Codigo Consulta:</label>
                              
                                  <table>
                                    <tr>
                                      <td colspan="1"><div class="col-sm-10"><input type="text"  class="form-control" name="txtidconsulta"></div> </td>
                                      <td> <button type="button" class="btn btn-theme02" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i> Buscar Consulta</button></td>
                                    </tr>
                                  </table>  
                              
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre paciente:</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" name="txtnombre">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Apellido paciente:</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" name="txtapellido">
                              </div>
                          </div>
                            
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Codigo Servicio:</label>
                              
                                  <table>
                                    <tr>
                                      <td colspan="1"><div class="col-sm-10"><input type="text"  class="form-control" name="txtidservicio"></div> </td>
                                      <td> <button type="button" class="btn btn-theme02" data-toggle="modal" data-target="#myModal2"><i class="fa fa-search"></i> Buscar Servicio</button></td>
                                    </tr>
                                  </table>  
                              
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre del servicio:</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" name="txtnomser">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Codigo Promocion:</label>
                              
                                  <table>
                                    <tr>
                                      <td colspan="1"><div class="col-sm-10"><input type="text"  class="form-control" name="txtidpromocion"></div> </td>
                                      <td> <button type="button" class="btn btn-theme02" data-toggle="modal" data-target="#myModal3"><i class="fa fa-search"></i> Buscar Promocion</button></td>
                                    </tr>
                                  </table>  
                              
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Detalle Promocion :</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" name="txtdetalleprom">
                              </div>
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Costo total :</label>
                              <div class="col-sm-2">
                                  <input type="text"  class="form-control" name="txtcosto">
                              </div>
                          </div>
                
                              <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                            <button type="submit" class="btn btn-theme" name="btnguardar">Guardar</button>
                            </div>
                            <div class="btn-group">
                              <button type="button" class="btn btn-theme">Actualizar</button>
                            </div>
                             <div class="btn-group">
                            <button type="button" class="btn btn-theme">Eliminar</button>
                            </div>
                            </div>              
                            

                      </form>
                  </div>
              </div><!-- col-lg-12-->       
            </div>
          </section>
      </section>
      </footer>-->
      <!--footer end-->
  </section>

     
	
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>

       <!--modal buscar Consulta-->
     <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Buscar Consulta</h4>
                          </div>
                          <div class="modal-body">
                      
                                          <table class="table table-bordered table-hover">
                                              <tr>
                                                <td>Codigo</td><th>Nombre</th><th>Apellido</th><th></th>
                                              </tr>
                                              <?php foreach ($result as $item) {
                                                ?>
                                                <tr>
                                                <td><?=$item["id"]?></td>
                                                <td><?=$item["nombre"]?></td>
                                                <td><?=$item["apellido"]?></td>
                                                <td><button class="btn btn-theme" onclick="elegirConsulta(<?=$item["id"]?>, '<?=$item["nombre"]?>', '<?=$item["apellido"]?>')">Agregar</button></td>
                                                </tr>
                                              <?php
                                              } ?>
                                          </table>

                                <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-theme" type="button">Cancel</button>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
              <!-- modal3 -->


                <!--modal buscar servicio-->
     <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal2" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Buscar Servicio</h4>
                          </div>
                          <div class="modal-body">
                      
                                          <table class="table table-bordered table-hover">
                                              <tr>
                                                <td>Codigo</td><th>Servicio</th><th></th>
                                              </tr>
                                              <?php foreach ($result2 as $item) {
                                                ?>
                                                <tr>
                                                <td><?=$item["id_servicio"]?></td>
                                                <td><?=$item["descripcion_servicio"]?></td>
                                                <td><button class="btn btn-theme" onclick="elegirServicio(<?=$item["id_servicio"]?>, '<?=$item["descripcion_servicio"]?>')">Agregar</button></td>
                                                </tr>
                                              <?php
                                              } ?>
                                          </table>

                                <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-theme" type="button">Cancel</button>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
              <!-- modal3 -->

                <!--modal buscar promocion-->
     <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal3" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Buscar Promocion</h4>
                          </div>
                          <div class="modal-body">
                      
                                          <table class="table table-bordered table-hover">
                                              <tr>
                                                <td>Codigo</td><th>Promocion</th><th>Costo</th><th>Estado</th><th></th>
                                              </tr>
                                              <?php foreach ($result3 as $item) {
                                                ?>
                                                <tr>
                                                <td><?=$item["ID"]?></td>
                                                <td><?=$item["Promocion"]?></td>
                                                <td><?=$item["Costo"]?></td>
                                                <td><?=$item["Estado"]?></td>
                                                <td><button class="btn btn-theme" onclick="elegirPromocion(<?=$item["ID"]?>, '<?=$item["Promocion"]?>', <?=$item["Costo"]?>)">Agregar</button></td>
                                                </tr>
                                              <?php
                                              } ?>
                                          </table>

                                <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-theme" type="button">Cancel</button>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
              <!-- modal3 -->
  

                <script>
                function elegirConsulta(id, nombre, apellido){
                  $('[name="txtidconsulta"]').val(id);
                  $('[name="txtnombre"]').val(nombre);
                    $('[name="txtapellido"]').val(apellido);
                }

                 function elegirServicio(id, nomser){
                  $('[name="txtidservicio"]').val(id);
                  $('[name="txtnomser"]').val(nomser);

                }
                 function elegirPromocion(id, detaprom, costo){
                  $('[name="txtidpromocion"]').val(id);
                  $('[name="txtdetalleprom"]').val(detaprom);
                    $('[name="txtcosto"]').val(costo);
                }
                
              </script>





    <script src="../Public/js/jquery.js"></script>
    <script src="../Public/js/jquery-3.1.0.min.js"></script>
    <script src="../Public/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../Public/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../Public/js/jquery.scrollTo.min.js"></script>
    <script src="../Public/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="../Public/js/jquery.sparkline.js"></script>
    <script src="../Public/js/common-scripts.js"></script>
    <script src="../Public/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../Public/js/bootstrap-switch.js"></script>
    <script src="../Public/js/jquery.tagsinput.js"></script> 
    <script type="text/javascript" src="../Public/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="../Public/js/gritter-conf.js"></script>
    <script type="text/javascript" src="../Public/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script src="../Public/js/sparkline-chart.js"></script>    
    <script src="../Public/js/zabuto_calendar.js"></script>	
    <script src="../Public/js/form-component.js"></script>    
  </body>
</html>
