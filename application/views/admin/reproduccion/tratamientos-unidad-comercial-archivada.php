<div class="content-wrapper" id="contenido" >
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body" >
                <div class="container-fluid Vtratarc-1">
                    <div class="row mt-3 Vtratarc-1 text-white justify-content-first ">
                        
                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                
                            <li class="text-info active mr-1">Reproductores <i>|</i></li>
                            <li class="text-info active mr-1">Unidades Enviadas <i> |</i></li>
                            <li class="text-info mr-1">Histórico <i>|</i></li>
                            <li class="text-info mr-1"><?php echo $id_ul[0]->Ue_identificador_unico_logistico ?> <i>|</i></li>
                            <li class="text-info mr-1"><?php echo $uc->Rep_identificador_unico ?> <i>|</i></li>                          
                            <li class="text-info mr-1"> Enfermedades <i>|</i></li>                          
                           
                            <li class="text-info mr-1">  <?php echo strtolower($enf->Enf_nombre )?> <i>|</i> </li>
                            <li class="text-secondary">Tratamientos </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card text-center border-info">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item" >
                                <a data-toggle="tooltip" data-placement="top" title="Reproductores" class="nav-link active " href="<?php echo base_url()?>Uc" type="button" id="reproduccion">                               
                                <span class="fas fa-venus-mars" ></span> </a>
                            </li>
                            <li class="nav-item ">
                                <a data-toggle="tooltip" data-placement="top" title="Hormonado" class="nav-link  " href="<?php echo base_url()?>Uccr" type="button" id="crianza">
                                    <span class="Vtratarc-2 fas fa-baby-carriage" ></span> </a>
                            </li>
                            
                            <li class="nav-item ">
                                <a data-toggle="tooltip" data-placement="top" title="Engorda" class="nav-link " href="<?php echo base_url()?>Uen" type="button">
                                    <span class="Vtratarc-2 fas fa-user-graduate" ></span> </a>
                            </li>
                                                
                        </ul>
                    </div>                        
                    <div class="card-body">
                        <div class="row justify-content-first">
                            
                            <div class="p-2" >
                                <a data-toggle="tooltip" data-placement="top" title="Regresar" class="btn btn-outline-secondary" href="<?php echo base_url()?>Venarc/<?php echo base64_encode($id_uar)?>/<?php echo base64_encode($id_ul[0]->Id_unidad_enviada)?>" type="button">
                                    <span class="fas fa-arrow-alt-circle-left" >
                                    </span> <span class="fas fa-archive">  <span class="fas fa-stethoscope" > </a>
                            </div> 
                        
                                        
                        </div>
                        
                        <div  class="row">
                            <div class="col-md-12 mt-4">
                                
                                <table id="table" class="table table-bordered btn-hover">
                                    <thead>
                                        <tr> 
                                            <th class="Vtratarc-1 text-white">Nombre insumo</th>
                                            <th class="Vtratarc-1 text-white">Cantidad Utilizada</th>                               
                                            <th class="Vtratarc-1 text-white">Fecha y Hora </th>                               
                                                                      
                                                                            
                                        </tr>
                                        <tbody id="cuerpotabla">
                                            <?php if(!empty($tanques)){
                                                foreach($tanques as $tanque){
                                                ?>
                                            <tr>

                                                <td align="center"> <?php echo strtoupper($tanque->Inm_nombre_comercial)?></td>
                                                <td align="center"> <?php echo $tanque->Det_trat_insu_cantidad_utilizada?></td>                                       
                                                <td align="center"> <?php echo date("d/m/Y g:i A",strtotime($tanque->Det_trat_insu_fecha_tratamiento)) ?></td>   

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
    </section>
</div>