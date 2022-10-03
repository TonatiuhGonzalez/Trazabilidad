<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid Viu-1">
            <div class="row mt-3 Viu-1 text-white justify-content-between ">

                <div class="p-2">
                    <ol class="breadcrumb bg-white float-right mt-2">
                        <li class="text-info mr-1">Usuarios <i> |</i> </li>
                        <li class="text-info mr-1">Activos <i> |</i> </li>
                        <li class="text-secondary"> <?php echo $info->Usu_nombre . ' ' . $info->Usu_apellido_paterno . ' ' . $info->Usu_apellido_materno; ?></li>
                    </ol>
                </div>

            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label class="col-form-label">Correo Electrónico:</label>
                <input type="text" class="form-control" disabled id="email" value="<?php echo $info->Usu_correo_electronico; ?>" placeholder="Email">


            </div>
            <div class="col">
                <label class="col-form-label">Número Telefónico:</label>
                <input type="text" class="form-control" disabled id="numerot" value="<?php echo $info->Usu_numero_telefonico; ?>" placeholder="Número Telefónico">
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label class="col-form-label">Establecimiento:</label>
                <input class="form-control" type="text" disabled value="<?php echo  strtoupper($this->session->userdata('establecimiento')) ?>">
            </div>
            <div class="col">
                <label for="exampleFormControlSelect1" class="col-form-label">Tipo </label>
                <select disabled class="form-control" id="exampleFormControlSelect1">
                    <?php
                    foreach ($hist as $usuario) {
                        if ($usuario->Ie_fecha_baja == "0000-00-00") {
                            switch ($usuario->Ie_tipo_usuario) {                               
                                case 2:  ?>
                                    <option value="2"> Administrador </option>
                                <?php break;
                                case 3: ?>
                                    <option value="3"> General </option>
                                <?php break;
                                case 4: ?>
                                    <option value="4"> Dueño </option>
                                <?php break;
                            }
                        }
                    }
                    ?>





                </select>
            </div>
        </div>

        <div class="form-group">

        </div>


        <label class="col-form-label ">Historial de ingresos y egresos :</label>





        <table  class="table table-bordered btn-hover">
            <thead>
                <tr>
                    <th class="Viu-1 text-white">Nivel</th>
                    <th class="Viu-1 text-white">Fecha Alta</th>
                    <th class="Viu-1 text-white">Fecha Baja</th>


                </tr>
            <tbody>
                <?php
                foreach ($hist as $usuario) {
                ?>
                    <tr>
                        <td align="center"> <?php
                                            switch ($usuario->Ie_tipo_usuario) {
                                                
                                                case 2:
                                                    echo 'Administrador';
                                                    break;
                                                case 3:
                                                    echo 'General';
                                                    break;
                                                case 4:
                                                    echo 'Dueño';
                                                    break;
                                            }
                                            ?></td>
                        <td align="center"><?php echo date("d/m/Y ", strtotime($usuario->Ie_fecha_alta)) ?></td>
                        <td align="center"><?php
                                            if ($usuario->Ie_fecha_baja == "0000-00-00") {
                                                echo '0000-00-00';
                                            } else {
                                                echo date("d/m/Y ", strtotime($usuario->Ie_fecha_baja));
                                            } ?></td>


                    </tr>

                <?php
                }

                ?>
            </tbody>

            </thead>
        </table>

        <div class="row justify-content-end">
            <div class="p-2 ml-5">
                <a data-toggle="tooltip" data-placement="top" title="Regresar"  href="<?php echo base_url() ?>Ru" type="button" class="btn btn-outline-secondary  mr-5 ml-5">
                    <span class="fas fa-arrow-alt-circle-left"></span>
                </a>
            </div>
        </div>



    </section>
</div>