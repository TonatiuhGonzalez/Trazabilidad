 <!-- /.content-wrapper -->
 <footer class="main-footer">

   <!-- <strong>ACUICOLA MARIA DEL CARMEN &copy; 2020 .</strong> sanbuenaventura308@yahoo.com -->
   <strong>ACUICOLA MARIA DEL CARMEN &copy; 2020 .</strong> sanbuenaventura308@yahoo.com
   <div class="float-right d-none d-sm-block">
     <b>Versión</b> 1.0
   </div>
 </footer>

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->
 </div>

 <div class="modal fade" id="cambiar">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" id="exit" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="form-group">
           <label class="col-form-label">Contraseña nueva:</label>
           <input type="password" class="form-control" id="c1" required="true">

         </div>
         <div class="form-group">
           <label class="col-form-label">Repetir contraseña nueva:</label>
           <input type="password" class="form-control" id="c2" required="true">

         </div>
       </div>
       <div class="modal-footer">
         <div class="row justify-content-around">
           <div class="p-2">
             <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Cerrar</button>
           </div>

           <div class="p-2">
             <button type="button" class="btn btn-danger text-white" id="cambiar2">Cambiar</button>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>



 <!-- datetimepicker -->

 <!-- ./wrapper -->


 <!-- Bootstrap 4 -->
 <script src="<?php echo base_url() ?>dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="<?php echo base_url() ?>dist/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- DataTables -->
 <script src="<?php echo base_url() ?>dist/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url() ?>dist/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="<?php echo base_url() ?>dist/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="<?php echo base_url() ?>dist/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <!-- ChartJS -->
 <script src="<?php echo base_url() ?>dist/plugins/chart.js/Chart.min.js"></script>
 <!-- AdminLTE App -->
 <script src="<?php echo base_url() ?>dist/js/adminlte.min.js"></script>

 <!-- AdminLTE for demo purposes -->
 <script src="<?php echo base_url() ?>dist/js/demo.js"></script>

 <script>
   var baseurl = "<?php echo base_url() ?>";
 </script>






 <!-- page script -->
 <script type="text/javascript">
   //data table-------------------------------------------------------------------------------------
   $("#table").DataTable({
     "responsive": true,
     "autoWidth": false,
     "language": {
       "lengthMenu": "Mostrar _MENU_ registros por pagina",
       "zeroRecords": "No se encontraron resultados en su busqueda",
       "searchPlaceholder": "Buscar registros",
       "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
       "infoEmpty": "No existen registros",
       "infoFiltered": "(filtrado de un total de _MAX_ registros)",
       "search": "Buscar:",
       "paginate": {
         "first": "Primero",
         "last": "Último",
         "next": "Siguiente",
         "previous": "Anterior"
       },
     }
   });
   //---------------------------------------------------------------------------------------------------
  //  $(document).ready(function() {
  //    //--------------mostrar etiquetas crianza----------------------------------------
  //    $("#btnreproductores").mouseover(function() {
  //      $("#rep2").append('<span id="rep" class="rounded text-white border nav-link bg-info" >Reproductores</span> ');
  //    })
  //    $("#btnreproductores").mouseout(function() {
  //      $("#rep").remove();
  //    });
  //    //  //--------------mostrar etiquetas crianza----------------------------------------
  //    $("#btncrianza").mouseover(function() {
  //      $("#cri2").append('<span id="cri" class="rounded text-white border nav-link bg-info" >Hormonado</span> ');
  //    })
  //    $("#btncrianza").mouseout(function() {
  //      $("#cri").remove();
  //    });
  //    //--------------mostrar etiquetas engorda----------------------------------------
  //    $("#btnengorda").mouseover(function() {
  //      $("#en2").append('<span id="en" class="rounded text-white border nav-link bg-info"> Engorda  </span>');
  //    })
  //    $("#btnengorda").mouseout(function() {
  //      $("#en").remove();
  //    });
  //    // //--------------mostrar etiquetas nueva unidad----------------------------------------
  //    $("#btnaur").mouseover(function() {

  //      $("#aur2").append('<span id="aur"  class=" text-white bg-info rounded nav-link "> Nueva Unidad  </span>');

  //    })
  //    $("#btnaur").mouseout(function() {
  //      $("#aur").remove();

  //    });
  //    // //--------------mostrar etiquetas unidades enviadas----------------------------------------
  //    $("#btnue").mouseover(function() {

  //      $("#ue2").append('<span id="ue"  class=" text-white bg-info rounded nav-link "> Unidades Enviadas  </span>');

  //    })
  //    $("#btnue").mouseout(function() {
  //      $("#ue").remove();
  //    });
  //    // //--------------mostrar etiquetas unidades enviadas----------------------------------------
  //    $("#limp").mouseover(function() {

  //      $("#limp2").append('<span id="li"  class=" text-white bg-info rounded nav-link "> Unidades Enviadas  </span>');
  //      console.log("dadsd")
  //    })
  //    $("#limp2").mouseout(function() {
  //      $("#li").remove();
  //    });

    
     //  $(".limp").hover(
     //    function() {
     //      $("#limp2").append('<h4 id="li"  class=" text-white bg-info rounded nav-link "> Limpieza  </h4>');
     //      console.log("dadsd");
     //    },
     //    function() {
     //      $("#li").remove();
     //    }
     //  );
     // //--------------mostrar etiquetas parametros fisicoquimicos----------------------------------------
  //    $("#btnpfq").mouseover(function() {
  //      $("#pfq2").append('<h4 id="pfq"> Parametros Agua  </h4>');
  //      console.log("dsadasd")
  //    });
  //    $("#btnpfq").mouseout(function() {
  //      $("#pfq").remove();

  //    });
  //    // //--------------mostrar etiquetas parametros fisicoquimicos----------------------------------------
  //    $("#btnregistrar").mouseover(function() {
  //      $("#reg").append('<span id="pfq" class=" text-white bg-info" > Parametros Agua  </span>');

  //    })
  //    $("#btnregistrar").mouseout(function() {
  //      $("#pfq").remove();

  //    });

  //  });
   // ----------------------------------------------------------------------------------------------------
   // $('.eli').click(function(){
   //   var id= $(this).val();
   //   console.log(id);
   //     $.ajax({
   //         url:baseurl+"Eu",
   //         type:"post",
   //         data:{
   //                 'id':id                 
   //             },
   //         success: function (data){
   //                 if(data=="ok"){                

   //                   // $('#exampleModal').modal('show');
   //                   // setTimeout(location.reload() ,20000);
   //                   alert("se elimino de forma correcta");
   //                   location.reload();
   //                 }


   //             }
   //         })
   // });
   $('.elisocio').click(function() {
     var id = $(this).val();
     //console.log(id);
     $.ajax({
       url: baseurl + "Els",
       type: "post",
       data: {
         'id': id
       },
       success: function(data) {
         if (data == "ok") {
           alert("se archivo de forma correcta");
           location.reload();
         } else {
           alert("algo salio mal intente de nuevo");
         }


       }
     })

   });

   $('#exit').click(function() {
     $('#c1').val('')
     $('#c2').val('')
   });

   $('#close').click(function() {
     $('#c1').val('')
     $('#c2').val('')
   });

   $('#cambiar2').click(function() {

     if ($('#c1').val() == $('#c2').val() && $('#c1').val() != '' && $('#c2').val() != '') {
       var nc = $('#c1').val();
       $.ajax({
         url: baseurl + "Cac",
         type: "post",
         data: {
           'id': <?php echo $this->session->userdata('id_usuario') ?>,
           'nc': nc
         },
         success: function(data) {
           if (data == "ok") {
             alert("Contraseñas cambiadas correctamente.");
             location.reload();
           } else {
             alert("Algo salio mal intente de nuevo");
           }


         }
       })
       $('#c1').val('')
       $('#c2').val('')
       $('#cambiar').modal('hide');


     } else if ($('#c1').val() != $('#c2').val()) {
       alert('Las contraseñas no coinciden')

     } else if ($('#c1').val() == '' && $('#c2').val() == '') {
       alert('Llena los espacios vacíos')
     }
   });
 </script>
 <script>
   var url = "<?php echo $this->uri->segment(1) ?>";

   if (url == "Ru" || url == "Av" || url == "Viu" || url == "Veu" || url == "Hu" || url == "Vrea") {
     $('#administracion2').addClass('active');
   } else if (url == "Ta" || url == "At" || url == "Vtd" || url == "Veta") {
     $('#tanques2').addClass('active');
   } else if (url == "Sr" || url == "Vas" || url == "Vvs" || url == "Ves" || url == "Hs" || url == "Vrs") {
     $('#socios2').addClass('active');
   } else if (url == "Al") {
     $('#almacen').addClass('active');
     $('#alimento').addClass('active');
   } else if (url == "Alme") {
     $('#almacen').addClass('active');
     $('#medico').addClass('active');
   } else if (url == "Uc") {
     $('#unidad').addClass('active');
     $('#reproduccion').addClass('active');
   } else if (url == "Aal" || url == 'almd' || url == 'edalm' || url == 'Vmed' || url == 'Emed' || url == 'Alam' || url == "Vaarch" || url == "Vmarch") {
     $('#almacen').addClass('active');
   } else if (url == "Tpfq") {
     $('#unidad').addClass('active');
     $('#auto').addClass('active');
   } else if (url == "Tpfqm") {
     $('#unidad').addClass('active');
     $('#manual').addClass('active');
   } else if (url == "Uccr" || url == 'Vgurc' || url == "Vgurcd") {
     $('#unidad').addClass('active');
     $('#crianza').addClass('active');
   } else if (url == "Tpfqg" || url == 'Tlg' || url == 'Taalm' || url == 'Venf' || url == 'Vgtr' ||
     url == 'aalm' || url == 'Tl' || url == 'Vafee' || url == 'Vuard' || url == 'Venvurg' || url == "Venarc" || url == "Vlimarc" ||
     url == "Vaarc" || url == "Vparc" || url == "Vtratarc" || url == "Vaur" || url == "Venvur" || url == "Vularc" ||
     url == "Vularch" || url == "Vvenf" || url == "Veenf" || url == "Vatr" || url == "Vafte" || url == "Vaenf" ||
     url == "Vaucl" || url == "Vaucom" || url == "Vaurc" || url == "Vvurcd" || url == "Vvurc" || url == "Veurc" ||
     url == "Vauclc" || url == "Vueac" || url == "Vaul" || url == "Vvula" || url == "Veula" || url == "Vulacr" ||
     url == "Vvueacr" || url == "Vuarc" || url == "Vpac" || url == "Vlimpc" || url == "Vac" || url == "Venc" ||
     url == "Vtrenc" || url == "Uen" || url == "Vauce" || url == "Vure" || url == "Vaure" || url == "Vurae" ||
     url == "Vvurearc" || url == "Vvure" || url == "Veure" || url == "Vunle" || url == "Vaunle" || url == "Vulearc" ||
     url == "Vvulearc" || url == "Vaucle" || url == "Vvunle" || url == "Veunle" || url == "Veucle" || url == "Vpucear" ||
     url == "Vlucear" || url == "Vaucear" || url == "Venfucear" || url == "Vtratucear" || url == "Vucearc" || url == "Vula" ||
     url == "Vela" || url == "Vafd" || url == "Vftce" || url == "Vftle" || url == "Vftlc" || url == "Vftcc" || url == "Vtul" || url == "Vtrs" ||
     url == "Vctuc" || url == "Vht") {
     $('#unidad').addClass('active');
   } else if (url == 'Vpe' || url == "Vaes" || url == "Vees") {
     $('#establecimiento').addClass('active');
   }


// ----  funcion para habilitar el tooltip de boostrap---------------------------------
$(function() {
       $('[data-toggle="tooltip"]').tooltip()
     })

// --------------------evitar envio de formulario mas de una vez----------------------------------------
     $('input:submit').click( function() { this.disabled = true } ); 
 
 </script>


 </body>

 </html>