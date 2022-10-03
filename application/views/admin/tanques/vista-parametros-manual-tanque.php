<div class="content-wrapper">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Tpfqm-1">
                    <?php
                    switch ($tipo) {
                        case 1:
                    ?>
                            <div class="container-fluid h-1">
                                <div class="row mt-3 h-1 text-white justify-content-first ">
                                    <div class="p-2">
                                        <ol class="breadcrumb bg-white float-right mt-2">
                                            <li class="text-info mr-1">Reproductores<i> |</i> </li>
                                            <li class="text-info mr-1">Unidades Producidas <i> |</i> </li>
                                            <li class="text-info mr-1"><?php echo  $uc->Rep_identificador_unico ?><i> |</i> </li>
                                            <li class="text-info mr-1">Parametros Fisico-Químicos<i> |</i> </li>
                                            <li class="text-secondary"> Registro Manual </li>
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
                                            <li class="text-info mr-1">Hormonado<i> |</i> </li>
                                            <li class="text-info mr-1">Unidades Producidas <i> |</i> </li>
                                            <li class="text-info mr-1"><?php echo  $uc->Cri_identificador_unico ?><i> |</i> </li>
                                            <li class="text-info mr-1">Parametros Fisico-Químicos<i> |</i> </li>
                                            <li class="text-secondary"> Registro Manual </li>
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
                                            <li class="text-info mr-1">Parametros Fisico-Químicos<i> |</i> </li>
                                            <li class="text-secondary"> Registro Manual </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                    <?php
                            break;
                    }
                    ?>

                </div>
                <div class="card  border-info">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item ">
                                <a data-toggle="tooltip" data-placement="top" title="Automático" class="nav-link " href="<?php echo base_url() ?>Tpfq/<?php echo base64_encode($id_tanque) ?>/<?php echo base64_encode($id_unidad) ?>/<?php echo base64_encode($tipo) ?>" type="button" id="auto">
                                    <span class="Tpfqm-2  fas fa-robot"></span></a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="tooltip" data-placement="top" title="Manual" class="nav-link " type="button" id="manual">
                                    <span class="far fa-hand-paper"></span></a>
                            </li>


                        </ul>
                    </div>
                    <?php if (!empty($this->session->flashdata("edv"))) { ?>
                        <div class="alert alert-warning alert-dismissible fade show">
                            <strong class="text-center">Es necesario introducir todos los campos</strong>

                        </div>
                    <?php } ?>
                    <?php if (!empty($this->session->flashdata("edre"))) { ?>
                        <div class="alert alert-warning alert-dismissible fade show">
                            <strong class="text-center">La fecha de ingreso está repetida</strong>

                        </div>
                    <?php } ?>

                    <div class="card-body">

                        <form action="<?php echo base_url() ?>Tapfqm" method="POST" onsubmit="$('#submitBtn').prop('disabled', true);">

                            <p class="text-center mt-2 font-weight-bold"><?php if (!empty($tanques)) {
                                                                                foreach ($tanques as $tanque) {
                                                                                    if ($tanque->Id_tanque == $id_tanque) {
                                                                                        echo $tanque->Tnq_nombre;
                                                                                    }
                                                                                }
                                                                            }  ?></p>
                            <div class="form-row">
                                <div class="col">
                                    <label class="col-form-label">Temperatura:</label>
                                    <input type="number" min="0" step=".01" class="form-control" name="temperatura" placeholder="Temperatura" required="true">
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Oxígeno :</label>
                                    <input type="number" min="0" step=".01" class="form-control" name="oxigeno" placeholder="oxigeno" required="true">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label class="col-form-label">Ph :</label>
                                    <input type="number" min="0" step=".01" class="form-control" name="ph" placeholder="Ph" required="true">
                                </div>
                                <div class="col">
                                    <label class="col-form-label">Salinidad :</label>
                                    <input type="number" min="0" step=".01" class="form-control" name="sal" placeholder="Salinidad" required="true">
                                </div>

                            </div>

                            <div class="form-group">
                                <input type="hidden" value="<?php echo $id_tanque ?>" name="tanque" required="true">
                            </div>
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $id_unidad ?>" name="unidad" required="true">
                            </div>
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $tipo ?>" name="tipo" required="true">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Fecha y Hora :</label>
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
                            <div class="row justify-content-end">
                                <div class="p-2 ml-5">
                                    <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Tpfqg/<?php echo base64_encode($id_tanque) ?>/<?php echo base64_encode($id_unidad) ?>/<?php echo base64_encode($tipo) ?>" class="btn btn-outline-secondary ml-5">
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
                    </div>
                </div>

                <?php if ($this->session->flashdata("errordb")) { ?>
                    <div class="alert alert-warning alert-dismissible fade show">
                        <strong class="text-center"><?php echo $this->session->flashdata("errorbd") ?></strong>

                    </div>
                <?php } ?>




            </div>
        </div>
    </section>
</div>