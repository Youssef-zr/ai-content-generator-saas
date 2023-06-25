   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
       <!-- Left navbar links -->
       <ul class="navbar-nav">
           <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
           </li>
       </ul>

       <!-- Right navbar links -->
       <ul class="navbar-nav ml-auto">
           <!-- Buy Now Link fiverr -->
           <li class="nav-item ms-md-4 mr-5">
               <a class="nav-link btn btn-success text-white" target="_blank"
                   href="https://www.fiverr.com/dev_youssef/create-your-own-ai-blog-writing-social-media-content-email-marketing-using-gpt3">
                   <img src="{{ url('assets/site/images/fiverr-icon.png') }}" alt=""> Buy Now
               </a>
           </li>

           <!-- Settings -->
           <li class="nav-item dropdown">
               <a class="nav-link" data-toggle="dropdown" href="#">
                   <i class="fa fa-user" data-toggle="tooltip" title="profile"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                   <a href="{{ route('user.show_profile') }}" class="dropdown-item">
                       <i class="fa fa-user-o"></i> Profile
                   </a>
                   <div class="dropdown-divider"></div>
                   <a href="{{ route('user.subscription') }}" class="dropdown-item">
                       <i class="fa fa-pencil-square-o"></i> Subscription
                   </a>
                   <div class="dropdown-divider"></div>
                   <a href="{{ route('user.payments') }}" class="dropdown-item">
                       <i class="fa fa-credit-card-alt"></i> Payments
                   </a>
                   <div class="dropdown-divider"></div>
                   <a href="{{ route('user.show_settings') }}" class="dropdown-item">
                       <i class="fa fa-cogs"></i> Settings
                   </a>
                   <div class="dropdown-divider"></div>
                   <a href="{{ route('user.logout') }}" class="dropdown-item">
                       <i class="fa fa-sign-out"></i> Logout
                   </a>
               </div>
           </li>

           <!-- Full screnn button -->
           <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                   <i class="fas fa-expand-arrows-alt"></i>
               </a>
           </li>
       </ul>
   </nav>
   <!-- /.navbar -->
