<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Vauclc-1">
                    <div class="row mt-3 Vauclc-1 text-white justify-content-between ">

                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Hormonado <i> |</i> </li>
                                <li class="text-info mr-1"> Unidades Producidas <i> |</i> </li>
                                <li class="text-info mr-1"> <?php echo $uc->Cri_identificador_unico ?> <i> |</i> </li>
                                <li class="text-secondary"> Dentro de la Unidad Enviada </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <form action="<?php echo base_url() ?>Auclc" method="POST" onsubmit="$('#submitBtn').prop('disabled', true);">

                    <div class="form-row">
                        <div class="col">
                            <label for="exampleFormControlSelect1" class="col-form-label">Unidad Enviada (Identificador Único Logístico )</label>
                            <select name='ul' class="form-control" id="exampleFormControlSelect1" required="true">
                                <?php if (!empty($unidades)) {
                                    foreach ($unidades as $unidad) {
                                ?>

                                        <option value="<?php echo $unidad->Id_unidad_enviada ?>">
                                            <?php echo $unidad->Soc_nombre ?>->
                                            <?php echo $unidad->Ue_identificador_unico_logistico ?>->
                                            <?php echo date("d/m/Y g:i A", strtotime($unidad->Ue_fecha_hora_despacho))?></option>

                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="col-form-label">Kilogramos :</label>
                            <input type="number" min="0" class="form-control " name="k" placeholder="Kilogramos que se envian de esta unidad" required="true">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label class="col-form-label">Peso Promedio ( Gramos ) :</label>
                            <input type="number" min="0" step=".01" class="form-control" name="pp" placeholder="Ingrese Peso Promedio " required="true">
                        </div>
                        <!-- <div class="col">
                            <label class="col-form-label"> Talla Promedio ( centimetros ):</label>
                            <input type="number" min="0" step=".01" class="form-control" name="tp" placeholder="Ingrese Talla Promedio  " required="true">
                        </div> -->
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label class="col-form-label">Porcentaje ( 0% - <?php echo $uc->Cri_porcentaje ?>% ):</label>
                            <input type="number" min="0" max="<?php echo $uc->Cri_porcentaje ?>" class="form-control" name="p" placeholder="Porcentaje ocupado de esta unidad" required="true">
                        </div>
                        <div class="col">
                            <label class="col-form-label">Período de Hambre ( Dias sin alimentación antes del transporte ) :</label>
                            <input type="number" min="0" class="form-control " name="pa" placeholder="Dias sin alimentación antes del transporte" required="true">
                        </div>
                    </div>                   
                    <div class="form-group">

                        <input type="hidden" class="form-control" name="uc" value="<?php echo $id_unidad ?>" required="true">

                    </div>

                    <div class="row justify-content-end">
                        <div class="p-2 ml-5">
                            <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Uccr" class="btn btn-outline-secondary ml-5">
                                <span class="fas fa-arrow-alt-circle-left"> <span class="fas fa-baby-carriage"></span></span>
                            </a>
                        </div>
                        <div class="p-2 ml-5">
                            <button  data-toggle="tooltip" data-placement="top" title="Registrar" id="submitBtn" type="submit" class="btn btn-outline-secondary mr-5 ml-5">
                                <span class="fas fa-check"></span>
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </section>
</div>