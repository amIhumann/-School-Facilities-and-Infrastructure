<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <?php if ($users['level'] == 'admin') : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('admin'); ?>">Admin</a>
                        <a class="collapse-item" href="<?= base_url('guru'); ?>">Guru</a>
                        <a class="collapse-item" href="<?= base_url('siswa'); ?>">Siswa</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Peralatan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('peralatan'); ?>">Peralatan</a>
                        <a class="collapse-item" href="<?= base_url('jenis'); ?>">Jenis</a>
                        <a class="collapse-item" href="<?= base_url('merk'); ?>">Merk</a>
                        <a class="collapse-item" href="<?= base_url('warna'); ?>">Warna</a>
                        <a class="collapse-item" href="<?= base_url('kategori'); ?>">Kategori</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#jadwal" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Jadwal</span>
                </a>
                <div id="jadwal" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('jadwal'); ?>">Jadwal</a>
                        <a class="collapse-item" href="<?= base_url('hari'); ?>">Hari</a>
                        <a class="collapse-item" href="<?= base_url('pelajaran'); ?>">Peralajaran</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kelas" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-school"></i>
                    <span>Kelas</span>
                </a>
                <div id="kelas" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('kelas_siswa'); ?>">Kelas Siswa</a>
                        <a class="collapse-item" href="<?= base_url('kelas'); ?>">Kelas</a>
                        <a class="collapse-item" href="<?= base_url('jurusan'); ?>">Jurusan</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pinjam" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-chalkboard"></i>
                    <span>Pinjam</span>
                </a>
                <div id="pinjam" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('peminjam'); ?>">Peminjam Guru</a>
                        <a class="collapse-item" href="<?= base_url('peminjam/siswa'); ?>">Peminjam Siswa</a>
                        <a class="collapse-item" href="<?= base_url('perbaikan'); ?>">Perbaikan</a>
                        <a class="collapse-item" href="<?= base_url('denda'); ?>">Denda</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pemesanan" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-truck"></i>
                    <span>Pemesanan</span>
                </a>
                <div id="pemesanan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('pemesanan'); ?>">Pemesanan Guru</a>
                        <a class="collapse-item" href="<?= base_url('pemesanan/siswa'); ?>">Pemesanan Siswa</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#peminjaman" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-shopping-basket"></i>
                    <span>Peminjaman</span>
                </a>
                <div id="peminjaman" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('peminjaman'); ?>">Peminjaman Guru</a>
                        <a class="collapse-item" href="<?= base_url('peminjaman/siswa'); ?>">Peminjaman Siswa</a>
                    </div>
                </div>
            </li>
        <?php endif; ?>
        <?php if ($users['level'] != 'admin') : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('guru/pinjam'); ?>">
                    <i class="fas fa-shopping-basket"></i>
                    <span>Pinjam</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('guru/pinjam'); ?>">
                    <i class="fas fa-shopping-basket"></i>
                    <span>Peminjaman</span></a>
            </li>
        <?php endif; ?>

        <!-- Divider -->



        <!-- Sidebar Message -->


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->


                <!-- Topbar Search -->

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->


                    <!-- Nav Item - Alerts -->


                    <!-- Nav Item - Messages -->


                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $users['email']; ?></span>
                            <img class="img-profile rounded-circle" src="<?php if (!empty($this->session->userdata('foto'))) {
                                                                                echo 'src/img/' . $users['foto'];
                                                                            } else {
                                                                                echo 'src/img/download.png';
                                                                            } ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= base_url('admin/profile'); ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->


                <!-- Content Row -->