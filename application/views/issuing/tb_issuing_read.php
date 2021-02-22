<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li>
            <i class="ace-icon fa fa-truck"></i>
            <a href="<?= base_url('tb_issuing'); ?>">Issuing</a>
        </li>
        <li class="active">Read</li>
    </ul>
</div>
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class="table-header text-center"><strong>Read</strong></h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>Tgl</td>
                            <td><?= $tgl; ?></td>
                        </tr>
                        <tr>
                            <td>No Invoice</td>
                            <td><?= $no_ref; ?></td>
                        </tr>
                        <tr>
                            <td>Picker</td>
                            <td><?= $picker; ?></td>
                        </tr>
                        <tr>
                            <td>Remarks</td>
                            <td><?= $remarks; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="<?= site_url('tb_issuing') ?>" class="btn btn-sm btn-round btn-danger">
                                    <i class="fa fa-reply"></i> Kembali</a>
                            </td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->