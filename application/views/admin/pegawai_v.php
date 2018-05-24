<section class="content">
	<div class="table-responsive">
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
		  <a href="<?=base_url('Pegawai/getAktif')?>" class="btn btn-success">Pegawai Aktif</a>
		  <a href="<?=base_url('Pegawai')?>" class="btn btn-default">Semua Data</a>
		  <a href="<?=base_url('Pegawai/getTidakAktif')?>" class="btn btn-danger">Pegawai Tidak Aktif</a>
		</div>
	  	<table class="table">
	    <thead>
	    	<tr>
	    		<th>NO</th>
	    		<th>NAMA</th>
	    		<th>ALAMAT</th>
	    		<th>JABATAN</th>
	    		<th>STATUS</th>
	    		<th>AKSI</th>
	    	</tr>
	    </thead>
	    <tbody>
	    	<?php 
	    		$no = 1;
	    		foreach ($isi as $key) { ?>
	    			<tr>
	    				<td><?=$no++?></td>
	    				<td><?=$key->nama_peg?></td>
	    				<td><?=$key->alamat_peg?></td>
	    				<td><?=$key->jabatan?></td>
	    				<td>
	    					<?php 
	    						if ($key->status == 1) {
	    							echo "<label class=\"label label-success\">Aktif</label>";
	    						}else{
	    							echo "<label class=\"label label-danger\">Tidak Aktif</label>";
	    						}
	    					 ?>
	    				</td>
	    				<td>
	    					<a href="<?=base_url('Pegawai/detail/').$key->id_peg?>" data-toggle="tooltip" title="Detail data" class="btn btn-info"><i class="fa fa-info-circle"></i></a>
	    					<button onclick="update_peg(<?=$key->id_peg?>)" data-toggle="tooltip" title="Update data" class="btn btn-success"><i class="fa fa-pencil"></i></button>
	    					<button class="btn btn-danger" title="Hapus data" data-toggle="modal" data-target="#modal_delete"><i class="fa fa-trash-o"></i></button>
	    				</td>
	    			</tr>
	    		<?php }
	    	 ?>
	    </tbody>
	  	</table>
	  	<!-- Modal -->
		<div id="modal_delete" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header footer-modal-danger">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Konfirmasi !!!</h4>
		      </div>
		      <div class="modal-body">
		        <p>Anda yakin ingin menghapus data pegawai ini?</p>
		      </div>
		      <div class="modal-footer footer-modal-danger">
		        <a href="<?=base_url('Pegawai/delete/').$key->id_peg?>" class="btn btn-danger">Ya</a>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
		      </div>
		    </div>
		  </div>
		</div>
	  	<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header" style="background: green; color: white;">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Masukkan data guru</h4>
		      </div>
		      <div class="modal-body">
		        <form action="<?=base_url('Pegawai/add')?>" method="post">
		        	<div class="form-group">
		        		<label for="nama" class="form-group">Nama</label>
		        		<input type="hidden" class="form-control" name="id_peg">
		        		<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
		        	</div>
		        	<div class="form-group">
		        		<label for="alamat" class="form-group">Alamat</label>
		        		<input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap">
		        	</div>
		        	<div class="form-group">
		        		<label for="notelp">No Telp.</label>
		        		<input type="text" class="form-control" name="notelp" placeholder="No. Telp">
		        	</div>
		        	<div class="row">
		        		<div class="form-group col-lg-6">
			        		<label for="jabatan">Jabatan</label>
			        		<select name="jabatan" class="form-control">
			        			<option value="Tata Usaha TKJ">Tata Usaha TKJ</option>
			        			<option value="Tata Usaha TKR">Tata Usaha TKR</option>
			        			<option value="Tata Usaha TP">Tata Usaha TP</option>
			        			<option value="Tata Usaha TB">Tata Usaha TB</option>
			        			<option value="Kantin">Kantin</option>
			        			<option value="Kebon">Kebon</option>
			        		</select>
			        	</div>
			        	<div class="form-group col-lg-6">
			        		<label for="agama">Agama</label>
			        		<select name="agama" class="form-control">
			        			<option value="Islam">Islam</option>
			        			<option value="Kristen">Kristen</option>
			        			<option value="Hindu">Hindu</option>
			        			<option value="Budha">Budha</option>
			        			<option value="Konghucu">Konghucu</option>
			        			<option value="Lainnya ...">Lainnya ...</option>
			        		</select>
			        	</div>
		        	</div>
		        	<div class="row">
		        		<div class="form-group col-lg-6">
			        		<label for="jk">Jenis Kelamin</label>
			        		<select name="jk" class="form-control">
			        			<option value="L">Laki-laki</option>
			        			<option value="P">Perempuan</option>
			        		</select>
			        	</div>
			        	<div class="form-group col-lg-6">
			        		<label for="status">Status</label>
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
      </div>
	</div>
</section>

<!-- <script src="<?=base_url('assets/js/jquery-3.1.0.min.js')?>"></script> -->

<script type="text/javascript">
	function update_peg(id) {
	    //Ajax Load data from ajax
      $.ajax({
        url : "<?=base_url('Pegawai/getId')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_peg"]').val(data.id_peg);
            $('[name="nama"]').val(data.nama_peg);
            $('[name="alamat"]').val(data.alamat_peg);
            $('[name="jabatan"]').val(data.jabatan);
            $('[name="jk"]').val(data.jk);
            $('[name="agama"]').val(data.agama);
            $('[name="notelp"]').val(data.no_telp);
            $('[name="status"]').val(data.status);

            // console.log(data.nama_peg);

            $('#myModal').modal('show'); // show bootstrap modal when complete loaded
            $('#btn-simpan').hide();
            $('#btn-update').show();
            $('.modal-title').text('Edit Data Guru'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    	});
	}
</script>