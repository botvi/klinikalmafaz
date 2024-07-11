<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ Request::is('/') ? 'active' : '' }}">
            <a class='sidebar-link' href="/">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::is('pasien*') ? 'active' : '' }}">
            <a class='sidebar-link' href="/pasien">
                <i class="bi bi-people-fill"></i>
                <span>Pasien</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::is('dokter*') ? 'active' : '' }}">
            <a class='sidebar-link' href="/dokter">
                <i class="bi bi-person-arms-up"></i>
                <span>Dokter</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::is('perawat*') ? 'active' : '' }}">
            <a class='sidebar-link' href="/perawat">
                <i class="bi bi-person-arms-up"></i>
                <span>Perawat</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::is('layanan*') ? 'active' : '' }}">
            <a class='sidebar-link' href="/layanan">
                <i class="bi bi-person-arms-up"></i>
                <span>Layanan</span>
            </a>
        </li>
        <li class="sidebar-item {{ Request::is('beritas*') ? 'active' : '' }}">
            <a class='sidebar-link' href="/beritas">
                <i class="bi bi-newspaper"></i>
                <span>Berita</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::is('penyakit*') ? 'active' : '' }}">
            <a class='sidebar-link' href="/penyakit">
                <i class="bi bi-journal-plus"></i>
                <span>Data Penyakit</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::is('rekammedis*') ? 'active' : '' }}">
            <a class='sidebar-link' href="/rekammedis">
                <i class="bi bi-journal-plus"></i>
                <span>Riwayat Pasien</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::is('jadwal*') ? 'active' : '' }}">
            <a class='sidebar-link' href="/laporan">
                <i class="bi bi-journal-arrow-down"></i>
                <span>Laporan</span>
            </a>
        </li>

        {{-- logout --}}
        <li class="sidebar-item">
            <a class='sidebar-link' href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
            <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

        {{-- <li class="sidebar-item {{ Request::is('janjitemu*') ? 'active' : '' }}">
            <a class='sidebar-link' href="/janjitemu">
                <i class="bi bi-journal-arrow-down"></i>
                <span>Janji Temu</span>
            </a>
        </li> --}}
    </ul>
</div>
