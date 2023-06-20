</div>

<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }} <a href="{{ url('/') }}" target="_blank">{{ $siteSetting->site_title }}</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> {{ $siteSetting->version }}
    </div>
</footer>

<!-- jQuery -->
{{ Html::script('adminLte/plugins/jquery/jquery.min.js') }}
<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<!-- Bootstrap 4 -->
{{ Html::script('adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}
<!-- daterangepicker -->
{{ Html::script('adminLte/plugins/moment/moment.min.js') }}
{{ Html::script('adminLte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}
<!-- overlayScrollbars -->
{{ Html::script('adminLte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}
<!-- AdminLTE App -->
{{ Html::script('adminLte/dist/js/adminlte.js') }}
<!-- datatables  -->
{{ Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') }}
{{ Html::script('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js') }}
{{ Html::script('https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js') }}
{{ Html::script('https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js') }}
{{ Html::script('https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js') }}
{{ Html::script('https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js') }}
{{ Html::script('https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js') }}
{{ Html::script('https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js') }}
{{ Html::script('https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js') }}
<!-- dashboard script  -->
{{ Html::script('js/dashboard.js') }}

<!-- custom javascript -->
@stack('javascript')
</body>

</html>
