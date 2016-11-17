<?php
    $con = new mysqli("localhost","root","","proyecto_g2");

    $result = $con->query("SELECT con.id_consulta as 'id', p.nom_persona as 'nombre',p.ape_persona as 'apellido' from consulta con INNER JOIN cita c ON con.id_cita = c.id_cita INNER JOIN paciente pa ON c.id_paciente = pa.id_paciente INNER JOIN persona p ON pa.id_persona = p.id_persona order by con.id_consulta ASC");

    $result2 = $con->query("SELECT id_servicio, descripcion_servicio FROM servicio");


    $result3 =$con->query("SELECT dt.id_dtp as 'ID',p.descripcion_promocion as 'Promocion', p.estado_promocion as 'Estado', dt.costo_servicio as 'Costo' from promocion p inner join dt_promocion dt on p.id_promocion= dt.id_promocion order by dt.id_dtp ASC");
?>

<?php include '../olverall/head.php'; ?>
<body>
<section id="container" >
<?php include '../olverall/topbar.php'; ?>
<?php include '../olverall/aside.php'; ?>
</section>
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
<?php include '../olverall/footer.php'; ?> 
  </body>
</html>
