
<?php
    $con = new mysqli("localhost","root","","proyecto_g2");

    $result = $con->query("SELECT pa.id_paciente,p.dni_persona,p.nom_persona,p.ape_persona from paciente pa INNER JOIN persona p ON  pa.id_persona=p.id_persona");

    $result2=$con->query("SELECT h.id_horario as 'ID', h.estado_horario as 'Estado', p.dni_persona as 'DNI' , CONCAT(p.ape_persona,' ',p.nom_persona) as 'Dentista', c.dia as 'Dia', a.nom_area as 'Area', t.hora_inicio as 'H. Inicio', t.hora_fin as 'H. Fin',t.nom_turno FROM horario h
INNER JOIN cronograma c ON c.id_cronograma = h.id_cronograma
INNER JOIN turno t ON t.id_turno = c.id_turno
INNER JOIN area a ON a.id_area = c.id_area
INNER JOIN dentista d ON d.id_dentista  = h.id_dentista
INNER JOIN persona p ON d.id_persona = p.id_persona");
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
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Registrar Cita:</h4>
                      <form class="form-horizontal style-form" method="POST" action="../../Controller/CitaController.php">
                            <div class="form-group">

                              <label class="col-sm-2 col-sm-2 control-label">Estado Cita:</label>
                              <div class="btn-group">
                              <select class="form-control btn btn-theme03 dropdown-toggle" data-toggle="dropdown"  style="margin-left: 13px;" name="cbestado" id="estado">
                                <option class="">Seleccionar</option>
                                <option>R</option>
                                <option>C</option>
                                <option>F</option>
                              </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <input type="hidden" name="txtidpaciente" />
                              <label class="col-sm-2 col-sm-2 control-label">Dni:</label>
                              
                                  <table>
                                    <tr>
                                      <td colspan="1"><div class="col-sm-10"><input type="text"  class="form-control" name="txtdni"></div> </td>
                                      <td> <button data-toggle="modal" data-target="#myModal1" type="button" class="btn btn-theme02" name="btnbuspa"><i class="fa fa-search"></i> Buscar Paciente</button></td>
                                    </tr>
                                  </table>  
                              
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre paciente:</label>
                              <div class="col-sm-10">
                                  <input type="text" name="txtnombre" class="form-control">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Apellido paciente:</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" name="txtapellido">
                              </div>
                          </div>
                            
                          <div class="form-group">
                                <input type="hidden" name="txtidturno">
                              <label class="col-sm-2 col-sm-2 control-label">Dia:</label>
                              
                                  <table>
                                    <tr>
                                      <td colspan="1"><div class="col-sm-10"><input type="text"  class="form-control" name="txtdia"></div></td>
                                      <td><button type="button" class="btn btn-theme02" data-toggle="modal" data-target="#myModal2"><i class="fa fa-search"></i> Buscar Turno</button></td>
                                    </tr>
                                  </table>  
                              
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Turno:</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" name="txtturno">
                              </div>
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Dentista:</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" name="txtdentista">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Inicio cita :</label>
                              <div class="col-sm-2">
                                  <input type="text"  class="form-control" name="txt_inicio_cita">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Fin cita :</label>
                              <div class="col-sm-2">
                                  <input type="text"  class="form-control" name="txt_fin_cita">
                              </div>
                          </div>
                
                              <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                            <button type="submit" class="btn btn-theme" name="btnguardar">Guardar</button>
                            </div>
                            <div class="btn-group">
                              <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#myModal3">Actualizar</button>
                            </div>
                             <div class="btn-group">
                            <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#myModal4">Eliminar</button>
                            </div>
                            <div class="btn-group">
                            <button type="submit" class="btn btn-theme" name="btnbuspa">Listar</button>
                            </div>
                            </div>              
                            
                      </form>
                  </div>
              </div><!-- col-lg-12-->       
            </div>
          </section>
      </section>

  </section>
<?php include '../olverall/footer.php'; ?>
	
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
  <!--modal buscar paciente-->
     <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal1" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Buscar Pacientes</h4>
                          </div>
                          <div class="modal-body">
                      
                                          <table class="table table-bordered table-hover">
                                              <tr>
                                                <td>Codigo</td><th>Dni</th><th>Nombre</th><th>Apellido</th><th></th>
                                              </tr>
                                              <?php foreach ($result as $item) {
                                                ?>
                                                <tr>
                                                <td><?=$item["id_paciente"]?></td>
                                                <td><?=$item["dni_persona"]?></td>
                                                <td><?=$item["nom_persona"]?></td>
                                                <td><?=$item["ape_persona"]?></td>
                                                <td><button class="btn btn-theme" onclick="elegirPaciente(<?=$item["id_paciente"]?>, <?=$item["dni_persona"]?>, '<?=$item["nom_persona"]?>', '<?=$item["ape_persona"]?>')">Agregar</button></td>
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

              <!--modal buscar Turno-->
     <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal2" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Buscar Turno</h4>
                          </div>
                          <div class="modal-body">
                      
                                          <table class="table table-bordered table-hover">
                                              <tr>
                                                <th>Codigo</th><th>Dia</th><th>Turno</th><th>Dentista</th><th>Estado</th><th></th>
                                              </tr>
                                              <?php foreach ($result2 as $item) {
                                                ?>
                                                <tr>
                                                <td><?=$item["ID"]?></td>
                                                <td><?=$item["Dia"]?></td>
                                                <td><?=$item["nom_turno"]?></td>
                                                <td><?=$item["Dentista"]?></td>
                                                <td><?=$item["Estado"]?></td>
                                                <td><button class="btn btn-theme" onclick="elegirTurno(<?=$item["ID"]?>,'<?=$item["Dia"]?>', '<?=$item["nom_turno"]?>', '<?=$item["Dentista"]?>')">Agregar</button></td>
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

                         <!--modal Actualizar-->
     <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal3" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Actualizar Cita</h4>
                          </div>
                          <div class="modal-body">

                              <table>
                                <tr>
                                  <td><label class=" control-label">Estado Cita:</label></td>
                                  <td> 
                              <select class="form-control btn btn-theme03 dropdown-toggle" data-toggle="dropdown"   name="cbestado" id="estado" style="margin-left: 13px;">
                                <option class="">Seleccionar</option>
                                <option>R</option>
                                <option>C</option>
                                <option>F</option>
                              </select>
                              </td>
                              <tr><td><br></td></tr>
                                </tr>
                                <tr>
                                  <td><label class=" control-label">Inicio cita :</label></td>
                                  <td>
                                      <input type="text"  class="form-control" name="txt_inicio_cita" size="30" style="margin-left: 13px;">
                                  </td>
                                </tr>
                                <tr><td><br></td></tr>
                                </tr>
                                <tr>
                                  <td><label class=" control-label">Inicio cita :</label></td>
                                  <td>
                                      <input type="text"  class="form-control" name="txt_inicio_cita" size="30" style="margin-left: 13px;">
                                  </td>
                                </tr>
                                </tr>
                                <tr><td><br></td></tr>
                                </tr>
                              </table>
                                 <div class="modal-footer">
                                 <button type="button" class="btn btn-theme">Actualizar</button>
                              <button data-dismiss="modal" class="btn btn-theme" type="button">Cancel</button>

                          </div>

                      </div>
                  </div>
              </div>
            </div>
              <!-- modal3 -->
                         <!--modal Eliminar-->
     <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal2" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Buscar Turno</h4>
                          </div>
                          <div class="modal-body">
                      
                                          <table class="table table-bordered table-hover">
                                              <tr>
                                                <th>Codigo</th><th>Dia</th><th>Turno</th><th>Dentista</th><th>Estado</th><th></th>
                                              </tr>
                                              <?php foreach ($result2 as $item) {
                                                ?>
                                                <tr>
                                                <td><?=$item["ID"]?></td>
                                                <td><?=$item["Dia"]?></td>
                                                <td><?=$item["nom_turno"]?></td>
                                                <td><?=$item["Dentista"]?></td>
                                                <td><?=$item["Estado"]?></td>
                                                <td><button class="btn btn-theme" onclick="elegirTurno(<?=$item["ID"]?>,'<?=$item["Dia"]?>', '<?=$item["nom_turno"]?>', '<?=$item["Dentista"]?>')">Agregar</button></td>
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
                function elegirPaciente(id, dni, nombre, apellido){
                  $('[name="txtidpaciente"]').val(id);
                  $('[name="txtdni"]').val(dni);
                    $('[name="txtnombre"]').val(nombre);
                    $('[name="txtapellido"]').val(apellido);
                }
                
                function elegirTurno(cod, dia, turno, dentista){
                  $('[name="txtidturno"]').val(cod);
                  $('[name="txtdia"]').val(dia);
                    $('[name="txtturno"]').val(turno);
                    $('[name="txtdentista"]').val(dentista);
                }
              </script>

  </body>
</html>
