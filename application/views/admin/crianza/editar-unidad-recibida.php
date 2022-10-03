<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Veurc-1">
                    <div class="row mt-3 Veurc-1 text-white justify-content-between ">

                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Hormonado <i> |</i> </li>
                                <li class="text-info mr-1">Unidades Recibidas <i> |</i> </li>
                                <li class="text-secondary"> Editar Unidad </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <?php if (!empty($this->session->flashdata("nomr"))) { ?>
                    <div class="alert alert-warning alert-dismissible fade show">
                        <strong class="text-center"> El identificador único logístico no existe, asegurese de haber ingresado correctamente el identificador</strong>

                    </div>
                <?php } ?>

                <form action="<?php echo base_url() ?>Eurc" method="POST">

                    <div class="form-row">
                        <div class="col">
                            <label class="col-form-label">Identificador Unico Logistico de la Unidad</label>
                            <input name='iul' class="form-control" value="<?php echo $unidad->Ur_identificador_unico_logistico ?>" placeholder="Ingresa Identificador Único Logistico" required="true">
                        </div>
                        <div class="col">
                            <label for="exampleFormControlSelect1" class="col-form-label">Socio</label>
                            <select name='socio' class="form-control" id="socio" id="exampleFormControlSelect1" required="true">
                                <?php if (!empty($socios)) {
                                ?>
                                    <option value="<?php echo strtoupper($unidad->Id_socio) ?>"><?php echo strtoupper($unidad->Soc_nombre) ?></option>
                                    <?php
                                    foreach ($socios as $socio) {
                                        if ($socio->Id_socio != $unidad->Id_socio) {
                                    ?>

                                            <option value="<?php echo strtoupper($socio->Id_socio) ?>"><?php echo strtoupper($socio->Soc_nombre) ?></option>

                                <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row" id="feyhr">
                        <div class="col">
                            <label class="col-form-label">Fecha y Hora de la Recepción:</label>
                            <input type="datetime-local" id="ifhr" class="form-control ml-auto mr-auto mb-auto mt-auto" value="<?php
                                                                                                                                $parte1 = substr($unidad->Ur_fecha_hora_recepcion, -19, 10);
                                                                                                                                $parte2 = substr($unidad->Ur_fecha_hora_recepcion, 11, strlen($unidad->Ur_fecha_hora_recepcion));
                                                                                                                                echo $parte1 . 'T' . $parte2 ?>" name="frul" placeholder="Fecha de Caducidad" required="true">
                        </div>
                        <div class="col" id="tr">
                            <label class="col-form-label">Temperatura de Recepción: (°C)</label>
                            <input type="number" id="itr" min="0" class="form-control" name="tr" value="<?php echo $unidad->Ur_registro_temperatura ?>" placeholder="Temperatura a la que se Recibe " required="true">
                        </div>
                    </div>

                    <div class="form-group" id="kir">
                        <label class="col-form-label">kilogramos recibidos:</label>
                        <input id="ikr" min="0.1" type="number" step="0.1" class="form-control" value="<?php echo $unidad->Ur_kilogramos ?>" name="kr" placeholder="Ingresar los Kilogramos que recibio" required="true">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="id_ur" value="<?php echo $id_ur ?>" required="true">
                    </div>

                    <div class="row justify-content-end">
                        <div class="p-2 ml-5">
                            <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Vgurc" class="btn btn-outline-secondary ml-5">
                                <span class="fas fa-arrow-alt-circle-left"></span>
                            </a>

                        </div>
                        <div class="p-2 ml-5">
                            <button data-toggle="tooltip" data-placement="top" title="Guardar Cambios" type="submit" class="btn btn-outline-secondary mr-5  ml-5">
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
    // 
    if ($('#socio').val() == 2) {
        // $('#kir').hide();
        $('#tr').hide();
        $('#feyhr').hide();
        $('#ifhr').val("1994-02-13T10:00");
        $('#itr').val(1);
        // $('#ikr').val(.1);
    }
    //

    $('#socio').change(function() {
        if (this.value == 2) {
            // $('#kir').hide();
            $('#tr').hide();
            $('#feyhr').hide();
            // $('#ifhr').attr('type', 'hidden');
            // $('#itr').attr('type', 'hidden');
            // $('#ikr').attr('type', 'hidden');
            $('#ifhr').val("1994-02-13T10:00");
            $('#itr').val(1);
            // $('#ikr').val(.1);



        } else {

            $('#kir').hide();
            $('#tr').hide();
            $('#feyhr').hide();
            $('#kir').show();
            $('#tr').show();
            $('#feyhr').show();
            $('#ifhr').val("");
            $('#itr').val("");
            $('#ikr').val("");

            // $('#feyhr').append("<label  class=\"col-form-label\">Fecha y Hora de la Recepción:</label><input type=\"datetime-local\" class=\"form-control ml-auto mr-auto mb-auto mt-auto\"name=\"frul\" placeholder=\"Fecha de Caducidad\" required=\"true\" >");
            // $('#tr').append("   <label  class=\"col-form-label\">Temperatura de Recepción: (°C)</label><input type=\"number\" min=\"1\" class=\"form-control\"  name=\"tr\"placeholder=\"Temperatura a la que se recibe \" required=\"true\" >");
            // $('#kir').append(" <label  class=\"col-form-label\">kilogramos recibidos:</label><input  min=\".1\" type=\"number\" step=\"0.1\" class=\"form-control\" name=\"kr\" placeholder=\"Ingresar los Kilogramos que recibió\"  >");

        }


    })
</script>