<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Inventory PT Berkah</title>

    <meta name="description" content="Static &amp; Dynamic Tables" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="icon" href="<?= base_url()?>/assets/images/foto/berkah.png" type="image/ico/png" />
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/css/jquery.gritter.min.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/css/select2.min.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap-editable.min.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap-duallistbox.min.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap-multiselect.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/ace.min.css" class="ace-main-stylesheet"
        id="main-ace-style" />

    <!--[if lte IE 9]>
			<link rel="stylesheet" href="<?= base_url()?>aceadmin/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?= base_url()?>aceadmin/assets/css/ace-ie.min.css" />
		<![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?= base_url()?>assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
		<script src="<?= base_url()?>aceadmin/assets/js/html5shiv.min.js"></script>
		<script src="<?= base_url()?>aceadmin/assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="no-skin">
    <div id="navbar" class="navbar navbar-default          ace-save-state">
        <div class="navbar-container ace-save-state" id="navbar-container">
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>

            <div class="navbar-header pull-left">
                <a href="<?= base_url('admin'); ?>" class="navbar-brand">
                    <small>
                        <i class="ace-icon fa fa-university white"></i>
                        Inventory System
                    </small>
                </a>
            </div>

            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    <!-- <li class="green dropdown-modal">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                            <span class="badge badge-success">2</span>
                        </a>

                        <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                            <li class="dropdown-header">
                                <i class="ace-icon fa fa-envelope-o"></i>
                                2 Messages
                            </li>

                            <li class="dropdown-content">
                                <ul class="dropdown-menu dropdown-navbar">

                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="<?= base_url()?>assets/images/avatars/avatar4.png"
                                                class="msg-photo" alt="Bob's Avatar" />
                                            <span class="msg-body">
                                                <span class="msg-title">
                                                    <span class="blue">Bob:</span>
                                                    Nullam quis risus eget urna mollis ornare ...
                                                </span>

                                                <span class="msg-time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span>3:15 pm</span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="clearfix">
                                            <img src="<?= base_url()?>assets/images/avatars/avatar2.png"
                                                class="msg-photo" alt="Kate's Avatar" />
                                            <span class="msg-body">
                                                <span class="msg-title">
                                                    <span class="blue">Kate:</span>
                                                    Ciao sociis natoque eget urna mollis ornare ...
                                                </span>

                                                <span class="msg-time">
                                                    <i class="ace-icon fa fa-clock-o"></i>
                                                    <span>1:33 pm</span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown-footer">
                                <a href="inbox.html">
                                    See all messages
                                    <i class="ace-icon fa fa-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li> -->

                    <li class="light-blue dropdown-modal">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class="nav-user-photo"
                                src="http://ace.jeka.by/assets/images/avatars/profile-pic.jpg" />
                            <span class="user-info">
                                <small>Welcome,</small>
                                <?= $this->session->userdata('nama') ?>
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul
                            class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <a href="<?= base_url('setting'); ?>">
                                    <i class="ace-icon fa fa-cog"></i>
                                    Settings
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url('profile'); ?>">
                                    <i class="ace-icon fa fa-user"></i>
                                    Profile
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="<?= base_url('login/logout'); ?>">
                                    <i class="ace-icon fa fa-power-off"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.navbar-container -->
    </div>

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
        try {
            ace.settings.loadState('main-container')
        } catch (e) {}
        </script>

        <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
            <script type="text/javascript">
            try {
                ace.settings.loadState('sidebar')
            } catch (e) {}
            </script>

            <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                    <img src="<?= base_url()?>/assets/images/foto/cv.png" width="180" height="60">
                </div>

                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <img src="<?= base_url()?>/assets/images/foto/berkah.png" width="40" height="60">

                </div>
            </div><!-- /.sidebar-shortcuts -->


            <ul class="nav nav-list">
                <li class="<?php if($this->uri->segment(1) == 'admin'){ echo "active"; }else{ echo "";}?>">
                    <a href="<?= base_url('admin'); ?>">
                        <i class="menu-icon fa fa-th-large"></i>
                        <span class="menu-text"> Dashboard </span>
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="<?php if($this->uri->segment(1) == 'tb_kategori'){ echo "active open"; }
                    elseif($this->uri->segment(1) == 'tb_brand'){ echo "active open"; }
                    elseif($this->uri->segment(1) == 'tb_satuan'){ echo "active open"; }
                    elseif($this->uri->segment(1) == 'tb_unit'){ echo "active open"; }
                    elseif($this->uri->segment(1) == 'tb_suplier'){ echo "active open"; }
                    elseif($this->uri->segment(1) == 'tb_customer'){ echo "active open"; }
                    elseif($this->uri->segment(1) == 'tb_pemesan'){ echo "active open"; }
                    elseif($this->uri->segment(1) == 'tb_proyek'){ echo "active open"; }
                    else{ echo "";}?>">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-desktop"></i>
                        <span class="menu-text">
                            Master Data
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li
                            class="<?php if($this->uri->segment(1) == 'tb_kategori'){ echo "active"; }else{ echo "";}?>">
                            <a href="<?= base_url('tb_kategori'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Kategori
                            </a><b class="arrow"></b>
                        </li>
                        <li class="<?php if($this->uri->segment(1) == 'tb_brand'){ echo "active"; }else{ echo "";}?>">
                            <a href="<?= base_url('tb_brand'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Merk/Brand
                            </a><b class="arrow"></b>
                        </li>
                        <li class="<?php if($this->uri->segment(1) == 'tb_satuan'){ echo "active"; }else{ echo "";}?>">
                            <a href="<?= base_url('tb_satuan'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Satuan
                            </a><b class="arrow"></b>
                        </li>
                        <li class="<?php if($this->uri->segment(1) == 'tb_suplier'){ echo "active"; }else{ echo "";}?>">
                            <a href="<?= base_url('tb_suplier'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Supplier
                            </a><b class="arrow"></b>
                        </li>
                        <li class="<?php if($this->uri->segment(1) == 'tb_pemesan'){ echo "active"; }else{ echo "";}?>">
                            <a href="<?= base_url('tb_pemesan'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Pemesan
                            </a><b class="arrow"></b>
                        </li>
                        <li class="<?php if($this->uri->segment(1) == 'tb_customer'){ echo "active"; }else{ echo "";}?>">
                            <a href="<?= base_url('tb_customer'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Customer
                            </a><b class="arrow"></b>
                        </li>
                        <li class="<?php if($this->uri->segment(1) == 'tb_proyek'){ echo "active"; }else{ echo "";}?>">
                            <a href="<?= base_url('tb_proyek'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Nama Proyek
                            </a><b class="arrow"></b>
                        </li>
                        <li class="<?php if($this->uri->segment(1) == 'tb_unit'){ echo "active"; }else{ echo "";}?>">
                            <a href="<?= base_url('tb_unit'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Unit
                            </a><b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                <li class="<?php if($this->uri->segment(1) == 'tb_barang'){ echo "active"; }else{ echo "";}?>">
                    <a href="<?= base_url('tb_barang'); ?>">
                        <i class="menu-icon fa fa-briefcase"></i>
                        <span class="menu-text">
                            Master Barang
                            <span class="badge badge-success"><?= $this->db->get('tb_barang')->num_rows();?></span>
                        </span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="<?php if($this->uri->segment(1) == 'cetak_barcode'){ echo "active"; }else{ echo "";}?>">
                    <a href="<?= base_url('cetak_barcode'); ?>">
                        <i class="menu-icon fa fa-barcode"></i>
                        <span class="menu-text">
                            Cetak Barcode
                        </span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="<?php if($this->uri->segment(1) == 'tb_receiving'){ echo "active"; }else{ echo "";}?>">
                    <a href="<?= base_url('tb_receiving'); ?>">
                        <i class="menu-icon fa fa-shopping-cart"></i>
                        <span class="menu-text">
                            Barang Masuk
                            <span class="badge badge-info"></span>
                        </span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="<?php if($this->uri->segment(1) == 'tb_issuing'){ echo "active"; }else{ echo "";}?>">
                    <a href="<?= base_url('tb_issuing'); ?>">
                        <i class="menu-icon fa fa-truck"></i>
                        <span class="menu-text">
                            Barang Keluar
                            <span class="badge badge-info"></span>
                        </span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <li
                    class="<?php if($this->uri->segment(1) == 'tb_stok' && $this->uri->segment(2) == ''){ echo "active"; }else{ echo "";}?>">
                    <a href="<?= base_url('tb_stok'); ?>">
                        <i class="menu-icon fa fa-table"></i>
                        <span class="menu-text">
                            Stok
                            <span class="badge badge-info"><?= $this->db->get('tb_stok')->num_rows();?></span>
                        </span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="<?php if($this->uri->segment(2) == 'warning'){ echo "active"; }else{ echo "";}?>">
                    <a href="<?= base_url('tb_stok/warning'); ?>">
                        <i class="menu-icon fa fa-tag"></i>
                        <span class="menu-text">
                            Warning Stok
                            <span
                                class="badge badge-danger"><?= $this->db->join('tb_barang tb','tb.id_barang = st.id_barang')->where("`stok` <= min_stok")->get('tb_stok st')->num_rows();?></span>
                        </span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="<?= base_url('laporan_opname'); ?>">
                        <i class="menu-icon fa fa-folder-open"></i>
                        <span class="menu-text">Stok Opname </span>
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="<?php if($this->uri->segment(1) == 'laporan'){ echo "active open"; }
                    elseif($this->uri->segment(1) == 'laporan_issuing'){ echo "active open"; }
                    elseif($this->uri->segment(1) == 'laporan_stok'){ echo "active open"; }
                    elseif($this->uri->segment(1) == 'laporan_card'){ echo "active open"; }
                    else{ echo "";}?>">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-print"></i>
                        <span class="menu-text">
                            Laporan
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                        <li
                            class="<?php if($this->uri->segment(1) == 'laporan_card'){ echo "active"; }else{ echo "";}?>">
                            <a href="<?= base_url('laporan_card'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Kartu Stok
                            </a><b class="arrow"></b>
                        </li>
                        <li
                            class="<?php if($this->uri->segment(1) == 'laporan_stok'){ echo "active"; }else{ echo "";}?>">
                            <a href="<?= base_url('laporan_stok'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Stok
                            </a><b class="arrow"></b>
                        </li>
                        <li class="<?php if($this->uri->segment(1) == 'laporan'){ echo "active"; }else{ echo "";}?>">
                            <a href="<?= base_url('laporan'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Pembelian
                            </a><b class="arrow"></b>
                        </li>
                        <li
                            class="<?php if($this->uri->segment(1) == 'laporan_issuing'){ echo "active"; }else{ echo "";}?>">
                            <a href="<?= base_url('laporan_issuing'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Penjualan
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if($this->session->userdata('level') == 'superuser'):?>
                <li
                    class="<?php if($this->uri->segment(1) == 'tb_user' && $this->uri->segment(2) == ''){ echo "active"; }else{ echo "";}?>">
                    <a href="<?= base_url('tb_user'); ?>">
                        <i class="menu-icon fa fa-users"></i>
                        <span class="menu-text">
                            User
                            <span class="badge badge-info"><?= $this->db->get('pengguna')->num_rows();?></span>
                        </span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <li
                    class="<?php if($this->uri->segment(1) == 'tb_log' && $this->uri->segment(2) == ''){ echo "active"; }else{ echo "";}?>">
                    <a href="<?= base_url('tb_log'); ?>">
                        <i class="menu-icon fa fa-exchange"></i>
                        <span class="menu-text">
                            Log Aktifitas
                            <span class="badge badge-info"><?= $this->db->get('tb_log')->num_rows();?></span>
                        </span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <li
                    class="<?php if($this->uri->segment(1) == 'tb_akses' && $this->uri->segment(2) == ''){ echo "active"; }else{ echo "";}?>">
                    <a href="<?= base_url('tb_akses'); ?>">
                        <i class="menu-icon fa fa-key"></i>
                        <span class="menu-text">
                            Hak Akses
                        </span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <?php endif;?>
                <li class="">
                    <a href="<?= base_url('login/logout'); ?>">
                        <i class="menu-icon fa fa-sign-out"></i>
                        <span class="menu-text">Keluar </span>
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul><!-- /.nav-list -->

            <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
                    data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
            </div>
        </div>

        <div class="main-content">
            <div class="main-content-inner">


                <div class="page-content">
                    <?= $contents;?>
                </div><!-- /.page-content -->
            </div>
        </div><!-- /.main-content -->

        <div class="footer">
            <div class="footer-inner">
                <div class="footer-content">
                    <span class="bigger-120">
                        <img src="<?= base_url()?>/assets/images/foto/berkah.png" alt="logo" width="30" height="30">
                        <span class="blue bolder">Inventory System</span>
                        PT Berkah &copy; <?= date('Y')?>
                    </span>

                    &nbsp; &nbsp;
                </div>
            </div>
        </div>

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="<?= base_url()?>assets/js/jquery-2.1.4.min.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
<script src="<?= base_url()?>aceadmin/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write(
        "<script src='<?= base_url()?>assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
    <script src="<?= base_url()?>assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->
    <script src="<?= base_url()?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url()?>assets/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url()?>assets/js/buttons.flash.min.js"></script>
    <script src="<?= base_url()?>assets/js/buttons.html5.min.js"></script>
    <script src="<?= base_url()?>assets/js/buttons.print.min.js"></script>
    <script src="<?= base_url()?>assets/js/buttons.colVis.min.js"></script>
    <script src="<?= base_url()?>assets/js/dataTables.select.min.js"></script>

    <script src="<?= base_url()?>assets/js/jquery-ui.custom.min.js"></script>
    <script src="<?= base_url()?>assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?= base_url()?>assets/js/jquery.gritter.min.js"></script>
    <script src="<?= base_url()?>assets/js/bootbox.js"></script>
    <script src="<?= base_url()?>assets/js/jquery.easypiechart.min.js"></script>
    <script src="<?= base_url()?>assets/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url()?>assets/js/jquery.hotkeys.index.min.js"></script>
    <script src="<?= base_url()?>assets/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?= base_url()?>assets/js/spinbox.min.js"></script>
    <script src="<?= base_url()?>assets/js/bootstrap-editable.min.js"></script>
    <script src="<?= base_url()?>assets/js/ace-editable.min.js"></script>
    <script src="<?= base_url()?>assets/js/jquery.maskedinput.min.js"></script>

    <script src="<?= base_url()?>assets/js/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="<?= base_url()?>assets/js/jquery.raty.min.js"></script>
    <script src="<?= base_url()?>assets/js/bootstrap-multiselect.min.js"></script>
    <script src="<?= base_url()?>assets/js/select2.min.js"></script>
    <script src="<?= base_url()?>assets/js/jquery-typeahead.js"></script>
    <!-- ace scripts -->
    <script src="<?= base_url()?>assets/js/ace-elements.min.js"></script>
    <script src="<?= base_url()?>assets/js/ace.min.js"></script>

    <script>
    setTimeout(function() {
        $(".alert").fadeOut("slow");
    }, 5000);
    $(document).ready(function() {
        $("#mytable").DataTable();
    });
    </script>

    <?php if($this->uri->segment(1) == "tb_barang" && $this->uri->segment(2) == "create" || $this->uri->segment(1) == "tb_barang" && $this->uri->segment(2) == "update"):?>
    <script>
    let bilangan = document.getElementById("tanpa-rupiah").value;

    // Solisi
    let number_string = bilangan.toString(),
        sisa = number_string.length % 3,
        rupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    document.getElementById("tanpa-rupiah").value = rupiah;

    // ------------------------------------------------------------------
    let bilangan2 = document.getElementById("tanpa-rupiah2").value;

    // Solisi
    let number_string2 = bilangan2.toString(),
        sisa2 = number_string2.length % 3,
        rupiah2 = number_string2.substr(0, sisa2),
        ribuan2 = number_string2.substr(sisa2).match(/\d{3}/gi);

    if (ribuan2) {
        separator2 = sisa2 ? '.' : '';
        rupiah2 += separator2 + ribuan2.join('.');
    }
    document.getElementById("tanpa-rupiah2").value = rupiah2;
    //-----------------------------------
    var tanpa_rupiah = document.getElementById('tanpa-rupiah');
    tanpa_rupiah.addEventListener('keyup', function(e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });

    tanpa_rupiah.addEventListener('keydown', function(event) {
        limitCharacter(event);
    });

    var tanpa_rupiah2 = document.getElementById('tanpa-rupiah2');
    tanpa_rupiah2.addEventListener('keyup', function(e) {
        tanpa_rupiah2.value = formatRupiah(this.value);
    });

    tanpa_rupiah2.addEventListener('keydown', function(event) {
        limitCharacter(event);
    });
    /* Fungsi */
    function formatRupiah(bilangan, prefix) {
        var number_string = bilangan.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function limitCharacter(event) {
        key = event.which || event.keyCode;
        if (key != 188 // Comma
            &&
            key != 8 // Backspace
            &&
            key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
            &&
            (key < 48 || key > 57) // Non digit
            // Dan masih banyak lagi seperti tombol del, panah kiri dan kanan, tombol tab, dll
        ) {
            // event.preventDefault();
            // return false;
        }
    }
    //-----------------------------
    function sum() {
        var bil1 = document.getElementById('tanpa-rupiah').value;
        var bila1 = bil1.replace(".", "").replace(".", "").replace(".", "").replace(".", "").replace(".", "").replace(
            ".", "").replace(".", "").replace(".", "").replace(".", "").replace(".", "").replace(".", "").replace(
            ".", "").replace(".", "");
        var result = parseInt(bila1) * 10 / 100;
        var result1 = parseInt(bila1) + parseInt(result);
        // console.log(result + "+" + bila1 + "=" + result1);
        if (!isNaN(result1)) {
            let number_string = result1.toString(),
                sisa = number_string.length % 3,
                rupiah = number_string.substr(0, sisa),
                ribuan = number_string.substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            document.getElementById('tanpa-rupiah2').value = rupiah;
        }
    }
    </script>
    <?php endif;?>

    <?php if($this->uri->segment(2) == "update"):?>
    <script>
    function myFunction() {
        var x = document.getElementById("dis");
        x.disabled = false;
    }
    </script>
    <?php endif;?>

    <?php if($this->uri->segment(1) == "cetak_barcode"):?>
    <script src="<?= base_url('assets/') ?>js/jQuery.print.min.js"></script>
    <script>
        <?php if (isset($_GET['barcode'])) {
                    $barcode = $_GET['barcode'];
                    $row = $this->db->get_where('tb_barang', ['kode_barcode' => $barcode])->row_array();
                    $harga = $row['harga_jual'];
                    $kode = $row['kode_barcode'];
        }?>

        function selectNameBarang(){
            $("form").submit();
        }

        function buatBc(){
            let cek = $('#harga_barang').val();
            if(cek == ''){
                alert("Silahkan pilih nama barang terlebih dahulu");
            }else{
                let nama = $('select').find(':selected').attr('data-nama');
                let harga = $('#harga_barang').val();
                let code = $('#code').val();
                let jumlah = $('#jumlah').val();
                $("#hasil").html("<h3>Hasil Generate Barcode 😊</h3>");
                for (let a = 1; a <= jumlah; a++) {
                    <?php if (isset($_GET['barcode'])) : ?>
                        $("#bar_disini").append(`
                            <div class="col-xs-2 text-center ">
                                <div class="kotak-barcode mb-4">
                                    <div  class="bg-white p-2" style="border:1px solid #000;padding:10px;"> 
                                            <?= "<img alt='Barcode Generator TEC-IT' src='https://barcode.tec-it.com/barcode.ashx?data=" . $kode . "&code=EAN13&multiplebarcodes=true&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0' />" ?><br>
                                    </div>
                                        <h5 class="text-center mb-1 mt-2" style="color:#000;">` + nama + `</h5>
                                        <h5 class="text-center font-weight-normal mb-1" style="color:#000;">Rp. <?= rupiah($harga) ?></h5>
                                    </div>
                                </div>
                            </div>`);
                    <?php else : ?>
                    <?php endif; ?>
                }
                $('#cetak').html("<a class='btn btn-success btn-sm btn-round text-center' ><i class='fa fa-print'></i> Cetak</a>");
            }
        }
        
        $("#cetak").on('click', function() {
            $.print("#bar_disini");
        });
    </script>
    <?php endif;?>

    <?php if($this->uri->segment(1) == "admin"): ?>
    <script src="<?= base_url()?>assets/js/highcharts.js" type="text/javascript"></script>
    <script type="text/javascript">
    var chart1; // globally available
    $(document).ready(function() {
        chart1 = new Highcharts.Chart({
            chart: {
                backgroundColor: {
                    linearGradient: [0, 0, 500, 500],
                    stops: [
                        [0, 'rgb(255, 255, 255)'],
                        [1, 'rgb(240, 240, 255)']
                    ]
                },
                renderTo: 'container1',
                type: 'line'

            },
            colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572',
                '#FF9655', '#FFF263', '#6AF9C4'
            ],
            title: {
                text: 'Purchase and Sales Statistics'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    <?php foreach($chart_rev as $row):?>
                        '<?= date('M',strtotime($row->tgl))?>',
                    <?php endforeach;?>
                ]
            },
            yAxis: {
                title: {
                    text: 'Jumlah Barang'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: 'Penjualan',
                data: [
                    <?php foreach($chart_iss as $row):?>
                            <?=$row->total?>,
                    <?php endforeach;?>
                ]
            }, {
                name: 'Pembelian',
                data: [
                    <?php foreach($chart_rev as $row):?>
                            <?=$row->total?>,
                    <?php endforeach;?>
                ]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    });
    </script>
    <?php endif;?>


    <?php if($this->uri->segment(1) == "laporan_opname"): ?>
    <?php if($this->input->get('s', TRUE) != NULL): ?>
    <script>
    $(document).ready(function() {
        $('#table').dataTable({
            dom: 'Bfrtip',
            buttons: [

            ],
            ajax: '<?= base_url('') ?>laporan_opname/ajax/<?= $this->input->get('s', TRUE) ."/". $this->input->get('e', TRUE)."/".$this->input->get('u', TRUE) ?>',
            scrollY: 250,
            info: false,
            deferRender: true,
            scroller: true,
            searching: true,
        });
    });
    </script>
    <?php endif; ?>
    <?php endif; ?>

    <?php if($this->uri->segment(1) == "laporan_card"): ?>
    <?php if($this->input->get('s', TRUE) != NULL): ?>
    <script>
    $(document).ready(function() {
        $('#table').dataTable({
            dom: 'Bfrtip',
            buttons: [

            ],
            ajax: '<?= base_url('') ?>laporan_card/ajax/<?= $this->input->get('s', TRUE) ."/". $this->input->get('e', TRUE)."/".$this->input->get('u', TRUE)."/".$this->input->get('k', TRUE)."/".$this->input->get('i', TRUE) ?>',
            scrollY: 250,
            info: false,
            deferRender: true,
            scroller: true,
            searching: true,
        });
    });
    </script>
    <?php endif; ?>
    <?php endif; ?>

    <?php if($this->uri->segment(1) == "laporan"): ?>
    <?php if($this->input->get('s', TRUE) != NULL): ?>
    <script>
    $(document).ready(function() {
        $('#table').dataTable({
            dom: 'Bfrtip',
            buttons: [

            ],
            ajax: '<?= base_url('') ?>laporan/ajax/<?= $this->input->get('s', TRUE) ."/". $this->input->get('e', TRUE)."/".$this->input->get('u', TRUE) ?>',
            scrollY: 250,
            info: false,
            deferRender: true,
            scroller: true,
            searching: true,
        });
    });
    </script>
    <?php endif; ?>
    <?php endif; ?>

    <?php if($this->uri->segment(1) == "laporan_issuing"): ?>
    <?php if($this->input->get('s', TRUE) != NULL): ?>
    <script>
    $(document).ready(function() {
        $('#table').dataTable({
            dom: 'Bfrtip',
            buttons: [

            ],
            ajax: '<?= base_url('') ?>laporan_issuing/ajax/<?= $this->input->get('s', TRUE) ."/". $this->input->get('e', TRUE)."/".$this->input->get('u', TRUE) ?>',
            scrollY: 250,
            info: false,
            deferRender: true,
            scroller: true,
            searching: true,
        });
    });
    </script>
    <?php endif; ?>
    <?php endif; ?>
    <!-- inline scripts related to this page -->
    <script type="text/javascript">
    jQuery(function($) {
        $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
            e.stopImmediatePropagation();
            e.stopPropagation();
            e.preventDefault();
        });

        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function() {
            var th_checked = this.checked; //checkbox inside "TH" table header

            $(this).closest('table').find('tbody > tr').each(function() {
                var row = this;
                if (th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0)
                    .prop('checked', true);
                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop(
                    'checked', false);
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]', function() {
            var $row = $(this).closest('tr');
            if ($row.is('.detail-row ')) return;
            if (this.checked) $row.addClass(active_class);
            else $row.removeClass(active_class);
        });

        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({
            placement: tooltip_placement
        });

        //tooltip placement on right or left
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            //var w2 = $source.width();

            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
            return 'left';
        }

        /***************/
        $('.show-details-btn').on('click', function(e) {
            e.preventDefault();
            $(this).closest('tr').next().toggleClass('open');
            $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass(
                'fa-angle-double-up');
        });
        /***************/

    })
    </script>

    <?php if($this->uri->segment(1) == "profile"): ?>
    <script type="text/javascript">
    jQuery(function($) {

        //editables on first profile page
        $.fn.editable.defaults.mode = 'inline';
        $.fn.editableform.loading =
            "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
        $.fn.editableform.buttons =
            '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>' +
            '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';

        //editables 

        //text editable
        $('#username')
            .editable({
                type: 'text',
                name: 'username'
            });



        //select2 editable
        var countries = [];
        $.each({
            "CA": "Canada",
            "IN": "India",
            "NL": "Netherlands",
            "TR": "Turkey",
            "US": "United States"
        }, function(k, v) {
            countries.push({
                id: k,
                text: v
            });
        });

        var cities = [];
        cities["CA"] = [];
        $.each(["Toronto", "Ottawa", "Calgary", "Vancouver"], function(k, v) {
            cities["CA"].push({
                id: v,
                text: v
            });
        });
        cities["IN"] = [];
        $.each(["Delhi", "Mumbai", "Bangalore"], function(k, v) {
            cities["IN"].push({
                id: v,
                text: v
            });
        });
        cities["NL"] = [];
        $.each(["Amsterdam", "Rotterdam", "The Hague"], function(k, v) {
            cities["NL"].push({
                id: v,
                text: v
            });
        });
        cities["TR"] = [];
        $.each(["Ankara", "Istanbul", "Izmir"], function(k, v) {
            cities["TR"].push({
                id: v,
                text: v
            });
        });
        cities["US"] = [];
        $.each(["New York", "Miami", "Los Angeles", "Chicago", "Wysconsin"], function(k, v) {
            cities["US"].push({
                id: v,
                text: v
            });
        });

        var currentValue = "NL";
        $('#country').editable({
            type: 'select2',
            value: 'NL',
            //onblur:'ignore',
            source: countries,
            select2: {
                'width': 140
            },
            success: function(response, newValue) {
                if (currentValue == newValue) return;
                currentValue = newValue;

                var new_source = (!newValue || newValue == "") ? [] : cities[newValue];

                //the destroy method is causing errors in x-editable v1.4.6+
                //it worked fine in v1.4.5
                /**			
                $('#city').editable('destroy').editable({
                    type: 'select2',
                    source: new_source
                }).editable('setValue', null);
                */

                //so we remove it altogether and create a new element
                var city = $('#city').removeAttr('id').get(0);
                $(city).clone().attr('id', 'city').text('Select City').editable({
                    type: 'select2',
                    value: null,
                    //onblur:'ignore',
                    source: new_source,
                    select2: {
                        'width': 140
                    }
                }).insertAfter(city); //insert it after previous instance
                $(city).remove(); //remove previous instance

            }
        });

        $('#city').editable({
            type: 'select2',
            value: 'Amsterdam',
            //onblur:'ignore',
            source: cities[currentValue],
            select2: {
                'width': 140
            }
        });



        //custom date editable
        $('#signup').editable({
            type: 'adate',
            date: {
                //datepicker plugin options
                format: 'yyyy/mm/dd',
                viewformat: 'yyyy/mm/dd',
                weekStart: 1

                //,nativeUI: true//if true and browser support input[type=date], native browser control will be used
                //,format: 'yyyy-mm-dd',
                //viewformat: 'yyyy-mm-dd'
            }
        })

        $('#age').editable({
            type: 'spinner',
            name: 'age',
            spinner: {
                min: 16,
                max: 99,
                step: 1,
                on_sides: true
                //,nativeUI: true//if true and browser support input[type=number], native browser control will be used
            }
        });


        $('#login').editable({
            type: 'slider',
            name: 'login',

            slider: {
                min: 1,
                max: 50,
                width: 100
                //,nativeUI: true//if true and browser support input[type=range], native browser control will be used
            },
            success: function(response, newValue) {
                if (parseInt(newValue) == 1)
                    $(this).html(newValue + " hour ago");
                else $(this).html(newValue + " hours ago");
            }
        });

        $('#about').editable({
            mode: 'inline',
            type: 'wysiwyg',
            name: 'about',

            wysiwyg: {
                //css : {'max-width':'300px'}
            },
            success: function(response, newValue) {}
        });



        // *** editable avatar *** //
        try { //ie8 throws some harmless exceptions, so let's catch'em

            //first let's add a fake appendChild method for Image element for browsers that have a problem with this
            //because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
            try {
                document.createElement('IMG').appendChild(document.createElement('B'));
            } catch (e) {
                Image.prototype.appendChild = function(el) {}
            }

            var last_gritter
            $('#avatar').editable({
                type: 'image',
                name: 'avatar',
                value: null,
                //onblur: 'ignore',  //don't reset or hide editable onblur?!
                image: {
                    //specify ace file input plugin's options here
                    btn_choose: 'Change Avatar',
                    droppable: true,
                    maxSize: 110000, //~100Kb

                    //and a few extra ones here
                    name: 'avatar', //put the field name here as well, will be used inside the custom plugin
                    on_error: function(
                        error_type
                    ) { //on_error function will be called when the selected file has a problem
                        if (last_gritter) $.gritter.remove(last_gritter);
                        if (error_type == 1) { //file format error
                            last_gritter = $.gritter.add({
                                title: 'File is not an image!',
                                text: 'Please choose a jpg|gif|png image!',
                                class_name: 'gritter-error gritter-center'
                            });
                        } else if (error_type == 2) { //file size rror
                            last_gritter = $.gritter.add({
                                title: 'File too big!',
                                text: 'Image size should not exceed 100Kb!',
                                class_name: 'gritter-error gritter-center'
                            });
                        } else { //other error
                        }
                    },
                    on_success: function() {
                        $.gritter.removeAll();
                    }
                },
                url: function(params) {
                    // ***UPDATE AVATAR HERE*** //
                    //for a working upload example you can replace the contents of this function with 
                    //examples/profile-avatar-update.js

                    var deferred = new $.Deferred

                    var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
                    if (!value || value.length == 0) {
                        deferred.resolve();
                        return deferred.promise();
                    }


                    //dummy upload
                    setTimeout(function() {
                        if ("FileReader" in window) {
                            //for browsers that have a thumbnail of selected image
                            var thumb = $('#avatar').next().find('img').data('thumb');
                            if (thumb) $('#avatar').get(0).src = thumb;
                        }

                        deferred.resolve({
                            'status': 'OK'
                        });

                        if (last_gritter) $.gritter.remove(last_gritter);
                        last_gritter = $.gritter.add({
                            title: 'Avatar Updated!',
                            text: 'Uploading to server can be easily implemented. A working example is included with the template.',
                            class_name: 'gritter-info gritter-center'
                        });

                    }, parseInt(Math.random() * 800 + 800))

                    return deferred.promise();

                    // ***END OF UPDATE AVATAR HERE*** //
                },

                success: function(response, newValue) {}
            })
        } catch (e) {}

        /**
        //let's display edit mode by default?
        var blank_image = true;//somehow you determine if image is initially blank or not, or you just want to display file input at first
        if(blank_image) {
            $('#avatar').editable('show').on('hidden', function(e, reason) {
                if(reason == 'onblur') {
                    $('#avatar').editable('show');
                    return;
                }
                $('#avatar').off('hidden');
            })
        }
        */

        //another option is using modals
        $('#avatar2').on('click', function() {
            var modal =
                '<div class="modal fade">\
                        <div class="modal-dialog">\
                        <div class="modal-content">\
                            <div class="modal-header">\
                                <button type="button" class="close" data-dismiss="modal">&times;</button>\
                                <h4 class="blue">Change Avatar</h4>\
                            </div>\
                            \
                            <form class="no-margin">\
                            <div class="modal-body">\
                                <div class="space-4"></div>\
                                <div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
                            </div>\
                            \
                            <div class="modal-footer center">\
                                <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>\
                                <button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
                            </div>\
                            </form>\
                        </div>\
                        </div>\
                        </div>';


            var modal = $(modal);
            modal.modal("show").on("hidden", function() {
                modal.remove();
            });

            var working = false;

            var form = modal.find('form:eq(0)');
            var file = form.find('input[type=file]').eq(0);
            file.ace_file_input({
                style: 'well',
                btn_choose: 'Click to choose new avatar',
                btn_change: null,
                no_icon: 'ace-icon fa fa-picture-o',
                thumbnail: 'small',
                before_remove: function() {
                    //don't remove/reset files while being uploaded
                    return !working;
                },
                allowExt: ['jpg', 'jpeg', 'png', 'gif'],
                allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
            });

            form.on('submit', function() {
                if (!file.data('ace_input_files')) return false;

                file.ace_file_input('disable');
                form.find('button').attr('disabled', 'disabled');
                form.find('.modal-body').append(
                    "<div class='center'><i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>"
                );

                var deferred = new $.Deferred;
                working = true;
                deferred.done(function() {
                    form.find('button').removeAttr('disabled');
                    form.find('input[type=file]').ace_file_input('enable');
                    form.find('.modal-body > :last-child').remove();

                    modal.modal("hide");

                    var thumb = file.next().find('img').data('thumb');
                    if (thumb) $('#avatar2').get(0).src = thumb;

                    working = false;
                });


                setTimeout(function() {
                    deferred.resolve();
                }, parseInt(Math.random() * 800 + 800));

                return false;
            });

        });



        //////////////////////////////
        $('#profile-feed-1').ace_scroll({
            height: '250px',
            mouseWheelLock: true,
            alwaysVisible: true
        });

        $('a[ data-original-title]').tooltip();

        $('.easy-pie-chart.percentage').each(function() {
            var barColor = $(this).data('color') || '#555';
            var trackColor = '#E2E2E2';
            var size = parseInt($(this).data('size')) || 72;
            $(this).easyPieChart({
                barColor: barColor,
                trackColor: trackColor,
                scaleColor: false,
                lineCap: 'butt',
                lineWidth: parseInt(size / 10),
                animate: false,
                size: size
            }).css('color', barColor);
        });

        ///////////////////////////////////////////

        //right & left position
        //show the user info on right or left depending on its position
        $('#user-profile-2 .memberdiv').on('mouseenter touchstart', function() {
            var $this = $(this);
            var $parent = $this.closest('.tab-pane');

            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $this.offset();
            var w2 = $this.width();

            var place = 'left';
            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) place = 'right';

            $this.find('.popover').removeClass('right left').addClass(place);
        }).on('click', function(e) {
            e.preventDefault();
        });


        ///////////////////////////////////////////
        $('#user-profile-3')
            .find('input[type=file]').ace_file_input({
                style: 'well',
                btn_choose: 'Change avatar',
                btn_change: null,
                no_icon: 'ace-icon fa fa-picture-o',
                thumbnail: 'large',
                droppable: true,

                allowExt: ['jpg', 'jpeg', 'png', 'gif'],
                allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
            })
            .end().find('button[type=reset]').on(ace.click_event, function() {
                $('#user-profile-3 input[type=file]').ace_file_input('reset_input');
            })
            .end().find('.date-picker').datepicker().next().on(ace.click_event, function() {
                $(this).prev().focus();
            })
        $('.input-mask-phone').mask('(999) 999-9999');

        $('#user-profile-3').find('input[type=file]').ace_file_input('show_file_list', [{
            type: 'image',
            name: $('#avatar').attr('src')
        }]);


        ////////////////////
        //change profile
        $('[data-toggle="buttons"] .btn').on('click', function(e) {
            var target = $(this).find('input[type=radio]');
            var which = parseInt(target.val());
            $('.user-profile').parent().addClass('hide');
            $('#user-profile-' + which).parent().removeClass('hide');
        });



        /////////////////////////////////////
        $(document).one('ajaxloadstart.page', function(e) {
            //in ajax mode, remove remaining elements before leaving page
            try {
                $('.editable').editable('destroy');
            } catch (e) {}
            $('[class*=select2]').remove();
        });
    });
    </script>
    <?php endif; ?>

    <?php if($this->uri->segment(1) == "tb_barang"): ?>
    <script type="text/javascript">
    jQuery(function($) {
        var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({
            infoTextFiltered: '<span class="label label-purple label-lg">Filtered</span>'
        });
        var container1 = demo1.bootstrapDualListbox('getContainer');
        container1.find('.btn').addClass('btn-white btn-info btn-bold');

        /**var setRatingColors = function() {
        	$(this).find('.star-on-png,.star-half-png').addClass('orange2').removeClass('grey');
        	$(this).find('.star-off-png').removeClass('orange2').addClass('grey');
        }*/
        $('.rating').raty({
            'cancel': true,
            'half': true,
            'starType': 'i'
            /**,
            
            'click': function() {
            	setRatingColors.call(this);
            },
            'mouseover': function() {
            	setRatingColors.call(this);
            },
            'mouseout': function() {
            	setRatingColors.call(this);
            }*/
        }) //.find('i:not(.star-raty)').addClass('grey');



        //////////////////
        //select2
        $('.select2').css('width', '200px').select2({
            allowClear: true
        })
        $('#select2-multiple-style .btn').on('click', function(e) {
            var target = $(this).find('input[type=radio]');
            var which = parseInt(target.val());
            if (which == 2) $('.select2').addClass('tag-input-style');
            else $('.select2').removeClass('tag-input-style');
        });

        //////////////////
        $('.multiselect').multiselect({
            enableFiltering: true,
            enableHTML: true,
            buttonClass: 'btn btn-white btn-primary',
            templates: {
                button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"><span class="multiselect-selected-text"></span> &nbsp;<b class="fa fa-caret-down"></b></button>',
                ul: '<ul class="multiselect-container dropdown-menu"></ul>',
                filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
                filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default btn-white btn-grey multiselect-clear-filter" type="button"><i class="fa fa-times-circle red2"></i></button></span>',
                li: '<li><a tabindex="0"><label></label></a></li>',
                divider: '<li class="multiselect-item divider"></li>',
                liGroup: '<li class="multiselect-item multiselect-group"><label></label></li>'
            }
        });


        ///////////////////

        //typeahead.js
        //example taken from plugin's page at: https://twitter.github.io/typeahead.js/examples/
        var substringMatcher = function(strs) {
            return function findMatches(q, cb) {
                var matches, substringRegex;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function(i, str) {
                    if (substrRegex.test(str)) {
                        // the typeahead jQuery plugin expects suggestions to a
                        // JavaScript object, refer to typeahead docs for more info
                        matches.push({
                            value: str
                        });
                    }
                });

                cb(matches);
            }
        }

        $('input.typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'states',
            displayKey: 'value',
            source: substringMatcher(ace.vars['US_STATES']),
            limit: 10
        });


        ///////////////


        //in ajax mode, remove remaining elements before leaving page
        $(document).one('ajaxloadstart.page', function(e) {
            $('[class*=select2]').remove();
            $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox('destroy');
            $('.rating').raty('destroy');
            $('.multiselect').multiselect('destroy');
        });

    });
    </script>
    <?php endif; ?>

</body>

</html>