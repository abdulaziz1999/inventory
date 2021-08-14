<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                <h3 class="table-header text-center"><strong>Read Data Cut Off</strong></h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>Tanggal Awal</td>
                            <td><?= date_indo($start); ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Akhir</td>
                            <td><?= date_indo($end); ?></td>
                        </tr>
                        <tr>
                            <td>Satatus</td>
                            <td><?= $status == 1 ? '<span class="label label-warning arrowed arrowed-right"> Active</span>' : '<span class="label label-danger arrowed">Non Active</span>' ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="<?= site_url('tb_cutoff') ?>" class="btn btn-sm btn-danger btn-round ntn-sm">Kembali</a></td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->