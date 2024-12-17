<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="<?= base_url('admin/dosen/edit/' . $dosen->id); ?>">
                <div class="form-group">
                    <label for="nidn">NIDN</label>
                    <input type="text" class="form-control" id="nidn" name="nidn" value="<?= $dosen->nidn; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $dosen->nama; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $dosen->email; ?>" required>
                </div>
                <div class="form-group">
                    <label for="no_telp">No Telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $dosen->no_telp; ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= $dosen->alamat; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('admin/dosen'); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>