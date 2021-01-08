<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>TB_RECEIVING</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post">
        <table class='table table-bordered'>
              <tr><td>Tgl <?php echo form_error('tgl') ?></td>
                  <td><input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tgl"  value="<?php echo $tgl; ?>" />
              </td>
              <tr><td>No PO <?php echo form_error('no_ref') ?></td>
                    <td><input type="text" class="form-control" name="no_ref" id="no_ref" placeholder="No Ref"  value="<?php echo $no_ref; ?>" />
                </td>
              <tr><td>Supplier <?php echo form_error('supplier') ?></td>
                    <td><input type="text" class="form-control" name="supplier" id="supplier" placeholder="Supplier"  value="<?php echo $supplier; ?>" />
                </td>
              <tr><td>Pemesan <?php echo form_error('remarks') ?></td>
                    <td><input type="text" class="form-control" name="remarks" id="remarks" placeholder="Remarks"  value="<?php echo $remarks; ?>" />
                </td>
            <input type="hidden" name="id_receiving" value="<?php echo $id_receiving; ?>" /> 
            <tr><td colspan='2'><button type="submit"  class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('tb_receiving') ?>" class="btn btn-default">Cancel</a></td></tr>
	      </table>
    
    </form>

    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->