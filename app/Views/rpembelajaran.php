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
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tables</li>
        </ol>
        <h3 class="font-weight-bolder text-white mb-0">Tables</h3>
      </nav>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-0">
          <div class="card-header pb-0">
            <h5>Rencana Pembelajaran</h5>
            <h6>Daftar Mingguan</h6>
          </div>

          <div class="card-body pb-2">
            <div class="table-responsive">
              <table id="rpsTable" class="table table-striped nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Penyusun</th>
                    <th>Mata Kuliah</th>
                    <th>Minggu Ke</th>
                    <th>Sub CPMK</th>
                    <th>Indikator</th>
                    <th>Teknik</th>
                    <th>Pembelajaran</th>
                    <th>Materi</th>
                    <th>Bobot</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
              </table>
            </div>

            <p id="resultMessage" class="text-danger text-center mt-3"></p>

            <!-- Modal Delete -->
            <div class="modal fade" id="modalDelete" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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

            <!-- Modal Create -->
            <div class="modal fade" id="modalCreate" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-body p-0">
                    <div class="card card-plain">

                      <div class="card-header pb-0 text-left">
                        <h3 class="font-weight-bolder text-primary text-gradient">
                          Tambah Rencana Pembelajaran
                        </h3>
                      </div>

                      <div class="card-body pb-3">
                        <form action="<?= base_url('rpl/newData') ?>" method="post">

                          <!-- Hardcode Penyusun -->
                          <label>Penyusun</label>
                          <select name="id_penyusun" class="form-control mb-3" required>
                            <option value="">-- Pilih Penyusun --</option>
                            <option value="1">Adam Kopikap</option>
                            <option value="2">Dadang Batagor</option>
                            <option value="3">Asep Retail</option>
                            <option value="4">Tedi Pasar</option>
                            <option value="5">Wawan Kuncen Cikuray</option>
                          </select>

                          <!-- Hardcode Mata Kuliah -->
                          <label>Mata Kuliah</label>
                          <select name="id_matakuliah" class="form-control mb-3" required>
                            <option value="">-- Pilih Mata Kuliah --</option>
                            <option value="12">Pemrograman Web</option>
                            <option value="14">Basis Data</option>
                            <option value="18">Algoritma dan Struktur Data</option>
                          </select>

                          <label>Minggu Ke</label>
                          <input type="number" name="minggu_ke" class="form-control mb-3" required>

                          <label>Sub CPMK</label>
                          <input type="text" name="sub_cpmk" class="form-control mb-3" required>

                          <label>Indikator Penilaian</label>
                          <input type="text" name="penilaian_indikator" class="form-control mb-3">

                          <label>Teknik Penilaian</label>
                          <input type="text" name="penilaian_teknik" class="form-control mb-3">

                          <label>Bentuk Pembelajaran</label>
                          <input type="text" name="bentuk_pembelajaran" class="form-control mb-3">

                          <label>Materi</label>
                          <textarea name="materi" class="form-control mb-3"></textarea>

                          <label>Bobot Penilaian</label>
                          <input type="number" name="bobot_penilaian" class="form-control mb-3">

                          <label>Catatan</label>
                          <textarea name="catatan" class="form-control mb-3"></textarea>

                          <div class="text-center">
                            <button type="submit" class="btn bg-gradient-primary btn-lg w-100 mt-4 mb-0">
                              Tambah
                            </button>
                          </div>

                        </form>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>



            <!-- Modal Edit -->
            <div class="modal fade" id="modalEdit" tabindex="-1">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <form id="formEdit" action="<?= base_url('rpl/updateData') ?>" method="post">

                    <div class="modal-header">
                      <h5 class="modal-title">Edit Rencana Pembelajaran</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                      <input type="hidden" name="id" id="edit_id">

                      <!-- Hardcode Penyusun -->
                      <div class="mb-2">
                        <label>Penyusun</label>
                        <select name="id_penyusun" id="edit_id_penyusun" class="form-control">
                          <option value="1">Adam Kopikap</option>
                          <option value="2">Dadang Batagor</option>
                          <option value="3">Asep Retail</option>
                          <option value="4">Tedi Pasar</option>
                          <option value="5">Wawan Kuncen Cikuray</option>
                        </select>
                      </div>

                      <!-- Hardcode Mata Kuliah -->
                      <div class="mb-2">
                        <label>Mata Kuliah</label>
                        <select name="id_matakuliah" id="edit_id_matakuliah" class="form-control">
                          <option value="12">Pemrograman Web</option>
                          <option value="14">Basis Data</option>
                          <option value="18">Algoritma dan Struktur Data</option>
                        </select>
                      </div>

                      <div class="mb-2">
                        <label>Minggu Ke</label>
                        <input type="number" class="form-control" id="edit_minggu_ke" name="minggu_ke">
                      </div>

                      <div class="mb-2">
                        <label>Sub CPMK</label>
                        <input type="text" class="form-control" id="edit_sub_cpmk" name="sub_cpmk">
                      </div>

                      <div class="mb-2">
                        <label>Indikator Penilaian</label>
                        <input type="text" class="form-control" id="edit_penilaian_indikator"
                          name="penilaian_indikator">
                      </div>

                      <div class="mb-2">
                        <label>Teknik Penilaian</label>
                        <input type="text" class="form-control" id="edit_penilaian_teknik" name="penilaian_teknik">
                      </div>

                      <div class="mb-2">
                        <label>Bentuk Pembelajaran</label>
                        <input type="text" class="form-control" id="edit_bentuk_pembelajaran"
                          name="bentuk_pembelajaran">
                      </div>

                      <div class="mb-2">
                        <label>Materi</label>
                        <textarea class="form-control" id="edit_materi" name="materi"></textarea>
                      </div>

                      <div class="mb-2">
                        <label>Bobot Penilaian</label>
                        <input type="number" class="form-control" id="edit_bobot_penilaian" name="bobot_penilaian">
                      </div>

                      <div class="mb-2">
                        <label>Catatan</label>
                        <textarea class="form-control" id="edit_catatan" name="catatan"></textarea>
                      </div>

                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>

                  </form>

                </div>
              </div>
            </div>




          </div><!-- responsive -->
        </div><!-- card-body -->
      </div>
    </div>
  </div>
  </div>


  <!-- Modal Jika Data Tidak Ditemukan -->
  <div class="modal fade" id="modalNotFound" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white">Data Tidak Ditemukan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body text-center">
          <p id="notFoundMessage" class="mb-0">Data tidak tersedia.</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Tutup
          </button>
        </div>

      </div>
    </div>
  </div>


  <body class="bg-primary">
    <div class="min-height-300 bg-gray-100 w-100"></div>

    <?php
    $success = session()->getFlashdata('success');
    $error = session()->getFlashdata('error');
    ?>

    <script>
      const flashSuccess = "<?= $success ?>";
      const flashError = "<?= $error ?>";

      // Hapus Data
      function deleteData() {
        if (!window.deleteId) return;
        $.ajax({
          url: "/rpl/deleteById",
          method: "POST",
          data: { id: window.deleteId },
          success: function (res) {
            $('#modalDelete').modal('hide');
            if (res.status === true) {
              Swal.fire({
                title: "Berhasil",
                text: res.message,
                icon: "success",
                timer: 2000
              });
              $('#rpsTable').DataTable().ajax.reload(null, false);
            } else {
              Swal.fire({
                title: "Gagal",
                text: res.message,
                icon: "error"
              });
            }
          },
          error: function () {
            let msg = "Terjadi kesalahan pada server.";
            if (xhr.responseJSON && xhr.responseJSON.message) {
              msg = xhr.responseJSON.message;
            }
            Swal.fire({
              title: "Gagal",
              text: res.message,
              icon: "error"
            });
          }
        });
      }

      $(document).ready(function () {
        const penyusunList = {
          1: "Adam Kopikap",
          2: "Dadang Batagor",
          3: "Asep Retail",
          4: "Tedi Pasar",
          5: "Wawan Kuncen Cikuray",
        }

        const matkulList = {
          12: "Pemrograman Web",
          14: "Basis Data",
          18: "Algoritma dan Struktur Data",
        }

        if (flashSuccess) {
          Swal.fire({
            title: "Berhasil",
            text: flashSuccess,
            icon: "success",
            timer: 2000
          });
        }

        if (flashError) {
          Swal.fire({
            title: "Gagal",
            text: flashError,
            icon: "error"
          });
        }

        // Inisialisasi DataTable
        let table = $('#rpsTable').DataTable({
          processing: true,
          serverSide: true,
          scrollX: true,
          dom: 'Bfrtip',
          buttons: [
            {
              text: 'Tambah Data',
              className: 'btn bg-gradient-success mb-3',
              action: function () {
                const modal = new bootstrap.Modal(
                  document.getElementById('modalCreate')
                );
                modal.show();
              }
            },
            {
              extend: 'excelHtml5',
              className: 'btn bg-gradient-secondary btn-block mb-3',
              text: 'Export Excel',
              title: 'Rencana_Pembelajaran',
              exportOptions: {
                columns: ':not(:last-child)'
              }
            }
          ],
          ajax: {
            url: "<?= base_url('rpl/getData') ?>",
            type: "POST"
          },
          columns: [
            { data: "id" },
            {
              data: "id_penyusun",
              render: function (val) {
                return penyusunList[val] ?? "Tidak diketahui";
              }
            },
            {
              data: "id_matakuliah",
              render: function (val) {
                return matkulList[val] ?? "Tidak diketahui";
              }
            },

            { data: "minggu_ke" },
            { data: "sub_cpmk" },
            { data: "penilaian_indikator" },
            { data: "penilaian_teknik" },
            { data: "bentuk_pembelajaran" },
            { data: "materi" },
            { data: "bobot_penilaian" },
            { data: "catatan" },
            {
              data: null,
              render: function (data, type, row) {
                return `
        <button class="btn btn-primary btn-sm btnEdit" data-id="${row.id}">
          Edit
        </button>
        <button class="btn btn-danger btn-sm btnHapus" data-id="${row.id}">
          Hapus
        </button>`;
              }
            }
          ]
        });
        document.querySelectorAll('.dt-button').forEach(btn => {
          btn.classList.remove('dt-button');
        });

        // Hapus Data
        $('#rpsTable').on('click', '.btnHapus', function () {
          window.deleteId = $(this).data('id');
          $('#modalDelete').modal('show');
        });

        // Edit Data
        $('#rpsTable').on('click', '.btnEdit', function () {
          let id = $(this).data('id');

          $.ajax({
            url: "/rpl/getById",
            data: { id: id },
            method: "GET",
            success: function (res) {
              if (res.status === true) {
                let d = res.data;

                $('#edit_id').val(d.id);
                $('#edit_id_penyusun').val(d.id_penyusun);
                $('#edit_id_matakuliah').val(d.id_matakuliah);
                $('#edit_minggu_ke').val(d.minggu_ke);
                $('#edit_sub_cpmk').val(d.sub_cpmk);
                $('#edit_penilaian_indikator').val(d.penilaian_indikator);
                $('#edit_penilaian_teknik').val(d.penilaian_teknik);
                $('#edit_bentuk_pembelajaran').val(d.bentuk_pembelajaran);
                $('#edit_materi').val(d.materi);
                $('#edit_bobot_penilaian').val(d.bobot_penilaian);
                $('#edit_catatan').val(d.catatan);

                $('#modalEdit').modal('show');
              } else {
                Swal.fire({
                  title: "Gagal",
                  text: res.message || "Data tidak ditemukan.",
                  icon: "error"
                });
              }
            },
            error: function (xhr) {
              let msg = "Terjadi kesalahan saat mengambil data.";
              if (xhr.responseJSON && xhr.responseJSON.message) {
                msg = xhr.responseJSON.message;
              }
              Swal.fire({
                title: "Gagal",
                text: msg,
                icon: "error"
              });
            }
          });
        });
      });
    </script>

  </body>

  <?= $this->endSection() ?>