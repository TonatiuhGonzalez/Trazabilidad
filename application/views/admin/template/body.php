<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="mt-2 ml-1 mr-1">
      <div class="box-body">
        <div class="container-fluid ">
          <div class="row mt-3 bg-info text-white justify-content-between ">

            <div class="p-2">
              <ol class="breadcrumb bg-white float-right mt-2">             
                <li class="text-secondary"> Menú Principal</li>
              </ol>
            </div>

          </div>
        </div>
        <div class="row mt-2">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box Venvur-1">
              <div class="inner">
                <?php $num = 0;
                if (!empty($unidadesc)) {
                  foreach ($unidadesc as $unidadc) {
                    $num += 1;
                  }
                } ?>

                <h3 class="text-white"><?php echo $num ?> </h3>

                <p class="text-white">Unidades producidas activas(Reproductores): </p>
                <?php if (!empty($unidadesc)) {
                  foreach ($unidadesc as $unidadc) {
                ?>
                    <h6 class="text-white"><?php echo $unidadc->Rep_identificador_unico ?></h6>
                <?php }
                } ?>

              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box Uccr-1">
              <div class="inner">
                <?php $num2 = 0;
                if (!empty($unidadescr)) {
                  foreach ($unidadescr as $unidadcr) {
                    $num2 += 1;
                  }
                } ?>
                <h3 class="text-white"><?php echo $num2 ?> </h3>

                <p class="text-white">Unidades producidas activas (Hormonado)</p>
                <?php if (!empty($unidadescr)) {
                  foreach ($unidadescr as $unidadcr) {
                ?>
                    <h6 class="text-white"><?php echo $unidadcr->Cri_identificador_unico ?></h6>
                <?php }
                } ?>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box Vlucear-1">
              <div class="inner">
                <?php $num3 = 0;
                if (!empty($unidadesen)) {
                  foreach ($unidadesen as $unidaden) {
                    $num3 += 1;
                  }
                } ?>
                <h3 class="text-white"><?php echo $num3 ?></h3>

                <p class="text-white">Unidades producidas activas(Engorda)</p>
                <?php if (!empty($unidadesen)) {
                  foreach ($unidadesen as $unidaden) {
                ?>
                    <h6 class="text-white"><?php echo $unidaden->En_identificador_unico ?></h6>
                <?php }
                } ?>

              </div>
              <!-- <div class="icon">
              <i class="ion ion-person-add"></i>
            </div> -->
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div> -->
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Insumos Alimentarios (Kg)
                </h3>
                <div class="card-tools">

                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: relative;">
                    <canvas id="Temperatura" class="chart-container" width="533" height="266" style="display: block; width: 533px; height: 266px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
          </section>
          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Insumos Médicos (g)
                </h3>
                <div class="card-tools">

                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: relative;">
                    <canvas id="medico" class="chart-container" width="533" height="266" style="display: block; width: 533px; height: 266px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
          </section>


        </div>

      </div>
    </div>


    <!-- /.card -->
  </section>
  <!-- /.Left col -->
  <!-- right col (We are only adding the ID to make the widgets sortable)-->

  <!-- right col -->
</div>
<!-- /.row (main row) -->


<script>
  // en esta parte obtengo todos los nombres de los insumos y los guardo en un array 
  var ninsu = [<?php if (!empty($insumosa)) {
                  $ar = array();
                  foreach ($insumosa as $insumo) {
                    array_push($ar, $insumo->Ia_nombre_comercial);
                  }
                  $resultados = array_unique($ar);
                  $se = implode("','", $resultados);
                  echo "'" . $se . "'";
                }
                ?>]
  var ninme = [<?php if (!empty($imedico)) {
                  $ar2 = array();
                  foreach ($imedico as $insumom) {
                    array_push($ar2, $insumom->Inm_nombre_comercial);
                  }
                  $resultadosm = array_unique($ar2);
                  $se2 = implode("','", $resultadosm);
                  echo "'" . $se2 . "'";
                }
                ?>]


  <?php if (!empty($insumosa)) {
    foreach ($resultados as $s) {
      $kgia = 0
  ?>
      var data<?php echo $s ?> = [<?php if (!empty($insumosa)) {

                                    foreach ($insumosa as $insumo) {
                                      if ($insumo->Ia_nombre_comercial == $s) {
                                        $kgia += $insumo->Pro_insu_cantidad_total;
                                      }
                                    }
                                  ?>
          <?php echo "'" . $kgia . "'"; ?>
        <?php



                                  }
        ?>
      ]

      // var datef2 = datef   
      // var temp2 = temp
  <?php }
  } ?>

  <?php
  if (!empty($imedico)) {
    foreach ($resultadosm as $rm) {
      $gim = 0
  ?>
      var data<?php echo $rm ?> = [<?php if (!empty($imedico)) {

                                      foreach ($imedico as $insumom) {
                                        if ($insumom->Inm_nombre_comercial == $rm) {
                                          $gim += $insumom->Pro_insu_medico_cantidad_total;
                                        }
                                      }
                                    ?>
          <?php echo "'" . $gim . "'"; ?>
        <?php



                                    }
        ?>
      ]

      // var datef2 = datef   
      // var temp2 = temp
  <?php }
  } ?>

  var ctx = document.getElementById('Temperatura');
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {

      datasets: [{

        data: [<?php
                if (!empty($insumosa)) {
                  foreach ($resultados as $s) {
                    echo 'data' . $s . ',';
                  }
                } ?>],
        backgroundColor: [
          <?php $suma = 0;
          if (!empty($insumosa)) {
            foreach ($resultados as $s) {
              $suma += 1;
              switch ($suma) {
                case 1:
                  echo "'rgba(67, 142, 175)'" . ',';
                  break;
                case 2:
                  echo "'rgba(67, 175, 68)'" . ',';
                  break;
                case 3:
                  echo "'rgba(0, 0, 0, 0.1)'" . ',';
                  break;
                case 4:
                  echo "'rgba(255, 99, 132, 1)'" . ',';
                  break;
              }
            }
          } ?>
        ],
        label: 'helloworld'
      }],
      labels: [<?php if (!empty($insumosa)) {
                  foreach ($resultados as $s) {
                    echo "'" . $s . "',";
                  }
                }
                ?>]
    },
    options: {
      responsive: true,
      scales: {
        yAxes: []
      }
    }
  });

  var ctx = document.getElementById('medico');
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {

      datasets: [{

        data: [<?php
                if (!empty($imedico)) {
                  foreach ($resultadosm as $s2) {
                    echo 'data' . $s2 . ',';
                  }
                } ?>],
        backgroundColor: [
          <?php $suma = 0;
          if (!empty($imedico)) {
            foreach ($resultadosm as $s2) {
              $suma += 1;
              switch ($suma) {
                case 1:
                  echo "'rgba(67, 142, 175)'" . ',';
                  break;
                case 2:
                  echo "'rgba(67, 175, 68)'" . ',';
                  break;
                case 3:
                  echo "'rgba(0, 0, 0, 0.1)'" . ',';
                  break;
                case 4:
                  echo "'rgba(255, 99, 132, 1)'" . ',';
                  break;
              }
            }
          } ?>
        ],
        label: 'helloworld'
      }],
      labels: [<?php
                if (!empty($imedico)) {
                  foreach ($resultadosm as $s2) {
                    echo "'" . $s2 . "',";
                  }
                }
                ?>]
    },
    options: {
      responsive: true,
      scales: {
        yAxes: []
      }
    }
  });
</script>