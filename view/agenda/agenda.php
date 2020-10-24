<?if($_SESSION["nivel"]=="0"){?>
    <div class="container-fluid">
        <div class="card shadow mb-4">
              <div class="card-header py-3"><!-- Data table area Start-->
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="sparkline8-list shadow-reset">
                                  <div class="sparkline8-hd">
                                      <div class="x_title">
                                          <h2 class="m-0 font-weight-bold text-primary"> Agendas de proyecto</h2><hr>
                                         <a class="btn btn-primary btn-icon-split" href="?c=Proyecto&a=Crud"><span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                              </span>
                                              <span class="text">Agregar proyecto</span>
                                          </a><br><br>   
                                          <div class="clearfix"></div>
                                      </div>
                                    <div class="sparkline8-graph col-lg-12">
                                        <div class="datatable-dashv1-list custom-datatable-overright">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                      <tr>                                            
                                                          <th data-field="id" style="width: 25%">Nombre Proyecto</th>
                                                          <th data-field="name" data-editable="true">Comunidad</th>
                                                          <th data-field="Facultad" data-editable="true">Facultad</th>
                                                          <th data-field="anio" data-editable="true">Año</th>
                                                          <th data-field="company" data-editable="true">Presupuesto</th>
                                                          <th data-field="action">Acciones</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php foreach($this->model1->ListarAgendas() as $r): ?>
                                                        <tr>
                                                            <td ><?php echo $r->Nombre_proyecto; ?></td>
                                                            <td><?php echo $r->nom_comunidad_ben; ?></td>
                                                            <td><?php echo $r->nom_facultad; ?></td>
                                                            <td><?php echo $r->periodo; ?></td>
                                                            <a href="proyecto"><td><?php echo $r->Presupuesto; ?></td></a>
                                                            <td> <a href="?c=proyecto&a=Detalle&id_proyecto=<?php echo $r->id_proyecto; ?>" class="btn btn-primary btn-circle btn-sm">
                                                                    <i class="fa fa-folder"></i> 
                                                                  </a>
                                                                  <a href="?c=proyecto&a=Edit&id_proyecto=<?php echo $r->id_proyecto; ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-tools"></i>
                                                                  </a>
                                                                  <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=proyecto&a=Eliminar&id_proyecto=<?php echo $r->id_proyecto; ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-times"></i>
                                                                  </a>                                           
                                                            </td>                                          
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Data table area End-->
  <? } 
   else { ?>
      <div style="font:bold 12pt arial;color:red;padding:30px">
      </div>
    <? }?>