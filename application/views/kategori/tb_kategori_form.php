<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>TB_KATEGORI</h3>
                    <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Nama Kategori <?php echo form_error('nama_kategori') ?></td>
                                    <td><input type="text" class="form-control" name="nama_kategori" id="nama_kategori"
                                            placeholder="Nama Kategori" value="<?php echo $nama_kategori; ?>" />
                                    </td>
                                    <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>" />
                                <tr>
                                    <td colspan='2'><button type="submit"
                                            class="btn btn-primary"><?php echo $button ?></button>
                                        <a href="<?php echo site_url('tb_kategori') ?>"
                                            class="btn btn-default">Cancel</a>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->