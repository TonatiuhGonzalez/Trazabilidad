<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid Veu-1">
            <div class="row mt-3 Veu-1 text-white justify-content-between ">

                <div class="p-2">
                    <ol class="breadcrumb bg-white float-right mt-2">
                        <li class="text-info mr-1">Usuarios <i> |</i> </li>
                        <li class="text-info mr-1">Activos <i> |</i> </li>
                        <li class="text-secondary"> Editar</li>
                    </ol>
                </div>

            </div>
        </div>
        <form action="<?php echo base_url() ?>Edu" method="POST">

            <div class="form-row">
                <div class="col">
                    <label class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data->Usu_nombre; ?>" placeholder="nombre" required="true">
                </div>
                <div class="col">
                    <label class="col-form-label disabled">Apellido Paterno:</label>
                    <input type="text" class="form-control" id="apellidopaterno" value="<?php echo $data->Usu_apellido_paterno; ?>" name="apellidopaterno" placeholder="Apellido Paterno" required="true">
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label class="col-form-label">Apellido Materno:</label>
                    <input type="text" class="form-control" id="apellidomaterno" value="<?php echo $data->Usu_apellido_materno; ?>" name="apellidomaterno" placeholder="Apellido Materno" required="true">
                </div>
                <div class="col">
                    <label class="col-form-label">Número Telefónico:</label>
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control" name="numerot" value="<?php echo $data->Usu_numero_telefonico; ?>" placeholder="Número Telefónico" required="true">
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label class="col-form-label">Correo Electrónico:</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $data->Usu_correo_electronico; ?>" placeholder="Email" required="true">
                </div>
                <div class="col">
                    <label for="exampleFormControlSelect1" class="col-form-label">Tipo </label>
                    <select name="tipo" class="form-control" id="exampleFormControlSelect1" required="true">
                        <?php

                        if($data->Ie_tipo_usuario==4){
                            ?>
                            <option value="4"> Jefe </option>
                            <?php
                        }else{
                        switch ($data->Ie_tipo_usuario) {
                            case 1: ?>
                                 
                                <option value="2"> Administrador </option>
                                <option value="3"> General </option>
                            <?php break;
                            case 2:  ?>
                                <option value="2"> Administrador </option>                               
                                <option value="3"> General </option>
                            <?php break;
                            case 3: ?>
                                <option value="3"> General </option>
                                <option value="2"> Administrador </option>
                                
                        <?php break;
                        }
                        }
                        ?>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label">Establecimiento:</label>
                <input class="form-control" type="text" disabled value="<?php echo  strtoupper($this->session->userdata('establecimiento')) ?>">
            </div>
            <div class="form-group">

                <input type="hidden" value="<?php echo $data->Id_usuario; ?>" name="id">
            </div>
            <div class="row justify-content-end">
                <div class="p-2 ml-5">
                    <a data-toggle="tooltip" data-placement="top" title="Regresar"  href="<?php echo base_url() ?>Ru" class="btn btn-outline-secondary  ml-5">
                        <span class="fas fa-arrow-alt-circle-left"></span>
                    </a>
                </div>
                <div class="p-2 ml-5">
                    <button data-toggle="tooltip" data-placement="top" title="Guardar Cambios"  type="submit" class="btn btn-outline-secondary mr-5 ml-5">
                        <span class="fas fa-check"></span>
                    </button>
                </div>

            </div>


        </form>

    </section>
</div>