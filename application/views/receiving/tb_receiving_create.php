<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li>
            <i class="ace-icon fa fa-shopping-cart"></i>
            <a href="<?= base_url('tb_receiving'); ?>">Receiving</a>
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

                    <h3 class="table-header text-center"><strong>Buat Data Barang Masuk</strong></h3>
                    <div class='box box-primary'>
                        <form action="<?= $action; ?>" method="post">
                            <table class='table table-bordered table-hover table-striped'>
                                <tr>
                                    <td>Tanggal <?= form_error('tgl') ?></td>
                                    <td><input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tgl"
                                            required autocomplete="off" value="<?= $tgl; ?>" />
                                    </td>
                                <tr>
                                    <td>No PO <?= form_error('no_ref') ?></td>
                                    <td><input type="text" class="form-control" name="no_ref" id="no_ref" required
                                            autocomplete="off" placeholder="No Ref" value="<?= $no_ref; ?>" />
                                    </td>
                                <tr>
                                    <td>Supplier <?= form_error('supplier') ?></td>
                                    <td>
                                        <select class="form-control" name="supplier" id="supplier" required>
                                            <option value="" selected disabled>----Pilih Nama Supplier----</option>
                                            <?php foreach($nm_suplier->result() as $s):?>
                                            <option <?php if($supplier == $s->id_suplier) { echo 'selected';}?>
                                                value="<?= $s->id_suplier?>"><?= $s->nama_suplier?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                <tr>
                                    <td>Pemesan <?= form_error('remarks') ?></td>
                                    <td>
                                        <select class="form-control" name="remarks" id="remarks" required>
                                            <option value="" selected disabled>----Pilih Nama Pemesan----</option>
                                            <?php foreach($nm_pemesan->result() as $s):?>
                                            <option <?php if($supplier == $s->id_pemesan) { echo 'selected';}?>
                                                value="<?= $s->id_pemesan?>"><?= $s->nama_pemesan?></option>
                                            <?php endforeach;?>
                                        </select> 
                                    </td>
                                    <input type="hidden" name="id_receiving" value="<?= $id_receiving; ?>" />
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
                                            <a href="<?= site_url('tb_receiving') ?>" class="btn btn-sm btn-danger">
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