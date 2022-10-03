<div class="content-wrapper" id="contenido">
        <section class="content">
                <div class="mt-2 ml-1 mr-1">
                        <div class="box-body">

                                <div class="container-fluid Vees-1">
                                        <div class="row mt-3 Vees-1 text-white justify-content-between ">

                                                <div class="p-2">
                                                        <ol class="breadcrumb bg-white float-right mt-2">
                                                                <li class="text-info mr-1">Establecimientos <i> |</i> </li>
                                                                <li class="text-info mr-1">Activos<i> |</i> </li>
                                                                <li class="text-secondary"> Editar </li>
                                                        </ol>
                                                </div>

                                        </div>
                                </div>
                                <?php if (!empty($this->session->flashdata('errordb'))) { ?>
                                        <div class="alert alert-danger" role="alert">
                                                hubo un error intente de nuevo
                                        </div>
                                <?php } ?>
                                <form action="<?php echo base_url() ?>Ees" method="POST">

                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Nombre :</label>
                                                        <input type="text" class="form-control" name="nombre" placeholder="Ingresa Nombre del Establecimiento" value="<?php echo $establecimiento->Est_nombre ?>" required="true">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Calle :</label>
                                                        <input type="text" class="form-control" name="calle" placeholder="Ingrese  Calle del Establecimiento" value="<?php echo $establecimiento->Est_calle ?>" required="true">

                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Número Exterior:</label>
                                                        <input type="number" step="1" max="999" min="1" class="form-control" name="ne" placeholder="Ingrese Número Exterior del establecimiento" required="true" value="<?php echo $establecimiento->Est_numero_exterior  ?>">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Número Telefónico: formato (XXX-XXX-XXXX)</label>
                                                        <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control" name="numerot" value="<?php echo $establecimiento->Est_telefono_fijo ?>" placeholder="Número Telefónico" required="true">
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Municipio :</label>
                                                        <input type="text" class="form-control" name="lugar" placeholder="Ingrese el lugar del establecimiento" required="true" value="<?php echo $establecimiento->Est_lugar ?>">
                                                </div>
                                                <div class="col">
                                                        <label class="col-form-label">Código Postal :</label>
                                                        <input type="text" maxlength="5" class="form-control" name="cp" placeholder="Ingrese el codigo postal" value="<?php echo $establecimiento->Est_codigo_postal ?>">
                                                </div>
                                        </div>

                                        <div class="form-row">
                                                <div class="col">
                                                        <label class="col-form-label">Correo Electrónico:</label>
                                                        <input type="email" class="form-control" name="email" value="<?php echo $establecimiento->Est_correo_electronico ?>" placeholder="Email" required="true">
                                                </div>
                                                <div class="col">
                                                        <input type="hidden" value="<?php echo $establecimiento->Id_establecimiento ?>" required="true" name="id_est">

                                                </div>

                                        </div>
                                        <div class="form-group">
                                                <label for="exampleFormControlSelect2" class="col-form-label">Tipos de Proceso: </label>

                                                <br>

                                                <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="reproduccion" id="reproduccion" onclick="Reproduccion()" value="">
                                                        <label class="form-check-label"> Reproduccion </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="crianza" id="crianza" onclick="Crianza()" value="">
                                                        <label class="form-check-label"> Crianza </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="engorda" id="engorda" onclick="Engorda()" value="">
                                                        <label class="form-check-label"> Engorda </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="tpv" id="tpv" onclick="Tpv()" value="">
                                                        <label class="form-check-label"> Transportador de pescado vivo </label>
                                                </div>

                                                <div class="form-group form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="procesador" id="procesador" onclick="Procesador()" value="">
                                                        <label class="form-check-label"> Procesador </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="tya" id="tya" onclick="Tya()" value="">
                                                        <label class="form-check-label"> Transportista y almacenista </label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="cym" id="cym" onclick="Cym()" value="">
                                                        <label class="form-check-label"> comerciante y mayorista </label>
                                                </div>
                                        </div>


                                        <!-- <div class="form-group">
                                                <label for="exampleFormControlSelect2">Tipos de Procesos</label>
                                                <select multiple class="form-control" disabled id="exampleFormControlSelect2">
                                                        <?php if (!empty($tipos)) {
                                                                foreach ($tipos as $tipo) {
                                                                        switch ($tipo->Tipo_establecimiento) {
                                                                                case 1:
                                                        ?>
                                                                                        <option>Reproducción</option>
                                                                                <?php
                                                                                        break;
                                                                                case 2:
                                                                                ?>
                                                                                        <option>Crianza</option>
                                                                                <?php
                                                                                        break;
                                                                                case 3:
                                                                                ?>
                                                                                        <option>Engorda</option>
                                                                                <?php
                                                                                        break;
                                                                                case 4:
                                                                                ?>
                                                                                        <option>Transportador de pescado vivo</option>
                                                                                <?php
                                                                                        break;
                                                                                case 5:
                                                                                ?>
                                                                                        <option>Procesador</option>
                                                                                <?php
                                                                                        break;
                                                                                case 6:
                                                                                ?>
                                                                                        <option> Transportista y almacenista </option>
                                                                                <?php
                                                                                        break;
                                                                                case 7:
                                                                                ?>
                                                                                        <option>Comerciante y Mayorista </option>
                                                        <?php
                                                                                        break;
                                                                        }
                                                                }
                                                        }
                                                        ?>

                                                </select>
                                        </div> -->


                                        <div class="row justify-content-end">
                                                <div class="p-2 ml-5">
                                                        <a data-toggle="tooltip" data-placement="top" title="Regresar" href="<?php echo base_url() ?>Vpe" class="btn btn-outline-secondary ml-5">
                                                                <span class="fas fa-arrow-alt-circle-left"></span>
                                                        </a>
                                                </div>
                                                <div class="p-2 ml-5">
                                                        <button data-toggle="tooltip" data-placement="top" title="Guardar Cambios" type="submit" class="btn btn-outline-secondary mr-5 ml-5">
                                                                <span class="fas fa-check"></span>
                                                        </button>
                                                </div>
                                        </div>


                                </form>
                        </div>
                </div>
        </section>
</div>

<script>
        $("#reproduccion").val("0")
        $("#crianza").val("0")
        $("#engorda").val("0")
        $("#tpv").val("0")
        $("#procesador").val("0")
        $("#tya").val("0")
        $("#cym").val("0")

        function Reproduccion() {
                var x = document.getElementById("reproduccion").checked;
                if (x) {
                        $("#reproduccion").val("1")
                        //  console.log("seleccionado")
                } else {
                        $("#reproduccion").val("0")
                        // console.log("descartado")
                }
        }

        function Crianza() {
                var x = document.getElementById("crianza").checked;
                if (x) {
                        $("#crianza").val("1")
                        //  console.log("seleccionado")
                } else {
                        $("#crianza").val("0")
                        // console.log("descartado")
                }
        }

        function Engorda() {
                var x = document.getElementById("engorda").checked;
                if (x) {
                        $("#engorda").val("1")
                        //  console.log("seleccionado")
                } else {
                        $("#engorda").val("0")
                        // console.log("descartado")
                }
        }

        function Tpv() {
                var x = document.getElementById("tpv").checked;
                if (x) {
                        $("#tpv").val("1")
                        //  console.log("seleccionado")
                } else {
                        $("#tpv").val("0")
                        // console.log("descartado")
                }
        }

        function Procesador() {
                var x = document.getElementById("procesador").checked;
                if (x) {
                        $("#procesador").val("1")
                        //  console.log("seleccionado")
                } else {
                        $("#procesador").val("0")
                        // console.log("descartado")
                }
        }

        function Tya() {
                var x = document.getElementById("tya").checked;
                if (x) {
                        $("#tya").val("1")
                        //  console.log("seleccionado")
                } else {
                        $("#tya").val("0")
                        // console.log("descartado")
                }
        }

        function Cym() {
                var x = document.getElementById("cym").checked;
                if (x) {
                        $("#cym").val("1")
                        //  console.log("seleccionado")
                } else {
                        $("#cym").val("0")
                        // console.log("descartado")
                }
        }

        <?php if (!empty($tipos)) {
                foreach ($tipos as $tipo) {
                        switch ($tipo->Tipo_establecimiento) {
                                case 1:
        ?>
                                        $("#reproduccion").click();
                                <?php
                                        break;
                                case 2:
                                ?>
                                        $("#crianza").click();
                                <?php
                                        break;
                                case 3:
                                ?>
                                        $("#engorda").click();
                                <?php
                                        break;
                                case 4:
                                ?>
                                        $("#tpv").click();
                                <?php
                                        break;
                                case 5:
                                ?>
                                        $("#procesador").click();
                                <?php
                                        break;
                                case 6:
                                ?>
                                        $("#tya").click();
                                <?php
                                        break;
                                case 7:
                                ?>
                                        $("#cym").click();
        <?php
                                        break;
                        }
                }
        }
        ?>
</script>