<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Alme-1">
                    <div class="row mt-3 Alme-1 text-white justify-content-between ">
                        
                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Almacén <i> |</i> </li>
                                <li class="text-secondary"> Suministros Médicos </li>
                            </ol>
                        </div>
                        
                    </div>
                </div>
                <div class="card text-center border-info">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a data-toggle="tooltip" data-placement="top" title="Alimentos" class="nav-link " href="<?php base_url() ?>Al" type="button">
                                    <span class="Alme-2 fas fa-drumstick-bite"></span> </a>
                            </li>
                            <li class="nav-item ">
                                <a  data-toggle="tooltip" data-placement="top" title="Medicinas" class="nav-link " id="medico" type="button">
                                    <span class="fas fa-briefcase-medical"></span> </a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-first">

                            <div class="p-2">
                                <a data-toggle="tooltip" data-placement="top" title="Nueva Medicina" class="btn btn-outline-secondary" href="<?php base_url() ?>Alam" type="button">
                                    <span class="fa fa-plus"></span> <span class="fas fa-briefcase-medical"></span> </a>
                            </div>
                            <div class="p-2">
                                <a data-toggle="tooltip" data-placement="top" title="Histórico" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Vmarch" type="button">
                                    <span class="fas fa-archive"> </a>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <table id="table" class="table table-bordered btn-hover">
                                    <thead>
                                        <tr>
                                            <th class="Alme-1 text-white">Nombre Comercial</th>
                                            <th class="Alme-1 text-white">Fecha Caducidad</th>                                            
                                            <th class="Alme-1 text-white">Cantidad Existente (gramos)</th>
                                            <th class="Alme-1 text-white">Opciones</th>

                                        </tr>
                                    <tbody id="cuerpotabla">
                                        <?php if (!empty($medicos)) {
                                            foreach ($medicos as $medico) {
                                        ?>
                                                <tr>

                                                    <td> <?php echo strtoupper($medico->Inm_nombre_comercial) ?></td>
                                                    <td> <?php echo date("d/m/Y ", strtotime($medico->Inm_fecha_caducidad )) ?></td>                                                   
                                                    <td> <?php echo $medico->Pro_insu_medico_cantidad_total
                                                            ?></td>


                                                    <td>
                                                        <div class="btn-group">
                                                            <a data-toggle="tooltip" data-placement="top" title="Ver" type="button" class="btn btn-outline-secondary view" href="<?php echo base_url() ?>Vmed/<?php echo $medico->Id_insumo_medico ?>/1">
                                                                <span class="fa fa-eye"></span></a>

                                                            <a data-toggle="tooltip" data-placement="top" title="Editar" type="button" class="btn btn-outline-secondary  ml-3" href="<?php echo base_url() ?>Emed/<?php echo $medico->Id_insumo_medico ?>">
                                                                <span class="fas fa-pencil-alt "></span></a>

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