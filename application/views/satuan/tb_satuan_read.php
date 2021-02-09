<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class='box-title'>Tb_satuan Read</h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>Nama Satuan</td>
                            <td><?php echo $nama_satuan; ?></td>
                        </tr>
                        <tr>
                            <td>Ket</td>
                            <td><?php echo $ket; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="<?php echo site_url('tb_satuan') ?>" class="btn btn-default">Cancel</a></td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->