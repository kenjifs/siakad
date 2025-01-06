<div class="container mt-4">
    <h3><?= $title; ?></h3>

    <?php if (!empty($jadwal)) : ?>
        <table class="table table-bordered">
            <thead class="thead-dark">
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
                foreach ($jadwal as $item) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $item->mata_kuliah; ?></td>
                        <td><?= $item->kelas; ?></td>
                        <td><?= $item->hari; ?></td>
                        <td><?= date('H:i', strtotime($item->jam_mulai)); ?> - <?= date('H:i', strtotime($item->jam_selesai)); ?></td>
                        <td><?= $item->ruang; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <div class="alert alert-info">Tidak ada jadwal mengajar untuk saat ini.</div>
    <?php endif; ?>
</div>