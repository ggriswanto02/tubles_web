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
                        <h5>Tabel 5.c Integrasi Kegiatan Penelitian dalam Pembelajaran</h5>


                        <button type="button"  class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">
                            Tambah Aspek
                        </button>
                        <br>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <form action="<?= base_url('table/table5c/new') ?>" method="post" role="form text-left">
                            <table class="table table-hover align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder border">No</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder border">Aspek</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder border">Tingkat Kepuasan Mahasiswa
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="text-center text-secondary text-xxs font-weight-bolder">SANGAT BAIK</td>
                                                <td class="text-center text-secondary text-xxs font-weight-bolder">BAIK</td>
                                                <td class="text-center text-secondary text-xxs font-weight-bolder">CUKUP</td>
                                                <td class="text-center text-xxs font-weight-bolder">KURANG</td>
                                            </tr>
                                            <!-- Anda dapat menambahkan baris lain sesuai kebutuhan -->
                                        </table>
                                    </th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder border">Tindak Lanjut UPPS</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php
								echo "<h1>OK</h1>";
								print_r($table5c);
								?>
                                <?php $no=1; foreach($table5c as $row): ?>

                                    <tr>
                                    <td class="text-center">
                                        <p class="mb-0 text-sm"><?= $no; ?></p>
                                    </td>
                                    <td class="text-center">
                                        <p class="mb-0 text-sm"><?= $row['aspek'] ?></p>
                                    </td>
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="text-center text-secondary text-xxs font-weight-bolder">
                                                    <input type="radio" class="form-check-input" name="aspek<?= $no ?>_sangat_baik" value="sangat_baik" id="aspek<?= $no ?>_sangat_baik">
                                                </td>
                                                <td class="text-center text-secondary text-xxs font-weight-bolder">
                                                    <input type="radio" class="form-check-input" name="aspek<?= $no ?>_baik" value="baik" id="aspek<?= $no ?>_baik">
                                                </td>
                                                <td class="text-center text-secondary text-xxs font-weight-bolder">
                                                    <input type="radio" class="form-check-input" name="aspek<?= $no ?>_cukup" value="cukup" id="aspek<?= $no ?>_cukup">
                                                </td>
                                                <td class="text-center text-xxs font-weight-bolder">
                                                    <input type="radio" class="form-check-input" name="aspek<?= $no ?>_kurang" value="kurang" id="aspek<?= $no ?>_kurang">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="margin-left: 30%;">
                                        <p class="mb-0 text-sm">
                                            <input type="text" class="form-control" name="aspek" placeholder="TINDAK LANJUT UPPS" aria-label="aspek" aria-describedby="email-addon">
                                        </p>
                                    </td>
                                </tr>
                                    <?php $no++; endforeach ?>
                                </tbody>
                                <tbody>
                                <tr>
                                    <td>
                                        <p class="mb-0 text-sm"></p>
                                    </td>
                                    <td class="text-center">
                                        <p class="mb-0 text-sm"><b>Jumlah</b></p>
                                    </td>
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td id="jumlah1" class="text-center text-secondary text-xxs font-weight-bolder">0</td>
                                                <td id="jumlah2" class="text-center text-secondary text-xxs font-weight-bolder">0</td>
                                                <td id="jumlah3" class="text-center text-secondary text-xxs font-weight-bolder">0</td>
                                                <td id="jumlah4" class="text-center text-xxs font-weight-bolder">0</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-sm"></p>
                                    </td>
                                </tr>
                                </tbody>
                                <tr class="justify-content-end">
                                    <td>
                                        <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Tambah</button>
                                    </td>
                                </tr>
                                </form>

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
                                                    <form action="<?= base_url('table/table5c/new') ?>"  method="post" role="form text-left">

                                                        <label>No</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" name="no" placeholder="<?= $no; ?>" aria-label="no" aria-describedby="email-addon">
                                                        </div>
                                                        <label>Aspek</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" name="aspek" placeholder="aspek" aria-label="aspek" aria-describedby="email-addon">
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
<!--js jumlah-->
<script>
    function updateJumlah() {
        var jumlah1 = hitungJumlah('sangat_baik');
        var jumlah2 = hitungJumlah('baik');
        var jumlah3 = hitungJumlah('cukup');
        var jumlah4 = hitungJumlah('kurang');

        document.getElementById('jumlah1').innerText = jumlah1;
        document.getElementById('jumlah2').innerText = jumlah2;
        document.getElementById('jumlah3').innerText = jumlah3;
        document.getElementById('jumlah4').innerText = jumlah4;
    }

    function hitungJumlah(value) {
        var jumlah = 0;

        document.querySelectorAll('input[value="' + value + '"]:checked').forEach(function(radio) {
            jumlah++;
        });

        return jumlah;
    }

    document.querySelectorAll('input[type="radio"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            updateJumlah();
        });
    });
</script>
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


