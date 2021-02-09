<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>TB_STOK</h3>
                    <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Stok <?php echo form_error('stok') ?></td>
                                    <td><input type="text" class="form-control" name="stok" id="stok" placeholder="Stok"
                                            value="<?php echo $stok; ?>" />
                                    </td>
                                <tr>
                                    <td>Amount <?php echo form_error('amount') ?></td>
                                    <td><input type="text" class="form-control" name="amount" id="amount"
                                            placeholder="Amount" value="<?php echo $amount; ?>" />
                                    </td>
                                    <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" />
                                <tr>
                                    <td colspan='2'><button type="submit"
                                            class="btn btn-primary"><?php echo $button ?></button>
                                        <a href="<?php echo site_url('tb_stok') ?>" class="btn btn-default">Cancel</a>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->