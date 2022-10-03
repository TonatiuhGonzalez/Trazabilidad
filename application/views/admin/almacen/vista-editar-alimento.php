<div class="content-wrapper" id="contenido">
        <section class="content">
                <div class="mt-2 ml-1 mr-1">
                        <div class="box-body">
                                <div class="container-fluid Aal-1">
                                        <div class="row mt-3 Aal-1 text-white justify-content-between ">
                                               
                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1">Almacén <i> |</i> </li>
                                                                <li class="text-info mr-1"> Suministros Alimentarios <i> |</i> </li>
                                                                <li class="text-secondary"> Editar </li>
                                                        </ol>
                                                </div>
                                                
                                        </div>
                                </div>
                                <form action="<?php echo base_url() ?>Ralm/<?php echo $alimento->Id_insumo_alimentario ?>" method="POST">

                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Nombre Comercial :</label>
                                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Comercial" value="<?php echo $alimento->Ia_nombre_comercial ?>" required="true">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Fecha de Caducidad :</label>
                                                        <input type="datetime-local" class="form-control ml-auto mr-auto mb-auto mt-auto" name="fc" placeholder="Fecha de Caducidad" required="true" value="<?php
                                                                                                                                                                                                                $parte1 = substr($alimento->Ia_fecha_caducidad, -19, 10);
                                                                                                                                                                                                                $parte2 = substr($alimento->Ia_fecha_caducidad, 11, strlen($alimento->Ia_fecha_caducidad));
                                                                                                                                                                                                                echo $parte1 . 'T' . $parte2 ?>">
                                                </div>
                                        </div>
                                        
                                        <div class="form-row">
                                                
                                               
                                                        <label class="col-form-label">Contenido neto (Ingresar kilogramos) :</label>
                                                        <input type="number" min="0" step="0.1" class="form-control" name="cn" placeholder="Contenido Neto" required="true" value="<?php

                                                                                                                                                                                        echo $alimento->Ia_contenido_neto; ?>">
                                                
                                        </div>
                                       
                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Porcentaje Proteína :</label>
                                                        <input type="number" min="0" class="form-control" name="pp" placeholder="Porcentaje Proteína" required="true" value="<?php echo $alimento->Ia_porcentaje_proteina ?>">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Porcentaje Grasa :</label>
                                                        <input type="number" min="0" class="form-control" name="pg" placeholder="Porcentaje Grasa" value="<?php echo $alimento->Ia_porcentaje_grasa ?>">
                                                </div>
                                        </div>
                                        
                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Porcentaje Humedad :</label>
                                                        <input type="number" min="0" class="form-control" name="ph" placeholder="Porcentaje Humedad" value="<?php echo $alimento->Ia_porcentaje_humedad ?>">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Porcentaje Ceniza :</label>
                                                        <input type="number" min="0" class="form-control" name="pc" placeholder="Porcentaje Ceniza" value="<?php echo $alimento->Ia_porcentaje_ceniza ?>">
                                                </div>
                                        </div>
                                       
                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Porcentaje Fibra :</label>
                                                        <input type="number" min="0" class="form-control" name="pf" placeholder="Porcentaje Fibra" value="<?php echo $alimento->Ia_porcentaje_fibra ?>">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Porcentaje ELN :</label>
                                                        <input type="number" min="0" class="form-control" name="eln" placeholder="Porcentaje ELN" value="<?php echo $alimento->Ia_porcentaje_eln ?>">
                                                </div>
                                        </div>                                     

                                        <div class="form-row">
                                                <div class="col">
                                                        <label for="exampleFormControlSelect1" class="col-form-label">Socio</label>
                                                        <select name='socio' class="form-control" id="exampleFormControlSelect1" required="true">
                                                                <?php if (!empty($socios)) {
        
                                                                ?>
        
                                                                        <option value="<?php echo strtoupper($alimento->Id_socio) ?>"><?php echo strtoupper($alimento->Soc_nombre) ?></option>
        
                                                                        <?php
        
                                                                        foreach ($socios as $socio) {
                                                                                if ($socio->Id_socio != $alimento->Id_socio) {  ?>
        
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
                                                                                                                                                                                $parte1 = substr($alimento->Pro_insu_fecha_recepcion, -19, 10);
                                                                                                                                                                                $parte2 = substr($alimento->Pro_insu_fecha_recepcion, 11, strlen($alimento->Pro_insu_fecha_recepcion));
                                                                                                                                                                                echo $parte1 . 'T' . $parte2 ?>">
                                                </div>
                                        </div>
                                       
                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Cantidad Recibida :</label>
                                                        <input type="number" min="1" class="form-control" name="cr" placeholder="Cantidad Recibida" required="true" value="<?php echo $alimento->Pro_insu_cantidad_recibida ?>">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Precion Unitario :</label>
                                                        <input type="number" min="1" class="form-control" name="pu" placeholder="Precio Unitario" required="true" value="<?php echo $alimento->Pro_insu_precio_unitario ?>">
                                                </div>                                        
                                        </div> 

                                        <div class="row justify-content-end">
                                                <div class="p-2 ml-5">
                                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Al" class="btn btn-outline-secondary ml-5">
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