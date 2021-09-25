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
                    <br>
                    <?= anchor('tb_issuing/create/','<i class="fa fa-plus"></i> Tambah',array('class'=>'btn btn-sm btn-round btn-primary'));?><br>
                    <!-- <?= anchor(site_url('tb_issuing/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
                    <?= anchor(site_url('tb_issuing/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
                    <?= anchor(site_url('tb_issuing/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?> -->
                    <?php if($this->session->flashdata('sukses')):?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class="ace-icon fa fa-times"></i>
                        </button>
                        <strong><i class="ace-icon fa fa-check"></i> Sukses </strong>
                        <?= $this->session->flashdata('sukses')?>
                    </div>
                    <?php elseif($this->session->flashdata('gagal')):?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class="ace-icon fa fa-times"></i>
                        </button>
                        <strong><i class="ace-icon fa fa-times"></i> Gagal </strong>
                        <?= $this->session->flashdata('gagal')?>
                    </div>
                    <?php endif;?>
                    <h3 class="table-header text-center"><strong>Data Barang Keluar</strong></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="80px">No</th>
                                        <th>Tgl</th>
                                        <th>No Invoice</th>
                                        <th>Customer</th>
                                        <th>Pemesan</th>
                                        <th>Nama Proyek</th>
                                        <th>Keterangan</th>
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
                                        <td><?= ++$start ?></td>
                                        <td><?= date_indo($tb_issuing->tgl) ?></td>
                                        <td><?= $tb_issuing->no_ref ?></td>
                                        <td>
                                            <?= @$this->db->get_where('tb_customer',['id_customer' => $tb_issuing->picker])->row()->nama_customer ?>
                                        </td>
                                        <td>
                                            <?= @$this->db->get_where('tb_pemesan',['id_pemesan' => $tb_issuing->remarks])->row()->nama_pemesan ?>
                                        </td>
                                        <td>
                                            <?= @$this->db->get_where('tb_proyek',['id_proyek' => $tb_issuing->nama_proyek])->row()->nama_proyek ?>
                                        </td>
                                        <td><?= $tb_issuing->ket ?></td>
                                        <td style="text-align:center" width="300px">
                                            <div class="btn-group btn-corner">
                                                <?php 
                                    echo anchor(site_url('tb_issuing/read/'.$tb_issuing->id_issuing),'<i class="fa fa-eye"></i> Detail',array('title'=>'detail','class'=>'btn btn-info btn-sm')); 
                                    echo '&nbsp;&nbsp;'; 
                                    echo anchor(site_url('tb_issuing/update/'.$tb_issuing->id_issuing),'<i class="fa fa-pencil-square-o"></i> Update',array('title'=>'edit','class'=>'btn btn-success btn-sm')); 
                                    echo '&nbsp;&nbsp;'; 
                                    // echo anchor(site_url('tb_issuing/delete/'.$tb_issuing->id_issuing),'<i class="fa fa-trash-o"></i> Delete','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                    ?>
                                            </div>
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