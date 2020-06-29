    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="padding-top: 20px;">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <img src="/template/img/ctf.png" style="padding-right: 20px; width: 180px;">
        </div>
        <div class="row">
          <!-- <div class="sidebar-brand-text mx-3" style="color: #fff;">Nyok <sup></sup>CTF</div> -->
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" style="padding-top: 30px;">

      <?php if ($_SESSION['id_level'] == 1): ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a style="<?= $active === 'dashboard_admin' ? 'background-color: white; color:#0ca4eb' : false?>" class="nav-link" href="<?= url('admin')?>">
            <i style="<?= $active === 'dashboard_admin' ? 'background-color: white; color:#0ca4eb' : false?>" class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a style="<?= $active === 'master_data_challange' ? 'background-color: white; color:#0ca4eb' : false?>" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i style="<?= $active === 'master_data_challange' ? 'background-color: white; color:#0ca4eb' : false?>" class="fas fa-fw fa-wrench"></i>
            <span>Master Data Challange</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
              <a class="collapse-item" href="<?= url('admin/ctf-category')?>">Kategori CTF</a>
              <a class="collapse-item" href="<?= url('admin/add-challange')?>">Add Challange</a>
            </div>
          </div>
        </li>

        <li class="nav-item">
          <a style="<?= $active === 'add_pengumuman' ? 'background-color: white; color:#0ca4eb' : false ?>" class="nav-link" href="<?= url('admin/add-pengumuman')?>">
            <i style="<?= $active === 'add_pengumuman' ? 'background-color: white; color:#0ca4eb' : false ?>" class="fas fa-fw fa-envelope"></i>
            <span>Pengumuman</span>
          </a>
        </li>
        <li class="nav-item">
          <a style="<?= $active === 'management' ? 'background-color: white; color:#0ca4eb' : false ?>" class="nav-link" href="<?= url('admin/management-user')?>">
            <i style="<?= $active === 'management' ? 'background-color: white; color:#0ca4eb' : false ?>" class="fas fa-fw fa-users"></i>
            <span>Management User</span>
          </a>
        </li>
        <li class="nav-item">
          <a style="<?= $active === 'settings' ? 'background-color: white; color:#0ca4eb' : false ?>" class="nav-link" href="<?= url('admin/settings')?>">
            <i style="<?= $active === 'settings' ? 'background-color: white; color:#0ca4eb' : false ?>" class="fas fa-fw fa-user"></i>
            <span>Settings Profile</span>
          </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
      <?php elseif ($_SESSION['id_level'] == 2): ?>

        <li class="nav-item">
          <a style="<?= $active === 'dashboard_user' ? 'background-color: white; color:#0ca4eb' : false?>" class="nav-link" href="<?= url('users')?>">
            <i style="<?= $active === 'dashboard_user' ? 'background-color: white; color:#0ca4eb' : false?>" class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li  class="nav-item">
          <a style="<?= $active === 'challange' ? 'background-color: white; color:#0ca4eb' : false?>" class="nav-link" href="<?= url('users/challange')?>">
            <i style="<?= $active === 'challange' ? 'background-color: white; color:#0ca4eb' : false?>" class="fas fa-fw fa-tasks"></i>
            <span>Challange</span>
          </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a style="<?= $active === 'scoreboard' ? 'background-color: white; color:#0ca4eb' : false?>" class="nav-link" href="<?= url('users/scoreboard')?>">
            <i style="<?= $active === 'scoreboard' ? 'background-color: white; color:#0ca4eb' : false?>" class="fas fa-fw fa-trophy"></i>
            <span>Scoreboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a style="<?= $active === 'profile' ? 'background-color: white; color:#0ca4eb' : false?>" class="nav-link" href="<?= url('users/profile')?>">
            <i style="<?= $active === 'profile' ? 'background-color: white; color:#0ca4eb' : false?>" class="fas fa-fw fa-user"></i>
            <span>Profile</span>
          </a>
        </li>

        <li class="nav-item">
          <a style="<?= $active === 'notif' ? 'background-color: white; color:#0ca4eb' : false?>" class="nav-link" href="<?= url('users/notification')?>">
            <i style="<?= $active === 'notif' ? 'background-color: white; color:#0ca4eb' : false?>" class="fas fa-fw fa-envelope"></i>
            <span>Notification</span>
          </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
      <?php endif ?>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->