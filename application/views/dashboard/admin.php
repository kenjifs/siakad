<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <h5>Jumlah Mahasiswa</h5>
                    <h2><?= $jumlah_mahasiswa; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <h5>Jumlah Dosen</h5>
                    <h2><?= $jumlah_dosen; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    <h5>Jumlah Mata Kuliah</h5>
                    <h2><?= $jumlah_mata_kuliah; ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
