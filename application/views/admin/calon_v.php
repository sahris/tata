
<style type="text/css">

</style>
<section class="content">
	<?php if ($page_load == "view") { ?>
		<?php if ($this->session->userdata('success') != ""): ?>
			<div class="alert alert-success">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Success!</strong> <i><?=$this->session->userdata('success')?></i>
			 </div>
		<?php elseif($this->session->userdata('error') != ""): ?>
			<div class="alert alert-danger">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Gagal!</strong> <i><?=$this->session->userdata('error')?></i>
			</div>
		<?php endif ?>
		<div class="table-responsive">
			<a class="btn btn-primary" href="<?=base_url('Calon/add')?>">Tambah Data <i class="fa fa-plus"></i></a>
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		        <thead>
		            <tr>
		            <th>NO</th>
		            <th>NO URUT</th>
		            <th>CALON KETUA</th>
		            <th>CALON WAKIL KETUA</th>
		            <th>PERIODE</th>
		            <th>AKSI</th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php if(!empty($isi) && is_array($isi)):?>
		            <?php $no=1; foreach($isi as $key => $data):?>
		            <tr>
		                <td><?=$no++;?></td>
		                <td><?=$data->no_urut;?></td>
		                <td><?=$data->c_ket;?></td>
		                <td><?=$data->cw_ket;?></td>
		                <td><?=$data->periode;?></td>
		                <td>
		                	<!-- <button class="btn btn-success" onclick="get_edit(<?=$data->id_poli?>)"><i class="fa fa-pencil"></i></button> -->
		                	<button class="btn btn-info" onclick="detail(<?=$data->id_calon?>)"><i class="fa fa-info-circle"></i></button>
		                	<a class="btn btn-success" href="<?=base_url('Calon/edit').'/'.$data->id_calon?>"><i class="fa fa-pencil"></i></a>
		                	<button class="btn btn-danger" onclick="hapus(<?=$data->id_calon?>)"><i class="fa fa-trash"></i></button>
		                </td>
		            </tr>
		            <?php endforeach;?>
		            <?php else: ?>
		                <h3>Tidak ada Data Poli</h3>
		            <?php endif;?>
		        </tbody>
		    </table>
		</div>
		<!-- Modal delete-->
		<div id="myModalDelete" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Konfirmasi</h4>
		      </div>
		      <div class="modal-body">
		        <p>Anda yakin akan menghapus pasangan <b id="nama_ketua"></b> dan <b id="nama_wakil"></b>?</p>
		        <form action="<?=base_url('Calon/delete')?>" method="post">
		        	<input type="hidden" name="id_calon">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
		        <button type="submit" name="delete" class="btn btn-danger">YA</button>
		      </div>
		      </form>
		    </div>

		  </div>
		</div>

		<!-- Modal detail-->
		<div id="myModalDetail" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Detail Calon</h4>
		      </div>
		      <div class="modal-body">
		        <div class="row">
		        	<div class="col-lg-6">
		        		<center>
		        			<img style="width: 40%;height: auto;" id="img_ketua" src=""><br>
		        		</center>
		        	</div>
		        	<div class="col-lg-6">
		        		<center>
		        			<img style="width: 40%;height: auto;" id="img_wakil_ketua" src=""><br>
		        		</center>
		        	</div>
		        </div>
		        <div class="row" style="margin-bottom: 20px;">
		        	<div class="col-lg-6">
		        		<center>
		        			<label style="margin-top: 10px;">Foto Calon Ketua</label>
		        		</center>
		        	</div>
		        	<div class="col-lg-6">
		        		<center>
		        			<label style="margin-top: 10px;">Foto Calon Wakil Ketua</label>
		        		</center>
		        	</div>
		        </div>
		        <table class="table table-responsive">
		        	<tr>
		        		<th>No URUT</th>
		        		<td>:</td>
		        		<td id="no_urut"></td>
		        	</tr>
		        	<tr>
		        		<th>NAMA CALON KETUA</th>
		        		<td>:</td>
		        		<td id="nama_calon_ketua"></td>
		        	</tr>
		        	<tr>
		        		<th>NAMA CALON WAKIL KETUA</th>
		        		<td>:</td>
		        		<td id="nama_calon_wakil_ketua"></td>
		        	</tr>
		        	<tr>
		        		<th>PERIODE</th>
		        		<td>:</td>
		        		<td id="periode"></td>
		        	</tr>
		        	<tr>
		        		<th>VISI</th>
		        		<tH>MISI</tH>
		        	</tr>
		        	<tr>
		        		<td id="visi"></td>
		        		<td id="misi"></td>
		        	</tr>

		        </table>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>
	<?php }elseif ($page_load == "add") { ?>
		<section class="content">
			<div class="adah-form">
				<?php echo form_open_multipart('Calon/daftar'); ?>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>No Urut</label>
								<input class="form-control" type="number" name="no_urut" placeholder="No Urut" required>
								<span class="ntf_error" id="ntf_no_urut"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Periode</label>
								<div class="row">
									<div class="col-lg-6">
										<input class="form-control" type="number" name="awal_periode" placeholder="Tahun awal periode" required>
									</div>
									<div class="col-lg-6">
										<input class="form-control" type="number" name="akhir_periode" placeholder="Tahun akhir periode" required>
									</div>
								</div>
								<span class="ntf_error" id="ntf_no_urut"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nama Calon Ketua</label>
								<input class="form-control" type="text" name="nama_calon_ketua" placeholder="Nama Calon Ketua" required>
								<span class="ntf_error" id="ntf_nama_ketua"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nama Calon Wakil Ketua</label>
								<input class="form-control" type="text" name="nama_calon_wakil_ketua" placeholder="Nama Calon Wakil Ketua" required>
								<span class="ntf_error" id="ntf_nama_wakil_ketua"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Foto Calon Ketua</label>
								<input class="form-control" type="file" name="foto_calon_ketua">
								<span class="ntf_error" id="ntf_calon_ketua"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Foto Calon Wakil Ketua</label>
								<input class="form-control" type="file" name="foto_calon_wakil_ketua">
								<span class="ntf_error" id="ntf_calon_wakil_ketua"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Visi</label>
								<textarea placeholder="Masukkan visi disini" name="visi" class="form-control" required></textarea>
								<span class="ntf_error" id="ntf_visi"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Misi</label>
								<textarea placeholder="Masukkan misi disini" name="misi" class="form-control" required></textarea>
								<span class="ntf_error" id="ntf_misi"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<a href="<?=base_url('Calon')?>" name="simpan" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
								<button type="submit" name="simpan" class="btn btn-primary">Simpan <i class="fa fa-save"></i></button>
							</div>
						</div>
					</div>
				<?php echo form_close(); ?>				
			</div>
		</section>
	<?php }elseif ($page_load == "edit") { ?>
		<?php 
			$periode = $data_calon->periode;
			$awal = explode(' - ', $periode);
		 ?>
		<section class="content">
			<div class="adah-form">
				<?php echo form_open_multipart('Calon/edit_proses'); ?>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>No Urut</label>
								<input class="form-control" type="number" name="no_urut" value="<?=$data_calon->no_urut;?>" placeholder="No Urut" required>
								<input class="form-control" type="hidden" name="id_calon" value="<?=$data_calon->id_calon;?>" placeholder="No Urut">
								<span class="ntf_error" id="ntf_no_urut"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Periode</label>
								<div class="row">
									<div class="col-lg-6">
										<input class="form-control" type="number" value="<?=$awal[0]?>" name="awal_periode" placeholder="Tahun awal periode" required>
									</div>
									<div class="col-lg-6">
										<input class="form-control" type="number" value="<?=$awal[1]?>" name="akhir_periode" placeholder="Tahun akhir periode" required>
									</div>
								</div>
								<span class="ntf_error" id="ntf_no_urut"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nama Calon Ketua</label>
								<input class="form-control" type="text" value="<?=$data_calon->c_ket;?>" name="nama_calon_ketua" placeholder="Nama Calon Ketua" required>
								<span class="ntf_error" id="ntf_nama_ketua"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nama Calon Wakil Ketua</label>
								<input class="form-control" type="text" value="<?=$data_calon->cw_ket;?>" name="nama_calon_wakil_ketua" placeholder="Nama Calon Wakil Ketua" required>
								<span class="ntf_error" id="ntf_nama_wakil_ketua"></span>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Visi</label>
								<textarea placeholder="Masukkan visi disini" name="visi" class="form-control" required><?=$data_calon->visi;?></textarea>
								<span class="ntf_error" id="ntf_visi"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Misi</label>
								<textarea placeholder="Masukkan misi disini" name="misi" class="form-control" required><?=$data_calon->misi;?></textarea>
								<span class="ntf_error" id="ntf_misi"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Foto Calon Ketua</label>
								<input class="form-control" type="file" name="foto_calon_ketua">
								<span class="ntf_error" id="ntf_calon_ketua"></span>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Foto Calon Wakil Ketua</label>
								<input class="form-control" type="file" name="foto_calon_wakil_ketua">
								<span class="ntf_error" id="ntf_calon_wakil_ketua"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<img style="width: 40%;height: auto;" src="<?=base_url()?>img_calon/<?=$data_calon->foto_c_ket?>">
						</div>
						<div class="col-lg-6">
							<img style="width: 40%;height: auto;" src="<?=base_url()?>img_calon/<?=$data_calon->foto_c_w_ket?>">
						</div>
					</div>
					<div class="row" style="margin-top: 20px;">
						<div class="col-lg-6">
							<div class="form-group">
								<a href="<?=base_url('Calon')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
								<button type="submit" name="update" class="btn btn-success">Simpan Perubahan <i class="fa fa-save"></i></button>
							</div>
						</div>
					</div>
				<?php echo form_close(); ?>				
			</div>
		</section>
	<?php } ?>
</section>

<script type="text/javascript">
	function detail(id) {
		$.ajax({
			url: "<?=base_url('Calon/getAjax')?>/" + id,
			method: "GET",
			dataType:"JSON",
			success:function(data) {
				console.log(data);
				var img_ketua = data.data.foto_c_ket;
				var img_wakil_ketua = data.data.foto_c_w_ket;
				$('#img_ketua').attr('src','<?=base_url('img_calon')?>/' + img_ketua);
				$('#img_wakil_ketua').attr('src','<?=base_url('img_calon')?>/' + img_wakil_ketua);
				$('#no_urut').text(data.data.no_urut);
				$('#nama_calon_ketua').text(data.data.c_ket);
				$('#nama_calon_wakil_ketua').text(data.data.cw_ket);
				$('#periode').text(data.data.periode);
				$('#visi').text(data.data.visi);
				$('#misi').text(data.data.misi);
				$('#myModalDetail').modal('show');
			},error(a,s,d){
				alert("Error get data from ajax");
			}
		});
	}

	function hapus(id) {
		$.ajax({
			url: "<?=base_url('Calon/getAjax')?>/" + id,
			method: "GET",
			dataType:"JSON",
			success:function(data) {
				console.log(data);
				$('#nama_ketua').text(data.data.c_ket);
				$('#nama_wakil').text(data.data.cw_ket);
				$('[name="id_calon"]').val(data.data.id_calon);

				$('#myModalDelete').modal('show');
			},error:function(a,s,d) {
				alert("Error get data from ajax");
			}
		});
	}
</script>