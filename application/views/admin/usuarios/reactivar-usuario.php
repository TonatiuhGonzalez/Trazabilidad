<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="mt-2 ml-1 mr-1">

                <div class="box-body">
                    <div class="container-fluid Vrea-1">
                        <div class="row mt-3 Vrea-1 text-white justify-content-between ">

                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                    <li class="text-info mr-1">Usuarios <i> |</i> </li>
                                    <li class="text-info mr-1">Inactivos <i> |</i> </li>
                                    <li class="text-secondary"> <?php echo $info->Usu_nombre . ' ' . $info->Usu_apellido_paterno . ' ' . $info->Usu_apellido_materno; ?> </li>
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
                    </div>

                    <label class="col-form-label mt-3">Historial de ingresos y egresos:</label>

                    <table class="table table-bordered btn-hover">
                        <thead>
                            <tr>
                                <th class="Vrea-1 text-white">Nivel</th>
                                <th class="Vrea-1 text-white">Fecha Alta</th>
                                <th class="Vrea-1 text-white">Fecha Baja</th>


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
                                                        }
                                                        ?></td>
                                    <td align="center"><?php echo date("d/m/Y ", strtotime($usuario->Ie_fecha_alta)) ?></td>
                                    <td align="center"><?php echo date("d/m/Y ", strtotime($usuario->Ie_fecha_baja)) ?></td>


                                </tr>

                            <?php
                            }

                            ?>
                        </tbody>

                        </thead>
                    </table>
                </div>


                <div class="row justify-content-end">
                    <div class="p-2 ml-5">
                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Hu" type="button" class="btn btn-outline-secondary ml-5">
                            <span class="fas fa-arrow-alt-circle-left"></span>
                        </a>
                    </div>
                    <?php if ($this->session->userdata('tipousuario') == 4) { ?>
                        <div class="p-2 ml-5">
                            <a data-toggle="tooltip" data-placement="top" title="Reactivar" href="<?php echo base_url() ?>Reac/<?php echo $info->Id_usuario ?>" type="button" class="btn btn-outline-secondary mr-5 ml-5">
                                <span class="fas fa-power-off"></span> </a>
                        </div>
                    <?php } ?>


                </div>
            </div>
        </div>
</div>