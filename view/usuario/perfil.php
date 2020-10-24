<div class="container-fluid">
     <div class="col-md-4 col-sm-4  col-md-4">
        <a href="#"  data-toggle="modal" data-target="#Agregarfoto" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-arrow-right"></i>
          </span>
          <span class="text">Editar perfil</span>
        </a>
      </div> <br>
    <div class="col-md-12 col-sm-12  col-md-12">
       <div class="sparkline8-list shadow-reset">
          <div class="sparkline8-hd"><div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-3 mb-12">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2  rounded-circle">
                        <img style="width: 100%"src="files/fotos/<?php echo $alm->ubicacion_foto; ?>"> 
                    </div>
                  </div>
                  <br>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-9 col-md-9 mb-12">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-ms font-weight-bold text-info text-uppercase mb-1">Información</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Usuario: </div>
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        <?php echo $alm->user; ?> </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Estado: </div>
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        <?php if ( $alm->estado ==1) {
                          echo "Activo";
                        } ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Nombre: </div>
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $alm->nombre_usuario; ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Sede: </div>
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $alm->Sede_origen; ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rol: </div>
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php 
                      if ($alm->nivel == 0) {
                         echo "Ejecutor de proyectos";
                       } elseif ($alm->nivel == 1) {
                         echo "Director de proyectos";
                       } ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Correo electrónico: </div>
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> <?php echo $alm->email; ?> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-info-circle fa-3x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



          </div>
<div id="Agregarfoto"  aria-labelledby="myLargeModalLabel"  class="modal modal-adminpro-general default-popup-PrimaryModal " role="dialog">
                
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                        <div class="modal-body">
                            <div class="modal-login-form-inner">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="basic-login-inner modal-basic-inner">
                                            <h3>Editar información</h3><hr>
                                            <form action="?c=Usuario&a=ActualizarFoto" method="POST" enctype="multipart/form-data">
                                                
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                      <div class="col-lg-12">
                                                          <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Usuario <span class="required"></span>
                                                          </label>
                                                           <div class="col-md-12 col-sm-12 col-xs-12">
                                                              <select class="form-control" name="id_usuario">
                                                                  <option value="<?php echo $alm->id_usuario; ?>"><?php echo $alm->user; ?></option>
                                                              </select>
                                                          </div>
                                                      </div>
                                                      <div class="col-lg-12">
                                                          <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Password <span class="required"></span>
                                                          </label>
                                                           <div class="col-md-12 col-sm-12 col-xs-12">
                                                              <input type="password" name="cod_proyecto" required value="<?php echo $alm->password; ?>" class="form-control" >
                                                              </div>
                                                          </div>
                                                      <div class="col-lg-12">
                                                          <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Nombre <span class="required"></span>
                                                          </label>
                                                           <div class="col-md-12 col-sm-12 col-xs-12">
                                                              <input type="text" name="cod_proyecto" required value="<?php echo $alm->nombre_usuario; ?>" class="form-control" >
                                                              </div>
                                                          </div>
                                                      </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                              <label for="exampleFormControlFile1">Seleccione la foto *</label>
                                                                <input required class="btn btn-primary" type="file" name="ubicacion_foto[]" id="ubicacion_foto[]">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>

                                                <div class="login-btn-inner">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12"></div>
                                                        <div class="col-lg-12">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12"></div>
                                                        <div class="col-lg-12">
                                                            <div class="login-horizental">
                                                                <input type="submit" class="btn btn-primary  btn-ms"  value="Guardar">

                                                                
                                                                <a href="#" class="btn btn-danger btn-icon-split">
                                                                  <span class="icon text-white-50">
                                                                    <i class="fas fa-close"></i>
                                                                  </span>
                                                                  <span class="text">Cancelar</span>
                                                              </a>
                                                            </div>
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