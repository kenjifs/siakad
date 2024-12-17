<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <a href="<?= base_url('admin/dosen/create'); ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Dosen
    </a>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($dosen)) : ?>
                <?php $no = 1;
                foreach ($dosen as $dsn) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $dsn->nidn; ?></td>
                        <td><?= $dsn->nama; ?></td>
                        <td><?= $dsn->email; ?></td>
                        <td><?= $dsn->no_telp; ?></td>
                        <td><?= $dsn->alamat; ?></td>
                        <td>
                            <a href="<?= base_url('admin/dosen/edit/' . $dsn->id); ?>" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?= base_url('admin/dosen/delete/' . $dsn->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?');">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data dosen.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>