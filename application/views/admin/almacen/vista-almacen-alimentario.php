<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Al-1">
                    <div class="row mt-3 Al-1 text-white justify-content-between ">
                        
                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Almacén <i> |</i> </li>
                                <li class="text-secondary"> Suministros Alimentarios </li>
                            </ol>
                        </div>
                        
                    </div>
                </div>
                <div class="card text-center border-info">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a data-toggle="tooltip" data-placement="top" title="Alimentos" class="nav-link " type="button" id="alimento">
                                    <span class="fas fa-drumstick-bite"></span> </a>
                            </li>
                            <li class="nav-item ">
                                <a data-toggle="tooltip" data-placement="top" title="Medicinas" class="nav-link " href="<?php base_url() ?>Alme" type="button">
                                    <span class="Al-2 fas fa-briefcase-medical"></span> </a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-first">

                            <div class="p-2">
                                <a data-toggle="tooltip" data-placement="top" title="Nuevo Alimento" class="btn btn-outline-secondary" href="<?php base_url() ?>Aal" type="button">
                                    <span class="fa fa-plus"></span> <span class="fas fa-drumstick-bite"></span> </a>
                            </div>
                            <div class="p-2">
                                <a data-toggle="tooltip" data-placement="top" title="Histórico" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Vaarch" type="button">
                                    <span class="fas fa-archive"> </a>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <table id="table" class="table table-bordered btn-hover">
                                    <thead>
                                        <tr>
                                            <th class="Al-1 text-white">Nombre Comercial</th>
                                            <th class="Al-1 text-white">Fecha Caducidad</th>
                                            
                                            <th class="Al-1 text-white">Cantidad Existente (Kilogramos)</th>
                                            <th class="Al-1 text-white">Opciones</th>

                                        </tr>
                                    <tbody id="cuerpotabla">
                                        <?php if (!empty($alimentos)) {
                                            foreach ($alimentos as $alimento) {
                                        ?>
                                                <tr>

                                                    <td> <?php echo strtoupper($alimento->Ia_nombre_comercial) ?></td>
                                                    <td> <?php echo  date("d/m/Y g:i A", strtotime($alimento->Ia_fecha_caducidad)) ?></td>                                                    
                                                    <td> <?php echo $alimento->Pro_insu_cantidad_total
                                                            ?></td>


                                                    <td>
                                                        <div class="btn-group">
                                                            <a data-toggle="tooltip" data-placement="top" title="Ver" type="button" class="btn btn-outline-secondary view" href="<?php echo base_url() ?>almd/<?php echo $alimento->Id_insumo_alimentario ?>/1">
                                                                <span class="fa fa-eye"></span></a>
                                                            <?php if ($alimento->Pro_insu_estado_logico == 1) { ?>
                                                                <a data-toggle="tooltip" data-placement="top" title="Editar" type="button" class="btn btn-outline-secondary ml-3" href="<?php echo base_url() ?>edalm/<?php echo $alimento->Id_insumo_alimentario ?>">
                                                                    <span class="fas fa-pencil-alt "></span></a>
                                                            <?php } ?>
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
        </div>
    </section>
</div>