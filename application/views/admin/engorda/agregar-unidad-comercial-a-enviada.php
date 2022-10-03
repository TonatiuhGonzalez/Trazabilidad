<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Vucearc-1">
                    <div class="row mt-3 Vucearc-1 text-white justify-content-between ">

                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Engorda <i> |</i> </li>
                                <li class="text-info mr-1"> Unidades Producidas <i> |</i> </li>
                                <li class="text-info mr-1"> <?php echo $uc->En_identificador_unico ?> <i> |</i> </li>
                                <li class="text-secondary"> Dentro de la Unidad Enviada </li>
                            </ol>
                        </div>
                        
                    </div>
                </div>
                <form action="<?php echo base_url() ?>Aucle" method="POST" onsubmit="$('#submitBtn').prop('disabled', true);">

                    <div class="form-row">
                        <div class="col">
                            <label for="exampleFormControlSelect1" class="col-form-label">Unidad Enviada (Identificador Único Logístico )</label>
                            <select name='ul' class="form-control" id="exampleFormControlSelect1" required="true">
                                <?php if (!empty($unidades)) {
                                    foreach ($unidades as $unidad) {
                                ?>
    
                                        <option value="<?php echo $unidad->Id_unidad_enviada ?>">
                                            <?php echo $unidad->Ue_identificador_unico_logistico . ' -->Fecha Entrega: ' . $unidad->Ue_fecha_hora_despacho
                                            ?></option>
    
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="col-form-label">Kilogramos :</label>
                            <input type="number" min="1" class="form-control " name="k" placeholder="Kilogramos que se envian de esta unidad" required="true">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col">
                            <label class="col-form-label">Porcentaje ( 1% - <?php echo $uc->En_porcentaje ?>% ):</label>
                            <input type="number" min="1" max="<?php echo $uc->En_porcentaje ?>" class="form-control" name="p" placeholder="Porcentaje ocupado de esta unidad" required="true">
                        </div>
                        <div class="col">
                            <label class="col-form-label">Peso Promedio ( Gramos ) :</label>
                            <input type="number" min="1" step=".01" class="form-control" name="pp" placeholder="Ingrese Peso Promedio " required="true">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="uc" value="<?php echo $id_unidad ?>" required="true">

                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Período de Hambre ( Dias sin alimentación antes del transporte ) :</label>
                        <input type="number" min="0" class="form-control " name="pa" placeholder="Dias sin alimentación antes del transporte" required="true">
                    </div>




                    <div class="row justify-content-end">
                        <div class="p-2 ml-5">
                            <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Uen" class="btn btn-outline-secondary  ml-5">
                                <span class="fas fa-arrow-alt-circle-left"></span> <span class="fas fa-user-graduate">
                            </a>
                        </div>
                        <div class="p-2 ml-5">
                            <button data-toggle="tooltip" data-placement="top" title="Registrar" type="submit" id="submitBtn" class="btn btn-outline-secondary mr-5 ml-5">
                                <span class="fas fa-check"></span>
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </section>
</div>