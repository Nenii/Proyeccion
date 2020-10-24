 <?if($_SESSION["nivel"] == 0){?>
        <div class="container-fluid">
           <!-- DataTales Example -->
              <div class="card shadow mb-4">
                    <div class="card-body">
                        <h3 class="m-0 font-weight-bold text-primary">Perfiles de proyectos completados</h3>
                        <hr>
                           <a class="btn btn-primary btn-icon-split" href="?c=Proyecto&a=Crud"><span class="icon text-white-50">
                                  <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Agregar proyecto</span>
                            </a> <br><br>   
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                    <th>#</th>
                                    <th data-field="id" style="width: 35%">Nombre Proyecto</th>
                                    <th data-field="name" data-editable="true">Beneficiarios</th>
                                    <th data-field="email" data-editable="true">Año</th>
                                    <th data-field="gasto" data-editable="true">Facultad</th>
                                    <th data-field="action">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach($this->model->ListarFinalizados() as $r): ?>
                                <tr>
                                      <td>#</td>
                                      <td class="text-lowercase"><?php echo $r->Nombre_proyecto; ?></td>
                                      <td><?php echo $r->personas_beneficiarias; ?> personas</td>
                                      <td><?php echo $r->periodo; ?></td>
                                      <td><?php echo $r->nom_facultad; ?></td> 
                                      <td>
                                      <a href="?c=proyecto&a=Detalle&id_proyecto=<?php echo $r->id_proyecto; ?>" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fa fa-folder"></i> 
                                      </a>
                                      <a href="?c=proyecto&a=Edit&id_proyecto=<?php echo $r->id_proyecto; ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-tools"></i>
                                      </a>
                                      <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=proyecto&a=Eliminar&id_proyecto=<?php echo $r->id_proyecto; ?>" class="btn btn-danger  btn-sm btn-circle"><i class="fas fa-times"></i>
                                      </a>     
                                    </td>
                                
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                        </table>
  <? } else { ?>
      <div style="font:bold 12pt arial;color:red;padding:30px">
      </div>
    <? }?>
                      </div>
                    </div>
               </div>
        </div>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>