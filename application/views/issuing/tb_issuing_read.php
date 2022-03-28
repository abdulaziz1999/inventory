<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li>
            <i class="ace-icon fa fa-truck"></i>
            <a href="<?= base_url('tb_issuing'); ?>">Issuing</a>
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
                            <td>No Invoice</td>
                            <td><?= $no_ref; ?></td>
                        </tr>
                        <tr>
                            <td>Picker</td>
                            <td><?= @$this->db->get_where('tb_customer',['id_customer' => $picker])->row()->nama_customer; ?></td>
                        </tr>
                        <tr>
                            <td>Remarks</td>
                            <td><?= @$this->db->get_where('tb_pemesan',['id_pemesan' => $remarks])->row()->nama_pemesan; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Proyek</td>
                            <td><?= @$this->db->get_where('tb_proyek',['id_proyek' => $nama_proyek])->row()->nama_proyek; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="<?= site_url('tb_issuing') ?>" class="btn btn-sm btn-round btn-danger">
                                    <i class="fa fa-reply"></i> Kembali</a>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <h3 class="table-header text-center"><strong>Data Barang Keluar</strong></h3>
                        <table class="table table-hover table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                                    <th>Nama Barang</th>
                                    <th>Kode Barcode</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Jumlah</th>
                                    <th>Harga Jual x Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                          $start = 0;
                          foreach ($b_issuing->result() as $issuing)
                          {
                              ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td>
                                        <?= $issuing->nama_barang; ?>
                                    </td>
                                    <td><?= $issuing->kode_barcode ?></td>
                                    <td><?= "Rp. ".rupiah($issuing->harga_beli) ?></td>
                                    <td><?= "Rp. ".rupiah($issuing->harga_jual) ?></td>
                                    <td><?= $issuing->jml ?></td>
                                    <td><?= "Rp. ".rupiah($issuing->jumlah*$issuing->harga_jual) ?></td>
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