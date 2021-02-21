
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h2>Nuevo Proyecto</h2>
  </div>
  <p>En este apartado debe colocar la información solicitada sobre el proyecto que desea agregar.</p>
</div>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
           <div class="col-md-122 col-sm-122 col-xs-12">
                <div id="step-1">
                    <h2 class="StepTitle">Información sobre el Proyecto</h2> <br>
                        <form class="form-horizontal form-label-left" method="post" action="?c=Proyecto&a=Guardar" enctype="multipart/form-data" name="frmProyectos">
                                <div class="form-group">
                                      <label class="control-label col-md-122 col-sm-122 col-xs-12" for="first-name">Nombre del proyecto <span class="required">*</span>
                                      </label>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" name="nom_proyecto" required="" class="form-control" >
                                      </div>
                                </div>
                                
                                <div class="form-group">
                                      <label for="middle-name" class="control-label col-md-12 col-sm-12 col-sm-12 col-xs-12">Sede<span class="required">*</span></label>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                          <select class="form-control" name="sede">
                                          <option value="SM" >San Miguel</option>
                                          <option value="USU" >Usulutan</option>
                                          </select>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Categoria <span class="required">*</span>
                                      </label>
                                       <div class="col-md-12 col-sm-12 col-xs-12">
                                          <select class="form-control" name="id_categoria">
                                            <?php foreach($this->model->ListarCategoria() as $r): ?>
                                              <option value="<?php echo $r->id_categoria;?>" ><?php echo $r->nom_categoria; ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Facultad <span class="required">*</span>
                                      </label>
                                       <div class="col-md-12 col-sm-12 col-xs-12">
                                          <select class="form-control" name="id_facultad">
                                            <?php foreach($this->model->ListarFacultades() as $r): ?>
                                              <option value="<?php echo $r->id_facultad;?>" ><?php echo $r->nom_facultad; ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Seleccione beneficiarios<span class="required">*</span>
                                      </label>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                          <select class="form-control" name="id_beneficiarios">
                                            <?php foreach($this->model->ListarBeneficiarios() as $r): ?>
                                              <option value="<?php echo $r->id_beneficiarios; ?>"><?php echo $r->nom_comunidad_ben; ?></option> agregar
                                            <?php endforeach; ?>
                                          </select> <a class=" btn" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#AgregarBeneficiarios">Agregar beneficiarios <i class="fa fa-plus"></i></a>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label for="middle-name" class="control-label col-md-12 col-sm-12 col-xs-12">Presupuesto $
                                      <span class="required">*</span></label>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                              <input type="text" class="form-control" name="monto" required="" placeholder="$000.00" >
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Fecha inicio<span class="required">*</span>
                                      </label>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="date" class="form-control" required="" name="inicio_proy" placeholder="10/11/2013">
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Fecha Fin<span class="required">*</span>
                                      </label>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                          <input type="date" class="form-control"required="" name="final_proy" placeholder="10/11/2013">
                                      </div>
                                </div>

                                <div class="form-group">
                                      <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Año<span class="required">*</span>
                                      </label>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="btn-group ">
                                                    <select class=" btn" name="periodo" id="sel1">
                                                    
                                                      <?php
                                                      for ($i=2010; $i <= (new \DateTime())->format('Y') ; $i++) { ?>
                                                        <option selected><?php echo $i;?> </option> <?php
                                                        }
                                                      ?>
                                                      <option value=""><?php echo (new \DateTime())->format('Y') +1?></option>
                                                    </select>
                                              </div>
                                      </div>
                                </div>
                                
                                
                                <div class="form-group">
                                      <label for="middle-name" class="control-label col-md-12 col-sm-12 col-sm-12 col-xs-12">Código de proyecto<span class="required">*</span></label>
                                      <div class="col-md-12 col-sm-12 col-xs-12">PSO
                                            <div class="btn-group ">
                                              <input type="text" name="cod_proyecto" required="" placeholder="001" class="form-control" >
                                              </div>
                                      </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="control-label col-md-12 col-sm-12 col-xs-12">Estatus<span class="required">*</span></label>
                                    

                                      <div class="custom-control custom-radio" required>
                                        <input type="radio" id="customRadio1"  name="estado" value="1"class="custom-control-input active">
                                        <label class="custom-control-label" for="customRadio1">En curso</label>
                                      </div>
                                      <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2"  name="estado" value="2" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio2">Finalizado</label>
                                      </div>
                                             
                                </div>
                                <div class="form-group">
                                      <label class="control-label col-md-12 col-sm-12 col-xs-12" required="" for="first-name">Cargar documento<span class="required">*</span>
                                      </label>
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input class="btn btn-primary" type="file" name="ubicacion[]" id="ubicacion[]">
                                      </div>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>
                                <div class="col-md-12 col-sm-12 col-xs-12"></div>

                            <button type="submit" name="submit" class="btn btn-info">Registrar</button>
                        </form>
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
                       <form action="?c=Beneficiario&a=Guardar" method="post">
                              <label class="control-label col-md-122 col-sm-12 col-xs-12" for="first-name">Nombre de la comunidad Beneficiaria<span class="required">*</span>
                              </label>
                              <input type="text" required="required" name="nom_comunidad_ben" class="form-control col-md-12 col-xs-12">
                              <label class="control-label col-md-122 col-sm-12 col-xs-12" for="last-name">Numero de personas<span class="required">*</span>
                             </label>
                              <input type="text"  name="n_personas_ben" required="required" class="form-control col-md-12 col-xs-12"> <br><br><br><br><br><br><br>
                              <button type="submit" class="btn"  name="Guardar"> Guardar</button>
                              <!-- <input type="submit" name="Guardar"> -->

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Modal1 end -->


    <!-- Modals -->
<div id="AgregarBeneficiarios" class="modal modal-adminpro-general default-popup-PrimaryModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-body">
                    <h2>Agregar comunidad beneficiaria!</h2>
                    <form action="?c=Beneficiario&a=Guardar" method="post" id="AddBeneficiario">

                              <label class="control-label col-md-122 col-sm-12 col-xs-12" for="first-name">Nombre de la comunidad Beneficiaria <span class="required">*</span>
                              </label>
                              <input type="text" required="required" name="nom_comunidad_ben" required class="form-control col-md-12 col-xs-12">
                              <label class="control-label col-md-122 col-sm-12 col-xs-12" for="last-name">Numero de personas <span class="required">*</span>
                             </label>
                              <input type="number"  name="n_personas_ben" required class="form-control col-md-12 col-xs-12"><br>
                              <input type="submit" name="Guardar" class="btn btn-primary" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
</div>
    <!-- End Modals1 -->

    <!-- Modals 2 -->
      <!-- <div id="WarningModalalert" class="modal modal-adminpro-general Customwidth-popup-WarningModal fade" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-close-area modal-close-df">
                      <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                  </div>
                  <div class="modal-body">
                      <span class="adminpro-icon  modal-check-pro information-icon-pro"><i class="fa fa-check-circle"></i></span>
                      <h2>Agregar Docente ejecutor!</h2>
                      <form action="#Holis" method="post" id="AddBeneficiario">

                              <label class="control-label col-md-122 col-sm-12 col-xs-12" for="first-name">Nombre de la comunidad Beneficiaria<span class="required">*</span>
                              </label>
                              <input type="text" required="required" name="nom_comunidad_ben" class="form-control col-md-12 col-xs-12">
                              <label class="control-label col-md-122 col-sm-12 col-xs-12" for="first-name">Nombre de la comunidad Beneficiaria<span class="required">*</span>
                              </label>
                              <input type="text" required="required" name="nom_comunidad_ben" class="form-control col-md-12 col-xs-12">
                              <label class="control-label col-md-122 col-sm-12 col-xs-12" for="first-name">Nombre de la comunidad Beneficiaria<span class="required">*</span>
                              </label>
                              <input type="text" required="required" name="nom_comunidad_ben" class="form-control col-md-12 col-xs-12">
                              <label class="control-label col-md-122 col-sm-12 col-xs-12" for="last-name">Numero de personas<span class="required">*</span>
                             </label>
                              <input type="text"  name="n_personas_ben" required="required" class="form-control col-md-12 col-xs-12">
                              <input type="submit" name="Guardar"  value="Submit">
                    </form>
                  </div>
                  <div class="modal-footer">
                      <a data-dismiss="modal" href="#">Cancel</a>
                      <a href="#" type="submit"> Process</a>
                  </div>
              </div>
          </div>
      </div> -->


<!-- End Modals 2 -->
