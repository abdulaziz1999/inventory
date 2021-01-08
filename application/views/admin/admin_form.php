    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="<?= base_url('admin'); ?>">Home</a>
                            </li>

                            <!-- <li class="active">
                                <a href="#">Dashboard</a>
                            </li> -->
                            <li class="active">Pengguna</li>
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
                
                  <h3 class='box-title'>Pengguna</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post" ><table class='table table-bordered'>
	    <tr><td>Nama <?php echo form_error('nama') ?></td>
            <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </td>
	    <tr><td>Username <?php echo form_error('username') ?></td>
            <td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </td>
	    <tr><td>Password <?php echo form_error('password') ?></td>
            <td><input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </td>
	    <tr><td>Email <?php echo form_error('email') ?></td>
            <td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </td>
	    <tr><td>Level <?php echo form_error('level') ?></td>
            <td>
              <select class="form-control" name="level" id="level">
                <option value="admin">Admin</option>
                <option value="dosen">Dosen</option>
                <option value="mahasantri">Mahasantri</option>
              </select>
        </td>
        <tr><td>Foto <?php echo form_error('foto') ?></td>
            <td><input type="file"  name="userfile" id="foto" value="<?php echo $foto; ?>" />
        </td>
	    <input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>" /> 
	    
      <tr>
      <td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pengguna') ?>" class="btn btn-default">Cancel</a>
      </td>
      </tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->