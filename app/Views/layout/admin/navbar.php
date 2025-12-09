<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="<?= base_url('img/logo-ct-dark.png') ?>" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Web Ban Tubles</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="w-auto" id="sidenav-collapse-main ">
      <ul class="navbar-nav bg-gray-100" >

        <li class="nav-item">
          <a class="nav-link " href="<?= base_url('dashboard') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-shop text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <li class="nav-item" id="tablesDropdown">
        <a class="nav-link" href="#">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Tables</span>
          <i class="fas fa-chevron-down ms-auto"></i>
        </a>
        <ul class="dropdown-menu bg-gray-100" aria-labelledby="tablesDropdown" >
          <li><a class="dropdown-item" href="<?= base_url('rpl') ?>">Capain Lulusan</a></li>
          <li><a class="dropdown-item" href="<?= base_url('rpl') ?>">Rencana Pembelajaran</a></li>
          <li><a class="dropdown-item" href="<?= base_url('rpl') ?>">Korelasi CPL–CPMK</a></li>
          <li><a class="dropdown-item" href="<?= base_url('rpl') ?>">Nilai Pertemuan</a></li>
        </ul>
      </li>
    </ul>
</div>
<div class="sidenav-footer">
<hr class="horizontal dark mt-3">
  <div class="card card-plain shadow-none" id="sidenavCard">
    <div class="card-body p-3 w-100 pt-0 d-flex ">
      <a class="nav-link" href="<?= base_url('logout') ?>">
        <div class="icon icon-shape icon-sm border-radius-md">
          <i class="ni ni-ui-04 text-primary text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text">Logout</span>
      </a>
    </div>
  </div>
</div>



  <script>
    // Handle dropdown toggle without using Bootstrap button
    document.getElementById('tablesDropdown').addEventListener('click', function () {
      const dropdownMenu = this.querySelector('.dropdown-menu');
      dropdownMenu.classList.toggle('show');

      const chevronIcon = this.querySelector('.fa-chevron-down');
    chevronIcon.classList.toggle('fa-chevron-up');
    });
  </script>
  </div>
</aside>
