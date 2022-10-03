<div class="content-wrapper" id="contenido">
        <section class="content">
                <div class="mt-2 ml-1 mr-1">
                        <div class="box-body">
                                <div class="container-fluid Aal-1">
                                        <div class="row mt-3 Aal-1 text-white justify-content-between ">
                                                
                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1">Almacén <i> |</i> </li>
                                                                <li class="text-info mr-1"> Suministros Alimentarios <i> |</i> </li>
                                                                <li class="text-secondary"> <?php echo $alimento->Ia_nombre_comercial ?> </li>
                                                        </ol>
                                                </div>
                                        </div>
                                </div>
                                <div class="row justify-content-first">
                                        <div class="p-2 ">
                                                <?php if ($tipo == 1) { ?>
                                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Al" class="btn btn-outline-secondary  ">
                                                                <span class="fas fa-arrow-alt-circle-left"></span> </a>
                                                <?php } else { ?>
                                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Vaarch" class="btn btn-outline-secondary  ">
                                                                <span class="fas fa-arrow-alt-circle-left"></span> </a>
                                                <?php } ?>
                                        </div>
                                </div>
                                <div class="form-row">
                                        <div class="col">
                                                <label class="col-form-label">Fecha de Caducidad :</label>
                                                <input type="datetime-local" disabled class="form-control" value="<?php
                                                                                                                        $parte1 = substr($alimento->Ia_fecha_caducidad, -19, 10);
                                                                                                                        $parte2 = substr($alimento->Ia_fecha_caducidad, 11, strlen($alimento->Ia_fecha_caducidad));
                                                                                                                        echo $parte1 . 'T' . $parte2 ?>">
                                        </div>
                                        <div class="col">
                                                <label class="col-form-label">Fecha de Producción:</label>
                                                <input type="datetime-local" class="form-control" disabled value="<?php
                                                                                                                        $parte1 = substr($alimento->Ia_fecha_de_produccion, -19, 10);
                                                                                                                        $parte2 = substr($alimento->Ia_fecha_de_produccion, 11, strlen($alimento->Ia_fecha_de_produccion));
                                                                                                                        echo $parte1 . 'T' . $parte2 ?>">
                                        </div>
                                </div>

                                <div class="form-row">
                                        <div class="col">
                                                <label class="col-form-label">Contenido neto (Kilogramos) :</label>
                                                <input type="number" min="1" class="form-control" disabled value="<?php echo $alimento->Ia_contenido_neto ?>">
                                        </div>
                                        <div class="col">
                                                <label class="col-form-label">Porcentaje Proteína :</label>
                                                <input type="number" min="1" class="form-control" disabled value="<?php echo $alimento->Ia_porcentaje_proteina ?>">
                                        </div>
                                </div>

                                <div class="form-row">
                                        <div class="col">
                                                <label class="col-form-label">Porcentaje Grasa :</label>
                                                <input type="number" min="0" class="form-control" disabled value="<?php echo $alimento->Ia_porcentaje_grasa ?>">
                                        </div>
                                        <div class="col">
                                                <label class="col-form-label">Porcentaje Humedad :</label>
                                                <input type="number" min="0" class="form-control" disabled value="<?php echo $alimento->Ia_porcentaje_humedad ?>">
                                        </div>
                                </div>

                                <div class="form-row">
                                        <div class="col">
                                                <label class="col-form-label">Porcentaje Ceniza :</label>
                                                <input type="number" min="0" class="form-control" disabled value="<?php echo $alimento->Ia_porcentaje_ceniza ?>">
                                        </div>
                                        <div class="col">
                                                <label class="col-form-label">Porcentaje Fibra :</label>
                                                <input type="number" min="0" class="form-control" disabled value="<?php echo $alimento->Ia_porcentaje_fibra ?>">
                                        </div>
                                </div>

                                <div class="form-row">
                                        <div class="col">
                                                <label class="col-form-label">Porcentaje ELN :</label>
                                                <input type="number" min="0" class="form-control" disabled value="<?php echo $alimento->Ia_porcentaje_eln ?>">
                                        </div>
                                        <div class="col">
                                                <label for="exampleFormControlSelect1" class="col-form-label">Socio</label>
                                                <select class="form-control" id="exampleFormControlSelect1" disabled>

                                                        <option><?php echo strtoupper($alimento->Soc_nombre) ?></option>

                                                </select>
                                        </div>
                                </div>

                                <div class="form-row">
                                        <div class="col">
                                                <label class="col-form-label">Fecha de Recepción:</label>
                                                <input type="datetime-local" class="form-control" disabled value="<?php
                                                                                                                        $parte1 = substr($alimento->Pro_insu_fecha_recepcion, -19, 10);
                                                                                                                        $parte2 = substr($alimento->Pro_insu_fecha_recepcion, 11, strlen($alimento->Pro_insu_fecha_recepcion));
                                                                                                                        echo $parte1 . 'T' . $parte2 ?>">
                                        </div>
                                        <div class="col">
                                                <label class="col-form-label">Cantidad Recibida :</label>
                                                <input type="number" min="1" class="form-control" value="<?php echo $alimento->Pro_insu_cantidad_recibida ?>" disabled>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-form-label">Precio Unitario :</label>
                                        <input type="number" min="1" class="form-control" value="<?php echo $alimento->Pro_insu_precio_unitario ?>" disabled>
                                </div>



                               


                        </div>
                </div>
        </section>
</div>