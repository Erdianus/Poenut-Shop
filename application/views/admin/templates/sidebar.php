<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?= $sidebar == 'dashboard' ? '' : 'collapsed' ?>" href="<?= site_url('dashboard') ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link <?= $sidebar == 'produk' ? '' : 'collapsed' ?>" data-bs-target="#icons-nav"
                data-bs-toggle="collapse" href="#">
                <i class="bi bi-shop"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= site_url('dashboard/produk') ?>">
                        <i class="bi bi-circle"></i><span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('dashboard/skincare') ?>">
                        <i class="bi bi-circle"></i><span>Skincare</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('dashboard/bodycare') ?>">
                        <i class="bi bi-circle"></i><span>Bodycare</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('dashboard/haircare') ?>">
                        <i class="bi bi-circle"></i><span>Haircare</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Icons Nav -->

        <li <?= $this->session->userdata('role_id') == 2 ? 'hidden' : '' ?> class="nav-item">
            <a class="nav-link <?= $sidebar == 'users' ? '' : 'collapsed' ?>" href="<?= site_url('dashboard/users') ?>">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
        <!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link <?= $sidebar == 'hero' ? '' : 'collapsed' ?>" href="<?= site_url('dashboard/hero') ?>">
                <i class="bi bi-gear"></i>
                <span>Hero Settings</span>
            </a>
        </li>
        <li <?= $this->session->userdata('role_id') == 2 ? 'hidden' : '' ?> class="nav-item">
            <a class="nav-link <?= $sidebar == 'approval' ? '' : 'collapsed' ?>"
                href="<?= site_url('dashboard/approval') ?>">
                <i class="bi bi-ui-checks"></i>
                <span>Approval</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->