<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>Table Issuing</h3>
                    <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Tgl <?php echo form_error('tgl') ?></td>
                                    <td><input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tgl"
                                            value="<?php echo $tgl; ?>" />
                                    </td>
                                <tr>
                                    <td>No Invoice <?php echo form_error('no_ref') ?></td>
                                    <td><input type="text" class="form-control" name="no_ref" id="no_ref"
                                            placeholder="No Ref" value="<?php echo $no_ref; ?>" />
                                    </td>
                                <tr>
                                    <td>Penerima <?php echo form_error('picker') ?></td>
                                    <td><input type="text" class="form-control" name="picker" id="picker"
                                            placeholder="Picker" value="<?php echo $picker; ?>" />
                                    </td>
                                <tr>
                                    <td>Pemesan <?php echo form_error('remarks') ?></td>
                                    <td><input type="text" class="form-control" name="remarks" id="remarks"
                                            placeholder="Remarks" value="<?php echo $remarks; ?>" />
                                    </td>
                                    <input type="hidden" name="id_issuing" value="<?php echo $id_issuing; ?>" />
                                <tr>
                                    <td colspan='2'><button type="submit"
                                            class="btn btn-sm btn-round btn-primary"><?php echo $button ?></button>
                                        <a href="<?php echo site_url('tb_issuing') ?>"
                                            class="btn btn-sm btn-round btn-default">Kembali</a>
                                    </td>
                                </tr>

                            </table>
                        </form>
                        <hr>
                        <button type="button" class="btn btn-sm btn-round btn-primary" data-toggle="modal"
                            data-target="#myModal" class="btn btn-primary round btn-sm">tambah</button>
                        <a href="<?php echo site_url('tb_issuing/report_iss_picker/') ?><?= $this->uri->segment(3)?>"
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
                          foreach ($b_issuing->result() as $issuing)
                          {
                              ?>
                                <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><?php echo $this->db->get_where('tb_barang',['id_barang' => $issuing->id_barang])->row()->nama_barang; ?>
                                    </td>
                                    <td><?php echo $issuing->jumlah ?></td>
                                    <td>
                                        <?php echo anchor(site_url('tb_issuing/deleteitem/'.$issuing->id_itemiss),'<i class="fa fa-trash-o red"></i>','title="delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); ?>
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

<!-- The Modal -->
<div class="modal fide" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-info">
                <h4 class="modal-title">Tambah Issuing Barang <button type="button" class="close"
                        data-dismiss="modal">&times;</button></h4>

            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="<?= base_url('tb_issuing/simpan_barang')?>/<?= $this->uri->segment(3)?>" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="barang">Nama Barang :</label>
                            <div class="form-group">
                                <select class="form-control col-md-12" type="text" name="barang" required>
                                    <option value="" disabled></option>
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