<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li class="active">Laporan Stok Opname By Date</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class='box-title'>Laporan Stok Opname</h3>
                    <div class='box box-primary'>
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Tanggal Cut Off</label>
                                        <select class="form-control" name="idc" id="unit_id">
                                            <option value="" selected disabled>----Pilih Cutoff----</option>
                                            <?php foreach($cutoff->result() as $key):?>
                                            <option
                                                <?php if($this->input->get('idc', TRUE) == $key->id_cutoff) { echo 'selected';}?>
                                                value="<?= $key->id_cutoff?>"><?= date_indo($key->start)?> - <?= date_indo($key->end)?></option>
                                            <?php endforeach;?>
                                        </select>
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
                                            <button type="submit" class="btn tampil btn-sm btn-primary"> <i class="fa fa-search"></i> Tampil</button>
                                            <a href="<?php echo site_url('laporan_opname') ?>"
                                                class="btn btn-sm btn-danger"> <i class="fa fa-remove"></i> Reset</a>
                                            <!-- <?php if($this->input->get('s') == true):?>
                                            <a href="<?php echo site_url('laporan/receiving_report/') ?><?= $this->input->get('s')?>/<?= $this->input->get('e')?>"
                                                class="btn btn-sm btn-warning fa fa-print" target="_blank">Print</a>
                                            <?php endif;?> -->
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
                    <?php if($this->input->get('idc') == true):?>
                    <?php //date('d M Y',strtotime($this->input->get('s'))) ." sampai ". date('d M Y',strtotime($this->input->get('e')))?>
                    <?php endif;?>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-sm" id="table">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center">No </th>
                                <th rowspan="2" class="text-center">Nama Item </th>
                                <th rowspan="2" class="text-center">Kategori </th>
                                <th rowspan="2" class="text-center">Jumlah Tercatat </th>
                                <th rowspan="2" class="text-center">Satuan </th>
                                <th rowspan="2" class="text-center">Harga Rata2/item </th>
                                <th colspan="3" class="text-center">Hasil Stock Opname</th>
                                <th rowspan="2" class="text-center">Jumlah Fisik </th>
                                <th rowspan="2" class="text-center">Selisih Barang </th>
                                <th rowspan="2" class="text-center">Jumlah Harga Selisih Barang </th>
                            </tr>
                            <tr>
                                <th>Jumlah Barang Baik</th>
                                <th>Jumlah Barang Rusak</th>
                                <th>Jumlah Barang Hilang</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</section><!-- /.content -->