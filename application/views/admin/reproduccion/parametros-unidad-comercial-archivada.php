<div class="content-wrapper" id="contenido">
    <section class="content">
        <div class="mt-2 ml-1 mr-1">
            <div class="box-body">
                <div class="container-fluid Vparc-1">
                    <div class="row mt-3 Vparc-1 text-white justify-content-first ">

                        <div class="p-2">
                            <ol class="breadcrumb bg-white float-right mt-2">
                                <li class="text-info active mr-1">Reproductores <i>|</i></li>
                                <li class="text-info active mr-1">Unidades Enviadas <i> |</i></li>
                                <li class="text-info mr-1">Histórico <i>|</i></li>
                                <li class="text-info mr-1"><?php echo $id_ul[0]->Ue_identificador_unico_logistico ?> <i>|</i></li>
                                <li class="text-info mr-1"><?php echo $uc->Rep_identificador_unico ?> <i>|</i></li>
                                <li class="text-secondary">Parametros Fisico-Químicos</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card text-center border-info">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a data-toggle="tooltip" data-placement="top" title="Reproductores" class="nav-link active" href="<?php echo base_url() ?>Uc" type="button" id="reproduccion">
                                    <span class="fas fa-venus-mars"></span> </a>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a data-toggle="tooltip" data-placement="top" title="Hormonado" class="nav-link " href="<?php echo base_url() ?>Uccr" type="button">
                                    <span class="Vparc-2 fas fa-baby-carriage"></span> </a>
                            </li>
                            <li class="nav-item ">
                                <a data-toggle="tooltip" data-placement="top" title="Engorda" class="nav-link " href="<?php echo base_url() ?>Uen" type="button">
                                    <span class="Vparc-2 fas fa-user-graduate"></span> </a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-first">

                            <div class="p-2">
                                <a data-toggle="tooltip" data-placement="top" title="Regresar" class="btn btn-outline-secondary" href="<?php echo base_url() ?>Vularch/<?php echo $id_ul[0]->Id_unidad_enviada  ?>" type="button">
                                    <span class="fas fa-arrow-alt-circle-left">
                                    </span> <span class="fas fa-archive">  </a>
                            </div>
                            <div class="p-2">

                                <select class="form-control" id="select23">
                                    <option value="1">todo</option>
                                    <option value="2">solo un dia</option>
                                    <option value="3">intervalo dias</option>
                                </select>
                            </div>
                            <div class="p-2" id="infecha">


                            </div>
                            <div class="p-2" id="infecha2">


                            </div>
                            <div class="p-2" id="infecha3">


                            </div>
                            <div class="p-2" id="btnfil">


                            </div>


                        </div>

                        <p class="text-center font-weight-bold"><?php echo $uc->Tnq_nombre ?></p>
                        <div class="row">
                            <div class="col-md-12 col-sm-12  mt-4">

                                <canvas id="Temperatura" class="chart-container" style="position: relative; height:40vh; width:80vw"></canvas>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script>
    var datef = [<?php if (!empty($tanques)) {
                        foreach ($tanques as $tanque) {
                    ?>
                <?php echo '\'' . date("d/m/Y g:i A", strtotime($tanque->Psq_fecha_hora)) . '\',' ?>
        <?php

                        }
                    }
        ?>
    ]
    var temp = [<?php if (!empty($tanques)) {
                    foreach ($tanques as $tanque) {
                ?>
                <?php echo $tanque->Psq_temperatura . ',' ?>
        <?php

                    }
                }
        ?>
    ]
    var ox = [<?php if (!empty($tanques)) {
                    foreach ($tanques as $tanque) {
                ?>
                <?php echo $tanque->Psq_oxigeno . ',' ?>
        <?php

                    }
                }
        ?>
    ]
    var sal = [<?php if (!empty($tanques)) {
                    foreach ($tanques as $tanque) {
                ?>
                <?php echo $tanque->Psq_salinidad . ',' ?>
        <?php

                    }
                }
        ?>
    ]
    var ph = [<?php if (!empty($tanques)) {
                    foreach ($tanques as $tanque) {
                ?>
                <?php echo $tanque->Psq_ph . ',' ?>
        <?php

                    }
                }
        ?>
    ]
    var datef2 = datef
    var ox2 = ox
    var sal2 = sal
    var ph2 = ph
    var temp2 = temp


    var ctx = document.getElementById('Temperatura');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: datef2,
            datasets: [{
                label: 'Temperatura',
                data: temp2,

                borderColor: [
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }, {
                label: 'oxigeno',
                data: ox2,
                backgroundColor: ['rgba(0, 0, 0, 0.1)'],
                borderColor: [
                    'rgba( 171, 175, 67 )'
                ],
                borderWidth: 1
            }, {
                label: 'Salinidad',
                data: sal2,

                borderColor: [
                    'rgba(67, 175, 68)'
                ],
                borderWidth: 1
            }, {
                label: 'Ph',
                data: ph2,

                borderColor: [
                    'rgba(67, 142, 175)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var fecha1
    var fecha2
    var fecha3
    var d
    $('#select23').change(function() {
        if (this.value == 1) {
            $('#infecha').empty();
            $('#infecha2').empty();
            $('#infecha3').empty();
            $('#btnfil').empty();
            datef2 = []
            ox2 = []
            sal2 = []
            ph2 = []
            temp2 = []

            datef2 = datef
            ox2 = ox
            sal2 = sal
            ph2 = ph
            temp2 = temp
            myChart.data.labels = datef2
            myChart.data.datasets[0].data = temp2
            myChart.data.datasets[1].data = ox2
            myChart.data.datasets[2].data = sal2
            myChart.data.datasets[3].data = ph2
            myChart.update();
        } else if (this.value == 2) {
            $('#infecha').empty();
            $('#infecha2').empty();
            $('#infecha3').empty();
            $('#btnfil').empty();
            $('#infecha').append("<input type=\"date\" id=\"dia\" class=\"form-control\" >");

            $('#dia').change(function() {

                let paramFecha = this.value.split("-");
                let fechai = paramFecha[2] + "/" + paramFecha[1] + "/" + paramFecha[0];
                datef2 = []
                ox2 = []
                sal2 = []
                ph2 = []
                temp2 = []

                for (var i = 0; i < datef.length; i++) {
                    // var f1= new Date(datef[i].substring(0,10))
                    // var f2= new Date(fechai)
                    // var f3= new Date(fechaf)

                    if (datef[i].substring(0, 10) == fechai) {
                        datef2.push(datef[i])
                        temp2.push(temp[i])
                        ox2.push(ox[i])
                        sal2.push(sal[i])
                        ph2.push(ph[i])

                    }
                    // console.log( datef[i].substring(0,10))
                }
                myChart.data.labels = datef2
                myChart.data.datasets[0].data = temp2
                myChart.data.datasets[1].data = ox2
                myChart.data.datasets[2].data = sal2
                myChart.data.datasets[3].data = ph2


                myChart.update();
            })

        } else if (this.value == 3) {
            $('#infecha').empty();

            $('#infecha').append("<input type=\"date\" id=\"diai\" class=\"form-control\" >");
            $('#infecha2').append("<p class=\"font-weight-bold\"> - </p>");
            $('#infecha3').append("<input type=\"date\" id=\"diaf\" class=\"form-control\" >");
            $('#btnfil').append("<a type=\"button\" id=\"filter\" class=\"btn btn-outline-secondary mr-5 ml-5\" > <span class=\"fas fa-check\"></span></a>");
            $('#diai').change(function() {
                d = new Date(this.value)
                d.setDate(d.getDate() + 1);
                // console.log(d.toISOString().substring(0,10))
                $("#diaf").attr("min", d.toISOString().substring(0, 10));

            })
            $('#diaf').change(function() {

                fecha2 = new Date(this.value)
                fecha2.setDate(fecha2.getDate() + 1);
                // console.log(fecha2)

            })
            $('#filter').click(function() {
                datef2 = []
                ox2 = []
                sal2 = []
                ph2 = []
                temp2 = []
                let nuevaf
                let nuevaf2
                for (var i = 0; i < datef.length; i++) {
                    // var f1= new Date(datef[i].substring(0,10))
                    // var f2= new Date(fechai)
                    nuevaf = datef[i].substring(0, 10).split("/")
                    nuevaf2 = nuevaf[2] + "-" + nuevaf[1] + "-" + nuevaf[0];
                    fecha3 = new Date(nuevaf2)
                    fecha3.setDate(fecha3.getDate() + 1);
                    // console.log(fecha3)
                    if (fecha3.getTime() >= d.getTime()) {
                        var bandera = 1
                    }
                    if (bandera == 1 && fecha3.getTime() <= fecha2.getTime()) {
                        datef2.push(datef[i])
                        temp2.push(temp[i])
                        ox2.push(ox[i])
                        sal2.push(sal[i])
                        ph2.push(ph[i])
                        // console.log("sdsad")
                        bandera = 2
                    }
                    // console.log( datef[i].substring(0,10))
                }
                myChart.data.labels = datef2
                myChart.data.datasets[0].data = temp2
                myChart.data.datasets[1].data = ox2
                myChart.data.datasets[2].data = sal2
                myChart.data.datasets[3].data = ph2
                // console.log(datef2)

                myChart.update();
            })
        }


    })



    // temp = [12, 23.323, 3, 5, 54];
    // myChart.data.datasets[0].data = temp;
    // myChart.update();

    // console.log(myChart.data.datasets[0])
    // console.log(temp[0])
</script>