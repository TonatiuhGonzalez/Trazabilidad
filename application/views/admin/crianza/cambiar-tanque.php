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
                                    <li class="text-secondary"> Cambiar tanque </li>
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

                            <div class="row justify-content">
                                <div class="col-md-12 mt-4">
                                    <form action="<?php echo base_url() ?>Ctc" method="POST" onsubmit="$('#submitBtn').prop('disabled', true); ">

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
                                                <label class="col-form-label">Fecha Egreso:</label>
                                                <input type="datetime-local" name="fe" class="form-control ml-auto mr-auto mb-auto mt-auto" min="<?php
                                                                                                                                                    $parte1 = substr($uc->{'Cri_fecha_ingreso_tanque'}, -19, 10);
                                                                                                                                                    $parte2 = substr($uc->{'Cri_fecha_ingreso_tanque'}, 11, strlen($uc->{'Cri_fecha_ingreso_tanque'}));
                                                                                                                                                    echo $parte1 . 'T' . $parte2 ?>" name="fe" placeholder="Fecha de Caducidad" required="true">

                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col">
                                                <label class="col-form-label">Porcentaje a Cambiar: ( % )</label>
                                                <input id="p" type="number" min="2" step="1" value="<?php echo $uc->Cri_porcentaje ?>" max="<?php echo $uc->Cri_porcentaje ?>" class="form-control" name="porcentaje" placeholder="Ingrese Porcentaje" required="true">
                                            </div>

                                            <div class="col">
                                                <label class="col-form-label">Aproximado en alevines: </label>
                                                <input id="ao" value="" disabled min="0" step="1" max="" class="form-control" required="true">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" class="form-control " name="id_uc" value="<?php echo $uc->Id_unidad_creada_crianza ?>" required="true">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control " id="ale" name="alevines" value="" required="true">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control " name="id_t" value="<?php echo $id_t ?>" required="true">
                                        </div>

                                        <div class="row justify-content-end">
                                            <div class="p-2 ml-5">
                                                <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Uccr" class="btn btn-outline-secondary ml-5">
                                                    <span class="fas fa-arrow-alt-circle-left"></span> <span class="fas fa-baby-carriage"></span>
                                                </a>
                                            </div>
                                            <div class="p-2 ">
                                                <button data-toggle="tooltip" data-placement="top" title="Registrar" id="submitBtn" type="submit" class="btn btn-outline-secondary mr-5 ml-5">
                                                    <span class="fas fa-check"></span>
                                                </button>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    var porcentaje = $("#p");
    var cp = <?php echo $uc->Cri_densidad_ingreso_tanque ?>;
    var np = 0;



    if (porcentaje.val() == 100) {
        $("#ao").attr('value', cp);
        $("#ale").attr('value', cp);
    } else if (porcentaje.val() < 100 && porcentaje.val() > 0) {
        np = (cp / 100) * porcentaje.val();
        $("#ao").attr('value', np.toFixed(0));
        $("#ale").attr('value', np.toFixed(0));
    }

    porcentaje.change(function() {
        if (porcentaje.val() == 100) {
            $("#ao").attr('value', cp);
            $("#ale").attr('value', cp);
        } else if (porcentaje.val() < 100 && porcentaje.val() > 0) {
            np = (cp / 100) * porcentaje.val();
            $("#ao").attr('value', np.toFixed(0));
            $("#ale").attr('value', np.toFixed(0));
        }
    })
</script>