<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?= base_url('admin'); ?>">Dashboard</a>
        </li>
        <li class="active">Cetak Barcode</li>
    </ul>
</div>
<section class='content'>
    <div class='row'>
        <br>
        <div class="col-md-12 col-sm-4">
            <div class="btn-group btn-corner">
                <a href="<?= base_url('cetak_barcode/allbarcode')?>" class="btn btn-success btn-sm" style="margin-right:3px;"><i class="fa fa-barcode"></i> Cetak
                    Semua Barcode</a>
                <span class="btn btn-danger btn-sm"> <i class="fa fa-signal"></i> Untuk Mendapatkan Barcode Harus Konek
                    Internet</span>
            </div>
            <br>
            <br>
            <div class="widget-box widget-color-blue">
                <div class="widget-header">
                    <h4 class="widget-title">Form Cetak Barcode</h4>

                    <div class="widget-toolbar">
                        <a href="#" data-action="collapse">
                            <i class="ace-icon fa fa-chevron-up"></i>
                        </a>

                        <a href="#" data-action="close">
                            <i class="ace-icon fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <form  method="get">
                <?php if (isset($_GET['barcode'])) :
                    $barcode = $_GET['barcode'];
                    $row = $this->db->get_where('tb_barang', ['kode_barcode' => $barcode])->row_array();
                    $kode = $row['kode_barcode'];
                ?>
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <label for="form-field-select-1"><strong>Nama Barang</strong></label>
                                        <select name="barcode" class="form-control"  id="barang" onchange="selectNameBarang()">
                                            <option selected disabled>Nama Barang</option>
                                            <?php foreach ($barang as $bar) : ?>
                                            <option value="<?= $bar['kode_barcode'] ?>" data-nama="<?= $bar['nama_barang'] ?>" <?= $bar['kode_barcode'] == $barcode ? 'selected' : '' ?>><?= $bar['nama_barang'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                    <?= $code_barcodenya ?>
                                        <label for="form-field-select-2"><strong>Code Barcode</strong></label>
                                        <input class="form-control" type="text" value="<?= $row['kode_barcode'] ?>" id="code" readonly>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <label for="form-field-select-3"><strong>Harga Barang</strong></label>
                                        <input class="form-control"  type="text" value="<?= rupiah($row['harga_jual']) ?>" id="harga_barang"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label for="form-field-select-4"><strong>Jumlah Barcode</strong></label>
                                        <select class="form-control" id="jumlah">
                                            <?php for ($a = 1; $a <= 100; $a++) : ?>
                                            <option value="<?= $a ?>"><?= $a ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="button" id="buat_bc" onclick="buatBc()" class="btn btn-primary btn-sm btn-round"><i class="fa fa-download"></i> Buat</button>
                        </div>
                    </div>
                    <?php else : ?>
                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <label for="form-field-select-1"><strong>Nama Barang</strong></label>
                                            <select name="barcode" class="form-control" id="barang" onchange="selectNameBarang()">
                                                <option selected disabled>Nama Barang</option>
                                                <?php foreach ($barang as $bar) : ?>
                                                <option value="<?= $bar['kode_barcode'] ?>"><?= $bar['nama_barang'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                        <?= $code_barcodenya ?>
                                            <label for="form-field-select-2"><strong>Code Barcode</strong></label>
                                            <input class="form-control" type="text" id="code" readonly>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <label for="form-field-select-3"><strong>Harga Barang</strong></label>
                                            <input class="form-control" type="text" id="harga_barang"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <label for="form-field-select-4"><strong>Jumlah Barcode</strong></label>
                                            <select class="form-control"  id="jumlah">
                                                <?php for ($a = 1; $a <= 100; $a++) : ?>
                                                <option value="<?= $a ?>"><?= $a ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="button" id="buat_bc" onclick="buatBc()" class="btn btn-primary btn-sm btn-round"><i class="fa fa-download"></i> Buat</button>
                            </div>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
        <div class="col-md-12 mt-4 border-top pt-2">
            <div id="hasil" class="mb-4 mt-3"></div>
            <div id="cetak" class="text-white mb-4"></div>
            <br>
        </div>
        <div  class="row">
            <div class="col-xs-12" id="bar_disini">
            
            </div>
        </div>
        <br>
    </div>
</section>

