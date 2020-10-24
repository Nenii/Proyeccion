<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body onload="window.print();"> <br>
<div class="admin-dashone-data-table-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline8-list shadow-reset">
                  <!-- page content -->
                  <div class="right_col" role="main">
                    <div class="">
                      <div class="clearfix"></div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Proyectos | Activos</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a  href="javascript:window.print()">Imprimir</a>
                                    </li>
                                    <li><a href="#">Descargar PDF</a>
                                    </li>
                                  </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <p><a class="btn btn-primary"  data-toggle="tooltip" data-placement="bottom" title="Agregar proyecto"><i class="fa fa-plus-circle"></i> Nuevo proyecto</a></p>
                              <!-- start project list -->
                              <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id" style="width: 10%">Nombre Proyecto</th>
                                        <th data-field="name" data-editable="true">Beneficiarios</th>
                                        <th data-field="Categoria" data-editable="true">Presupuesto</th>
                                        <th data-field="email" data-editable="true">Año</th>
                                        <th data-field="Facultad" data-editable="true">Codigo</th>
                                        <th data-field="gasto" data-editable="true">Facultad</th>
                                        <th data-field="gasto1" data-editable="true">Gastos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach($this->model->ListarFinalizados() as $r): ?>
                                    <tr>
                                        <td><?php echo $r->Nombre_proyecto; ?></td>
                                                    <td><?php echo $r->Nombre_proyecto; ?></td>
                                                    <td><?php echo $r->personas_beneficiarias; ?> personas</td>
                                                    <td><?php echo $r->Presupuesto; ?></td>
                                                    <td><?php echo $r->periodo; ?></td>
                                                    <td><?php echo $r->Codigo; ?></td>
                                                    <td>Facultad</td>
                                        <a href="proyecto"><td><?php echo $r->Presupuesto; ?></td></a>
                                      
                                    </tr>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                              <!-- end project list -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /page content -->
              </div>
            </div>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>