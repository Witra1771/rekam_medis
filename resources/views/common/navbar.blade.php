
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('img/jatiUkir.png') }}" style="width:50px;">
                </div>
                <div class="sidebar-brand-text mx-1" style="font-size:18px;">Apotek  <br><b>Jati Ukir</b></div>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-white">
                Main
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ in_array($linkActive, ['dashboard']) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/dashboard') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-white">
                Operation
            </div>
            
            @if(Auth::user()->hak_akses == 'Admin Apotek')
            <!-- Nav Item - USer -->
            <li class="nav-item {{ in_array($linkActive, ['kelola_user']) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/kelola_user') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Kelola User</span></a>
            </li>

            <!-- Nav Item - Capsule -->
            <li class="nav-item {{ in_array($linkActive, ['kelola_obat']) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/kelola_obat') }}">
                    <i class="fas fa-fw fa-capsules"></i>
                    <span>Kelola Obat</span></a>
            </li>
            <!-- Nav Item - File -->
            <li class="nav-item {{ in_array($linkActive, ['laporan']) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/laporan/data') }}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Laporan</span></a>
            </li>
            @elseif(Auth::user()->hak_akses == 'Admin Pendaftaran')
            <!-- Nav Item - Pendaftaran -->
            <li class="nav-item {{ in_array($linkActive, ['pendaftaran']) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/pendaftaran') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pendaftaran</span></a>
            </li>
            <!-- Nav Item - Antrean -->
            <li class="nav-item {{ in_array($linkActive, ['antrean']) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/antrean') }}">
                    <i class="fas fa-fw fa-list-ol"></i>
                    <span>Antrean</span></a>
            </li>
            @elseif(Auth::user()->hak_akses == 'Dokter')
            <!-- Nav Item - Tebus Obat -->
            <li class="nav-item {{ in_array($linkActive, ['pemeriksaan']) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/pemeriksaan') }}">
                    <i class="fas fa-fw fa-notes-medical"></i>
                    <span>Pemeriksaan</span></a>
            </li>
            <!-- Nav Item - Data Pasien -->
            <li class="nav-item {{ in_array($linkActive, ['dataPasien']) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/DataPasienDok') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Pasien</span></a>
            </li>
            @elseif(Auth::user()->hak_akses == 'Apoteker')
            <!-- Nav Item - Tebus Obat -->
            <li class="nav-item {{ in_array($linkActive, ['TebusObat']) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/tebusObat') }}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Tebus Obat</span></a>
            </li>
            <!-- Nav Item - Data Pasien -->
            <li class="nav-item {{ in_array($linkActive, ['dataPasienApoteker']) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/dataPasienApoteker') }}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Data Pasien</span></a>
            </li>
            @endif


        </ul>
        <!-- End of Sidebar -->