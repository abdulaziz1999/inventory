<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
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
        </style>
    </head>
    <body>
        <h2>Tb_barang List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
        <th>No</th>
		<th>Part Number</th>
		<th>Nama Barang</th>
		<th>Kategori</th>
		<th>Brand</th>
		<th>Satuan</th>
		<th>Gambar</th>
		<th>Ket</th>
		
            </tr><?php
            foreach ($tb_barang_data as $tb_barang)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tb_barang->part_number ?></td>
		      <td><?php echo $tb_barang->nama_barang ?></td>
		      <td><?php echo $tb_barang->kategori ?></td>
		      <td><?php echo $tb_barang->brand ?></td>
		      <td><?php echo $tb_barang->satuan ?></td>
		      <td><?php echo $tb_barang->ket ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>