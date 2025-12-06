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
              <h5>Tabel 5.a Kurikulum, Capaian Pembelajaran, dan Rencana Pembelajaran</h5>
              

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
                      <th class="text-center text-uppercase text-xxs font-weight-bolder ">Semester/th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Kode Mata Kuliah</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Nama Mata Kuliah</th>
                      <td class="text-center text-secondary text-xxs font-weight-bolder">Kuliah</td>
                      <td class="text-center text-secondary text-xxs font-weight-bolder">Seminar</td>
                      <td class="text-center text-secondary text-xxs font-weight-bolder">Pratikum</td>
                                           
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Konversi kredit ke Jam</th>
                      
                                            
                      <td class="text-center text-secondary text-xxs font-weight-bolder">Sikap</td>
                      <td class="text-center text-secondary text-xxs font-weight-bolder">Pengetahuan</td>
                      <td class="text-center text-secondary text-xxs font-weight-bolder">Keterampilan Umum</td>
                      <td class="text-center text-secondary text-xxs font-weight-bolder">Keterampilan Khusus</td>
                                            
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Dokumen Rencana Pembelajaran</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">Unit Penyelenggara</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach($table5a as $table5a): ?>
                    <tr>
                      <td class="text-center">
                          <p class="mb-0 text-sm"><?= $no; ?></p>
                      </td>

                      <td class="text-center">
                            <p class="mb-0 text-sm"><?= $table5a['semester'] ?></p>
                      </td>
                      <td class="text-center">
                        <p class="mb-0 text-sm"><?= $table5a['kode_matkul'] ?></p>
                      </td>
                      <td class="text-center">
                        <p class="mb-0 text-sm"><?= $table5a['nama_matkul'] ?></p>
                      </td>
                      <td class="text-center">
                        <p class="mb-0 text-sm"><?= $table5a['bk_responsi'] ?></p>
                      </td>
                      <td class="text-center">
                        <p class="mb-0 text-sm"><?= $table5a['bk_seminar'] ?></p>
                      </td>
                      <td class="text-center">
                        <p class="mb-0 text-sm"><?= $table5a['bk_praktikum'] ?></p>
                      </td>   
                      <td class="text-center">
                        <p class="mb-0 text-sm"><?= $table5a['kredit_ke_jam'] ?></p>
                      </td>
                      <td class="text-center">
                        <p class="mb-0 text-sm"><?= $table5a['cp_sikap'] ?></p>
                      </td>
                      <td class="text-center">
                        <p class="mb-0 text-sm"><?= $table5a['cp_pengetahuan'] ?></p>
                      </td>
                      <td class="text-center">
                        <p class="mb-0 text-sm"><?= $table5a['cp_keterampilan_umum'] ?></p>
                      </td>
                      <td class="text-center">
                        <p class="mb-0 text-sm"><?= $table5a['cp_keterampilan_khusus'] ?></p>
                      </td>
                      <td class="text-center">
                        <p class="mb-0 text-sm"><?= $table5a['dokumen_pembelajaran'] ?></p>
                      </td>
                      <td class="text-center">
                        <p class="mb-0 text-sm"><?= $table5a['unit_penyelenggara'] ?></p>
                      </td>
                    
                      
                      <td class="text-center">
                      
                      <a href="<?= base_url('table/table5a/'.$table5a['no'].'/edit') ?>" class="btn bg-gradient-info btn-block">
                        Edit
                      </a>
                      <a href="#" data-href="<?= base_url('table/table5a/'.$table5a['no'].'/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirm-dialog">Hapus</a>
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
                          <h3 class="font-weight-bolder text-primary text-gradient">Tabel 5a</h3>
                            <p class="mb-0">Masukkan data yang anda inginkan</p>
                        </div>
                            <div class="card-body pb-3">
                              <form action="<?= base_url('table/table5a/new') ?>"  method="post" role="form text-left">
                                
                                <label>No</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="no" placeholder="<?= $no; ?>" aria-label="no" aria-describedby="email-addon">
                                </div>
                                <label>Semester</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="semester" placeholder="Semester" aria-label="semester" aria-describedby="email-addon">
                                </div>
                                <label>Kode Mata Kuliah</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="kode_matkul" placeholder="Kode Mata Kuliah" aria-label="kodematkul" aria-describedby="password-addon">
                                </div>
                                <div class="text-center">
                                  
                                </div>
                                <label>Nama Mata Kuliah</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="nama_matkul" placeholder="Nama Mata Kuliah" aria-label="namamatkul" aria-describedby="password-addon">
                                </div>
                                <div class="text-center">
                                  
                                </div>
                                <label>Kuliah</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="bk_responsi" placeholder="Kuliah" aria-label="bkresponsi" aria-describedby="password-addon">
                                </div>
                                <div class="text-center">
                                </div>
                                <label>Seminar</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="bk_seminar" placeholder="Seminar" aria-label="bkseminar" aria-describedby="password-addon">
                                </div>
                                <div class="text-center">
                                </div>
                                <label>Pratikum</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="bk_praktikum" placeholder="Pratikum" aria-label="bkpratikum" aria-describedby="password-addon">
                                </div>
                                <div class="text-center">
                                </div>
                                <label>Konversi Kredit ke Jam</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="kredit_ke_jam" placeholder="Konversi Kredit Ke Jam" aria-label="kreditkejam" aria-describedby="password-addon">
                                </div>
                                <div class="text-center">
                                </div>
                                <label>Sikap</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="cp_sikap" placeholder="Sikap" aria-label="cpsikap" aria-describedby="password-addon">
                                </div>
                                <div class="text-center">
                                </div>
                                <label>Pengetahuan</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="cp_pengetahuan" placeholder="Pengetahuan" aria-label="cppengetahuan" aria-describedby="password-addon">
                                </div>
                                <div class="text-center">
                                </div>
                                <label>Keterampilan Umum</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="cp_keterampilan_umum" placeholder="Keterampilan Umum" aria-label="cpketerampilanumum" aria-describedby="password-addon">
                                </div>
                                <div class="text-center">
                                </div>
                                <label>Keterampilan Khusus</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="cp_keterampilan_khusus" placeholder="Keterampilan Khusus" aria-label="cpketerampilankhusus" aria-describedby="password-addon">
                                </div>
                                <div class="text-center">
                                </div>
                                <label>Dokumen Rencana Pembelajaran</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="dokumen_pembelajaran" placeholder="Dokumen Rencana Pembelajaran" aria-label="dokumenpembelajaran" aria-describedby="password-addon">
                                </div>
                                <div class="text-center">
                                </div>
                                <label>Unit Penyelenggara</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="unit_penyelenggara" placeholder="Unit Penyelenggara" aria-label="unitpenyelenggara" aria-describedby="password-addon">
                                </div>
                                <div class="text-center">
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


