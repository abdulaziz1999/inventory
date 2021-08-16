<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li class="active">Warning Stok Barang</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <br>
                    <?= anchor(site_url('tb_stok/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-round btn-success btn-sm"'); ?>
                    <h3 class="table-header text-center"><strong>Data Warning Stok</strong></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                    <th>Unit</th>
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
                                    <td><?= "Rp. ".number_format($tb_stok->harga_beli,0,"",".") ?></td>
                                    <td><?= "Rp. ".number_format($tb_stok->harga_jual,0,"",".") ?></td>
                                    <td>
                                        <span class="badge badge-danger">
                                            <?= $tb_stok->stok ?>
                                        </span>
                                        <i class="ace-icon fa fa-exclamation-triangle 
                                        bigger-120 red icon-animated-vertical"> </i>
                                    </td>
                                    <td><?= $tb_stok->nama_unit ?></td>
                                </tr>
                                <?php
                                }
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