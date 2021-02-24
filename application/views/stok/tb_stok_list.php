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
                    <!--  //echo anchor('tb_stok/create/','Create',array('class'=>'btn btn-danger btn-sm'));?> -->
                    <!-- <?= anchor(site_url('tb_stok/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-sm btn-round btn-warning btn-sm" target="_blank"'); ?><br> -->
                    <!-- <?= anchor(site_url('tb_stok/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
                    <?= anchor(site_url('tb_stok/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>-->
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
                                    <th>Minimal Stok</th>
                                    <th>Unit</th>
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
                                        <span class="badge badge-danger">
                                            <?= $tb_stok->min_stok." ".$tb_stok->nama_satuan ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="label label-lg label-primary arrowed-right">
                                            <?= $tb_stok->nama_unit ?>
                                        </span>
                                    </td>
                                    <?php 
                            // echo anchor(site_url('tb_stok/read/'.$tb_stok->id_barang),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
                            // echo '  '; 
                            // echo anchor(site_url('tb_stok/update/'.$tb_stok->id_barang),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
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