    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="<?= base_url('admin'); ?>">Home</a>
            </li>

            <!-- <li class="active">
                                <a href="#">Dashboard</a>
                            </li> -->
            <li class="active">Pengguna List</li>
        </ul><!-- /.breadcrumb -->

        <div class="nav-search" id="nav-search">

        </div><!-- /.nav-search -->
    </div>
    <!-- Main content -->
    <section class='content'>
        <div class='row'>
            <div class='col-xs-12'>
                <div class='box'>
                    <div class='box-header'>
                        <h3 class='box-title'>Pengguna List
                            <br><br>
                            <?php echo anchor('pengguna/create/','Create',array('class'=>'btn btn-success btn-sm'));?>
                        </h3>
                    </div><!-- /.box-header -->
                    <div class='box-body'>
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $start = 0;
                                    foreach ($admin_data as $admin)
                                    {
                                        ?>
                                <tr>
                                    <td><?php echo ++$start ?></td>
                                    <td><?php echo $admin->nama ?></td>
                                    <td><?php echo $admin->username ?></td>
                                    <td><?php echo $admin->password ?></td>
                                    <td><?php echo $admin->email ?></td>
                                    <td><?php echo $admin->level ?></td>
                                    <td><?php echo $admin->foto ?></td>
                                    <td style="text-align:center" width="140px">
                                        <?php 
                                           echo anchor(site_url('pengguna/read/'.$admin->id_admin),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-success btn-sm')); 
                                           echo '  '; 
                                           echo anchor(site_url('pengguna/update/'.$admin->id_admin),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-info btn-sm')); 
                                           echo '  '; 
                                           echo anchor(site_url('pengguna/delete/'.$admin->id_admin),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                           ?>
                                    </td>
                                </tr>
                                <?php
                               }
                               ?>
                            </tbody>
                        </table>
                        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
                        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            $("#mytable").dataTable();
                        });
                        </script>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->