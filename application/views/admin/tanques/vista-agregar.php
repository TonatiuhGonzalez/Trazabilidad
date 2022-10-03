<div class="content-wrapper">
        <section class="content">
                <div class="container-fluid At-1">
                        <div class="row mt-3 At-1 text-white justify-content-between ">
                               
                                <div class="p-2">
                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                <li class="text-info mr-1">Tanques <i> |</i> </li>
                                                <li class="text-info mr-1"> Activos  <i> |</i> </li>
                                                <li class="text-secondary"> Nuevo Tanque </li>
                                        </ol>
                                </div>
                                
                        </div>
                </div>
                <?php if (!empty($this->session->flashdata("nomr"))) { ?>
                        <div class="alert alert-warning alert-dismissible fade show">
                                <strong class="text-center"> El nombre de tanque ya esta registrado, intenta con otro</strong>

                        </div>
                <?php } ?>
                <form action="<?php echo base_url() ?>Agt" method="POST" onsubmit="$('#submitBtn').prop('disabled', true);">
                        <div class="form-group">
                                <label class="col-form-label">Nombre Tanque : (nombre-XX)</label>
                                <input type="text" class="form-control" name="nombretanque" 
                                pattern="[A-Za-z]{1,15}-[0-9]{2}" placeholder="Ingrese Nombre del Tanque" required="true">
                        </div>
      
                        <div class="form-group">
                                <label class="col-form-label">Fecha y Hora (Alta Tanque):</label>
                                <input type="datetime-local" name="fecha" class="form-control" required="true">
                        </div>

                        <div class="form-group">
                                <label class="col-form-label">Establecimiento:</label>
                                <input class="form-control" type="text" disabled value="<?php echo  strtoupper($this->session->userdata('establecimiento')) ?>">
                        </div>

                        <div class="row justify-content-end">
                                <div class="p-2 ml-5">
                                        <a data-toggle="tooltip" data-placement="top" title="Regresar"  href="<?php echo base_url() ?>Ta" class="btn btn-outline-secondary  ml-5">
                                                <span class="fas fa-arrow-alt-circle-left"></span> <span class="fas fa-glass-whiskey">
                                        </a>
                                </div>
                                <div class="p-2 ml-5">
                                        <button data-toggle="tooltip" data-placement="top" title="Registrar" id="submitBtn" type="submit" class="btn btn-outline-secondary mr-5 ml-5">
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