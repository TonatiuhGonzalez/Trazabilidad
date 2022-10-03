<div class="content-wrapper" id="contenido">
        <section class="content">
                <div class="mt-2 ml-1 mr-1">
                        <div class="box-body">
                                <div class="container-fluid Vauce-1">
                                        <div class="row mt-3 Vauce-1 text-white justify-content-between ">

                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1">Engorda <i> |</i> </li>
                                                                <li class="text-info mr-1">Unidades Producidas <i> |</i> </li>
                                                                <li class="text-secondary"> Nueva Unidad </li>
                                                        </ol>
                                                </div>
                                        </div>
                                </div>
                                <form action="<?php echo base_url() ?>Auce" method="POST" onsubmit="$('#submitBtn').prop('disabled', true);">
                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Identificador Único Comercial:</label>
                                                        <input disabled type="text" class="form-control" value="<?php
                                                        // var_dump($identificadores)
                                                                                                                if( count($identificadores) <=1){
                                                                                                                        $permitted_chars = '0123456789';
                                                                                                                        $n = substr(str_shuffle($permitted_chars), 0, 8);
                                                                                                                        $ni='C'.date('ym').'3'.$n.$this->session->userdata('identificador_unico');
                                                                                                                        echo $n;
                                                                                                                        echo $ni;
                                                                                                                }else{
                                                                                                                $rep = 0;
                                                                                                                for ($i = 1; $i < count($identificadores); ++$i) {
                                                                                                                    $permitted_chars = '0123456789';
                                                                                                                    $n = substr(str_shuffle($permitted_chars), 0, 8);
                                                                                                                    $ni='C'.date('ym').'3'.$n.$this->session->userdata('identificador_unico');
                                                                                                                    foreach ($identificadores as $identificador) {
                                                                                                                        if ($ni == $identificador->En_identificador_unico) {
                                                                                                                            $rep = 1;
                                                                                                                        }
                                                                                                                    }
                                                                                                                    if ($rep == 0) {
                                                                                                                        break;
                                                                                                                    }
                                                                                                                    echo "hh";
                                                                                                                }
                                                                                                                // echo $n;
                                                                                                                echo $ni ;
                                                                                                        }  

                                                                                                                ?>" required="true">
                                                </div>
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
                                        </div>

                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Fecha de Ingreso al Tanque :</label>
                                                        <input type="datetime-local" class="form-control ml-auto mr-auto mb-auto mt-auto" name="fi" placeholder="Fecha de Caducidad" required="true">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Número de alevines ingresados al tanque :</label>
                                                        <input type="number" min="0" class="form-control" name="di" placeholder="Ingrese Número de alevines " required="true">
                                                </div>
                                        </div>
                                        <div class="form-row">
                                                <div class="col">
                                                        <label id="epo" class="col-form-label"></label>
                                                        <input type="number" min="0" value="" max="" class="form-control" id="p" name="po" placeholder="Ingrese el porcentaje que se ocupo de esta unidad recibida " required="true">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label"> Kilogramos ocupados:</label>
                                                        <input type="number" disabled step=".01" min="0" max="" value="" class="form-control" id="ko" required="true">
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <!-- <div class="col">
                                                        <label class="col-form-label">Peso Promedio ( Gramos ) :</label>
                                                        <input type="number" min="0" step=".01" class="form-control" name="pp" placeholder="Ingrese Peso Promedio " required="true">
                                                </div> -->
                                                <div class="col">
                                                        <label for="exampleFormControlSelect1" class="col-form-label">Unidades Recibidas</label>
                                                        <select name='ul' class="form-control" id="example" required="true">
                                                                <?php if (!empty($unidades)) {
                                                                        foreach ($unidades as $unidad) {
                                                                ?>

                                                                                <option value="<?php echo $unidad->Id_unidad_recibida ?>">
                                                                                        <?php echo $unidad->Ur_identificador_unico_logistico ?> ->
                                                                                        <?php echo $unidad->Soc_nombre ?> ->
                                                                                        <?php echo date("d/m/Y g:i A",strtotime($unidad->Ur_fecha_hora_recepcion)) ?>
                                                                                </option>

                                                                <?php
                                                                        }
                                                                }
                                                                ?>
                                                        </select>
                                                </div>
                                                <div class="col">
                                                        <label for="exampleFormControlSelect1" class="col-form-label">Especie</label>
                                                        <select name='especie' class="form-control" id="exampleFormControlSelect1" required="true">
                                                                <?php if (!empty($especies)) {
                                                                        foreach ($especies as $e) {
                                                                ?>

                                                                                <option value="<?php echo strtoupper($e->Id_especie) ?>"><?php echo strtoupper($e->Sci_nombre_cientifico) ?></option>

                                                                <?php
                                                                        }
                                                                }
                                                                ?>
                                                        </select>
                                                </div>
                                        </div>

                                      

                                        <div class="form-group">
                                                <input type="hidden" step=".01" min="0" max="" value="" class="form-control" id="kop" name="ko" required="true">
                                        </div>


                                        <div class="form-group">
                                                <input type="hidden" name="nu" value="<?php echo $ni ?>" required="true">
                                        </div>

                                        <div class="row justify-content-end">
                                                <div class="p-2 ml-5">
                                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Uen" class="btn btn-outline-secondary  ml-5">
                                                                <span class="fas fa-arrow-alt-circle-left"></span> <span class="fas fa-user-graduate">
                                                        </a>
                                                </div>
                                                <div class="p-2 ml-5">
                                                        <button data-toggle="tooltip" data-placement="top" title="Registrar" type="submit" id="submitBtn" class="btn btn-outline-secondary mr-5 ml-5">
                                                                <span class="fas fa-check"></span>
                                                        </button>
                                                </div>

                                        </div>


                                </form>
                        </div>
                </div>
        </section>
</div>

<script>
        var valor = $("#example")
        var porcentaje = $("#p")
        var epo = $("#epo")
        var cp = 0
        var np = 0
        var v = $("#example option:selected").val();
        var pul = <?php echo $unidad->Ur_porcentaje ?>

        <?php if (!empty($unidades)) {
                foreach ($unidades as $unidad) {
        ?>
                        if (<?php echo $unidad->Id_unidad_recibida ?> == v) {


                                $("#ko").attr("value", <?php echo $unidad->Ur_kilogramos ?>);
                                $("#kop").attr("value", <?php echo $unidad->Ur_kilogramos ?>);
                                porcentaje.attr("max", <?php echo $unidad->Ur_porcentaje ?>);
                                porcentaje.attr("value", <?php echo $unidad->Ur_porcentaje ?>);
                                epo.text('Porcentaje ocupado: ( 0% -  <?php echo $unidad->Ur_porcentaje ?>% ) ');

                                cp = <?php echo $unidad->Ur_kilogramos ?>;
                                if (porcentaje.val() == 100) {
                                        $("#ko").attr('value', cp);
                                        $("#kop").attr('value', cp);

                                } else if (porcentaje.val() < 100) {
                                        np = (cp / 100) * porcentaje.val();
                                        $("#ko").attr('value', np.toFixed(2));
                                        $("#kop").attr('value', np.toFixed(2));
                                }
                        }


        <?php
                }
        }
        ?>



        valor.change(function() {
                v = $("#example option:selected").val();
                <?php if (!empty($unidades)) {
                        foreach ($unidades as $unidad) {
                ?>
                                if (<?php echo $unidad->Id_unidad_recibida ?> == v) {
                                        $("#ko").attr("value", <?php echo $unidad->Ur_kilogramos ?>);
                                        $("#kop").attr("value", <?php echo $unidad->Ur_kilogramos ?>);
                                        porcentaje.attr("max", <?php echo $unidad->Ur_porcentaje ?>);
                                        porcentaje.attr("value", <?php echo $unidad->Ur_porcentaje ?>);
                                        epo.text('Porcentaje ocupado: ( 0% -  <?php echo $unidad->Ur_porcentaje ?>% ) ');
                                        cp = <?php echo $unidad->Ur_kilogramos ?>;
                                }

                <?php
                        }
                }
                ?>

                if (porcentaje.val() == 100) {
                        $("#ko").attr('value', cp);
                        $("#kop").attr('value', cp);

                } else if (porcentaje.val() < 100) {
                        np = (cp / 100) * porcentaje.val();
                        $("#ko").attr('value', np.toFixed(2));
                        $("#kop").attr('value', np.toFixed(2));
                }

                console.log(v)
        })

        porcentaje.change(function() {
                if (porcentaje.val() == 100) {
                        $("#ko").attr('value', cp);
                        $("#kop").attr('value', cp);
                } else if (porcentaje.val() < 100) {
                        np = (cp / 100) * porcentaje.val();
                        $("#ko").attr('value', np.toFixed(2));
                        $("#kop").attr('value', np.toFixed(2));
                }
        })
</script>