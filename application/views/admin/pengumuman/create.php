<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <form method="POST" action="<?= base_url('admin/pengumuman/create'); ?>">
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="form-group">
            <label for="isi">Isi Pengumuman</label>
            <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('admin/pengumuman'); ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>