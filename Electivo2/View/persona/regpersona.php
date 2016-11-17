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
          <form class="form-horizontal style-form" method="post" action="../../Controller/ControllRegPersona.php">
                    <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Nombre:</label>
                    <div class="col-sm-10">
                      <input type="text"  class="form-control" placeholder="Nombre" name="nombre">
                    </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Apellido:</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" placeholder="Apellido" name="apellido">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Dni:</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" placeholder="DNI" name="dni">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Direccion:</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" placeholder="Direccion" name="direccion">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="email"  class="form-control" placeholder="Email" name="email">
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
</body>
</html>
