<!-- Main content -->
<section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>Form jalan</h3>
                      <div class='box box-primary'>
        <form action="<?= base_url('jalan/insert')?>" method="post"><table class='table table-bordered'>
	    <tr><td>nomor urut </td>
            <td><input type="text" class="form-control" name="nm_urut"  placeholder="no"  />
        </td>
	    <tr><td>nama jalan</td>
            <td><input type="text" class="form-control" name="nm_jln"  placeholder="nm jln"  />
        </td>
        <tr><td>Panjang jalan</td>
            <td><input type="text" class="form-control" name="p_jln"  placeholder="p jln"  />
        </td>
        <tr><td>Panjang jalan</td>
            <td>
            <select name="status_jln" class="form-control">
                <option value="Provinsi">Provinsi</option>
                <option value="Kota">kota</option>
            </select>
        </td>
	    <tr>
            <td colspan='2'><button type="submit" class="btn btn-primary">simpan</button> 
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->