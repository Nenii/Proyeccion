<?if($_SESSION["nivel"]=="0"){?>
<div class="container-fluid">  
    <div class="card shadow mb-4"> 
        <div class="card-header py-3">
            <div class="admin-dashone-data-table-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="sparkline8-graph col-lg-12">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <h3 class="m-0 font-weight-bold text-primary">Documentos anexos al proyecto </h3><hr>
                                    <a href="#" data-toggle="modal" data-target="#Agregar" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#AsignarActividad1">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    <span class="text">Agregar documento</span>
                                  </a><br><br>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                          <thead>
                                            <tr>
                                                <th data-field="name" data-editable="true">Nombre de documento</th>
                                                <th data-field="anio" data-editable="true">Responsable</th>
                                                <th data-field="complete">Descripción</th>
                                                <th data-field="email" data-editable="true">Fecha de registro</th>
                                                <th data-field="action">Acciones</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                              <?php foreach($this->model1->Obtener($_REQUEST['id_proyecto']) as $r): ?>
                                                <tr>
                                                    <td><?php echo $r->nom_anexo; ?></td>
                                                    <td><?php echo $r->nom_responsable; ?></td>
                                                    <td><?php echo $r->descripcion; ?></td>
                                                    <td><?php echo $r->fecha; ?></td>
                                                    <td><a href="files/anexos/<?php echo $r->ubicacion; ?>"><i class="fas fa-cloud-download-alt"></i> Descargar</a>
                                                      
                                                      <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=anexos&a=Eliminar&id_anexo=<?php echo $r->id_anexo; ?>" class="badge badge-danger"><i class="fas fa-times"></i> Eliminar</a>
                                                      
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


<!-- Data table area End-->
<!-- Modal -->
  <div id="Agregar" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-body">
                    <h2>Agregar Documentos anexos!</h2>
                    <form action="?c=anexos&a=Guardar" method="post" id="AddBeneficiario" enctype="multipart/form-data">
                			    <div class="form-group">
                              <label class="control-label col-md-122 col-sm-12 col-xs-12" for="first-name">Nombre del documento <span class="required">*</span>
                              </label>
                              <input type="text" required="required" name="nom_anexo" class="form-control col-md-12 col-xs-12" >
                          </div>
                          <div class="form-group">
            							    <label for="exampleFormControlFile1">Seleccione el documento *</label>
            							      <input class="btn btn-primary" type="file" name="ubicacion[]" id="ubicacion[]">
            							</div>
	                        <div class="form-group">
	                              <label class="control-label col-md-122 col-sm-12 col-xs-12" for="last-name">Descripción<span class="required">*</span>
	                             </label> 
	                              <input type="text"  name="descripcion" required="required" class="form-control col-md-12 col-xs-12">
	                        </div>
	                        <div class="form-group">
                                <label>Responsable del documento</label>
                                    <select class="custom-select form-control" name="id_res_proy" required ="true" >
                                        <option name="id_res_proy" selected >Seleccione la ejecutor</option>
                                          <?php foreach($this->model1->ListarEjecutorAsignados($_REQUEST['id_proyecto']) as $r): ?>
                                        <option value="<?php echo $r->id_responsable_proyecto; ?>"><?php echo $r->nombre_usuario ; ?></option>
                                        <?php endforeach; ?>
                                    </select>  
                          </div>
                          <input type="submit" name="Guardar" class="btn btn-primary" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
  </div>
   <?}else{?>
      <div style="font:bold 12pt arial;color:red;padding:30px">
      </div>
    <?}?>