<?= $this->extend('layout/admin/layout') ?>
<?= $this->section('content') ?>

<main class="main-content position-relative border-radius-lg">
    
    <div class="container-fluid py-4">

        <div class="card mb-4">
            <div class="card-header pb-0">
                <h5>Edit Nilai-Mhs-Pertemuan</h5>
            </div>

            <div class="card-body px-3">

                <form action="<?= base_url('table/nilai-mhs-pertemuan/update/'.$item['id']) ?>" method="post">

                    <label>Nim</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nim" value="<?= $item['nim'] ?>" required>
                    </div>

                    <label>Rencana Pembelajaran</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="id_rencana_pembelajaran" value="<?= $item['id_rencana_pembelajaran'] ?>" required>
                    </div>

                    <label>Nilai Kompetensi</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nilai_kompetensi" value="<?= $item['nilai_kompetensi'] ?>" required>
                    </div>

                    <label>Status</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="status" value="<?= $item['status'] ?>" required>
                    </div>

                    <label>Keterangan</label>
                    <div class="input-group mb-3">
                        <textarea rows="3" class="form-control" name="keterangan" value="<?= $item['keterangan'] ?>" required ></textarea>
                    </div>

                    

                    <button type="submit" class="btn bg-gradient-primary">Update</button>
                    <a href="<?= base_url('table/nilai-mhs-pertemuan') ?>" class="btn btn-secondary">Kembali</a>

                </form>

            </div>
        </div>

    </div>

</main>

<?= $this->endSection() ?>