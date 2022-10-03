<div class="content-wrapper" id="contenido">
        <section class="content">
                <div class="mt-2 ml-1 mr-1">
                        <div class="box-body">
                                <div class="container-fluid h-1">
                                        <div class="row mt-3 h-1 text-white justify-content-first ">

                                                <div class="p-2 ">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class=" text-info mr-1"> Reproductores <i>|</i> </li>
                                                                <li class="text-info mr-1"> Unidades Producidas <i>|</i> </li>
                                                                <li class="text-secondary "> Nueva Unidad </li>
                                                        </ol>
                                                </div>
                                        </div>
                                </div>
                                <form action="<?php echo base_url() ?>Aur" method="POST" onsubmit="$('#submitBtn').prop('disabled', true); ">
                                        <div class="row">
                                                <div class="col">
                                                        <label class="col-form-label">Identificador Único Comercial:</label>
                                                        <input disabled type="text" class="form-control" 
                                                        value="<?php
                                                                        if (count($identificadores) <= 1) {
                                                                                $permitted_chars = '0123456789';
                                                                                $n = substr(str_shuffle($permitted_chars), 0, 8);
                                                                                $ni = 'C' . date('ym') . '1' . $n . $this->session->userdata('identificador_unico');
                                                                                echo $ni;
                                                                        } else {

                                                                                $rep = 0;
                                                                                for ($i = 1; $i < count($identificadores); ++$i) {
                                                                                        $permitted_chars = '0123456789';
                                                                                        $n = substr(str_shuffle($permitted_chars), 0, 8);
                                                                                        $ni = 'C' . date('ym') . '1' . $n . $this->session->userdata('identificador_unico');
                                                                                        foreach ($identificadores as $identificador) {
                                                                                                if ($ni == $identificador->Rep_identificador_unico) {
                                                                                                        $rep = 1;
                                                                                                }
                                                                                        }
                                                                                        if ($rep == 0) {
                                                                                                break;
                                                                                        }
                                                                                }
                                                                                echo $ni;
                                                                        }

                                                                 ?>" required="true">

                                                </div>
                                                <div class="col">
                                                        <label for="exampleFormControlSelect1" class="col-form-label">Especie</label>
                                                        <select name='especie' class="form-control" id="exampleFormControlSelect1" required="true">
                                                                <?php if (!empty($especies)) { ?>

                                                                        <!-- <option value="<?php echo strtoupper($tanque->Id_especie) ?>"><?php echo strtoupper($tanque->Sci_nombre_cientifico) ?></option> -->

                                                                        <?php foreach ($especies as $especie) {
                                                                                // if ($tanque->Id_especie != $especie->Id_especie) {
                                                                        ?>

                                                                                <option value="<?php echo strtoupper($especie->Id_especie) ?>"><?php echo strtoupper($especie->Sci_nombre_cientifico) ?></option>

                                                                <?php
                                                                                // }
                                                                        }
                                                                }
                                                                ?>
                                                        </select>
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="col">
                                                        <label for="exampleFormControlSelect1" class="col-form-label">Tanque</label>
                                                        <select name='tanque' class="form-control" id="exampleFormControlSelect1" required="true">
                                                                <?php if (!empty($tanques)) {
                                                                        foreach ($tanques as $tanque) {
                                                                ?>

                                                                                <option value="<?php echo strtoupper($tanque->Id_tanque) ?>"><?php echo strtoupper($tanque->Tnq_nombre) ?></option>

                                                                <?php
                                                                        }
                                                                }
                                                                ?>
                                                        </select>
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Fecha de Ingreso al Tanque :</label>
                                                        <input type="datetime-local" class="form-control ml-auto mr-auto mb-auto mt-auto" name="fi" placeholder="Fecha de Caducidad" required="true">
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label class="col-form-label">Número de Reproductores ingresados :</label>
                                                <input type="number" min="0" class="form-control" name="di" placeholder="Número de Reproductores ingresados" required="true">
                                        </div>
                                        <div class="form-group">
                                                <input type="hidden" name="nu" value="<?php

                                                                                        echo $ni;

                                                                                        ?>" required="true">
                                        </div>

                                        <div class="row justify-content-end">
                                                <div class="p-2 ml-5">
                                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Uc" class="btn btn-outline-secondary ">
                                                                <span class="fas fa-arrow-alt-circle-left"></span> <span class="fas fa-venus-mars"></span></a>
                                                </div>
                                                <div class="p-2 mr-5" id="btnregistrar">
                                                        <button data-toggle="tooltip" data-placement="top" title="Registrar" id="submitBtn" type="submit" class="btn btn-outline-secondary ml-5">
                                                                <span class="fas fa-check"></span>
                                                                <div id="reg">

                                                                </div>
                                                        </button>
                                                </div>



                                        </div>

                                </form>
                        </div>
                </div>
        </section>
</div>