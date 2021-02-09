<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>TB_BARANG</h3>
                    <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Part Number <?php echo form_error('part_number') ?></td>
                                    <td>
                                        <input type="text" id="dis" class="form-control" name="part_number"
                                            id="part_number" placeholder="Part Number"
                                            value="<?php if($this->uri->segment(2) == 'create'){ echo $kode; }elseif($this->uri->segment(2) == 'update'){ echo $part_number;} ?>"
                                            disabled />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Barang <?php echo form_error('nama_barang') ?></td>
                                    <td>
                                        <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                                            placeholder="Nama Barang" value="<?php echo $nama_barang; ?>"
                                            autocomplete="off" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kategori <?php echo form_error('kategori') ?></td>
                                    <td>
                                        <select class="form-control" name="kategori" id="kategori">
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
                                    <td>Brand <?php echo form_error('brand') ?></td>
                                    <td>
                                        <select class="form-control" name="brand" id="brand">
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
                                    <td>Satuan <?php echo form_error('satuan') ?></td>
                                    <td>
                                        <select class="form-control" name="satuan" id="satuan">
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
                                    <td>Harga Beli <?php echo form_error('ket') ?></td>
                                    <td><input type="text" class="form-control" name="harga_beli" id="ket"
                                            placeholder="Harga Beli" value="<?php echo $harga_beli; ?>"
                                            autocomplete="off" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga Jual <?php echo form_error('ket') ?></td>
                                    <td><input type="text" class="form-control" name="harga_jual" id="ket"
                                            placeholder="Harga Jual" value="<?php echo $harga_jual; ?>"
                                            autocomplete="off" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ket <?php echo form_error('ket') ?></td>
                                    <td><input type="text" class="form-control" name="ket" id="ket" placeholder="Ket"
                                            value="<?php echo $ket; ?>" autocomplete="off" />
                                    </td>
                                    <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" />
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <button type="submit" id="btnu" onclick="myFunction()"
                                            class="btn btn-sm btn-round btn-primary"><?php echo $button ?></button>
                                        <a href="<?php echo site_url('tb_barang') ?>"
                                            class="btn btn-sm btn-round btn-default">Cancel</a>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->