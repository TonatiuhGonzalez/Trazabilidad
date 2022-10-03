<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="container-fluid">
            <div class="mt-2 ml-1 mr-1">
                <div class="box-body ">
                    <div class="container-fluid Ru-1">
                        <div class="row mt-3 Ru-1 text-white justify-content-between ">

                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                    <li class="text-info mr-1">Usuarios <i> |</i> </li>
                                    <li class="text-secondary"> Activos </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-first">
                        <!-- col-md-12 -->
                        <div class="d-flex flex-row-reverse ">
                            <?php if ($this->session->userdata('tipousuario') == 4) { ?>

                                <div class="p-2">
                                    <a data-toggle="tooltip" data-placement="top" title="Nuevo Usuario" class="btn btn-outline-secondary" href="<?php base_url() ?>Av" type="button">
                                        <span class="fas fa-user-plus"></span> </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-2 ml-5">
                                <a data-toggle="tooltip" data-placement="top" title="Inactivos" class="btn  btn-outline-secondary  " href="<?php base_url() ?>Hu" type="button">
                                    <span class="fas fa-trash"></span> <span class="fas fa-align-center"></span></a>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-4">

                            <table id="table" class="table table-bordered btn-hover">
                                <thead>
                                    <tr>
                                        <th class="Ru-1 text-white">Rol</th>
                                        <th class="Ru-1 text-white">Nombre</th>
                                        <th class="Ru-1 text-white">Número Telefónico</th>
                                        <th class="Ru-1 text-white">Opciones</th>

                                    </tr>
                                <tbody id="cuerpotabla">
                                    <?php if (!empty($usuarios)) {
                                        foreach ($usuarios as $usuario) {
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
                                                                            echo "Dueño";
                                                                            break;
                                                                    } ?></td>
                                                <td align="center"><?php echo strtoupper($usuario->Usu_nombre . " " . $usuario->Usu_apellido_paterno . " " . $usuario->Usu_apellido_materno) ?></td>
                                                <td align="center"><?php echo $usuario->Usu_numero_telefonico ?></td>
                                                <td align="left">
                                                    <div class="btn-group">
                                                        <a data-toggle="tooltip" data-placement="top" title="Ver" type="button" class="btn btn-outline-secondary view" href="<?php echo base_url() ?>Viu/<?php echo $usuario->Id_usuario ?>">
                                                            <span class="fa fa-eye"></span></a>

                                                        <?php if ($usuario->Ie_tipo_usuario == 2 && $usuario->Id_usuario == $this->session->userdata('id_usuario')) { ?>
                                                            <a data-toggle="tooltip" data-placement="top" title="Editar" type="button" class="btn btn-outline-secondary  ml-3" href="<?php echo base_url() ?>Veu/<?php echo $usuario->Id_usuario ?>">
                                                                <span class="fas fa-pencil-alt "></span></a>
                                                        <?php } ?>
                                                        <?php if ($usuario->Ie_tipo_usuario == 2 &&  $this->session->userdata('tipousuario') == 4) { ?>
                                                            <a data-toggle="tooltip" data-placement="top" title="Editar" type="button" class="btn btn-outline-secondary  ml-3" href="<?php echo base_url() ?>Veu/<?php echo $usuario->Id_usuario ?>">
                                                                <span class="fas fa-pencil-alt "></span></a>
                                                        <?php } ?>
                                                        <?php if ($usuario->Ie_tipo_usuario == 4 &&  $this->session->userdata('tipousuario') == 4) { ?>
                                                            <a data-toggle="tooltip" data-placement="top" title="Editar" type="button" class="btn btn-outline-secondary  ml-3" href="<?php echo base_url() ?>Veu/<?php echo $usuario->Id_usuario ?>">
                                                                <span class="fas fa-pencil-alt "></span></a>
                                                        <?php } ?>


                                                        <?php if ($usuario->Ie_tipo_usuario > 2 && $usuario->Ie_tipo_usuario < 4) { ?>
                                                            <a data-toggle="tooltip" data-placement="top" title="Editar" type="button" class="btn btn-outline-secondary  ml-3" href="<?php echo base_url() ?>Veu/<?php echo $usuario->Id_usuario ?>">
                                                                <span class="fas fa-pencil-alt "></span></a>
                                                        <?php } ?>

                                                        <?php if ($this->session->userdata('tipousuario') == 4 && $usuario->Ie_tipo_usuario == 2) { ?>

                                                            <a title="Archivar" type="button" class="btn btn-outline-secondary eli ml-3" href="<?php echo base_url() ?>Eu/<?php echo $usuario->Id_usuario ?>/<?php echo $usuario->id_ingreso_egreso ?>">
                                                                <span class="fas fa-trash"></span></a>



                                                        <?php } else { ?>
                                                            <?php if ($usuario->Ie_tipo_usuario == 2 || $usuario->Ie_tipo_usuario == 4) { ?>
                                                                <button title="Archivar" type="button" class="btn btn-outline-secondary  ml-3" data-toggle="modal" data-target="#exampleModal">
                                                                    <span class="fas fa-trash"></span></button>
                                                            <?php } else { ?>

                                                                <a data-toggle="tooltip" data-placement="top" title="Archivar" type="button" class="btn btn-outline-secondary eli ml-3" href="<?php echo base_url() ?>Eu/<?php echo $usuario->Id_usuario ?>/<?php echo $usuario->id_ingreso_egreso ?>">
                                                                    <span class="fas fa-trash"></span></a>

                                                            <?php } ?>
                                                        <?php } ?>

                                                        <?php if ($this->session->userdata('tipousuario') == 4) { ?>
                                                            <a data-toggle="tooltip" data-placement="top" title="Restaurar Contraseña" type="button" class="btn btn-outline-secondary  ml-3" href="<?php echo base_url() ?>Rsc/<?php echo $usuario->Id_usuario ?>">
                                                                <span class="fas fa-undo"></span> <span class="fas fa-key"></span></a>

                                                        <?php } ?>

                                                        <?php if ($this->session->userdata('tipousuario') == 2 && $usuario->Ie_tipo_usuario != 4 &&  $usuario->Id_usuario == $this->session->userdata('id_usuario')) { ?>
                                                            <a data-toggle="tooltip" data-placement="top" title="Restaurar Contraseña" type="button" class="btn btn-outline-secondary  ml-3" href="<?php echo base_url() ?>Rsc/<?php echo $usuario->Id_usuario ?>">
                                                                <span class="fas fa-undo"></span> <span class="fas fa-key"></span></a>

                                                        <?php } else {
                                                            if ($this->session->userdata('tipousuario') == 2 && $usuario->Ie_tipo_usuario ==3) {
                                                                ?>
                                                                <a data-toggle="tooltip" data-placement="top" title="Restaurar Contraseña" type="button" class="btn btn-outline-secondary  ml-3" href="<?php echo base_url() ?>Rsc/<?php echo $usuario->Id_usuario ?>">
                                                                <span class="fas fa-undo"></span> <span class="fas fa-key"></span></a>
                                                                <?php
                                                            }
                                                        } ?>


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

            <div class="modal fade" id="exampleModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Este usuario no se puede eliminar
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>