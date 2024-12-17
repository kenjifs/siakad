<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <a href="<?= base_url('admin/mata_kuliah/create'); ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Mata Kuliah
    </a>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($mata_kuliah as $mk) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $mk->kode_mk; ?></td>
                    <td><?= $mk->nama_mk; ?></td>
                    <td><?= $mk->sks; ?></td>
                    <td>
                        <a href="<?= base_url('admin/mata_kuliah/edit/' . $mk->id); ?>" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?= base_url('admin/mata_kuliah/delete/' . $mk->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?');">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>