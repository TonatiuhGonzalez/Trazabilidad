<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Vaarch-1">
                    <div class="row mt-3 Vaarch-1 text-white justify-content-between ">
                        
                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Almacén <i> |</i> </li>
                                <li class="text-info mr-1"> Suministros Alimentarios <i> |</i> </li>
                                <li class="text-secondary"> Histórico </li>
                            </ol>
                        </div>
                        
                    </div>
                </div>

                <div class="card text-center border-info">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a data-toggle="tooltip" data-placement="top" title="Alimentos" class="nav-link active " type="button" href="<?php echo base_url() ?>Al" id="alimento">
                                    <span class="fas fa-drumstick-bite"></span> </a>
                            </li>
                            <li class="nav-item ">
                                <a data-toggle="tooltip" data-placement="top" title="Medicinas" class="nav-link " href="<?php echo base_url() ?>Alme" type="button">
                                    <span class="Vaarch-2 fas fa-briefcase-medical"></span> </a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-first">

                            <div class="p-2">
                                <a data-toggle="tooltip" data-placement="top" title="Regresar" class="btn btn-outline-secondary" href="<?php base_url() ?>Al" type="button">
                                    <span class="fas fa-arrow-alt-circle-left"></span> <span class="fas fa-drumstick-bite"></span> </a>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <table id="table" class="table table-bordered btn-hover">
                                    <thead>
                                        <tr>
                                            <th class="Vaarch-1 text-white">Nombre Comercial</th>
                                            <th class="Vaarch-1 text-white">Fecha de Compra</th>
                                            <th class="Vaarch-1 text-white">Precio Unitario</th>
                                            <th class="Vaarch-1 text-white">Proveedor de Alimento</th>
                                            <th class="Vaarch-1 text-white">Opciones</th>

                                        </tr>
                                    <tbody id="cuerpotabla">
                                        <?php if (!empty($alimentos)) {
                                            foreach ($alimentos as $alimento) {
                                        ?>
                                                <tr>

                                                    <td align="center"> <?php echo strtoupper($alimento->Ia_nombre_comercial) ?></td>
                                                    <td align="center"> <?php echo date("d/m/Y g:i A", strtotime($alimento->Pro_insu_fecha_recepcion)) ?> </td>
                                                    <td align="center"> $ <?php echo $alimento->Pro_insu_precio_unitario ?></td>
                                                    <td align="center"> <?php echo $alimento->Soc_nombre ?></td>


                                                    <td>
                                                        <div class="btn-group">
                                                            <a data-toggle="tooltip" data-placement="top" title="Ver" type="button" class="btn btn-outline-secondary view" href="<?php echo base_url() ?>almd/<?php echo $alimento->Id_insumo_alimentario ?>/2">
                                                                <span class="fa fa-eye"></span></a>

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