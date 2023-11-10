<div class="main-content">
	<div class="container-fluid">
		<h3 class="page-title" style="color: #00008B">Data User</h3>
		<?php
			$notif = $this->session->flashdata('notif');
			if($notif != NULL){
				echo '
					<div class="alert alert-danger">'.$notif.'</div>
				';
			}
		?>
		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-body">
						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_tambah_user">Tambah User</button>
					<br>

							<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Username</th>
									<th>Level</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$no = 1;
								foreach ($user as $b) {
									echo '
										<tr>
											<td>'.$no.'</td>
											<td>'.$b->nama_user.'</td>
											<td>'.$b->username.'</td>
											<td>'.$b->id_level.'</td>
											<td>
												<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah_user" onclick="prepare_ubah_user('.$b->id_user.')">Ubah</a>
												<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus_user" onclick="prepare_hapus_user('.$b->id_user.')">Hapus</a>
											</td>
										</tr>
									';
									$no++;
								}
							?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- END TABLE STRIPED -->
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="modal_tambah_user" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah User</h4>
      </div>
      <form action="<?php echo base_url('user/tambah'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="text" class="form-control" placeholder="Nama" name="nama_user">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Username" name="username">
	        	<br>
	        	<input type="password" class="form-control" placeholder="Password" name="password">
	        	<br>
	        	<select name="id_level" class="form-control show-tick">
								<?php foreach ($data_level as $lvl):
								echo"<option value='".$lvl->id_level."'>".$lvl->nama_level."</option>";
								endforeach ?>
						</select>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal_ubah_user" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah User</h4>
      </div>
      <form action="<?php echo base_url('user/ubah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	        	<input type="hidden" name="ubah_id_user" id="ubah_id_user">
	        	<input type="text" class="form-control" placeholder="Nama" name="ubah_nama_user" id="ubah_nama_user">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Username" name="ubah_username" id="ubah_username">
	        	<br>
	        	<input type="password" class="form-control" placeholder="Password" name="ubah_password" id="ubah_password">
	        	<br>
	        	<select name="id_level" id="id_level" class="form-control show-tick">
								<?php foreach ($data_level as $lvl):
								echo"<option value='".$lvl->id_level."'>".$lvl->nama_level."</option>";
								endforeach ?>
						</select>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal_hapus_user" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus User</h4>
      </div>
      <form action="<?php echo base_url('user/hapus'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="hidden" name="hapus_id_user"  id="hapus_id_user">
	        	<p>Apakah anda yakin menghapus user <b><span id="hapus_nama"></span></b> ?</p>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
	
	function prepare_ubah_user(id)
	{
		$("#ubah_id_user").empty();
		$("#ubah_nama_user").empty();
		$("#ubah_username").empty();
		$("#ubah_password").empty();
		$("#ubah_level").val();

		$.getJSON('<?php echo base_url(); ?>index.php/user/get_data_user_by_id/' + id,  function(data){
			$("#ubah_id_user").val(data.id_user);
			$("#ubah_nama_user").val(data.nama_user);
			$("#ubah_username").val(data.username);
			$("#ubah_password").val(data.password);
			$("#ubah_level").val(data.level);
		});
	}

	function prepare_hapus_user(id)
	{
		$("#hapus_id_user").empty();
		$("#hapus_nama_user").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/user/get_data_user_by_id/' + id,  function(data){
			$("#hapus_id_user").val(data.id_user);
			$("#hapus_nama_user").text(data.nama);
		});
	}
</script>
