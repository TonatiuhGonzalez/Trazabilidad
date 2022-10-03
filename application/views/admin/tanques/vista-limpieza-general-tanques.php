<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
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
                                    <li class="text-secondary">  Limpieza y Desinfección</li>
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
                                    <li class="text-secondary"> Limpieza y Desinfección </li>
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
                                    <li class="text-secondary"> Limpieza y Desinfección </li>
                                </ol>
                            </div>
                        </div>
                    </div>
            <?php
                    break;
            }
            ?>

            <div class="card text-center border-info">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a data-toggle="tooltip" data-placement="top" title="Reproductores" class="nav-link <?php if ($tipo == 1) echo "active" ?>" href="<?php echo base_url() ?>Uc" type="button" id="reproduccion">
                                <!-- <img src="<?php echo base_url() ?>/dist/img/reproduccion.png" 
                        style="height:20px;
                        width: 30px;" > -->
                                <span class="Tlg-2 fas fa-venus-mars"></span> </a>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a data-toggle="tooltip" data-placement="top" title="Hormonado" class="nav-link  <?php if ($tipo == 2) echo "active" ?>" href="<?php echo base_url() ?>Uccr" type="button" id="crianza">
                                <span class="Tlg-2 fas fa-baby-carriage"></span> </a>
                        </li>

                        <li class="nav-item ">
                            <a data-toggle="tooltip" data-placement="top" title="Engorda" class="nav-link <?php if ($tipo == 3) echo "active" ?> " href="<?php echo base_url() ?>Uen" type="button">
                                <span class="Tlg-2 fas fa-user-graduate"></span> </a>
                        </li>

                    </ul>
                </div>
                <div class="card-body">
                    <div class="box-body">
                        <div class="row justify-content-first">

                            <div class="p-2">
                                <?php
                                switch ($tipo) {
                                    case 1:
                                ?>
                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Uc" type="button">
                                            <span class="fas fa-arrow-alt-circle-left"></span>
                                            <span class="fas fa-venus-mars"></span>
                                        </a>
                                    <?php
                                        break;
                                    case 2:
                                    ?>
                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Uccr" type="button">
                                            <span class="fas fa-arrow-alt-circle-left"></span>
                                            <span class="fas fa-baby-carriage"></span>
                                        </a>
                                    <?php
                                        break;
                                    case 3:
                                    ?>
                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Uen" type="button">
                                            <span class="fas fa-arrow-alt-circle-left"></span>
                                            <span class="fas fa-user-graduate"></span>
                                        </a>
                                <?php
                                        break;
                                }
                                ?>
                            </div>

                            <div class="p-2">
                                <a data-toggle="tooltip" data-placement="top" title="Nuevo Registro" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Tl/<?php echo $id_tanque ?>/<?php echo $id_uc ?>/<?php echo $tipo ?>" type="button">
                                    <span class="fa fa-plus"></span> <span class="fas fa-broom"></span> </a>
                            </div>

                        </div>

                        <p class="text-center font-weight-bold"><?php echo $tnq->Tnq_nombre ?></p>
                        
                        <div class="row">
                            <div class="col-md-12 mt-4">

                                <table id="table" class="table table-bordered btn-hover">
                                    <thead>
                                        <tr>
                                            <th class="<?php
                                                        switch ($tipo) {
                                                            case 1:

                                                                echo "h-1";
                                                                break;
                                                            case 2:
                                                                echo "Uccr-1";

                                                                break;
                                                            case 3:

                                                                echo "Uen-1";


                                                                break;
                                                        }
                                                        ?> text-white">Usuario</th>
                                            <th class="<?php
                                                        switch ($tipo) {
                                                            case 1:

                                                                echo "h-1";
                                                                break;
                                                            case 2:
                                                                echo "Uccr-1";

                                                                break;
                                                            case 3:

                                                                echo "Uen-1";


                                                                break;
                                                        }
                                                        ?>  text-white">Fecha y Hora </th>

                                        </tr>
                                    <tbody id="cuerpotabla">
                                        <?php if (!empty($tanques)) {
                                            foreach ($tanques as $tanque) {
                                        ?>
                                                <tr>

                                                    <td> <?php echo strtoupper($tanque->Usu_nombre . ' '
                                                                . $tanque->Usu_apellido_paterno . ' ' . $tanque->Usu_apellido_materno) ?></td>
                                                    <td> <?php echo date("d/m/Y g:i A", strtotime($tanque->Fecha_limpieza)) ?></td>


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
                        Se elimino corrrectamente
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>