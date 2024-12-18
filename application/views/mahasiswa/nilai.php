<h3>Nilai Mahasiswa</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($nilai as $n) : ?>
            <tr>
                <td><?= $n->nama_mk; ?></td>
                <td><?= $n->sks; ?></td>
                <td><?= $n->nilai; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>