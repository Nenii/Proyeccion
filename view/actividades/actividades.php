<?if($_SESSION["nivel"]=="0"){?>
<div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="main-sparkline8-hd">
            <h3 class="m-0 font-weight-bold text-primary">Detalle de actividades</h3> <hr>
                <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#AsignarActividad1">
                  <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                  </span>
                  <span class="text">Asignar actividad</span>
                </a>
                <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#AgregarActividades">
                  <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                  </span>
                  <span class="text">Agregar actividad</span>
                </a>
                <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#AgregarGasto">
                  <span class="icon text-white-50">
                    <i class="fas fa-dollar-sign"></i>
                  </span>
                  <span class="text">Asignar gastos</span>
                </a>
                <a href="#" class="btn btn-secondary btn-icon-split"  data-toggle="modal" data-target="#Reporte">
                  <span class="icon text-white-50">
                    <i class="fas fa-file-download"></i>
                  </span>
                  <span class="text">Imprimir</span>
                </a>
        </div>
      </div>
    </div>
    <div class="admin-dashone-data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="container-fluid">
                       <div class="card">
                         <div  class="card-header">
                            <h2>Diagrama de actividades</h2> 
                         </div>
                          <div class="card-body">
                              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                              <script type="text/javascript">
                                google.charts.load('current', {'packages':['gantt']});
                                google.charts.setOnLoadCallback(drawChart);

                                function daysToMilliseconds(days) {
                                  return days * 24 * 60 * 60 * 1000;
                                }
                                function drawChart() {
                                  var data = new google.visualization.DataTable();
                                  data.addColumn('string', 'ID Actividad');
                                  data.addColumn('string', 'Actividad');
                                  data.addColumn('string', 'Responsable');
                                  data.addColumn('date', 'Fecha de inicio');
                                  data.addColumn('date', 'Fecha fin');
                                  data.addColumn('number', 'Duración');
                                  data.addColumn('number', '% Completado');
                                  data.addColumn('string', 'Dependencies');

                                  // Conversión de fechas
                                  <?php foreach($this->model1->ObtenerFinalizados($_REQUEST['id_proyecto']) as $r):

                                  $fecha = $r->fecha_inicio;
                                  $fecha2 = $r->fecha_fin;
                                  $fechaComoEntero = strtotime($fecha);
                                  $fechaComoEntero2 = strtotime($fecha2);

                                  $anio_Inicio = date("Y", $fechaComoEntero);
                                  $mes_Inicio = date("m", $fechaComoEntero);
                                  $dia_Inicio = date("d", $fechaComoEntero);

                                  $anio_Inicio2 = date("Y", $fechaComoEntero2);
                                  $mes_Inicio2 = date("m", $fechaComoEntero2);
                                  $dia_Inicio2 = date("d", $fechaComoEntero2);
                                    ?>
                                  data.addRows([
                                      <?php echo "
                                      ['$r->id_actividades', '$r->nom_actividad', ' $r->nombre_usuario', new Date($anio_Inicio, $mes_Inicio-1, $dia_Inicio), new Date($anio_Inicio2, $mes_Inicio2-1, $dia_Inicio2), null, 100, null]
                                      "; ?>
                                   ]);
                                  <?php endforeach; ?>
                                      var options = {
                                        height: 300,
                                        gantt: {
                                          trackHeight: 30
                                        }
                                      };
                                      var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

                                      chart.draw(data, options);
                                    }
                              </script>

                              <div id="chart_div"></div>
                          </div>
                       </div><br>
                       <div class="card">
                            <div class="card-header">
                                <h2>Detalle</h2>
                            </div> 
                            <div class="card-body">
                              <table class="table table-bordered" id="dataTable" cellspacing="0">
                                  <thead>
                                      <tr>
                                          <th data-field="id" >#</th>
                                          <th data-field="id" >Actividad</th>
                                          <th data-field="Ejecutor" >Ejecutor</th>
                                          <th data-field="Inicio" >Inicio</th>
                                          <th data-field="Actividad" >Finalización</th>
                                          <th data-field="gastos">$ Gastos</th>
                                          <th data-field="rango">#Estatus</th>
                                          <th data-field="action">Acciones</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php foreach($this->model1->ObtenerFinalizados($_REQUEST['id_proyecto']) as $r): ?>
                                      <tr>
                                          <td ><small>#</small></td>
                                          <td ><small><?php echo $r->nom_actividad; ?></small></td>
                                          <td ><small><?php echo $r->nombre_usuario; ?></small></td>
                                          <td ><small><?php echo $r->fecha_inicio; ?></small></td>
                                          <td ><small><?php echo $r->fecha_fin;?> </small><br>
                                          </td>
                                          <td >
                                             <small> <a href=""class="Primary mg-b-10" href="#">$ <?php echo $r->Gastos_totales;
                                              if ($r->Gastos_totales == 0) {
                                                   echo "00.00";
                                               } ?></a></small>
                                          </td>
                                          <td >
                                              <?php 
                                              if ($r->TIPO == 'COMPLETADO') { ?> 
                                                      <small><?php echo "100%";?> </small><?php
                                                  }    
                                              elseif ($r->Estatus == 'VENCIDO' AND  $r->TIPO == 'ACTIVO') {?>
                                                  <div class="progress">
                                                      <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" style="width: <?php echo $r->Progreso/$r->Dias_totales*100; ?>%"  role="progressbar" aria-valuenow="<?php echo $r->Progreso; ?>" values="<?php
                                                       echo bcdiv($r->Progreso, $r->Dias_totales, 1) ?>" aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                           <?php } else{ ?>
                                                  <div class="progress">
                                                      <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" style="width: <?php echo $r->Progreso/$r->Dias_totales*100; ?>%"  role="progressbar" aria-valuenow="<?php echo $r->Progreso; ?>" values="<?php
                                                       echo bcdiv($r->Progreso, $r->Dias_totales, 1) ?>" aria-valuemin="0" aria-valuemax="100">
                                                      </div>
                                                  </div>
                                              <?php }
                                                    if ($r->TIPO == 'COMPLETADO') {?><br>
                                                          <div class="progress">
                                                              <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                                          </div>
                                                        
                                                      <?php }
                                                    else if ($r->Progreso >= $r->Dias_totales  )
                                                      {
                                                          ?> <small><?php echo "100 % Completado";?> </small><?php
                                                      }
                                                      else if ($r->Progreso <= 0) {
                                                        echo "0 % ";
                                                        echo $r->Estatus;
                                                      }
                                                      else if ($r->Dias_totales != 0 and $r->Dias_totales >= 0)
                                                      {
                                                        echo bcdiv($r->Progreso/$r->Dias_totales*100  , '1', 1) ?> % 
                                                   <?php   echo $r->Estatus;
                                                      }?> 
                                          </td>
                                          <td>
                                               <a   onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" data-toggle="tooltip" data-placement="bottom" title="Eliminar proyecto" class="badge badge-danger btn-circle btn-sm" href="?c=actividades&a=Eliminar&id_responsable_actividad=<?php echo $r->id_responsable_actividad; ?>"><i class="fas fa-times"></i></a>
                                              <?php if ($r->TIPO <> 'COMPLETADO') {
                                               ?>
                                               <a id="demo" onclick="javascript:return confirm('¿Seguro de finalizar este proyecto?');" data-toggle="tooltip" data-placement="bottom" title="Finalizar proyecto" class="badge badge-primary btn-circle btn-sm" href="?c=actividades&a=Finalizar&id_responsable_actividad=<?php echo $r->id_responsable_actividad; ?>"><i class="fas fa-hourglass-end"></i></a>
                                             <?php } ?>
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
  <? }   else {  }?>