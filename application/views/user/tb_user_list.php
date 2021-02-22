<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class='box-title'>TB_USER LIST</h3>
                    <div class="btn-group btn-corner">
                        <?= anchor('tb_user/create/','Create',['class'=>'btn btn-primary btn-sm']);?>
                        <?= anchor(site_url('tb_user/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-success btn-sm"'); ?>
                        <?= anchor(site_url('tb_user/word'), '<i class="fa fa-file-word-o"></i> Word ', 'class="btn btn-info btn-sm" style="margin-right:2px;"'); ?>
                        <?= anchor(site_url('tb_user/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-danger btn-sm"'); ?>
                    </div>
                    <br>
                    <br>
                </div>
                <div class='box-body'>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Nama User</th>
                                <th>Username</th>
                                <th>Hak Akses</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            $start = 0;
            foreach ($tb_user_data as $tb_user)
            {
                ?>
                            <tr>
                                <td><?= ++$start ?></td>
                                <td><?= $tb_user->nama ?></td>
                                <td><?= $tb_user->username ?></td>
                                <td><?= $tb_user->level ?></td>
                                <td style="text-align:center" width="300px">
                                    <div class="btn-group btn-corner">
                                        <?php 
                                            echo anchor(site_url('tb_user/read/'.$tb_user->id_pengguna),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-info btn-sm')); 
                                            echo '&nbsp;'; 
                                            echo anchor(site_url('tb_user/update/'.$tb_user->id_pengguna),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-success btn-sm')); 
                                            echo '&nbsp;'; 
                                            echo anchor(site_url('tb_user/delete/'.$tb_user->id_pengguna),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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