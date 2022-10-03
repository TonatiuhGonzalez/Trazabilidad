<div class="content-wrapper" id="contenido" >
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body" >
                <div class="container-fluid Venarc-1">
                    <div class="row mt-3 Venarc-1 text-white justify-content-first ">
                    <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                
                            <li class="text-info active mr-1">Reproductores <i>|</i></li>
                            <li class="text-info active mr-1">Unidades Enviadas <i> |</i></li>
                            <li class="text-info mr-1">Histórico <i>|</i></li>
                            <li class="text-info mr-1"><?php echo $id_ul[0]->Ue_identificador_unico_logistico ?> <i>|</i></li>
                            <li class="text-info mr-1"><?php echo $uc->Rep_identificador_unico ?> <i>|</i></li>
                            <li class="text-secondary">Enfermedades </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card text-center border-info">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item" >
                            <a data-toggle="tooltip" data-placement="top" title="Reproductores" class="nav-link active" href="<?php echo base_url()?>Uc" type="button" id="reproduccion">                           
                            <span class="fas fa-venus-mars" ></span> </a>
                            </a>
                            </li>
                            <li class="nav-item ">
                            <a data-toggle="tooltip" data-placement="top" title="Hormonado" class="nav-link " href="<?php echo base_url()?>Uccr" type="button">
                                <span class="Venarc-2 fas fa-baby-carriage" ></span> </a>
                            </li>
                            <li class="nav-item ">
                            <a data-toggle="tooltip" data-placement="top" title="Engorda" class="nav-link " href="<?php echo base_url()?>Uen" type="button">
                                <span class="Venarc-2 fas fa-user-graduate" ></span> </a>
                            </li>
                                                
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-first">
                            
                            <div class="p-2" >
                                <a data-toggle="tooltip" data-placement="top" title="Regresar" class="btn btn-outline-secondary" href="<?php echo base_url()?>Vularch/<?php echo $id_ul[0]->Id_unidad_enviada?>" type="button">
                                    <span class="fas fa-arrow-alt-circle-left" >
                                    </span> <span class="fas fa-archive"> </a>
                            </div> 
                        
                                        
                        </div>
                        <p class="text-center font-weight-bold"><?php echo $uc->Tnq_nombre ?></p>
                        <div  class="row">
                            <div class="col-md-12 mt-4">
                                
                                <table id="table" class="table table-bordered btn-hover">
                                    <thead>
                                        <tr> 
                                            <th class="Venarc-1 text-white">Nombre Enfermedad</th>
                                            <th class="Venarc-1 text-white">Fecha y Hora de Inicio</th>                               
                                            <th class="Venarc-1 text-white">Fecha y Hora de Termino</th>                               
                                            <th class="Venarc-1 text-white">Opciones</th>                               
                                                                            
                                        </tr>
                                        <tbody id="cuerpotabla">
                                            <?php if(!empty($tanques)){
                                                foreach($tanques as $tanque){
                                                ?>
                                            <tr>

                                                <td align="center"> <?php echo strtoupper($tanque->Enf_nombre)?></td>
                                                <td align="center"> <?php echo   date("d/m/Y g:i A",strtotime($tanque->Enf_fecha_inicio))?></td>                                       
                                                <td align="center"> <?php 
                                                                        if($tanque->Enf_fecha_termino=="0000-00-00 00:00:00"){
                                                                        echo'0000-00-00 00:00:00';
                                                                        }else{
                                                                            echo date("d/m/Y g:i A",strtotime($tanque->Enf_fecha_termino));
                                                                        }?></td>                                       
                                                <td align="center">
                                                    <div class="btn-group" >
                                                        <a data-toggle="tooltip" data-placement="top" title="Tratamientos" type="button" class="btn btn-outline-secondary"  
                                                        href="<?php echo base_url()?>Vtratarc/<?php echo base64_encode($tanque->Id_enfermedad_reproduccion)?>/<?php echo base64_encode($id_uar)?>/<?php echo base64_encode($id_ul[0]->Id_unidad_enviada)?>" >                                                
                                                        <span class="fas fa-syringe" ></span></a>                                       
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
    </section>
</div>