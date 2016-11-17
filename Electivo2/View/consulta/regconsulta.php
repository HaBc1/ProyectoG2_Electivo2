
<?php
    $con = new mysqli("localhost","root","","proyecto_g2");

    $result = $con->query("SELECT c.id_cita as 'ID', p.nom_persona as 'Nombre', p.ape_persona as 'Apellido' FROM cita c INNER JOIN paciente pa ON c.id_paciente = pa.id_paciente INNER JOIN persona p ON pa.id_persona=p.id_persona order by c.id_cita ASC");


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
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Registrar Consulta:</h4>
                      <form class="form-horizontal style-form" method="POST" action="../../Controller/ConsultaController.php">
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Estado Consulta</label>
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
                              <label class="col-sm-2 col-sm-2 control-label">Codigo Cita:</label>
                              
                                  <table>
                                    <tr>
                                      <td colspan="1"><div class="col-sm-10"><input type="text"  class="form-control" name="txtidcita"></div> </td>
                                      <td> <button type="button" class="btn btn-theme02" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i> Buscar Cita</button></td>
                                    </tr>
                                  </table>  
                              
                          </div>

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre paciente:</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" name="txtnompaciente">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Apellido paciente:</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" name="txtapepaciente">
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

      <!--main content end-->
      <!--footer start-->
      <!--<footer class="site-footer">
         <!-- <div class="text-center">
              2014 - Alvarez.is
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>-->
      </footer>-->
      <!--footer end-->
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


    <!--modal buscar cita-->
     <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Buscar Citas</h4>
                          </div>
                          <div class="modal-body">
                      
                                          <table class="table table-bordered table-hover">
                                              <tr>
                                                <td>Codigo</td><th>Nombre</th><th>Apellido</th><th></th>
                                              </tr>
                                              <?php foreach ($result as $item) {
                                                ?>
                                                <tr>
                                                <td><?=$item["ID"]?></td>
                                                <td><?=$item["Nombre"]?></td>
                                                <td><?=$item["Apellido"]?></td>
                                                <td><button class="btn btn-theme" onclick="elegirCita(<?=$item["ID"]?>, '<?=$item["Nombre"]?>', '<?=$item["Apellido"]?>')">Agregar</button></td>
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
                function elegirCita(id, nombre, apellido){
                  $('[name="txtidcita"]').val(id);
                  $('[name="txtnompaciente"]').val(nombre);
                    $('[name="txtapepaciente"]').val(apellido);
                }
                
              </script>

  </body>
</html>
