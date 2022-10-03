<div class="content-wrapper">
        <section class="content">
                <div class="container-fluid">
                        <div class="mt-2 ml-1 mr-1">
                                <div class="container-fluid Vas-1">
                                        <div class="row mt-3 Vas-1 text-white justify-content-between ">

                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1"> Clientes-Proveedores <i> |</i> </li>
                                                                <li class="text-info mr-1">Activos <i> |</i> </li>
                                                                <li class="text-secondary"> Nuevo Cliente-Proveedor </li>
                                                        </ol>
                                                </div>

                                        </div>
                                </div>
                                <form action="<?php echo base_url() ?>Asoc" method="POST" onsubmit="$('#submitBtn').prop('disabled', true);">
                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Nombre :</label>
                                                        <input type="text" class="form-control" id="nombre" name="nombresocio" placeholder="Nombre" required="true">
                                                </div>
                                                <div class="col">
                                                        <label for="exampleFormControlSelect1" class="col-form-label">País</label>
                                                        <select disabled name='Pais' class="form-control" id="exampleFormControlSelect1">
                                                                <?php if (!empty($paises)) {
                                                                        foreach ($paises as $Pais) {
                                                                ?>

                                                                                <option><?php echo strtoupper($Pais->Nombre_pais) ?></option>

                                                                <?php
                                                                        }
                                                                }
                                                                ?>
                                                        </select>
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="col">
                                                        <label for="exampleFormControlSelect1" class="col-form-label">Tipo </label>
                                                        <select name='tipo' class="form-control" id="exampleFormControlSelect1">

                                                                <option value="1"> Cliente </option>
                                                                <option value="2"> Proveedor de Alimentos </option>
                                                                <option value="3"> Proveedor de Medicamentos </option>

                                                        </select>
                                                </div>
                                                <!-- <div class="col">
                                                        <label class="col-form-label">Numero de Identificación Único:</label>
                                                        <input type="text" class="form-control" id="idunico" name="idunico" placeholder="Número de Identificación Único" required="true">
                                                </div> -->
                                                <div class="col">
                                                        <label class="col-form-label">RFC:</label>
                                                        <input type="text" class="form-control" id="rfc" name="rfc" placeholder="rfc" required="true">
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Calle:</label>
                                                        <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" required="true">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label"> Número Exterior:</label>
                                                        <input type="text" class="form-control" id="numero" name="numero" placeholder="Número Exterior" required="true">
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Colonia:</label>
                                                        <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia" required="true">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Municipio:</label>
                                                        <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Municipio" required="true">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Estado:</label>
                                                        <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" required="true">
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Número Telefónico: (formato xxx-xxx-xxxx)</label>
                                                        <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control" id="numerot" name="numerot" placeholder="xxx-xxx-xxxx" required="true">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Correo Electrónico:</label>
                                                        <input type="email" class="form-control" id="correo" name="email" placeholder="Correo Electrónico" required="true">
                                                </div>
                                        </div>



                                        <div class="row justify-content-end">
                                                <div class="p-2 ml-5">
                                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Sr" class="btn btn-outline-secondary  ml-5">
                                                                <span class="fas fa-arrow-alt-circle-left"></span>
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
                        </div>
                </div>
        </section>
</div>