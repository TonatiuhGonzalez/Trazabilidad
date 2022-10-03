<div class="content-wrapper">
        <section class="content">
                <div class="container-fluid">
                        <div class="mt-2 ml-1 mr-1">
                                <div class="container-fluid Vvs-1">
                                        <div class="row mt-3 Vvs-1 text-white justify-content-between ">
                                               
                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1"> Clientes -Proveedores <i> |</i> </li>
                                                                <li class="text-info mr-1">Activos <i> |</i> </li>
                                                                <li class="text-secondary"> <?php echo $socio->Soc_nombre ?> </li>
                                                        </ol>
                                                </div>
                                                
                                        </div>
                                </div>
                                <div class="row justify-content-first">
                                        <div class="p-2 ">
                                                <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Sr" class="btn btn-outline-secondary ">
                                                        <span class="fas fa-arrow-alt-circle-left"></span>
                                                </a>
                                        </div>


                                </div>
                                <div class="form-row">
                                        <div class="col">
                                                <label for="exampleFormControlSelect1">País</label>
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
                                        <div class="col">
                                                <label for="exampleFormControlSelect1">Tipo</label>
                                                <select disabled class="form-control" id="exampleFormControlSelect1">

                                                        <?php switch ($socio->Soc_tipo) {
                                                                case 1:
                                                                        echo "<option >Cliente </option>";
                                                                        break;
                                                                case 2:
                                                                        echo "<option >Proveedor de alimento </option>";
                                                                        break;
                                                                case 3:
                                                                        echo "<option >Proveedor de medicamento </option>";
                                                                        break;
                                                        } ?>



                                                </select>
                                        </div>
                                </div>

                                <div class="form-row">
                                        <!-- <div class="col">
                                                <label class="col-form-label">Numero de Identificación Único:</label>
                                                <input type="text" class="form-control" disabled value="<?php echo $socio->Soc_numero_de_identificacion_unico ?>">
                                        </div> -->
                                        <div class="col">
                                                <label class="col-form-label">RFC:</label>
                                                <input type="text" class="form-control" disabled value="<?php echo $socio->Soc_rfc ?>">
                                        </div>
                                </div>

                                <div class="form-row">
                                        <div class="col">
                                                <label class="col-form-label">Calle:</label>
                                                <input type="text" class="form-control" disabled value="<?php echo $socio->Soc_calle ?>">
                                        </div>
                                        <div class="col">
                                                <label class="col-form-label"> Número Exterior:</label>
                                                <input type="text" class="form-control" disabled value="<?php echo $socio->Soc_numero_exterior ?>">
                                        </div>
                                </div>

                                <div class="form-row">
                                        <div class="col">
                                                <label class="col-form-label">Colonia:</label>
                                                <input type="text" class="form-control" disabled value="<?php echo $socio->Soc_colonia ?>">
                                        </div>
                                        <div class="col">
                                                <label class="col-form-label">Municipio:</label>
                                                <input type="text" class="form-control" disabled value="<?php echo $socio->Soc_municipio ?>">
                                        </div>
                                        <div class="col">
                                                        <label class="col-form-label">Estado:</label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $socio->Soc_estado_republica ?>" required="true">
                                                </div>
                                </div>

                                <div class="form-row">
                                        <div class="col">
                                                <label class="col-form-label">Número Telefónico: </label>
                                                <input class="form-control" disabled value="<?php echo $socio->Soc_numero_telefono ?>">
                                        </div>
                                        <div class="col">
                                                <label class="col-form-label">Correo Electrónico:</label>
                                                <input class="form-control" disabled value="<?php echo $socio->Soc_correo_electronico ?>">
                                        </div>
                                </div>
                                





                                <?php if ($this->session->flashdata("errordb")) { ?>
                                        <div class="alert alert-warning alert-dismissible fade show">
                                                <strong class="text-center"><?php echo $this->session->flashdata("errorbd") ?></strong>

                                        </div>
                                <?php } ?>
                        </div>
                </div>
        </section>
</div>