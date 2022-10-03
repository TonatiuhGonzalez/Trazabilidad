<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Vvurearc-1 ">
                    <div class="row mt-3 Vvurearc-1  text-white justify-content-between ">

                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Engorda <i> |</i> </li>
                                <li class="text-info mr-1">Unidades Recibidas <i> |</i> </li>
                                <li class="text-info mr-1">Histórico <i> |</i> </li>
                                <li class="text-secondary"> <?php echo $unidades[0]->{'Ur_identificador_unico_logistico'} ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="row justify-content-first">
                    <div class="p-2 ">
                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Vurae" class="btn btn-outline-secondary ">
                            <span class="fas fa-arrow-alt-circle-left"></span>
                        </a>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="exampleFormControlSelect1" class="col-form-label">Socio</label>
                        <select disabled class="form-control" id="exampleFormControlSelect1">

                            <option value="<?php echo $unidades[0]->{'Id_socio'} ?>"><?php echo $unidades[0]->{'Soc_nombre'} ?></option>


                        </select>
                    </div>
                    <div class="col">
                        <label class="col-form-label">Fecha de Recepción :</label>
                        <input type="datetime-local" class="form-control ml-auto mr-auto mb-auto mt-auto" disabled value="<?php
                                                                                                                            $parte1 = substr($unidades[0]->{'Ur_fecha_hora_recepcion'}, -19, 10);
                                                                                                                            $parte2 = substr($unidades[0]->{'Ur_fecha_hora_recepcion'}, 11, strlen($unidades[0]->{'Ur_fecha_hora_recepcion'}));
                                                                                                                            echo $parte1 . 'T' . $parte2 ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label">kilogramos recibidos:</label>
                    <input disabled type="text" class="form-control" value="<?php echo $unidades[0]->{'Ur_kilogramos'} ?>">
                </div>

                <div class="form-group ">
                    <label class="col-form-label">Unidades de Destino: </label>
                    <table class="table table-bordered table-responsive-md table-striped text-center  mt-1">
                        <thead>
                            <tr>

                                <th class="Vvurearc-1 text-center text-white">Identificador único comercial </th>
                                <th class="Vvurearc-1 text-center text-white">Porcentaje </th>
                                <th class="Vvurearc-1 text-center text-white">kilogramos </th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($unidades)) {
                                $n2 = 1;
                                foreach ($unidades as $unidad) {
                            ?>
                                    <tr name='u<?php echo $n2 ?>'>


                                        <td> <?php echo $unidad->En_identificador_unico ?></td>

                                        <td> <?php echo $unidad->Det_u_r_c_porcentaje_ocupados ?></td>
                                        <td> <?php echo $unidad->Det_u_r_c_kilogramos_ocupados ?></td>

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