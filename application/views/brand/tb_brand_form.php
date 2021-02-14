<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>TB_BRAND</h3>
                    <div class='box box-primary'>
                        <form action="<?= $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Nama Brand <?= form_error('nama_brand') ?></td>
                                    <td><input type="text" class="form-control" name="nama_brand" id="nama_brand"
                                            autocomplete="off" placeholder="Nama Brand" value="<?= $nama_brand; ?>" />
                                    </td>
                                    <input type="hidden" name="id_brand" value="<?= $id_brand; ?>" />
                                <tr>
                                    <td colspan='2'>
                                        <div class="btn-group btn-corner">
                                            <button type="submit" class="btn btn-primary btn-sm"
                                                style="margin-right:3px;"><?= $button ?></button>
                                            <a href="<?= site_url('tb_brand') ?>"
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