<div class="container mt-4">
    <h3><?= $title; ?></h3>

    <?php if (!empty($nilai)) : ?>
        <table class="table table-bordered">
            <thead class="thead-dark">
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
        <div class="alert alert-info">Tidak ada data nilai untuk saat ini.</div>
    <?php endif; ?>
</div>