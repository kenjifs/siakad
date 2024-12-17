<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $data['title']; ?></h1>

    <!-- Form Tambah Mahasiswa -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/mahasiswa/create'); ?>">
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="no_telp">No Telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('admin/mahasiswa'); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>