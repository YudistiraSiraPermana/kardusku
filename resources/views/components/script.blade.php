<!-- jQuery -->
<script src={{asset("assets/plugins/jquery/jquery.min.js")}}></script>
<!-- jQuery UI 1.11.4 -->
<script src={{asset("assets/plugins/jquery-ui/jquery-ui.min.js")}}></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src={{asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
<!-- ChartJS -->
<script src={{asset("assets/plugins/chart.js/Chart.min.js")}}></script>
<!-- Sparkline -->
<script src={{asset("assets/plugins/sparklines/sparkline.js")}}></script>
<!-- JQVMap -->
<script src={{asset("assets/plugins/jqvmap/jquery.vmap.min.js")}}></script>
<script src={{asset("assets/plugins/jqvmap/maps/jquery.vmap.usa.js")}}></script>
<!-- jQuery Knob Chart -->
<script src={{asset("assets/plugins/jquery-knob/jquery.knob.min.js")}}></script>
<!-- daterangepicker -->
<script src={{asset("assets/plugins/moment/moment.min.js")}}></script>
<script src={{asset("assets/plugins/daterangepicker/daterangepicker.js")}}></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src={{asset("assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}></script>
<!-- Summernote -->
<script src={{asset("assets/plugins/summernote/summernote-bs4.min.js")}}></script>
<!-- overlayScrollbars -->
<script src={{asset("assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}></script>
<!-- AdminLTE App -->
<script src={{asset("assets/dist/js/adminlte.js")}}></script>
{{-- <!-- AdminLTE for demo purposes -->
<script src={{asset("assets/dist/js/demo.js")}}></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src={{asset("assets/dist/js/pages/dashboard.js")}}></script>

<!-- DataTables  & Plugins -->
<script src={{asset("assets/plugins/datatables/jquery.dataTables.min.js")}}></script>
<script src={{asset("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}></script>
<script src={{asset("assets/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}></script>
<script src={{asset("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}></script>
<script src={{asset("assets/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}></script>
<script src={{asset("assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}></script>
<script src={{asset("assets/plugins/jszip/jszip.min.js")}}></script>
<script src={{asset("assets/plugins/pdfmake/pdfmake.min.js")}}></script>
<script src={{asset("assets/plugins/pdfmake/vfs_fonts.js")}}></script>
<script src={{asset("assets/plugins/datatables-buttons/js/buttons.html5.min.js")}}></script>
<script src={{asset("assets/plugins/datatables-buttons/js/buttons.print.min.js")}}></script>
<script src={{asset("assets/plugins/datatables-buttons/js/buttons.colVis.min.js")}}></script>
{{-- Scanner --}}
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script src={{asset("assets/plugins/scanner/scan.js")}}></script>

<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    $('#reservationdate2').datetimepicker({
        format: 'L'
    });
</script>
{{-- PWA --}}
<script src="{{ asset('/sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>