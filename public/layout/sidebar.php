<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="#" class="brand-link text-center">
        <span class="brand-text font-weight-light" style="font-family: 'Berkshire Swash', cursive;"><strong>M</strong>utabaah</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-2 pb-2  d-flex">
            <div class="image">
                <?= (session()->get('gender') == 'ikhwan') ?  '<img src="' . base_url() . '/img/ikhwan.jpg" class="img-circle " alt="User Image">' : '<img src="' . base_url() . '/img/akhwat.jpg" class="img-circle " alt="User Image">'; ?>

            </div>
            <div class="I mt-1 ml-2">
                <a href="#" class="d-block"><?= session()->get('nama_user'); ?></a>
            </div>
        </div>
        <!-- Sidebar Admin -->
        <?php if (session()->get('level') == '1') { ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-compact" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="<?= base_url('Admin/Dashboard'); ?>" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Laporan
                                <i class="right fas fa-list"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: block;">
                            <li class="nav-item">
                                <a href="<?= base_url('Admin/Laporan/peserta'); ?>" class="nav-link">
                                    <i class="fa fa-check-double nav-icon"></i>
                                    <p>Peserta</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('Admin/Laporan/panitia'); ?>" class="nav-link">
                                    <i class="fa fa-check-double nav-icon"></i>
                                    <p>Panitia</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Kelola
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: block;">
                            <li class="nav-item">
                                <a href="<?= base_url('Admin/Peserta'); ?>" class="nav-link">
                                    <i class="fa fa-chalkboard-teacher nav-icon"></i>
                                    <p>Peserta</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('Admin/Panitia'); ?>" class="nav-link">
                                    <i class="fa fa-chalkboard-teacher nav-icon"></i>
                                    <p>Panitia</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('Admin/Info'); ?>" class="nav-link">
                                    <i class="fa fa-info nav-icon"></i>
                                    <p>Info</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">User</li>
                    <li class="nav-item">
                        <a href="<?= base_url('Admin/Akun'); ?>" class="nav-link active">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>Kelola Pengguna</p>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php } ?>
        <!-- Sidebar panitia -->
        <?php if (session()->get('level') == '2') { ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-compact" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="<?= base_url('Tutor/Dashboard'); ?>" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('Panitia/Laporan'); ?>" class="nav-link active">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Laporan</p>
                        </a>
                    </li>

                    <li class="nav-header">Akun</li>
                    <li class="nav-item">
                        <a href="<?= base_url('Panitia/Akun'); ?>" class="nav-link active">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>Kelola akun</p>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php } ?>
        <!-- Sidebar Peserta -->
        <?php if (session()->get('level') == '3') { ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-compact" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="<?= base_url('Peserta/Dashboard'); ?>" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('Peserta/Laporan'); ?>" class="nav-link active">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Laporan</p>
                        </a>
                    </li>

                    <li class="nav-header">Akun</li>
                    <li class="nav-item">
                        <a href="<?= base_url('Peserta/Akun'); ?>" class="nav-link active">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>Kelola akun</p>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php } ?>



        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>