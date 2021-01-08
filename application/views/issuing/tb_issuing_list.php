<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= base_url('admin'); ?>">Dashboard</a> 
				</li>
				<li class="active">Issuing</li>
				</ul>
		</div>
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Barang Keluar</h3>
    <?php echo anchor('tb_issuing/create/','Create',array('class'=>'btn btn-sm btn-round btn-primary'));?><br><br>
		<!-- <?php echo anchor(site_url('tb_issuing/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('tb_issuing/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('tb_issuing/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?> -->
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Tgl</th>
		    <th>No Invoice</th>
		    <th>Penerima</th>
		    <th>Pemesan</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($tb_issuing_data as $tb_issuing)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $tb_issuing->tgl ?></td>
		    <td><?php echo $tb_issuing->no_ref ?></td>
		    <td><?php echo $tb_issuing->picker ?></td>
		    <td><?php echo $tb_issuing->remarks ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('tb_issuing/read/'.$tb_issuing->id_issuing),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-info btn-sm btn-round')); 
			echo '  '; 
			echo anchor(site_url('tb_issuing/update/'.$tb_issuing->id_issuing),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-success btn-sm btn-round')); 
			echo '  '; 
			echo anchor(site_url('tb_issuing/delete/'.$tb_issuing->id_issuing),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm btn-round" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->