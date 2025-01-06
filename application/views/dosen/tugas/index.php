<div class="container mt-4">
    <h3><?= $title; ?></h3>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php elseif ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <a href="<?= base_url('dosen/tugas/create'); ?>" class="btn btn-primary mb-3">Tambah Tugas</a>

    <?php if (!empty($tugas)) : ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Judul</th>
                    <th>Deadline</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($tugas as $item) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $item->mata_kuliah; ?></td>
                        <td><?= $item->judul; ?></td>
                        <td><?= date('d M Y H:i', strtotime($item->deadline)); ?></td>
                        <td>
                            <a href="<?= base_url('dosen/tugas/edit/' . $item->id); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= base_url('dosen/tugas/delete/' . $item->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus tugas ini?');">Hapus</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">Belum ada tugas.</div>
    <?php endif; ?>
</div>