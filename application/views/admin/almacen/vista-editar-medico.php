<div class="content-wrapper" id="contenido">
        <section class="content">
                <div class="mt-2 ml-1 mr-1">
                        <div class="box-body">
                                <div class="container-fluid Emed-1">
                                        <div class="row mt-3 Emed-1 text-white justify-content-between ">
                                             
                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1">Almacén <i> |</i> </li>
                                                                <li class="text-info mr-1">Suministros Médicos <i> |</i> </li>
                                                                <li class="text-secondary"> Editar </li>
                                                        </ol>
                                                </div>
                                                
                                        </div>
                                </div>
                                <form action="<?php echo base_url() ?>Eme/<?php echo $medico->Id_insumo_medico ?>" method="POST">
                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Nombre Comercial :</label>
                                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Comercial" required="true" value="<?php echo $medico->Inm_nombre_comercial ?>">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Fecha de Caducidad :</label>
                                                        <input type="date" class="form-control ml-auto mr-auto mb-auto mt-auto" name="fc" placeholder="Fecha de Caducidad" required="true" value="<?php

                                                                                                                                                                                                        echo $medico->Inm_fecha_caducidad ?>">
                                                </div>
                                        </div>
                                        
                                        <div class="form-row">
                                                <!-- <div class="col">
                                                        <label class="col-form-label">Fecha de Producción:</label>
                                                        <input type="date" class="form-control" name="fp" placeholder="Fecha de producción" required="true" value="<?php echo $medico->Inm_fecha_produccion ?>">
                                                </div> -->
                                                <div class="col">
                                                        <label class="col-form-label">Contenido neto (gramos) :</label>
                                                        <input type="number" min="0" class="form-control" name="cn" placeholder="Contenido neto " required="true" value="<?php echo $medico->Inm_contenido_neto ?>">
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="col">
                                                        <label for="exampleFormControlSelect1" class="col-form-label">Socio</label>
                                                        <select name='socio' class="form-control" id="exampleFormControlSelect1" required="true">
                                                                <?php if (!empty($socios)) {
        
                                                                ?>
        
                                                                        <option value="<?php echo strtoupper($medico->Id_socio) ?>"><?php echo strtoupper($medico->Soc_nombre) ?></option>
        
                                                                        <?php
        
                                                                        foreach ($socios as $socio) {
                                                                                if ($socio->Id_socio != $medico->Id_socio) {  ?>
        
                                                                                        <option value="<?php echo strtoupper($socio->Id_socio) ?>"><?php echo strtoupper($socio->Soc_nombre) ?></option>
                                                                <?php                   }
                                                                        }
                                                                }
                                                                ?>
                                                        </select>
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Fecha de Recepción:</label>
                                                        <input type="datetime-local" class="form-control" name="fr" placeholder="Fecha de Recepción" required="true" value="<?php
                                                                                                                                                                                $parte1 = substr($medico->Pro_insu_medico_fecha_recepcion, -19, 10);
                                                                                                                                                                                $parte2 = substr($medico->Pro_insu_medico_fecha_recepcion, 11, strlen($medico->Pro_insu_medico_fecha_recepcion));
                                                                                                                                                                                echo $parte1 . 'T' . $parte2 ?>">
                                                </div>
                                        </div>
                                       
                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Cantidad Recibida (Ingresar Cantidad de Productos Recibidos) :</label>
                                                        <input type="number" min="1" class="form-control" name="cr" placeholder="Cantidad Recibida" required="true" value="<?php echo $medico->Pro_insu_medico_cantidad_recibida ?>">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Precio Unitario :</label>
                                                        <input type="number" min="1" class="form-control" name="pu" placeholder="Precio Unitario" required="true" value="<?php echo $medico->Pro_insu_medico_precio_unitario ?>">
                                                </div>
                                        </div>              

                                        <div class="row justify-content-end">
                                                <div class="p-2 ml-5">
                                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Alme" class="btn btn-outline-secondary ml-5">
                                                                <span class="fas fa-arrow-alt-circle-left"></span> 
                                                        </a>
                                                </div>
                                                <div class="p-2 ml-5">
                                                        <button data-toggle="tooltip" data-placement="top" title="Guardar Cambios" type="submit" class="btn btn-outline-secondary mr-5 ml-5">
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