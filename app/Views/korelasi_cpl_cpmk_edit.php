<?= $this->extend('layout/admin/layout') ?>
<?= $this->section('content') ?>

<main class="main-content position-relative border-radius-lg">
    <div class="container-fluid py-4">

        <div class="card mb-4">
            <div class="card-header pb-0">
                <h5>Edit Korelasi CPL–CPMK</h5>
            </div>

            <div class="card-body px-3">

                <form action="<?= base_url('korelasi-cpl-cpmk/update/' . $item['id']) ?>" method="post">

                    <!-- Penyusun -->
                    <label>Penyusun</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"
                            name="id_penyusun"
                            value="<?= esc($item['id_penyusun']) ?>"
                            required>
                    </div>

                    <!-- Matakuliah -->
                    <label>Matakuliah</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"
                            name="id_matakuliah"
                            value="<?= esc($item['id_matakuliah']) ?>"
                            required>
                    </div>

                    <!-- CPMK -->
                    <label>CPMK</label>
                    <textarea
                        class="form-control bg-white text-dark"
                        name="cpmk"
                        rows="3"
                        maxlength="255"
                        oninput="updateCount('cpmk', 'cpmkCount')"
                        required><?= esc($item['cpmk']) ?></textarea>

                    <small class="text-muted text-xs float-end mb-3">
                        <span id="cpmkCount">0</span>/255
                    </small>

                    <!-- Sub CPMK -->
                    <label>Sub CPMK</label>
                    <textarea
                        class="form-control bg-white text-dark"
                        name="sub_cpmk"
                        rows="3"
                        maxlength="255"
                        oninput="updateCount('sub_cpmk', 'subCount')"
                        required><?= esc($item['sub_cpmk']) ?></textarea>

                    <small class="text-muted text-xs float-end mb-3">
                        <span id="subCount">0</span>/255
                    </small>

                    <!-- Persentase -->
                    <label>Persentase (%)</label>
                    <div class="input-group mb-3">
                        <input type="number"
                            class="form-control"
                            name="persentase"
                            value="<?= $item['persentase'] ?>"
                            min="0" max="100"
                            oninput="this.value = Math.min(this.value, 100)"
                            required>
                    </div>

                    <!-- Bobot Penilaian -->
                    <label>Bobot Penilaian</label>
                    <div class="input-group mb-3">
                        <input type="number"
                            class="form-control"
                            name="bobot_penilaian"
                            value="<?= $item['bobot_penilaian'] ?>"
                            min="0" max="100"
                            oninput="this.value = Math.min(this.value, 100)"
                            required>
                    </div>

                    <!-- Buttons -->
                    <button type="submit" class="btn bg-gradient-primary">Update</button>
                    <a href="<?= base_url('korelasi-cpl-cpmk') ?>" class="btn btn-secondary">Kembali</a>

                </form>

            </div>
        </div>

    </div>
</main>

<script>
    function updateCount(fieldName, counterId) {
        const field = document.getElementsByName(fieldName)[0];
        const counter = document.getElementById(counterId);
        counter.textContent = field.value.length;
    }

    document.addEventListener("DOMContentLoaded", function() {
        updateCount('cpmk', 'cpmkCount');
        updateCount('sub_cpmk', 'subCount');
    });
</script>

<?= $this->endSection() ?>