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
                                                                <li class="text-secondary">Nueva Enfermedad</li>
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
                                                                <li class="text-secondary">Nueva Enfermedad </li>
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
                                                                <li class="text-info mr-1"> Enfermedades<i> |</i> </li>
                                                                <li class="text-secondary">Nueva Enfermedad </li>
                                                        </ol>
                                                </div>
                                        </div>
                                </div>
                <?php
                                break;
                }
                ?>
               
                <form action="<?php echo base_url() ?>Aenf/<?php echo $id_tanque ?>/<?php echo $id_uc ?>/<?php echo $tipo ?>" method="POST" onsubmit="$('#submitBtn').prop('disabled', true);" >

                        <p class="text-center mt-2 font-weight-bold"><?php if (!empty($tanques)) {
                                                                        foreach ($tanques as $tanque) {
                                                                                if ($tanque->Id_tanque == $id_tanque) {
                                                                                        echo strtoupper($tanque->Tnq_nombre);
                                                                                }
                                                                        }
                                                                }
                                                                ?></p>

                        <div class="form-group">
                                <label class="col-form-label">Fecha y Hora Inicio :</label>
                                <input type="datetime-local" name="fecha" class="form-control" min="<?php
                                                                                                        switch ($tipo) {
                                                                                                                case 1:
                                                                                                                        $parte1 = substr($fechai->Rep_fecha_ingreso_tanque, -19, 10);
                                                                                                                        $parte2 = substr($fechai->Rep_fecha_ingreso_tanque, 11, strlen($fechai->Rep_fecha_ingreso_tanque));
                                                                                                                        echo $parte1 . 'T' . $parte2;
                                                                                                                        break;
                                                                                                                case 2:
                                                                                                                        $parte1 = substr($fechai->Cri_fecha_ingreso_tanque, -19, 10);
                                                                                                                        $parte2 = substr($fechai->Cri_fecha_ingreso_tanque, 11, strlen($fechai->Cri_fecha_ingreso_tanque));
                                                                                                                        echo $parte1 . 'T' . $parte2;
                                                                                                                        break;
                                                                                                                case 3:
                                                                                                                        $parte1 = substr($fechai->En_fecha_ingreso_tanque, -19, 10);
                                                                                                                        $parte2 = substr($fechai->En_fecha_ingreso_tanque, 11, strlen($fechai->En_fecha_ingreso_tanque));
                                                                                                                        echo $parte1 . 'T' . $parte2;
                                                                                                                        break;
                                                                                                        }


                                                                                                        ?>" required="true">
                        </div>
                        <div class="form-group">
                                <label class="col-form-label">Nombre de la enfermedad:</label>
                                <input type="text" class="form-control" name="ne" placeholder="Nombre enfermedad" required="true">
                        </div>




                        <div class="row justify-content-end">
                                <div class="p-2 ml-5">
                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Venf/<?php echo $id_tanque ?>/<?php echo $id_uc ?>/<?php echo $tipo ?>" class="btn btn-outline-secondary ml-5">
                                                <span class="fas fa-arrow-alt-circle-left"></span>
                                        </a>
                                </div>
                                <div class="p-2 ml-5">
                                        <button data-toggle="tooltip" data-placement="top" title="Registrar" id="submitBtn" type="submit" class="btn btn-outline-secondary  ml-5">
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