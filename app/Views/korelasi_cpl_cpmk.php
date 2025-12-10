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
                    <!-- <div class="input-group">
                        <form action="<?= base_url('/cari') ?>" method="GET" id="searchForm">
                            <span class="input-group-text text-body"><input type="search" id="searchInput" name="search" placeholder="Cari berdasarkan keterangan.." /><i class="fas fa-search" aria-hidden="true"></i></span>
                        </form>
                    </div> -->
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
                        <h5>Korelasi Capaian Pembelajaran</h5>
                        <h6>Daftar Pencapaian</h6>
                        <!-- button tambah -->
                        <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">
                            Tambah Data
                        </button>
                        <br>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive px-2">
                            <table class="table table-hover align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder px-2">No</th>
                                        <th class="text-uppercase text-xs font-weight-bolder px-2">Penyusun</th>
                                        <th class="text-uppercase text-xs font-weight-bolder px-2">Matakuliah</th>
                                        <th class="text-uppercase text-xs font-weight-bolder px-2">Capaian Pembelajaran</th>
                                        <th class="text-uppercase text-xs font-weight-bolder px-2">Sub Capaian Pembelajaran</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder px-2">Persentase (%)</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder px-2">Bobot Penilaian</th>
                                        <th class="text-center text-uppercase text-xs font-weight-bolder px-2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($items)): ?>
                                        <tr>
                                            <td colspan="8" class="text-center text-muted py-4">
                                                Data tidak ditemukan
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php $no = 1;
                                        foreach ($items as $row): ?>
                                            <tr>
                                                <td class="text-center"><?= $no ?></td>
                                                <td class="px-2 text-sm"><?= $row['id_penyusun'] ?></td>
                                                <td class="px-2 text-sm"><?= $row['id_matakuliah'] ?></td>
                                                <td class="px-2 w-25">
                                                    <textarea class="form-control bg-white" rows="3" style="resize: none;" disabled><?= $row['cpmk'] ?></textarea>
                                                </td>
                                                <td class="px-2 w-25">
                                                    <textarea class="form-control bg-white" rows="3" style="resize: none;" disabled><?= $row['sub_cpmk'] ?></textarea>
                                                </td>
                                                <td class="px-2 text-center"><?= $row['persentase'] ?></td>
                                                <td class="px-2 text-center"><?= $row['bobot_penilaian'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('korelasi-cpl-cpmk/' . $row['id'] . '/edit') ?>"
                                                        class="btn bg-gradient-info btn-block">
                                                        Edit
                                                    </a>

                                                    <a href="#"
                                                        data-href="<?= base_url('korelasi-cpl-cpmk/' . $row['id'] . '/delete') ?>"
                                                        onclick="confirmToDelete(this)"
                                                        class="btn bg-gradient-danger btn-block"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#confirm-dialog">
                                                        Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        endforeach; ?>
                                    <?php endif; ?>
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
                            <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card card-plain">

                                                <div class="card-header pb-0 text-left">
                                                    <h3 class="font-weight-bolder text-primary text-gradient">Tambah Korelasi CPL–CPMK</h3>
                                                    <p class="mb-0">Masukkan data CPL–CPMK</p>
                                                </div>

                                                <div class="card-body pb-3">
                                                    <form action="<?= base_url('korelasi-cpl-cpmk/new') ?>" method="post" role="form text-left">

                                                        <label>Penyusun</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" name="id_penyusun" placeholder="Masukkan Penyusun" required>
                                                        </div>

                                                        <label>Matakuliah</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" name="id_matakuliah" placeholder="Masukkan Matakuliah" required>
                                                        </div>

                                                        <!-- ================= CPMK ================= -->
                                                        <label>CPMK</label>
                                                        <div class="mb-3">
                                                            <textarea
                                                                class="form-control bg-white text-dark"
                                                                name="cpmk"
                                                                rows="3"
                                                                maxlength="255"
                                                                oninput="updateCount('cpmk', 'cpmkCount')"
                                                                placeholder="Masukkan CPMK"
                                                                required></textarea>
                                                            <small class="text-muted text-xs float-end">
                                                                <span id="cpmkCount">0</span>/255
                                                            </small>
                                                        </div>

                                                        <!-- ================= Sub CPMK ================= -->
                                                        <label>Sub CPMK</label>
                                                        <div class="mb-3">
                                                            <textarea
                                                                class="form-control bg-white text-dark"
                                                                name="sub_cpmk"
                                                                rows="3"
                                                                maxlength="255"
                                                                oninput="updateCount('sub_cpmk', 'subCount')"
                                                                placeholder="Masukkan Sub CPMK"
                                                                required></textarea>
                                                            <small class="text-muted text-xs float-end">
                                                                <span id="subCount">0</span>/255
                                                            </small>
                                                        </div>

                                                        <label>Persentase (%)</label>
                                                        <div class="input-group mb-3">
                                                            <input type="number" class="form-control" name="persentase" placeholder="Persentase (0–100)" min="0" max="100" required>
                                                        </div>

                                                        <label>Bobot Penilaian</label>
                                                        <div class="input-group mb-3">
                                                            <input type="number" class="form-control" name="bobot_penilaian" placeholder="Bobot Penilaian" min="0" max="100" required>
                                                        </div>

                                                        <div class="text-center">
                                                            <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">
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
                    const kategoriText = cells[3].textContent.toLowerCase();

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

        document.getElementById('modalCreate').addEventListener('shown.bs.modal', function() {
            const form = this.querySelector('form');
            if (form) {
                form.reset();

                document.getElementById('cpmkCount').textContent = '0';
                document.getElementById('subCount').textContent = '0';
            }
        });

        function updateCount(fieldName, counterId) {
            const field = document.getElementsByName(fieldName)[0];
            const counter = document.getElementById(counterId);
            counter.textContent = field.value.length;
        }
    </script>

</body>

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