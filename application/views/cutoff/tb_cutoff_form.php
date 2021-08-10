<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <h3 class="table-header text-center"><strong>Tambah Cut Off</strong></h3>
                    <div class='box box-primary'>
                        <form action="<?= $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr>
                                    <td>Tanggal Awal <?= form_error('start') ?></td>
                                    <td><input type="date" class="form-control" name="start" id="start"
                                            placeholder="Nama Satuan" value="<?= $start; ?>" />
                                    </td>
                                <tr>
                                    <td>Tanggal Akhir <?= form_error('end') ?></td>
                                    <td><input type="date" class="form-control" name="end" id="end"
                                            placeholder="Nama Satuan" value="<?= $end; ?>" />
                                    </td>
                                <tr>
                                    <td>Status <?= form_error('status') ?></td>
                                    <td>
                                        <select class="form-control" name="level"  required>
                                            <option>----Pilih Status----</option>
                                        <?php if($this->uri->segment(2) == 'update'){?>
                                            <?php if($status == 1){?>
                                                <option value="1" selected>Active</option>
                                                <option value="0">Non Active</option>
                                            <?php }elseif($status == 0){?>
                                                <option value="1">Active</option>
                                                <option value="0" selected>Non Active</option>
                                            <?php  }?>
                                        <?php }else{?>
                                                <option value="1">Active</option>
                                                <option value="0">Non Active</option>
                                        <?php }?>
                                        </select>
                                    </td>
                                    <input type="hidden" name="id_cutoff" value="<?= $id_cutoff; ?>" />
                                <tr>
                                    <td colspan='2'>
                                        <div class="btn-group btn-corner">
                                            <button type="submit" class="btn btn-primary btn-sm"
                                                style="margin-right:3px;"><?= $button ?></button>
                                            <a href="<?= site_url('tb_cutoff') ?>"
                                                class="btn btn-danger btn-sm">Kembali</a>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->