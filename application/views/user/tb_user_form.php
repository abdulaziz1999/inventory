<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>TB_USER</h3>
                    <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Nama User <?php echo form_error('nama_user') ?></td>
                                    <td><input type="text" class="form-control" name="nama_user" id="nama_user"
                                            placeholder="Nama User" value="<?php echo $nama_user; ?>" />
                                    </td>
                                <tr>
                                    <td>Password <?php echo form_error('password') ?></td>
                                    <td><input type="text" class="form-control" name="password" id="password"
                                            placeholder="Password" value="<?php echo $password; ?>" />
                                    </td>
                                <tr>
                                    <td>Hak Akses <?php echo form_error('hak_akses') ?></td>
                                    <td><input type="text" class="form-control" name="hak_akses" id="hak_akses"
                                            placeholder="Hak Akses" value="<?php echo $hak_akses; ?>" />
                                    </td>
                                <tr>
                                    <td>Avatar <?php echo form_error('avatar') ?></td>
                                    <td><input type="text" class="form-control" name="avatar" id="avatar"
                                            placeholder="Avatar" value="<?php echo $avatar; ?>" />
                                    </td>
                                    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
                                <tr>
                                    <td colspan='2'><button type="submit"
                                            class="btn btn-primary"><?php echo $button ?></button>
                                        <a href="<?php echo site_url('tb_user') ?>" class="btn btn-default">Cancel</a>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->