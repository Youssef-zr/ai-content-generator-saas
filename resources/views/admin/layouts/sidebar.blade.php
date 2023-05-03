<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ url('adminLte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('adminLte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-tags"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('questions.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-question-circle-o"></i>
                        <p>
                            Questions
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tones.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-music"></i>
                        <p>
                            Tones
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('engines.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-pencil-ruler"></i>
                        <p>
                            Engines
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('languages.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-question-circle-o"></i>
                        <p>
                            Languages
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('prompts.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-keyboard-o"></i>
                        <p>
                            Prompts
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="tooltip" title="Subscription Managment">
                        <i class="nav-icon fa fa-paper-plane-o"></i>
                        <p>
                            Subscriptions
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('plans.index') }}" class="nav-link">
                                <i class="fas fa-cubes nav-icon"></i>
                                <p>Plans</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="fas fa-archive nav-icon"></i>
                                <p>subscriptions</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            User Managment
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="fas fa-unlock-alt nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="fas fa-briefcase nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/boxed.html" class="nav-link">
                                <i class="fa fa-user nav-icon"></i>
                                <p>users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                <i class="fas fa-file-alt nav-icon"></i>
                                <p>Audit Logs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-topnav.html" class="nav-link">
                                <i class="fas fa-key nav-icon"></i>
                                <p>change Password</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
