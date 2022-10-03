<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Veulauc-1">
                    <div class="row mt-3 Veulauc-1 text-white justify-content-between ">

                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Hormonado <i> |</i> </li>
                                <li class="text-info mr-1">Unidades Enviadas <i> |</i> </li>
                                <li class="text-info mr-1"> <?php if (!empty($unidades)) {
                                                                foreach ($unidades as $unidad) {
                                                                    if ($unidad->Id_unidad_enviada == $uc->Id_unidad_enviada) {

                                                                        echo  $unidad->Ue_identificador_unico_logistico ;
                                                                    }
                                                                }
                                                            }
                                                            ?> <i> |</i> </li>
                                <li class="text-info mr-1"> <?php echo  $uc->Cri_identificador_unico ?> <i> |</i> </li>
                                <li class="text-secondary"> Editar </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <form action="<?php echo base_url() ?>Eulauc" method="POST">


                    <div class="form-group">
                        <label class="col-form-label">Kilogramos :</label>
                        <input type="number" min="1" class="form-control " step="0.1" name="k" value="<?php echo $uc->Det_u_e_cr_kilogramos ?>" required="true">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Porcentaje ( 1% - <?php echo $uc->Cri_porcentaje ?>% ):</label>
                        <input type="number" min="1" max="<?php echo $uc->Cri_porcentaje ?>" class="form-control" name="p" value="<?php echo $uc->Det_u_e_cr_porcentaje ?>" required="true">
                    </div>
                    <div class="form-group">

                        <input type="hidden" class="form-control" name="d" value="<?php echo $uc->Id_detalle_unidad_enviada_crianza ?>" required="true">
                    </div>
                    <div class="form-group">

                        <input type="hidden" class="form-control" name="id_ue" value="<?php echo $id_unidad_enviada ?>" required="true">
                    </div>




                    <div class="row justify-content-end">
                        <div class="p-2 ml-5">
                            <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Veula/<?php echo $id_unidad_enviada ?>" class="btn btn-outline-secondary ml-5">
                                <span class="fas fa-arrow-alt-circle-left"></span>
                            </a>
                        </div>
                        <div class="p-2 ml-5">
                            <button data-toggle="tooltip" data-placement="top" title="Registrar" type="submit" class="btn btn-outline-secondary mr-5 ml-5">
                                <span class="fas fa-check"></span>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
</div>