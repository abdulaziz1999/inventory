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
                            <img class="nav-user-photo" src="<?= $this->session->userdata('foto') ?>" />
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
                                <a href="<?= base_url('profil'); ?>">
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
                <li
                    class="<?php if($this->uri->segment(1) == 'laporan'){ echo "active open"; }elseif($this->uri->segment(1) == 'laporan_issuing'){ echo "active open"; }else{ echo "";}?>">
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
                        <li class="<?php if($this->uri->segment(1) == 'laporan'){ echo "active"; }else{ echo "";}?>">
                            <a href="<?= base_url('laporan'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Barang Masuk
                            </a><b class="arrow"></b>
                        <li
                            class="<?php if($this->uri->segment(1) == 'laporan_issuing'){ echo "active"; }else{ echo "";}?>">
                            <a href="<?= base_url('laporan_issuing'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Barang Keluar
                            </a>
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
    </script>
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
    $(document).ready(function() {
        chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'Item Barang Berdasarkan Kategori'
            },
            xAxis: {
                categories: ['Kategori']
            },
            yAxis: {
                title: {
                    text: 'Jumlah Item'
                }
            },
            series: [
                <?php $data = $this->Admin_model->grap_kategori();
								foreach($data as $row):?> {
                    name: '<?= $row->nama_kategori?>',
                    data: [<?= $row->stok?>],
                },
                <?php endforeach;?>
            ]
        });
    });
    </script>
    <script src="<?= base_url()?>assets/js/highcharts.js" type="text/javascript"></script>
    <script type="text/javascript">
    var chart1; // globally available
    $(document).ready(function() {
        chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'container1',
                type: 'column'
            },
            title: {
                text: 'Item Barang Berdasarkan Brand'
            },
            xAxis: {
                categories: ['Brand']
            },
            yAxis: {
                title: {
                    text: 'Jumlah Item'
                }
            },
            series: [
                <?php $data = $this->Admin_model->grap_brand();
								foreach($data as $row):?> {
                    name: '<?= $row->nama_brand?>',
                    data: [<?= $row->stok?>],
                },
                <?php endforeach;?>
            ]
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
            ajax: '<?= base_url('') ?>laporan/ajax/<?= $this->input->get('s', TRUE) ."/". $this->input->get('e', TRUE) ?>',
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
            ajax: '<?= base_url('') ?>laporan_issuing/ajax/<?= $this->input->get('s', TRUE) ."/". $this->input->get('e', TRUE) ?>',
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
                //initiate dataTables plugin
                var myTable =
                    $('#dynamic-table')
                    //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                    .DataTable({
                        bAutoWidth: false,
                        "aoColumns": [{
                                "bSortable": false
                            },
                            null, null, null, null, null,
                            {
                                "bSortable": false
                            }
                        ],
                        "aaSorting": [],


                        //"bProcessing": true,
                        //"bServerSide": true,
                        //"sAjaxSource": "http://127.0.0.1/table.php"	,

                        //,
                        //"sScrollY": "200px",
                        //"bPaginate": false,

                        //"sScrollX": "100%",
                        //"sScrollXInner": "120%",
                        //"bScrollCollapse": true,
                        //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                        //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                        //"iDisplayLength": 50


                        select: {
                            style: 'multi'
                        }
                    });



                $.fn.dataTable.Buttons.defaults.dom.container.className =
                    'dt-buttons btn-overlap btn-group btn-overlap';

                new $.fn.dataTable.Buttons(myTable, {
                    buttons: [{
                            "extend": "colvis",
                            "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                            "className": "btn btn-white btn-primary btn-bold",
                            columns: ':not(:first):not(:last)'
                        },
                        {
                            "extend": "copy",
                            "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                            "className": "btn btn-white btn-primary btn-bold"
                        },
                        {
                            "extend": "csv",
                            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                            "className": "btn btn-white btn-primary btn-bold"
                        },
                        {
                            "extend": "excel",
                            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                            "className": "btn btn-white btn-primary btn-bold"
                        },
                        {
                            "extend": "pdf",
                            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                            "className": "btn btn-white btn-primary btn-bold"
                        },
                        {
                            "extend": "print",
                            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                            "className": "btn btn-white btn-primary btn-bold",
                            autoPrint: false,
                            message: 'This print was produced using the Print button for DataTables'
                        }
                    ]
                });
                myTable.buttons().container().appendTo($('.tableTools-container'));

                //style the message box
                var defaultCopyAction = myTable.button(1).action();
                myTable.button(1).action(function(e, dt, button, config) {
                    defaultCopyAction(e, dt, button, config);
                    $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
                });


                var defaultColvisAction = myTable.button(0).action();
                myTable.button(0).action(function(e, dt, button, config) {

                    defaultColvisAction(e, dt, button, config);


                    if ($('.dt-button-collection > .dropdown-menu').length == 0) {
                        $('.dt-button-collection')
                            .wrapInner(
                                '<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                            .find('a').attr('href', '#').wrap("<li />")
                    }
                    $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
                    ////

                    setTimeout(function() {
                        $($('.tableTools-container')).find('a.dt-button').each(function() {
                            var div = $(this).find(' > div').first();
                            if (div.length == 1) div.tooltip({
                                container: 'body',
                                title: div.parent().text()
                            });
                            else $(this).tooltip({
                                container: 'body',
                                title: $(this).text()
                            });
                        });
                    }, 500);





                    myTable.on('select', function(e, dt, type, index) {
                        if (type === 'row') {
                            $(myTable.row(index).node()).find('input:checkbox').prop('checked', true);
                        }
                    });
                    myTable.on('deselect', function(e, dt, type, index) {
                        if (type === 'row') {
                            $(myTable.row(index).node()).find('input:checkbox').prop('checked', false);
                        }
                    });




                    /////////////////////////////////
                    //table checkboxes
                    $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

                    //select/deselect all rows according to table header checkbox
                    $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]')
                        .eq(0).on('click', function() {
                            var th_checked = this.checked; //checkbox inside "TH" table header

                            $('#dynamic-table').find('tbody > tr').each(function() {
                                var row = this;
                                if (th_checked) myTable.row(row).select();
                                else myTable.row(row).deselect();
                            });
                        });

                    //select/deselect a row when the checkbox is checked/unchecked
                    $('#dynamic-table').on('click', 'td input[type=checkbox]', function() {
                        var row = $(this).closest('tr').get(0);
                        if (this.checked) myTable.row(row).deselect();
                        else myTable.row(row).select();
                    });



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
                            if (th_checked) $(row).addClass(active_class).find(
                                'input[type=checkbox]').eq(0).prop('checked', true);
                            else $(row).removeClass(active_class).find('input[type=checkbox]')
                                .eq(0).prop('checked', false);
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





                    /**
                    //add horizontal scrollbars to a simple table
                    $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
                      {
                    	horizontal: true,
                    	styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
                    	size: 2000,
                    	mouseWheelLock: true
                      }
                    ).css('padding-top', '12px');
                    */


                })
    </script>



</body>

</html>