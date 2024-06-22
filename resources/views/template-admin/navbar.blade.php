<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ Request::is('/') ? 'active' : '' }}">
            <a href="/" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::is('pasien*') ? 'active' : '' }}">
            <a href="/pasien" class='sidebar-link'>
                <i class="bi bi-people-fill"></i>
                <span>Pasien</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::is('dokter*') ? 'active' : '' }}">
            <a href="/dokter" class='sidebar-link'>
                <i class="bi bi-person-arms-up"></i>
                <span>Dokter</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::is('rekammedis*') ? 'active' : '' }}">
            <a href="/rekammedis" class='sidebar-link'>
                <i class="bi bi-journal-plus"></i>
                <span>Rekam Medis</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::is('janjitemu*') ? 'active' : '' }}">
            <a href="/janjitemu" class='sidebar-link'>
                <i class="bi bi-journal-arrow-down"></i>
                <span>Janji Temu</span>
            </a>
        </li>
    </ul>
</div>
