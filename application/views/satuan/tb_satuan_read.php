<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                <h3 class="table-header text-center"><strong>Read Satuan Barang</strong></h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>Nama Satuan</td>
                            <td><?= $nama_satuan; ?></td>
                        </tr>
                        <tr>
                            <td>Ket</td>
                            <td><?= $ket; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="<?= site_url('tb_satuan') ?>" class="btn btn-danger btn-round ntn-sm">Kembali</a></td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->