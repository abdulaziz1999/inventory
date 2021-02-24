<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li class="active">Nama log</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'><br>
                    <?= anchor('tb_log/create/','<i class="fa fa-plus"></i> Tambah',array('class'=>'btn btn-sm btn-round btn-primary btn-sm'));?>
                    <!-- <?= anchor(site_url('tb_log/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
                    <?= anchor(site_url('tb_log/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
                    <?= anchor(site_url('tb_log/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?> -->
                    <h3 class="table-header text-center"><strong>Tabel Nama log</strong></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <table class="table table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Nama log</th>
                                <th>Aktifitas</th>
                                <th>Level</th>
                                <th>Browser</th>
                                <th>Platform</th>
                                <th>IP</th>
                                <th>Waktu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            $start = 0;
            foreach ($tb_log_data as $tb_log)
            {
                ?>
                            <tr>
                                <td><?= ++$start ?></td>
                                <td><?= $tb_log->nama ?></td>
                                <td><?= $tb_log->aktifitas ?></td>
                                <td><?= $tb_log->level ?></td>
                                <td><?= $tb_log->browser ?></td>
                                <td><?= $tb_log->platform ?></td>
                                <td><?= $tb_log->ip_address ?></td>
                                <td><?= $tb_log->waktu ?></td>
                                <td style="text-align:center" width="300px">
                                    <div class="btn-group btn-corner">
                                        <?php 
                                            echo anchor(site_url('tb_log/read/'.$tb_log->id_log),'<i class="fa fa-eye"></i> Detail',array('title'=>'detail','class'=>'btn btn-sm btn-info ')); 
                                            echo '  '; 
                                            echo anchor(site_url('tb_log/update/'.$tb_log->id_log),'<i class="fa fa-pencil-square-o"></i> Update',array('title'=>'edit','class'=>'btn btn-sm btn-success ')); 
                                            echo '  '; 
                                            //echo anchor(site_url('tb_log/delete/'.$tb_log->id_log),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-sm btn-danger " onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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