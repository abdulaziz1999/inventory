<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li class="active">Master Barang</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <br>
                    <?= anchor('tb_barang/create/','<i class="fa fa-plus"></i> Tambah',array('class'=>'btn btn-sm btn-round btn-primary btn-sm'));?>
                    <!-- <button class="btn btn-sm btn-warning btn-round" data-toggle="modal" data-target="#ModalaEdit">
                        <i class="fa fa-barcode"></i> Scan Barcode
                    </button> -->
                    <form action="<?= base_url('tb_barang/save')?>" method="post">
                        <input name="kode" id="myTextField" class="form-control" type="text" autocomplete="off">
                        <button type="submit" class="btn btn-sm btn-round btn-block btn-success">
                            <i class="fa fa-barcode"></i> Save
                        </button>
                    </form>
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
                    <h3 class="table-header text-center"><strong>Table Master Barang</strong></h3>
                </div>
                <div class='box-body'>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped " id="mytable">
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                                    <th>Part Number</th>
                                    <th>Kode Barcode</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Brand</th>
                                    <th>Satuan</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Unit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $start = 0;
                        foreach ($tb_barang_data as $tb_barang)
                        {   
                        ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td><?= $tb_barang->part_number ?></td>
                                    <td><?= $tb_barang->kode_barcode ?></td>
                                    <td><?= $tb_barang->nama_barang ?></td>
                                    <td>
                                        <?= @$this->db->get_where('tb_kategori',['id_kategori' => $tb_barang->kategori])->row()->nama_kategori; ?>
                                    </td>
                                    <td>
                                        <?= @$this->db->get_where('tb_brand',['id_brand' => $tb_barang->brand])->row()->nama_brand; ?>
                                    </td>
                                    <td>
                                        <span class="label label-lg label-yellow arrowed-in arrowed-in-right">
                                            <?= @$this->db->get_where('tb_satuan',['id_satuan' => $tb_barang->satuan])->row()->nama_satuan; ?>
                                        </span>
                                    </td>
                                    <td><?= "Rp. ".number_format($tb_barang->harga_beli,0,"",".") ?></td>
                                    <td><?= "Rp. ".number_format($tb_barang->harga_jual,0,"",".") ?></td>
                                    <td>
                                        <span class="label label-lg label-primary arrowed-right">
                                            <?= @$this->db->get_where('tb_unit',['id_unit' => $tb_barang->unit_id])->row()->nama_unit; ?>
                                        </span>
                                    </td>
                                    <td width="300px" class="text-center">
                                        <div class="btn-group btn-corner">
                                            <?php 
                                            echo anchor(site_url('tb_barang/read/'.$tb_barang->id_barang),'<i class="fa fa-eye"></i> <b>Detail</b>',array('title'=>'detail','class'=>'btn btn-sm btn-info')); 
                                            echo '&nbsp'; 
                                            echo anchor(site_url('tb_barang/update/'.$tb_barang->id_barang),'<i class="fa fa-pencil-square-o"></i> Update',array('title'=>'edit','class'=>'btn btn-sm btn-success')); 
                                            echo '&nbsp;&nbsp;'; 
                                            echo anchor(site_url('tb_barang/delete/'.$tb_barang->id_barang),'<i class="fa fa-trash-o"></i> Delete','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                        ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                        }
                        ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Edit Jenjang</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-4">Id Jenjang</label>
                        <div class="col-xs-9">
                            <input name="kobar_edit" id="kode_barang2" class="form-control" type="text"
                                placeholder="Kode Barang" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4">Kode Jenjang</label>
                        <div class="col-xs-9">
                            <input name="nabar_edit" id="myTextField" class="form-control" type="text"
                                placeholder="Nama Barang" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4">Nama Jenjang</label>
                        <div class="col-xs-9">
                            <input name="harga_edit" id="harga2" class="form-control" type="text" placeholder="Harga"
                                required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById("myTextField").focus();
</script>