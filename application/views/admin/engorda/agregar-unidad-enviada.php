<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Vaunle-1">
                    <div class="row mt-3 Vaunle-1 text-white justify-content-between ">

                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Engorda <i> |</i> </li>
                                <li class="text-info mr-1">Unidades Enviadas <i> |</i> </li>
                                <li class="text-secondary"> Nueva Unidad </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <form action="<?php echo base_url() ?>Aunle" method="POST" onsubmit="$('#submitBtn').prop('disabled', true);">
                    <div class="form-group">
                        <label class="col-form-label">Identificador Único Logístico (SSCC):</label>
                        <input disabled type="text" class="form-control" value="<?php

                                                                                $rep = 0;
                                                                                for ($i = 1; $i < count($identificadores); ++$i) {
                                                                                    $permitted_chars = '0123456789';
                                                                                    $n = substr(str_shuffle($permitted_chars), 0, 8);
                                                                                    $ni = 'L' . date('ym') . '3' . $n . $this->session->userdata('identificador_unico');
                                                                                    foreach ($identificadores as $identificador) {
                                                                                        if ($ni == $identificador->Ue_identificador_unico_logistico) {
                                                                                            $rep = 1;
                                                                                        }
                                                                                    }
                                                                                    if ($rep == 0) {
                                                                                        break;
                                                                                    }
                                                                                }
                                                                                echo $ni;


                                                                                ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Socio</label>
                        <select name='socio' class="form-control" id="exampleFormControlSelect1" required="true">
                            <?php if (!empty($socios)) {
                                foreach ($socios as $socio) {
                            ?>

                                    <option value="<?php echo strtoupper($socio->Id_socio) ?>"><?php echo strtoupper($socio->Soc_nombre) ?></option>

                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Fecha de Envío :</label>
                        <input type="datetime-local" class="form-control ml-auto mr-auto mb-auto mt-auto" name="fe" required="true">
                    </div>


                    <div class="form-group">
                        <input type="hidden" name="nil" value="<?php echo $ni; ?>" required="true">
                    </div>

                    <div class="row justify-content-end">
                        <div class="p-2 ml-5">
                            <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Vunle" class="btn btn-outline-secondary ml-5">
                                <span class="fas fa-arrow-alt-circle-left"></span>
                            </a>
                        </div>
                        <div class="p-2 ml-5">
                            <button data-toggle="tooltip" data-placement="top" title="Registrar" id="submitBtn" type="submit" class="btn btn-outline-secondary mr-5 ml-5">
                                <span class="fas fa-check"></span>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
</div>