</div>
</div>
<footer class="main-footer">
  <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.2
    <!-- <?php if ($this->uri->segment(2)=='ccategoria') { echo "test"; }?> -->
    <!-- <?php echo "test2"; ?> -->
  </div>
</footer>

</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!-- <script src="<?php echo base_url();?>assets/plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="<?php echo base_url();?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url();?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url();?>assets/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<!-- datatables -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- <script src="<?php echo base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script> -->
<!-- <script src="<?php echo base_url();?>assets/plugins/datatablesjquery.dataTables.js"></script> -->

<!-- select selectpicker -->
<script src="<?php echo base_url();?>assets/plugins/select2alt/bootstrap-select.min.js"></script>
<!-- <script src="<?php echo base_url();?>assets/plugins/select2/js/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/select2/js/select2.js"></script>
<script src="<?php echo base_url();?>assets/plugins/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/select2/js/select2.full.js"></script> -->

<!-- lightbox -->
<!-- <script src="<?php echo base_url();?>assets/plugins/lightbox/dist/css/lightbox-plus-jquery.min.js"></script> -->




<!-- script del proyecto -->
<?php if ($this->uri->segment(1)=='cpersona') {  ?>
  <script src="<?php echo base_url();?>js/persona.js"></script>
<?php  }?>

<?php if ($this->uri->segment(1)=='cnotas') {  ?>
  <script src="<?php echo base_url();?>js/notas.js"></script>
<?php  }?>

<?php if ($this->uri->segment(1)=='cciudad') {  ?>
  <script src="<?php echo base_url();?>js/ciudad.js"></script>
<?php  }?>

<script type="text/javascript">
  $(document).ready(function(){
    $('#example1').DataTable({
      "language":{
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar registros",
        "info": "Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar: ",
        "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": " Siguiente",
          "previous": "Anterior "
        },

      },
      "scrollX": true

    });

  })

</script>

<!-- <script type="text/javascript">

  $(function () {
    $("#example1").DataTable();
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // });
  });

</script> -->




</body>
</html>
