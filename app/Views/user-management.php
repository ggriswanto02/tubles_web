<?= $this->extend('layout/admin/layout') ?>

<?= $this->section('content') ?>

<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
        data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Admin</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
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
                        <h5>Dashboard Admin</h5>
                        <h6>Users Management</h6>
                        <!-- button tambah -->
                        <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal"
                            data-bs-target="#modalCreate">Tambah User</button>
                    </div>

                    <div class="card-body pb-2">
                        <div id="alertBox" class="alert d-none text-white" role="alert"></div>
                        <div class="table-responsive">
                            <table id="tableUser" class="table table-striped nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Created Date</th>
                                        <th>Last Update</th>
                                        <th>Role</th>
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
                                        Apakah Anda yakin ingin menghapus user ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="deleteData()">Hapus</button>
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
                                                    Tambah User Baru
                                                </h3>
                                            </div>

                                            <div class="card-body pb-3">
                                                <form action="<?= base_url('user-management/newData') ?>" method="post">

                                                    <div class="mb-2">
                                                        <label>Nama</label>
                                                        <input type="text" name="name" class="form-control"
                                                            placeholder="Masukkan Nama" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label>Username</label>
                                                        <input type="text" name="username" class="form-control"
                                                            placeholder="Masukkan username">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label>Password</label>
                                                        <input type="password" name="password" id="password"
                                                            class="form-control" placeholder="Masukkan password">
                                                    </div>
                                                    <div class="mb-2" id="confirmWrapper" style="display:none;">
                                                        <label>Konfirmasi Password</label>
                                                        <input type="password" id="password_conf" name="password_conf"
                                                            class="form-control">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label>Role</label>
                                                        <select name="role" class="form-control">
                                                            <option value="staff">Staff</option>
                                                            <option value="manajer">Manajer</option>
                                                            <option value="admin">Admin</option>
                                                        </select>
                                                    </div>

                                                    <div class="text-center">
                                                        <button type="submit"
                                                            class="btn bg-gradient-primary btn-lg w-100 mt-4 mb-0">
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

                                    <form id="formEdit" action="<?= base_url('user-management/updateData') ?>"
                                        method="post">

                                        <div class="card-header pb-0 text-left">
                                            <h3 class="font-weight-bolder text-primary text-gradient">
                                                Edit User
                                            </h3>
                                        </div>

                                        <div class="modal-body">

                                            <div class="mb-2">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" id="edit_name" name="name">
                                            </div>
                                            <div class="mb-2">
                                                <label>Username</label>
                                                <input type="text" class="form-control" id="edit_username_display"
                                                    disabled>
                                                <input type="hidden" name="username" id="edit_username">
                                            </div>
                                            <div class="mb-2">
                                                <label>Password Baru</label>
                                                <input type="password" class="form-control" id="edit_password"
                                                    name="password">
                                            </div>
                                            <div class="mb-2" id="confirmWrapperEdit" style="display:none;">
                                                <label>Konfirmasi Password Baru</label>
                                                <input type="password" id="edit_password_conf" name="password_conf"
                                                    class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <label>Role</label>
                                                <select name="role" id="edit_role" class="form-control">
                                                    <option value="staff">Staff</option>
                                                    <option value="manajer">Manajer</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
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


            function showAlert(type, message) {
                const alertBox = $('#alertBox');

                alertBox
                    .removeClass('d-none alert-success alert-danger alert-warning')
                    .addClass('alert-' + type)
                    .html(message);

                if (type === 'warning') {
                    alertBox.removeClass('text-white').addClass('text-dark');
                }

                // auto hide 3 detik
                setTimeout(() => {
                    alertBox.addClass('d-none');
                }, 3000);
            }

            // Hapus Data
            function deleteData() {
                if (!window.deleteId) return;
                $.ajax({
                    url: "/user-management/deleteData",
                    method: "POST",
                    data: { username: window.deleteId },
                    dataType: "json",
                    success: function (res) {
                        if (res.status) {
                            showAlert('success', res.message);
                            $('#tableUser').DataTable().ajax.reload(null, false);
                            $('#modalDelete').modal('hide');
                        } else {
                            showAlert('danger', res.message);
                            $('#modalDelete').modal('hide');
                        }
                    },
                    error: function () {
                        showAlert('danger', 'Terjadi kesalahan server');
                        $('#modalDelete').modal('hide');
                    }
                });

            }

            $(document).ready(function () {
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

                $('#password').on('input', function () {
                    if ($(this).val().length > 0) {
                        $('#confirmWrapper').slideDown();
                    } else {
                        $('#confirmWrapper').slideUp();
                    }
                });

                $('#edit_password').on('input', function () {
                    if ($(this).val().length > 0) {
                        $('#confirmWrapperEdit').slideDown();
                    } else {
                        $('#confirmWrapperEdit').slideUp();
                    }
                });

                // Inisialisasi DataTable
                let table = $('#tableUser').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollX: true,
                    ajax: {
                        url: "<?= base_url('user-management/getData') ?>",
                        type: "POST"
                    },
                    columns: [
                        {
                            data: "name"
                        },
                        {
                            data: "username"
                        },
                        {
                            data: "created_at"
                        },
                        {
                            data: "updated_at"
                        },
                        {
                            data: "role"
                        },
                        {
                            data: null,
                            orderable: false,
                            render: function (data, type, row) {
                                return `
                                    <button class="btn bg-gradient-info btn-sm mb-0 btnEdit" data-id="${row.username}">
                                    Edit
                                    </button>
                                    <button class="btn bg-gradient-danger btn-sm mb-0 btnDelete" data-id="${row.username}">
                                    Hapus
                                    </button>`;
                            }
                        }
                    ]
                });

                // Hapus Data
                $('#tableUser').on('click', '.btnDelete', function () {
                    window.deleteId = $(this).data('id');
                    $('#modalDelete').modal('show');
                });

                // Edit Data
                $('#tableUser').on('click', '.btnEdit', function () {
                    let id = $(this).data('id');

                    $.ajax({
                        url: "/user-management/getByUsername",
                        data: {
                            username: id
                        },
                        method: "GET",
                        success: function (res) {
                            if (res.status === true) {
                                let d = res.data;

                                $('#edit_name').val(d.name);
                                $('#edit_username_display').val(d.username);
                                $('#edit_username').val(d.username);
                                $('#edit_role').val(d.role);

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