<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard Inventory POS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
          <div class="wrapper">

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

                <!-- Messages Dropdown Menu -->
              
                <!-- Notifications Dropdown Menu -->
                

                <li class="dropdown user user-menu">
                      <!-- Menu Toggle Button -->
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="../dist/img/yo.jpg" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">
                          <?php
                              echo $_SESSION['name']
                          ?>
                        </span>
                      </a>
                      <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                          <img src="dist/img/yo.jpg" class="img-circle" alt="User Image">

                          <p>
                          <?php
                              echo $_SESSION['name']
                          ?>
                            <small>Member since Nov. 2023</small>
                          </p>
                        </li>
                        <!-- Menu Body -->
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                          <div class="float-left">
                            <a href="changePassword.php" class="btn btn-default btn-flat">Change Password</a>
                          </div>
                          <div class="float-right">
                            <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                          </div>
                        </li>
                      </ul>
                    </li>
              
              
                <li class="nav-item">
                  <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                  </a>
                </li>
              </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
              <!-- Brand Logo -->
              <a href="index3.html" class="brand-link">
                <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Inventory POS</span>
              </a>

              <!-- Sidebar -->
              <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                    <img src="../dist/img/yo.jpg" class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                    <a href="#" class="d-block">
                          <?php
                              echo $_SESSION['name']
                          ?>
                    </a>
                  </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                  <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                      <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                      <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Admin Options
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="dashboard.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="category.php" class="nav-link">
                            <i class="far fa-list-alt nav-icon"></i>
                            <p>Category</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="registration.php" class="nav-link">
                            <i class="far fa-registered nav-icon"></i>
                            <p>Registration</p>
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


          
