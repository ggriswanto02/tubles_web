<?= $this->extend('layout/admin/layout') ?>

<?= $this->section('content') ?>

<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
        data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Tables</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Nilai Pertemuan Mahasiswa</li>
                </ol>
                <!-- <h3 class="font-weight-bolder text-white mb-0">Tables</h3> -->
            </nav>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-0">
                    <div class="card-header pb-0">
                        <h5>Nilai Pertemuan Mahasiswa</h5>
                        <h6>Daftar Penilaian</h6>
                        <!-- button tambah -->
                        <?php if (in_array(session('role'), ['admin', 'manajer'])): ?>
                            <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal"
                                data-bs-target="#modalCreate">Tambah Data</button>
                        <?php endif ?>
                        <a href="<?= site_url('nilai-pertemuan-mahasiswa/export') ?>" class="btn btn-success mb-3">Export Excel</a>
                        <br>
                    </div>

                    <div class="card-body pb-2">
                        <div class="table-responsive">
                            <table id="tableNP" class="table table-striped nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NIM</th>
                                        <th>Rencana Pembelajaran</th>
                                        <th>Nilai Kompetensi</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>

                            <p id="resultMessage" class="text-danger text-center mt-3"></p>

                            <?php if (in_array(session('role'), ['admin', 'manajer'])): ?>
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
                                                            Tambah Nilai Pertemuan Mahasiswa
                                                        </h3>
                                                    </div>

                                                    <div class="card-body pb-3">
                                                        <form action="<?= base_url('nilai-pertemuan-mahasiswa/newData') ?>" method="post">

                                                            <div class="mb-2">
                                                                <label>NIM</label>
                                                                <input type="number" name="nim" class="form-control mb-3" placeholder="Masukkan NIM" required>
                                                            </div>
                                                            <!-- Hardcode Rencana Pembelajaran -->
                                                            <div class="mb-2">
                                                                <label>Rencana Pembelajaran</label>
                                                                <select name="id_rencana_pembelajaran" class="form-control mb-3" required>
                                                                    <option value="">-- Pilih Rencana Pembelajaran --</option>
                                                                    <option value="221">Harian</option>
                                                                    <option value="222">Mingguan</option>
                                                                    <option value="223">Bulanan</option>
                                                                    <option value="224">Semester</option>
                                                                    <option value="225">Tahunan</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>Nilai Kompetensi</label>
                                                                <input type="text" name="nilai_kompetensi" class="form-control mb-3" placeholder="Masukkan Kompetensi" required>
                                                            </div>
                                                            <!-- Hardcode Status -->
                                                            <div class="mb-2">
                                                                <label>Status</label>
                                                                <select name="status" class="form-control mb-3" required>
                                                                    <option value="">-- Pilih Status --</option>
                                                                    <option value="Aktif">Aktif</option>
                                                                    <option value="Tidak Aktif">Tidak AKtif</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label>Keterangan</label>
                                                                <textarea name="keterangan" class="form-control mb-3" rows="3" maxlength="255" oninput="updateCount('keterangan', 'keteranganCount')" placeholder="Masukkan Keterangan"></textarea>
                                                                <small class="text-muted text-xs float-end">
                                                                    <span id="ketCount">0</span>/255
                                                                </small>
                                                            </div>
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

                                            <form id="formEdit" action="<?= base_url('nilai-pertemuan-mahasiswa/updateData') ?>" method="post">

                                                <div class="card-header pb-0 text-left">
                                                    <h3 class="font-weight-bolder text-primary text-gradient">
                                                        Edit Nilai Pertemuan Mahasiswa
                                                    </h3>
                                                </div>

                                                <div class="modal-body">

                                                    <input type="hidden" name="id" id="edit_id">

                                                    <div class="mb-2">
                                                        <label>NIM</label>
                                                        <input type="text" name="nim" id="edit_nim" class="form-control">
                                                    </div>

                                                    <div class="mb-2">
                                                        <label>Rencana Pembelajaran</label>
                                                        <select name="id_rencana_pembelajaran" id="edit_id_rencana_pembelajaran" class="form-control">
                                                            <option value="221">Harian</option>
                                                            <option value="222">Mingguan</option>
                                                            <option value="223">Bulanan</option>
                                                            <option value="224">Semester</option>
                                                            <option value="225">Tahunan</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-2">
                                                        <label>Nilai Kompetensi</label>
                                                        <input type="text" name="nilai_kompetensi" id="edit_nilai_kompetensi" class="form-control">
                                                    </div>

                                                    <div class="mb-2">
                                                        <label>Status</label>
                                                        <select name="status" id="edit_status" class="form-control mb-3">
                                                            <option value="Aktif">Aktif</option>
                                                            <option value="Tidak Aktif">Tidak AKtif</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-2">
                                                        <label>Keterangan</label>
                                                        <textarea name="keterangan" id="edit_keterangan" class="form-control"></textarea>
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
                            <?php endif ?>

                        </div>
                    </div>
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
        <?php
        $success = session()->getFlashdata('success');
        $error = session()->getFlashdata('error');
        ?>

        <script>
            const flashSuccess = "<?= $success ?>";
            const flashError = "<?= $error ?>";
            const USER_ROLE = "<?= session('role') ?>";

            // Hitung Jumlah Karakter
            function updateCount(fieldName, counterId) {
                const field = document.getElementsByName(fieldName)[0];
                const counter = document.getElementById(counterId);
                counter.textContent = field.value.length;
            }

            // Hapus Data
            function deleteData() {
                if (!window.deleteId) return;
                $.ajax({
                    url: "/nilai-pertemuan-mahasiswa/deleteById",
                    method: "POST",
                    data: {
                        id: window.deleteId
                    },
                    success: function(res) {
                        $('#modalDelete').modal('hide');
                        if (res.status === true) {
                            Swal.fire({
                                title: "Berhasil",
                                text: res.message,
                                icon: "success",
                                timer: 2000
                            });
                            $('#tableNP').DataTable().ajax.reload(null, false);
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                text: res.message,
                                icon: "error"
                            });
                        }
                    },
                    error: function() {
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

            $(document).ready(function() {
                const rencanaPembelajaranList = {
                    221: "Harian",
                    222: "Mingguan",
                    223: "Bulanan",
                    224: "Semester",
                    225: "Tahunan",
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
                let table = $('#tableNP').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollX: true,
                    ajax: {
                        url: "<?= base_url('nilai-pertemuan-mahasiswa/getData') ?>",
                        type: "POST"
                    },
                    columns: [{
                            data: "id"
                        },
                        {
                            data: "nim"
                        },
                        {
                            data: "id_rencana_pembelajaran",
                            render: function(val) {
                                return rencanaPembelajaranList[val] ?? "Tidak diketahui";
                            }
                        },
                        {
                            data: "nilai_kompetensi"
                        },
                        {
                            data: "status"
                        },
                        {
                            data: "keterangan"
                        },
                        {
                            data: null,
                            orderable: false,
                            render: function(data, type, row) {
                                if (USER_ROLE === 'admin' || USER_ROLE === 'manajer') {
                                    return `
                                <button class="btn bg-gradient-info btn-sm mb-0 btnEdit" data-id="${row.id}">
                                Edit
                                </button>
                                <button class="btn bg-gradient-danger btn-sm mb-0 btnDelete" data-id="${row.id}">
                                Hapus
                                </button>`;
                                }
                                return '-';
                            }
                        }
                    ]
                });
                document.querySelectorAll('.dt-button').forEach(btn => {
                    btn.classList.remove('dt-button');
                });

                // Hapus Data
                $('#tableNP').on('click', '.btnDelete', function() {
                    window.deleteId = $(this).data('id');
                    $('#modalDelete').modal('show');
                });

                // Edit Data
                $('#tableNP').on('click', '.btnEdit', function() {
                    let id = $(this).data('id');

                    $.ajax({
                        url: "/nilai-pertemuan-mahasiswa/getById",
                        data: {
                            id: id
                        },
                        method: "GET",
                        success: function(res) {
                            if (res.status === true) {
                                let d = res.data;

                                $('#edit_id').val(d.id);
                                $('#edit_nim').val(d.nim);
                                $('#edit_id_rencana_pembelajaran').val(d.id_rencana_pembelajaran);
                                $('#edit_nilai_kompetensi').val(d.nilai_kompetensi);
                                $('#edit_status').val(d.status);
                                $('#edit_keterangan').val(d.keterangan);

                                $('#modalEdit').modal('show');
                            } else {
                                Swal.fire({
                                    title: "Gagal",
                                    text: res.message || "Data tidak ditemukan.",
                                    icon: "error"
                                });
                            }
                        },
                        error: function(xhr) {
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

</main>

<style>
    #modalCreate {
        z-index: 9999 !important;
    }

    .sidenav {
        z-index: 2000 !important;
    }

    .modal-backdrop {
        z-index: 2000 !important;
    }

    .modal {
        z-index: 2050 !important;
    }
</style>

<?= $this->endSection() ?>