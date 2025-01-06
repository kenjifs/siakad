<div class="container mt-4">
    <h3><?= $title; ?></h3>

    <form method="POST" action="">
        <div class="form-group">
            <label for="mata_kuliah">Mata Kuliah</label>
            <input type="text" class="form-control" id="mata_kuliah" name="mata_kuliah" required>
        </div>
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="datetime-local" class="form-control" id="deadline" name="deadline" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>