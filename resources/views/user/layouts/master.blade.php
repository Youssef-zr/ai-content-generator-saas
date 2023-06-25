@include('user.layouts.header')

<!-- Main Sidebar Container -->
@include('user.layouts.sidebar')

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

@include('user.layouts.footer')

<!-- messages -->
@include('_partial._messages')
