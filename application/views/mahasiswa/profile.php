<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0"><?= $title; ?></h3>
        </div>
        <div class="card-body">
            <?php if (!empty($mahasiswa)) : ?>
                <!-- Detail Profil -->
                <p><strong>Nama:</strong> <?= $mahasiswa->nama; ?></p>
                <p><strong>NIM:</strong> <?= $mahasiswa->nim; ?></p>
                <p><strong>Email:</strong> <?= $mahasiswa->email; ?></p>
                <p><strong>Alamat:</strong> <?= $mahasiswa->alamat; ?></p>

                <!-- Tombol Edit -->
                <button class="btn btn-warning" data-toggle="modal" data-target="#editProfileModal">
                    <i class="fas fa-edit"></i> Edit Profil
                </button>
            <?php else : ?>
                <div class="alert alert-danger">Data mahasiswa tidak ditemukan.</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal Edit Profil -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('mahasiswa/profile/update'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa->nama; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $mahasiswa->email; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= $mahasiswa->alamat; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>