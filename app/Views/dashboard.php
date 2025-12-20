<?= $this->extend('layout/admin/layout') ?>

<?= $this->section('content') ?>

<main class="main-content position-relative border-radius-lg">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <!-- <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li> -->
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
        </ol>
        <!-- <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6> -->
      </nav>
      <!-- <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        </div>
      </div> -->
    </div>
  </nav>
  <!-- End Navbar -->

  <div class="container-fluid py-4">
    <!-- Statistics Cards Row -->
    <!-- <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Pengguna</p>
                  <h5 class="font-weight-bolder mb-0">
                    1,284
                    <span class="text-success text-sm font-weight-bolder">+12%</span>
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                  <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Data Masuk Hari Ini</p>
                  <h5 class="font-weight-bolder mb-0">
                    342
                    <span class="text-success text-sm font-weight-bolder">+8%</span>
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                  <i class="ni ni-chart-bar-32 text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Transaksi</p>
                  <h5 class="font-weight-bolder mb-0">
                    2,456
                    <span class="text-danger text-sm font-weight-bolder">-3%</span>
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Pengguna Aktif</p>
                  <h5 class="font-weight-bolder mb-0">
                    892
                    <span class="text-success text-sm font-weight-bolder">+15%</span>
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                  <i class="ni ni-satisfied text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Chart and Carousel Row -->
    <div class="row">
      <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
          <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="text-capitalize">Diagram Data Masuk</h6>
            <p class="text-sm mb-0">
              <i class="fa fa-arrow-up text-success"></i>
              <span class="font-weight-bold">92% lebih</span> di 2023 kemarin.
            </p>
          </div>
          <div class="card-body p-3">
            <div class="chart-container" style="position: relative; height: 300px; width: 100%;">
              <img src="<?= base_url() ?>img/diagram.png" alt="Data Chart" style="width: 100%; height: 100%; object-fit: contain;">
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="card card-carousel overflow-hidden h-100 p-0">
          <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
            <div class="carousel-inner border-radius-lg h-100">
              <div class="carousel-item h-100 active" style="background-image: url('img/carousel-1.jpg'); background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-hat-3 text-dark opacity-10"></i>
                  </div>
                  <h5 class="text-white mb-1">TUGAS BESAR PABW</h5>
                  <p class="text-white-75">Kelompok 1 - Pengembangan Aplikasi Berbasis Web</p>
                </div>
              </div>

              <div class="carousel-item h-100" style="background-image: url('img/carousel-2.jpg'); background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-satisfied text-dark opacity-10"></i>
                  </div>
                  <h5 class="text-white mb-1">Anggota Kelompok</h5>
                  <p class="text-white-75">Agung Riswanto & Irsyad Fakhruddin</p>
                </div>
              </div>

              <div class="carousel-item h-100" style="background-image: url('img/carousel-3.jpg'); background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-circle-08 text-dark opacity-10"></i>
                  </div>
                  <h5 class="text-white mb-1">Anggota Kelompok</h5>
                  <p class="text-white-75">Aditiya Hermawan & Deska Bagas Setiawan</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Team Info Card -->
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <i class="ni ni-badge text-primary text-lg me-2"></i>
              <h6 class="mb-0">Informasi Tim - Kelompok 1</h6>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm bg-gradient-primary shadow text-center border-radius-md me-3">
                    <i class="ni ni-single-02 text-white text-lg opacity-10"></i>
                  </div>
                  <div>
                    <h6 class="mb-0 text-sm">Agung Riswanto</h6>
                    <p class="text-xs text-secondary mb-0">Ketua Kelompok</p>
                  </div>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm bg-gradient-info shadow text-center border-radius-md me-3">
                    <i class="ni ni-single-02 text-white text-lg opacity-10"></i>
                  </div>
                  <div>
                    <h6 class="mb-0 text-sm">Irsyad Fakhruddin</h6>
                    <p class="text-xs text-secondary mb-0">Anggota</p>
                  </div>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm bg-gradient-success shadow text-center border-radius-md me-3">
                    <i class="ni ni-single-02 text-white text-lg opacity-10"></i>
                  </div>
                  <div>
                    <h6 class="mb-0 text-sm">Aditiya Hermawan</h6>
                    <p class="text-xs text-secondary mb-0">Anggota</p>
                  </div>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm bg-gradient-warning shadow text-center border-radius-md me-3">
                    <i class="ni ni-single-02 text-white text-lg opacity-10"></i>
                  </div>
                  <div>
                    <h6 class="mb-0 text-sm">Deska Bagas Setiawan</h6>
                    <p class="text-xs text-secondary mb-0">Anggota</p>
                  </div>
                </div>
              </div>
            </div>

            <hr class="horizontal dark my-3">

            <div class="row">
              <div class="col-12">
                <p class="text-sm mb-0">
                  <i class="ni ni-book-bookmark text-primary me-2"></i>
                  <strong>Mata Kuliah:</strong> Pengembangan Aplikasi Berbasis Web (PABW)
                </p>
                <p class="text-sm mb-0 mt-2">
                  <i class="ni ni-laptop text-info me-2"></i>
                  <strong>Framework:</strong> CodeIgniter 4
                </p>
                <p class="text-sm mb-0 mt-2">
                  <i class="ni ni-building text-success me-2"></i>
                  <strong>Institusi:</strong> Universitas Widyatama
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>

<body class="g-sidenav-show bg-primary">

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>


<?= $this->endSection() ?>