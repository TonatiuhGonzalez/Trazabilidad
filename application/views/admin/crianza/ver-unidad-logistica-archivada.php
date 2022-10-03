<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Vvueacr-1">
                    <div class="row mt-3 Vvueacr-1 text-white justify-content-between ">

                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Hormonado <i> |</i> </li>
                                <li class="text-info mr-1">Unidades Enviadas <i> |</i> </li>
                                <li class="text-info mr-1">Histórico <i> |</i> </li>
                                <li class="text-secondary"> <?php echo $unidades[0]->{'Ue_identificador_unico_logistico'} ?> </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-first">
                    <div class="p-2 ">
                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Vulacr" class="btn  btn-outline-secondary ">
                            <span class="fas fa-arrow-alt-circle-left"></span>
                        </a>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label class="col-form-label">Enviada a: </label>
                        <input type="text" class="form-control ml-auto mr-auto mb-auto mt-auto" disabled value="<?php echo $unidades[0]->{'Soc_nombre'} ?>">

                    </div>
                    <div class="col">
                        <label class="col-form-label">Fecha de Envío :</label>
                        <input type="datetime-local" class="form-control ml-auto mr-auto mb-auto mt-auto" disabled value="<?php
                                                                                                                            $parte1 = substr($unidades[0]->{'Ue_fecha_hora_despacho'}, -19, 10);
                                                                                                                            $parte2 = substr($unidades[0]->{'Ue_fecha_hora_despacho'}, 11, strlen($unidades[0]->{'Ue_fecha_hora_despacho'}));
                                                                                                                            echo $parte1 . 'T' . $parte2 ?>">
                    </div>
                </div>

                <div class="form-group mt-5">
                    <table id="table" class="table table-bordered table-responsive-md table-striped text-center ">
                        <thead>
                            <tr>

                                <!-- <th class=" Vvueacr-1 text-center text-white">Tanque</th> -->
                                <th class=" Vvueacr-1 text-center text-white">Identificador único comercial</th>
                                <th class="Vvueacr-1 text-center text-white">Número de desove</th>
                                <th class="Vvueacr-1 text-center text-white">Número de alevines</th>
                                <th class="Vvueacr-1 text-center text-white">Opciones</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($unidades)) {
                                $n2 = 1;
                                foreach ($unidades as $unidad) {
                            ?>
                                    <tr name='u<?php echo $n2 ?>'>


                                        <!-- <td> <?php echo $unidad->Tnq_nombre ?></td> -->
                                        <td> <?php echo $unidad->Cri_identificador_unico ?></td>

                                        <td> <?php echo $unidad->Det_u_e_cr_porcentaje ?></td>
                                        <td> <?php echo $unidad->Det_u_e_cr_kilogramos ?></td>
                                        <td>
                                            <div class="btn-group">

                                                <a data-toggle="tooltip" data-placement="top" title="Parámetros Agua" type="button" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Vpac/<?php echo base64_encode($unidad->Id_unidad_creada_crianza) ?>/<?php echo base64_encode($unidades[0]->{'Id_unidad_enviada'}) ?>">
                                                    <span class="fas fa-temperature-high"></span></a>

                                                <a data-toggle="tooltip" data-placement="top" title="Limpieza" type="button" class="btn btn-outline-secondary ml-3" href="<?php echo base_url() ?>Vlimpc/<?php echo base64_encode($unidad->Id_unidad_creada_crianza) ?>/<?php echo base64_encode($unidades[0]->{'Id_unidad_enviada'}) ?>">
                                                    <span class="fas fa-broom"></span></a>

                                                <a data-toggle="tooltip" data-placement="top" title="Alimentación" type="button" class="btn  btn-outline-secondary ml-3" href="<?php echo base_url() ?>Vac/<?php echo base64_encode($unidad->Id_unidad_creada_crianza) ?>/<?php echo base64_encode($unidades[0]->{'Id_unidad_enviada'}) ?>">
                                                    <span class="fas fa-utensils"></span></a>

                                                <a data-toggle="tooltip" data-placement="top" title="Enfermedades" type="button" class="btn  btn-outline-secondary ml-3" href="<?php echo base_url() ?>Venc/<?php echo base64_encode($unidad->Id_unidad_creada_crianza) ?>/<?php echo base64_encode($unidades[0]->{'Id_unidad_enviada'}) ?>">
                                                    <span class="fas fa-stethoscope"></span></a>
                                                <a data-toggle="tooltip" data-placement="top" title="Ficha Comercial" type="button" class="btn  btn-outline-secondary ml-3" href="<?php echo base_url() ?>Vftlc/<?php echo base64_encode($unidad->Id_unidad_creada_crianza) ?>/<?php echo base64_encode($unidades[0]->{'Id_unidad_enviada'}) ?>">
                                                    <span class="fas fa-barcode"></span></a>

                                            </div>
                                        </td>

                                    </tr>



                            <?php
                                    $n2++;
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>





            </div>
        </div>
    </section>
</div>