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
        <li class="active">Detail</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class="table-header text-center"><strong>Detail Barang Masuk</strong></h3>
                    <div class='box box-primary'>
                        <form action="<?= $action; ?>" method="post">
                            <table class='table table-bordered table-hover table-striped'>
                                <tr>
                                    <td>Tanggal <?= form_error('tgl') ?></td>
                                    <td>
                                        <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tgl"
                                            required autocomplete="off" value="<?= $tgl; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>No PO <?= form_error('no_ref') ?></td>
                                    <td>
                                        <input type="text" class="form-control" name="no_ref" id="no_ref" required
                                            autocomplete="off" placeholder="No Ref" value="<?= $no_ref; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Supplier <?= form_error('supplier') ?></td>
                                    <td>
                                        <select class="form-control" name="supplier" id="supplier" required>
                                            <option value="" selected disabled>----Pilih Nama Supplier----</option>
                                            <?php foreach($nm_suplier->result() as $s):?>
                                            <option
                                                <?php if($this->uri->segment(2) == 'update'){if($supplier == $s->id_suplier) { echo 'selected';}}?>
                                                value="<?= $s->id_suplier?>"><?= $s->nama_suplier?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pemesan <?= form_error('remarks') ?></td>
                                    <td>
                                        <select class="form-control" name="remarks" id="remarks" required>
                                            <option value="" selected disabled>----Pilih Nama Pemesan----</option>
                                            <?php foreach($nm_pemesan->result() as $s):?>
                                            <option
                                                <?php if($this->uri->segment(2) == 'update'){if($remarks == $s->id_pemesan) { echo 'selected';}}?>
                                                value="<?= $s->id_pemesan?>"><?= $s->nama_pemesan?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                    <input type="hidden" name="id_receiving" value="<?= $id_receiving; ?>" />
                                </tr>
                                <tr>
                                    <td>Nama Proyek <?= form_error('nama_proyek') ?></td>
                                    <td>
                                        <select class="form-control" name="nama_proyek" id="nama_proyek" required>
                                            <option value="" selected disabled>----Pilih Nama Proyek----</option>
                                            <?php foreach($nm_proyek->result() as $s):?>
                                            <option
                                                <?php if($this->uri->segment(2) == 'update'){if($nama_proyek == $s->id_proyek) { echo 'selected';}}?>
                                                value="<?= $s->id_proyek?>"><?= $s->nama_proyek?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Keterangan <?= form_error('ket') ?></td>
                                    <td><input type="text" class="form-control" name="ket" id="ket" autocomplete="off"
                                            placeholder="Keterangan" value="<?= $ket; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <div class="btn-group btn-corner">
                                            <button type="submit" class="btn btn-sm btn-primary"
                                                style="margin-right:3px;"><i class="fa fa-pencil"></i>
                                                <?= $button ?></button>
                                            <a href="<?= site_url('tb_receiving') ?>" class="btn btn-sm btn-danger">
                                                <i class="fa fa-reply"></i> Kembali</a>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </form>
                        <hr>
                        <?php if($this->session->flashdata('sukses')):?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                            </button>
                            <strong><i class="ace-icon fa fa-check"></i> Sukses </strong>
                            <?= $this->session->flashdata('sukses')?>
                        </div>
                        <?php elseif($this->session->flashdata('gagal')):?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                            </button>
                            <strong><i class="ace-icon fa fa-times"></i> Gagal </strong>
                            <?= $this->session->flashdata('gagal')?>
                        </div>
                        <?php endif;?>
                        <div class="btn-group btn-corner">
                            <a href="#" class="btn btn-sm btn-primary" id="click" data-toggle="modal" data-target="#myModal"
                                style="margin-right:3px;"><i class="fa fa-plus"></i> Tambah</a>
                            <a href="<?= site_url('tb_receiving/report_rev_supplier/') ?><?= $this->uri->segment(3)?>"
                                class="btn btn-sm btn-warning" target="_blank">
                                <i class="fa fa-file-pdf-o"></i> Print Pdf</a>
                        </div>
                        <form action="<?= base_url('tb_receiving/update/'.$this->uri->segment(3))?>" method="post">
                            <input name="kode" id="myTextField" class="form-control" type="text" autocomplete="off">
                            <input type="hidden" name="jumlah" value="1">
                            <button type="submit" class="btn btn-sm btn-round btn-block btn-success hide">
                                <i class="fa fa-barcode"></i> Save
                            </button>
                        </form>
                        <?php if($this->session->userdata('level') == 'superuser' || $this->session->userdata('level') == 'admin'){?>
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
                                        <th>Harga Jual x Jumlah</th>
                                        <th>Action</th>
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
                                        <td><?= "Rp. ".rupiah($tb_receiving->harga_beli) ?></td>
                                        <td><?= "Rp. ".rupiah($tb_receiving->harga_jual) ?></td>
                                        <td><?= $tb_receiving->jml ?></td>
                                        <td><?= "Rp. ".rupiah($tb_receiving->jml*$tb_receiving->harga_jual) ?>
                                        </td>
                                        <td>
                                            <?= anchor(site_url('tb_receiving/deleteitem/'.$tb_receiving->id_item.'/'.$this->uri->segment(3)),'<i class="fa fa-trash-o"></i> Hapus','title="delete" class="btn btn-round btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); ?>
                                        </td>
                                    </tr>
                                    <?php
                            }
                            ?>
                                </tbody>
                            </table>
                        <?php }?>
                    <hr>
                        <?php $length = $this->db->get_where('tb_receiving_temp',['id_receiving' => $this->uri->segment(3)])->num_rows();?>
                        <?php //if($length > 0):?>
                            <h3 class="table-header text-center"><strong>Data Barang Masuk Pending</strong>
                            <?php if($this->session->userdata('level') == 'superuser' || $this->session->userdata('level') == 'admin'){?>
                                <?= $length ? anchor(site_url('tb_receiving/approve_all/'.$length.'/'.$this->uri->segment(3)),'<i class="fa fa-cloud-upload"></i> Approve','title="approve" class="btn btn-success btn-round btn-sm" style="float:right; margin-right:9px; margin-top:3px;" onclick="javasciprt: return confirm(\'Anda Yakin ingin approve ?\')"') : '' ?>
                            <?php }?>
                            </h3>
                            <table class="table table-hover table-striped" id="mytable1">
                                <thead>
                                    <tr>
                                        <th width="80px">No</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barcode</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Jumlah</th>
                                        <th>Harga Jual x Jumlah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php $start = 0; foreach ($b_pending->result() as $tb_receiving)
                            {
                                ?>
                                    <tr>
                                        <td><?= ++$start ?></td>
                                        <td>
                                            <?= $tb_receiving->nama_barang; ?>
                                        </td>
                                        <td><?= $tb_receiving->kode_barcode ?></td>
                                        <td><?= "Rp. ".rupiah($tb_receiving->harga_beli) ?></td>
                                        <td><?= "Rp. ".rupiah($tb_receiving->harga_jual) ?></td>
                                        <td><?= $tb_receiving->jml ?></td>
                                        <td><?= "Rp. ".rupiah($tb_receiving->jml*$tb_receiving->harga_jual) ?> <span class="label label-lg label-warning arrowed">Pending</span></td>
                                        <td>
                                            <div class="btn-group btn-corner">
                                                <?= anchor(site_url('tb_receiving/deletePending/'.$tb_receiving->id_pending.'/'.$this->uri->segment(3)),'<i class="fa fa-trash-o"></i> Hapus','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); ?>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php
                            }?>
                                </tbody>
                            </table>
                        <?php //endif;?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->

<!-- Button to Open the Modal -->




<!-- The Modal -->
<div class="modal fide" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-info">
                <h4 class="modal-title">Tambah Receiving Barang <button type="button" class="close"
                        data-dismiss="modal">&times;</button></h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="<?= base_url('tb_receiving/simpan_pending')?>/<?= $this->uri->segment(3)?>" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="barang">Nama Barang :</label>
                            <div class="form-group">
                                <select class="form-control col-md-12" type="text" name="barang" required>
                                    <option value="" selected disabled>Nama Barang - [ Stok ] </option>
                                    <?php foreach($barang as $row){?>
                                    <option value="<?= $row->id_barang?>">
                                        <?= $row->nama_barang?> _ [ <?= $this->db->get_where('tb_stok',['id_barang' => $row->id_barang])->row()->stok?> 
                                        <?php $s = $this->db->get_where('tb_barang',['id_barang' => $row->id_barang])->row()->satuan; echo $this->db->get_where('tb_satuan',['id_satuan' => $s])->row()->nama_satuan;?> ]
                                    </option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="jumlah">Jumlah Barang :</label>
                            <div class="form-group">
                                <input class="col-md-12" type="number" name="jumlah" autocomplete="off"
                                    placeholder="Jumlah Barang" required>
                            </div>
                        </div>
                    </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-sm btn-round btn-success">Save</button>
                <button type="button" class="btn btn-sm btn-round btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById("myTextField").focus();
</script>