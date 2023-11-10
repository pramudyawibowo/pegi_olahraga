<div class="main-content">
	<div class="container-fluid">
		<h3 class="page-title" style="color:  #00008B">Data Kategori Lapangan</h3>
		<?php
		$notif = $this->session->flashdata('notif');
		if ($notif != NULL) {
			echo '
					<div class="alert alert-danger">' . $notif . '</div>
				';
		}
		?>
		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-body">

						<button type="button" class="btn btn-success btn-sm" data-toggle="modal"
							data-target="#modal_tambah_kategori">Tambah Kategori</button>

						<br>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Kategori</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								if ($kategori == NULL) {
									echo '
											<tr><td colspan="3" align="center">Data Kosong</td></tr>
										';
								} else {
									foreach ($kategori as $b) {
										echo '
											<tr>
												<td>' . $no . '</td>
												<td>' . $b->name . '</td>
												<td>
													<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah_kategori" id="btnUbah" data-id="'. $b->id .'">Ubah</a>
													<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus_kategori" id="btnHapus" data-id="'. $b->id .'">Hapus</a>
												</td>
											</tr>
										';
										$no++;
									}
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
<div id="modal_tambah_kategori" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Kategori</h4>
			</div>
			<form action="<?php echo base_url('kategori/tambah'); ?>" method="post">
				<div class="modal-body">
					<input type="text" class="form-control" placeholder="Nama" name="name">
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>

	</div>
</div>

<div id="modal_ubah_kategori" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Ubah Kategori</h4>
			</div>
			<form action="<?php echo base_url('kategori/ubah'); ?>" method="post"
				enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="id" id="ubah_id">
					<input type="text" class="form-control" placeholder="Nama" name="name" id="ubah_nama">
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="modal_hapus_kategori" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Konfirmasi Hapus Kategori</h4>
			</div>
			<form action="<?php echo base_url('kategori/hapus'); ?>" method="post">
				<div class="modal-body">
					<input type="hidden" name="id" id="hapus_id_kategori">
					<p>Apakah anda yakin menghapus kategori <b><span id="hapus_nama"></span></b> ?</p>
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

	$(document).on('click', '#btnUbah', function () {
		var id = $(this).data('id');
		$.getJSON('<?php echo base_url(); ?>index.php/kategori/get_data_kategori_by_id/' + id, function (data) {
			$("#ubah_id").val(id);
			$("#ubah_nama").val(data.name);
		});
	});

	$(document).on('click', '#btnHapus', function () {
		var id = $(this).data('id');
		$.getJSON('<?php echo base_url(); ?>index.php/kategori/get_data_kategori_by_id/' + id, function (data) {
			$("#hapus_id_kategori").val(id);
			$("#hapus_nama").text(data.name);
		});
	});
</script>
