<div class="content-wrapper" id="contenido" >
    <section class="content">
        <div class="container-fluid">
            <div class="mt-2 ml-1 mr-1">
                <div class="box-body" >
                    <div class="container-fluid Vuarc-1">
                        <div class="row mt-3 Vuarc-1 text-white justify-content-between ">
                           
                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Hormonado <i> |</i> </li>                        
                                <li class="text-info mr-1">Unidades Producidas <i> |</i> </li>                        
                                <li class="text-secondary"> Histórico </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="card text-center border-info">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item" >
                                    <a class="nav-link " href="<?php echo base_url()?>Uc" type="button" id="reproduccion">                               
                                    <span class="Vuarc-2 fas fa-venus-mars" ></span> </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link active " href="<?php echo base_url()?>Uccr" type="button" id="crianza">
                                        <span class="fas fa-baby-carriage" ></span> </a>
                                </li>
                                
                                <li class="nav-item ">
                                    <a class="nav-link " href="<?php echo base_url()?>Uen" type="button">
                                        <span class="Vuarc-2 fas fa-user-graduate" ></span> </a>
                                </li>
                                                    
                            </ul>
                        </div>
                        
                        <div class="card-body">
                            <div class="row justify-content-first">
                                
                                <div class="p-2" >
                                <a class="btn btn-outline-secondary" href="<?php echo base_url()?>Uccr" type="button">
                                    <span class="fas fa-arrow-alt-circle-left" ></span> <span class="fas fa-baby-carriage" ></span> </a>
                                </div> 

                            </div>
                            <div  class="row justify-content">
                                <div class="col-md-12 mt-2">                                
                                    <table id="table" class="table table-bordered btn-hover">
                                        <thead>
                                            <tr> 
                                                <th class="Vuarc-1 text-white">Identificador Unico</th>                                           
                                                <th class="Vuarc-1 text-white">Fecha Eclosión</th>
                                                <th class="Vuarc-1 text-white">Fecha Ingreso Tanque</th>
                                                <th class="Vuarc-1 text-white">Fecha Egreso Tanque</th>
                                                <th class="Vuarc-1 text-white">Densidad Ingreso Tanque</th>
                                                <th class="Vuarc-1 text-white">Tanque</th>
                                                <th class="Vuarc-1 text-white">Opciones</th>
                                                
                                            </tr>
                                            <tbody id="cuerpotabla">
                                                <?php if(!empty($unidades)){
                                                    foreach($unidades as $unidad){
                                                    ?>
                                                <tr>

                                                    <td> Cr-<?php echo $unidad->Cri_identificador_unico?></td>
                                                    <td> <?php echo date("d/m/Y g:i A",strtotime($unidad->Cri_fecha_eclosion))  ?></td>
                                                    <td> <?php echo date("d/m/Y g:i A",strtotime($unidad->Cri_fecha_ingreso_tanque))  ?></td>
                                                    <td> <?php echo date("d/m/Y g:i A",strtotime($unidad->Cri_fecha_egreso_tanque)) ?></td>
                                                    <td> <?php echo $unidad->Cri_densidad_ingreso_tanque?></td>
                                                    <td> <?php echo $unidad->Tnq_nombre?></td>
                                                    
                                                    <td>
                                                        <div class="btn-group" >

                                                            <a type="button" class="btn btn-outline-secondary"  
                                                            href="<?php echo base_url()?>Vpac/<?php echo $unidad->Id_unidad_creada_crianza ?>">                                                
                                                            <span class="fas fa-temperature-high" ></span></a>
                                                            
                                                            <a type="button" class="btn btn-outline-secondary ml-3" 
                                                            href="<?php echo base_url()?>Vlimpc/<?php echo $unidad->Id_unidad_creada_crianza ?>">
                                                            <span class="fas fa-broom" ></span></a>

                                                            <a type="button" class="btn  btn-outline-secondary ml-3" 
                                                            href="<?php echo base_url()?>Vac/<?php echo $unidad->Id_unidad_creada_crianza ?>">
                                                            <span class="fas fa-utensils" ></span></a>

                                                            <a type="button" class="btn  btn-outline-secondary ml-3" 
                                                            href="<?php echo base_url()?>Venc/<?php echo $unidad->Id_unidad_creada_crianza ?>">
                                                            <span class="fas fa-stethoscope" ></span></a>                                                                                               

                                                                
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