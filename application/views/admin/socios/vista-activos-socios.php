<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="container-fluid">
            <div class="mt-2 ml-1 mr-1">
                <div class="box-body">
                    <div class="container-fluid Sr-1">
                        <div class="row mt-3 Sr-1 text-white justify-content-between ">
                           
                            <div class="p-2">
                                <ol class="breadcrumb bg-white float-right mt-2">
                                    <li class="text-info mr-1">Clientes -Proveedores <i> |</i> </li>
                                    <li class="text-secondary"> Activos </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-first">
                        <div class="d-flex flex-row-reverse ">
                            <div class="p-2">
                                <a data-toggle="tooltip" data-placement="top" title="Nuevo Cliente-Proveedor" class="btn btn-outline-secondary" href="<?php base_url() ?>Vas" type="button">
                                    <span class="fa fa-plus"></span> <span class="fas fa-hands-helping"></span> </a>
                            </div>

                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-2 ml-5">
                                <a data-toggle="tooltip" data-placement="top" title="Inactivos" class="btn  btn-outline-secondary  " href="<?php base_url() ?>Hs" type="button">
                                    <span class="fas fa-trash"></span> <span class="fas fa-align-center"></span></a>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4">

                            <table id="table" class="table table-bordered btn-hover">
                                <thead>
                                    <tr>
                                        <th class="Sr-1 text-white">Nombre</th>
                                        <th class="Sr-1 text-white">Tipo</th>
                                        <th class="Sr-1 text-white">Número telefónico</th>
                                        <th class="Sr-1 text-white">Correo electrónico</th>
                                        <th class="Sr-1 text-white">Opciones</th>

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
                                                        <a data-toggle="tooltip" data-placement="top" title="Ver" type="button" class="btn btn-outline-secondary view" href="<?php echo base_url() ?>Vvs/<?php echo $socio->Id_socio ?>">

                                                            <span class="fa fa-eye"></span></a>

                                                        <a data-toggle="tooltip" data-placement="top" title="Editar" type="button" class="btn btn-outline-secondary  ml-3" href="<?php echo base_url() ?>Ves/<?php echo $socio->Id_socio ?>">
                                                            <span class="fas fa-pencil-alt"></span></a>

                                                        <button data-toggle="tooltip" data-placement="top" title="Archivar" type="button" class="btn btn-outline-secondary elisocio ml-3" value="<?php echo $socio->Id_socio ?>">
                                                            <span class="fas fa-trash"></span></button>


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
                            Se elimino corrrectamente
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>