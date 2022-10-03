<div class="content-wrapper" id="contenido">
        <section class="content">
                <div class="mt-2 ml-1 mr-1">
                        <div class="box-body">
                                <div class="container-fluid Aal-1">
                                        <div class="row mt-3 Aal-1 text-white justify-content-between ">
                                                <?php if($tipo==1){ ?>
                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1">Almacén <i> |</i> </li>
                                                                <li class="text-info mr-1">Suministros Médicos <i> |</i> </li>
                                                                <li class="text-secondary"> <?php echo $medico->Inm_nombre_comercial ?> </li>
                                                        </ol>
                                                </div>
                                                <?php }else{ ?>
                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1">Almacén <i> |</i> </li>
                                                                <li class="text-info mr-1">Suministros Médicos <i> |</i> </li>
                                                                <li class="text-info mr-1">Histórico <i> |</i> </li>
                                                                <li class="text-secondary"> <?php echo $medico->Inm_nombre_comercial ?> </li>
                                                        </ol>
                                                </div>
                                                <?php } ?>

                                        </div>
                                </div>
                                <div class="row justify-content-first">
                                        <div class="p-2 ">
                                                <?php if ($tipo == 1) { ?>
                                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Alme" class="btn btn-outline-secondary ">
                                                                <span class="fas fa-arrow-alt-circle-left"></span> </a>
                                                <?php } else { ?>
                                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Vmarch" class="btn btn-outline-secondary  ">
                                                                <span class="fas fa-arrow-alt-circle-left"></span> </a>
                                                <?php }  ?>
                                        </div>
                                </div>

                                <div class="form-row">
                                        <div class="col">
                                                <label class="col-form-label">Fecha de Caducidad :</label>
                                                <input type="date" class="form-control ml-auto mr-auto mb-auto mt-auto" disabled value="<?php

                                                                                                                                        echo $medico->Inm_fecha_caducidad ?>">
                                        </div>
                                        <!-- <div class="col">
                                                <label class="col-form-label">Fecha de Producción:</label>
                                                <input type="date" class="form-control" disabled value="<?php echo $medico->Inm_fecha_produccion ?>">
                                        </div> -->
                                        <div class="col">
                                                <label class="col-form-label">Contenido neto (gramos) :</label>
                                                <input type="number" class="form-control" disabled value="<?php echo $medico->Inm_contenido_neto ?>">
                                        </div>
                                </div>

                                <div class="form-row">
                                        <div class="col">
                                                <label for="exampleFormControlSelect1" class="col-form-label">Socio</label>
                                                <select name='socio' class="form-control" disabled>


                                                        <option value="<?php echo strtoupper($medico->Id_socio) ?>"><?php echo strtoupper($medico->Soc_nombre) ?></option>


                                                </select>
                                        </div>
                                        <div class="col">
                                                <label class="col-form-label" class="col-form-label">Fecha de Recepción:</label>
                                                <input type="datetime-local" class="form-control" disabled value="<?php
                                                                                                                        $parte1 = substr($medico->Pro_insu_medico_fecha_recepcion, -19, 10);
                                                                                                                        $parte2 = substr($medico->Pro_insu_medico_fecha_recepcion, 11, strlen($medico->Pro_insu_medico_fecha_recepcion));
                                                                                                                        echo $parte1 . 'T' . $parte2 ?>">
                                        </div>
                                </div>

                                <div class="form-row">
                                        <div class="col">
                                                <label class="col-form-label">Cantidad Recibida (Ingresar Cantidad de Productos Recibidos) :</label>
                                                <input type="number" min="1" class="form-control" disabled value="<?php echo $medico->Pro_insu_medico_cantidad_recibida ?>">
                                        </div>
                                        <div class="col">
                                                <label class="col-form-label">Precio Unitario :</label>
                                                <input type="number" min="1" class="form-control" disabled value="<?php echo $medico->Pro_insu_medico_precio_unitario ?>">
                                        </div>
                                </div>


                                

                                </form>
                        </div>
                </div>
        </section>
</div>