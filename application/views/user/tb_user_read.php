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
                            <td><?php echo $nama_user; ?></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><?php echo $password; ?></td>
                        </tr>
                        <tr>
                            <td>Hak Akses</td>
                            <td><?php echo $hak_akses; ?></td>
                        </tr>
                        <tr>
                            <td>Avatar</td>
                            <td><?php echo $avatar; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="<?php echo site_url('tb_user') ?>" class="btn btn-default">Cancel</a></td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->