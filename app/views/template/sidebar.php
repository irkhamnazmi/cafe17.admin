<div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end mr-5" style="background-color: black;" id="sidebar-wrapper">
            <div class="sidebar-heading" style="background-color: black;"><img width="250" src="<?= BASEURL;?>/images/cafe_17.png"/></div>
            <ul class="nav flex-column">
            <?php if(empty($_SESSION['cashier'])){
                   header('Location: ' .BASEURL.'/account');
            } else{
                if($_SESSION['cashier']['category'] == "Admin"):?>
                <li class="nav-item <?= $v = ('dashboard' == $data['page']) ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= BASEURL;?>/dashboard">Beranda</a>
                </li>
                <li class="nav-item <?= $v = ('blog' == $data['page']) ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= BASEURL;?>/blog">Blog</a>
                </li>
                <li class="nav-item <?= $v = ('menu' == $data['page']) ? 'active' : ''; ?>">
                    <a class="nav-link <?= $data['page'];?>" href="<?= BASEURL;?>/menu">Menu</a>
                </li>
                <li class="nav-item <?= $v = ('cashier' == $data['page']) ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= BASEURL;?>/cashier">Kasir</a>
                </li>
                <li class="nav-item <?= $v = ('user' == $data['page']) ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= BASEURL;?>/user">Pelanggan</a>
                </li>

                <?php endif;}?>

                <li class="nav-item <?= $v = ('report' == $data['page']) ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= BASEURL;?>/report">Laporan</a>
                </li>
                <li class="nav-item <?= $v = ('transaction' == $data['page']) ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= BASEURL;?>/transaction">Transaksi</a>
                </li>
                <!-- <li class="nav-item" style="margin-top: 10%;">
                    <a class="nav-link" href="#">Keluar</a>
                </li> -->
              
            </ul>

            <ul class="nav flex-column text-center" style=" position: absolute; bottom: 0;">
                <li class="nav-item">
                    <a class="nav-link" style="pointer-events: none;" href="#">© 2021 Cafe 17 Purwokerto</a>
                </li>
               
            </ul>
          
        </div>
       