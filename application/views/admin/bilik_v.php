<style type="text/css">
	#btn_setting:hover{
		background: green;
	}
</style>
<section class="content">
	<?php 
		if ($this->session->flashdata('success')) {
			$sukses = $this->session->flashdata('success'); ?>
			<div class="alert alert-success">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Success!</strong> <?=$sukses?>
			</div>
		<?php }elseif($this->session->flashdata('error')){
			$eror = $this->session->flashdata('error'); ?>
			<div class="alert alert-danger">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Error!</strong> <?=$eror?>
			</div>
		<?php 
		}
	 ?>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" style="margin-right: 10px;"></i>Tambah Data</button>
	<div class="btn-group">
	  <a href="<?=base_url('Bilik/getAktif')?>" class="btn btn-success">Bilik Aktif</a>
	  <a href="<?=base_url('Bilik')?>" class="btn btn-default">Semua Bilik</a>
	  <a href="<?=base_url('Bilik/getTidakAktif')?>" class="btn btn-danger">Bilik Tidak Aktif</a>
	</div>
	<div class="row" style="margin-top: 20px;">
	<?php 
		foreach ($isi as $data) { ?>
			    <div class="col-lg-3">
			    	<div class="box box-widget widget-user-2">
				        <!-- Add the bg color to the header using any of the bg-* classes -->
				        <div class="widget-user-header" style="background-color: #0000ff;color: white;">
				          <!-- /.widget-user-image -->
				          <h3 class="text-center">Bilik <?=$data->tahun?></h3>
				        </div>
				        <div class="box-footer no-padding">
				          <ul class="nav nav-stacked">
				            <li><a href="#">Tahun <span class="pull-right"><?=$data->tahun?></span></a></li>
				            <li><a href="#">Mulai <span class="pull-right"><?=$data->mulai?> WIB</span></a></li>
				            <li><a href="#">Selesai <span class="pull-right"><?=$data->selesai?> WIB</span></a></li>
				            <li><a href="#">Status <span class="pull-right">
				            <?php 
				            	if ($data->status == 1) {
				            		echo "<span class=\"label label-success\">Aktif</span>";
				            	}elseif($data->status == 0){
				            		echo "<span class=\"label label-danger\">Tidak Aktif</span>";
				            	}
				             ?></span></a></li>
				            <li>
				            	<a class="btn btn-success" id="btn_setting" style="color: white;" href="<?=base_url('Dashboard/index')."/".$data->tahun;?>">Atur Bilik <i class="fa fa-cog"></i></a>
			            		<button class="btn btn-warning" style="width: 49%;" id="btn-aktif-<?=$data->id_bilik?>" class="text-center" onclick="update(<?=$data->id_bilik?>)">Edit <i class="fa fa-pencil"></i></button>
			            		<button class="btn btn-danger" style="width: 49%;" id="btn-aktif-<?=$data->id_bilik?>" class="text-center" onclick="update(<?=$data->id_bilik?>)">Hapus <i class="fa fa-trash"></i></button>
				            </li>
				          </ul>
				        </div>
				    </div>
			    </div>
		<?php }
	 ?>
	</div>

	<!-- Modal add-->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header" style="background: green; color: white;">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Masukkan data bilik</h4>
	      </div>
	      <div class="modal-body">
	        <form action="<?=base_url('Bilik/add')?>" method="post">
	        	<div class="form-group">
	        		<input type="hidden" class="form-control" name="id_bilik" placeholder="Nomor Induk Pegawai">
	        	</div>
	        	
	        	<div class="row">
	        		<div class="form-group col-lg-4">
		        		<label for="tahun" class="form-group">Tahun Pemilihan</label>
		        		<select name="tahun" class="form-control">
		        			<option>-- Pilih tahun --</option>
		        			<?php 
		        				$tahun_sekarang = date("Y");
		        				$tambah_tahun = $tahun_sekarang + 20;
		        				for ($i=$tahun_sekarang; $i < $tambah_tahun; $i++) { 
		        					?> <option value="<?=$i?>"><?=$i?></option> <?php
		        				}
		        			 ?>
		        		</select>
		        	</div>
		        	<div class="form-group col-lg-4">
		        		<label for="mulai" class="form-group">Jam Mulai</label>
		        		<input class="form-control" type="time" name="mulai" placeholder="hh:mm:ss">
		        	</div>
		        	<div class="form-group col-lg-4">
		        		<label for="selesai" class="form-group">Jam Selesai</label>
		        		<input class="form-control" type="time" name="selesai" placeholder="hh:mm:ss">
		        	</div>
	        	</div>
	        	<div class="row">
	        		<div class="col-lg-12">
	        			<label for="status" class="form-group">Status</label>
	        			<select name="status" class="form-control">
	        				<option value="1">Aktif</option>
	        				<option value="0">Tidak Aktif</option>
	        			</select>
	        		</div>
	        	</div>
	      	</div>
		    <div class="modal-footer footer-modal">
		    	<button type="submit" id="btn-simpan" name="simpan" class="btn btn-primary">Simpan</button>
		    	<button type="submit" id="btn-update" name="update" style="display: none;" class="btn btn-success">Simpan Perubahan</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
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
	      <div class="modal-header" style="background: green; color: white;">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Masukkan data bilik</h4>
	      </div>
	      <div class="modal-body">
	        <table class="table table-responsive">
	        	<tr>
	        		<th>ID BILIK</th>
	        		<td>:</td>
	        		<td id="id_bilik"></td>
	        	</tr>
	        	<tr>
	        		<th>TAHUN PEMILIHAN</th>
	        		<td>:</td>
	        		<td id="tahun"></td>
	        	</tr>
	        	<tr>
	        		<th>MULAI</th>
	        		<td>:</td>
	        		<td id="mulai"></td>
	        	</tr>
	        	<tr>
	        		<th>SELESAI</th>
	        		<td>:</td>
	        		<td id="selesai"></td>
	        	</tr>
	        	<tr>
	        		<th>STATUS</th>
	        		<td>:</td>
	        		<td id="status"></td>
	        	</tr>

	        </table>
	      </div>
		  <div class="modal-footer footer-modal">
		        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Kembali</button>
		  </div>
	    </div>
	  </div>
	</div>
</section>

<script type="text/javascript">
	function detail(id) {
		$.ajax({
			url : "<?=base_url('Bilik/detail')?>/" + id,
	        type: "GET",
	        dataType: "JSON",
	        success: function(data)
	        {
	        	// console.log(data);
	            $("#id_bilik").text(data.id_bilik);
	            $("#tahun").text(data.tahun);
	            $("#mulai").text(data.mulai + " WIB");
	            $("#selesai").text(data.selesai + " WIB");
	            if (data.status == 1) {
	            	var status = "Aktif";
	            }else{
	            	var status = "Tidak Aktif";
	            }
	            $("#status").text(status);

	            // // console.log(data.nama_peg);

	            $('#myModalDetail').modal('show');
	            $('.modal-title').text('Detail Bilik ' + data.tahun); // Set title to Bootstrap modal title

	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error get data from ajax');
	        }
		});
	}

	function update(id) {
		$.ajax({
			url: "<?=base_url('Bilik/getId')?>/" +id,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				// console.log(data);
	            $('[name="id_bilik"]').val(data.id_bilik);
	            $('[name="tahun"]').val(data.tahun);
	            $('[name="mulai"]').val(data.mulai);
	            $('[name="selesai"]').val(data.selesai);
	            
	            $('[name="status"]').val(status);

	            // // console.log(data.nama_peg);

	            $('#myModal').modal('show');
	            $('.modal-title').text('Edit Bilik ' + data.tahun);
			},
			error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error update data from ajax');
	        }
		});
	}
</script>