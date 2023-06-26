        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= site_url(); ?>" class="brand-link">
                <img src="<?= base_url('adminlte'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Toko Bangunan XYZ</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('adminlte'); ?>/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= site_url('myprofile'); ?>" class="d-block"><?= user()->username; ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= site_url('dashboard'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <?php if (in_groups('admin')) : ?>
                            <li class="nav-header">Management</li>
                            <li class="nav-item">
                                <a href="<?= site_url('manage_users'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Manage User
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('manage_supplier'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Manage Supplier
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Manage Items
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= site_url('catagory'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Catagory</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('item'); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Item</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('manage_supply'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Manage Supply
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('manage_request'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Request Item Out
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header">Report</li>
                            <li class="nav-item">
                                <a href="<?= site_url('purchase_report'); ?>" class="nav-link">
                                    <i class="nav-icon far fa-calendar-alt"></i>
                                    <p>
                                        Purchase Report
                                    </p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-header">Tools</li>
                        <li class="nav-item">
                            <a href="pages/calendar.html" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Calendar
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('myprofile'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-alt"></i>
                                <p>
                                    My Profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link">
                                <a href="<?= base_url('logout'); ?>" class="">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>
                                        Logout
                                    </p>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>