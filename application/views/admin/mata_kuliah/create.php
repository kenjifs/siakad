<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <form method="POST" action="<?= base_url('admin/mata_kuliah/create'); ?>">
        <div class="form-group">
            <label for="kode_mk">Kode MK</label>
            <input type="text" class="form-control" id="kode_mk" name="kode_mk" required>
        </div>
        <div class="form-group">
            <label for="nama_mk">Nama Mata Kuliah</label>
            <input type="text" class="form-control" id="nama_mk" name="nama_mk" required>
        </div>
        <div class="form-group">
            <label for="sks">SKS</label>
            <input type="number" class="form-control" id="sks" name="sks" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('admin/mata_kuliah'); ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>