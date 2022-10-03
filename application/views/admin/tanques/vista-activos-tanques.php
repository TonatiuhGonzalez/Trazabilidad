<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Ta-1">
                    <div class="row mt-3 Ta-1 text-white justify-content-between ">
                        
                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info mr-1">Tanques <i> |</i> </li>
                                <li class="text-secondary"> Activos </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-first">
                <?php if($this->session->userdata('tipousuario')==4){?>
                    <div class="p-2">
                        <a data-toggle="tooltip" data-placement="top" title="Nuevo Tanque"  class="btn btn-outline-secondary" href="<?php echo base_url() ?>At" type="button">
                            <span class="fa fa-plus"></span> <span class="fas fa-glass-whiskey"></span> </a>
                    </div>
                    <?php }?>


                    <div class="p-2 ">
                        <a data-toggle="tooltip" data-placement="top" title="Inactivos"  class="btn  btn-outline-secondary" href="<?php echo base_url() ?>Vtd" type="button">
                            <span class="fas fa-trash"></span> <span class="fas fa-align-center"></span></a>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 mt-4">

                        <table id="table" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th align="center" class="Ta-1 text-white">Nombre</th>                                    
                                    <th align="center" class="Ta-1 text-white">Fecha Alta</th>
                                    <th align="center" class="Ta-1 text-white">Tipo de unidad</th>
                                    <th align="center" class="Ta-1 text-white"> Opciones</th>


                                </tr>
                            <tbody id="cuerpotabla">
                                <?php if (!empty($tanques)) {
                                    foreach ($tanques as $tanque) {
                                ?>
                                        <tr>

                                            <td align="center"> <?php echo strtoupper($tanque->Tnq_nombre) ?></td>
                                           
                                            <td align="center">
                                                <?php echo date("d/m/Y  g:i A", strtotime($tanque->Tnq_fecha_alta)) ?>
                                            </td>
                                            <td align="center"> <?php
                                                                switch ($tanque->Tnq_tipo) {
                                                                    case 1:
                                                                        echo 'Reproductores';
                                                                        break;
                                                                    case 2:
                                                                        echo 'Hormonado';
                                                                        break;

                                                                    case 3:
                                                                        echo 'Engorda';
                                                                        break;
                                                                    default:
                                                                        echo 'vacío';
                                                                        break;
                                                                }
                                                                ?></td>

                                            <td align="center">
                                            <?php if($this->session->userdata('tipousuario')==4){?>
                                                <div class="btn-group">
                                                    <a data-toggle="tooltip" data-placement="top" title="Editar"  type="button" class="btn  btn-outline-secondary" href="<?php echo base_url() ?>Veta/<?php echo $tanque->Id_tanque ?>">
                                                        <span class="fas fa-pencil-alt"></span></a>

                                                </div>
                                                <?php }?>
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
    </section>
</div>