<!DOCTYPE html>
<html>
    <head>
        <title></title>
    <link href="Public/css/bootstrap.css" rel="stylesheet">
    <link href="Public/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="Public/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="Public/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="Public/lineicons/style.css">  
    <link href="Public/css/style_1.css" rel="stylesheet">
    <link href="Public/css/style-responsive_1.css" rel="stylesheet">
    <script src="Public/js/chart-master/Chart.js"></script>
    </head>
    <body>
        <div class="container">
             
            <div class="form-group">
             <label class="col-sm-2 col-sm-2 control-label">ID:</label>
            <div class="col-sm-5">
              <input type="text"  class="form-control" placeholder="ID Paciente" name="id" readonly="readonly">              
            </div>
            <div>
                <button class="btn btn-info" data-toggle="modal" data-target="#ventana"><span class="glyphicon glyphicon-search"></span></button>
            </div>
            <label class="col-sm-2 col-sm-2 control-label">DNI:</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" placeholder="DNI Paciente" name="dni" readonly="readonly">
            </div>
            <label class="col-sm-2 col-sm-2 control-label">Nombre:</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" placeholder="Nombre Paciente" name="nombre" readonly="readonly">
            </div>
            <label class="col-sm-2 col-sm-2 control-label">Apellido:</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" placeholder="Apellido Paciente" name="apellido" readonly="readonly">
            </div>
            </div>
            <div class="modal fade" id="ventana" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            Buscar Persona
                        </div>
                        <div class="modal-body">
                    <div class="form-group">
                    <label  >DNI</label>
                    <input  type="text" class="form-control" placeholder="Buscar DNI"  id="dni" name="dni" pattern="[0-9]{8}" title="El DNI contiene 8 digitos">
                    <div>
                    <button type="submit" name="btnBuscar" class="btn btn-theme"><span class="glyphicon glyphicon-search">Buscar</span></button>
                    </div>
                    </div>  
                    <div>
                    </div>                            
                        </div>    
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </body>
        <script src="Public/js/jquery.js"></script>
    <script src="Public/js/jquery-3.1.0.min.js"></script>
    <script src="Public/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="Public/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="Public/js/jquery.scrollTo.min.js"></script>
    <script src="Public/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="Public/js/jquery.sparkline.js"></script>
    <script src="Public/js/common-scripts.js"></script>
    <script src="Public/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="Public/js/bootstrap-switch.js"></script>
    <script src="Public/js/jquery.tagsinput.js"></script> 
    <script type="text/javascript" src="Public/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="Public/js/gritter-conf.js"></script>
    <script type="text/javascript" src="Public/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script src="Public/js/sparkline-chart.js"></script>    
    <script src="Public/js/zabuto_calendar.js"></script>	
    <script src="Public/js/form-component.js"></script>  

</html>

