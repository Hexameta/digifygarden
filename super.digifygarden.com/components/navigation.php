
<!-- navigaton bar-->
<?php
function navigationBar($username){
?>
<header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>D</b>G</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Digify</b>Garden</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- Notifications: style can be found in dropdown.less -->
              
              <!-- Tasks: style can be found in dropdown.less -->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image" />
                  <span class="hidden-xs"><?php echo $username?></span>
                </a>
                <ul class="dropdown-menu" style="width: 113px; ">
                  <!-- User image -->
            
                  <li class="user-footer" style="background-color: #ecf0f5" >
                    <div class="pull-right">
                      <a href="../logout.php" class="btn btn-danger btn-flat" style="width: 160%; margin-left: -64%;">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <?php } ?>

<!-- sidebar-->
      <?php 
 function sidebar($active,$username){
?>
<section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $username ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> admin</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php if($active == 'dashboard'){?>
              <li class="active">
            <?php }else {?>
            <li >
            <?php } ?>
              <a href="dashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
           

            <li class="treeview">
            
              <a href="collagemanagement.php">
                <i class="fa fa-users"></i>
                <span>College Management</span>
              </a>
            </li>
            <li class="treeview">
              <a href="clgtreeview.php">
                <i class="fa fa-users"></i>
                <span>Tree View</span>
              </a>
            </li>
            <li class="treeview">
              <a href="log.php">
                <i class="fa fa-history"></i>
                <span>Scanning Log</span>
              </a>
            </li>
           
            <li class="aboutpage">
              <a href="aboutpage.php">
                <i class="fa fa-users"></i>
                <span>About Page</span>
              </a>
            </li>
           
          </ul>
        </section>
    <?php } ?>