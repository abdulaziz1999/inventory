<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li class="active">Stok Barang</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <br>
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                        <select class="form-control" name="idc" id="unit_id">
                                            <option value="" selected disabled>----Pilih Cut Off----</option>
                                            <?php foreach($cutoff->result() as $key):?>
                                            <option
                                                <?php if($this->input->get('idc', TRUE) == $key->id_cutoff) { echo 'selected';}?>
                                                value="<?= $key->id_cutoff?>">
                                                <?= date_indo($key->start)?> - <?= date_indo($key->end)?> - <?= $key->status == 1 ? ' <b>AKTIF</b>' : ''?>
                                            </option>
                                            <?php endforeach;?>
                                        </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="btn-group btn-corner">
                                    <button type="submit" class="btn tampil btn-sm btn-primary"
                                        style="margin-right:3px;"><i class="fa fa-eye"></i> Filter</button>
                                    <a href="<?= site_url('tb_stok') ?>" class="btn btn-sm btn-danger">
                                        <i class="fa fa-remove"></i> Reset</a>
                                </div>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </form>
                    <!--  //echo anchor('tb_stok/create/','Create',array('class'=>'btn btn-danger btn-sm'));?> -->
                    <?= anchor(site_url('tb_stok/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-sm btn-round btn-danger btn-sm" target="_blank"'); ?>
                    <?= anchor(site_url('tb_stok/excelphp'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-round btn-success btn-sm"'); ?>
                    <!-- <?= anchor(site_url('tb_stok/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?> -->
                    <h3 class="table-header text-center"><strong>Data Stok Barang</strong></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori Barang</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stok Barang</th>
                                    <th>Jumlah Baik</th>
                                    <th>Jumlah Rusak</th>
                                    <th>Jumlah Hilang</th>
                                    <th>Minimal Stok</th>
                                    <th>Unit</th>
                                    <th>Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $start = 0;
                            foreach ($tb_stok_data as $tb_stok)
                            {
                                ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td>
                                        <?= $tb_stok->nama_barang ?>
                                    </td>
                                    <td>
                                        <?= $tb_stok->nama_kategori ?>
                                    </td>
                                    <td><?= "Rp. ".number_format($tb_stok->harga_beli,0,"",".") ?></td>
                                    <td><?= "Rp. ".number_format($tb_stok->harga_jual,0,"",".") ?></td>
                                    <td>
                                        <span class="badge badge-success">
                                            <?= $tb_stok->stok." ".$tb_stok->nama_satuan ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-info">
                                            <?= $tb_stok->jml_baik." ".$tb_stok->nama_satuan ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">
                                            <?= $tb_stok->jml_rusak." ".$tb_stok->nama_satuan ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-secondary">
                                            <?= $tb_stok->jml_hilang." ".$tb_stok->nama_satuan ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-danger">
                                            <?= $tb_stok->min_stok." ".$tb_stok->nama_satuan ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="label label-lg label-primary arrowed-right">
                                            <?= $tb_stok->nama_unit ?>
                                        </span>
                                    </td>
                                    <td>
                                    <?php 
                            // echo anchor(site_url('tb_stok/read/'.$tb_stok->id_barang),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
                            // echo '  ';
                            if($this->session->userdata('level') == 'operator') {
                            }else{
                                echo anchor(site_url('tb_stok/update/'.$tb_stok->id_barang),'<i class="fa fa-pencil-square-o"></i> Update',array('title'=>'edit','class'=>'btn btn-success btn-sm btn-round')); 
                            }
                            // echo '  '; 
                            // echo anchor(site_url('tb_stok/delete/'.$tb_stok->id_barang),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			                ?>
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