<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="container-fluid">
            <div class="mt-2 ml-1 mr-1">
                <div class="box-body">
                    <div class="container-fluid Uccr-1">
                        <div class="row mt-3 Uccr-1 text-white justify-content-between ">

                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                    <li class="text-info mr-1">Hormonado<i> |</i> </li>
                                    <li class="text-secondary"> Unidades Producidas </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="card text-center border-info">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a data-toggle="tooltip" data-placement="top" title="Reproductores" class="nav-link " href="<?php base_url() ?>Uc" type="button" id="reproduccion">
                                        <span class="Uccr-2 fas fa-venus-mars"></span> </a>
                                </li>
                                <li class="nav-item ">
                                    <a data-toggle="tooltip" data-placement="top" title="Hormonado" class="nav-link active " href="<?php base_url() ?>Uccr" type="button" id="crianza">
                                        <span class="fas fa-baby-carriage"></span> </a>
                                </li>

                                <li class="nav-item ">
                                    <a data-toggle="tooltip" data-placement="top" title="Engorda" class="nav-link " href="<?php base_url() ?>Uen" type="button">
                                        <span class="Uccr-2 fas fa-user-graduate"></span> </a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-first">

                                <div class="p-2">
                                    <a data-toggle="tooltip" data-placement="top" title="Nueva Unidad" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Vaucom" type="button">
                                        <span class="fa fa-plus"></span> <span class="fas fa-baby-carriage"></span> </a>
                                </div>
                                <!-- <div class="p-2">
                                    <a data-toggle="tooltip" data-placement="top" title="Unidades Recibidas" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Vgurc" type="button">
                                        <span class="fas fa-cart-arrow-down"> </a>
                                </div> -->
                                <div class="p-2">
                                    <a data-toggle="tooltip" data-placement="top" title="Unidades Enviadas" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Vueac" type="button">
                                        <span class="fas fa-shipping-fast"> </a>
                                </div>
                                <!-- <div class="p-2" >
                                <a class="btn btn-outline-secondary" href="<?php echo base_url() ?>Vuarc" type="button">
                                    <span class="fas fa-archive"> </a>
                                </div> -->

                            </div>
                            <div class="row justify-content">
                                <div class="col-md-12 mt-4">
                                    <table id="table" class="table table-bordered btn-hover">
                                        <thead>
                                            <tr>
                                                <th class="Uccr-1 text-white">Tanque</th>
                                                <th class="Uccr-1 text-white">Identificador Único Comercial</th>
                                                <th class="Uccr-1 text-white">Especie</th>                                              
                                                <th class="Uccr-1 text-white">Alevines sembrados</th>
                                                <th class="Uccr-1 text-white">Porcentaje</th>
                                                <th class="Uccr-1 text-white">Alevines aproximados en tanque</th>
                                                <th class="Uccr-1 text-white">Opciones</th>

                                            </tr>
                                        <tbody id="cuerpotabla">
                                            <?php if (!empty($unidades)) {
                                                foreach ($unidades as $unidad) {
                                            ?>
                                                    <tr>

                                                        <td> <?php echo $unidad->Tnq_nombre ?></td>
                                                        <td><?php echo $unidad->Cri_identificador_unico ?></td>
                                                        <td><?php echo $unidad->Sci_nombre_cientifico ?></td>

                                                        <!-- <td> <?php echo date("d/m/Y g:i A", strtotime($unidad->Cri_fecha_ingreso_tanque)) ?></td> -->
                                                        <td> <?php echo $unidad->Cri_densidad_ingreso_tanque ?></td>
                                                        <td> <?php echo $unidad->Cri_porcentaje ?></td>
                                                        <td> <?php echo (($unidad->Cri_densidad_ingreso_tanque)/100)*$unidad->Cri_porcentaje ?></td>

                                                        <td>
                                                            <div class="btn-group">

                                                                <a data-toggle="tooltip" data-placement="top" title="Parámetros Agua" type="button" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Tpfqg/<?php echo base64_encode($unidad->Id_tanque) ?>/<?php echo base64_encode($unidad->Id_unidad_creada_crianza) ?>/<?php echo base64_encode(2) ?>">
                                                                    <span class="fas fa-temperature-high"></span></a>

                                                                <a data-toggle="tooltip" data-placement="top" title="Limpieza" type="button" class="btn btn-outline-secondary ml-3" href="<?php echo base_url() ?>Tlg/<?php echo $unidad->Id_tanque ?>/<?php echo $unidad->Id_unidad_creada_crianza ?>/2">
                                                                    <span class="fas fa-broom"></span></a>

                                                                <a data-toggle="tooltip" data-placement="top" title="Alimentación" type="button" class="btn btn-outline-secondary ml-3" href="<?php echo base_url() ?>Taalm/<?php echo $unidad->Id_tanque ?>/<?php echo $unidad->Id_unidad_creada_crianza ?>/2">
                                                                    <span class="fas fa-utensils"></span></a>

                                                                <a data-toggle="tooltip" data-placement="top" title="Enfermedades" type="button" class="btn btn-outline-secondary ml-3" href="<?php echo base_url() ?>Venf/<?php echo $unidad->Id_tanque ?>/<?php echo $unidad->Id_unidad_creada_crianza ?>/2">
                                                                    <span class="fas fa-stethoscope"></span></a>

                                                                <?php if ($unidad->Cri_estado_logico == 1) { ?>
                                                                    <a data-toggle="tooltip" data-placement="top" title="Cargar Unidad" type="button" class="btn btn-outline-secondary  ml-3" href="<?php echo base_url() ?>Vauclc/<?php echo $unidad->Id_unidad_creada_crianza ?>">
                                                                        <span class="fas fa-dolly"></span></a>
                                                                <?php  } ?>

                                                                <?php if ($unidad->Cri_estado_logico == 0) { ?>
                                                                    <a type="button" class="btn btn-outline-secondary ml-3" href="<?php echo base_url() ?>Vafee/<?php echo $unidad->Id_unidad_creada_crianza ?>">
                                                                        <span class="fas fa-birthday-cake"></span></a>
                                                                <?php  } ?>

                                                                <a data-toggle="tooltip" data-placement="top" title="Cambiar de Tanque" type="button" class="btn btn-outline-secondary ml-3" href="<?php echo base_url() ?>Vctuc/<?php echo base64_encode($unidad->Id_unidad_creada_crianza) ?>/<?php echo base64_encode($unidad->Id_tanque) ?>">
                                                                    <span class="fas fa-sync"></span> <span class="fas fa-glass-whiskey"></span></a>

                                                                <a data-toggle="tooltip" data-placement="top" title="Histórico Tanques" type="button" class="btn btn-outline-secondary ml-3 view" href="<?php echo base_url() ?>Vht/<?php echo base64_encode($unidad->Id_unidad_creada_crianza)?>">
                                                                <span class="fa fa-eye"></span></a>

                                                            </div>
                                                        </td>
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
        </div>
    </section>
</div>