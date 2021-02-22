<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                <h3 class="table-header text-center"><strong>Read Pemesan Barang</strong></h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>Nama pemesan</td>
                            <td><?= $nama_pemesan; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="<?= site_url('tb_pemesan') ?>" class="btn btn-danger btn-sm btn-round">Kembali</a></td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->