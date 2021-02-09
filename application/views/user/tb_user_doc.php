<!doctype html>
<html>

<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" />
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
    <h2>Tb_user List </h2>
    <table class="word-table" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Password</th>
            <th>Hak Akses</th>
            <th>Avatar</th>

        </tr><?php
            foreach ($tb_user_data as $tb_user)
            {
                ?>
        <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $tb_user->nama_user ?></td>
            <td><?php echo $tb_user->password ?></td>
            <td><?php echo $tb_user->hak_akses ?></td>
            <td><?php echo $tb_user->avatar ?></td>
        </tr>
        <?php
            }
            ?>
    </table>
</body>

</html>