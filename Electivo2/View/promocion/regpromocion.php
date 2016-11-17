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
             <h4 class="mb" ><i class="fa fa-angle-right" ></i> Registrar Promocion</h4>
             <form class="form-horizontal style-form" method="post" action="../../Controller/ControllRegPromocion.php">
                    <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Promocion:</label>
                    <div class="col-sm-10">
                      <input type="text"  class="form-control" placeholder="Nombre de la Promocion" name="nombre">
                    </div>
                    </div>
                    <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Descripcion:</label>
                    <div class="col-sm-10">
                      <input type="text"  class="form-control" placeholder="Inserte una Descripcion" name="descripcion">
                    </div>
                    </div>
                    <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Fecha Inicio:</label>
                    <div class="col-sm-10">
                    <input type="date"  class="form-control" placeholder="Fec. Inicio" name="inicio">
                    </div>
                    </div>
                    <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Fecha Fin:</label>
                    <div class="col-sm-10">
                        <input type="date"  class="form-control" placeholder="Fec. Fin" name="fin">
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
