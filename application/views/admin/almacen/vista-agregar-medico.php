<div class="content-wrapper" id="contenido">
        <section class="content">
                <div class="mt-2 ml-1 mr-1">
                        <div class="box-body">
                                <div class="container-fluid Alam-1">
                                        <div class="row mt-3 Alam-1 text-white justify-content-between ">
                                               
                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1">Almacén <i> |</i> </li>
                                                                <li class="text-info mr-1">Suministros Médicos <i> |</i> </li>
                                                                <li class="text-secondary"> Nuevo Suministro </li>
                                                        </ol>
                                                </div>
                                                
                                        </div>
                                </div>
                                <form action="<?php echo base_url() ?>Amed" method="POST" onsubmit="$('#submitBtn').prop('disabled', true); ">
                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Nombre Comercial :</label>
                                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Comercial" required="true">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Fecha de Caducidad :</label>
                                                        <input type="date" class="form-control ml-auto mr-auto mb-auto mt-auto" name="fc" placeholder="Fecha de Caducidad" required="true">
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <!-- <div class="col">
                                                        <label class="col-form-label">Fecha de Producción:</label>
                                                        <input type="date" class="form-control" name="fp" placeholder="Fecha de producción" required="true">
                                                </div> -->
                                                <div class="col">
                                                        <label class="col-form-label">Contenido neto (Ingresar gramos) :</label>
                                                        <input type="number" min="1" class="form-control" name="cn" placeholder="Contenido neto " required="true">
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="col">
                                                        <label for="exampleFormControlSelect1" class="col-form-label">Socio</label>
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
                                                <div class="col">
                                                        <label class="col-form-label">Fecha de Recepción:</label>
                                                        <input type="datetime-local" class="form-control" name="fr" placeholder="Fecha de Recepción" required="true">
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Cantidad Recibida (Ingresar Cantidad de Productos Recibidos) :</label>
                                                        <input type="number" min="1" class="form-control" name="cr" placeholder="Cantidad Recibida" required="true">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Precio Unitario :</label>
                                                        <input type="number" min="1" class="form-control" name="pu" placeholder="Precio Unitario" required="true">
                                                </div>
                                        </div>

                                        <div class="row justify-content-end">
                                                <div class="p-2 ml-5">
                                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Alme" class="btn btn-outline-secondary ml-5">
                                                                <span class="fas fa-arrow-alt-circle-left"></span>
                                                        </a>
                                                </div>
                                                <div class="p-2 ml-5">
                                                        <button data-toggle="tooltip" data-placement="top" id="submitBtn" title="Registrar" type="submit" class="btn btn-outline-secondary mr-5 ml-5">
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

$("#nombre").keyup(function(){              
        var ta      =   $("#nombre");
        letras      =   ta.val().replace(/ /g, "");
        ta.val(letras)
});
</script>