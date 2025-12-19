<?= $this->extend('layout/admin/layout') ?>

<?= $this->section('content') ?>

<main class="main-content position-relative border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
    data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Table CPL</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">TABLE CPL</h6>

      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        </div>

      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">

      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">

        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">

        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row mt-4">
        <!-- Left column: card that previously had diagram -->
        <div class="col-12">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent d-flex justify-content-between align-items-center">
              <div>
                <h6 class="text-capitalize">Daftar CPL</h6>
                <p class="text-sm mb-0">
                  <span class="font-weight-bold">Tabel CPL</span> — Data Capaian Pembelajaran Lulusan.
                </p>
              </div>
              <div class="row-2">
                <?php if (in_array(session('role'), ['admin', 'manajer'])): ?>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddCPL">Tambah
                    Data</button>
                <?php endif ?>
                <a href="<?= site_url('table/cpl/export') ?>" class="btn btn-success mb-3">Export Excel</a>
              </div>
            </div>

            <div class="card-body p-3">
              <div class="table-responsive">
                <table class="table table-striped align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th>ID Penyusun</th>
                      <th>ID Mata Kuliah</th>
                      <th>CPL Prodi</th>
                      <?php if (in_array(session('role'), ['admin', 'manajer'])): ?>
                        <th text-align="center">Aksi</th>
                      <?php endif ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($cpl) && is_array($cpl)): ?>
                      <?php $no = 1;
                      foreach ($cpl as $row): ?>
                        <tr>
                          <td class="text-center"><?= $no++; ?></td>
                          <td><?= esc($row['id_penyusun']); ?></td>
                          <td><?= esc($row['id_matakuliah']); ?></td>
                          <td><?= esc($row['cpl_prodi']); ?></td>
                          <?php if (in_array(session('role'), ['admin', 'manajer'])): ?>
                            <td><button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditCPL"
                                data-id="<?= $row['id']; ?>" data-penyusun="<?= $row['id_penyusun']; ?>"
                                data-mk="<?= $row['id_matakuliah']; ?>" data-cpl="<?= $row['cpl_prodi']; ?>">Edit</button>
                              <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDeleteCPL"
                                data-href="<?= base_url('table/cpl/delete/' . $row['id']) ?>">Hapus</button>
                            </td>
                          <?php endif ?>


                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="4" class="text-center text-muted">Belum ada data CPL.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div> <!-- .table-responsive -->
            </div> <!-- .card-body -->
          </div> <!-- .card -->
        </div> <!-- .col-lg-7 -->


      </div>
</main>


<body class="g-sidenav-show bg-primary">

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

<?php if (in_array(session('role'), ['admin', 'manajer'])): ?>
  <!-- Modal Edit CPL -->
  <div class="modal fade" id="modalEditCPL" tabindex="-1" aria-labelledby="modalEditCPLLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="modalEditCPLLabel">Edit Data CPL</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="<?= base_url('table/cpl/update') ?>" method="post">
          <div class="modal-body">

            <input type="hidden" name="id" id="edit-id">

            <div class="mb-3">
              <label class="form-label">ID Penyusun</label>
              <input type="number" class="form-control" name="id_penyusun" id="edit-penyusun" required>
            </div>

            <div class="mb-3">
              <label class="form-label">ID Mata Kuliah</label>
              <input type="number" class="form-control" name="id_matakuliah" id="edit-mk" required>
            </div>

            <div class="mb-3">
              <label class="form-label">CPL Prodi</label>
              <textarea class="form-control" name="cpl_prodi" id="edit-cpl" required></textarea>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- Modal Delete Danger Mode -->
  <div class="modal fade" id="modalDeleteCPL" tabindex="-1" aria-labelledby="modalDeleteCPLLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- RED DANGER HEADER -->
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title d-flex align-items-center" id="modalDeleteCPLLabel">
            <i class="fas fa-exclamation-triangle me-2"></i> Konfirmasi Hapus
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!-- BODY -->
        <div class="modal-body text-center">
          <h4 class="text-danger">
            <i class="fas fa-exclamation-circle fa-3x mb-3"></i>
          </h4>
          <p class="fs-5">Apakah kamu yakin ingin menghapus data ini?</p>
          <p class="text-muted">Tindakan ini <strong>tidak bisa dipulihkan!</strong></p>
        </div>

        <!-- FOOTER -->
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>

          <!-- Tombol yang akan menjalankan delete -->
          <a id="btn-delete-confirm" href="#" class="btn btn-danger px-4">
            <i class="fas fa-trash-alt me-1"></i> Hapus
          </a>
        </div>

      </div>
    </div>
  </div>


  <!-- Modal Tambah CPL -->
  <div class="modal fade" id="modalAddCPL" tabindex="-1" aria-labelledby="modalAddCPLLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="modalAddCPLLabel">Tambah Data CPL</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="<?= base_url('table/cpl/store') ?>" method="post">
          <div class="modal-body">

            <div class="mb-3">
              <label class="form-label">ID Penyusun</label>
              <input type="number" class="form-control" name="id_penyusun" required>
            </div>

            <div class="mb-3">
              <label class="form-label">ID Mata Kuliah</label>
              <input type="number" class="form-control" name="id_matakuliah" required>
            </div>

            <div class="mb-3">
              <label class="form-label">CPL Prodi</label>
              <textarea class="form-control" name="cpl_prodi" required></textarea>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endif ?>


<script>
  const editModal = document.getElementById('modalEditCPL');

  editModal.addEventListener('show.bs.modal', function (event) {
    let button = event.relatedTarget;

    let id = button.getAttribute('data-id');
    let penyusun = button.getAttribute('data-penyusun');
    let mk = button.getAttribute('data-mk');
    let cpl = button.getAttribute('data-cpl');

    document.getElementById('edit-id').value = id;
    document.getElementById('edit-penyusun').value = penyusun;
    document.getElementById('edit-mk').value = mk;
    document.getElementById('edit-cpl').value = cpl;
  });
</script>

<script>
  // Delete Modal Logic
  const deleteModal = document.getElementById('modalDeleteCPL');

  deleteModal.addEventListener('show.bs.modal', function (event) {
    let button = event.relatedTarget;
    let href = button.getAttribute('data-href');

    // Set href di tombol delete
    document.getElementById('btn-delete-confirm').setAttribute('href', href);
  });
</script>


<?= $this->endSection() ?>