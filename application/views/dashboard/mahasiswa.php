<div class="container mt-4">
    <h3><?= $title; ?></h3>
    <hr>
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
    <h4>Jadwal Kuliah</h4>
    <?php if (!empty($jadwal_kuliah)) : ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Ruang</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($jadwal_kuliah as $item) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $item->mata_kuliah; ?></td>
                        <td><?= $item->hari; ?></td>
                        <td><?= $item->jam_mulai; ?> - <?= $item->jam_selesai; ?></td>
                        <td><?= $item->ruang; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">Tidak ada jadwal kuliah.</div>
    <?php endif; ?>
    <hr>
    <h4 class="mt-4">Nilai Mahasiswa</h4>
    <?php if (!empty($nilai)) : ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Semester</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($nilai as $item) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $item->mata_kuliah; ?></td>
                        <td><?= $item->semester; ?></td>
                        <td><?= $item->nilai; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">Belum ada nilai yang tersedia.</div>
    <?php endif; ?>
</div>