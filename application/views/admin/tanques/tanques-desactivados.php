<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Vtd-1">
                    <div class="row mt-3 Vtd-1 text-white justify-content-between ">
                        
                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Tanques <i> |</i> </li>
                                <li class="text-secondary"> Inactivos </li>
                            </ol>
                        </div>
                        
                    </div>
                </div>
                <div class="row justify-content-first">

                    <div class="p-2">
                        <a data-toggle="tooltip" data-placement="top" title="Regresar"  class="btn btn-outline-secondary" href="<?php echo base_url() ?>Ta" type="button">
                            <span class="fas fa-arrow-alt-circle-left"></span>  </a>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 mt-4">

                        <table id="table" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th class="Vtd-1 text-white">Nombre</th>
                                    
                                    <th class="Vtd-1 text-white">Fecha Alta</th>
                                    <th class="Vtd-1 text-white">Opciones</th>

                                </tr>
                            <tbody id="cuerpotabla">
                                <?php if (!empty($tanques)) {
                                    foreach ($tanques as $tanque) {
                                ?>
                                        <tr>

                                            <td align="center"> <?php echo strtoupper($tanque->Tnq_nombre) ?></td>                                           
                                            <td align="center"> <?php echo date("d/m/Y  g:i A", strtotime($tanque->Tnq_fecha_alta)) ?></td>


                                            <td align="center">

                                                <div class="btn-group">

                                                    <a data-toggle="tooltip" data-placement="top" title="Reactivar"  type="button" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Actd/<?php echo $tanque->Id_tanque ?>">
                                                        <span class="fas fa-power-off"></span>
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