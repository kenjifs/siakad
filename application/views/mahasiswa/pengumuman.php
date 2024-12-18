<h3>Pengumuman Terbaru</h3>
<ul class="list-group">
    <?php foreach ($pengumuman as $p) : ?>
        <li class="list-group-item">
            <strong><?= $p->judul; ?></strong><br>
            <?= $p->isi; ?><br>
            <small class="text-muted">Tanggal: <?= date('d M Y', strtotime($p->tanggal)); ?></small>
        </li>
    <?php endforeach; ?>
</ul>