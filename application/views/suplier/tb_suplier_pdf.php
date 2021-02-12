<!doctype html>
<html>

<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />
    <style>
    .word-table {
        border: 1px solid black !important;
        border-collapse: collapse !important;
        width: 100%;
    }

    .word-table tr th,
    .word-table tr td {
        border: 1px solid black !important;
        padding: 5px 10px;
    }
    </style>
</head>

<body>
    <h2>Tb_suplier List</h2>
    <table class="word-table" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
            <th>Nama suplier</th>

        </tr><?php
            foreach ($tb_suplier_data as $tb_suplier)
            {
                ?>
        <tr>
            <td><?= ++$start ?></td>
            <td><?= $tb_suplier->nama_suplier ?></td>
        </tr>
        <?php
            }
            ?>
    </table>
</body>

</html>