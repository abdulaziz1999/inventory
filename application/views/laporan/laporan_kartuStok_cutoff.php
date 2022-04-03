<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li class="active">Laporan Kartu Stok</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class='box-title'>Laporan Kartu Stok</h3>
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
                                        <label>Nama Barang</label>
                                        <select class="form-control" name="i" id="nama_barang">
                                            <option value="" selected disabled>----Pilih Nama Barang----</option>
                                            <?php foreach($barang->result() as $row):?>
                                            <option
                                                <?php if($this->input->get('i', TRUE) == $row->id_barang) { echo 'selected';}?>
                                                value="<?= $row->id_barang?>"><?= $row->nama_barang?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control" name="k" id="kategori">
                                            <option value="" selected disabled>----Pilih Kategori----</option>
                                            <?php foreach($kategori->result() as $k):?>
                                            <option
                                                <?php if($this->input->get('k', TRUE) == $k->id_kategori) { echo 'selected';}?>
                                                value="<?= $k->id_kategori?>"><?= $k->nama_kategori?></option>
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
                                <div class="col-lg-2 text-left">
                                    <div class="form-group">
                                        <label style="color: white">-</label><br>
                                        <div class="btn-group btn-corner">
                                            <button type="submit" class="btn tampil btn-sm btn-primary" style="margin-right:3px;"> <i class="fa fa-search"></i> Tampil</button>
                                            <a href="<?php echo site_url('laporan_card') ?>"
                                                class="btn btn-sm btn-danger"> <i class="fa fa-remove"></i> Reset</a>
                                            <!-- <?php if($this->input->get('s') == true):?>
                                            <a href="<?php echo site_url('laporan/receiving_report/') ?><?= $this->input->get('s')?>/<?= $this->input->get('e')?>"
                                                class="btn btn-sm btn-warning fa fa-print" target="_blank">Print</a>
                                            <?php endif;?> -->
                                        </div>
                                    </div>
                                </div>
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
                    <table class="table table-hover table-bordered table-sm" id="table">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center">No </th>
                                <th rowspan="2" class="text-center">Tanggal </th>
                                <th rowspan="2" class="text-center">No PO/Invoice </th>
                                <th rowspan="2" class="text-center">Supplier/Customer </th>
                                <th colspan="3" class="text-center">Saldo awal</th>
                                <th colspan="3" class="text-center">Pembelian</th>
                                <th colspan="3" class="text-center">Penjualan</th>
                                <th colspan="3" class="text-center">Stock Akhir</th>
                            </tr>
                            <tr>
                                <th>QTY</th>
                                <th>Harga/item</th>
                                <th>Harga Total</th>
                                <th>QTY</th>
                                <th>Harga/item</th>
                                <th>Harga Total</th>
                                <th>QTY</th>
                                <th>Harga/item</th>
                                <th>Harga Total</th>
                                <th>QTY</th>
                                <th>Harga/item</th>
                                <th>Harga Total</th>
                            </tr>
                        </thead>
                        <?php if($this->input->get('idc', TRUE)):?>
                        <tbody>
                            <?php $no = 1; foreach ($stok->result() as $d): 
                            $qty_penjualan = @$this->db->select('sum(jumlah) as qty')->get_where('tb_issuing_item',['id_barang' => $d->id_barang])->row()->qty;
                            $qty_pembelian = @$this->db->select('sum(jumlah) as qty')->get_where('tb_receiving_item',['id_barang' => $d->id_barang])->row()->qty;

                            $jml_stok_sisa = $d->stok == 0 ? '' : $d->stok+($qty_pembelian-$qty_penjualan);
                            if($jml_stok_sisa != ''){
                                $total_harga_stok = $d->harga_beli*$jml_stok_sisa;
                            }

                            $iditemiss = @$this->db->select('id_itemiss')->get_where('tb_issuing_item',['id_barang' => $d->id_barang])->row()->id_itemiss;
                            $tgliss = @$this->db->select('*')->get_where('tb_issuing',['id_issuing' => $iditemiss])->row();
                            $customer = @$this->db->select('nama_customer')->get_where('tb_customer',['id_customer' => $tgliss->picker])->row()->nama_customer;

                            $iditemrev = @$this->db->select('id_item')->get_where('tb_receiving_item',['id_barang' => $d->id_barang])->row()->id_item;
                            $tglrev = @$this->db->select('*')->get_where('tb_receiving',['id_receiving' => $iditemrev])->row();
                            $supplier = @$this->db->select('nama_pemesan')->get_where('tb_pemesan',['id_pemesan' => $tglrev->supplier])->row()->nama_pemesan;

                            @$tgl = $tgliss->tgl ? $tgliss->tgl : $tglrev->tgl
                            ?>
                            <tr>
                                <td class="text-center"><?= $no++?></td>
                                <td class="text-center"><?= $tgl ? date_indo($tgl) : '-' ?></td>
                                <td class="text-center"><?= $tgliss->no_permintaan ? $tgliss->no_permintaan : $tglrev->nota_supplier?></td> 
                                <td class="text-center"><?= $customer ? $customer : $supplier?></td>
                                <td class="text-right"><?= $d->stok?></td>
                                <td class="text-right"><?= rupiah($d->harga_beli)?></td>
                                <td class="text-right"><?= rupiah($d->stok*$d->harga_beli)?></td>
                                <td class="text-right"><?= $qty_pembelian?></td>
                                <td class="text-right"><?= rupiah($d->harga_beli)?></td>
                                <td class="text-right"><?= rupiah($qty_pembelian*$d->harga_beli)?></td>
                                <td class="text-right"><?= $qty_penjualan?></td>
                                <td class="text-right"><?= rupiah($d->harga_beli)?></td>
                                <td class="text-right"><?= rupiah($qty_penjualan*$d->harga_beli)?></td>
                                <td class="text-right"><?= $jml_stok_sisa?></td>
                                <td class="text-right"><?= rupiah($d->harga_beli)?></td>
                                <td class="text-right"><?= rupiah($jml_stok_sisa*$d->harga_beli)?></td>
                            </tr>
                        </tbody>
                        <?php endforeach;?>
                        <?php endif;?>
                    </table>
                    <?php if(!$this->input->get('idc', TRUE)):?>
                    <div class="bg-info well-lg rounded text-center">
                        <b>Untuk Menampilkan Data Silahkan Pilih Cut Off , Nama Barang , Kategori Barang dan Unit Terlebih Dahulu</b>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</section><!-- /.content -->