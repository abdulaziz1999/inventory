<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class='box-title'>Tb_issuing Read</h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>Tgl</td>
                            <td><?php echo $tgl; ?></td>
                        </tr>
                        <tr>
                            <td>No Invoice</td>
                            <td><?php echo $no_ref; ?></td>
                        </tr>
                        <tr>
                            <td>Picker</td>
                            <td><?php echo $picker; ?></td>
                        </tr>
                        <tr>
                            <td>Remarks</td>
                            <td><?php echo $remarks; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="<?php echo site_url('tb_issuing') ?>"
                                    class="btn btn-sm btn-round btn-default">Cancel</a></td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->