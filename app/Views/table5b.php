<?= $this->extend('layout/admin/layout') ?>

<?= $this->section('content') ?>

<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tables</li>
          </ol>
          <h3 class="font-weight-bolder text-white mb-0">Tables</h3>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
            <form action="<?= base_url('table/table3b71/cari') ?>" method="GET" id="searchForm">
            <span class="input-group-text text-body"><input type="search" id="searchInput" name="search" placeholder="Cari berdasarkan keterangan.." /><i class="fas fa-search" aria-hidden="true"></i></span>
          </form> 
          </div>
          </div> 
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-0">
            <div class="card-header pb-0">
              <h5>Tabel 5.b Integrasi Kegiatan Penelitian dalam Pembelajaran</h5>
              

              <button type="button"  class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">
                Tambah Data
              </button>
              <br>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table table-hover align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">No</th>
                      <th class="text-center text-uppercase text-xxs font-weight-bolder ">Judul Penelitian</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Nama Dosen</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Mata Kuliah</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Bentuk Integrasi</th>
                      <th class="text-center text-uppercase text-xxs font-weight-bolder">Tahun</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach($table5b as $table5b): ?>
                    <tr>
                      <td class="text-center">
                          <p class="mb-0 text-sm"><?= $no; ?></p>
                      </td>

                      <td class="text-center">
                            <p class="mb-0 text-sm"><?= $table5b['judul_penelitian'] ?></p>
                      </td>
                      <td class="text-center">
                        <p class="mb-0 text-sm"><?= $table5b['nama_dosen'] ?></p>
                      </td>
                      <td class="text-center">
                        <p class="mb-0 text-sm"><?= $table5b['mata_kuliah'] ?></p>
                      </td>
                      <td class="text-center">
                        <p class="mb-0 text-sm"><?= $table5b['bentuk_integrasi'] ?></p>
                      </td>

                      <td class="text-center">
                        <p class="mb-0 text-sm"><?= $table5b['tahun'] ?></p>
                      </td>
                     
                      
                      <td class="text-center">
                      <a href="<?= base_url('table/table5b/'.$table5b['no'].'/edit') ?>" class="btn bg-gradient-info btn-block">
                        Edit
                      </a>
                      <a href="#" data-href="<?= base_url('table/table5b/' . $table5b['no'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn bg-gradient-danger btn-block" data-bs-toggle="modal" data-bs-target="#confirm-dialog">Hapus</a>
                      </td>
                    </tr>
                    <?php $no++; endforeach ?>
                  </tbody>
                </table>

                 <!-- js message data tidak ditemukan  -->
                <div id="resultMessage" class="result-message text-center"></div>

                <!-- modal delete -->
                <div class="modal fade" id="confirm-dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Apakah Anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="button" class="btn btn-danger" onclick="deleteData()">Hapus</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- js delete -->
              <script>
                function confirmToDelete(element) {
                  var deleteButton = document.getElementById('confirm-dialog').querySelector('.btn-danger');
                  deleteButton.setAttribute('data-href', element.getAttribute('data-href'));
                }

                function deleteData() {
                  var deleteUrl = document.getElementById('confirm-dialog').querySelector('.btn-danger').getAttribute('data-href');

                  window.location.href = deleteUrl;
                }
              </script>

<!-- modal tambah data -->
              <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                  <div class="modal-content">
                    <div class="modal-body p-0">
                      <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                          <h3 class="font-weight-bolder text-primary text-gradient">Tabel 5b</h3>
                            <p class="mb-0">Masukkan data yang anda inginkan</p>
                        </div>
                            <div class="card-body pb-3">
                              <form action="<?= base_url('table/table5b/new') ?>"  method="post" role="form text-left">
                                
                                <label>No</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="no" placeholder="<?= $no; ?>" aria-label="no" aria-describedby="email-addon">
                                </div>
                                <label>Judul Penelitian</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="judul_penelitian" placeholder="Judul Penelitian" aria-label="judulpenelitian" aria-describedby="email-addon">
                                </div>
                                <label>Nama Dosen</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="nama_dosen" placeholder="Nama Dosen" aria-label="namadosen" aria-describedby="password-addon">
                                </div>
                                <div class="text-center">
                                  
                                </div>
                                <label>Mata Kuliah</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="mata_kuliah" placeholder="Mata Kuliah" aria-label="matakuliah" aria-describedby="password-addon">
                                </div>
                                <div class="text-center">
                                  
                                </div>
                                <label>Bentuk Integrasi</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="bentuk_integrasi" placeholder="Bentuk Integrasi" aria-label="bentukintegrasi" aria-describedby="password-addon">
                                </div>
                                <div class="text-center">
                                 
                                </div>
                                <label>Tahun</label>
                                <div class="input-group mb-3">
                                <select id="tahun" name="tahun" class="form-control" placeholder="Tahun" aria-label="tahun" required>
                                    <?php
                                    $tahunSekarang = date("Y");
                                    for ($tahun = 1900; $tahun <= $tahunSekarang + 10; $tahun++) {
                                        echo "<option value='$tahun'>$tahun</option>";
                                    }
                                    ?>
                                </select> 
                                </div>
                                <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Tambah</button>
                              </form>
                            </div>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div> 
        </div>
      </main>



  
  <body class="g-sidenav-show bg-primary">
  <div class="min-height-300 bg-gray-100 position-absolute w-100"></div>
 
  <!-- js search -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const searchForm = document.getElementById("searchForm");
      const searchInput = document.getElementById("searchInput");
      const resultMessage = document.getElementById("resultMessage");
      const tableBody = document.querySelector(".table tbody");

      function filterRows() {
        const searchText = searchInput.value.toLowerCase();
        let foundRows = 0;

        tableBody.querySelectorAll("tr").forEach(function(row, index) {
          const cells = row.querySelectorAll("td");
          const kategoriText = cells[3].textContent.toLowerCase(); // Ubah sesuai dengan indeks kolom yang berisi kategori

          if (kategoriText.includes(searchText)) {
            row.style.display = "";
            foundRows++;
          } else {
            row.style.display = "none";
          }
        });

        if (foundRows === 0) {
          resultMessage.textContent = "Data tidak ditemukan";
        } else {
          resultMessage.textContent = "";
        }
      }

      searchForm.addEventListener("submit", function(event) {
        event.preventDefault();
        filterRows();
      });

      searchInput.addEventListener("input", filterRows);

      filterRows();
    });
  </script>

  

  </body>

<?= $this->endSection() ?>


