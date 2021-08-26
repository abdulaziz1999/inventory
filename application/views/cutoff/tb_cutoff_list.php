<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li class="active">Cut Off</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'><br>
                    <?= anchor('tb_cutoff/create/','<i class="fa fa-plus"></i> Tambah',array('class'=>'btn btn-sm btn-round btn-primary'));?>
                    <!-- <?= anchor(site_url('tb_cutoff/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
                    <?= anchor(site_url('tb_cutoff/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?> 
                    <?= anchor(site_url('tb_cutoff/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?> -->
                    <h3 class="table-header text-center"><strong>Tabel Data Cut Off</strong></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>

                    <table class="table table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Tanggal Awal</th>
                                <th>Tanggal Akhir</th>
                                <th>Status</th>
                                <th>Status Sinkron</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            $start = 0;
            foreach ($tb_cutoff_data as $tb_cutoff)
            {
                ?>
                            <tr>
                                <td><?= ++$start ?></td>
                                <td><?= date_indo($tb_cutoff->start) ?></td>
                                <td><?= date_indo($tb_cutoff->end) ?></td>
                                <td><?= $tb_cutoff->status == 1 ? '<span class="label label-success arrowed arrowed-right"> Active</span>' : '<span class="label label-danger arrowed">Non Active</span>' ?></td>
                                <td>
                                    <?php $cek = $this->db->get_where('tb_stok',['cutoff_id' => $tb_cutoff->id_cutoff])->num_rows(); ?>
                                    <?php if($tb_cutoff->status == '1' && $cek == '0'):?>
                                        <a class="btn btn-info btn-sm btn-round" href="<?= base_url('tb_cutoff/sinkron_stok/'.$this->session->userdata('idc_old').'/'.$this->session->userdata('idc_now'))?>"><i class="fa fa-refresh"></i> Sinkron Stok</a>
                                    <?php elseif($tb_cutoff->status == 1 && $cek > 0):?>
                                        <a class="btn btn-success btn-sm btn-round" href="#"><i class="fa fa-check text-red" aria-hidden="true"></i> </a>
                                    <?php endif;?>
                                </td>
                                <td style="text-align:center" width="300px">
                                    <div class="btn-group btn-corner">
                                        <?php 
                                            echo anchor(site_url('tb_cutoff/read/'.$tb_cutoff->id_cutoff),'<i class="fa fa-eye"></i> Detail',array('title'=>'detail','class'=>'btn btn-info btn-sm')); 
                                            echo '&nbsp;';  
                                            echo anchor(site_url('tb_cutoff/update/'.$tb_cutoff->id_cutoff),'<i class="fa fa-pencil-square-o"></i> Update',array('title'=>'edit','class'=>'btn btn-success btn-sm')); 
                                            echo '  '; 
                                            //echo anchor(site_url('tb_satuan/delete/'.$tb_satuan->id_cutoff),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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