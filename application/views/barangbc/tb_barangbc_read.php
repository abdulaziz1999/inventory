<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li>
            <i class="ace-icon fa fa-briefcase"></i>
            <a href="<?= base_url('tb_barang'); ?>">Master Barang</a>
        </li>
        <li class="active">Detail Barang</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class="table-header text-center"><strong>Detail Barang</strong></h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>Part Number</td>
                            <td><?= $part_number; ?></td>
                        </tr>
                        <tr>
                            <td>Kode Barcode</td>
                            <td><?= $kode_barcode; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Barang</td>
                            <td><?= $nama_barang; ?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>
                                <?= @$this->db->get_where('tb_kategori',['id_kategori' => $kategori])->row()->nama_kategori;  ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Brand</td>
                            <td>
                                <?= @$this->db->get_where('tb_brand',['id_brand' => $brand])->row()->nama_brand;  ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Unit</td>
                            <td>
                                <?= @$this->db->get_where('tb_unit',['id_unit' => $unit_id])->row()->nama_unit;  ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Minimal Stok</td>
                            <td>
                                <?= $min_stok?>
                                <?= @$this->db->get_where('tb_satuan',['id_satuan' => $satuan])->row()->nama_satuan;  ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Ket</td>
                            <td>
                                <?= $ket?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="<?= site_url('tb_barang') ?>" class="btn btn-sm btn-round btn-danger">
                                    <i class="fa fa-reply"></i> Kembali</a>
                            </td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->