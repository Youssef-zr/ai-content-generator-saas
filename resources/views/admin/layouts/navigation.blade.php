   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
       <!-- Left navbar links -->
       <ul class="navbar-nav">
           <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
           </li>
           <li class="nav-item d-none d-sm-inline-block">
               <a href="index3.html" class="nav-link">Home</a>
           </li>
           <li class="nav-item d-none d-sm-inline-block">
               <a href="#" class="nav-link">Contact</a>
           </li>
       </ul>

       <!-- Right navbar links -->
       <ul class="navbar-nav ml-auto">
           <!-- Messages Dropdown Menu -->
           <li class="nav-item dropdown">
               <a class="nav-link" data-toggle="dropdown" href="#">
                   <i class="fa fa-user" data-toggle="tooltip" title="profile"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                   <a href="{{ route('user.show_profile') }}" class="dropdown-item">
                       <i class="fa fa-user-o"></i> Profile
                   </a>
                   <div class="dropdown-divider"></div>
                   <a href="{{ route('user.show_profile') }}" class="dropdown-item">
                       <i class="fa fa-cogs"></i> Settings
                   </a>
                   <div class="dropdown-divider"></div>

                   <a href="{{ route('user.logout') }}" class="dropdown-item">
                       <i class="fa fa-sign-out"></i> Logout
                   </a>
               </div>
           </li>

           <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                   <i class="fas fa-expand-arrows-alt"></i>
               </a>
           </li>
       </ul>
   </nav>
   <!-- /.navbar -->
