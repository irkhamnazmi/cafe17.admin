<div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end" style="background-color: black;" id="sidebar-wrapper">
            <div class="sidebar-heading" style="background-color: black;"><img width="100%" src="<?= BASEURL;?>/images/cafe17_w.svg" /></div>
            <ul class="nav flex-column">
                <li class="nav-item active">
                    <a class="nav-link" href="beranda.html">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.html">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kasir.html">Kasir</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pelanggan.html">Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="laporan.html">Laporan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transaksi.html">Transaksi</a>
                </li>
                <li class="nav-item" style="margin-top: 10%;">
                    <a class="nav-link" href="#">Keluar</a>
                </li>
              
            </ul>

            <ul class="nav flex-column text-center" style="margin-top: 100%;">
                <li class="nav-item">
                    <a class="nav-link" style="pointer-events: none;" href="#">© 2021 Cafe 17 Purwokerto</a>
                </li>
               
            </ul>

          
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->

            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <div class="container-fluid">
                    <img id="logo" style="display: none;" width="50%" src="<?= BASEURL;?>/images/cafe17_w.svg" />
                    <button class="btn btn-outline-light" id="sidebarToggle"><span
                            class="navbar-toggler-icon"></span></button>
                    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button> -->

                    <div class="navbar-expand text-right" id="navbarNavDropdown">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="iconify" data-inline="false" data-icon="carbon:user-avatar" style="font-size: 30px;"></span> Lorem Ipsum
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" style="pointer-events: none;" href="#">Admin</a>
                                    <a class="dropdown-item" href="#">Logout</a>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid" style="margin-left: 5%;">
                <h1 class="mt-4" style="margin-bottom: 5%;">Beranda</h1>
                <div class="row">
                    <div class="col">
                        <div class="card" style="width: 15rem; background-color: #FF0000;">
                            <div class="card-body">
                              <h2 class="card-title">Pelanggan</h2>
                              <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                            
                            </div>
                            <div class="card-footer text-end" style="border: none;">
                                <h2 class="card-title">0</h2>
                            </div>
                          </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 15rem; background-color: #0500FF;">
                            <div class="card-body">
                              <h2 class="card-title">Laporan</h2>
                              <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                            
                            </div>
                            <div class="card-footer text-end" style="border: none;">
                                <h2 class="card-title">0</h2>
                            </div>
                          </div>
                    </div>

                    <div class="col">
                        <div class="card" style="width: 15rem; background-color: #00C236;">
                            <div class="card-body">
                              <h2 class="card-title">Transaksi</h2>
                              <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                            
                            </div>
                            <div class="card-footer text-end" style="border: none;">
                                <h2 class="card-title">0</h2>
                            </div>
                          </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
   