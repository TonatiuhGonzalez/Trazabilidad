<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="mt-2 ml-1 mr-1">
                <div class="container-fluid Av-1">
                    <div class="row mt-3 Av-1 text-white justify-content-between ">
                                                
                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Usuarios <i> |</i> </li>
                                <li class="text-info mr-1">Activos <i> |</i> </li>
                                <li class="text-secondary"> Nuevo Usuario </li>
                            </ol>
                        </div>
                        
                    </div>
                </div>
                <form action="<?php echo base_url() ?>Au" method="POST" onsubmit="$('#submitBtn').prop('disabled', true);">
                    <div class="form-row">
                        <div class="col">
                            <label class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control"  name="nombre" placeholder="nombre" required="true">
                        </div>
                        <div class="col">
                            <label class="col-form-label">Apellido Paterno:</label>
                            <input type="text" class="form-control" name="apellidopaterno" placeholder="Apellido Paterno" required="true">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label class="col-form-label">Apellido Materno:</label>
                            <input type="text" class="form-control"  name="apellidomaterno" placeholder="Apellido Materno" required="true">
                        </div>
                        <div class="col">
                            <label class="col-form-label">Número Telefónico: (formato xxx-xxx-xxxx)</label>
                            <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control" id="numerot" name="numerot" placeholder="xxx-xxx-xxxx" required="true">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label class="col-form-label">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="correo" name="email" placeholder="Correo Electrónico" required="true">
                        </div>
                        <div class="col">
                            <label for="exampleFormControlSelect1" class="col-form-label">Tipo </label>
                            <select name='tipo' class="form-control" id="exampleFormControlSelect1">
                              
                                <option value="2"> Administrador </option>
                                <option value="3"> General </option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Establecimiento:</label>
                        <input class="form-control" type="text" disabled value="<?php echo  strtoupper($this->session->userdata('establecimiento')) ?>">
                    </div>
                    <!-- <div class="form-group">
                        <?php if (!empty($tipest)) {
                            foreach ($tipest as $usuario) {
                        ?>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label class="form-check-label"><?php switch ($usuario->Tipo_establecimiento) {
                                                                        case 3:
                                                                            echo "Reproduccion";
                                                                            break;
                                                                        case 4:
                                                                            echo "Crianza";
                                                                            break;
                                                                        case 5:
                                                                            echo "Engorda";
                                                                            break;
                                                                        case 6:
                                                                            echo "Transportador de pescado vivo";
                                                                            break;
                                                                        case 7:
                                                                            echo "Procesador";
                                                                            break;
                                                                        case 8:
                                                                            echo "Transportista y almacenista";
                                                                            break;
                                                                        case 9:
                                                                            echo "comerciante y mayorista";
                                                                            break;
                                                                    } ?></label>
                                </div>

                        <?php
                            }
                        }
                        ?>
                    </div> -->

                    <div class="row justify-content-end">
                        <div class="p-2 ml-5">
                            <a data-toggle="tooltip" data-placement="top" title="Regresar "  href="<?php echo base_url() ?>Ru" class="btn btn-outline-secondary  ml-5">
                                <span class="fas fa-arrow-alt-circle-left"></span> 
                            </a>
                        </div>
                        <div class="p-2 ml-5">
                            <button data-toggle="tooltip" data-placement="top" title="Registrar" id="submitBtn" type="submit" class="btn btn-outline-secondary mr-5 ml-5">
                                <span class="fas fa-check"></span>
                            </button>
                        </div>

                    </div>


                </form>



            </div>
        </div>
    </section>
</div>