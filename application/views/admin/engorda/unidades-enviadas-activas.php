<div class="content-wrapper" id="contenido" >
    <section class="content">
        <div class="container-fluid">
            <div class="mt-2 ml-1 mr-1">
                <div class="box-body" >
                    <div class="container-fluid Vunle-1">
                        <div class="row mt-3 Vunle-1 text-white justify-content-between ">
                            
                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Engorda <i> |</i> </li>                        
                                <li class="text-secondary"> Unidades Enviadas </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="card text-center border-info">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item" >
                                    <a data-toggle="tooltip" data-placement="top" title="Reproductores" class="nav-link " href="<?php echo base_url()?>Uc" type="button" id="reproduccion">
                                    
                                    <span class="Vunle-2 fas fa-venus-mars" ></span> </a>
                                    </a>
                                    </li>
                                    <li class="nav-item  ">
                                    <a data-toggle="tooltip" data-placement="top" title="Hormonado" class="nav-link " href="<?php echo base_url()?>Uccr" type="button" >
                                        <span class="Vunle-2 fas fa-baby-carriage" ></span> </a>
                                    </li>
                                    
                                    <li class="nav-item ">
                                    <a data-toggle="tooltip" data-placement="top" title="Engorda" class="nav-link active" href="<?php echo base_url()?>Uen" type="button">
                                        <span class="fas fa-user-graduate" ></span> </a>
                                    </li>
                                                        
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-first">                        
                                        
                                        <div class="p-2" >
                                            <a data-toggle="tooltip" data-placement="top" title="Regresar" class="btn btn-outline-secondary" href="<?php echo base_url()?>Uen" type="button">
                                                <span class="fas fa-arrow-alt-circle-left" ></span>  </a>
                                        </div> 

                                        <div class="p-2" >
                                        <a data-toggle="tooltip" data-placement="top" title="Nueva Unidad" class="btn btn-outline-secondary" href="<?php echo base_url()?>Vaunle" type="button">
                                            <span class="fa fa-plus" ></span> <span class="fas fa-shipping-fast"> </a>
                                        </div>

                                        <div class="p-2" >
                                        <a data-toggle="tooltip" data-placement="top" title="Histórico" class="btn btn-outline-secondary" href="<?php echo base_url()?>Vulearc" type="button">
                                            <span class="fas fa-archive"> </a>
                                        </div>                       
                                
                                </div>
                                <div  class="row">
                                    <div class="col-md-12 mt-4">
                                        
                                        <table id="table" class="table table-bordered btn-hover">
                                            <thead>
                                                <tr> 
                                                    <th class="Vunle-1 text-white">Identificador Único Logístico</th>
                                                    <th class="Vunle-1 text-white">Enviado a: </th>
                                                    <th class="Vunle-1 text-white">Fecha y Hora Envío</th>
                                                    
                                                    <th class="Vunle-1 text-white">Opciones</th>
                                                                                            
                                                </tr>
                                                <tbody id="cuerpotabla">
                                                    <?php if(!empty($unidades)){
                                                        foreach($unidades as $unidad){
                                                        ?>
                                                    <tr>

                                                        <td> <?php echo $unidad->Ue_identificador_unico_logistico?></td>
                                                        <td> <?php echo $unidad->Soc_nombre?></td>
                                                        <td> <?php echo date("d/m/Y g:i A",strtotime($unidad->Ue_fecha_hora_despacho))?></td>
                                                        
                                                    
                                                        <td align="center" >
                                                            <?php if($unidad->Ue_estado_logico==2){?>
                                                            <div class="btn-group" >
                                                                <a data-toggle="tooltip" data-placement="top" title="Ver " type="button" class="btn btn-outline-secondary"  href="<?php echo base_url()?>Vvunle/<?php echo $unidad->Id_unidad_enviada?>">
                                                                <span class="fa fa-eye" ></span></a>
                                                                
                                                                <a  data-toggle="tooltip" data-placement="top" title="Editar " type="button" class="btn btn-outline-secondary  ml-3" href="<?php echo base_url()?>Veunle/<?php echo $unidad->Id_unidad_enviada?>">
                                                                <span class="fas fa-pencil-alt" ></span></a>                                             
                                                                
                                                                <a data-toggle="tooltip" data-placement="top" title="Archivar " type="button" class="btn btn-outline-secondary ml-3" href="<?php echo base_url()?>Aule/<?php echo $unidad->Id_unidad_enviada?>">
                                                                <span class="fas fa-cloud-upload-alt" ></span>  <span class="fas fa-archive"></span></a>
                                                                
                                                            
                                                            </div>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>

                                                    <?php  
                                                    }
                                                    } 
                                                    ?>
                                                </tbody>
                                                    
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            
        </div>
    </section>
</div>                