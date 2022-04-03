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
                                        <label>Tanggal Cut Off</label>
                                        <select class="form-control" name="idc" id="unit_id">
                                            <option value="" selected disabled>----Pilih Cut Off----</option>
                                            <?php foreach($cutoff->result() as $key):?>
                                            <option
                                                <?php if($this->input->get('idc', TRUE) == $key->id_cutoff) { echo 'selected';}?>
                                                value="<?= $key->id_cutoff?>"><?= date_indo($key->start)?> -
                                                <?= date_indo($key->end)?></option>
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
                                            <button type="submit" class="btn tampil btn-sm btn-primary" style="margin-right:3px;"> <i class="fa fa-search"></i> Tampil</button>
                                            <a href="<?php echo site_url('laporan_stok') ?>"
                                                class="btn btn-sm btn-danger"> <i class="fa fa-remove"></i> Reset</a>
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
                                <th>Nama Item</th>
                                <th>Kategori</th>
                                <th>Satuan Unit</th>
                                <th>Stok Awal</th>
                                <th>Total Pembelian</th>
                                <th>Total Penjualan</th>
                                <th>Total Sisa Stok Stock</th>
                                <th>Harga Rata-rata</th>
                                <th>Total Harga Stock</th>
                            </tr>
                        </thead>
                        <?php if($this->input->get('idc', TRUE)):?>
                        <tbody>
                            <?php 
                            $no = 1; 
                            $sum_harga2 = 0;
                            $sum_total_harga_stok =0;
                            foreach ($stok->result() as $d): 
                                $t_penjualan = @$this->db->select('sum(jumlah) as qty')->get_where('tb_issuing_item',['id_barang' => $d->id_barang])->row()->qty;
                                $t_pembelian = @$this->db->select('sum(jumlah) as qty')->get_where('tb_receiving_item',['id_barang' => $d->id_barang])->row()->qty;

                                $jml_stok_sisa = $d->stok == 0 ? '' : $d->stok+($t_pembelian-$t_penjualan);
                                if($jml_stok_sisa != ''){
                                    $total_harga_stok = $d->harga_beli*$jml_stok_sisa;
                                }
                                $kategori = $this->db->select('nama_kategori')->get_where('tb_kategori',['id_kategori' => $d->kategori])->row()->nama_kategori;
                                $satuan = $this->db->select('nama_satuan')->get_where('tb_satuan',['id_satuan' => $d->satuan])->row()->nama_satuan;
                                $sum_harga2 += $d->harga_beli;
                                @$sum_total_harga_stok += $total_harga_stok;

                                $iditemiss = @$this->db->select('id_itemiss')->get_where('tb_issuing_item',['id_barang' => $d->id_barang])->row()->id_itemiss;
                                $tgliss = @$this->db->select('tgl')->get_where('tb_issuing',['id_issuing' => $iditemiss])->row()->tgl;
                                $iditemrev = @$this->db->select('id_item')->get_where('tb_receiving_item',['id_barang' => $d->id_barang])->row()->id_item;
                                $tglrev = @$this->db->select('tgl')->get_where('tb_receiving',['id_receiving' => $iditemrev])->row()->tgl;

                                @$tgl = $tgliss ? $tgliss : $tglrev
                                ?>
                                <?php if($d->stok != 0):?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $tgl ? date_indo($tgl) : ''?></td>
                                    <td><?= $d->nama_barang ?></td>
                                    <td><?= $kategori?></td>
                                    <td><?= $satuan?></td>
                                    <td><?= $d->stok ?></td>
                                    <td><?= $t_pembelian?></td>
                                    <td><?= $t_penjualan?></td>
                                    <td>
                                        <?= $jml_stok_sisa?>
                                    </td>
                                    <td><?= rupiah($d->harga_beli)?></td>
                                    <td><?= rupiah(@$total_harga_stok)?></td>
                                </tr>
                            <?php endif;?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="9" class="text-center">Total Harga Stok Barang</th>
                                <th><?= rupiah(@$sum_harga2) ?></th>
                                <th><?= rupiah(@$sum_total_harga_stok) ?></th>
                            </tr>
                        </tfoot>
                        <?php endif;?>
                    </table>
                    <?php if(!$this->input->get('idc', TRUE)):?>
                    <div class="bg-info well-lg rounded text-center">
                        <b>Untuk Menampilkan Data Silahkan Pilih Cut Off dan Unit Terlebih Dahulu</b>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</section><!-- /.content -->