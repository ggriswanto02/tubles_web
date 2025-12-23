<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 d-flex flex-column" id="sidenav-main">
  <div class="w-100 sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
      <img src="<?= base_url('img/logo-ct-dark.png') ?>" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">Web Ban Tubles</span>
    </a>
  </div>

  <hr class="horizontal dark mt-0">
  <div class="w-100 flex-grow-1" id="sidenav-collapse-main">
    <ul class="navbar-nav">

      <!-- USER INFO -->
      <li class="nav-item mb-2">
        <div class="nav-link d-flex align-items-center">
          <div
            class="icon icon-shape icon-sm border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-white text-sm"></i>
          </div>

          <div class="d-flex flex-column">
            <span class="nav-link-text text-sm fw-bold">
              <?= esc(session()->get('name')) ?>
            </span>
            <span class="badge bg-gradient-success badge-sm text-uppercase mt-1"
              style="width: fit-content;">
              <?= esc(session()->get('role')) ?>
            </span>
          </div>
        </div>
      </li>

      <hr class="horizontal dark my-2">


      <!-- DASHBOARD -->
      <li class="nav-item">
        <a class="nav-link <?= uri_string() === 'dashboard' ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
          <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-shop text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>

      <!-- TABLES DROPDOWN -->
      <?php
      $activeTables = [
        'rencana-pembelajaran',
        'nilai-pertemuan-mahasiswa',
        'korelasi-cpl-cpmk',
        'capaian-lulusan'
      ];
      ?>

      <li class="nav-item" id="tablesDropdown">
        <a class="nav-link <?= in_array(uri_string(), $activeTables) ? 'active' : '' ?>"
          href="javascript:void(0)">
          <div
            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Tables</span>
          <i class="fas fa-chevron-down ms-auto text-xs"></i>
        </a>

        <ul class="dropdown-menu border-0 shadow-none">
          <li>
            <a class="dropdown-item nav-link <?= uri_string() === 'rencana-pembelajaran' ? 'active' : '' ?>" href="<?= base_url('rencana-pembelajaran') ?>">
              Rencana Pembelajaran
            </a>
          </li>
          <li>
            <a class="dropdown-item nav-link <?= uri_string() === 'nilai-pertemuan-mahasiswa' ? 'active' : '' ?>" href="<?= base_url('nilai-pertemuan-mahasiswa') ?>">
              Nilai Pertemuan
            </a>
          </li>
          <li>
            <a class="dropdown-item nav-link <?= uri_string() === 'korelasi-cpl-cpmk' ? 'active' : '' ?>" href="<?= base_url('korelasi-cpl-cpmk') ?>">
              Korelasi CPL–CPMK
            </a>
          </li>
          <li>
            <a class="dropdown-item nav-link <?= uri_string() === 'capaian-lulusan' ? 'active' : '' ?>" href="<?= base_url('capaian-lulusan') ?>">
              Capaian Lulusan
            </a>
          </li>
        </ul>
      </li>

      <!-- ROLE BASED MENU -->
      <?php if (session()->get('role') === 'admin'): ?>
        <li class="nav-item mt-2">
          <a class="nav-link" href="<?= base_url('user-management') ?>">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-settings text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">User Management</span>
          </a>
        </li>
      <?php endif; ?>

    </ul>
  </div>
  <div class="sidenav-footer mx-3 mt-4">
    <a href="<?= base_url('logout') ?>" class="w-100 btn bg-gradient-danger w-100">
      Logout
    </a>
  </div>

  <script>
    // Handle dropdown toggle without using Bootstrap button
    document.getElementById('tablesDropdown').addEventListener('click', function() {
      const dropdownMenu = this.querySelector('.dropdown-menu');
      dropdownMenu.classList.toggle('show');

      const chevronIcon = this.querySelector('.fa-chevron-down');
      chevronIcon.classList.toggle('fa-chevron-up');
    });
  </script>
  </div>
</aside>