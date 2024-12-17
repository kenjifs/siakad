<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Informasi Detail Pembayaran -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Detail Pembayaran
        </div>
        <div class="card-body">
            <p><strong>Nama Mahasiswa:</strong> <?= $tagihan->nama; ?></p>
            <p><strong>Jumlah Tagihan:</strong> Rp <?= number_format($tagihan->jumlah, 2, ',', '.'); ?></p>
            <p><strong>Status Pembayaran:</strong>
                <span class="badge badge-<?= ($tagihan->status == 'lunas') ? 'success' : 'warning'; ?>">
                    <?= ucfirst($tagihan->status); ?>
                </span>
            </p>
            <p><strong>Keterangan:</strong> <?= $tagihan->keterangan ?? '-'; ?></p>
            <p><strong>Tanggal Bayar:</strong> <?= isset($bukti->tanggal_bayar) ? date('d M Y H:i:s', strtotime($bukti->tanggal_bayar)) : '-'; ?></p>
        </div>
    </div>

    <!-- Bukti Pembayaran -->
    <?php if (isset($bukti->bukti_pembayaran)) : ?>
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                Bukti Pembayaran
            </div>
            <div class="card-body text-center">
                <img src="<?= base_url('uploads/bukti_pembayaran/' . $bukti->bukti_pembayaran); ?>" alt="Bukti Pembayaran" class="img-thumbnail" style="max-width: 400px;">
            </div>
        </div>
    <?php else : ?>
        <div class="alert alert-danger">Bukti pembayaran tidak tersedia.</div>
    <?php endif; ?>

    <!-- Tombol Verifikasi -->
    <?php if ($tagihan->status == 'menunggu verifikasi') : ?>
        <a href="<?= base_url('admin/pembayaran/verifikasi/' . $tagihan->id); ?>" class="btn btn-success" onclick="return confirm('Yakin ingin memverifikasi pembayaran ini?');">
            Verifikasi Pembayaran
        </a>
    <?php else : ?>
        <div class="alert alert-success">Pembayaran telah diverifikasi.</div>
    <?php endif; ?>
    <a href="<?= base_url('admin/pembayaran'); ?>" class="btn btn-secondary">Kembali</a>
</div>