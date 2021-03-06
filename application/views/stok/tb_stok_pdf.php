<!doctype html>
<html>
    <head>
        <title>Report Stok</title>
        <link rel="icon" href="<?= base_url()?>/assets/images/foto/berkah.png" type="image/ico/png" />
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
            font{
                color:black;
            }

            b#j{
                font-weight:bold;
            }
        </style>
    </head>
    <body>
    <table>
            <tr>
				<td width="200" align="left" rowspan="4"><img src="<?= base_url()?>assets/images/foto/cv.png" width="210" height="60"/></td>
				<td width="850" align="center"><font style="font-weight:bold; font-size:20px;">PT BERKAH SEJAHTERA</font></td>	
			</tr>
			<tr>
				<td width="850" align="center"><font style="font-size:17px;"><b>Jl. Raya Puspitek 001/007 Kp.Cikarang Ds.Pabuaran Gn.Sindur</b></font></td>	
			</tr>
			<tr>
				<td width="850" align="center"><font style="font-size:17px;">Telepon: 021-50112076</font></td>	
			</tr>
			<tr>
				<td width="850" align="center"><font style="font-size:17px;"><i>Email : admin@berkahgroup.co.id</i></font><br /></td>	
                <td width="200" align="left" rowspan="4"></td>
			</tr>

    </table>
    <hr style="color:black;">
            <p align="center"><b><u>REPORT STOK</u></b></p>
            <p>Date: <?php date_default_timezone_set('Asia/Jakarta'); echo date("d F Y, H:i A");?></p>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <td width="50"><b id="j">ID</b></td>
				<td width="140"><b id="j">No. Barang</b></td>	
				<td width="180"><b id="j">Nama Barang</b></td>	
				<td width="230"><b id="j">Kategori</b></td>	
				<td width="120"><b id="j">Merk</b></td>	
				<td width="80"><b id="j">Stock</b></td>	
				<td width="100"><b id="j">Satuan</b></td>
		
            </tr><?php
            foreach ($tb_stok_data->result() as $row)
            {
                ?>
                <tr>
                <td><?= ++$start ?></td>
                <td><?= $row->part_number ?></td>
                <td><?= $row->nama_barang ?></td>	
                <td><?= $row->nama_kategori ?></td>	
                <td><?= $row->nama_brand ?></td>	
                <td><?= $row->stok ?></td>	
                <td><?= $row->nama_satuan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
<br>
<br>
    <table align="right">
    <tr>
				<td></td>
				<td></td>
				<td align="center"><font size="10">Dilaporkan pada tanggal, <?= date("j F Y")?></font></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td align="center"><font size="10" style="font-weight:bold;">PT BERKAH SEJAHTERA</font></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td height="60"></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td align="center"><font size="10"><b><u>....................</u></b></font></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td align="center"><font size="9">KEPALA GUDANG</font></td>
			</tr>
    </table>
    </body>
</html>