<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li class="active">Receiving</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <br>
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                        <select class="form-control" name="idc" id="unit_id">
                                            <option value="" selected disabled>----Pilih Cut Off----</option>
                                            <?php foreach($cutoff->result() as $key):?>
                                            <option
                                                <?php if($this->input->get('idc', TRUE) == $key->id_cutoff) { echo 'selected';}?>
                                                value="<?= $key->id_cutoff?>">
                                                <?= date_indo($key->start)?> - <?= date_indo($key->end)?> - <?= $key->status == 1 ? ' <b>AKTIF</b>' : ''?>
                                            </option>
                                            <?php endforeach;?>
                                        </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="btn-group btn-corner">
                                    <button type="submit" class="btn tampil btn-sm btn-primary"
                                        style="margin-right:3px;"><i class="fa fa-eye"></i> Filter</button>
                                    <a href="<?= site_url('tb_barang') ?>" class="btn btn-sm btn-danger">
                                        <i class="fa fa-remove"></i> Reset</a>
                                </div>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </form>
                    <?= anchor('tb_receiving/create/','<i class="fa fa-plus"></i> Tambah',array('class'=>'btn btn-primary btn-sm btn-round'));?><br>
                    <!-- <?= anchor(site_url('tb_receiving/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
                    <?= anchor(site_url('tb_receiving/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
                    <?= anchor(site_url('tb_receiving/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?> -->
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
                    <h3 class="table-header text-center"><strong>Data Barang Masuk</strong></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                                    <th>Tgl</th>
                                    <th>No PO</th>
                                    <th>Supplier</th>
                                    <th>Pemesan</th>
                                    <th>Nama Proyek</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $start = 0;
                            foreach ($tb_receiving_data as $tb_receiving)
                            {
                                ?>
                                <tr>
                                    <td><?= ++$start ?></td>
                                    <td><?= date_indo($tb_receiving->tgl) ?></td>
                                    <td><?= $tb_receiving->no_ref ?></td>
                                    <td>
                                        <?= @$this->db->get_where('tb_suplier',['id_suplier' => $tb_receiving->supplier])->row()->nama_suplier ?>
                                    </td>
                                    <td>
                                        <?= @$this->db->get_where('tb_pemesan',['id_pemesan' => $tb_receiving->remarks])->row()->nama_pemesan ?>
                                    </td>
                                    <td>
                                        <?= @$this->db->get_where('tb_proyek',['id_proyek' => $tb_receiving->nama_proyek])->row()->nama_proyek ?>
                                    </td>
                                    <td><?= @$tb_receiving->ket ?></td>
                                    <td style="text-align:center" width="300px">
                                    <?php if($cutoffactive == 1 || $cutoffactive == ''):?>
                                        <div class="btn-group btn-corner">
                                            <?php 
                                                echo anchor(site_url('tb_receiving/read/'.$tb_receiving->id_receiving),'<i class="fa fa-eye"></i> Detail',array('title'=>'detail','class'=>'btn btn-info btn-sm')); 
                                                echo '&nbsp;&nbsp;'; 
                                                echo anchor(site_url('tb_receiving/update/'.$tb_receiving->id_receiving),'<i class="fa fa-pencil-square-o"></i> Update',array('title'=>'edit','class'=>'btn btn-success btn-sm')); 
                                                echo '&nbsp;&nbsp;'; 
                                                // echo anchor(site_url('tb_receiving/delete/'.$tb_receiving->id_receiving),'<i class="fa fa-trash-o"></i> Delete','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                                ?>
                                        </div>
                                    <?php endif;?>
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