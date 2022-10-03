<div class="content-wrapper" id="contenido" >
    <section class="content">
        <div class="container-fluid">
            <div class="mt-2 ml-1 mr-1">
                <div class="box-body" >
                    <div class="container-fluid Vafd-1">
                        <div class="row mt-3 Vafd-1 text-white justify-content-first ">
                            
                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Reproductores <i> |</i> </li>                        
                                <li class="text-info mr-1"> Unidades Producidas <i> |</i> </li>                        
                                <li class="text-info mr-1"> <?php echo $uc->Rep_identificador_unico ?> <i> |</i> </li>                        
                                <li class="text-secondary">  Desove  </li>
                                </ol>
                            </div>
                        </div>
                    </div>                    
                    <div class="card text-center border-info">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item" >
                                <a class="nav-link active" href="<?php echo base_url()?>Uc" type="button" id="reproduccion">                           
                                <span class="fas fa-venus-mars" ></span> </a>
                                </a>
                                </li>
                                <li class="nav-item ">
                                <a class="nav-link " href="<?php echo base_url()?>Uccr" type="button">
                                    <span class="Vafd-2 fas fa-baby-carriage" ></span> </a>
                                </li>
                                <li class="nav-item ">
                                <a class="nav-link " href="<?php echo base_url()?>Uen" type="button">
                                    <span class="Vafd-2 fas fa-user-graduate" ></span> </a>
                                </li>
                                                    
                            </ul>
                        </div>
                        <div class="card-body">
                           
                            <div  class="row justify-content">
                                <div class="col-md-12 mt-4">                                
                                <form action="<?php echo base_url()?>Afd" method="POST">
                                    
                                    
                                    <div class="form-group">
                                            <label  class="col-form-label">Fecha :</label>
                                            <input type="datetime-local" class="form-control ml-auto mr-auto mb-auto mt-auto" 
                                             min="<?php 
                                                $parte1= substr($fecha->Rep_fecha_ingreso_tanque,-19,10);            
                                                $parte2= substr($fecha->Rep_fecha_ingreso_tanque,11,strlen($fecha->Rep_fecha_ingreso_tanque));            
                                                echo $parte1.'T'.$parte2?>" 
                                            name="fd" placeholder="Fecha de Caducidad" required="true" >
                                    </div>
                                    <div class="form-group">                                            
                                        <input type="hidden" class="form-control "  name="id_uc" value="<?php echo $id_uc?>" required="true" >
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="p-2 ml-5">
                                            <a href="<?php echo base_url()?>Uc" class="btn btn-outline-secondary ml-5">
                                            <span class="fas fa-arrow-alt-circle-left" ></span>  <span class="fas fa-venus-mars" ></span>
                                            </a>
                                        </div>
                                        <div class="p-2 ml-5">
                                            <button type="submit" class="btn btn-outline-secondary  ml-5">
                                            <span class="fas fa-check"></span>
                                            </button>
                                        </div>
                                    
                                    </div>          
                                </form>                         
                        
                                </div>          
                            </div>          
                        </div>                
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>