<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Vvula-1">
                    <div class="row mt-3 Vvula-1 text-white justify-content-between ">

                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Hormonado <i> |</i> </li>
                                <li class="text-info mr-1">Unidades Enviadas <i> |</i> </li>
                                <li class="text-secondary"> <?php echo $unidades[0]->{'Ue_identificador_unico_logistico'} ?> </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-first">
                    <div class="p-2 ">
                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Vueac" class="btn btn-outline-secondary ">
                            <span class="fas fa-arrow-alt-circle-left"></span>
                        </a>
                    </div>
                </div>


                <div class="form-row">
                    <div class="col">
                        <label for="exampleFormControlSelect1" class="col-form-label">Socio</label>
                        <select disabled class="form-control" id="exampleFormControlSelect1">
                            <option value="<?php echo $unidades[0]->{'Id_socio'} ?>">
                                <?php echo $unidades[0]->{'Soc_nombre'} ?>
                            </option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="col-form-label">Fecha de Envío :</label>
                        <input type="datetime-local" class="form-control ml-auto mr-auto mb-auto mt-auto" disabled value="<?php
                                                                                                                            $parte1 = substr($unidades[0]->{'Ue_fecha_hora_despacho'}, -19, 10);
                                                                                                                            $parte2 = substr($unidades[0]->{'Ue_fecha_hora_despacho'}, 11, strlen($unidades[0]->{'Ue_fecha_hora_despacho'}));
                                                                                                                            echo $parte1 . 'T' . $parte2 ?>">
                    </div>
                </div>

                <div class="form-group">
                    <input type="hidden" class="form-control" name="nl" value="<?php echo $ul ?>">
                </div>


                <div class="form-group ">
                    <label class="col-form-label">Unidades que Incorpora esta Unidad:</label>
                    <table id="table" class="table table-bordered table-responsive-md table-striped text-center ">
                        <thead>
                            <tr>

                                <th class="Vvula-1 text-center text-white">Identificador único comercial</th>
                                <th class="Vvula-1 text-center  text-white">Porcentaje</th>
                                <th class="Vvula-1 text-center  text-white">kilogramos</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($unidades)) {
                                $n2 = 1;
                                foreach ($unidades as $unidad) {
                            ?>
                                    <tr name='u<?php echo $n2 ?>'>


                                        <td> <?php echo $unidad->Cri_identificador_unico ?></td>

                                        <td> <?php echo $unidad->Det_u_e_cr_porcentaje ?></td>
                                        <td> <?php echo $unidad->Det_u_e_cr_kilogramos ?></td>

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