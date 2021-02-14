<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>TB_SATUAN</h3>
                    <div class='box box-primary'>
                        <form action="<?= $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Nama Satuan <?= form_error('nama_satuan') ?></td>
                                    <td><input type="text" class="form-control" name="nama_satuan" id="nama_satuan"
                                            placeholder="Nama Satuan" value="<?= $nama_satuan; ?>" />
                                    </td>
                                <tr>
                                    <td>Ket <?= form_error('ket') ?></td>
                                    <td><input type="text" class="form-control" name="ket" id="ket" placeholder="Ket"
                                            value="<?= $ket; ?>" />
                                    </td>
                                    <input type="hidden" name="id_satuan" value="<?= $id_satuan; ?>" />
                                <tr>
                                    <td colspan='2'>
                                        <div class="btn-group btn-corner">
                                            <button type="submit" class="btn btn-primary btn-sm"
                                                style="margin-right:3px;"><?= $button ?></button>
                                            <a href="<?= site_url('tb_satuan') ?>"
                                                class="btn btn-danger btn-sm">Kembali</a>
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