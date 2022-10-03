<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="container-fluid">
            <div class="mt-2 ml-1 mr-1">
                <div class="box-body">

                    <div class="container-fluid h-1">
                        <div class="row mt-3 h-1 text-white justify-content-first ">
                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                    <li class="text-info mr-1">Reproductores <i> |</i> </li>
                                    <li class="text-secondary"> Unidades Producidas </li>
                                </ol>
                            </div>

                        </div>
                    </div>

                    <div class="card text-center border-info ">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs ">

                                <li class="nav-item menu" >
                                    <a class="nav-link active " href="<?php echo base_url() ?>Uc" type="button" data-toggle="tooltip" data-placement="top" title="Reproductores">
                                        <span class="fas fa-venus-mars"></span>
                                        <!-- <span aria-hidden="true"> Reproductores</span> -->
                                    </a>
                                </li>
                                <div id="rep2">
                                </div>




                                <li class="nav-item ">
                                    <a class="nav-link " data-toggle="tooltip" data-placement="top" title="Hormonado" href="<?php echo base_url() ?>Uccr" type="button">
                                        <span class="h-1-1 fas fa-baby-carriage"></span>
                                        <!-- <span id="ur"></span> -->
                                    </a>
                                </li>
                                <div id="cri2">
                                </div>

                                <li class="nav-item ">
                                    <a class="nav-link " data-toggle="tooltip" data-placement="top" title="Engorda" href="<?php echo base_url() ?>Uen" type="button">
                                        <span class="h-1-1 fas fa-user-graduate"></span>
                                        <!-- <span class="h-1-1" aria-hidden="true"> Engorda</span>  -->
                                    </a>
                                </li>
                                <div id="en2">
                                </div>

                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-first">

                                <div id="cc" class="p-2 ">
                                    <a data-toggle="tooltip" data-placement="top" title="Nueva Unidad" class="btn  btn-outline-secondary" href="<?php echo base_url() ?>Vaur" type="button">
                                        <span class=" fa fa-plus"></span> <span class="fas fa-venus-mars"></span> </a>
                                    <!-- <p class="text-left">Left aligned text on all viewport sizes.</p> -->

                                </div>
                               

                                <div class="p-2">
                                    <a class="btn btn-outline-secondary " data-toggle="tooltip" data-placement="top" title="Unidades Enviadas" href="<?php echo base_url() ?>Venvurg" type="button">
                                        <span class=" fas fa-shipping-fast"> </a>
                                </div>

                                

                                <!-- <div class="p-2" >
                                <a class="btn btn-outline-secondary " href="<?php echo base_url() ?>Vuard" type="button">
                                    <span class="fas fa-archive"> </a>
                                </div> -->

                            </div>
                            <div class="row justify-content">
                                <div class="col-md-12 mt-4">
                                    <table id="table" class="table table-bordered btn-hover">
                                        <thead>
                                            <tr>
                                                <th align="center" class="h-1 text-white">Tanque</th>
                                                <th align="center" class="h-1 text-white">Identificador Único Comercial</th>
                                                <!-- <th align="center"  class="h-1 text-white">Fecha Desove</th> -->
                                                <th align="center" class="h-1 text-white">Fecha Ingreso Tanque</th>                                                
                                                <th align="center" class="h-1 text-white">Número de Reproductores</th>
                                                <th align="center" class="h-1 text-white">Desoves hasta el dia de hoy</th>
                                                <th align="center" class="h-1 text-white">Especie</th>
                                                <th align="center" class="h-1 text-white">Opciones</th>

                                            </tr>
                                        <tbody id="cuerpotabla">
                                            <?php if (!empty($unidades)) {
                                                foreach ($unidades as $unidad) {
                                            ?>
                                                    <tr>
                                                        <td> <?php echo $unidad->Tnq_nombre ?></td>
                                                        <td> <?php echo $unidad->Rep_identificador_unico ?></td>
                                                        <!-- <td>
                                                        <?php
                                                        if ($unidad->Rep_fecha_desove == "0000-00-00 00:00:00") {
                                                            echo '0000-00-00 00:00:00';
                                                        } else {
                                                            echo date("d/m/Y g:i A", strtotime($unidad->Rep_fecha_desove));
                                                        }
                                                        ?>
                                                    </td> -->
                                                        <td>
                                                            <?php echo date("d/m/Y g:i A", strtotime($unidad->Rep_fecha_ingreso_tanque)) ?>
                                                        </td>
                                                        
                                                        <td> <?php echo $unidad->Rep_densidad_ingreso_tanque ?></td>
                                                        <td> <?php echo $unidad->Rep_numero_desove ?></td>
                                                        <td> <?php echo $unidad->Sci_nombre_cientifico ?></td>

                                                        <td>
                                                            <div class="btn-group"  >

                                                                <a  data-toggle="tooltip" data-placement="top" title="Parámetros Agua"  class="btn  btn-outline-secondary" href="<?php echo base_url() ?>Tpfqg/<?php echo base64_encode($unidad->Id_tanque) ?>/<?php echo base64_encode($unidad->Id_unidad_creada_reproduccion) ?>/<?php echo base64_encode(1) ?> "  type="button">
                                                                    <span class="fas fa-temperature-high"></span></a>
                                                                
                                                                

                                                                <a data-toggle="tooltip" data-placement="top" title="Limpieza" type="button" class="btn limp btn-outline-secondary ml-3" href="<?php echo base_url() ?>Tlg/<?php echo $unidad->Id_tanque ?>/<?php echo $unidad->Id_unidad_creada_reproduccion ?>/1">
                                                                    <span class="fas fa-broom"></span></a>
                                                                    
                                                                

                                                                <a type="button" data-toggle="tooltip" data-placement="top" title="Alimentación" class="btn  btn-outline-secondary ml-3" href="<?php echo base_url() ?>Taalm/<?php echo $unidad->Id_tanque ?>/<?php echo $unidad->Id_unidad_creada_reproduccion ?>/1">
                                                                    <span class="fas fa-utensils"></span></a>

                                                                <a data-toggle="tooltip" data-placement="top" title="Enfermedades" type="button" class="btn   btn-outline-secondary ml-3" href="<?php echo base_url() ?>Venf/<?php echo $unidad->Id_tanque ?>/<?php echo $unidad->Id_unidad_creada_reproduccion ?>/1">
                                                                    <span class="fas fa-stethoscope"></span> </a>

                                                                <a data-toggle="tooltip" data-placement="top" title="Archivar" type="button" class="btn   btn-outline-secondary ml-3" href="<?php echo base_url() ?>Bauc/<?php echo $unidad->Id_unidad_creada_reproduccion ?>">
                                                                    <span class="fas fa-trash"></span> </a>

                                                                <a data-toggle="tooltip" data-placement="top" title="Gráfica desove" type="button" class="btn   btn-outline-secondary ml-3" href="<?php echo base_url() ?>Vgde/<?php echo $unidad->Id_unidad_creada_reproduccion ?>">
                                                                    <span class="fas fa-chart-line"></span> </a>

                                                                <?php if ($unidad->Rep_estado_logico == 0) { ?>
                                                                    <a type="button" class="btn btn-outline-secondary  ml-3" href="<?php echo base_url() ?>Vafd/<?php echo $unidad->Id_unidad_creada_reproduccion ?>">
                                                                        <span class="fas fa-egg"></span></a>
                                                                <?php  } ?>

                                                                <?php if ($unidad->Rep_estado_logico == 1) { ?>
                                                                    <a data-toggle="tooltip" data-placement="top" title="Cargar Unidad" type="button" class="btn btn-outline-secondary  ml-3" href="<?php echo base_url() ?>Vaucl/<?php echo $unidad->Id_unidad_creada_reproduccion ?>">
                                                                        <span class="fas fa-dolly"></span></a>
                                                                <?php  } ?>
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