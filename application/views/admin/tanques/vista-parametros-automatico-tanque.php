<div class="content-wrapper">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
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
                                        <li class="text-info mr-1">Parametros Fisico-Químicos<i> |</i> </li>
                                        <li class="text-secondary"> Registro Automático </li>
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
                                        <li class="text-info mr-1">Parametros Fisico-Químicos<i> |</i> </li>
                                        <li class="text-secondary"> Registro Automático </li>
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
                                        <li class="text-info mr-1">Parametros Fisico-Químicos<i> |</i> </li>
                                        <li class="text-secondary"> Registro Automático </li>
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
                            <li class="nav-item ">
                                <a data-toggle="tooltip" data-placement="top" title="Automático" class="nav-link " type="button" id="auto">
                                    <span class="fas fa-robot"></span></a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="tooltip" data-placement="top" title="Manual" class="nav-link " href="<?php echo base_url() ?>Tpfqm/<?php echo base64_encode($id_tanque) ?>/<?php echo base64_encode($id_unidad) ?>/<?php echo base64_encode($tipo) ?>" type="button" id="manual">
                                    <span class="Tpfq-2 far fa-hand-paper"></span></a>
                            </li>


                        </ul>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url() ?>Tapfqa" method="POST" enctype="multipart/form-data">


                            <div class="form-group">
                                <input type="hidden" value="<?php echo $id_tanque ?>" name="tanque" required="true">
                            </div>
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $id_unidad ?>" name="unidad" required="true">
                            </div>
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $tipo ?>" name="tipo" required="true">
                            </div>

                            <?php if (!empty($this->session->flashdata("erra"))) { ?>
                                <div class="alert alert-warning alert-dismissible fade show">
                                        <strong class="text-center"> El archivo debe tener extensión .txt </strong>

                                </div>
                            <?php } ?>

                            <p class="text-center mt-1 font-weight-bold"><?php if(!empty($tanques)){
                                                        foreach($tanques as $tanque){
                                                            if($tanque->Id_tanque==$id_tanque){
                                                        echo $tanque->Tnq_nombre;
                                                        }
                                                    }
                                                    }  ?></p>
                            <div class="form-group mt-4">
                                <label class="col-form-label">Adjuntar un archivo</label>
                                <input type="file" name="archivo" required="true">
                            </div>
                            <div class="row justify-content-end">
                                <div class="p-2 ml-5">
                                    <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Tpfqg/<?php echo base64_encode($id_tanque) ?>/<?php echo base64_encode($id_unidad) ?>/<?php echo base64_encode($tipo) ?>" class="btn  btn-outline-secondary ml-5">
                                        <span class="fas fa-arrow-alt-circle-left"></span>
                                    </a>
                                </div>
                                <div class="p-2 ml-5">
                                    <button data-toggle="tooltip" data-placement="top" title="Registrar" type="submit" class="btn  btn-outline-secondary  ">
                                        <span class="fas fa-check"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <?php if ($this->session->flashdata("errordb")) { ?>
                    <div class="alert alert-warning alert-dismissible fade show">
                        <strong class="text-center"><?php echo $this->session->flashdata("errorbd") ?></strong>

                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>