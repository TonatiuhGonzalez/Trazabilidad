<div class="content-wrapper" id="contenido" >
    <section class="content">
        <div class="container-fluid">
            <div class="mt-2 ml-1 mr-1">
                <div class="box-body" >
                    <div class="container-fluid Vgurc-1">
                        <div class="row mt-3 Vgurc-1 text-white justify-content-between ">
                            
                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Hormonado <i> |</i> </li>                        
                                <li class="text-secondary"> Unidades Recibidas </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card text-center border-info">
                        <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item" >
                            <a data-toggle="tooltip" data-placement="top" title="Reproductores" class="nav-link " href="<?php echo base_url()?>Uc" type="button" id="reproduccion">                            
                            <span class=" Vgurc-2 fas fa-venus-mars" ></span> </a>
                            </a>
                            </li>
                            <li class="nav-item ">
                            <a data-toggle="tooltip" data-placement="top" title="Hormonado" class="nav-link " href="<?php echo base_url()?>Uccr"  type="button" id="crianza">
                                <span class="fas fa-baby-carriage" ></span> </a>
                            </li>
                            
                            <li class="nav-item ">
                            <a data-toggle="tooltip" data-placement="top" title="Engorda" class="nav-link " href="<?php echo base_url()?>Uen" type="button">
                                <span class="Vgurc-2 fas fa-user-graduate" ></span> </a>
                            </li>
                                                
                        </ul>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-first">

                                <div class="p-2" >
                                    <a data-toggle="tooltip" data-placement="top" title="Regresar" class="btn btn-outline-secondary" href="<?php echo base_url()?>Uccr" type="button">
                                        <span class="fas fa-arrow-alt-circle-left" ></span> <span class="fas fa-baby-carriage" ></span> </a>
                                </div>

                                <div class="p-2" >
                                    <a data-toggle="tooltip" data-placement="top" title="Nueva Unidad" class="btn btn-outline-secondary" href="<?php echo base_url()?>Vaurc" type="button">
                                        <span class="fa fa-plus" ></span> <span class="fas fa-cart-arrow-down"> </a>
                                </div>

                                <div class="p-2" >
                                    <a data-toggle="tooltip" data-placement="top" title="Hist??rico" class="btn btn-outline-secondary" href="<?php echo base_url()?>Vgurcd" type="button">
                                        <span class="fas fa-archive"> </a>
                                </div>
                                                            
                                                
                            </div>
                            <div  class="row justify-content">
                                <div class="col-md-12 mt-4">                                
                                    <table id="table" class="table table-bordered btn-hover">
                                        <thead>
                                            <tr> 
                                                <th class="Vgurc-1 text-white">Identificador ??nico Log??stico</th>                                           
                                                <th class="Vgurc-1 text-white">Fecha Recepci??n</th>
                                                <th class="Vgurc-1 text-white">Temperatura</th>                                             
                                                <th class="Vgurc-1 text-white">Socio</th>                                          
                                                <th class="Vgurc-1 text-white">Kilogramos recibidos</th>                                          
                                                <th class="Vgurc-1 text-white">Opciones</th>                                            
                                                
                                            </tr>
                                            <tbody id="cuerpotabla">
                                                <?php if(!empty($unidades)){
                                                    foreach($unidades as $unidad){
                                                    ?>
                                                <tr>

                                                    <td> <?php echo $unidad->Ur_identificador_unico_logistico?></td>
                                                    <td> <?php echo date("d/m/Y g:i A",strtotime($unidad->Ur_fecha_hora_recepcion))?></td>
                                                    <td> <?php echo $unidad->Ur_registro_temperatura?></td>
                                                    <td> <?php echo $unidad->Soc_nombre?></td>
                                                    <td> <?php echo $unidad->Ur_kilogramos?></td>
                                                    
                                                    
                                                    <td>
                                                        <div class="btn-group" >

                                                        <a data-toggle="tooltip" data-placement="top" title="Ver Unidad" type="button" class="btn btn-outline-secondary"  href="<?php echo base_url()?>Vvurc/<?php echo $unidad->Id_unidad_recibida?>">
                                                        <span class="fa fa-eye" ></span></a>

                                                        <?php if($unidad->Ur_estado_logico==0){ ?>

                                                        <a data-toggle="tooltip" data-placement="top" title="Editar Unidad" type="button" class="btn btn-outline-secondary  ml-3" href="<?php echo base_url()?>Veurc/<?php echo $unidad->Id_unidad_recibida?>">
                                                        <span class="fas fa-pencil-alt" ></span></a>

                                                        <?php } ?>

                                                                                                                    
                                                                  
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