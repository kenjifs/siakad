<?php include('header.php'); ?>
<div id="wrapper">
    <!-- Sidebar -->
    <?php include('sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- Main Content -->
            <div class="container-fluid">
                <?= $this->load->view($content, null, true); ?>
            </div>
        </div>

        <!-- Footer -->
        <?php include('footer.php'); ?>
    </div>
</div>
