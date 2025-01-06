<div class="container mt-4">
    <h3><?= $title; ?></h3>

    <!-- Pengumuman -->
    <h4>Pengumuman</h4>
    <?php if (!empty($pengumuman)) : ?>
        <?php foreach ($pengumuman as $p) : ?>
            <li class="list-group-item mb-3">
                <strong><?= $p->judul; ?></strong><br>
                <?= $p->isi; ?><br>
                <small class="text-muted">Tanggal: <?= date('d M Y', strtotime($p->tanggal)); ?></small>
            </li>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="alert alert-info">Belum ada pengumuman.</div>
    <?php endif; ?>
    <hr>

    <!-- Jadwal Mengajar -->
    <h4>Jadwal Mengajar</h4>
    <?php if (!empty($jadwal_mengajar)) : ?>
        <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Kelas</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Ruang</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($jadwal_mengajar as $item) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $item->mata_kuliah; ?></td>
                        <td><?= $item->kelas; ?></td>
                        <td><?= $item->hari; ?></td>
                        <td><?= $item->jam_mulai; ?> - <?= $item->jam_selesai; ?></td>
                        <td><?= $item->ruang; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">Belum ada jadwal mengajar.</div>
    <?php endif; ?>
    <hr>

    <!-- Tugas -->
    <h4>Tugas</h4>
    <?php if (!empty($tugas)) : ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Judul</th>
                    <th>Deadline</th>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">Belum ada tugas.</div>
    <?php endif; ?>
</div>