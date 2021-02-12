<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li class="active">pemesan</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class='box-title'>pemesan </h3>
                    <?= anchor('tb_pemesan/create/','Create',array('class'=>'btn btn-sm btn-round btn-primary btn-sm'));?><br><br>
                    <!-- <?= anchor(site_url('tb_pemesan/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
                    <?= anchor(site_url('tb_pemesan/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
                    <?= anchor(site_url('tb_pemesan/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?> -->
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <table class="table table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Nama pemesan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            $start = 0;
            foreach ($tb_pemesan_data as $tb_pemesan)
            {
                ?>
                            <tr>
                                <td><?= ++$start ?></td>
                                <td><?= $tb_pemesan->nama_pemesan ?></td>
                                <td style="text-align:center" width="300px">
                                    <div class="btn-group btn-corner">
                                        <?php 
                                            echo anchor(site_url('tb_pemesan/read/'.$tb_pemesan->id_pemesan),'<i class="fa fa-eye"></i> Detail',array('title'=>'detail','class'=>'btn btn-sm btn-info ')); 
                                            echo '  '; 
                                            echo anchor(site_url('tb_pemesan/update/'.$tb_pemesan->id_pemesan),'<i class="fa fa-pencil-square-o"></i> Update',array('title'=>'edit','class'=>'btn btn-sm btn-success ')); 
                                            echo '  '; 
                                            //echo anchor(site_url('tb_pemesan/delete/'.$tb_pemesan->id_pemesan),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-sm btn-danger " onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <?php
            }
            ?>
                        </tbody>
                    </table>
                    <script src="<?= base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
                    <script src="<?= base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                    <script src="<?= base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
                    <script type="text/javascript">
                    $(document).ready(function() {
                        $("#mytable").dataTable();
                    });
                    </script>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->