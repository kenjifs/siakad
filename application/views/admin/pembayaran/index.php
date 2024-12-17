<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Notifikasi -->
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <!-- Tabel Tagihan -->
    <?php if (!empty($tagihan)) : ?>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Jumlah Tagihan</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($tagihan as $t) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $t->nama; ?></td>
                        <td>Rp <?= number_format($t->jumlah, 2, ',', '.'); ?></td>
                        <td>
                            <span class="badge badge-<?= ($t->status == 'lunas') ? 'success' : 'warning'; ?>">
                                <?= ucfirst($t->status); ?>
                            </span>
                        </td>
                        <td><?= $t->keterangan ?? '-'; ?></td>
                        <td>
                            <a href="<?= base_url('admin/pembayaran/detail/' . $t->id); ?>" class="btn btn-sm btn-info">
                                <i class="fas fa-info-circle"></i> Detail
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <!-- Pesan Jika Tidak Ada Data -->
        <div class="alert alert-warning text-center" role="alert">
            <strong>Tidak ada data tagihan yang tersedia.</strong>
        </div>
    <?php endif; ?>
</div>