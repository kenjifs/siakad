<h3>Status Pembayaran</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Keterangan</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pembayaran as $p) : ?>
            <tr>
                <td><?= $p->keterangan; ?></td>
                <td>Rp <?= number_format($p->jumlah, 2, ',', '.'); ?></td>
                <td>
                    <span class="badge badge-<?= ($p->status == 'lunas') ? 'success' : 'warning'; ?>">
                        <?= ucfirst($p->status); ?>
                    </span>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>