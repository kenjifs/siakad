<div class="card mt-4">
    <div class="card-header bg-primary text-white">
        <h5>Profil Dosen</h5>
    </div>
    <div class="card-body">
        <p><strong>Nama:</strong> <?= $dosen->nama; ?></p>
        <p><strong>NIDN:</strong> <?= $dosen->nidn; ?></p>
        <p><strong>Email:</strong> <?= $dosen->email; ?></p>
        <p><strong>Nomor Telepon:</strong> <?= $dosen->no_telp; ?></p>
        <p><strong>Alamat:</strong> <?= $dosen->alamat; ?></p>
        <button class="btn btn-warning" data-toggle="modal" data-target="#editProfilModal">
            <i class="fas fa-edit"></i> Edit Profil
        </button>
    </div>
</div>

<!-- Modal Edit Profil -->
<div class="modal fade" id="editProfilModal" tabindex="-1" role="dialog" aria-labelledby="editProfilModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="<?= base_url('dosen/profile/update'); ?>">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editProfilModalLabel">Edit Profil</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $dosen->nama; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nidn">NIDN</label>
                        <input type="text" class="form-control" id="nidn" value="<?= $dosen->nidn; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $dosen->email; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $dosen->no_telp; ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $dosen->alamat; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>