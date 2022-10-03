<div class="content-wrapper" id="contenido" >
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body" >
                <div class="container-fluid Veucle-1">
                    <div class="row mt-3 Veucle-1 text-white justify-content-between ">
                        
                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Engorda <i> |</i> </li>
                                <li class="text-info mr-1">Unidades Enviadas <i> |</i> </li>                                
                                <li class="text-info mr-1"><?php echo $unidades[0]->{'Ue_identificador_unico_logistico'} ?> <i> |</i> </li>                                
                                <li class="text-info mr-1"> <?php echo $uc->En_identificador_unico ?> <i> |</i> </li>                                
                                <li class="text-secondary"> Editar</li>
                            </ol>
                        </div>
                    </div>
                </div> 
                <form action="<?php echo base_url()?>Eucle" method="POST">                   
                   
                    <div class="form-group">
                            <label  class="col-form-label">Kilogramos :</label>
                            <input type="number" min="1" class="form-control " step="0.1" name="k" value="<?php echo $uc->Det_u_e_eng_kilogramos?>" required="true" >
                    </div>
                    
                    <div class="form-group">
                            <label  class="col-form-label">Porcentaje ( 1% - <?php echo $uc->En_porcentaje ?>% ):</label>
                            <input type="number" min="1"  max="<?php echo $uc->En_porcentaje ?>" class="form-control"  name="p" value="<?php echo $uc->Det_u_e_eng_porcentaje?>" required="true" >
                    </div>
                    <div class="form-group">
                            
                            <input type="hidden"  class="form-control"  name="d" value="<?php echo $uc->Id_detalle_unidad_enviada_engorda?>" required="true" >
                    </div>
                    <div class="form-group">
                            
                            <input type="hidden"  class="form-control"  name="id_ue" value="<?php echo $id_unidad_enviada?>" required="true" >
                    </div>
                  
                    
                    <div class="row justify-content-end">
                        <div class="p-2 ml-5">
                            <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url()?>Veunle/<?php echo $id_unidad_enviada?>" class="btn btn-outline-secondary ml-5">
                            <span class="fas fa-arrow-alt-circle-left" ></span>
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