<div class="content-wrapper">
        <section class="content">
                <div class="container-fluid Veta-1">
                        <div class="row mt-3 Veta-1 text-white justify-content-between ">                               

                                <div class="p-2">
                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                <li class="text-info mr-1">Tanques <i> |</i> </li>
                                                <li class="text-info mr-1"> Activos  <i> |</i> </li>
                                                <li class="text-secondary"> Editar </li>
                                        </ol>
                                </div>
                                
                        </div>
                </div>
                <?php if (!empty($this->session->flashdata("nomr"))) { ?>
                        <div class="alert alert-warning alert-dismissible fade show">
                                <strong class="text-center"> Es un nombre repetido intenta con otro</strong>

                        </div>
                <?php } ?>
                <form action="<?php echo base_url() ?>Etan" method="POST">
                        <div class="form-group">
                                <label class="col-form-label">Nombre Tanque : (nombre-XX)</label>
                                <input type="text" class="form-control" name="nombretanque" pattern="[A-Za-z]{1,15}-[0-9]{2}" value="<?php echo $tanque->Tnq_nombre ?>" placeholder="Ingrese Nombre del Tanque" required="true">
                        </div>
                        <!-- <div class="form-group">
                                <label for="exampleFormControlSelect1">Especie</label>
                                <select name='especie' class="form-control" id="exampleFormControlSelect1" required="true">
                                        <?php if (!empty($especies)) { ?>

                                                <option value="<?php echo strtoupper($tanque->Id_especie) ?>"><?php echo strtoupper($tanque->Sci_nombre_cientifico) ?></option>

                                                <?php foreach ($especies as $especie) {
                                                        if($tanque->Id_especie != $especie->Id_especie){
                                        ?>

                                                        <option value="<?php echo strtoupper($especie->Id_especie) ?>"><?php echo strtoupper($especie->Sci_nombre_cientifico) ?></option>

                                        <?php
                                                }
                                                }
                                        }
                                        ?>
                                </select>
                        </div> -->
                        <div class="form-group">
                                <label class="col-form-label">Fecha y Hora (Alta Tanque):</label>
                                <input type="datetime-local" name="fecha" class="form-control" value="<?php
                                                                                                        $parte1 = substr($tanque->Tnq_fecha_alta, -19, 10);
                                                                                                        $parte2 = substr($tanque->Tnq_fecha_alta, 11, strlen($tanque->Tnq_fecha_alta));
                                                                                                        echo $parte1 . 'T' . $parte2 ?>" required="true">
                        </div>

                        <div class="form-group">
                                <label class="col-form-label">Establecimiento:</label>
                                <input class="form-control" type="text" disabled value="<?php echo  strtoupper($this->session->userdata('establecimiento')) ?>">
                        </div>
                        <div class="form-group">
                                <input class="form-control" type="hidden" value="<?php echo  $id_tnq ?>" name="id" required="true">
                        </div>

                        <div class="row justify-content-end">
                                <div class="p-2 ml-5">
                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Ta" class="btn btn-outline-secondary ml-5">
                                                <span class="fas fa-arrow-alt-circle-left"></span> </span>
                                        </a>
                                </div>
                                <div class="p-2 ml-5">
                                        <button data-toggle="tooltip" data-placement="top" title="Guardar Cambios" type="submit" class="btn btn-outline-secondary mr-5 ml-5">
                                                <span class="fas fa-check"></span>
                                        </button>
                                </div>
                        </div>



                </form>
                <?php if ($this->session->flashdata("errordb")) { ?>
                        <div class="alert alert-warning alert-dismissible fade show">
                                <strong class="text-center"><?php echo $this->session->flashdata("errorbd") ?></strong>

                        </div>
                <?php } ?>

        </section>
        <div class="ml-3">

                <!-- <a href="javascript:history.back()"  class="btn btn-danger  ml-5"> Volver Atrás</a> -->
        </div>

</div>