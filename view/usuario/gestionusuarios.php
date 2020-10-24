<?if($_SESSION["nivel"]==1){?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sparkline8-list shadow-reset">
                            <div class="sparkline8-hd">
                                <div class="x_title">
                                    <h2 class="m-0 font-weight-bold text-primary"> Usuarios de sistema</h2><hr>
                                   <a class="btn btn-primary btn-icon-split" href="?c=Proyecto&a=Crud"><span class="icon text-white-50">
                                          <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Agregar usuario</span>
                                    </a><br><br>   
                                    <div class="main-sparkline8-hd">
                                        <h1>Ejecutores | <?php echo (new \DateTime())->format('Y'); ?></h1>
                                        <a class="btn btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#AsignarEjecutor"><i class="fa fa-plus"></i> Asignar docente al proyecto</a>

                                        <a class="btn btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#AgregarEjecutor"><i class="fa fa-plus"></i> Agregar nuevo ejecutor
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                              </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                              <tr>
                                                    <th data-field="id">Usuario</th>
                                                    <th data-field="name" data-editable="true">Nombre de usuario</th>
                                                    <th  data-field="email" data-editable="true">Avatar</th>
                                                    <th data-field="company" data-editable="true">Correo</th>
                                                    <th  >Rol</th>
                                                    <th  >Sede</th>
                                                    <th data-field="action">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php foreach($this->model->Listar() as $r): ?>
                                                <tr>
                                                    <td class="text-lowercase"><?php echo $r->user; ?></td>
                                                    <td><?php echo $r->nombre_usuario; ?></td>
                                                    <td >
                                                    	<a class="btn btn-sm btn-circle"><img style="height: 150%;" class="rounded-circle" src="files/fotos/<?php echo $r->ubicacion_foto; ?>"alt="Fotografia"></a>
        										                        </td>
                                                    <td><?php echo $r->email; ?></td>
                                                    <td><?php
                                                    	if ( $r->nivel == 1) {
                                                    		echo "Coordinador de proyecto";
                                                    	}elseif ($r->nivel == 0) {
                                                        # code...
                                                    		echo "Ejecutor de proyecto";
                                                      }else{
                                                        echo "Administrador";
                                                    	}
                                                     ?></td>
                                                      <td><?php echo $r->Sede_origen; ?></td>

                                                    <td class="datatable-ct">
                                                       
                                                      <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=proyecto&a=Eliminar&id_proyecto=<?php echo $r->id_proyecto; ?>" class="btn btn-danger  btn-sm btn-circle"><i class="fas fa-times"></i>
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

   <? } 
   else { ?>
      <div style="font:bold 12pt arial;color:red;padding:30px">
      </div>
    <? }?>

     <!-- Modals 3-->
<div id="AsignarEjecutor" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="basic-login-inner modal-basic-inner">
                            <h3>Asignar docentes</h3>
                            <p>Seleccione el docente que desea asignar</p>
                            <form action="?c=Ejecutores&a=Guardar" method="POST">
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2">Proyecto </label>
                                        </div>
                                        <div class="col-lg-8">
                                             
                                             <select class=" btn btn-white form-control" name="id_proyecto">
                                            <?php foreach($this->model->ObtenerProyecto($_REQUEST['id_proyecto']) as $r): ?>
                                                <option value="<?php echo $r->id_proyecto; ?>"><?php echo $r->nom_proyecto; ?></option>
                                            <?php endforeach ?>
                                              </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2">Responsable</label>
                                        </div>
                                        <div class="col-lg-8">
                                               <select class=" btn btn-white form-control" name="id_responsable">
                                                <option >Seleccionar opción</option>
                                            <?php foreach($this->model->ListarEjecutoresSinAsignar() as $r): ?>
                                                <option value="<?php echo $r->id_responsable ; ?>"><?php echo $r->nombre_usuario; ?></option>
                                            <?php endforeach ?>
                                              </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="login-btn-inner">
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-8">
                                            <div class="login-horizental">
                                                <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Agregar</button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
<div id="AgregarEjecutor" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="basic-login-inner modal-basic-inner">
                            <h3>Agregar docentes</h3>
                            <p>Seleccione el docente que desea asignar</p>
                            <form action="?c=Ejecutores&a=AgregarEjecutor" method="POST">
                               <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2">Nombre *</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="nom_responsable" class="form-control" placeholder="Nombre de la actividad" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2">Telefono *</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="tel_responsable" class="form-control" placeholder="Nombre de la actividad" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2">Sexo *</label>
                                        </div>
                                        <div class="col-lg-8">
                                           <select class=" btn btn-white form-control" name="sexo">
                                            <option >Seleccione una opción</option>
                                            <option value="1">Masculino</option>
                                            <option value="2">Femenino</option>
                                          </select>                                                     
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2">DUI *</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="dui" class="form-control" placeholder="Nombre de la actividad" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                        <div class="row">
                                             <div class="col-lg-4">
                                                <label class="login2">Fecha de nacimiento *</label>
                                            </div>
                                            <div class="form-group col-lg-8" id="data_3">
                                                    <input type="date" class="form-control"  name="fecha_nac" placeholder="18/11/1992">       
                                            </div>
                                        </div>
                                </div>
                                <div class="login-btn-inner">
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-8">
                                            <div class="login-horizental">
                                                <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Agregar</button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>