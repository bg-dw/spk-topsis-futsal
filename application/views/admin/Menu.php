<div id="left-menu">
    <div class="sub-left-menu scroll">
        <ul class="nav nav-list">
            <li>
                <div class="left-bg"></div>
            </li>
            <li class="time">
                <h1 class="animated fadeInLeft">21:00</h1>
                <p class="animated fadeInRight">Sat,October 1st 2029</p>
            </li>
            <li class="ripple">
                <a href="<?= base_url() ?>"><span class="fa-home fa"></span> Dashboard</a>
            </li>
            <li class="ripple">
                <a href="<?= base_url('admin/c_turnamen/') ?>"><span class="fa fa-futbol-o"></span>Turnamen</a>
            </li>
            <li class="ripple">
                <a href="<?= base_url('admin/c_club/') ?>"><span class="fa fa-suitcase"></span>Club</a>
            </li>
            <li class="ripple">
                <a href="<?= base_url('admin/c_pemain/') ?>"><span class="fa fa-users"></span>Pemain</a>
            </li>
            <li class="ripple">
                <a href="<?= base_url('admin/c_kriteria/') ?>"><span class="fa fa-database"></span>Kriteria</a>
            </li>
            <li class="ripple">
                <a class="tree-toggle nav-header"><span class="fa-calendar fa"></span> Pertandingan
                    <span class="fa-angle-right fa right-arrow text-right"></span>
                </a>
                <ul class="nav nav-list tree">
                    <li>
                        <a href="<?= base_url('admin/c_pertandingan/') ?>">Daftar Pertandingan</a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/c_pertandingan/daftar_detail_pertandingan') ?>">Detail Pertandingan</a>
                    </li>
                </ul>
            </li>
            <li class="ripple">
                <a href="<?= base_url('admin/c_perangkingan/') ?>"><span class="fa fa-trophy"></span>Perangkingan</a>
            </li>
            <li class="ripple">
                <a href="<?= base_url('about/') ?>"><span class="fa fa-question"></span>Tentang</a>
            </li>
        </ul>
    </div>
</div>