<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>TB_RECEIVING</h3>
                    <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Tgl <?php echo form_error('tgl') ?></td>
                                    <td><input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tgl"
                                            value="<?php echo $tgl; ?>" />
                                    </td>
                                <tr>
                                    <td>No PO <?php echo form_error('no_ref') ?></td>
                                    <td><input type="text" class="form-control" name="no_ref" id="no_ref"
                                            placeholder="No Ref" value="<?php echo $no_ref; ?>" />
                                    </td>
                                <tr>
                                    <td>Supplier <?php echo form_error('supplier') ?></td>
                                    <td><input type="text" class="form-control" name="supplier" id="supplier"
                                            placeholder="Supplier" value="<?php echo $supplier; ?>" />
                                    </td>
                                <tr>
                                    <td>Pemesan <?php echo form_error('remarks') ?></td>
                                    <td><input type="text" class="form-control" name="remarks" id="remarks"
                                            placeholder="Remarks" value="<?php echo $remarks; ?>" />
                                    </td>
                                    <input type="hidden" name="id_receiving" value="<?php echo $id_receiving; ?>" />
                                <tr>
                                    <td colspan='2'><button type="submit"
                                            class="btn btn-sm btn-round btn-primary"><?php echo $button ?></button>
                                        <a href="<?php echo site_url('tb_receiving') ?>"
                                            class="btn btn-sm btn-round btn-default">Kembali</a>
                                    </td>
                                </tr>

                            </table>
                        </form>

                        <button type="button" class="btn btn-sm btn-round btn-primary" data-toggle="modal"
                            data-target="#myModal" class="btn btn-primary round btn-sm">tambah</button>
                        <a href="<?php echo site_url('tb_receiving/report_rev_supplier/') ?><?= $this->uri->segment(3)?>"
                            class="btn btn-sm btn-round btn-warning fa fa-print" target="_blank">Print</a>
                        <br><br>
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
                                    <td><?php echo ++$start ?></td>
                                    <td><?php echo $this->db->get_where('tb_barang',['id_barang' => $tb_receiving->id_barang])->row()->nama_barang; ?>
                                    </td>
                                    <td><?php echo $tb_receiving->jumlah ?></td>
                                    <td>
                                        <?php echo anchor(site_url('tb_receiving/deleteitem/'.$tb_receiving->id_item),'<i class="fa fa-trash-o red"></i>','title="delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); ?>
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