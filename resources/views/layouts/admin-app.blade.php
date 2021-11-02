<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    @if(isset($title)) {{$title}} @else {{SITE_NAME}} @endif
    </title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dashboard/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('ckeditor/sample/styles.css')}}">
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
      </div>
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('dashboard')}}" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>
          <li class="nav-item @if($activePage == 'charge') active @endif">
            <a class="nav-link" href="{{route('charge.index')}}"><i class="fas fa-cog"></i>Charge Setup</a>
          </li>
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="{{asset('dashboard/dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="{{asset('dashboard/dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="{{asset('dashboard/dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();
              ">
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('dashboard')}}" class="brand-link">
          <img src="{{asset('dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">{{SITE_NAME}}</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{asset('dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
          </div>
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link @if($activePage == 'dashboard') active @endif">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('setting.index')}}" class="nav-link @if($activePage == 'setting') active @endif">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    Site Setting
                  </p>
                </a>
              </li>
              <li class="nav-item @if(isset($page)) @if($page == 'category') menu-is-opening menu-open @endif @endif">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Destination Category
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('category.create')}}" class="nav-link @if($activePage== 'category_create') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('category.index')}}" class="nav-link @if($activePage== 'category_list') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item @if(isset($page)) @if($page == 'destination') menu-is-opening menu-open @endif @endif">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Destination
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('destination.create')}}" class="nav-link @if($activePage== 'destination_create') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('destination.index')}}" class="nav-link  @if($activePage== 'destination_list') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>
               <li class="nav-item @if(isset($page)) @if($page == 'activity') menu-is-opening menu-open @endif @endif">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tree"></i>
                  <p>
                   Activity
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('activity.create')}}" class="nav-link @if($activePage== 'activity_create') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('activity.index')}}" class="nav-link @if($activePage== 'activity_list') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item @if(isset($page)) @if($page == 'package_category') menu-is-opening menu-open @endif @endif">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tree"></i>
                  <p>
                    Package Category
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('package_category.create')}}" class="nav-link @if($activePage== 'package_category_create') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('package_category.index')}}" class="nav-link @if($activePage== 'package_category_list') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item @if(isset($page)) @if($page == 'package') menu-is-opening menu-open @endif @endif">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Package
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('package.create')}}" class="nav-link @if($activePage== 'package_create') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('package.index')}}" class="nav-link @if($activePage== 'package_list') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-header">OTHERS</li>
              <li class="nav-item @if(isset($page)) @if($page == 'member') menu-is-opening menu-open @endif @endif">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Members
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('member.create')}}" class="nav-link @if($activePage== 'member_create') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('member.index')}}" class="nav-link @if($activePage== 'member_list') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item @if(isset($page)) @if($page == 'testimonial') menu-is-opening menu-open @endif @endif">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Testimonial
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('testimonial.create')}}" class="nav-link @if($activePage== 'testimonial_create') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('testimonial.index')}}" class="nav-link @if($activePage== 'testimonial_list') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>
               <li class="nav-item @if(isset($page)) @if($page == 'blog') menu-is-opening menu-open @endif @endif">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Blog
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('blog.create')}}" class="nav-link @if($activePage== 'blog_create') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('blog.index')}}" class="nav-link @if($activePage== 'blog_list') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item @if(isset($page)) @if($page == 'faq') menu-is-opening menu-open @endif @endif">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    FAQ
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('faq.create')}}" class="nav-link @if($activePage== 'faq_create') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Create</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('faq.index')}}" class="nav-link @if($activePage== 'faq_list') active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List</p>
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
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    {{Breadcrumbs::render()}}
                  </ol>
                  </div><!-- /.col -->
                  </div><!-- /.row -->
                  </div><!-- /.container-fluid -->
                </div>
                
                @yield('content')
              </div>
              <footer class="main-footer">
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                  <b>Version</b> 3.2.0-rc
                </div>
              </footer>
              <!-- Control Sidebar -->
              <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
              </aside>
              <!-- /.control-sidebar -->
            </div>
            <!-- ./wrapper -->
            <!-- jQuery -->
            <script src="{{asset('dashboard/plugins/jquery/jquery.min.js')}}"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="{{asset('dashboard/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
            $.widget.bridge('uibutton', $.ui.button)
            </script>
            <!-- Bootstrap 4 -->
            <script src="{{asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
            <!-- ChartJS -->
            <script src="{{asset('dashboard/plugins/chart.js/Chart.min.js')}}"></script>
            <!-- Sparkline -->
            <script src="{{asset('dashboard/plugins/sparklines/sparkline.js')}}"></script>
            <!-- JQVMap -->
            <script src="{{asset('dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
            <script src="{{asset('dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
            <!-- jQuery Knob Chart -->
            <script src="{{asset('dashboard/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
            <!-- daterangepicker -->
            <script src="{{asset('dashboard/plugins/moment/moment.min.js')}}"></script>
            <script src="{{asset('dashboard/plugins/daterangepicker/daterangepicker.js')}}"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="{{asset('dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
            <!-- Summernote -->
            <script src="{{asset('dashboard/plugins/summernote/summernote-bs4.min.js')}}"></script>
            <!-- overlayScrollbars -->
            <script src="{{asset('dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
            <!-- AdminLTE App -->
            <script src="{{asset('dashboard/dist/js/adminlte.js')}}"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="{{asset('dashboard/dist/js/demo.js')}}"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="{{asset('dashboard/dist/js/pages/dashboard.js')}}"></script>
            <!-- <script src="{{asset('dashboard/js/demo/chart-area-demo.js')}}"></script> -->
            <script src="{{asset('dashboard/js/demo/chart-pie-demo.js')}}"></script>
            <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
            <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
            <script src="{{asset('ckeditor/build/ckeditor.js')}}"></script>
            <script src="{{asset('js/custom.js')}}"></script>
            {!! Toastr::render() !!}
            @stack('js')
          </body>
        </html>