<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li class="active">Nama Proyek</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'><br>
                    <?= anchor('tb_proyek/create/','Tambah',array('class'=>'btn btn-sm btn-round btn-primary btn-sm'));?>
                    <!-- <?= anchor(site_url('tb_proyek/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
                    <?= anchor(site_url('tb_proyek/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
                    <?= anchor(site_url('tb_proyek/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?> -->
                    <h3 class="table-header text-center"><strong>Tabel Nama Proyek</strong></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <table class="table table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Nama Proyek</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            $start = 0;
            foreach ($tb_proyek_data as $tb_proyek)
            {
                ?>
                            <tr>
                                <td><?= ++$start ?></td>
                                <td><?= $tb_proyek->nama_proyek ?></td>
                                <td style="text-align:center" width="300px">
                                    <div class="btn-group btn-corner">
                                        <?php 
                                            echo anchor(site_url('tb_proyek/read/'.$tb_proyek->id_proyek),'<i class="fa fa-eye"></i> Detail',array('title'=>'detail','class'=>'btn btn-sm btn-info ')); 
                                            echo '  '; 
                                            echo anchor(site_url('tb_proyek/update/'.$tb_proyek->id_proyek),'<i class="fa fa-pencil-square-o"></i> Update',array('title'=>'edit','class'=>'btn btn-sm btn-success ')); 
                                            echo '  '; 
                                            //echo anchor(site_url('tb_proyek/delete/'.$tb_proyek->id_proyek),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-sm btn-danger " onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                        ?>
                                    </div>
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