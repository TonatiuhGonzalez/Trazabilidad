<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Vlimpc-1">
                    <div class="row mt-3 Vlimpc-1 text-white justify-content-between ">

                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">

                                <li class="text-info active mr-1">Hormonado <i>|</i></li>
                                <li class="text-info active mr-1">Unidades Enviadas<i> |</i></li>
                                <li class="text-info mr-1">Histórico <i>|</i></li>
                                <li class="text-info mr-1"><?php echo $id_ul[0]->Ue_identificador_unico_logistico ?> <i>|</i></li>
                                <li class="text-info mr-1"><?php echo  $uc->Cri_identificador_unico ?> <i>|</i></li>
                                <li class="text-secondary">Limpieza y Desinfección</li>

                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card text-center border-info">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a data-toggle="tooltip" data-placement="top" title="Reproductores" class="nav-link " href="<?php echo base_url() ?>Uc" type="button" id="reproduccion">
                                    <span class=" Vlimpc-2 fas fa-venus-mars"></span> </a>
                            </li>
                            <li class="nav-item ">
                                <a data-toggle="tooltip" data-placement="top" title="Hormonado" class="nav-link active " href="<?php echo base_url() ?>Uccr" type="button" id="crianza">
                                    <span class="fas fa-baby-carriage"></span> </a>
                            </li>

                            <li class="nav-item ">
                                <a data-toggle="tooltip" data-placement="top" title="Engorda" class="nav-link " href="<?php echo base_url() ?>Uen" type="button">
                                    <span class="Vlimpc-2 fas fa-user-graduate"></span> </a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-first">

                            <div class="p-2">
                                <a data-toggle="tooltip" data-placement="top" title="Regresar" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Vvueacr/<?php echo base64_encode($id_ul[0]->Id_unidad_enviada)?>" type="button">
                                    <span class="fas fa-arrow-alt-circle-left">
                                    </span> <span class="fas fa-archive">  </a>
                            </div>

                        </div>

                        <p class="text-center font-weight-bold"><?php if (!empty($historial)) {
                                                                    $tnqnombre = array();
                                                                    foreach ($historial as $ht) {
                                                                        array_push($tnqnombre, $ht->Tnq_nombre);
                                                                    }
                                                                    $resultado = array_unique($tnqnombre);
                                                                    $se = implode(",", $resultado);
                                                                    echo $se;
                                                                } ?></p>

                        <div class="row">
                            <div class="col-md-12 mt-4">

                                <table id="table" class="table table-bordered btn-hover">
                                    <thead>
                                        <tr>
                                            <th class="Vlimpc-1 text-white">Usuario</th>
                                            <th class="Vlimpc-1 text-white">Fecha </th>

                                        </tr>
                                    <tbody id="cuerpotabla">
                                        <?php if (!empty($tanques)) {
                                            foreach ($tanques as $tanque) {
                                        ?>
                                                <tr>

                                                    <td> <?php echo strtoupper($tanque->Usu_nombre . ' '
                                                                . $tanque->Usu_apellido_paterno . ' ' . $tanque->Usu_apellido_materno) ?></td>
                                                    <td> <?php echo date("d/m/Y g:i A", strtotime($tanque->Fecha_limpieza)) ?></td>


                                                </tr>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>

                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>