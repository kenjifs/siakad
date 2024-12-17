<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $data['title']; ?></h1>

    <!-- Notifikasi -->
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <!-- Tombol Tambah -->
    <a href="<?= base_url('admin/mahasiswa/create'); ?>" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Mahasiswa
    </a>

    <!-- Tabel Mahasiswa -->
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data['mahasiswa'])) : ?>
                <?php $no = 1;
                foreach ($data['mahasiswa'] as $mhs) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $mhs->nim; ?></td>
                        <td><?= $mhs->nama; ?></td>
                        <td><?= $mhs->email; ?></td>
                        <td><?= $mhs->no_telp; ?></td>
                        <td><?= $mhs->alamat; ?></td>
                        <td>
                            <a href="<?= base_url('admin/mahasiswa/edit/' . $mhs->id); ?>" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?= base_url('admin/mahasiswa/delete/' . $mhs->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?');">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data mahasiswa.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>