<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <h4>Jadwal Kuliah</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mata Kuliah</th>
                <th>Hari</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jadwal_kuliah as $jadwal): ?>
                <tr>
                    <td><?= $jadwal->mata_kuliah; ?></td>
                    <td><?= $jadwal->hari; ?></td>
                    <td><?= $jadwal->waktu; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h4>Pengumuman</h4>
    <ul>
        <?php foreach ($pengumuman as $p): ?>
            <li><?= $p->judul; ?> - <?= $p->created_at; ?></li>
        <?php endforeach; ?>
    </ul>
</div>
