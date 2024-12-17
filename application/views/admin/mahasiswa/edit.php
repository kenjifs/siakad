<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $data['title']; ?></h1>

    <!-- Form Edit Mahasiswa -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/mahasiswa/edit/' . $data['mahasiswa']->id); ?>">
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['mahasiswa']->nim; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['mahasiswa']->nama; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $data['mahasiswa']->email; ?>" required>
                </div>
                <div class="form-group">
                    <label for="no_telp">No Telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $data['mahasiswa']->no_telp; ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= $data['mahasiswa']->alamat; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('admin/mahasiswa'); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>