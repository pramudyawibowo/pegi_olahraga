<div class="main-content">
	<div class="container-fluid">
		<h3 class="page-title" style="color: #00008B">Riwayat Transaksi</h3>

		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-body">

						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>User</th>
									<th>Tgl.Sewa</th>
									<th>Total Belanja</th>
									<th>kasir</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$no = 1;
								foreach ($riwayat as $r) {
									echo '
										<tr>
											<td>'.$no.'</td>
											<td>'.$r->nama_user.'</td>
											<td>'.$r->tanggal_sewa.'</td>
											<td>'.$r->total.'</td>
											<td>'.$r->id_user.'</td>
											<td>
												<a href="#" class="btn btn-info" data-toggle="modal" data-target="#modal_detail_transaksi" onclick="prepare_detail_transaksi('.$r->id_transaksi.')">Lihat detail</a>
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

<div id="modal_detail_transaksi" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">detail Transaksi</h4>
      </div>
      <form action="<?php echo base_url('user/ubah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	        	
	      </div>
	      <div class="modal-footer">
	        <a href="#" class="btn btn-warning" id="cetak_nota" target="_blank">CETAK NOTA</a>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>

  </div>
</div>

<script type="text/javascript">
	
	function prepare_detail_transaksi(id)
	{
		$(".modal-body").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/transaksi/get_detail_transaksi_by_id/' + id,  function(data){
			$(".modal-body").html(data.show_detail);
		});

		$('#cetak_nota').attr('href','<?php echo base_url();?>index.php/transaksi/cetak_nota/' + id);
	}
</script>
