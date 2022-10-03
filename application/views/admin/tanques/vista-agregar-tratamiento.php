<div class="content-wrapper" >
    <section class="content ml-2 mt-3" >
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
                                    <li class="text-info mr-1">Enfermedades<i> |</i> </li>
                                    <li class="text-info mr-1">  <?php echo $enf->Enf_nombre ?><i> |</i> </li>
                                    <li class="text-info mr-1"> Tratamientos<i> |</i> </li>
                                    <li class="text-secondary"> Nuevo Tratamiento </li>
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
                                    <li class="text-info mr-1">Enfermedades<i> |</i> </li>
                                    <li class="text-info mr-1"> <?php echo $enf->Enf_nombre ?><i> |</i> </li>
                                    <li class="text-info mr-1"> Tratamientos<i> |</i> </li>
                                    <li class="text-secondary"> Nuevo Tratamiento </li>
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
                                    <li class="text-info mr-1"> <?php echo $enf->Enf_nombre ?><i> |</i> </li>
                                    <li class="text-info mr-1"> Tratamientos<i> |</i> </li>
                                    <li class="text-secondary"> Nuevo Tratamiento </li>
                                </ol>
                            </div>
                        </div>
                    </div>
            <?php
                    break;
            }
            ?>
      
        <form action="<?php echo base_url()?>Atr/<?php echo $id_tanque ?>/<?php echo $id_uc ?>/<?php echo $id_enfermedad ?>/<?php echo $tipo ?>" method="POST" onsubmit="$('#submitBtn').prop('disabled', true);" >

        <div class="form-group mt-2">
                <label for="exampleFormControlSelect1">Insumo Médico</label>
                <select required="true" name="insumo" class="form-control" id="example">
                <?php if(!empty($insumos)){
                                        foreach($insumos as $insumo){
                                                
                                        ?>
                
                <option value="<?php echo $insumo->Id_insumo_medico?>" >
                <?php echo strtoupper($insumo->Inm_nombre_comercial).' --> gramos en Almacen: '.$insumo->Pro_insu_medico_cantidad_total?>
        
                </option>
                
                <?php  
                                                
                                        }
                                    } 
                                    ?>
                </select>
        </div>

        <div class="form-group">
            <label  class="col-form-label">Fecha Tratamiento :</label>
            <input type="datetime-local" name="fecha" class="form-control" 
            min="<?php
                $parte1= substr($fechai->Enf_fecha_inicio,-19,10);            
                $parte2= substr($fechai->Enf_fecha_inicio,11,strlen($fechai->Enf_fecha_inicio));            
                echo $parte1.'T'.$parte2;                                
                ?>" 
                required="true">                                
        </div>
        <div class="form-group"> 
            <label  class="col-form-label">Cantidad Utilizada (gramos):</label>
            <input type="number" min="1" max="" id="ko" class="form-control" name="cu" placeholder="Cantidad Utilizada" required="true" >
        </div>
        
       
    
        
        <div class="row justify-content-end">
            <div class="p-2 ml-5">
                <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url()?>Vgtr/<?php echo $id_tanque ?>/<?php echo $id_uc?>/<?php echo $id_enfermedad ?>/<?php echo $tipo ?>"
                 class="btn btn-outline-secondary ml-5">
                 <span class="fas fa-arrow-alt-circle-left"></span>
                </a>
            </div>
            <div class="p-2 ml-5">
                <button data-toggle="tooltip" data-placement="top" title="Registrar" id="submitBtn" type="submit" class="btn btn-outline-secondary  mr-4 ml-5">
                <span class="fas fa-check"></span>
                </button>
            </div>
        
        </div>

        </form>
        <?php if($this->session->flashdata("errordb")){?>
                <div class="alert alert-warning alert-dismissible fade show" >
                <strong class="text-center" ><?php echo $this->session->flashdata("errorbd")?></strong>
                
                </div>
        <?php }?>       

    </section>
</div>
<script>
    var valor = $("#example")
    
    var v= $("#example option:selected").val();
     
        <?php if(!empty($insumos)){
                                                    foreach($insumos as $insumo){
                                                    ?>
                            if(<?php echo $insumo->Id_insumo_medico?>==v){
                                $("#ko").attr("max",<?php echo $insumo->Pro_insu_medico_cantidad_total?>);
                                // $("#ko").attr("value",<?php echo $insumo->Pro_insu_medico_cantidad_total?>);
                            }
    
                            
                            <?php  
                                                }
                                                } 
                                                ?>
    

    
    valor.change(function(){
        v= $("#example option:selected").val();
        <?php if(!empty($insumos)){
                                                    foreach($insumos as $insumo){
                                                    ?>
                            if(<?php echo $insumo->Id_insumo_medico?>==v){
                                $("#ko").attr("max",<?php echo $insumo->Pro_insu_medico_cantidad_total?>);
                                // $("#ko").attr("value",<?php echo $insumo->Pro_insu_medico_cantidad_total?>);
                            }
    
                            
                            <?php  
                                                }
                                                } 
                                                ?>
        console.log(v)
    })
    


//                             


</script>