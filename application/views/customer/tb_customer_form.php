<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                <h3 class="table-header text-center"><strong>Tambah customer Barang</strong></h3>
                    <div class='box box-primary'>
                        <form action="<?= $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Nama customer <?= form_error('nama_customer') ?></td>
                                    <td><input type="text" class="form-control" name="nama_customer" id="nama_customer"
                                            autocomplete="off" placeholder="Nama customer"
                                            value="<?= $nama_customer; ?>" />
                                    </td>
                                    <input type="hidden" name="id_customer" value="<?= $id_customer; ?>" />
                                <tr>
                                    <td colspan='2'>
                                        <div class="btn-group btn-corner">
                                            <button type="submit" class="btn btn-primary btn-sm"
                                                style="margin-right:3px;"><?= $button ?></button>
                                            <a href="<?= site_url('tb_customer') ?>"
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