<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class='box-title'>Tb_stok Read1</h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>Stok</td>
                            <td><?php echo $stok; ?></td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td><?php echo $amount; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="<?php echo site_url('tb_stok') ?>" class="btn btn-default">Cancel</a></td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->