<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>TB_BRAND</h3>
                    <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Nama Brand <?php echo form_error('nama_brand') ?></td>
                                    <td><input type="text" class="form-control" name="nama_brand" id="nama_brand"
                                            placeholder="Nama Brand" value="<?php echo $nama_brand; ?>" />
                                    </td>
                                    <input type="hidden" name="id_brand" value="<?php echo $id_brand; ?>" />
                                <tr>
                                    <td colspan='2'><button type="submit"
                                            class="btn btn-primary"><?php echo $button ?></button>
                                        <a href="<?php echo site_url('tb_brand') ?>" class="btn btn-default">Cancel</a>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->