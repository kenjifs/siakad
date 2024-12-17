<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Brand Logo -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIAKAD</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard Link -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Conditional Menu Based on Role -->
    <?php if ($this->session->userdata('role') == 'admin') : ?>
        <!-- Admin Links -->
        <hr class="sidebar-divider">
        <div class="sidebar-heading">Admin</div>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/mahasiswa'); ?>">
                <i class="fas fa-user-graduate"></i>
                <span>Data Mahasiswa</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/dosen'); ?>">
                <i class="fas fa-user-tie"></i>
                <span>Data Dosen</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/mata_kuliah'); ?>">
                <i class="fas fa-book"></i>
                <span>Data Mata Kuliah</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/pembayaran'); ?>">
                <i class="fas fa-money-bill"></i>
                <span>Data Pembayaran</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/pengumuman'); ?>">
                <i class="fas fa-bullhorn"></i>
                <span>Data Pengumuman</span>
            </a>
        </li>

    <?php elseif ($this->session->userdata('role') == 'mahasiswa') : ?>
        <!-- Mahasiswa Links -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('mahasiswa/jadwal'); ?>">
                <i class="fas fa-calendar"></i>
                <span>Jadwal Kuliah</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('mahasiswa/pembayaran'); ?>">
                <i class="fas fa-money-check-alt"></i>
                <span>Pembayaran</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>
<!-- End of Sidebar -->