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
                    <a href="#">
                        <i class="menu-icon fa fa-folder-open"></i>
                        <span class="menu-text">Stok Opname </span>
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="<?php if($this->uri->segment(1) == 'laporan'){ echo "active open"; }
                    elseif($this->uri->segment(1) == 'laporan_issuing'){ echo "active open"; }
                    elseif($this->uri->segment(1) == 'laporan_stok'){ echo "active open"; }
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
    // let bilangan = document.getElementById("tanpa-rupiah").value;

    // // Solisi
    // let number_string = bilangan.toString(),
    //     sisa = number_string.length % 3,
    //     rupiah = number_string.substr(0, sisa),
    //     ribuan = number_string.substr(sisa).match(/\d{3}/gi);

    // if (ribuan) {
    //     separator = sisa ? '.' : '';
    //     rupiah += separator + ribuan.join('.');
    // }
    // document.getElementById("tanpa-rupiah").value = rupiah;

    // // ------------------------------------------------------------------
    // let bilangan2 = document.getElementById("tanpa-rupiah2").value;

    // // Solisi
    // let number_string2 = bilangan2.toString(),
    //     sisa2 = number_string2.length % 3,
    //     rupiah2 = number_string2.substr(0, sisa2),
    //     ribuan2 = number_string2.substr(sisa2).match(/\d{3}/gi);

    // if (ribuan2) {
    //     separator2 = sisa2 ? '.' : '';
    //     rupiah2 += separator2 + ribuan2.join('.');
    // }
    // document.getElementById("tanpa-rupiah2").value = rupiah2;
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
    <?php if($this->uri->segment(1) == "admin"): ?>
    <script src="<?= base_url()?>assets/js/highcharts.js" type="text/javascript"></script>
    <script type="text/javascript">
    var chart1; // globally available
    // $(document).ready(function() {
    //     chart1 = new Highcharts.Chart({
    //         chart: {
    //             renderTo: 'container',
    //             type: 'line'
    //         },
    //         title: {
    //             text: 'Item Barang Berdasarkan Kategori'
    //         },
    //         xAxis: {
    //             categories: ['Kategori']
    //         },
    //         yAxis: {
    //             title: {
    //                 text: 'Jumlah Item'
    //             }
    //         },
    //         series: [
    //             <?php //$data = $this->Admin_model->grap_kategori();
    // 							foreach($data as $row):?> {
    //                 name: '<?php //$row->nama_kategori?>',
    //                 data: [<?php //$row->stok?>],
    //             },
    //             <?php //endforeach;?>
    //         ]
    //     });
    // });
    </script>
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
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct',
                    'Nov', 'Dec'
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
                data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, {
                name: 'Pembelian',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
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



</body>

</html>