<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="#"> <span class="align-middle">LMS</span> </a>
        <ul class="sidebar-nav">
            
            <li class="sidebar-header">Pages</li>

            <li class="sidebar-item <?= str_contains($_SERVER['REQUEST_URI'], 'dashboard') ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?= asset('../dashboard') ?>"> <i class=" align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span> </a>
            </li>

            <li class="sidebar-item <?= str_contains($_SERVER['REQUEST_URI'], 'profile') ? 'active' : '' ?>">
                <a class="sidebar-link" href="<?= asset('../profile') ?>"> <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span> </a>
            </li>
        </ul>
    </div>
</nav>