<!-- Main content -->
<section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>Form jalan</h3>
                      <div class='box box-primary'>
         <?php foreach ($jln as $row){?>
        <form action="<?= base_url('jalan/update/'.$row->id)?>" method="post"><table class='table table-bordered'>
	    <tr><td>nomor urut </td>
            <td><input type="text" class="form-control" name="nm_urut"  placeholder="no"  value="<?= $row->nomor_urut?>" />
        </td>
	    <tr><td>nama jalan</td>
            <td><input type="text" class="form-control" name="nm_jln"  placeholder="nm jln"  value="<?= $row->nm_jln?>" />
        </td>
        <tr><td>Panjang jalan</td>
            <td><input type="text" class="form-control" name="p_jln"  placeholder="p jln"   value="<?= $row->p_jln?>"/>
        </td>
        <tr><td>Panjang jalan</td>
            <td>
            <select name="status_jln" class="form-control">
                    <option value="" disabled> Pilih status jalan</option>
                <?php if($row->status_jln == 'Provinsi'):?>
                    <option value="Provinsi" selected>Provinsi</option>
                    <option value="Kota">kota</option>
                <?php elseif($row->status_jln == 'Kota'):?>
                    <option value="Provinsi" >Provinsi</option>
                    <option value="Kota" selected>kota</option>
                <?php else:?>
                    <option value="Provinsi">Provinsi</option>
                    <option value="Kota">kota</option>
                <?php endif;?>
            </select>
        </td>
	    <tr>
            <td colspan='2'><button type="submit" class="btn btn-primary">simpan</button> 
                <?php }?>
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->