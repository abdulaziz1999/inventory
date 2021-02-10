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
                    <h3 class='box-title'>Stok Barang</h3>
                    <br>
                    <!--  //echo anchor('tb_stok/create/','Create',array('class'=>'btn btn-danger btn-sm'));?> -->
                    <?= anchor(site_url('tb_stok/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-sm btn-round btn-warning btn-sm" target="_blank"'); ?><br><br>
                    <!-- <?= anchor(site_url('tb_stok/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		            <?= anchor(site_url('tb_stok/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>-->
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <table class="table table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 0;
                            foreach ($tb_stok_data as $tb_stok)
                            {
                                $min_stok = $this->db->get_where('tb_barang',['id_barang' => $tb_stok->id_barang])->row()->min_stok;
                                if($tb_stok->stok <= $min_stok){
                            ?>
                            <tr>
                                <td><?= ++$start ?></td>
                                <td>
                                    <?= $this->db->get_where('tb_barang',['id_barang' => $tb_stok->id_barang])->row()->nama_barang ?>
                                </td>
                                <td><?= $tb_stok->stok ?></td>
                            </tr>
                            <?php
                                }
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