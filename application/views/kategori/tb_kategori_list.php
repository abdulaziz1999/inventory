<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li class="active">Kategori</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class='box-title'>Kategori Barang</h3>
                    <?php echo anchor('tb_kategori/create/','Create',array('class'=>'btn btn-sm btn-round btn-primary btn-sm'));?><br><br>
                    <!-- <?php echo anchor(site_url('tb_kategori/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('tb_kategori/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('tb_kategori/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?> -->
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Nama Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            $start = 0;
            foreach ($tb_kategori_data as $tb_kategori)
            {
                ?>
                            <tr>
                                <td><?php echo ++$start ?></td>
                                <td><?php echo $tb_kategori->nama_kategori ?></td>
                                <td style="text-align:center" width="140px">
                                    <?php 
			echo anchor(site_url('tb_kategori/read/'.$tb_kategori->id_kategori),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-sm btn-round btn-info btn-sm')); 
			echo '  '; 
			echo anchor(site_url('tb_kategori/update/'.$tb_kategori->id_kategori),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-sm btn-round btn-success btn-sm')); 
			echo '  '; 
			//echo anchor(site_url('tb_kategori/delete/'.$tb_kategori->id_kategori),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-sm btn-round btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
                                </td>
                            </tr>
                            <?php
            }
            ?>
                        </tbody>
                    </table>
                    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
                    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
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