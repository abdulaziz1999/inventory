<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>Detail Barang Masuk</h3>
                    <div class='box box-primary'>
                        <form action="<?= $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Tanggal <?= form_error('tgl') ?></td>
                                    <td><input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tgl"
                                            value="<?= $tgl; ?>" />
                                    </td>
                                <tr>
                                    <td>No PO <?= form_error('no_ref') ?></td>
                                    <td><input type="text" class="form-control" name="no_ref" id="no_ref"
                                            placeholder="No Ref" value="<?= $no_ref; ?>" />
                                    </td>
                                <tr>
                                    <td>Supplier <?= form_error('supplier') ?></td>
                                    <td><input type="text" class="form-control" name="supplier" id="supplier"
                                            placeholder="Supplier" value="<?= $supplier; ?>" />
                                    </td>
                                <tr>
                                    <td>Pemesan <?= form_error('remarks') ?></td>
                                    <td><input type="text" class="form-control" name="remarks" id="remarks"
                                            placeholder="Remarks" value="<?= $remarks; ?>" />
                                    </td>
                                    <input type="hidden" name="id_receiving" value="<?= $id_receiving; ?>" />
                                <tr>
                                    <td colspan='2'>
                                        <div class="btn-group btn-corner">
                                            <button type="submit" class="btn btn-sm btn-primary"><?= $button ?></button>
                                            <a href="<?= site_url('tb_receiving') ?>"
                                                class="btn btn-sm btn-default">Kembali</a>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </form>
                        <div class="btn-group btn-corner">
                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#myModal">Tambah</a>
                            <a href="<?= site_url('tb_receiving/report_rev_supplier/') ?><?= $this->uri->segment(3)?>"
                                class="btn btn-sm btn-warning fa fa-print" target="_blank">Print</a>
                        </div>
                        <br><br>
                        <form action="#" method="post">
                            <input name="kode" id="myTextField" class="form-control" type="text" autocomplete="off">
                            <button type="submit" class="btn btn-sm btn-round btn-block btn-success">
                                <i class="fa fa-barcode"></i> Save
                            </button>
                        </form>
                        <br>
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
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
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
                                    <td><?= $this->db->get_where('tb_barang',['id_barang' => $tb_receiving->id_barang])->row()->nama_barang; ?>
                                    </td>
                                    <td><?= $tb_receiving->jumlah ?></td>
                                    <td>
                                        <?= anchor(site_url('tb_receiving/deleteitem/'.$tb_receiving->id_item),'<i class="fa fa-trash-o red"></i>','title="delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); ?>
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
                <form action="<?= base_url('tb_receiving/simpan_barang')?>/<?= $this->uri->segment(3)?>" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="barang">Nama Barang :</label>
                            <div class="form-group">
                                <select class="form-control col-md-12" type="text" name="barang" required>
                                    <option value="" selected disabled>Nama Barang_Satuan</option>
                                    <?php foreach($barang as $row){?>
                                    <option value="<?= $row->id_barang?>">
                                        <?= $row->nama_barang?>_<?= $this->db->get_where('tb_stok',['id_barang' => $row->id_barang])->row()->stok?>
                                        <?php $s = $this->db->get_where('tb_barang',['id_barang' => $row->id_barang])->row()->satuan; echo $this->db->get_where('tb_satuan',['id_satuan' => $s])->row()->nama_satuan;?>
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