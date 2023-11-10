<div class="main-content">
	<div class="container-fluid">
		<h3 class="page-title" style="color: #00008B">Transaksi</h3>
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
					<div class="panel-heading">Pilih Lapangan</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-9">
								<select id="lapangan_id" class="form-control">
									<option value="" disabled hidden selected>Pilih Lapangan</option>
									<?php
									foreach ($lapangan as $l) {
										echo '
												<option value="' . $l->id . '">' . $l->lapangan_name . ' (' . $l->kategori_name . ') - Rp' . number_format($l->price, 0, ',', '.') . ' per ' . $l->duration . ' ' . $l->unit . '</option>
											';
									}
									?>
								</select>
								<div style="display: none;" class="my-3" id="invalid-lapangan_id">
									<span class="text-danger" id="text-lapangan_id"></span>
								</div>
							</div>
							<div class="col-md-3">
								<a href="#" class="btn btn-success btn-block" id="btn-tambah-transaksi">TAMBAH</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-heading">Data Transaksi</div>
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Lapangan</th>
									<th>Nama Penyewa</th>
									<th>Durasi Sewa</th>
									<th>Waktu</th>
									<th>Total Pembayaran</th>
									<th class="text-center">Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>

								<?php
								$no = 1;
								if ($transaksi != NULL) {
									foreach ($transaksi as $t) {
										$badge = '';
										switch ($t->status) {
											case 1:
												$badge = '<span class="badge badge-warning">Menunggu Pembayaran</span>';
												break;
											case 2:
												$badge = '<span class="badge badge-primary">Sudah Dibayar</span>';
												break;
											case 3:
												$badge = '<span class="badge badge-success">Selesai</span>';
												break;
											case 4:
												$badge = '<span class="badge badge-danger">Dibatalkan</span>';
												break;
										}
										$button = '';
										if (in_array($this->session->userdata('level'), ['admin', 'manager'])) {
											if (in_array($t->status, [1])) {
												$button .= '<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_cancel_transaksi" id="btnCancel" data-id="' . $t->id . '">BATALKAN</a>';
												$button .= '<a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_bayar_transaksi" id="btnBayar" data-id="' . $t->id . '">SUDAH DIBAYAR</a>';
											} else if (in_array($t->status, [2])) {
												$button .= '<a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_selesai_transaksi" id="btnSelesai" data-id="' . $t->id . '">SELESAIKAN</a>';
											}
										} else {
											if (in_array($t->status, [1])) {
												$button .= '<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_cancel_transaksi" id="btnCancel" data-id="' . $t->id . '">BATALKAN</a>';
											} else if (in_array($t->status, [2])) {
												$button .= '<a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_selesai_transaksi" id="btnSelesai" data-id="' . $t->id . '">SELESAIKAN</a>';
											}
										}
										echo '
												<tr>
													<td>' . $no . '</td>
													<td>' . $t->lapangan_name . ' <span class="font-weight-bold">(' . $t->kode . ')</span></td>
													<td>' . $t->renter_name . '</span></td>
													<td>' . $t->duration . ' ' . $t->lapangan_unit . '</td>
													<td>' . $t->waktu . '</td>
													<td>Rp' .  number_format($t->total, 0, ',', '.') . ',-</td>
													<td class="text-center">' . $badge . '</td>
													<td>' . $button . '</td>
												</tr>
											';
										$no++;
									}
								} else {
									echo '<tr><td colspan="8" align="center">Data Kosong</td></tr>';
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

<div id="modal_tambah_transaksi" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Transaksi</h4>
			</div>
			<form action="<?php echo base_url('transaksi/tambah'); ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="lapangan_id" id="lapangan_id_value">
					<input type="text" class="form-control" placeholder="Nama Lapangan" id="lapangan_name" disabled>
					<br>
					<input type="text" class="form-control" placeholder="Nama Penyewa" name="renter_name">
					<br>
					<input type="number" class="form-control" placeholder="Durasi" name="duration" id="duration">
					<br>
					<input type="text" class="form-control" placeholder="Waktu Sewa" name="waktu" id="waktu">
					<br>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php if (in_array($this->session->userdata('level'), ['admin', 'manager'])) { ?>
	<div id="modal_bayar_transaksi" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Konfirmasi Pembayaran Transaksi</h4>
				</div>
				<form action="<?php echo base_url('transaksi/bayar'); ?>" method="POST">
					<div class="modal-body">
						<input type="hidden" name="id" id="bayar_id">
						<p>Apakah transaksi ini sudah dibayar?</p>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-danger" name="submit" value="YA">
						<button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php } ?>

<div id="modal_cancel_transaksi" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Konfirmasi Batalkan Transaksi</h4>
			</div>
			<form action="<?php echo base_url('transaksi/batalkan'); ?>" method="POST">
				<div class="modal-body">
					<input type="hidden" name="id" id="cancel_id">
					<p>Apakah anda yakin membatalkan transaksi ini?</p>
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
	$(document).ready(function() {
		$('#waktu').flatpickr({
			enableTime: true,
			dateFormat: "Y-m-d H:i",
			minDate: "today"
		});
	});

	$('#btn-tambah-transaksi').on('click', function(e) {
		e.preventDefault();
		$('#invalid-lapangan_id').hide();
		if ($('#lapangan_id').val() == null) {
			$('#invalid-lapangan_id').show();
			$('#text-lapangan_id').html('Lapangan Harus Dipilih!');
		} else {
			$('#modal_tambah_transaksi').modal('show');
			$('#lapangan_id_value').val($('#lapangan_id').val());
			$('#lapangan_name').val($('#lapangan_id option:selected').text());
			$('#duration').attr('placeholder', 'Durasi (' + $('#lapangan_id option:selected').text().split(' ').pop() + ')');
		}
	});

	$('#lapangan_id').on('change', function() {
		$('#invalid-lapangan_id').hide();
	});

	$(document).on("click", "#btnCancel", function() {
		var id = $(this).data('id');
		$("#cancel_id").val(id);
	});

	$(document).on("click", "#btnBayar", function() {
		var id = $(this).data('id');
		$("#bayar_id").val(id);
	});
</script>
