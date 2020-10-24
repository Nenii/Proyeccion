   <?if($_SESSION["nivel"]=="0"){?>
<div class="container-fluid">
<h2>Finanzas</h2>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach($this->model->GastoTOP5() as $r): ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">                        
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="progress-circular1">
                                        <input type="text" class="knob" value="0" data-rel="<?php echo $r->Progreso?>" data-linecap="round" data-width="150" data-bgcolor="#999" data-fgcolor="#4e73df" data-thickness=".10" data-readonly="true" disabled>
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="progress-circular1">
                                       <center><span class="m-0  text-primary">Presupuesto</span> $<?php echo $r->presupuesto ?>
                                        <p><span class="m-0  text-primary">Gastos </span><br>$<?php echo $r->total_gasto ?></p>
                                        <p class="m-0  text-primary"><?php echo $r->periodo ?></a></p></center>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    <?php endforeach ?>
                </div>  
            </div>
        </div>
    </div>
</div>
<!-- Data table area Start-->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="admin-dashone-data-table-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline8-list shadow-reset">
                                <div class="sparkline8-hd">
                                    <div class="x_title">
                                        <h2>Gastos | <span><?php echo (new \DateTime())->format('Y'); ?></span><a  href="javascript:window.print()"></a></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="sparkline8-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th data-field="id">Nombre Proyecto</th>
                                                        <th data-field="email" data-editable="true">Responsable</th>
                                                        <th data-field="company" data-editable="true">Codigo
                                                        <th data-field="name" data-editable="true">Presupuesto</th>
                                                        <th data-field="date" data-editable="true">Gastos</th>
                                                        <th data-field="price" data-editable="true">Disponible ($)</th>
                                                        <th style="width: 10%" data-field="task" data-editable="true">Disponible (%)</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($this->model->Listar() as $r): ?>
                                                        <tr>
                                                            <td><?php echo $r->nom_proyecto; ?></td>
                                                            <td><?php echo $r->nom_responsable; ?></td>
                                                            <td>PS0<?php echo $r->cod_proyecto; ?></td>
                                                            <td>$ <?php echo $r->presupuesto; ?></td>
                                                            <td>$ <?php echo $r->gastos; ?></td>
                                                            <td>$ <?php echo $r->diferencia; ?></td>
                                                            <td><?php 
                                                                if ($r->diferencia == "") { echo "0%";} else { ?>   
                                                                        <?php echo bcdiv(($r->gastos/$r->presupuesto)*100,'1',1) ?>%<?php } ?>
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
<!-- Data table area End-->
  <? } 
   else { ?>
      <div style="font:bold 12pt arial;color:red;padding:30px">
      </div>
    <? }?>
                       

                       
                 