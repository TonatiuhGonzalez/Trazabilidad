<div class="content-wrapper">
        <section class="content">
                <div class="container-fluid">
                        <div class="mt-2 ml-1 mr-1">
                                <div class="container-fluid Vas-1">
                                        <div class="row mt-3 Vas-1 text-white justify-content-between ">
                                               
                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1">Clientes -Proveedores <i> |</i> </li>
                                                                <li class="text-info mr-1">Activos <i> |</i> </li>
                                                                <li class="text-secondary"> Editar </li>
                                                        </ol>
                                                </div>
                                                
                                        </div>
                                </div>
                                <form action="<?php echo base_url() ?>Eds" method="POST">
                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Nombre  :</label>
                                                        <input type="text" class="form-control" id="nombre" name="nombresocio" placeholder="Nombre" required="true" value="<?php echo $socio->Soc_nombre ?>">
                                                </div>
                                                <div class="col">
                                                        <label for="exampleFormControlSelect1" class="col-form-label">País</label>
                                                        <select disabled name='Pais' class="form-control" id="exampleFormControlSelect1">
                                                                <?php if (!empty($paises)) {
                                                                        foreach ($paises as $Pais) {
                                                                ?>
                
                                                                                <option><?php echo strtoupper($Pais->Nombre_pais) ?></option>
                
                                                                <?php
                                                                        }
                                                                }
                                                                ?>
                                                        </select>
                                                </div>
                                        </div>
                                       
                                        <div class="form-row">
                                                <div class="col">
                                                        <label for="exampleFormControlSelect1" class="col-form-label">Tipo </label>
                                                        <select name='tipo' class="form-control" id="exampleFormControlSelect1">
                                                                <?php switch ($socio->Soc_tipo) {
                                                                        case 1:
                                                                                print "<option value=\"1\">Cliente </option>
                                                                        <option value=\"2\"> Proveedor de Alimentos </option>
                                                                        <option value=\"3\"> Proveedor de Medicamentos </option>
                                                                        ";
                                                                                break;
                                                                        case 2:
                                                                                print "<option value=\"2\" >Proveedor de alimento </option>
                                                                        <option value=\"1\"> Cliente  </option>
                                                                        <option value=\"3\"> Proveedor de Medicamentos </option>
                                                                        ";
                                                                                break;
                                                                        case 3:
                                                                                print "<option value=\"3\">Proveedor de medicamento </option>
                                                                        <option value=\"1\"> Cliente </option>
                                                                        <option value=\"2\"> Proveedor de Alimentos </option>
                                                                        ";
                                                                                break;
                                                                } ?>
        
        
        
                                                        </select>
                                                </div>
                                                <!-- <div class="col">
                                                        <label class="col-form-label">Numero de Identificación Único:</label>
                                                        <input type="text" class="form-control" id="idunico" name="idunico" placeholder="Número de Identificación Único" required="true" value="<?php echo $socio->Soc_numero_de_identificacion_unico ?>">
                                                </div> -->
                                                <div class="col">
                                                        <label class="col-form-label">RFC:</label>
                                                        <input type="text" class="form-control" id="rfc" name="rfc" placeholder="rfc" required="true" value="<?php echo $socio->Soc_rfc ?>">
                                                </div>
                                        </div>
                                  
                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Calle:</label>
                                                        <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" required="true" value="<?php echo $socio->Soc_calle ?>">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label"> Número Exterior:</label>
                                                        <input type="text" class="form-control" id="numero" name="numero" placeholder="Número Exterior" required="true" value="<?php echo $socio->Soc_numero_exterior ?>">
                                                </div>
                                        </div>
                                        
                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Colonia:</label>
                                                        <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia" required="true" value="<?php echo $socio->Soc_colonia ?>">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Municipio:</label>
                                                        <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Municipio" required="true" value="<?php echo $socio->Soc_municipio ?>">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Estado:</label>
                                                        <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="<?php echo $socio->Soc_estado_republica ?>" required="true">
                                                </div>
                                        </div>
                                       
                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Número Telefónico: (formato xxx-xxx-xxxx)</label>
                                                        <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control" id="numerot" name="numerot" placeholder="xxx-xxx-xxxx" required="true" value="<?php echo $socio->Soc_numero_telefono ?>">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Correo Electrónico:</label>
                                                        <input type="email" class="form-control" id="correo" name="email" placeholder="Correo Electrónico" required="true" value="<?php echo $socio->Soc_correo_electronico ?>">
                                                </div>
                                        </div>
                                   
                                      

                                        <div class="form-group">
                                                <input type="hidden" value="<?php echo $socio->Id_socio; ?>" name="id">
                                        </div>
                                        
                                        <div class="row justify-content-end">
                                                <div class="p-2 ml-5">
                                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Sr" class="btn btn-outline-secondary  ml-5">
                                                                <span class="fas fa-arrow-alt-circle-left"></span> 
                                                        </a>
                                                </div>
                                                <div class="p-2 ml-5">
                                                        <button data-toggle="tooltip" data-placement="top" title="Guardar Cambios" type="submit" class="btn btn-outline-secondary mr-5 ml-5">
                                                                <span class="fas fa-check"></span>
                                                        </button>
                                                </div>

                                        </div>


                                </form>
                                <?php if ($this->session->flashdata("errordb")) { ?>
                                        <div class="alert alert-warning alert-dismissible fade show">
                                                <strong class="text-center"><?php echo $this->session->flashdata("errorbd") ?></strong>

                                        </div>
                                <?php } ?>
                        </div>
                </div>
        </section>
</div>