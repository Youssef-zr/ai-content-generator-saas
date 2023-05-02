@include('admin.layouts.header')

<!-- Main Sidebar Container -->
@include('admin.layouts.sidebar')

<div class="content-wrapper px-2">
    <!-- breadcrumb -->
    @yield('breadcrumb')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>
</div>

@include('admin.layouts.footer')

<!-- messages -->
@include('_partial._messages')
