<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li class="active">Laporan Barang Masuk By Date</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class='box-title'>Laporan Stok Barang</h3>
                    <div class='box box-primary'>
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Tanggal Mulai</label>
                                        <input type="date" class="form-control form-control-sm form-control-alternative"
                                            name="s" value="<?= $this->input->get('s', TRUE) ?>">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Tanggal Selesai</label>
                                        <input type="date" class="form-control form-control-sm form-control-alternative"
                                            name="e" value="<?= $this->input->get('e', TRUE) ?>">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Unit</label>
                                        <select class="form-control" name="u" id="unit_id">
                                            <option value="" selected disabled>----Pilih Unit----</option>
                                            <?php foreach($unit->result() as $k):?>
                                            <option
                                                <?php if($this->input->get('u', TRUE) == $k->id_unit) { echo 'selected';}?>
                                                value="<?= $k->id_unit?>"><?= $k->nama_unit?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-left">
                                    <div class="form-group">
                                        <label style="color: white">-</label><br>
                                        <div class="btn-group btn-corner">
                                            <button type="submit" class="btn tampil btn-sm btn-primary">Tampil</button>
                                            <a href="<?php echo site_url('laporan_stok') ?>"
                                                class="btn btn-sm btn-default">Reset</a>
                                            <?php if($this->input->get('s') == true):?>
                                            <a href="<?php echo site_url('laporan/receiving_report/') ?><?= $this->input->get('s')?>/<?= $this->input->get('e')?>"
                                                class="btn btn-sm btn-warning fa fa-print" target="_blank">Print</a>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div>

        <div class="col-xs-12" style="padding-top: 15px">
            <div class="clearfix">
                <div class="table-header">
                    Laporan Inventory :
                    <?php if($this->input->get('s') == true):?>
                    <?= date('d M Y',strtotime($this->input->get('s'))) ." sampai ". date('d M Y',strtotime($this->input->get('e')))?>
                    <?php endif;?>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-sm" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>No PO</th>
                                <th>Nama Item</th>
                                <th>Kategori</th>
                                <th>Satuan Unit</th>
                                <th>Stok Awal</th>
                                <th>Total Pembelian</th>
                                <th>Total Penjualan</th>
                                <th>Jumlah Stock</th>
                                <th>Harga Rata-rata</th>
                                <th>Total Stock</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</section><!-- /.content -->