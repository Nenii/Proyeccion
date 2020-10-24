<!-- MODALS -->
        <!-- Modal1 Nueva Actividad!-->
		<div id="PrimaryModalalert" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2>Nueva Actividad!</h2>
                        <form action="?c=Actividades&a=Guardar" method="get">
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="login2">Nombre *</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" name="nom_actividad" class="form-control" placeholder="Nombre de la actividad" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="login2">Objetivo *</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="objetivo" placeholder="Objetivo de la actividad" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="login2">Descripción *</label>
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
        <!-- Modal1 Nueva Actividad! end -->

    <!-- Modal2  AsignarActividad1-->
        <div id="AsignarActividad1" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2>Asignar actividad!</h2>
                        <form action="?c=Actividades&a=Asignar" method="POST">
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="login2">Actividad *</label>
                                    </div>
                                    <div class="col-lg-12">
                                        <select class="custom-select form-control"  name="id_actividad">
                                              <option selected>Seleccione la actividad</option>
                                            <?php foreach($this->model1->Listar() as $r): ?>
                                            <option name="id_actividad"  value="<?php echo $r->id_actividades; ?>"><?php echo $r->nom_actividad; ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="login2">Ejecutor *</label>
                                    </div>
                                    <div class="col-lg-12">
                                        <select class="custom-select form-control" name="id_responsable_proyecto">
                                              <option selected>Seleccione la ejecutor</option>
                                            <?php foreach($this->model1->ListarEjecutorAsignados($_REQUEST['id_proyecto']) as $r): ?>
                                            <option  value="<?php echo $r->id_responsable_proyecto; ?>"><?php echo $r->nombre_usuario ; ?></option>
                                        <?php endforeach; ?>
                                        </select>                                
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner">
                                    <div class="row">
                                         <div class="col-lg-12">
                                            <label class="login2">Fecha Inicio *</label>
                                        </div>
                                        <div class="form-group col-lg-12" id="data_3">
                                                <input type="date" class="form-control"  name="fecha_inicio" placeholder="10/11/2013">                                      
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group-inner">
                                <div class="row">
                                     <div class="col-lg-12">
                                        <label class="login2">Fecha fin *</label>
                                    </div>
                                    <div class="form-group col-lg-12" id="data_3">
                                            <input type="date" class="form-control"  name="fecha_fin" placeholder="10/11/2013">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner">
                                <div class="row">
                                     <div class="col-lg-12">
                                        <label class="login2">Descripcion *</label>
                                    </div>
                                    <div class="form-group col-lg-12" id="data_3">
                                            <input type="text" class="form-control"  name="descripcion" placeholder="Inserte descripción....">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="login2">Estado *</label>
                                    </div>
                                    <div class="col-lg-12">
                                        <select class="custom-select form-control"  name="TIPO">
                                              <option    selected>Seleccione estado</option>
                                            <option  value="ACTIVO">Activo</option>
                                            <option  value="COMPLETADO">Completado</option>
                                        </select>                                
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-inner">
                                <div class="col-lg-12"></div>
                                <div class="col-lg-12">
                                    <div class="login-horizental"> <br>
                                        <button class="btn btn-primary login-submit-cs" type="submit">Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    <!-- end Modal AsignarActividad1 -->
    <!-- Modals Agregar Activida-->
        <div id="AgregarActividad"  aria-labelledby="myLargeModalLabel"  class="modal modal-adminpro-general default-popup-PrimaryModal " role="dialog">
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
                                        <h3>Agrear gastos</h3>
                                        <p>Agrega a esta actividad el gasto que se realizo</p>
                                        <form action="#">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="login2">Actividades </label>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="text" name="id_actividad" class="form-control" placeholder="Agregar actividad" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="login2">Responsable</label>
                                                    </div>
                                                    <div class="col-lg-12">

                                                        <input type="date" name="id_responsable_proyecto" class="form-control" placeholder="Docente ejecutor" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="login2">Inicio</label>
                                                    </div>
                                                    <div class="col-lg-12">
                                                    <div class="row">
                                                         <div class="col-lg-12">
                                                            <label class="login2">Fecha Inicio *</label>
                                                        </div>
                                                        <div class="form-group col-lg-12" id="data_3">
                                                                <input type="date" class="form-control" name="fecha_inicio" placeholder="10/11/2013">
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="login2">Fin  </label>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="text" name="fecha_fin" class="form-control" placeholder="Fin de la actividad" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="login2">Tipo  </label>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="text" name="TIPO" class="form-control" placeholder="Tipo" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="login2">Descripcion   </label>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" name="descripcion" placeholder="Agregar descripcion" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="login-btn-inner">
                                                <div class="row">
                                                    <div class="col-lg-12"></div>
                                                    <div class="col-lg-12">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12"></div>
                                                    <div class="col-lg-12">
                                                        <div class="login-horizental">
                                                            <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Agregar</button>
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
        <!-- Modals -->

        <!-- Modals Gastos-->
        <div id="AgregarGasto"  aria-labelledby="myLargeModalLabel"  class="modal modal-adminpro-general default-popup-PrimaryModal " role="dialog">
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
                                        <h3>Asignar gastos</h3>
                                        <p>Seleccione a actividad y la persona a aqui desea asignar</p>
                                        <form action="?c=gasto&a=Guardar" method="POST">
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="login2">Actividades</label>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <select class="custom-select form-control" name="id_res_act">
                                                            <option selected>Seleccione la ejecutor</option>
                                                                <?php foreach($this->model1->ObtenerFinalizados($_REQUEST['id_proyecto']) as $r): ?>
                                                            <option value="<?php echo $r->id_responsable_actividad; ?>"><?php echo $r->nom_actividad ." | " . $r->nombre_usuario ." | " . $r->fecha_inicio  ; ?></option>
                                                                <?php endforeach; ?>
                                                        </select>                                
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="login2">Fecha *</label>
                                                    </div>
                                                    <div class="col-lg-12">
                                                            <input type="date" class="form-control" name="fecha" placeholder="10/11/2013">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label class="login2">Monto *</label>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="text" name="monto" class="form-control" placeholder="$ ..." />
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label class="login2">Descripción </label>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="text" name="descripcion" class="form-control" placeholder="Descripción" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="login-btn-inner">
                                                <div class="row">
                                                    <div class="col-lg-12"></div>
                                                    <div class="col-lg-12">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12"></div>
                                                    <div class="col-lg-12">
                                                        <div class="login-horizental"><br>
                                                            <button class="btn btn-primary login-submit-cs" type="submit">Agregar</button>
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
        <!-- Modals -->
        <!-- Modals Gastos-->
            <div id="AgregarActividades"  aria-labelledby="myLargeModalLabel"  class="modal modal-adminpro-general default-popup-PrimaryModal " role="dialog">
                
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
                                            <h3>Agregar actividades</h3>
                                            <p>Seleccione a actividad y la persona a aqui desea asignar</p>
                                            <form action="?c=actividades&a=Guardar" method="POST">
                                                
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <label class="login2">Nombre actividad *</label>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <input type="text" name="nom_actividad" class="form-control" placeholder="Nombre actividad" />
                                                        </div>
                                                    </div>
                                                </div><div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <label class="login2">Objetivo *</label>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <input type="text" name="objetivo" class="form-control" placeholder="Objetivo actividad" />
                                                        </div>
                                                    </div>
                                                </div><div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <label class="login2">Descripción *</label>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <input type="text" name="descripcion" class="form-control" placeholder="Descripción actividad" />
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
                                                                <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Agregar</button>
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
        <!-- End Modals AgregarActividades-->

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
                                            <h3>Agregar actividades</h3>
                                            <p>Seleccione a actividad y la persona a aqui desea asignar</p>
                                            <form action="?c=actividades&a=Guardar" method="POST">
                                                
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <label class="login2">Nombre actividad *</label>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <input type="text" name="nom_actividad" class="form-control" placeholder="Nombre actividad" />
                                                        </div>
                                                    </div>
                                                </div><div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <label class="login2">Objetivo *</label>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <input type="text" name="objetivo" class="form-control" placeholder="Objetivo actividad" />
                                                        </div>
                                                    </div>
                                                </div><div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <label class="login2">Descripción *</label>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <input type="text" name="descripcion" class="form-control" placeholder="Descripción actividad" />
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
                                                                <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Agregar</button>
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