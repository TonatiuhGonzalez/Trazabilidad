<div class="content-wrapper" id="contenido" >
    <section class="content">
        <div class="container-fluid">
            <div class="mt-2 ml-1 mr-1">
                <div class="box-body" >
                    <div class="container-fluid Vuard-1">
                        <div class="row mt-3 Vuard-1 text-white justify-content-first ">
                            
                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info active mr-1">Reproductores <i>|</i></li>
                                <li class="text-info active mr-1">Unidades Producidas <i> |</i></li>
                                <li class="text-secondary active">Histórico </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="card text-center border-info">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item" >
                                <a class="nav-link active " href="<?php echo base_url()?>Uc" type="button" id="reproduccion">                               
                                <span class="fas fa-venus-mars" ></span> </a>
                                </a>
                                </li>
                                <li class="nav-item ">
                                <a class="nav-link " href="<?php echo base_url()?>Uccr" type="button">
                                    <span class="Vuard-2 fas fa-baby-carriage" ></span> </a>
                                </li>
                                <li class="nav-item ">
                                <a class="nav-link " href="<?php echo base_url()?>Uen" type="button">
                                    <span class="Vuard-2 fas fa-user-graduate" ></span> </a>
                                </li>
                                                    
                            </ul>
                        </div>    
                    
                        <div class="card-body">
                            <div class="row justify-content-first">
                                
                                <div class="p-2" >
                                <a class="btn btn-outline-secondary" href="<?php echo base_url()?>Uc" type="button">
                                    <span class="fas fa-arrow-alt-circle-left" ></span> <span class="fas fa-venus-mars" ></span> </a>
                                </div> 

                            </div>
                            <div  class="row justify-content">
                                <div class="col-md-12 mt-2">                                
                                    <table id="table" class="table table-bordered btn-hover">
                                        <thead>
                                            <tr> 
                                                <th class="Vuard-1 text-white">Identificador Unico</th>                                           
                                                <th class="Vuard-1 text-white">Fecha Desove</th>
                                                <th class="Vuard-1 text-white">Fecha Ingreso Tanque</th>
                                                <th class="Vuard-1 text-white">Fecha Egreso Tanque</th>
                                                <th class="Vuard-1 text-white">Densidad Ingreso Tanque</th>
                                                <th class="Vuard-1 text-white">Tanque</th>
                                                <th class="Vuard-1 text-white">Opciones</th>
                                                
                                            </tr>
                                            <tbody id="cuerpotabla">
                                                <?php if(!empty($unidades)){
                                                    foreach($unidades as $unidad){
                                                    ?>
                                                <tr>

                                                    <td align="center"> Rep-<?php echo $unidad->Rep_identificador_unico?></td>
                                                    <td align="center"> <?php 
                                                        if($unidad->Rep_fecha_desove=="0000-00-00 00:00:00"){
                                                            echo '0000-00-00 00:00:00';
                                                        }else{
                                                        echo date("d/m/Y g:i A",strtotime($unidad->Rep_fecha_desove));
                                                        }
                                                        ?></td>
                                                    <td align="center"> <?php echo date("d/m/Y g:i A",strtotime($unidad->Rep_fecha_ingreso_tanque))?></td>
                                                    <td align="center"> <?php echo date("d/m/Y g:i A",strtotime($unidad->Rep_fecha_egreso_tanque))?></td>                        
                                                    <td align="center"> <?php echo $unidad->Rep_densidad_ingreso_tanque?></td>
                                                    <td align="center"> <?php echo $unidad->Tnq_nombre?></td>
                                                    
                                                    <td>
                                                        <div class="btn-group" >

                                                            <a type="button" class="btn  btn-outline-secondary"  
                                                            href="<?php echo base_url()?>Vparc/<?php echo $unidad->Id_unidad_creada_reproduccion ?>">                                                
                                                            <span class="fas fa-temperature-high" ></span></a>
                                                            
                                                            <a type="button" class="btn  btn-outline-secondary ml-3" 
                                                            href="<?php echo base_url()?>Vlimarc/<?php echo $unidad->Id_unidad_creada_reproduccion ?>">
                                                            <span class="fas fa-broom" ></span></a>

                                                            <a type="button" class="btn  btn-outline-secondary ml-3" 
                                                            href="<?php echo base_url()?>Vaarc/<?php echo $unidad->Id_unidad_creada_reproduccion ?>">
                                                            <span class="fas fa-utensils" ></span></a>

                                                            <a type="button" class="btn  btn-outline-secondary ml-3" 
                                                            href="<?php echo base_url()?>Venarc/<?php echo $unidad->Id_unidad_creada_reproduccion ?>">
                                                            <span class="fas fa-stethoscope" ></span></a>   

                                                            <a type="button" class="btn  btn-outline-secondary ml-3" 
                                                            href="<?php echo base_url()?>Vtrs/<?php echo base64_encode($unidad->Id_unidad_creada_reproduccion) ?>">
                                                            <span class="fas fa-barcode" ></span></a>                                                                                               

                                                                  
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