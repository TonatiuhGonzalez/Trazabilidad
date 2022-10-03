<div class="content-wrapper" id="contenido" >
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body" >
                    <div class="container-fluid Vula-1">
                        <div class="row mt-3 Vula-1 text-white justify-content-between ">
                            
                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                    <li class="text-info active mr-1">Reproductores<i>|</i></li>
                                    <li class="text-info active mr-1">Unidades Enviadas <i>|</i></li>
                                    
                                    <li class="text-secondary "> <?php  echo $unidades[0]->{'Ue_identificador_unico_logistico'}?> </li>
                                </ol>
                            </div>

                        </div>
                    </div>  
                    <div class="row justify-content-first">
                        <div class="p-2 ">
                            <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url()?>Venvurg" class="btn btn-outline-secondary ">
                            <span class="fas fa-arrow-alt-circle-left"></span>
                            </a>
                        </div>
                    </div>             
                    
                    
                    <div class="form-row">
                        <div class="col">
                            <label for="exampleFormControlSelect1" class="col-form-label">Enviada a</label>
                            <select disabled class="form-control" id="exampleFormControlSelect1" >
                        
                                <option value="<?php echo $unidades[0]->{'Id_socio'}?>" ><?php echo $unidades[0]->{'Soc_nombre'}?></option>
                             
                                                   
                            </select>
                        </div>
                        <div class="col">
                            <label  class="col-form-label">Fecha de Envío :</label>
                            <input type="datetime-local" class="form-control ml-auto mr-auto mb-auto mt-auto"  disabled   
                            value="<?php 
                             $parte1= substr($unidades[0]->{'Ue_fecha_hora_despacho'},-19,10);            
                             $parte2= substr($unidades[0]->{'Ue_fecha_hora_despacho'},11,strlen($unidades[0]->{'Ue_fecha_hora_despacho'}));            
                             echo $parte1.'T'.$parte2?>"
                            >
                        </div>
                    </div>
                   
                    <div class="form-group">
                            <input type="hidden" class="form-control"  name="nl" value="<?php echo $ul?>"  >
                    </div>
                              
                    
                    <div class="form-group mt-4">                            
                        <table id="table"class="table table-bordered table-responsive-md table-striped text-center ">
                            <thead>
                                <tr>
                                    
                                    <th class="Vula-1 text-center text-white">Tanque</th>
                                    <th class="Vula-1 text-center text-white">Identificador único comercial</th>
                                    <th class="Vula-1 text-center text-white">Número de desove</th>                                    
                                    <th class="Vula-1 text-center text-white">Número de alevines</th>                                    
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($unidades)){
                                                $n2=1;
                                                foreach($unidades as $unidad){
                                                ?>
                                            <tr name='u<?php echo $n2?>'>
                                                
                                                
                                                <td ><?php echo $unidad->Tnq_nombre?></td>
                                                <td ><?php echo $unidad->Rep_identificador_unico?></td>
                                                
                                                <td  > <?php echo $unidad->Det_u_e_c_desove?></td> 
                                                <td  > <?php echo $unidad->Det_u_e_c_alevines?></td> 
                                                
                                                
                                            </tr>


                                            <?php
                                            $n2++;
                                            }
                                            } 
                                            ?>
                            
                            </tbody>
                        </table>
                    </div>            
                              
                    
                    
            
                
            </div>
        </div>
    </section>
</div>   
