<div class="container mt-4">
    <h3><?= $title; ?></h3>

    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="mata_kuliah">Mata Kuliah</label>
            <input type="text" class="form-control" id="mata_kuliah" name="mata_kuliah" value="<?= $tugas->mata_kuliah; ?>" required>
        </div>
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?= $tugas->judul; ?>" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"><?= $tugas->deskripsi; ?></textarea>
        </div>
        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="datetime-local" class="form-control" id="deadline" name="deadline" value="<?= date('Y-m-d\TH:i', strtotime($tugas->deadline)); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>