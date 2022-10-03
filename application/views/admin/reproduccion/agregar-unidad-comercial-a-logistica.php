<div class="content-wrapper" id="contenido" >
    <section class="content">
        <div class="mt-2 ml-1 mr-1">            
            <div class="box-body" >
                <div class="container-fluid Vaucl-1">
                    <div class="row mt-3 Vaucl-1 text-white justify-content-first ">
                        
                        <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Reproductores <i> |</i> </li>                        
                                <li class="text-info mr-1"> Unidades Producidas <i> |</i> </li>                        
                                <li class="text-info mr-1"> <?php echo $uc->Rep_identificador_unico ?> <i> |</i> </li>                        
                                <li class="text-secondary"> Dentro de la Unidad Enviada </li>
                                </ol>
                        </div>
                    </div>
                </div>
                <form action="<?php echo base_url()?>Aucl" method="POST" onsubmit="$('#submitBtn').prop('disabled', true);">
                
                <div class="form-group mt-3">
                        <label for="exampleFormControlSelect1">Unidad Enviada (Identificador Único Logístico )</label>
                        <select name='ul' class="form-control" id="exampleFormControlSelect1" required="true">
                        <?php if(!empty($unidades)){
                                                foreach($unidades as $unidad){
                                                ?>
                        
                        <option value="<?php echo $unidad->Id_unidad_enviada?>" >
                        <?php echo $unidad->Soc_nombre.' -> '.$unidad->Ue_identificador_unico_logistico.' -> '.date("d/m/Y g:i A", strtotime($unidad->Ue_fecha_hora_despacho))
                            ?></option>
                        
                        <?php  
                                            }
                                            } 
                                            ?>
                        </select>
                </div>

                
                <div class="form-group">
                        <label  class="col-form-label">Número de alevines :</label>
                        <input type="number" min="1" 
                            class="form-control"  name="nale" placeholder="Ingrese número de alevines enviados" required="true" >
                </div>
                <div class="form-group">
                        <label  class="col-form-label">Número de Desove:</label>
                        <input type="number" value="<?php echo intval($uc->Rep_numero_desove)+1?>" disabled 
                        class="form-control" >
                </div>
                <div class="form-group">
                        
                        <input type="hidden"  class="form-control"  name="uc" value="<?php echo $id_unidad?>" required="true" >
                </div>
                
                
                <div class="row justify-content-end">
                    <div class="p-2 ml-5">
                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url()?>Uc" class="btn btn-outline-secondary ml-5">
                        <span class="fas fa-arrow-alt-circle-left" ></span>
                        </a>
                    </div>
                    <div class="p-2 ml-5">
                        <button  data-toggle="tooltip" data-placement="top" title="Registrar" type="submit" id="submitBtn" class="btn btn-outline-secondary  ml-5">
                        <span class="fas fa-check"></span>
                        </button>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </section>
</div>   