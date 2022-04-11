<!doctype html>
<html>

<head>
    <title>Report Receiving</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="icon" href="<?= base_url()?>/assets/images/foto/berkah.png" type="image/ico/png" />
    <style>
    .word-table {
        border: 1px solid black !important;
        border-collapse: collapse !important;
        width: 100%;
    }

    .word-table1 {
        border: 1px solid black !important;
        border-collapse: collapse !important;
        width: 100%;
    }

    .word-table tr th,
    .word-table tr td {
        border: 1px solid black !important;
        padding: 5px 10px;
    }

    font {
        color: black;
    }

    b#j {
        font-weight: bold;
    }
    </style>
</head>

<body>
    <table>
        <tr>
            <td width="200" align="left" rowspan="4"><img src="<?= base_url()?>assets/images/foto/cv.png" width="210"
                    height="60" /></td>
            <td width="850" align="center">
                <font style="font-weight:bold; font-size:20px;">PT BERKAH SEJAHTERA</font>
            </td>
        </tr>
        <tr>
            <td width="850" align="center">
                <font style="font-size:17px;"><b>Jl. Raya Puspitek 001/007 Kp.Cikarang Ds.Pabuaran Gn.Sindur</b></font>
            </td>
        </tr>
        <tr>
            <td width="850" align="center">
                <font style="font-size:17px;">Telepon: 021-50112076</font>
            </td>
        </tr>
        <tr>
            <td width="850" align="center">
                <font style="font-size:17px;"><i>Email : admin@berkahgroup.co.id</i></font><br />
            </td>
            <td width="200" align="left" rowspan="4"></td>
        </tr>

    </table>
    <hr style="color:black;">
    <table class="word-table" align="center">
        <tr >
            <td width="600" colspan="2" align="center">
                <font size="10"><b id="j"> BARANG MASUK </b></font>
            </td>
        </tr>
        <tr>
            <td width="300">No. PO &nbsp;&nbsp;: <?= @$sup->row()->no_ref?> <br />
                Waktu &nbsp; &nbsp;: <?= @date_indo($sup->row()->tgl)?>
            </td>
            <td width="300">Supplier &nbsp;: <?= @$sup->row()->nama_suplier?> <br />
                Pemesan&nbsp;: <?= @$sup->row()->nama_pemesan?>
                <br /><br />
            </td>
        </tr>
    </table><br>
    <table class="word-table" style="margin-bottom: 10px">
        <tr align="center"  class="text-white">
            <td height="32"><b id="j">#</b></td>
			<td ><b id="j">Nama Barang</b></td>
            <td ><b id="j">Kode Barcode</b></td>
            <td ><b id="j">Harga Jual</b></td>
            <td ><b id="j">Satuan</b></td>
            <td ><b id="j">Jumlah</b></td>
            <td ><b id="j">Total</b></td>
        </tr>
        <?php $sum=0; $no=1; foreach($sup->result() as $row):
            $total = $row->jml*$row->harga_jual;
            $sum += $total;
            ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= @$row->nama_barang?></td>
            <td><?= @$row->kode_barcode?></td>
            <td><?= @rupiah($row->harga_jual)?></td>
            <td><?= @$row->nama_satuan?></td>
            <td><?= @$row->jml?></td>
            <td align="right"><?= @rupiah($total)?></td>
        </tr>
        <?php endforeach;?>
        <tfoot>
            <tr>
                <td colspan="6" align="center" ><b id="j">Total</b></td>
                <td id="total" align="right"><?= @rupiah($sum) ?></td>
            </tr>
        </tfoot>
    </table>
    <br>
    <br>
    <table width="100%">
        <tr>
            <td align="center"> Di Authorized Oleh<br /><br /><br /><br /><br />
                <u>............................</u>
            </td>
            <td></td>
            <td align="center">Diperiksa Oleh <br /><br /><br /><br /><br />
                <u>............................</u>
            </td>
            <td></td>
            <td align="center">Diterima Oleh<br /><br /><br /><br /><br />
                <u>............................</u>
            </td>
        </tr>
    </table>
</body>

</html>