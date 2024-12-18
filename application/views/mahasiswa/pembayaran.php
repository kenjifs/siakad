<div class="container mt-4">
    <h3><?= $title; ?></h3>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php elseif ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Bukti Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($tagihan)) : ?>
                <?php $no = 1;
                foreach ($tagihan as $t) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $t->keterangan; ?></td>
                        <td>Rp <?= number_format($t->jumlah, 2, ',', '.'); ?></td>
                        <td>
                            <span class="badge badge-<?= ($t->status == 'lunas') ? 'success' : (($t->status == 'menunggu verifikasi') ? 'warning' : 'danger'); ?>">
                                <?= ucfirst($t->status); ?>
                            </span>
                        </td>
                        <td>
                            <?php if ($t->status == 'belum bayar') : ?>
                                <form method="POST" action="<?= base_url('mahasiswa/pembayaran/upload_bukti'); ?>" enctype="multipart/form-data">
                                    <input type="hidden" name="tagihan_id" value="<?= $t->id; ?>">
                                    <input type="file" name="bukti_pembayaran" class="form-control-file mb-2" required>
                                    <button type="submit" class="btn btn-sm btn-primary">Upload</button>
                                </form>
                            <?php else : ?>
                                <span class="text-muted">Sudah diunggah</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada tagihan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>