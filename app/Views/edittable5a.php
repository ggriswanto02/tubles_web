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
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div> 
        </div>
      </div>
    </nav>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-0">
            <div class="card-header pb-0">
                <h5>Form Edit</h5>
                
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="" method="post" id="text-editor">
                        <input type="hidden" name="no" value="<?= $table5a['no'] ?>" />
                        <div class="form-group mb-3">
                            <label for="semester">Semester</label>
                            <input type="text" name="semester" class="form-control" 
                                placeholder="table5b semester" value="<?= $table5a['semester'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama_dosen">Kode Mata Kuliah</label>
                            <input type="text" name="nama_dosen" class="form-control" 
                                placeholder="table5b nama_dosen" value="<?= $table5a['kode_matkul'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="mata_kuliah">Nama Mata Kuliah</label>
                            <input type="text" name="mata_kuliah" class="form-control" 
                                placeholder="table5b mata_kuliah" value="<?= $table5a['nama_matkul'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="bentuk_integrasi">Mata Kuliah Kompetensi</label>
                            <input type="text" name="bentuk_integrasi" class="form-control" 
                                placeholder="table5b bentuk_integrasi" value="<?= $table5a['matkul'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="bentuk_integrasi">Kuliah/Responsi/Tutorial</label>
                            <input type="text" name="bentuk_integrasi" class="form-control" 
                                placeholder="table5b bentuk_integrasi" value="<?= $table5a['bk_responsi'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="bentuk_integrasi">Seminar</label>
                            <input type="text" name="bentuk_integrasi" class="form-control" 
                                placeholder="table5b bentuk_integrasi" value="<?= $table5a['bk_seminar'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="bentuk_integrasi">Praktikum</label>
                            <input type="text" name="bentuk_integrasi" class="form-control" 
                                placeholder="table5b bentuk_integrasi" value="<?= $table5a['bk_praktikum'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="bentuk_integrasi">Konversi waktu ke jam</label>
                            <input type="text" name="bentuk_integrasi" class="form-control" 
                                placeholder="table5b bentuk_integrasi" value="<?= $table5a['kredit_ke_jam'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="bentuk_integrasi">Sikap</label>
                            <input type="text" name="bentuk_integrasi" class="form-control" 
                                placeholder="table5b bentuk_integrasi" value="<?= $table5a['cp_sikap'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="bentuk_integrasi">Pengetahuan</label>
                            <input type="text" name="bentuk_integrasi" class="form-control" 
                                placeholder="table5b bentuk_integrasi" value="<?= $table5a['cp_pengetahuan'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="bentuk_integrasi">Keterampilan Umum</label>
                            <input type="text" name="bentuk_integrasi" class="form-control" 
                                placeholder="table5b bentuk_integrasi" value="<?= $table5a['cp_keterampilan_umum'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="bentuk_integrasi">Keterampilan Khusus</label>
                            <input type="text" name="bentuk_integrasi" class="form-control" 
                                placeholder="table5b bentuk_integrasi" value="<?= $table5a['cp_keterampilan_khusus'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="bentuk_integrasi">Dokumen Rencana Pembelajaran</label>
                            <input type="text" name="bentuk_integrasi" class="form-control" 
                                placeholder="table5b bentuk_integrasi" value="<?= $table5a['dokumen_pembelajaran'] ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="bentuk_integrasi">Unit Penyelenggara</label>
                            <input type="text" name="bentuk_integrasi" class="form-control" 
                                placeholder="table5b bentuk_integrasi" value="<?= $table5a['unit_penyelenggara'] ?>" required>
                        </div>
                        

                        <div class="form-group">
                            <button type="submit" name="status" value="simpan" class="btn btn-primary">Simpan</button>
                            <button type="reset" name="status" value="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
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
 

  

  </body>

<?= $this->endSection() ?>