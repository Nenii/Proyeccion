<div id="Impresion">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="asserts/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="asserts/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="asserts/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="asserts/css/style.css" rel="stylesheet">

  <div class="admin-dashone-data-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="right_col" role="main">
                <div class="">
                  <div class="clearfix">
                    </div>
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel">
                            <div class="container-fluid">
                              <div class="card  mb-4">
                                <div class="card-header py-3">
                                  <div class="container-fluid">
                                    <div class="x_title">
                                        <h2>Proyección Social <small>Factura</small></h2><hr></small></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                      <section class="content invoice">
                                          <div class="row">
                                            <div class="col-xs-12 invoice-header">
                                              <h1>
                                                <i class="fa fa-globe"></i> PS
                                                <small class="pull-right">Fecha: <?php echo (new \DateTime())->format('d/m/Y'); ?>
                                              </h1>
                                            </div>
                                            <!-- /.col -->
                                          </div>
                                            <!-- info row -->
                                          <div class="row invoice-info">
                                              <div class="col-sm-4 invoice-col">
                                                De:                       
                                                <address>
                                                      <strong>Lic Carlos Esperanza.</strong>
                                                </address>
                                              </div>
                                              <!-- /.col -->
                                              <div class="col-sm-4 invoice-col">
                                                Para:
                                                  <address>
                                                    <?php foreach ($this->model->ObtenerGastos($_REQUEST['id_proyecto']) as $r):  ?>
                                                              <strong><?php echo $r->nom_proyecto; ?></strong> 
                                                 <?php endforeach ?>
                                                  </address>
                                              </div>
                                              <!-- /.col -->
                                              <div class="col-sm-4 invoice-col">
                                                  <b>Factura #______________</b>
                                                  <br>
                                                  <br>
                                                  <b>Orden No:</b> ______________
                                                  <br>
                                                  <b>Fecha de emisión:</b> <?php echo (new \DateTime())->format('d/m/Y'); ?>
                                                  <br>
                                              </div>
                                              <!-- /.col -->
                                          </div><br><br>
                                      <!-- Table row -->
                                          <div class="row">
                                              <div class="col-xs-12 table">
                                                  <table class="table table-striped">
                                                      <thead>
                                                        <tr>
                                                          <th>Fecha</th>
                                                          <th >Actividad #</th>
                                                          <th>Responsable</th>
                                                          <th>Gastos</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody> 
                                                            <?php foreach($this->model->Obtener($_REQUEST['id_proyecto']) as $r): ?>
                                                            <tr>
                                                                <td ><?php echo $r->fecha_inicio; ?></td>
                                                                <td> <?php echo $r->nom_actividad; ?></td>
                                                                <td ><?php echo $r->nom_responsable; ?></td>
                                                                <td width="15%" >$ <?php echo $r->GASTO;
                                                                if ($r->GASTO == 0) {
                                                                   echo '00.0';
                                                                 } ?></td>
                                                            </tr>
                                                           <?php endforeach; ?>
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-xs-4 col-lg-4 ">
                                                  <p class="lead ">Consejo:</p>
                                                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                                    El papel aunque se obtiene de una materia prima biodegradable, no debe emplearse sin conciencia. 
                                                  </p>
                                              </div>
                                              <div class="col-xs-8 col-lg-8">
                                                  <p class="lead">Pago: <?php echo (new \DateTime())->format('d/m/Y'); ?></p>
                                                  <div class="table-responsive">
                                                      <table class="table">
                                                          <tbody>
                                                            <?php foreach($this->model->ObtenerGastos($_REQUEST['id_proyecto']) as $r): ?>
                                                              <tr>
                                                                <th>Gastos</th>
                                                                <td>$ <?php echo $r->gastos; ?></td>
                                                              </tr>
                                                            <tr>
                                                              <th>Presupuesto</th>
                                                              <td>$ <?php echo $r->presupuesto; ?></td>
                                                            </tr>
                                                            <tr>
                                                              <th>Extra:</th>
                                                              <td>$0</td>
                                                            </tr>
                                                            <tr>
                                                              <th>Disponible:</th>
                                                              <td>$ <?php echo $r->presupuesto - $r->gastos; ?>  </td>
                                                            </tr>
                                                            <?php endforeach ?>  
                                                          </tbody>
                                                      </table>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row no-print">
                                              <div class="col-xs-12">
                                                  <a href="javascript:imprim1(Impresion);"><button class="btn btn-default"  ><i class="fa fa-print"></i> Imprimir</button></a>
                                                  <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                                              </div>
                                          </div>
                                      </section>
                                    </div>
                                  </div>
                                </div>
                               <div class="col-md-2 col-sm-2 col-xs-12"> 
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- Modal1 -->
    <div id="PrimaryModalalert" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Nueva Actividad!</h2>
                    <form action="?c=proyecto&a=GuardarFacultad" method="post">
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="login2">Fecha *</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="fecha" class="form-control" placeholder="Fecha de la actividad" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="login2">Monto *</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="monto" placeholder="Monto de la actividad" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="login2">Id Responsable *</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="id_res_act" placeholder="Responsable la actividad" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="login2">Tipo *</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="descripcion" placeholder="Descripciónde la actividad" />
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="Guardar"  value="Submit">
                    </form> 
                </div>
                <div class="modal-footer">
                    <a data-dismiss="modal" href="#">Cancel</a>
                    <a href="#">Process</a>
                </div>
            </div>
        </div>
    </div>
    <!--Modal1 end -->


<script>
function imprim1(Impresion){
var printContents = document.getElementById('Impresion').innerHTML;
        w = window.open();
        w.document.write(printContents);
        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10
    w.print();
    w.close();
        return true;}
</script>