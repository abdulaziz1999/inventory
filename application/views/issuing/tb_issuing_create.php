<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class='box-title'>TB_ISSUING</h3>
                    <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Tgl <?php echo form_error('tgl') ?></td>
                                    <td><input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tgl"
                                            value="<?php echo $tgl; ?>" />
                                    </td>
                                <tr>
                                    <td>No Invoice <?php echo form_error('no_ref') ?></td>
                                    <td><input type="text" class="form-control" name="no_ref" id="no_ref"
                                            placeholder="No Ref" value="<?php echo $no_ref; ?>" />
                                    </td>
                                <tr>
                                    <td>Penerima <?php echo form_error('picker') ?></td>
                                    <td><input type="text" class="form-control" name="picker" id="picker"
                                            placeholder="Picker" value="<?php echo $picker; ?>" />
                                    </td>
                                <tr>
                                    <td>Pemesan <?php echo form_error('remarks') ?></td>
                                    <td><input type="text" class="form-control" name="remarks" id="remarks"
                                            placeholder="Remarks" value="<?php echo $remarks; ?>" />
                                    </td>
                                    <input type="hidden" name="id_issuing" value="<?php echo $id_issuing; ?>" />
                                <tr>
                                    <td colspan='2'><button type="submit"
                                            class="btn btn-sm btn-round btn-primary"><?php echo $button ?></button>
                                        <a href="<?php echo site_url('tb_issuing') ?>"
                                            class="btn btn-sm btn-round btn-default">Cancel</a>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->