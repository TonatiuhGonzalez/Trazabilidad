<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Vpe-1">
                    <div class="row mt-3 Vpe-1 text-white justify-content-between ">
                                                
                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Establecimientos <i> |</i> </li>
                               
                                <li class="text-secondary"> Activos </li>
                            </ol>
                        </div>
                        
                    </div>
                </div>
                <div class="row justify-content-first">

                    <div class="p-2">
                        <a data-toggle="tooltip" data-placement="top" title="Nuevo Establecimiento" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Vaes" type="button">
                            <span class="fa fa-plus"></span> <span class="fas fa-map-marked-alt"></span> </a>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 ">
                        <div class="table-responsive">
                            <table id="table" class="table table-bordered btn-hover ">
                                <thead>
                                    <tr>
                                        <th align="center" class="Vpe-1 text-white">Nombre</th>
                                        <th align="center" class="Vpe-1 text-white">Teléfono</th>
                                        <th align="center" class="Vpe-1 text-white">Correo Electrónico</th>
                                        <th align="center" class="Vpe-1 text-white"> Opciones</th>


                                    </tr>
                                <tbody id="cuerpotabla">
                                    <?php if (!empty($establecimientos)) {
                                        foreach ($establecimientos as $establecimiento) {
                                    ?>
                                            <tr>
                                               
                                                <td align="center"> <?php echo strtoupper($establecimiento->Est_nombre) ?></td>
                                                <td align="center"> <?php echo strtoupper($establecimiento->Est_telefono_fijo) ?></td>
                                                <td align="center"> <?php echo $establecimiento->Est_correo_electronico ?></td>

                                                <td align="center">
                                                    <div class="btn-group">
                                                        <a data-toggle="tooltip" data-placement="top" title="Editar" type="button" class="btn  btn-outline-secondary" href="<?php echo base_url() ?>Vees/<?php echo $establecimiento->Id_establecimiento ?>">
                                                            <span class="fas fa-pencil-alt"></span></a>

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