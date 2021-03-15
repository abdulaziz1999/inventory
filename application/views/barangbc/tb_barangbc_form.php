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
        <?php if($this->uri->segment(2) == 'create'): ?>
        <li class="active">Tambah Barang Baru</li>
        <?php else:?>
        <li class="active">Ubah Data Barang Baru</li>
        <?php endif;?>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <?php if($this->uri->segment(2) == 'create'): ?>
                    <h3 class="table-header text-center"><strong>Tambah Barang Baru</strong></h3>
                    <?php else:?>
                    <h3 class="table-header text-center"><strong>Ubah Data Barang</strong></h3>
                    <?php endif;?>
                    <div class='box box-primary'>
                        <form action="<?= $action; ?>" method="post">
                            <table class='table table-bordered table-hover table-striped'>
                                <tr>
                                    <td><strong>Part Number</strong> <?= form_error('part_number') ?></td>
                                    <td>
                                        <input type="text" id="dis" class="form-control" name="part_number"
                                            id="part_number" placeholder="Part Number"
                                            value="<?php if($this->uri->segment(2) == 'create'){ echo $kode; }elseif($this->uri->segment(2) == 'update'){ echo $part_number;} ?>"
                                            disabled />
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Kode Barcode</strong> <?= form_error('kode_barcode') ?></td>
                                    <td>
                                        <input type="number" class="form-control" name="kode_barcode" id="kode_barcode"
                                            required placeholder="Kode Barcode" value="<?= $kode_barcode; ?>"
                                            autocomplete="off" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Nama Barang</strong> <?= form_error('nama_barang') ?></td>
                                    <td>
                                        <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                                            required placeholder="Nama Barang" value="<?= $nama_barang; ?>"
                                            autocomplete="off" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Kategori</strong> <?= form_error('kategori') ?></td>
                                    <td>
                                        <select class="form-control" name="kategori" id="kategori" required>
                                            <option value="" selected disabled>----Pilih Kategori----</option>
                                            <?php foreach($kategori->result() as $k):?>
                                            <option
                                                <?php if($this->uri->segment(2) == 'update'){if($idkategori == $k->id_kategori) { echo 'selected';}}?>
                                                value="<?= $k->id_kategori?>"><?= $k->nama_kategori?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Brand</strong> <?= form_error('brand') ?></td>
                                    <td>
                                        <select class="form-control" name="brand" id="brand" required>
                                            <option value="" selected disabled>----Pilih Brand----</option>
                                            <?php foreach($brand->result() as $b):?>
                                            <option
                                                <?php if($this->uri->segment(2) == 'update'){if($idbrand == $b->id_brand) { echo 'selected';}}?>
                                                value="<?= $b->id_brand?>"><?= $b->nama_brand?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Satuan</strong> <?= form_error('satuan') ?></td>
                                    <td>
                                        <select class="form-control" name="satuan" id="satuan" required>
                                            <option value="" selected disabled>----Pilih Satuan----</option>
                                            <?php foreach($satuan->result() as $s):?>
                                            <option
                                                <?php if($this->uri->segment(2) == 'update'){if($idsatuan == $s->id_satuan) { echo 'selected';}}?>
                                                value="<?= $s->id_satuan?>"><?= $s->nama_satuan?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Harga Beli</strong> <?= form_error('harga_beli') ?></td>
                                    <td><input type="text" class="form-control" name="harga_beli" id="tanpa-rupiah"
                                            required onkeyup="sum();" placeholder="Harga Beli"
                                            value="<?= $harga_beli; ?>" autocomplete="off" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Harga Jual</strong> <?= form_error('harga_jual') ?></td>
                                    <td><input type="text" class="form-control" name="harga_jual" id="tanpa-rupiah2"
                                            required placeholder="Harga Jual" value="<?= $harga_jual; ?>"
                                            autocomplete="off" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Keterangan</strong> <?= form_error('ket') ?></td>
                                    <td><input type="text" class="form-control" name="ket" id="ket" placeholder="Ket"
                                            value="<?= $ket; ?>" autocomplete="off" />
                                    </td>
                                    <input type="hidden" name="id_barang" value="<?= $id_barang; ?>" />
                                </tr>
                                <tr>
                                    <td><strong>Unit</strong> <?= form_error('unit_id') ?></td>
                                    <td>
                                        <select class="form-control" name="unit_id" id="unit_id" required>
                                            <option value="" selected disabled>----Pilih Unit----</option>
                                            <?php foreach($unit->result() as $k):?>
                                            <option
                                                <?php if($this->uri->segment(2) == 'update'){if($idunit == $k->id_unit) { echo 'selected';}}?>
                                                value="<?= $k->id_unit?>"><?= $k->nama_unit?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Minimal stok</strong> <?= form_error('min_stok') ?></td>
                                    <td>
                                        <input type="number" class="form-control" name="min_stok" id="min_stok" required
                                            placeholder="Minimal stok" value="<?= $min_stok; ?>" autocomplete="off" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <div class="btn-group btn-corner">
                                            <button type="submit" id="btnu" onclick="myFunction()"
                                                class="btn btn-sm btn-primary"
                                                style="margin-right:3px;"><?= $button ?></button>
                                            <a href="<?= site_url('tb_barang') ?>" class="btn btn-danger btn-sm">
                                                <i class="fa fa-reply"></i> Kembali</a>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
            <div class=col-xs-12>
                <div class="col-xs-2 text-center ">
                        <div class="kotak-barcode mb-4">
                           <div  class="bg-white p-2" style="border:1px solid #000; padding:10px"> 
                                <?= "<img alt='Barcode Generator TEC-IT' src='https://barcode.tec-it.com/barcode.ashx?data=899606673726&code=EAN13&multiplebarcodes=true&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0' />" ?><br>
                           </div>
                                <h5 class="text-center mb-1 mt-2" style="color:#000;">As Batu</h5>
                                <h5 class="text-center font-weight-normal mb-1" style="color:#000;">Rp. 500</h5>
                        </div>
                </div>
            </div>
        </div><!-- /.row -->
</section><!-- /.content -->

        

<script>
$('#buat_bc').click(function() {
            // var nama = $('#barang').val();
            var nama = $('select').find(':selected').attr('data-nama');
            let harga = $('#harga_barang').val();
            $('#harga_barang').number(true);
            let code = $('#code').val();
            let jumlah = $('#jumlah').val();
            $("#hasil").html("<h3>HASIL</h3>");
            $("#bar_disini").html("");
            for (let a = 1; a <= jumlah; a++) {
                <?php if (isset($_GET['barcode'])) : ?>
                    $('#bar_disini').append(`
                            <div class="kotak-barcode mb-4">
                           <div  class="bg-white p-2" style="border:1px solid #000;"> 
                                <?= "<img alt='Barcode Generator TEC-IT' src='https://barcode.tec-it.com/barcode.ashx?data=" . $kode . "&code=EAN13&multiplebarcodes=true&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0' />" ?><br>
                           </div>
                                <h5 class="text-center mb-1 mt-2" style="color:#000;">` + nama + `</h5>
                                <h5 class="text-center font-weight-normal mb-1" style="color:#000;">Rp. <?= rupiah($harga) ?></h5>
                            </div>
                        `);

                <?php else : ?>

                <?php endif; ?>
            }
            $('#cetak').html("<a class='btn btn-info text-center'><i class='fas fa-print'></i> Cetak</a>");
        })
</script>