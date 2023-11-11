<div class="main-content">
	<div class="container-fluid">
		<h3 class="page-title" style="color:  #00008B">Data Lapangan</h3>
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
						<?php
						if (in_array($this->session->userdata('level'), ['admin', 'manager'])) {
							echo '<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_tambah_lapangan">Tambah Lapangan</button>
								  <br>';
						}
						?>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode</th>
									<th>Foto</th>
									<th>Nama</th>
									<th>Kategori</th>
									<th>Durasi</th>
									<th>Harga</th>
									<?php
									if (in_array($this->session->userdata('level'), ['admin', 'manager'])) {
										echo '<th>Aksi</th>';
									}
									?>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								if ($lapangan == NULL) {
									echo '
											<tr><td colspan="8" align="center">Data Kosong</td></tr>
										';
								} else {
									$btnActions = '';
									if (in_array($this->session->userdata('level'), ['admin', 'manager'])) {
										$btnActions .= '<td>
															<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah_lapangan" id="btnUbah" data-id="' . $b->id . '">Ubah</a>
															<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus_lapangan" id="btnHapus" data-id="' . $b->id . '">hapus</a>
														</td>';
									}
									foreach ($lapangan as $b) {
										echo '
										<tr>
											<td>' . $no . '</td>
											<td>' . $b->kode . '</td>
											<td><img src="' . base_url() . 'assets/foto_cover/' . $b->photo . '" width="50px" /></td>
											<td>' . $b->lapangan_name . '</td>
											<td>' . $b->kategori_name . '</td>
											<td>' . $b->duration . ' ' . $b->unit . '</td>
											<td>Rp ' . $b->price . ',-</td>
											
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
<div id="modal_tambah_lapangan" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Lapangan</h4>
			</div>
			<form action="<?php echo base_url('lapangan/tambah'); ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="text" class="form-control" placeholder="Kode Lapangan" name="kode">
					<br>
					<input type="text" class="form-control" placeholder="Nama Lapangan" name="name">
					<br>
					<select name="kategori_id" class="form-control">
						<option value="" disabled hidden selected>Pilih Kategori</option>
						<?php
						foreach ($kategori as $k) {
							echo '
								<option value="' . $k->id . '">' . $k->name . '</option>
							';
						}
						?>
					</select>
					<br>
					<input type="text" class="form-control" placeholder="Harga" name="price">
					<br>
					<input type="text" class="form-control" placeholder="Durasi" name="duration">
					<br>
					<select name="unit" class="form-control">
						<option value="" disabled hidden selected>Pilih Satuan Waktu</option>
						<option value="hari">Hari</option>
						<option value="jam">Jam</option>
						<option value="menit">Menit</option>
					</select>
					<br>
					<input type="file" class="form-control" placeholder="Foto cover" name="photo">

				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>

	</div>
</div>

<div id="modal_ubah_lapangan" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Ubah lapangan</h4>
			</div>
			<form action="<?php echo base_url('lapangan/ubah'); ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="id" id="ubah_id_lapangan">
					<br>
					<input type="text" class="form-control" placeholder="Kode lapangan" name="kode" id="ubah_kode_lapangan">
					<br>
					<input type="text" class="form-control" placeholder="Nama_lapangan" name="name" id="ubah_nama_lapangan">
					<br>
					<select name="kategori_id" id="ubah_kategori" class="form-control">
						<option value="" disabled hidden selected>Pilih Kategori</option>
						<?php
						foreach ($kategori as $k) {
							echo '
								<option value="' . $k->id . '">' . $k->name . '</option>
							';
						}
						?>
					</select>
					<br>
					<input type="text" class="form-control" placeholder="Harga" name="price" id="ubah_harga">
					<br>
					<input type="text" class="form-control" placeholder="Jam_sewa" name="duration" id="ubah_jam_sewa">
					<br>
					<select name="unit" id="ubah_unit" class="form-control">
						<option value="" disabled hidden selected>Pilih Satuan Waktu</option>
						<option value="hari">Hari</option>
						<option value="jam">Jam</option>
						<option value="menit">Menit</option>
					</select>
					<br>
					<div id="data_foto_cover"></div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="modal_hapus_lapangan" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Konfirmasi Hapus lapangan</h4>
			</div>
			<form action="<?php echo base_url('lapangan/hapus'); ?>" method="post">
				<div class="modal-body">
					<input type="hidden" name="id" id="hapus_id_lapangan">
					<p>Apakah anda yakin menghapus lapangan <b><span id="hapus_judul_lapangan"></span></b> ?</p>
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
	$(document).on("click", "#btnUbah", function() {
		var id = $(this).data('id');
		$.getJSON('<?php echo base_url(); ?>index.php/lapangan/get_data_lapangan_by_id/' + id, function(data) {
			$("#ubah_id_lapangan").val(data.lapangan_id);
			$("#ubah_kode_lapangan").val(data.kode);
			$("#ubah_nama_lapangan").val(data.lapangan_name);
			$("#ubah_kategori").val(data.kategori_id);
			$("#ubah_harga").val(data.price);
			$("#ubah_jam_sewa").val(data.duration);
			$("#ubah_unit").val(data.unit);
			$("#data_foto_cover").html('<img src="<?php echo base_url(); ?>assets/foto_cover/' + data.photo + '" width="50px" >');
		});
	});

	$(document).on("click", "#btnHapus", function() {
		var id = $(this).data('id');
		$("#hapus_id_lapangan").val(id);
		$.getJSON('<?php echo base_url(); ?>index.php/lapangan/get_data_lapangan_by_id/' + id, function(data) {
			$('#hapus_id_lapangan').val(data.lapangan_id);
			$("#hapus_judul_lapangan").html(data.lapangan_name);
		});
	});
</script>
