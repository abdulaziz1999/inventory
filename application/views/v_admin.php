<div class="page-header">
    <marquee behavior="" direction=""><strong>
            <h1>Dashboard Inventory PT Berkah Sejahtera</h1>
        </strong></marquee>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="main-container ace-save-state">
            <div class="main-content-inner">
                <div class="container">
                    <div class="row">
                        <!-- <div class="col-sm-md-12"> -->
                        <!-- <div class="row"> -->
                        <div class="col-sm-md-12" style="margin-bottom: 50px;">
                            <div class="container" style="margin-left: 0px;">
                                <div class="col-sm-4 bg-primary text-center" style="border-radius: 15px 0px 0px 15px;">
                                    <h1><span class="ace-icon fa fa fa-truck"></span></h1>
                                    <h1><strong><?php $date = date('Y-m-d'); echo $this->db->get_where('tb_issuing_item',['waktu' => $date])->num_rows();?></strong>
                                    </h1>
                                    <br>
                                    <h4><strong>BARANG KELUAR HARI INI</strong></h4>
                                    <br>
                                </div>
                                <div class="col-sm-4 bg-primary text-center">
                                    <h1><span class="ace-icon fa fa-briefcase"></span></h1>
                                    <h1><strong><?= $this->db->get('tb_barang')->num_rows();?></strong>
                                    </h1>
                                    <br>
                                    <h4><strong>MASTER BARANG</strong></h4>
                                    <br>
                                </div>
                                <div class="col-sm-4 bg-primary text-center" style="border-radius: 0px 15px 15px 0px;">
                                    <h1><span class="ace-icon fa fa fa-shopping-cart"></span></h1>
                                    <h1><strong><?php $date = date('Y-m-d'); echo $this->db->get_where('tb_receiving_item',['waktu' => $date])->num_rows();?></strong>
                                    </h1>
                                    <br>
                                    <h4><strong>BARANG MASUK HARI INI</strong></h4>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>
            <div class="space-6"></div>
            <div class="hr hr32 hr-line"></div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="widget-box widget-color-blue" id="widget-box-12" style="height:455px;">
                        <div class="widget-header widget-header-flat">
                            <h4 class="widget-title lighter">
                                <i class="ace-icon fa fa-bar-chart-o"></i>
                                <b>Statistik Pembelian & Penjualan</b>
                            </h4>
                            <div class="widget-toolbar">
                                <a href="#" data-action="collapse"><i class="ace-icon fa fa-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main padding-4">
                                <div id="container1" class="col-sm-12"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hr hr32 hr-line"></div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="widget-box widget-color-blue">
                        <div class="widget-header widget-header-flat">
                            <h4 class="widget-title lighter"><i class="ace-icon fa fa-star orange"></i>
                                <b>Top 5 Max Stock</b>
                            </h4>
                            <div class="widget-toolbar">
                                <a href="#" data-action="collapse"><i class="ace-icon fa fa-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main no-padding">
                                <table class="table table-bordered table-striped">
                                    <thead class="thin-border-bottom">
                                        <tr>
                                            <!-- <th width="25%"><i class="ace-icon fa fa-lock blue"></i> Part Number</th> -->
                                            <th width="45%"><i class="ace-icon fa fa-caret-right blue"></i>Nama
                                                Barang
                                            </th>
                                            <th width="15%"><i class="ace-icon fa fa-caret-right blue"></i> Stock
                                            </th>
                                            <th width="15%" class="hidden-480"><i
                                                    class="ace-icon fa fa-caret-right blue"></i> Rank</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($barang_max->result() as $row):?>
                                        <tr>
                                            <td><?= $row->nama_barang?></td>
                                            <td><?= $row->stok?></td>
                                            <td class="hidden-480 center">
                                                <i class="ace-icon fa fa-arrow-up green icon-animated-vertical"></i>
                                                <i class="ace-icon fa fa-arrow-up green icon-animated-vertical"></i>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="hr hr32 hr-dotted"></div> -->
                </div>
                <div class="col-sm-6">
                    <div class="widget-box widget-color-blue">
                        <div class="widget-header widget-header-flat">
                            <h4 class="widget-title lighter"><i class="ace-icon fa fa-star orange"></i>
                                <b>Top 5 Min Stock</b>
                            </h4>
                            <div class="widget-toolbar">
                                <a href="#" data-action="collapse"><i class="ace-icon fa fa-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main no-padding">
                                <table class="table table-bordered table-striped">
                                    <thead class="thin-border-bottom">
                                        <tr>
                                            <!-- <th width="25%"><i class="ace-icon fa fa-lock blue"></i> Part Number</th> -->
                                            <th width="45%"><i class="ace-icon fa fa-caret-right blue"></i>Nama
                                                Barang
                                            </th>
                                            <th width="15%"><i class="ace-icon fa fa-caret-right blue"></i> Stock
                                            </th>
                                            <th width="15%" class="hidden-480"><i
                                                    class="ace-icon fa fa-caret-right blue"></i> Rank</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($barang_min->result() as $row):?>
                                        <tr>
                                            <td><?= $row->nama_barang?></td>
                                            <td><?= $row->stok?></td>
                                            <td class="hidden-480 center">
                                                <i class="ace-icon fa fa-arrow-down red icon-animated-vertical"></i>
                                                <i class="ace-icon fa fa-arrow-down red icon-animated-vertical"></i>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>