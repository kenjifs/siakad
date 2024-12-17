<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Form Edit Mata Kuliah -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/mata_kuliah/edit/' . $mata_kuliah->id); ?>">
                <div class="form-group">
                    <label for="kode_mk">Kode MK</label>
                    <input type="text" class="form-control" id="kode_mk" name="kode_mk" value="<?= $mata_kuliah->kode_mk; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_mk">Nama Mata Kuliah</label>
                    <input type="text" class="form-control" id="nama_mk" name="nama_mk" value="<?= $mata_kuliah->nama_mk; ?>" required>
                </div>
                <div class="form-group">
                    <label for="sks">SKS</label>
                    <input type="number" class="form-control" id="sks" name="sks" value="<?= $mata_kuliah->sks; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('admin/mata_kuliah'); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>