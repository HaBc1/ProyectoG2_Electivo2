<?php
    $con = new mysqli("localhost","root","","proyecto_g2");
    $result = $con->query("SELECT `id_persona`, `nom_persona`, `ape_persona`, `dni_persona`, `direccion_persona`, `email_persona` FROM `persona` ");
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
             <h4 class="mb" ><i class="fa fa-angle-right" ></i> Registrar Dentista</h4>
             <form class="form-horizontal style-form" method="post" action="../../Controller/ControllRegDentista.php">
                        <div class="form-group">
                              <input type="hidden" name="txtidpaciente" />
                              <label class="col-sm-2 col-sm-2 control-label">Dni:</label>
                              
                                  <table>
                                    <tr>
                                      <td colspan="1"><div class="col-sm-10"><input type="text"  class="form-control" name="txtdni"></div> </td>
                                      <td> <button data-toggle="modal" data-target="#myModal1" type="button" class="btn btn-theme02" name="btnbuspa"><i class="fa fa-search"></i> Buscar Persona</button></td>
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
                              <label class="col-sm-2 col-sm-2 control-label">Especialidad:</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" name="especialidad">
                              </div>
                          </div>
                    <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                        <button type="submit" name="btnGuardar" class="btn btn-theme">Guardar</button>
                    </div>
                    <div class="btn-group">
                        <button type="submit" name="btnRegresar" class="btn btn-theme">Regresar</button>
                    </div>
                    </div>              
              </form>
          </div>
      </div>     
    </div>
</section>
</section>
</section>
<?php include '../olverall/footer.php'; ?> 
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
                                                <td><?=$item["id_persona"]?></td>
                                                <td><?=$item["dni_persona"]?></td>
                                                <td><?=$item["nom_persona"]?></td>
                                                <td><?=$item["ape_persona"]?></td>
                                                <td><button class="btn btn-theme" onclick="elegirPaciente(<?=$item["id_persona"]?>, <?=$item["dni_persona"]?>, '<?=$item["nom_persona"]?>', '<?=$item["ape_persona"]?>')">Agregar</button></td>
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
                 <script>
                function elegirPaciente(id, dni, nombre, apellido){
                  $('[name="txtidpaciente"]').val(id);
                  $('[name="txtdni"]').val(dni);
                    $('[name="txtnombre"]').val(nombre);
                    $('[name="txtapellido"]').val(apellido);
                }
              </script>
</body>
</html>
