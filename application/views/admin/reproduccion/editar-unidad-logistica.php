<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Vela-1">
                    <div class="row mt-3 Vela-1 text-white justify-content-between ">
                        
                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info active mr-1">Reproductores <i>|</i></li>
                                <li class="text-info active mr-1">Unidades Enviadas <i>|</i></li>
                                <li class="text-info active mr-1"> <?php echo $unidades[0]->{'Ue_identificador_unico_logistico'} ?> <i>|</i></li>
                                <li class="text-secondary "> Editar </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <form action="<?php echo base_url() ?>Eul" method="POST">

                    <div class="form-row">
                        <div class="col">
                            <label for="exampleFormControlSelect1" class="col-form-label">Enviada a</label>
                            <select name='socio' class="form-control" id="exampleFormControlSelect1" required="true">
                                <?php if (!empty($socios)) { ?>
                                    <option value="<?php echo $unidades[0]->{'Id_socio'} ?>"><?php echo $unidades[0]->{'Soc_nombre'} ?></option>

                                    <?php foreach ($socios as $socio) {
                                        if ($unidades[0]->{'Id_socio'} != $socio->Id_socio) {
                                    ?>

                                            <option value="<?php echo strtoupper($socio->Id_socio) ?>"><?php echo strtoupper($socio->Soc_nombre) ?></option>

                                <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="col-form-label">Fecha de Env??o :</label>
                            <input type="datetime-local" class="form-control ml-auto mr-auto mb-auto mt-auto" name="fe" required="true" value="<?php
                                                                                                                                                $parte1 = substr($unidades[0]->{'Ue_fecha_hora_despacho'}, -19, 10);
                                                                                                                                                $parte2 = substr($unidades[0]->{'Ue_fecha_hora_despacho'}, 11, strlen($unidades[0]->{'Ue_fecha_hora_despacho'}));
                                                                                                                                                echo $parte1 . 'T' . $parte2 ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="nl" value="<?php echo $ul ?>" required="true">
                    </div>


                    <div class="form-group mt-5">
                        <table id="table" class="table table-bordered table-responsive-md table-striped text-center ">
                            <thead>
                                <tr>

                                    <th class="Vela-1 text-center text-white">Tanque</th>
                                    <th class="Vela-1 text-center text-white">Identificador ??nico comercial</th>
                                    <th class="Vela-1 text-center text-white">N??mero de desove</th>                                   
                                    <th class="Vela-1 text-center text-white">N??mero de alevines</th>                                   
                                    <th class=" Vela-1 text-center text-white">Opciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($unidades)) {
                                    $n2 = 1;
                                    foreach ($unidades as $unidad) {
                                ?>
                                        <tr name='u<?php echo $n2 ?>'>


                                            <td> <?php echo $unidad->Tnq_nombre ?></td>
                                            <td> <?php echo $unidad->Rep_identificador_unico ?></td>

                                            <td> <?php echo $unidad->Det_u_e_c_desove ?></td>
                                            <td> <?php echo $unidad->Det_u_e_c_alevines ?></td>
                                            
                                            <td>
                                                <div class="btn-group">


                                                    <a data-toggle="tooltip" data-placement="top" title="Editar Registro " type="button" class="btn btn-outline-secondary   ml-3" href="<?php echo base_url() ?>Vecl/<?php echo $ul ?>/<?php echo $unidad->Id_detalle_unidad_enviada_creada ?>">
                                                        <span class="fas fa-pencil-alt"></span></a>

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

                    <div class="row justify-content-end">
                        <div class="p-2 ml-5">
                            <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Venvurg" class="btn btn-outline-secondary ml-5">
                                <span class="fas fa-arrow-alt-circle-left"></span>
                            </a>
                        </div>
                        <div class="p-2 ml-5">
                            <button data-toggle="tooltip" data-placement="top" title="Guardar Cambios" type="submit" class="btn btn-outline-secondary mr-5 ml-5">
                                <span class="fas fa-check"></span>
                            </button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </section>
</div>