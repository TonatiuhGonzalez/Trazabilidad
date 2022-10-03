<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="container-fluid">
            <div class="mt-2 ml-1 mr-1">
                <div class="box-body">
                    <div class="container-fluid Vafee-1">
                        <div class="row mt-3 Vafee-1 text-white justify-content-between ">

                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                    <li class="text-info mr-1">Hormonado <i> |</i> </li>
                                    <li class="text-info mr-1"> Unidades Producidas <i> |</i> </li>
                                    <li class="text-info mr-1"> <?php echo $uc->Cri_identificador_unico ?> <i> |</i> </li>
                                    <li class="text-secondary"> Historial tanques </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="card text-center border-info">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a data-toggle="tooltip" data-placement="top" title="Reproductores" class="nav-link " href="<?php echo base_url() ?>Uc" type="button" id="reproduccion">

                                        <span class="Vafee-2 fas fa-venus-mars"></span> </a>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a data-toggle="tooltip" data-placement="top" title="Hormonado" class="nav-link active" type="button" id="crianza">
                                        <span class="fas fa-baby-carriage"></span> </a>
                                </li>

                                <li class="nav-item ">
                                    <a data-toggle="tooltip" data-placement="top" title="Engorda" class="nav-link " href="<?php base_url() ?>Alme" type="button">
                                        <span class="Vafee-2 fas fa-user-graduate"></span> </a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body">

                            <div class="row justify-content-first">
                                <div class="p-2 ">
                                    <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Uccr" class="btn btn-outline-secondary ">
                                        <span class="fas fa-arrow-alt-circle-left"></span> <span class="fas fa-baby-carriage"></span>
                                    </a>
                                </div>
                            </div>

                            <div class="row justify-content">
                                <div class="col-md-12 mt-4">
                                    <table id="httable" class="table table-bordered btn-hover">
                                        <thead>
                                            <tr>
                                                <th class="Uccr-1 text-white">Tanque</th>
                                                <th class="Uccr-1 text-white">Fecha de ingreso</th>
                                                <th class="Uccr-1 text-white">Fecha de egreso</th>

                                            </tr>
                                        <tbody id="cuerpotabla">
                                            <?php if (!empty($tanques)) {
                                                foreach ($tanques as $tanque) {
                                            ?>
                                                    <tr>

                                                        <td><?php echo $tanque->Tnq_nombre ?></td>
                                                        <td><?php echo date("d/m/Y g:i A", strtotime($tanque->Cri_fecha_ingreso_tanque)) ?></td>
                                                        <td><?php if ($tanque->Cri_fecha_egreso_tanque == "0000-00-00 00:00:00") {
                                                                echo '0000-00-00 00:00:00';
                                                            } else {
                                                                echo date("d/m/Y g:i A", strtotime($tanque->Cri_fecha_egreso_tanque));
                                                            }

                                                            ?></td>


                                                    </tr>

                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>

                                        </thead>
                                    </table>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

