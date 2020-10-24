<?if($_SESSION["nivel"]=="0"){
   ?>
<div class="container-fluid">
    <div class="card  mb-4">
        <div class="card-header ">
            <div class="sparkline8-hd">
                <div class="main-sparkline8-hd">
                    <h2 class="m-0 font-weight-bold text-primary">Usuarios de sistema | <?php echo (new \DateTime())->format('Y'); ?></h2><hr>
                    <a class="btn btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#AsignarEjecutor"><i class="fa fa-plus"></i> Asignar docente al proyecto</a>
                    <a class="btn btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#AgregarEjecutor"><i class="fa fa-plus"></i> Agregar nuevo usuario
                    </a>
                </div>
            </div>
        </div>
    </div> 
    <div class="container-fluid">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Detalle de ejecutores asignados</h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                              <th style="width: 1%">#</th>
                              <th style="width: 20%">Nombre del docente</th>
                              <th>Avatar</th>
                              <th>Correo</th>
                              <th>Rol</th>
                              <th>Sede</th>
                              <th>Proyecto</th>
                              <th >#Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($this->model->Listar() as $r): ?>
                               <tr>
                                    <td>#</td>
                                    <td><a href="#"><?php echo $r->nombre_usuario; ?></a></h2></td>
                                    <td><img width="45px" src="files/fotos/<?php echo $r->ubicacion_foto; ?>"></span></td>
                                    <td><span><?php echo $r->email; ?></span></td>
                                    <td><?php 
                                        if ( $r->nivel == 1) {
                                            echo "Coordinador de proyecto";
                                        }elseif ($r->nivel == 0) {
                                            echo "Ejecutor de proyecto";
                                        }else{
                                        echo "Administrador";
                                        }?></button>
                                    </td>
                                    <td><span><?php echo $r->Sede_origen; ?></span></td>
                                    <td><span><?php
                                         if ( $r->nom_proyecto == ""  ) {
                                            echo "Sin asignar";
                                        }else {
                                            echo $r->nom_proyecto;
                                        }  ?></span></td>
                                    <td><a  onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=ejecutores&a=Eliminar&id_responsable_proyecto=<?php echo $r->id_responsable_proyecto; ?>" id="demo" class="btn btn-danger btn-circle btn-sm mg-b-10" href="#"><i class="fas fa-times-circle"></i> </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
           </div>
        </div>
    </div>




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
                                                       <select class=" btn btn-white form-control" name="id_usuario">
                                                        <option >Seleccionar opción</option>
                                                    <?php foreach($this->model->ListarEjecutoresSinAsignar() as $r): ?>
                                                        <option value="<?php echo $r->id_usuario ; ?>"><?php echo $r->nombre_usuario; ?></option>
                                                    <?php endforeach ?>
                                                      </select>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-8">
                                                    <div class="login-horizental">
                                                        <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Agregar</button>
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
</div>
    <!-- End Modal 3 -->     <!-- Modals 3-->
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
                                    <h3>Agregar usuario</h3>
                                    <p>Seleccione el docente que desea asignar</p>
                                    <form action="?c=Ejecutores&a=AgregarEjecutor" enctype="multipart/form-data" method="POST">
                                       <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="login2">User *</label>
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" name="user" class="form-control" placeholder="Nombre de usuario" />
                                                </div>
                                            </div>
                                        </div>
                                       <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="login2">Password *</label>
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="Password" name="password" class="form-control" placeholder="Clave de acceso" />
                                                </div>
                                            </div>
                                        </div>

                                       <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="login2">Nombre completo del usuario *</label>
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" name="nombre_usuario" class="form-control" placeholder="Nombre de usuario" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="login2">Telefono *</label>
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" name="telefono" class="form-control" placeholder="Nombre de la actividad" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="login2">Sexo *</label>
                                                </div>
                                                <div class="col-lg-12">
                                                   <select class=" btn btn-white form-control" name="sexo">
                                                    <option >Seleccione una opción</option>
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                  </select>                                                     
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="login2">DUI </label>
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" name="dui" class="form-control" placeholder="Numero de DUI" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                      <label class="control-label col-md-12 col-sm-12 col-xs-12" required="" for="first-name">Cargar documento<span class="required">*</span>
                                      </label>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input class="btn btn-primary" type="file" name="ubicacion_foto[]" id="ubicacion_foto[]">
                                      </div>
                                </div>
                                        
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="login2">Rol *</label>
                                                </div>
                                                <div class="col-lg-12">
                                                   <select class=" btn btn-white form-control" name="nivel">
                                                    <option >Seleccione una opción</option>
                                                    <option value="0">Ejecutor de proyecto</option>
                                                    <option value="1">Coordinador de proyectos</option>
                                                  </select>                                                     
                                                </div>
                                            </div>
                                        </div><div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="login2">Email </label>
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="email" name="email" class="form-control" placeholder="Correo electronico" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label class="login2">Sede *</label>
                                                </div>
                                                <div class="col-lg-12">
                                                   <select class=" btn btn-white form-control" name="Sede_origen">
                                                    <option >Seleccione una opción</option>
                                                    <option value="San Miguel">San Miguel</option>
                                                    <option value="Usulutan">Usulutan</option>
                                                  </select>                                                     
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-12"></div>
                                                <div class="col-lg-12">
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
</div>
    <!-- End Modal 3 -->
      <? } ?>