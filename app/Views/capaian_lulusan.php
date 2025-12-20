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
                        <h5>Capaian Lulusan</h5>
                        <h6>Daftar Pencapaian</h6>
                        <!-- button tambah -->
                        <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">
                            Tambah Data
                        </button>
                        <a href="<?= base_url('capaian-lulusan/export') ?>" class="btn btn-success mb-3">Export Excel</a>
                        <br>
                    </div>

                    <div class="card-body pb-2">
                        <div class="table-responsive">
                            <table id="tableCPL" class="table table-striped nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Penyusun</th>
                                        <th>Matakuliah</th>
                                        <th>Prodi</th>
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
                                                    Tambah Capaian Lulusan
                                                </h3>
                                            </div>

                                            <div class="card-body pb-3">
                                                <form action="<?= base_url('capaian-lulusan/newData') ?>" method="post">

                                                    <!-- Hardcode Penyusun -->
                                                    <div class="mb-2">
                                                        <label>Penyusun</label>
                                                        <select name="id_penyusun" class="form-control" required>
                                                            <option value="">-- Pilih Penyusun --</option>
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
                                                        <select name="id_matakuliah" class="form-control" required>
                                                            <option value="">-- Pilih Mata Kuliah --</option>
                                                            <option value="12">Pemrograman Web</option>
                                                            <option value="14">Basis Data</option>
                                                            <option value="18">Algoritma dan Struktur Data</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label>Prodi</label>
                                                        <input type="text" name="cpl_prodi" class="form-control mb-3" placeholder="Masukkan Prodi" required>
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

                                    <form id="formEdit" action="<?= base_url('capaian-lulusan/updateData') ?>" method="post">

                                        <div class="card-header pb-0 text-left">
                                            <h3 class="font-weight-bolder text-primary text-gradient">
                                                Edit Capaian Lulusan
                                            </h3>
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
                                                <label>Prodi</label>
                                                <input type="text" name="cpl_prodi" id="edit_cpl_prodi" class="form-control">
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
    </div>

    <body class="bg-primary">
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
                    url: "/capaian-lulusan/deleteById",
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
                            $('#tableCPL').DataTable().ajax.reload(null, false);
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
                let table = $('#tableCPL').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollX: true,
                    ajax: {
                        url: "<?= base_url('capaian-lulusan/getData') ?>",
                        type: "POST"
                    },
                    columns: [{
                            data: "id"
                        },
                        {
                            data: "id_penyusun",
                            render: function(val) {
                                return penyusunList[val] ?? "Tidak diketahui";
                            }
                        },
                        {
                            data: "id_matakuliah",
                            render: function(val) {
                                return matkulList[val] ?? "Tidak diketahui";
                            }
                        },

                        {
                            data: "cpl_prodi"
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                return `
                            <button class="btn bg-gradient-info btn-sm mb-0 btnEdit" data-id="${row.id}">
                            Edit
                            </button>
                            <button class="btn bg-gradient-danger btn-sm mb-0 btnDelete" data-id="${row.id}">
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
                $('#tableCPL').on('click', '.btnDelete', function() {
                    window.deleteId = $(this).data('id');
                    $('#modalDelete').modal('show');
                });

                // Edit Data
                $('#tableCPL').on('click', '.btnEdit', function() {
                    let id = $(this).data('id');

                    $.ajax({
                        url: "/capaian-lulusan/getById",
                        data: {
                            id: id
                        },
                        method: "GET",
                        success: function(res) {
                            if (res.status === true) {
                                let d = res.data;

                                $('#edit_id').val(d.id);
                                $('#edit_id_penyusun').val(d.id_penyusun);
                                $('#edit_id_matakuliah').val(d.id_matakuliah);
                                $('#edit_cpl_prodi').val(d.cpl_prodi);

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