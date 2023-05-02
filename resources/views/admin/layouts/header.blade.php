<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    {{ Html::style('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}

    <!-- Font Awesome -->
    {{ Html::style('adminLte/plugins/fontawesome-free/css/all.min.css') }}
    {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}
    {{-- noty source --}}
    {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css') }}
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js') }}
    <!-- iCheck -->
    {{ Html::style('adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}
    <!-- Theme style -->
    {{ Html::style('adminLte/dist/css/adminlte.min.css') }}
    <!-- overlayScrollbars -->
    {{ Html::style('adminLte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}
    <!-- datatables -->
    {{ Html::style('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css') }}
    {{ Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css') }}
    {{ Html::style('https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css') }}

    <!-- dashboard stylesheet  -->
    {{ Html::style('css/dashboard.css') }}

    <!-- custom stylesheet  -->
    @stack('css')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('admin.layouts.navigation')
