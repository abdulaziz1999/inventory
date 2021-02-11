<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>TB_unit</h3>
                    <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Nama unit <?php echo form_error('nama_unit') ?></td>
                                    <td><input type="text" class="form-control" name="nama_unit" id="nama_unit"
                                            placeholder="Nama unit" value="<?php echo $nama_unit; ?>" />
                                    </td>
                                    <input type="hidden" name="id_unit" value="<?php echo $id_unit; ?>" />
                                <tr>
                                    <td colspan='2'>
                                        <div class="btn-group btn-corner">
                                            <button type="submit"
                                                class="btn btn-primary btn-sm"><?php echo $button ?></button>&nbsp;&nbsp;
                                            <a href="<?php echo site_url('tb_unit')?>"
                                                class="btn btn-default btn-sm">Cancel</a>
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