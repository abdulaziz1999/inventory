

<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= base_url('admin'); ?>">Dashboard</a> 
				</li>
				
				</ul>
		</div>
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                    <h3>Data Jalan</h3>
                  <br>
                
                </div><!-- /.box-header -->
                <div class='box-body'>
                <a href="<?= base_url('jalan/form')?>">tambah</a>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
            <th width="80px">No</th>
		    <th>no urut</th>
		    <th>nama jalan</th>
		    <th>panjang jalan</th>
		    <th>status jalan</th>
		    <th>act</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($jln as $row)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?= $row->nomor_urut ?></td>
		    <td><?= $row->nm_jln ?></td>
		    <td><?= $row->p_jln ?></td>
		    <td><?= $row->status_jln ?></td>
		    <td><a href="jalan/hapus/<?= $row->id ?>">delete</a> | <a href="jalan/formupt/<?= $row->id ?>">update</a></td>
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