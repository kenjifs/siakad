<h3>Jadwal Kuliah</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Hari</th>
            <th>Jam</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jadwal_kuliah as $jadwal) : ?>
            <tr>
                <td><?= $jadwal->nama_mk; ?></td>
                <td><?= $jadwal->sks; ?></td>
                <td><?= $jadwal->hari; ?></td>
                <td><?= $jadwal->jam; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>