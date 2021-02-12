<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>TB_suplier</h3>
                    <div class='box box-primary'>
                        <form action="<?= $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Nama suplier <?= form_error('nama_suplier') ?></td>
                                    <td><input type="text" class="form-control" name="nama_suplier" id="nama_suplier"
                                            autocomplete="off" placeholder="Nama suplier"
                                            value="<?= $nama_suplier; ?>" />
                                    </td>
                                    <input type="hidden" name="id_suplier" value="<?= $id_suplier; ?>" />
                                <tr>
                                    <td colspan='2'><button type="submit"
                                            class="btn btn-primary"><?= $button ?></button>
                                        <a href="<?= site_url('tb_suplier') ?>" class="btn btn-default">Cancel</a>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->