<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>TB_SATUAN</h3>
                    <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Nama Satuan <?php echo form_error('nama_satuan') ?></td>
                                    <td><input type="text" class="form-control" name="nama_satuan" id="nama_satuan"
                                            placeholder="Nama Satuan" value="<?php echo $nama_satuan; ?>" />
                                    </td>
                                <tr>
                                    <td>Ket <?php echo form_error('ket') ?></td>
                                    <td><input type="text" class="form-control" name="ket" id="ket" placeholder="Ket"
                                            value="<?php echo $ket; ?>" />
                                    </td>
                                    <input type="hidden" name="id_satuan" value="<?php echo $id_satuan; ?>" />
                                <tr>
                                    <td colspan='2'><button type="submit"
                                            class="btn btn-primary"><?php echo $button ?></button>
                                        <a href="<?php echo site_url('tb_satuan') ?>" class="btn btn-default">Cancel</a>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->