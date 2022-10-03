<div class="content-wrapper" id="contenido" >
    <section class="content">
        <div class="container-fluid">
            <div class="mt-2 ml-1 mr-1">
                <div class="box-body" >
                    <div class="container-fluid Uen-1">
                        <div class="row mt-3 Uen-1 text-white justify-content-between ">
                            
                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Engorda <i> |</i> </li>                        
                                <li class="text-secondary"> Unidades Producidas </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card text-center border-info">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item" >
                                    <a data-toggle="tooltip" data-placement="top" title="Reproductores" class="nav-link " href="<?php echo base_url()?>Uc" type="button" id="reproduccion">                               
                                    <span class="Uen-2 fas fa-venus-mars" ></span> </a>
                                </li>
                                <li class="nav-item ">
                                    <a data-toggle="tooltip" data-placement="top" title="Hormonado" class="nav-link  " href="<?php echo base_url()?>Uccr" type="button" id="engorda">
                                        <span class="Uen-2 fas fa-baby-carriage" ></span> </a>
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
                                <a data-toggle="tooltip" data-placement="top" title="Nueva Unidad" class="btn btn-outline-secondary" href="<?php echo base_url()?>Vauce" type="button">
                                    <span class="fa fa-plus" ></span> <span class="fas fa-user-graduate" ></span> </a>
                                </div>
                                <!-- <div class="p-2" >
                                <a data-toggle="tooltip" data-placement="top" title="Unidades Recibidas" class="btn btn-outline-secondary" href="<?php echo base_url()?>Vure" type="button">
                                    <span class="fas fa-cart-arrow-down"> </a>
                                </div> -->
                                <div class="p-2" >
                                <a data-toggle="tooltip" data-placement="top" title="Unidades Enviadas" class="btn btn-outline-secondary" href="<?php echo base_url()?>Vunle" type="button">
                                    <span class="fas fa-shipping-fast"> </a>
                                </div>
                                <!-- <div class="p-2" >
                                <a class="btn btn-outline-secondary" href="<?php echo base_url()?>Vucearc" type="button">
                                    <span class="fas fa-archive"> </a>
                                </div> -->
                                                
                            </div>
                            <div  class="row justify-content">
                                <div class="col-md-12 mt-4">                                
                                    <table id="table" class="table table-bordered btn-hover">
                                        <thead>
                                            <tr> 
                                                <th class="Uen-1 text-white">Tanque</th>
                                                <th class="Uen-1 text-white">Identificador único comercial</th>                                          
                                                <th class="Uen-1 text-white">Fecha Ingreso Tanque</th>
                                                <th class="Uen-1 text-white">Número de Alevines</th>
                                                <th class="Uen-1 text-white">Especie</th>
                                                <th class="Uen-1 text-white">Porcentaje</th>
                                                <th class="Uen-1 text-white">Opciones</th>
                                                
                                            </tr>
                                            <tbody id="cuerpotabla">
                                                <?php if(!empty($unidades)){
                                                    foreach($unidades as $unidad){
                                                    ?>
                                                <tr>

                                                    <td> <?php echo $unidad->Tnq_nombre?></td>
                                                    <td> <?php echo $unidad->En_identificador_unico?></td>
                                                   
                                                    <td> <?php echo date("d/m/Y g:i A",strtotime($unidad->En_fecha_ingreso_tanque)) ?></td>
                                                    <td> <?php echo $unidad->En_densidad_ingreso?></td>
                                                    <td> <?php echo $unidad->Sci_nombre_cientifico?></td>
                                                    <td> <?php echo $unidad->En_porcentaje?></td>
                                                    
                                                    <td>
                                                        <div class="btn-group" >

                                                            <a data-toggle="tooltip" data-placement="top" title="Parámetros Agua" type="button" class="btn  btn-outline-secondary"  
                                                            href="<?php echo base_url()?>Tpfqg/<?php echo base64_encode($unidad->Id_tanque)?>/<?php echo base64_encode($unidad->Id_unidad_creada_engorda)?>/<?php echo base64_encode(3)?>">                                                
                                                            <span class="fas fa-temperature-high" ></span></a>
                                                            
                                                            <a data-toggle="tooltip" data-placement="top" title="Limpieza" type="button" class="btn  btn-outline-secondary ml-3" 
                                                            href="<?php echo base_url()?>Tlg/<?php echo $unidad->Id_tanque?>/<?php echo $unidad->Id_unidad_creada_engorda?>/3">
                                                            <span class="fas fa-broom" ></span></a>

                                                            <a data-toggle="tooltip" data-placement="top" title="Alimentación" type="button" class="btn  btn-outline-secondary ml-3" 
                                                            href="<?php echo base_url()?>Taalm/<?php echo $unidad->Id_tanque?>/<?php echo $unidad->Id_unidad_creada_engorda?>/3">
                                                            <span class="fas fa-utensils" ></span></a>

                                                            <a data-toggle="tooltip" data-placement="top" title="Enfermedades" type="button" class="btn  btn-outline-secondary ml-3" 
                                                            href="<?php echo base_url()?>Venf/<?php echo $unidad->Id_tanque?>/<?php echo $unidad->Id_unidad_creada_engorda?>/3">
                                                            <span class="fas fa-stethoscope" ></span></a>

                                                            <?php if($unidad->En_estado_logico==1){?>
                                                            <a data-toggle="tooltip" data-placement="top" title="Cargar Unidad
                                                            " type="button" class="btn btn-outline-secondary  ml-3" href="<?php echo base_url()?>Vaucle/<?php echo $unidad->Id_unidad_creada_engorda?>">
                                                            <span class="fas fa-dolly" ></span></a>                  
                                                            <?php  } ?> 

                                                               

                                                        </div>
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