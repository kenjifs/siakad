<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <a href="<?= base_url('admin/pengumuman/create'); ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Pengumuman
    </a>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($pengumuman as $p) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $p->judul; ?></td>
                    <td><?= date('d M Y', strtotime($p->tanggal)); ?></td>
                    <td>
                        <a href="<?= base_url('admin/pengumuman/edit/' . $p->id); ?>" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?= base_url('admin/pengumuman/delete/' . $p->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?');">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>