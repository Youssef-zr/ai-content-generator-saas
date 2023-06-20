<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ url($siteSetting->favicon) }}" alt="AdminLTE Logo"
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
                @permission('access_dashboard')
                    <li class="nav-item">
                        <a href="{{ route('dashboard.statistics') }}"
                            class="nav-link {{ active_dashboard_item('dashboard') }}">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                @endpermission
                <!-- Categories -->
                @permission('access_category')
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link {{ activeSideLink('categories') }}">
                            <i class="nav-icon fa fa-tags"></i>
                            <p>
                                Categories
                            </p>
                        </a>
                    </li>
                @endpermission

                <!-- Questions -->
                @permission('access_question')
                    <li class="nav-item">
                        <a href="{{ route('questions.index') }}" class="nav-link {{ activeSideLink('questions') }}">
                            <i class="nav-icon fa fa-question-circle-o"></i>
                            <p>
                                Questions
                            </p>
                        </a>
                    </li>
                @endpermission

                <!-- Tones -->
                @permission('access_tone')
                    <li class="nav-item">
                        <a href="{{ route('tones.index') }}" class="nav-link {{ activeSideLink('tones') }}">
                            <i class="nav-icon fas fa-music"></i>
                            <p>
                                Tones
                            </p>
                        </a>
                    </li>
                @endpermission

                <!-- Engines -->
                @permission('access_engine')
                    <li class="nav-item">
                        <a href="{{ route('engines.index') }}" class="nav-link {{ activeSideLink('engines') }}">
                            <i class="nav-icon fas fa-pencil-ruler"></i>
                            <p>
                                Engines
                            </p>
                        </a>
                    </li>
                @endpermission

                <!-- languages -->
                @permission('access_language')
                    <li class="nav-item">
                        <a href="{{ route('languages.index') }}" class="nav-link {{ activeSideLink('languages') }}">
                            <i class="nav-icon fa fa-globe"></i>
                            <p>
                                Languages
                            </p>
                        </a>
                    </li>
                @endpermission

                <!-- prompts -->
                @permission('access_prompt')
                    <li class="nav-item">
                        <a href="{{ route('prompts.index') }}" class="nav-link {{ activeSideLink('prompts') }}">
                            <i class="nav-icon fa fa-keyboard-o"></i>
                            <p>
                                Prompts
                            </p>
                        </a>
                    </li>
                @endpermission

                <!-- subscriptions managments -->
                @permission('access_subscription_management')
                    <li class="nav-item {{ active_menu('subscriptions')[0] }}">
                        <a href="#" class="nav-link subscriptions {{ active_menu('subscriptions')[1] }}"
                            data-toggle="tooltip" title="Subscription Managment">
                            <i class="nav-icon fa fa-paper-plane-o"></i>
                            <p>
                                Subscriptions
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <!-- plans access -->
                            @permission('access_plan')
                                <li class="nav-item">
                                    <a href="{{ route('plans.index') }}"
                                        class="nav-link {{ setActive('subscriptions/plans', 'active') }}">
                                        <i class="fas fa-cubes nav-icon"></i>
                                        <p>Plans</p>
                                    </a>
                                </li>
                            @endpermission

                            <!-- subscriptions access -->
                            @permission('access_subscription_management')
                                <li class="nav-item">
                                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                        <i class="fas fa-archive nav-icon"></i>
                                        <p>Subscriptions</p>
                                    </a>
                                </li>
                            @endpermission
                        </ul>
                    </li>
                @endpermission

                <!-- settings -->
                @permission('access_settings')
                    <li class="nav-item {{ active_menu('settings')[0] }}">
                        <a href="#" class="nav-link {{ active_menu('settings')[1] }}" data-toggle="tooltip">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                Settings
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <!-- brand access -->
                            @permission('access_brand')
                                <li class="nav-item">
                                    <a href="{{ route('settings.brand_show') }}"
                                        class="nav-link {{ setActive('brand', 'active') }}">
                                        <i class="fas fa-palette nav-icon"></i>
                                        <p>Brand</p>
                                    </a>
                                </li>
                            @endpermission

                            <!-- third_party access -->
                            @permission('access_third_party')
                                <li class="nav-item">
                                    <a href="{{ route('settings.third_party_show') }}"
                                        class="nav-link {{ setActive('third-parties', 'active') }}">
                                        <i class="fas fa-cog nav-icon"></i>
                                        <p>Third Party</p>
                                    </a>
                                </li>
                            @endpermission

                            <!-- content access -->
                            @permission('access_content')
                                <li class="nav-item">
                                    <a href="{{ route('settings.content_show') }}"
                                        class="nav-link {{ setActive('content', 'active') }}">
                                        <i class="fa fa-file nav-icon"></i>
                                        <p>Content</p>
                                    </a>
                                </li>
                            @endpermission
                        </ul>
                    </li>
                @endpermission

                <!-- customize -->
                @permission('access_customize')
                    <li class="nav-item {{ active_menu('customize')[0] }}">
                        <a href="#" class="nav-link {{ active_menu('customize')[1] }}" data-toggle="tooltip">
                            <i class="nav-icon fa fa-paint-brush"></i>
                            <p>
                                Customize
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <!-- landing page access -->
                            @permission('access_landing_page')
                                <li class="nav-item">
                                    <a href="{{ route('customize.landing_page_show') }}"
                                        class="nav-link {{ setActive('landing-page', 'active') }}">
                                        <i class="fas fa-file nav-icon"></i>
                                        <p>Landing Page</p>
                                    </a>
                                </li>
                            @endpermission

                            <!-- hero access -->
                            @permission('access_hero')
                                <li class="nav-item">
                                    <a href="{{ route('customize.hero_show') }}"
                                        class="nav-link {{ setActive('hero', 'active') }}">
                                        <i class="fas fa-magic nav-icon"></i>
                                        <p>Hero</p>
                                    </a>
                                </li>
                            @endpermission

                            <!-- partners access -->
                            @permission('access_partner')
                                <li class="nav-item">
                                    <a href="{{ route('partners.index') }}"
                                        class="nav-link  {{ setActive('partners', 'active') }}">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Partners</p>
                                    </a>
                                </li>
                            @endpermission

                            <!-- story access -->
                            @permission('access_story')
                                <li class="nav-item">
                                    <a href="{{ route('customize.story_show') }}"
                                        class="nav-link {{ setActive('story', 'active') }}">
                                        <i class="fas fa-book nav-icon"></i>
                                        <p>Story</p>
                                    </a>
                                </li>
                            @endpermission

                            <!-- block access -->
                            @permission('access_block')
                                <li class="nav-item">
                                    <a href="{{ route('blocks.index') }}"
                                        class="nav-link {{ setActive('blocks', 'active') }}">
                                        <i class="fas fa-th-large nav-icon"></i>
                                        <p>Blocks</p>
                                    </a>
                                </li>
                            @endpermission

                            <!-- pricing access -->
                            @permission('access_pricing')
                                <li class="nav-item">
                                    <a href="{{ route('customize.pricing_show') }}"
                                        class="nav-link {{ setActive('pricing', 'active') }}">
                                        <i class="fa fa-money nav-icon"></i>
                                        <p>Pricing</p>
                                    </a>
                                </li>
                            @endpermission

                            <!-- testimonial access -->
                            @permission('access_testimonial')
                                <li class="nav-item">
                                    <a href="{{ route('customize.testimonial_show') }}"
                                        class="nav-link {{ setActive('testimonial', 'active') }}">
                                        <i class="fa fa-comments nav-icon"></i>
                                        <p>Testimonial</p>
                                    </a>
                                </li>
                            @endpermission
                        </ul>
                    </li>
                @endpermission

                <!-- user managments -->
                @permission('access_user')
                    <li
                        class="nav-item {{ active_menu('users')[0] }} {{ active_menu('roles')[0] }} {{ active_menu('permissions')[0] }}">
                        <a href="#"
                            class="nav-link {{ active_menu('users')[1] }} {{ active_menu('roles')[1] }}  {{ active_menu('permissions')[1] }}">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                User Managment
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <!-- access permission -->
                            @permission('access_permission')
                                <li class="nav-item">
                                    <a href="{{ route('permissions.index') }}"
                                        class="nav-link {{ setActive('permissions', 'active') }}">
                                        <i class="fas fa-unlock-alt nav-icon"></i>
                                        <p>Permissions</p>
                                    </a>
                                </li>
                            @endpermission

                            <!-- access role -->
                            @permission('access_role')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}"
                                        class="nav-link {{ setActive('roles', 'active') }}">
                                        <i class="fas fa-briefcase nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                            @endpermission

                            <!-- access user -->
                            @permission('access_user')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}"
                                        class="nav-link {{ setActive('users', 'active') }}">
                                        <i class="fa fa-user nav-icon"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                            @endpermission

                            <!-- access audit_log -->
                            @permission('access_audit_log')
                                <li class="nav-item">
                                    <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                        <i class="fas fa-file-alt nav-icon"></i>
                                        <p>Audit Logs</p>
                                    </a>
                                </li>
                            @endpermission

                        </ul>
                    </li>
                @endpermission

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
