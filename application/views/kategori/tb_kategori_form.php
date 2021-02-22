<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                <h3 class="table-header text-center"><strong>Tambah Kategori Barang</strong></h3>
                    <div class="box box-primary">
                        <form action="<?= $action; ?>" method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Nama Kategori <?= form_error("nama_kategori") ?></td>
                                    <td><input type="text" class="form-control" name="nama_kategori" id="nama_kategori"
                                            autocomplete="off" placeholder="Nama Kategori"
                                            value="<?= $nama_kategori; ?>" />
                                    </td>
                                    <input type="hidden" name="id_kategori" value="<?= $id_kategori; ?>" />
                                <tr>
                                    <td colspan="2">
                                        <div class="btn-group btn-corner">
                                            <button type="submit" class="btn btn-primary btn-sm"
                                                style="margin-right:3px;"><?= $button ?></button>
                                            <a href="<?= site_url('tb_kategori') ?>"
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