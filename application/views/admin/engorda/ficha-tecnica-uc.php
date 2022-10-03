<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="container-fluid">
            <div class="mt-2 ml-1 mr-1">
                <div class="box-body">
                    <div class="container-fluid Vucearc-1">
                        <div class="row mt-3 Vucearc-1 text-white justify-content-first ">

                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                    <li class="text-info mr-1">Engorda <i> |</i> </li>
                                    <li class="text-info mr-1"> Unidades Enviadas <i> |</i> </li>
                                    <li class="text-info mr-1"> Histórico <i> |</i> </li>
                                    <li class="text-info mr-1"> <?php  echo $ul[0]->{'Ue_identificador_unico_logistico'} ?> <i> |</i> </li>
                                    <li class="text-info mr-1"> <?php echo  $uc->En_identificador_unico ?> <i> |</i> </li>
                                    <li class="text-secondary"> Ficha Técnica </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="card text-center border-info">
                        <div class="row justify-content-first">

                            <div class="p-2 ml-5">
                                <a data-toggle="tooltip" data-placement="top" title="Regresar" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Vvulearc/<?php  echo base64_encode($ul[0]->{'Id_unidad_enviada'}) ?>" type="button">
                                    <span class="fas fa-arrow-alt-circle-left"></span> </a>

                                <!-- <a class="btn btn-outline-secondary" href="<?php echo base_url() ?>Vularc" type="button">
                                    <span class="fas fa-arrow-alt-circle-left"></span> <span class="fas fa-venus-mars"></span> </a> -->
                            </div>

                        </div>
                        <div class="row justify-content-center mt-5 ">
                            <div class="col-lg-5 ">
                                <div class="card shadow-lg border-0 rounded-lg login">
                                    <div class="card-header ">
                                        <!-- <p> <strong> Empresa de origen: </strong> <?php echo $emp->Emp_nombre ?>  </p> -->
                                        <p> <strong> Empresa de origen: </strong> <?php echo $emp->Est_nombre ?> </p>
                                    </div>
                                    <div class="card-body ">

                                        <p>
                                            <strong> Identificador único comercial: </strong> <?php echo  $uc->En_identificador_unico ?>
                                        </p>

                                        <p>
                                            <strong> Unidades enviadas que tienen parte de esta unidad: </strong> <?php $cont = 0;
                                                                                                if (!empty($unidades)) {
                                                                                                    $unidadesincorp=array();
                                                                                                    foreach ($unidades as $uni) {
                                                                                                        array_push($unidadesincorp, $uni->Ue_identificador_unico_logistico);
                                                                                                    }
                                                                                                    $unidadesincorp2 = array_unique($unidadesincorp);
                                                                                                    $unidadesincorp3 = implode("<br>", $unidadesincorp2); 
                                                                                                    echo $unidadesincorp3;

                                                                                                } ?></p>
                                        <p>
                                            <strong> Volumen de salida unidad comercial: </strong> <?php $cont = 0;
                                                                                                    if (!empty($unidades)) {

                                                                                                        foreach ($unidades as $unidad) {
                                                                                                            $cont += $unidad->Det_u_e_eng_kilogramos;
                                                                                                        }
                                                                                                        echo $cont . ' Kg';
                                                                                                    } ?></p>
                                        <p>
                                            <strong> Promedio de temperatura: </strong> <?php $cont = 0;
                                                                                        $prom = 0;
                                                                                        if (!empty($parametros)) {

                                                                                            foreach ($parametros as $parametro) {
                                                                                                $cont += 1;
                                                                                                $prom += $parametro->Psq_temperatura;
                                                                                            }
                                                                                            $res = $prom / $cont;
                                                                                            echo $res . ' °';
                                                                                        } ?></p>
                                        <p>
                                            <strong> Alimentos utilizados: </strong> <?php $rp = "";
                                                                                        if (!empty($alimentos)) {
                                                                                            $ar = array();

                                                                                            foreach ($alimentos as $alimento) {
                                                                                                array_push($ar, $alimento->Ia_nombre_comercial);
                                                                                            }
                                                                                            $resultados = array_unique($ar);
                                                                                            $se = implode(",", $resultados);
                                                                                            echo $se;
                                                                                        } ?></p>
                                        <p>
                                            <strong> Enfermedades: </strong> <?php $rp = "";
                                                                                if (!empty($enfermedades)) {
                                                                                    $ar2 = array();

                                                                                    foreach ($enfermedades as $enfermedad) {
                                                                                        array_push($ar2, $enfermedad->Enf_nombre);
                                                                                    }
                                                                                    $resultados2 = array_unique($ar2);

                                                                                    $se2=implode(",",$resultados2);                                                                                            //                                                                                           //   
                                                                                    echo $se2;                
                                                                                } ?></p>
                                        <p> <strong> Fecha de siembra: </strong> <?php echo  '  ' . date("d/m/Y g:i A", strtotime($uc->En_fecha_ingreso_tanque)) ?></p>
                                        <p> <strong> Especie: </strong> <?php echo  '  ' . $uc->Sci_nombre_cientifico ?></p>
                                        <p> <strong> Peso promedio: </strong> <?php echo  '  ' . $uc->En_peso_promedio ?> gramos</p>
                                        <p> <strong> Tanque: </strong> <?php echo  '  ' . $uc->Tnq_nombre ?></p>
                                       

                                    </div>
                                    <li class="list-group-item">
                                         <p> <strong> Granja de origen (alevines): </strong> <?php echo  '  ' . $proovedor->Soc_nombre ?></p>
                                        <p> <strong> Unidad recibida de donde genera esta unidad: </strong> <?php echo  '  ' . $proovedor->Ur_identificador_unico_logistico ?></p>
                                    </li>
                                    <!-- <li class="list-group-item">
                                        <p> <strong> Empresa de destino: </strong> <?php echo  '' . $uc->Soc_nombre ?> </p>
                                    </li> -->

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