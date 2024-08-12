<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="assets/images/logo.svg" alt="Logo">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Main Menu</li>
                <li class="sidebar-item">
                    <a href="/" class="sidebar-link">
                        <i data-feather="/" width="20"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-title">Data Imigrasi</li>
                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i data-feather="file-text" width="20"></i>
                        <span>Data</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="/keberangkatan">Data Keberangkatan</a></li>
                        <li><a href="/kepulangan">Data Kepulangan</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

<div id="main">
    <nav class="navbar navbar-header navbar-expand navbar-light">
        <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
        <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <div class="avatar mr-1">
                            <img src="assets/images/avatar/avatar-s-1.png" alt="Avatar">
                        </div>
                        <div class="d-none d-md-block d-lg-inline-block">Hi, {{ auth()->user()->nama }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/profile"><i data-feather="user"></i> Profil</a>
                        <div class="dropdown-divider"></div>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i>
                                Logout</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>