<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                <h3 class="table-header text-center"><strong>Read customer Barang</strong></h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>Nama customer</td>
                            <td><?= $nama_customer; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="<?= site_url('tb_customer') ?>" class="btn btn-danger btn-sm btn-round">Kembali</a></td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->