<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>TB_STOK</h3>
                    <div class='box box-primary'>
                        <form action="<?= $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Stok <?= form_error('stok') ?></td>
                                    <td><input type="text" class="form-control"  name="stok" id="stok" placeholder="Stok"
                                            value="<?= $stok; ?>"  />
                                    </td>
                                <tr>
                                    <td>Jumla baik <?= form_error('jml_baik') ?></td>
                                    <td>
                                        <input type="text" class="form-control" name="jml_baik" id="jml_baik"
                                                placeholder="jml_baik" value="<?= $jml_baik; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jumla rusak <?= form_error('jml_rusak') ?></td>
                                    <td>
                                        <input type="text" class="form-control" name="jml_rusak" id="jml_rusak"
                                                placeholder="jml_rusak" value="<?= $jml_rusak; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jumla hilang <?= form_error('jml_hilang') ?></td>
                                    <td>
                                        <input type="text" class="form-control" name="jml_hilang" id="jml_hilang"
                                                placeholder="jml_hilang" value="<?= $jml_hilang; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" name="id_barang" value="<?= $id_barang; ?>" />
                                    <td colspan='2'>
                                    <div class="btn-group btn-corner">
                                        <button type="submit" class="btn btn-primary" style="margin-right:3px;"><?= $button ?></button>
                                        <a href="<?= site_url('tb_stok') ?>" class="btn btn-danger">Kembali</a>
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