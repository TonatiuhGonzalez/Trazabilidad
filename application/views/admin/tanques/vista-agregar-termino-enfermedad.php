<div class="content-wrapper" >
    <section class="content" >
        <div class="mt-2 ml-1 mr-1">
        <?php
                switch ($tipo) {
                        case 1:
                ?>
                                <div class="container-fluid h-1">
                                        <div class="row mt-3 h-1 text-white justify-content-first ">
                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1">Reproductores <i> |</i> </li>
                                                                <li class="text-info mr-1">Unidades Producidas <i> |</i> </li>
                                                                <li class="text-info mr-1"><?php echo  $uc->Rep_identificador_unico ?><i> |</i> </li>
                                                                <li class="text-info mr-1"> Enfermedades<i> |</i> </li>
                                                                <li class="text-info mr-1"> <?php echo $enf->Enf_nombre ?> <i> |</i> </li>
                                                                <li class="text-secondary"> Término  </li>
                                                        </ol>
                                                </div>
                                        </div>
                                </div>
                        <?php
                                break;
                        case 2:
                        ?>
                                <div class="container-fluid Uccr-1">
                                        <div class="row mt-3 Uccr-1 text-white justify-content-first ">
                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1">Hormonado <i> |</i> </li>
                                                                <li class="text-info mr-1">Unidades Producidas <i> |</i> </li>
                                                                <li class="text-info mr-1"><?php echo  $uc->Cri_identificador_unico ?><i> |</i> </li>
                                                                <li class="text-info mr-1"> Enfermedades<i> |</i> </li>
                                                                <li class="text-info mr-1"> <?php echo $enf->Enf_nombre ?><i> |</i> </li>
                                                                <li class="text-secondary"> Término  </li>
                                                        </ol>
                                                </div>
                                        </div>
                                </div>
                        <?php
                                break;
                        case 3:
                        ?>
                                <div class="container-fluid Uen-1">
                                        <div class="row mt-3 Uen-1 text-white justify-content-first ">
                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1">Engorda <i> |</i> </li>
                                                                <li class="text-info mr-1">Unidades Producidas <i> |</i> </li>
                                                                <li class="text-info mr-1"><?php echo  $uc->En_identificador_unico ?><i> |</i> </li>
                                                                <li class="text-info mr-1">Enfermedades<i> |</i> </li>
                                                                <li class="text-info mr-1"><?php echo $enf->Enf_nombre ?><i> |</i> </li>
                                                                <li class="text-secondary"> Término  </li>
                                                        </ol>
                                                </div>
                                        </div>
                                </div>
                <?php
                                break;
                }
                ?>
            
            <div class="card text-center border-info">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item" >
                        <a data-toggle="tooltip" data-placement="top" title="Reproductores" class="nav-link <?php if($tipo==1) echo "active"?>" href="<?php echo base_url()?>Uc" type="button" id="reproduccion">
                        <span class="Vafte-2 fas fa-venus-mars" ></span> </a>
                        </a>
                        </li>
                        <li class="nav-item ">
                        <a data-toggle="tooltip" data-placement="top" title="Hormonado" class="nav-link  <?php if($tipo==2) echo "active"?>" href="<?php echo base_url()?>Uccr" type="button" id="crianza">
                            <span class="Vafte-2 fas fa-baby-carriage" ></span> </a>
                        </li>
                        
                        <li class="nav-item ">
                        <a data-toggle="tooltip" data-placement="top" title="Engorda" class="nav-link <?php if($tipo==3) echo "active"?> " href="<?php echo base_url()?>Uen" type="button">
                            <span class="Vafte-2 fas fa-user-graduate" ></span> </a>
                        </li>
                                            
                    </ul>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url()?>Afte/<?php echo $id_tanque ?>/<?php echo $id_uc ?>/<?php echo $tipo ?>/<?php echo $id_enf ?>" method="POST" onsubmit="$('#submitBtn').prop('disabled', true);">

                        
                        

                        <div class="form-group">
                                <label  class="col-form-label">Fecha y Hora :</label>
                                <input type="datetime-local" name="fecha" class="form-control" 
                                min="<?php
                                    $parte1= substr($fechai->Enf_fecha_inicio,-19,10);            
                                    $parte2= substr($fechai->Enf_fecha_inicio,11,strlen($fechai->Enf_fecha_inicio));            
                                    echo $parte1.'T'.$parte2;                                
                                                ?>" 
                                required="true">                                
                        </div>
                        <div class="row justify-content-end">
                            <div class="p-2 ml-5">
                                <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url()?>Venf/<?php echo $id_tanque ?>/<?php echo $id_uc ?>/<?php echo $tipo ?>" 
                                class="btn btn-outline-secondary ml-5">
                                <span class="fas fa-arrow-alt-circle-left"></span>
                                </a>
                            </div>
                            <div class="p-2 ml-5">
                                <button data-toggle="tooltip" data-placement="top" title="Registrar" id="submitBtn" type="submit" class="btn btn-outline-secondary  ml-5">
                                <span class="fas fa-check"></span>
                                </button>
                            </div>
                        </div>
                    
                    </form>            

                </div>                    
            </div>                    
        </div>                    
    </section>
</div>                    