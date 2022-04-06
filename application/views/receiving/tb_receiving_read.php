<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li>
            <i class="ace-icon fa fa-shopping-cart"></i>
            <a href="<?= base_url('tb_receiving'); ?>">Receiving</a>
        </li>
        <li class="active">Read</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class="table-header text-center"><strong>Read</strong></h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>Tgl</td>
                            <td><?= date_indo($tgl); ?></td>
                        </tr>
                        <tr>
                            <td>No Ref</td>
                            <td><?= $no_ref; ?></td>
                        </tr>
                        <tr>
                            <td>Supplier</td>
                            <td><?= @$this->db->get_where('tb_suplier',['id_suplier' => $supplier])->row()->nama_suplier; ?></td>
                        </tr>
                        <tr>
                            <td>Remarks</td>
                            <td><?= @$this->db->get_where('tb_pemesan',['id_pemesan' => $remarks])->row()->nama_pemesan; ?></td>
                        </tr>
                        <tr>
                            <td>NAma Proyek</td>
                            <td><?= @$this->db->get_where('tb_proyek',['id_proyek' => $nama_proyek])->row()->nama_proyek; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="<?= site_url('tb_receiving') ?>" class="btn btn-sm btn-round btn-danger">
                                    <i class="fa fa-reply"></i> Kembali</a>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <h3 class="table-header text-center"><strong>Data Barang Masuk</strong>
                            </h3>
                            <table class="table table-hover table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="80px">No</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barcode</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Jumlah</th>
                                        <th class="text-right">Harga Jual x Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            $start = 0;
                            foreach ($b_receiving->result() as $tb_receiving)
                            {
                                ?>
                                    <tr>
                                        <td><?= ++$start ?></td>
                                        <td>
                                            <?= $tb_receiving->nama_barang; ?>
                                        </td>
                                        <td><?= $tb_receiving->kode_barcode ?></td>
                                        <td class="text-right"><?= rupiah($tb_receiving->harga_beli) ?></td>
                                        <td class="text-right"><?= rupiah($tb_receiving->harga_jual) ?></td>
                                        <td class="text-right"><?= $tb_receiving->jml ?></td>
                                        <td class="text-right"><?= rupiah($tb_receiving->jml*$tb_receiving->harga_jual) ?>
                                        </td>
                                    </tr>
                                    <?php
                            }
                            ?>
                                </tbody>
                            </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->