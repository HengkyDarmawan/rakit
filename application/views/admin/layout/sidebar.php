<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('admin') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-desktop"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PC Builder</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- MASTER DATA -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Basic Master -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster"
            aria-expanded="true" aria-controls="collapseMaster">
            <i class="fas fa-database"></i>
            <span>Basic Master</span>
        </a>
        <div id="collapseMaster" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="<?= site_url('admin/categories') ?>">
                    Categories
                </a>

                <a class="collapse-item" href="<?= site_url('admin/brands') ?>">
                    Brands
                </a>

                <a class="collapse-item" href="<?= site_url('admin/cooler_support') ?>">
                    Cooler Socket Support
                </a>
                <a class="collapse-item" href="<?= site_url('admin/products') ?>">
                    Products
                </a>

            </div>
        </div>
    </li>

    <!-- Technical Spec Master -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSpec"
            aria-expanded="true" aria-controls="collapseSpec">
            <i class="fas fa-microchip"></i>
            <span>Technical Spec</span>
        </a>
        <div id="collapseSpec" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="<?= site_url('admin/sockets') ?>">
                    Sockets
                </a>

                <a class="collapse-item" href="<?= site_url('admin/ram_types') ?>">
                    RAM Types
                </a>

                <a class="collapse-item" href="<?= site_url('admin/ram_speeds') ?>">
                    RAM Speed
                </a>

                <a class="collapse-item" href="<?= site_url('admin/storage_types') ?>">
                    Storage Types
                </a>

                <a class="collapse-item" href="<?= site_url('admin/cooler_types') ?>">
                    Cooler Types
                </a>

                <a class="collapse-item" href="<?= site_url('admin/fan_types') ?>">
                    FAN Types
                </a>

                <a class="collapse-item" href="<?= site_url('admin/form_factors') ?>">
                    Form Factors
                </a>

                <a class="collapse-item" href="<?= site_url('admin/chipsets') ?>">
                    Chipsets
                </a>

            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- BUILDER -->
    <div class="sidebar-heading">
        Builder System
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/compatibility') ?>">
            <i class="fas fa-random"></i>
            <span>Compatibility Rules</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/builder/create') ?>">
            <i class="fas fa-cogs"></i>
            <span>PC Builds</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- PSU & Reports -->
    <div class="sidebar-heading">
        Analysis
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/psu-calculator') ?>">
            <i class="fas fa-bolt"></i>
            <span>PSU Calculator</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('admin/reports') ?>">
            <i class="fas fa-chart-bar"></i>
            <span>Reports</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>