<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>TB_USER</h3>
                    <div class='box box-primary'>
                        <form action="<?= $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Nama User <?= form_error('nama') ?></td>
                                    <td><input type="text" class="form-control" name="nama" id="nama"
                                            placeholder="Nama User" value="<?= $nama; ?>" />
                                    </td>
                                <tr>
                                    <td>Username <?= form_error('username') ?></td>
                                    <td><input type="text" class="form-control" name="username" id="username"
                                            placeholder="username" value="<?= $username; ?>" />
                                    </td>
                                <tr>
                                    <td>Level <?= form_error('level') ?></td>
                                    <td>
                                        <select class="form-control" name="level"  required>
                                            <option>----Pilih Level----</option>
                                        <?php if($this->uri->segment(2) == 'update'){?>
                                            <?php if($level == 'admin'){?>
                                                <option value="admin" selected>Admin</option>
                                                <option value="staff">Staff</option>
                                                <option value="operator">Operator</option>
                                            <?php }elseif($level == 'staff'){?>
                                                <option value="admin">Admin</option>
                                                <option value="staff" selected>Staff</option>
                                                <option value="operator">Operator</option>
                                            <?php  }elseif($level == 'operator'){?>
                                                <option value="admin">Admin</option>
                                                <option value="staff" selected>Staff</option>
                                                <option value="operator">Operator</option>
                                            <?php }?>
                                        <?php }else{?>
                                                <option value="admin">Admin</option>
                                                <option value="staff">Staff</option>
                                                <option value="operator">Operator</option>
                                        <?php }?>
                                        </select>
                                    </td>
                                    <input type="hidden" name="id_pengguna" value="<?= $id_pengguna; ?>" />
                                <tr>
                                    <td>Password <?= form_error('password') ?></td>
                                    <td>
                                    <input type="password" class="form-control" name="password" id="username"
                                            placeholder="Password" />
                                    </td>
                                <tr>
                                    <td colspan='2'><button type="submit"
                                            class="btn btn-primary"><?= $button ?></button>
                                        <a href="<?= site_url('tb_user') ?>" class="btn btn-default">Cancel</a>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->