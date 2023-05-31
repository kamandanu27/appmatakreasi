<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div style="text-align: center; margin-bottom: 0px;">
            <img src="<?= base_url() ?>public/image/logo.png" alt="logomabar.png" width="100px;" >
        </div>
        
        <div class="pcoded-navigatio-lavel" style="text-align: left; padding-top: 0px;">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
   
            <li class="">
                <a href="<?= base_url() ?>dashboard">
                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>

           

            <li class="">
                <a href="<?= base_url() ?>pengawas">
                <span class="pcoded-micon"><i class="feather icon-sun"></i></span>
                <span class="pcoded-mtext">Data Pengawas</span>
                </a>
            </li>

            <li class="">
                <a href="<?= base_url() ?>pelanggan">
                <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                <span class="pcoded-mtext">Data Pelanggan</span>
                </a>
            </li>

            

            <li class="">
                <a href="<?= base_url() ?>proyek">
                <span class="pcoded-micon"><i class="feather icon-moon"></i></span>
                <span class="pcoded-mtext">Data Proyek</span>
                </a>
            </li>


            <li class="">
                <a href="<?= base_url() ?>progresproyek">
                <span class="pcoded-micon"><i class="feather icon-heart"></i></span>
                <span class="pcoded-mtext">Data Progres Proyek</span>
                </a>
            </li>

            <?php if($this->session->userdata('level') == 'Admin'){ ?>

            <li class="">
                <a href="<?= base_url() ?>user">
                <span class="pcoded-micon"><i class="feather icon-edit"></i></span>
                <span class="pcoded-mtext">Data Pengelola</span>
                </a>
            </li>

            <li class="">
                <a href="<?= base_url() ?>akun">
                <span class="pcoded-micon"><i class="feather icon-sun"></i></span>
                <span class="pcoded-mtext">Data Akun</span>
                </a>
            </li>

            <li class="">
                <a href="<?= base_url() ?>jurnal">
                <span class="pcoded-micon"><i class="feather icon-sun"></i></span>
                <span class="pcoded-mtext">Data Jurnal</span>
                </a>
            </li>

            <?php } ?>

            

            
            

            <li class="">
                <a href="<?= base_url() ?>login/logout">
                <span class="pcoded-micon"><i class="icofont icofont-sign-out"></i></span>
                <span class="pcoded-mtext">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</nav>