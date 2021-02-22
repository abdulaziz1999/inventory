<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class='box-title'>Tb_user Read</h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>Nama User</td>
                            <td><?= $nama; ?></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><?= $username; ?></td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td><?= $level; ?></td>
                        </tr>
                        <td></td>
                        <td><a href="<?= site_url('tb_user') ?>" class="btn btn-default">Cancel</a></td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->