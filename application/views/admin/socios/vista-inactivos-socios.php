<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="container-fluid">
            <div class="mt-2 ml-1 mr-1">
                <div class="box-body">
                    <div class="container-fluid Hs-1">
                        <div class="row mt-3 Hs-1 text-white justify-content-between ">
                            
                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                    <li class="text-info mr-1"> Clientes -Proveedores <i> |</i> </li>
                                    <li class="text-secondary"> Inactivos </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="d-flex  ">
                            <div class="p-2">
                                <a data-toggle="tooltip" data-placement="top" title="Regresar" class="btn btn-outline-secondary" href="<?php base_url() ?>Sr" type="button">
                                    <span class="fas fa-arrow-alt-circle-left"></span></a>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4">

                            <table id="table" class="table table-bordered btn-hover">
                                <thead>
                                    <tr>
                                        <th class="Hs-1 text-white">Nombre</th>
                                        <th class="Hs-1 text-white">Tipo</th>
                                        <th class="Hs-1 text-white">Número telefónico</th>
                                        <th class="Hs-1 text-white">Correo electrónico</th>
                                        <th class="Hs-1 text-white">Opciones</th>


                                    </tr>
                                <tbody id="cuerpotabla">
                                    <?php if (!empty($socios)) {
                                        foreach ($socios as $socio) {
                                    ?>
                                            <tr>

                                                <td> <?php echo strtoupper($socio->Soc_nombre) ?></td>
                                                <td> <?php switch ($socio->Soc_tipo) {
                                                    case 1:
                                                        echo "Cliente";
                                                        break;
                                                    case 2:
                                                        echo "Proveedor de Alimentos";
                                                        break;
                                                    case 3:
                                                        echo "Proveedor de Medicamentos";
                                                        break;
                                                    
                                                } ?></td>
                                                <td> <?php echo $socio->Soc_numero_telefono ?></td>
                                                <td> <?php echo $socio->Soc_correo_electronico ?></td>

                                                <td align="center">
                                                    <div class="btn-group">
                                                        <a data-toggle="tooltip" data-placement="top" title="Ver" type="button" class="btn btn-outline-secondary view" href="<?php echo base_url() ?>Vrs/<?php echo $socio->Id_socio ?>">
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
    </section>
</div>