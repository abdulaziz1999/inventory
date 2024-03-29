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
                    <h3 class='box-title'>Laporan Barang Masuk</h3>
                    <div class='box box-primary'>
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Tanggal Cut Off</label>
                                        <select class="form-control" name="idc" id="unit_id">
                                            <option value="" selected disabled>----Pilih Cut Off----</option>
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
                                            <button type="submit" class="btn tampil btn-sm btn-primary" style="margin-right:3px;"> <i class="fa fa-search"></i> <b>Tampil</b></button>
                                            <?php if($this->input->get('idc') == true):?>
                                                <a href="<?php echo site_url('laporan/excelphp/') ?><?= $this->input->get('idc')?>/<?= $this->input->get('u')?>" class="btn btn-sm btn-success fa fa-file-excel-o"  style="margin-right:3px;" target="_blank"> <b>Excel</b></a>
                                            <?php endif;?>
                                            <a href="<?php echo site_url('laporan') ?>" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i> <b>Reset</b></a>
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
                    <?= date_indo($tgl->start)." sampai ".date_indo($tgl->end)?>
                    <?php endif;?>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-sm" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>No PO</th>
                                <th>Supplier</th>
                                <th>Pemesan</th>
                                <th>Total Pembelian</th>
                            </tr>
                        </thead>
                        <?php if(isset($barang_masuk)):?>
                            <tbody>
                            <?php $no = 1;
                            foreach ($barang_masuk->result() as $d): 
                            ?>    
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date_indo($d->tgl)?></td>
                                <td><?= $d->no_ref?></td>
                                <td><?= $d->nama_suplier?></td>
                                <td><?= $d->nama_pemesan?></td>
                                <td class="text-right"><?= rupiah($d->total)?></td>
                            </tr>
                            <?php endforeach; ?>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Total</th>
                                    <th class="text-right"><?= rupiah(array_sum(array_column($barang_masuk->result(), 'total')))?></th>
                                </tr>
                            </tfoot>
                        </tbody>
                        <?php endif;?>
                    </table>
                    <?php if(empty($barang_masuk)):?>
                    <div class="bg-info well-lg rounded text-center">
                        <b>Untuk Menampilkan Data Silahkan Pilih Cut Off dan Unit Terlebih Dahulu</b>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</section><!-- /.content -->