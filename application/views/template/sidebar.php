<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">

      <span class="brand-text font-weight-light">AdminLTE 3</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">

         </div>
         <div class="info">
         </div>
      </div>
      <?php
      $currentUrl = $this->uri->segment(1);
      $directory_info = '';
      switch ($currentUrl) {

         case 'DirectoryInfo':
            $directory_info = 'active';
            break;

         default:
            # code...
            break;
      }
      ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
               <a href="<?php echo base_url('index.php/DirectoryInfo') ?>" class="nav-link <?php echo $directory_info; ?>">
                  <i class="nav-icon fas "></i>
                  <p>
                     Directory Info
                     <i class="right "></i>
                  </p>
               </a>
               <a href="<?php echo base_url('index.php/Welcome/logout') ?>" class="nav-link ">
                  <i class="nav-icon fas "></i>
                  <p>
                     Logout
                     <i class="right "></i>
                  </p>
               </a>
            </li>

         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>