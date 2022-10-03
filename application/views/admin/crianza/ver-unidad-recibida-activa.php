<div class="content-wrapper" id="contenido">
        <section class="content">
                <div class="mt-2 ml-1 mr-1">
                        <div class="box-body">
                                <div class="container-fluid Vvurc-1 ">
                                        <div class="row mt-3 Vvurc-1  text-white justify-content-between ">
                                               
                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1">Hormonado <i> |</i> </li>
                                                                <li class="text-info mr-1">Unidades Recibidas <i> |</i> </li>
                                                                <li class="text-secondary"> <?php echo $unidad->Ur_identificador_unico_logistico ?> </li>
                                                        </ol>
                                                </div>
                                        </div>
                                </div>
                                <div class="row justify-content-first">
                                        <div class="p-2 ">
                                                <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Vgurc" class="btn btn-outline-secondary ">
                                                        <span class="fas fa-arrow-alt-circle-left "></span> 
                                                        
                                                </a>
                                        </div>
                                </div>

                                <div class="form-row">
                                        <div class="col">
                                                <label class="col-form-label">Socio</label>
                                                <input class="form-control" type="text" value="<?php echo $unidad->Soc_nombre ?>" disabled>

                                        </div>
                                        <div class="col">
                                                <label class="col-form-label">Fecha y Hora de la Recepción:</label>
                                                <input type="datetime-local" class="form-control ml-auto mr-auto mb-auto mt-auto" value="<?php
                                                                                                                                                $parte1 = substr($unidad->Ur_fecha_hora_recepcion, -19, 10);
                                                                                                                                                $parte2 = substr($unidad->Ur_fecha_hora_recepcion, 11, strlen($unidad->Ur_fecha_hora_recepcion));
                                                                                                                                                echo $parte1 . 'T' . $parte2 ?>" disabled>
                                        </div>
                                </div>

                                <div class="form-row">
                                        <div class="col">
                                                <label class="col-form-label">Temperatura de Recepción: (°C)</label>
                                                <input type="number" min="1" class="form-control" value="<?php echo $unidad->Ur_registro_temperatura ?>" disabled>
                                        </div>
                                        <div class="col">

                                                <label class="col-form-label">kilogramos recibidos:</label>
                                                <input min="1" type="number" step="0.1" class="form-control" value="<?php echo $unidad->Ur_kilogramos ?>" disabled>
                                        </div>
                                </div>

                               




                        </div>
                </div>
        </section>
</div>