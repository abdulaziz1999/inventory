<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li>
            <i class="ace-icon fa fa-truck"></i>
            <a href="<?= base_url('tb_issuing'); ?>">Issuing</a>
        </li>
        <li class="active">Tambah</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class="table-header text-center"><strong>Buat Data Barang Keluar</strong></h3>
                    <div class='box box-primary'>
                        <form action="<?= $action; ?>" method="post">
                            <table class='table table-bordered table-hover table-striped'>
                                <tr>
                                    <td>Tanggal <?= form_error('tgl') ?></td>
                                    <td>
                                        <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tgl"
                                            required value="<?= $tgl; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>No Invoice <?= form_error('no_ref') ?></td>
                                    <td>
                                        <input type="text" class="form-control" name="no_ref" id="no_ref" required
                                            placeholder="No Ref" value="<?= $no_ref; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Customer <?= form_error('picker') ?></td>
                                    <td>
                                        <select class="form-control" name="picker" id="picker" required>
                                            <option value="" selected disabled>----Pilih Nama Customer----</option>
                                            <?php foreach($nm_customer->result() as $s):?>
                                            <option
                                                <?php if($picker == $s->id_customer) { echo 'selected';}?>
                                                value="<?= $s->id_customer?>"><?= $s->nama_customer?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pemesan <?= form_error('remarks') ?></td>
                                    <td>
                                        <select class="form-control" name="remarks" id="remarks" required>
                                            <option value="" selected disabled>----Pilih Nama Pemesan----</option>
                                            <?php foreach($nm_pemesan->result() as $s):?>
                                            <option
                                                <?php if($remarks == $s->id_pemesan) { echo 'selected';}?>
                                                value="<?= $s->id_pemesan?>"><?= $s->nama_pemesan?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Proyek <?= form_error('nama_proyek') ?></td>
                                    <td>
                                        <select class="form-control" name="nama_proyek" id="nama_proyek" required>
                                            <option value="" selected disabled>----Pilih Nama Proyek----</option>
                                            <?php foreach($nm_proyek->result() as $s):?>
                                            <option <?php if($nama_proyek == $s->id_proyek) { echo 'selected';}?>
                                                value="<?= $s->id_proyek?>"><?= $s->nama_proyek?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Keterangan <?= form_error('ket') ?></td>
                                    <td><input type="text" class="form-control" name="ket" id="ket"
                                            placeholder="Keterangan" value="<?= $ket; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <div class="btn-group btn-corner">
                                            <button type="submit" class="btn btn-sm btn-primary"
                                                style="margin-right:3px;"><i class="fa fa-plus"></i>
                                                <?= $button ?></button>
                                            <a href="<?= site_url('tb_issuing') ?>" class="btn btn-sm btn-danger">
                                                <i class="fa fa-reply"></i> Kembali</a>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->