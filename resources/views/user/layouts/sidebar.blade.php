<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" target="_blank" class="brand-link">
        <img src="{{ url($siteSetting->favicon) }}" alt="{{ $siteSetting->site_title }}"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $siteSetting->site_title }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->image_path }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('user.show_profile') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <!-- dashboard -->
                <li class="nav-header">Dashboard</li>
                <!-- library -->
                <li class="nav-item">
                    <a href="{{ route('user.home') }}"
                        class="nav-link {{ request()->segment(2) === null ? 'active' : '' }}">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Library
                        </p>
                    </a>
                </li>

                <!-- history -->
                <li class="nav-item">
                    <a href="{{ route('user.history') }}"
                        class="nav-link {{ setActiveFront('/user/history', 'active') }}">
                        <i class="nav-icon fa fa-history"></i>
                        <p>
                            History
                        </p>
                    </a>
                </li>

                <!-- textTools -->
                <li class="nav-header">Tools</li>
                @foreach ($textTools as $category)
                    <li class="nav-item nav-container">
                        <a href="#" class="nav-link subscriptions d-flex">
                            <i class="nav-icon fa fa-file-o" style="margin-top: 4px"></i>
                            <p>
                                {{ $category->title }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @foreach ($category->prompts as $prompt)
                                <li class="nav-item">
                                    <a href="{{ userUrl('content/new?category=' . $category->id . '&prompt=' . $prompt->id) }}"
                                        class="tool-nav-link nav-link {{ setActiveFront('/user/content/new?category=' . $category->id . '&prompt=' . $prompt->id, 'active') }}"
                                        data-parent="#toolContent-{{ $category->id }}">
                                        <i class="fas fa-chevron-right nav-icon"></i>
                                        <p>{{ $prompt->title }}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach

                <!-- imageTools -->
                @foreach ($imageTools as $category)
                    <li class="nav-item nav-container">
                        <a href="#" class="nav-link subscriptions d-flex">
                            <i class="nav-icon fa fa-image" style="margin-top: 5px"></i>
                            <p>
                                {{ $category->title }}
                                <i class="fas fa-angle-left right"></i>
                                <span @class(['bg-primary ml-3 py-1 px-2 rounded'])>New</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @foreach ($category->prompts as $prompt)
                                <li class="nav-item">
                                    <a href="{{ userUrl('content/new?category=' . $category->id . '&prompt=' . $prompt->id) }}"
                                        class="tool-nav-link nav-link {{ setActiveFront('/user/content/new?category=' . $category->id . '&prompt=' . $prompt->id, 'active') }}"
                                        data-parent="#toolContent-{{ $category->id }}">
                                        <i class="fas fa-chevron-right nav-icon"></i>
                                        <p>{{ $prompt->title }}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                <!-- dashboard -->
                <li class="nav-header">Subscription</li>
                <!-- library -->
                <li class="nav-item">
                    <a href="{{ route('user.subscription') }}"
                        class="nav-link  {{ setActiveFront('/user/subscription', 'active') }}">
                        <i class="nav-icon fa fa-info-circle"></i>
                        <p>
                            Subscription Overview
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
