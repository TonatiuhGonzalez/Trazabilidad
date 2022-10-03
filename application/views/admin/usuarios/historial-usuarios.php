<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="mt-4">
                <div class="box-body">
                    <div class="container-fluid Hu-1">
                        <div class="row mt-3 Hu-1 text-white justify-content-between ">
                          
                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                    <li class="text-info mr-1">Usuarios <i> |</i> </li>
                                    <li class="text-secondary"> Inactivos </li>
                                </ol>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <!-- col-md-12 -->
                        <div class="d-flex flex-row">
                            <div class="p-2">
                                <a data-toggle="tooltip" data-placement="top" title="Regresar"  class="btn btn-outline-secondary" href="<?php base_url() ?>Ru" type="button">
                                    <span class="fas fa-arrow-alt-circle-left"></span> </a>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <table id="table" class="table table-bordered btn-hover">
                                <thead>
                                    <tr>
                                        
                                        <th class="Hu-1 text-white">Nombre</th>
                                        <th class="Hu-1 text-white">Número Telefónico</th>
                                        <th class="Hu-1 text-white">Opciones</th>

                                    </tr>
                                <tbody id="cuerpotabla">
                                    <?php if (!empty($usuarios)) {

                                        foreach ($usuarios as $usuario) {
                                    ?>
                                            <tr id="<?php echo $usuario->Id_usuario ?>">                                                
                                                <td align="center"><?php echo strtoupper($usuario->Usu_nombre . " " . $usuario->Usu_apellido_paterno . " " . $usuario->Usu_apellido_materno) ?></td>
                                                <td align="center"><?php echo $usuario->Usu_numero_telefonico ?></td>
                                                <td align="center">
                                                    <div class="btn-group">
                                                        <a data-toggle="tooltip" data-placement="top" title="Ver"  type="button" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Vrea/<?php echo $usuario->Id_usuario ?>">
                                                            <span class="fa fa-eye"></span>
                                                        </a>
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
    </section>
</div>