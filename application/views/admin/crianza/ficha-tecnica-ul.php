<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="container-fluid">
            <div class="mt-2 ml-1 mr-1">
                <div class="box-body">
                    <div class="container-fluid Uccr-1">
                        <div class="row mt-3 Uccr-1 text-white justify-content-first ">

                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                    <li class="text-info mr-1">Hormonado <i> |</i> </li>
                                    <li class="text-info mr-1"> Unidades Enviadas <i> |</i> </li>
                                    <li class="text-info mr-1"> Histórico <i> |</i> </li>
                                    <li class="text-info mr-1"> <?php echo $unidades[0]->Ue_identificador_unico_logistico ?> <i> |</i> </li>
                                    <li class="text-secondary"> Ficha logística </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="card text-center border-info">
                        <div class="row justify-content-first">

                            <div class="p-2 ml-5">
                                <!-- <a class="btn btn-outline-secondary" href="<?php echo base_url() ?>Vuard" type="button">
                                    <span class="fas fa-arrow-alt-circle-left"></span> <span class="fas fa-venus-mars"></span> </a> -->

                                <a data-toggle="tooltip" data-placement="top" title="Regresar" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Vulacr" type="button">
                                    <span class="fas fa-arrow-alt-circle-left"></span> </a>
                            </div>

                        </div>
                        <div class="row justify-content-center ">
                            <div class="col-lg-5 ">
                                <div class="card shadow-lg border-0 rounded-lg login">
                                    <div class="card-header ">
                                        <!-- <p> <strong> Empresa de origen: </strong> <?php echo $emp->Emp_nombre ?>  </p> -->
                                        <p> <strong> Empresa de origen: </strong> <?php echo $emp->Est_nombre ?> </p>
                                    </div>
                                    <div class="card-body  ">

                                        <p>
                                            <strong> Identificador único logístico: </strong> <?php echo $unidades[0]->Ue_identificador_unico_logistico ?>
                                        </p>

                                        <p>
                                            <strong> Unidades comerciales dentro de la unidad logística: </strong> <?php $cont = 0;
                                                                                                                    if (!empty($identificadores)) {
                                                                                                                        $ar34 = array();
                                                                                                                        foreach ($identificadores as $unidad) {
                                                                                                                            array_push($ar34, $unidad->Cri_identificador_unico);
                                                                                                                        }
                                                                                                                        $resultados34 = array_unique($ar34);
                                                                                                                        $se34 = implode(",", $resultados34);
                                                                                                                        echo $se34;
                                                                                                                    } ?>
                                        </p>
                                        <p> <strong> Fecha y hora de envío: </strong> <?php echo  '  ' . date("d/m/Y g:i A", strtotime($unidades[0]->Ue_fecha_hora_despacho)) ?></p>
                                        <p> <strong> Especie: </strong> <?php echo  $unidades[0]->Sci_nombre_cientifico ?></p>
                                        <p>
                                            <strong> Volumen de unidad enviada: </strong> <?php $cont = 0;
                                                                                            if (!empty($unidades)) {

                                                                                                foreach ($unidades as $unidad) {
                                                                                                    $cont += $unidad->Det_u_e_cr_kilogramos;
                                                                                                }
                                                                                                echo $cont . ' Kg';
                                                                                            } ?>
                                        </p>

                                    </div>
                                    <li class="list-group-item">
                                        <p> <strong> Empresa de destino: </strong> <?php echo  '   ' . $unidades[0]->Soc_nombre ?> </p>
                                    </li>

                                </div>
                            </div>
                        </div>
                        <div>
                            <!--  -->
                            <a data-toggle="tooltip" data-placement="left" title="Descargar QR" title="<?php echo $img ?>" download="<?php echo $img ?>" href="<?php echo base_url() . "uploads/qr_code/" . $img ?>">
                                <img class="box-center " style="width: 25%; height: 25%; " src="<?php echo base_url() . "uploads/qr_code/" . $img ?>" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>