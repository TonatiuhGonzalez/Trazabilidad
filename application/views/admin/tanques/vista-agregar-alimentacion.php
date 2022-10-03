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
                                <li class="text-info mr-1"> Alimentación <i> |</i> </li>
                                <li class="text-secondary"> Nuevo Registro</li>
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
                                <li class="text-info mr-1"> Alimentación <i> |</i> </li>
                                <li class="text-secondary"> Nuevo Registro </li>
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
                                <li class="text-info mr-1"> Alimentación <i> |</i> </li>
                                <li class="text-secondary"> Nuevo Registro </li>
                            </ol>
                        </div>
                    </div>
                </div>
        <?php
                break;
        }
        ?>


        <form action="<?php echo base_url() ?>agalm" method="POST"  onsubmit="$('#submitBtn').prop('disabled', true);" >

            <p class="text-center mt-3 font-weight-bold"><?php if (!empty($tanques)) {
                                                                foreach ($tanques as $tanque) {
                                                                    if ($tanque->Id_tanque == $id_tanque) {
                                                                        echo strtoupper($tanque->Tnq_nombre);
                                                                    }
                                                                }
                                                            }
                                                            ?> </p>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Usuario</label>
                <select disabled class="form-control" id="exampleFormControlSelect1">


                    <option><?php echo strtoupper($this->session->userdata('nombre')) ?></option>


                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Insumo</label>
                <select required="true" class="form-control" name="insumo" id="insumo">
                    <?php if (!empty($insumos)) {
                        foreach ($insumos as $insumo) {

                    ?>

                            <option value="<?php echo $insumo->Id_insumo_alimentario ?>">
                                <?php echo strtoupper($insumo->Ia_nombre_comercial) . ' --> Kilogramos en Almacen: ' . $insumo->Pro_insu_cantidad_total ?>

                            </option>

                    <?php

                        }
                    }
                    ?>
                </select>
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
            <div class="form-group">
                <label class="col-form-label">
                    <?php
                    switch ($tipo) {
                        case 1:
                    ?>
                            Cantidad (Kilogramos Porcion):
                        <?php
                            break;
                        case 2:
                        ?>
                            Cantidad (Gramos Porcion):
                        <?php
                            break;
                        case 3:
                        ?>
                            Cantidad (Kilogramos Porcion):
                    <?php
                            break;
                    }
                    ?> </label>
                <input type="number" max="" min=".001" step=".001" id="ko" class="form-control" name="cantidad" placeholder="<?php
                                                        switch ($tipo) {
                                                            case 1:
                                                                
                                                                echo "Cantidad Kilogramos"; 
                                                                
                                                                break;
                                                            case 2:
                                                                echo "Cantidad gramos"; 
                                                                break;
                                                            case 3:
                                                                echo "Cantidad Kilogramos"; 
                                                                break;
                                                        }
                                                        ?>" required="true">
            </div>
            <div class="form-group">
                <input type="hidden" value="<?php echo $id_tanque ?>" name="tanque">
            </div>
            <div class="form-group">
                <input type="hidden" value="<?php echo $this->session->userdata('id_usuario') ?>" name='usuario'>
            </div>
            <div class="form-group">
                <input type="hidden" value="<?php echo $id_uc ?>" name='uc'>
            </div>
            <div class="form-group">
                <input type="hidden" value="<?php echo $tipo ?>" name='tipo'>
            </div>


            <div class="row justify-content-end">
                <div class="p-2 ml-5">
                    <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Taalm/<?php echo $id_tanque ?>/<?php echo $id_uc ?>/<?php echo $tipo ?>" class="btn btn-outline-secondary ml-5">
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
<script>
    var valor = $("#insumo")

    var v = $("#insumo option:selected").val();

    <?php if (!empty($insumos)) {
        foreach ($insumos as $insumo) {
                                              switch ($tipo) {
                                                            case 1:
                                                                ?>
                                    if (<?php echo $insumo->Id_insumo_alimentario ?> == v) {
                                                    $("#ko").attr("max", <?php echo $insumo->Pro_insu_cantidad_total ?> );

                                                }
                                                                <?php
                                                                break;                                                                
                                                            case 2:
                                                                ?>

                                    if (<?php echo $insumo->Id_insumo_alimentario ?> == v) {
                                                    $("#ko").attr("max", <?php echo $insumo->Pro_insu_cantidad_total ?> * 1000);

                                                }
                                                        <?php                                                              
                                                                break;                                                                
                                                            case 3:
                                                                ?>
                                    if (<?php echo $insumo->Id_insumo_alimentario ?> == v) {
                                            $("#ko").attr("max", <?php echo $insumo->Pro_insu_cantidad_total ?>);

                                                }
                                                <?php
                                                                break;
                                                        }
                                                       
  
        }
    }
    ?>



    valor.change(function() {
        v = $("#insumo option:selected").val();
        <?php if (!empty($insumos)) {
        foreach ($insumos as $insumo) {
                                              switch ($tipo) {
                                                            case 1:
                                                                ?>
                                    if (<?php echo $insumo->Id_insumo_alimentario ?> == v) {
                                                    $("#ko").attr("max", <?php echo $insumo->Pro_insu_cantidad_total ?> );

                                                }
                                                                <?php
                                                                break;                                                                
                                                            case 2:
                                                                ?>

                                    if (<?php echo $insumo->Id_insumo_alimentario ?> == v) {
                                                    $("#ko").attr("max", <?php echo $insumo->Pro_insu_cantidad_total ?> * 1000);

                                                }
                                                        <?php                                                              
                                                                break;                                                                
                                                            case 3:
                                                                ?>
                                    if (<?php echo $insumo->Id_insumo_alimentario ?> == v) {
                                            $("#ko").attr("max", <?php echo $insumo->Pro_insu_cantidad_total ?>);

                                                }
                                                <?php
                                                                break;
                                                        }
                                                       
  
        }
    }
    ?>
        console.log(v)
    })



    //                             
</script>