<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Veure-1">
                    <div class="row mt-3 Veure-1 text-white justify-content-between ">

                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Engorda <i> |</i> </li>
                                <li class="text-info mr-1">Unidades Recibidas <i> |</i> </li>
                                <li class="text-secondary"> Editar </li>
                            </ol>
                        </div>
                        
                    </div>
                </div>
                <?php if (!empty($this->session->flashdata("nomr"))) { ?>
                        <div class="alert alert-warning alert-dismissible fade show">
                                <strong class="text-center"> El identificador único logístico no existe, asegurese de haber ingresado correctamente el identificador</strong>

                        </div>
                <?php } ?>
                <form action="<?php echo base_url() ?>Eure " method="POST">

                    <div class="form-row">
                        <div class="col">
                            <label class="col-form-control">Identificador Unico Logistico de la Unidad</label>
                            <input name='iul' class="form-control" value="<?php echo $unidad->Ur_identificador_unico_logistico ?>" placeholder="Ingresa Identificador Único Logistico" required="true">
                        </div>
                        <div class="col">
                            <label for="exampleFormControlSelect1">Socio</label>
                            <select name='socio' class="form-control" id="socio" required="true">
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

                    <div class="form-row">
                        <div class="col" id="feyhr">
                            <label class="col-form-label">Fecha y Hora de la Recepción:</label>
                            <input type="datetime-local" id="ifhr" class="form-control ml-auto mr-auto mb-auto mt-auto" value="<?php
                                                                                                                        $parte1 = substr($unidad->Ur_fecha_hora_recepcion, -19, 10);
                                                                                                                        $parte2 = substr($unidad->Ur_fecha_hora_recepcion, 11, strlen($unidad->Ur_fecha_hora_recepcion));
                                                                                                                        echo $parte1 . 'T' . $parte2 ?>" name="frul" placeholder="Fecha de Caducidad" required="true">
                        </div>
                        <div class="col" id="tr">
                            <label class="col-form-label">Temperatura de Recepción:</label>
                            <input type="number" min="0" id="itr" class="form-control" name="tr" value="<?php echo $unidad->Ur_registro_temperatura ?>" placeholder="Temperatura a la que se Recibe " required="true">
                        </div>
                    </div>

                    <div class="form-group" id="kir">
                        <label class="col-form-label">kilogramos recibidos:</label>
                        <input min="0" type="number" id="ikr" step="0.1" class="form-control" value="<?php echo $unidad->Ur_kilogramos ?>" name="kr" placeholder="Ingresar los Kilogramos que recibio" required="true">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="id_ur" value="<?php echo $id_ur ?>" required="true">
                    </div>
                    <div class="row justify-content-end">
                        <div class="p-2 ml-5">
                            <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Vure" class="btn btn-outline-secondary ml-5">
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
if($('#socio').val()==2){
            $('#kir').hide();
            $('#tr').hide();
            $('#feyhr').hide();
            $('#ifhr').val("1994-02-13T10:00");            
            $('#itr').val(1);
            $('#ikr').val(.1);
}
//

$('#socio').change(function() {
        if (this.value == 2) {
            $('#kir').hide();
            $('#tr').hide();
            $('#feyhr').hide();
            // $('#ifhr').attr('type', 'hidden');
            // $('#itr').attr('type', 'hidden');
            // $('#ikr').attr('type', 'hidden');
            $('#ifhr').val("1994-02-13T10:00");            
            $('#itr').val(1);
            $('#ikr').val(.1);

        
        
        }  else  {
                
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