<div class="content-wrapper">
        <section class="content">
                <?php
                switch ($tipo) {
                        case 1:
                ?>
                                <div class="container-fluid h-1">
                                        <div class="row mt-3 h-1 text-white justify-content-first ">
                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1">Reproductores <i> |</i> </li>
                                                                <li class="text-info mr-1">Unidades Producidas <i> |</i> </li>
                                                                <li class="text-info mr-1"><?php echo  $uc->Rep_identificador_unico ?><i> |</i> </li>
                                                                <li class="text-info mr-1"> Enfermedades<i> |</i> </li>
                                                                <li class="text-secondary"> Editar Enfermedad</li>
                                                        </ol>
                                                </div>
                                        </div>
                                </div>
                        <?php
                                break;
                        case 2:
                        ?>
                                <div class="container-fluid Uccr-1">
                                        <div class="row mt-3 Uccr-1 text-white justify-content-first ">
                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1">Hormonado <i> |</i> </li>
                                                                <li class="text-info mr-1">Unidades Producidas <i> |</i> </li>
                                                                <li class="text-info mr-1"><?php echo  $uc->Cri_identificador_unico ?><i> |</i> </li>
                                                                <li class="text-info mr-1"> Enfermedades<i> |</i> </li>
                                                                <li class="text-secondary"> Editar Enfermedad </li>
                                                        </ol>
                                                </div>
                                        </div>
                                </div>
                        <?php
                                break;
                        case 3:
                        ?>
                                <div class="container-fluid Uen-1">
                                        <div class="row mt-3 Uen-1 text-white justify-content-first ">
                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1">Engorda <i> |</i> </li>
                                                                <li class="text-info mr-1">Unidades Producidas <i> |</i> </li>
                                                                <li class="text-info mr-1"><?php echo  $uc->En_identificador_unico ?><i> |</i> </li>
                                                                <li class="text-info mr-1">Enfermedades<i> |</i> </li>
                                                                <li class="text-secondary"> Editar Enfermedad </li>
                                                        </ol>
                                                </div>
                                        </div>
                                </div>
                <?php
                                break;
                }
                ?>

                <form action="<?php echo base_url() ?>Eenf/<?php echo $id_tanque ?>/<?php echo $id_uc ?>/<?php echo $id_enf ?>/<?php echo $tipo ?>" method="POST">



                        <div class="form-group">
                                <label class="col-form-label">Fecha y Hora Inicio :</label>
                                <input type="datetime-local" name="fecha" class="form-control" required="true" value="<?php
                                                                                                                        $parte1 = substr($enfermedad->Enf_fecha_inicio, -19, 10);
                                                                                                                        $parte2 = substr($enfermedad->Enf_fecha_inicio, 11, strlen($enfermedad->Enf_fecha_inicio));
                                                                                                                        echo $parte1 . 'T' . $parte2 ?>">
                        </div>
                        <div class="form-group">
                                <label class="col-form-label">Nombre de la enfermedad:</label>
                                <input type="text" class="form-control" name="ne" placeholder="Nombre enfermedad" required="true" value="<?php echo $enfermedad->Enf_nombre ?>">
                        </div>

                        <div class="row justify-content-end">
                                <div class="p-2 ml-5">
                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Venf/<?php echo $id_tanque ?>/<?php echo $id_uc ?>/<?php echo $tipo ?>" class="btn btn-outline-secondary ml-5">
                                                <span class="fas fa-arrow-alt-circle-left"></span>
                                        </a>
                                </div>
                                <div class="p-2 ml-5">
                                        <button data-toggle="tooltip" data-placement="top" title="Guardar Cambios" type="submit" class="btn btn-outline-secondary  ml-5">
                                                <span class="fas fa-check"></span>
                                        </button>
                                </div>

                        </div>

                </form>
                <?php if ($this->session->flashdata("errordb")) { ?>
                        <div class="alert alert-warning alert-dismissible fade show">
                                <strong class="text-center"><?php echo $this->session->flashdata("errorbd") ?></strong>

                        </div>
                <?php } ?>

        </section>
</div>