 <div class="row">
     <div class="col-md-12">
         <div class="card">
             <div class="card-body">





                 <span style="text-align:center">

                     &copy;<?= date('Y') ?> Parking System Version 2.00 Designed and Developed by <a href="https://www.nugsoft.com">Nugsoft Technologies</a>
                 </span>

             </div>


             <!-- All Jquery -->
             <!-- ============================================================== -->
             <script src="assets/libs/jquery/dist/jquery.min.js"></script>
             <!-- Bootstrap tether Core JavaScript -->
             <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
             <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
             <!-- slimscrollbar scrollbar JavaScript -->
             <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
             <script src="assets/extra-libs/sparkline/sparkline.js"></script>
             <!--Wave Effects -->
             <script src="dist/js/waves.js"></script>
             <!--Menu sidebar -->
             <script src="dist/js/sidebarmenu.js"></script>
             <!--Custom JavaScript -->
             <script src="dist/js/custom.min.js"></script>
             <!-- this page js -->
             <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
             <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
             <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
             <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
             <script src="assets/libs/select2/dist/js/select2.min.js"></script>
             <script>
                 /****************************************
                  *       Basic Table                   *
                  ****************************************/
                 $('#zero_config').DataTable();
             </script>


         </div>
     </div>
 </div>
 </div>
 <script>
     $(".select2").select2();

     /*colorpicker*/
     $('.demo').each(function() {

         //
         $(this).minicolors({
             control: $(this).attr('data-control') || 'hue',
             position: $(this).attr('data-position') || 'bottom left',

             change: function(value, opacity) {
                 if (!value) return;
                 if (opacity) value += ', ' + opacity;
                 if (typeof console === 'object') {
                     console.log(value);
                 }
             },
             theme: 'bootstrap'
         });

     });
     /*datwpicker*/
     jQuery('.mydatepicker').datepicker();
     jQuery('#datepicker-autoclose').datepicker({
         autoclose: true,
         todayHighlight: true
     });
     var quill = new Quill('#editor', {
         theme: 'snow'
     });
 </script>
 </body>

 </html>