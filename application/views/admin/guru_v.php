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
		  <a href="<?=base_url('Guru/getAktif')?>" class="btn btn-success">Guru Aktif</a>
		  <a href="<?=base_url('Guru')?>" class="btn btn-default">Semua Data</a>
		  <a href="<?=base_url('Guru/getTidakAktif')?>" class="btn btn-danger">Guru Tidak Aktif</a>
		</div>
	  	<table class="table" id="table_guru">
	    <thead>
	    	<tr>
	    		<th>NO</th>
	    		<th>NAMA</th>
	    		<th>ALAMAT</th>
	    		<th>STATUS</th>
	    		<th>AKSI</th>
	    	</tr>
	    </thead>
	    <tbody>
	    	<?php 
	    		if ($isi == null) {
	    			echo "<tr><td coolspan=5>Data kosong ...</td></tr>";
	    		}else{
	    			$no = 1;
		    		foreach ($isi as $key) { ?>
		    			<tr>
		    				<td><?=$no++?></td>
		    				<td><?=$key->nama?></td>
		    				<td><?=$key->alamat?></td>
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
		    					<a href="<?=base_url('Guru/detail/').$key->id_guru?>" data-toggle="tooltip" title="Detail data" class="btn btn-info"><i class="fa fa-info-circle"></i></a>
		    					<button onclick="update_guru(<?=$key->id_guru?>)" data-toggle="tooltip" title="Update data" class="btn btn-success"><i class="fa fa-pencil"></i></button>
		    					<button onclick="hapus($key->id_guru)" title="Hapus data" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
		    				</td>
		    			</tr>
		    		<?php }
	    		}
	    	 ?>
	    </tbody>
	  	</table>

	  	<!-- Modal Delete-->
		<div id="myModalDelete" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header" style="background-color: #ff0000;color: white;">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Konfirmasi Penghapusan</h4>
		      </div>
		      <div class="modal-body">
		        <p>Anda yakin akan menghapus <b id="nama_user_system"></b>?</p>
		        <form method="post" action="<?=base_url('User_system/delete')?>" id="form_delete">
		          <input type="hidden" name="id_user_system">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
		        <button type="submit" class="btn btn-danger">YA</button>
		      </div>
		      </form>
		    </div>

		  </div>
		</div>

		<!-- Modal Delete-->
		<div id="myModalDetail" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header" style="background-color: #ff0000;color: white;">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Konfirmasi Penghapusan</h4>
		      </div>
		      <div class="modal-body">
		        <p>Anda yakin akan menghapus <b id="nama_user_system"></b>?</p>
		        <form method="post" action="<?=base_url('User_system/delete')?>" id="form_delete">
		          <input type="hidden" name="id_user_system">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
		        <button type="submit" class="btn btn-danger">YA</button>
		      </div>
		      </form>
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
		        <form action="<?=base_url('Guru/add')?>" method="post">
		        	<div class="form-group">
		        		<label for="nip">NIP</label>
		        		<input type="text" class="form-control" name="nip" placeholder="Nomor Induk Pegawai">
		        		<input type="hidden" class="form-control" name="id_guru" placeholder="Nomor Induk Pegawai">
		        	</div>
		        	<div class="form-group">
		        		<label for="nama" class="form-group">Nama</label>
		        		<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
		        	</div>
		        	<div class="form-group">
		        		<label for="alamat" class="form-group">Alamat</label>
		        		<input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap">
		        	</div>
		        	<div class="row">
		        		<div class="form-group col-lg-6">
			        		<label for="no_telp" class="form-group">No Telp</label>
			        		<input type="text" class="form-control" name="no_telp" placeholder="No Telp">
			        	</div>
			        	<div class="form-group col-lg-6">
			        		<label for="agama" class="form-group">Agama</label>
			        		<select name="agama" class="form-control">
			        			<option>--- Pilih agama ---</option>
			        			<option value="Islam">Islam</option>
			        			<option value="Kristen">Kristen</option>
			        			<option value="Katolik">Katolik</option>
			        			<option value="Hindu">Hindu</option>
			        			<option value="Budha">Budha</option>
			        			<option value="Konghuchu">Konghuchu</option>
			        			<option value="Lainnya ...">Lainnya ...</option>
			        		</select>
			        	</div>
		        	</div>
		        	<div class="row">
			        	<div class="form-group col-lg-6">
			        		<label for="jk" class="form-group">Jenis Kelamin</label>
			        		<select name="jk" class="form-control">
			        			<option>--- Pilih ---</option>
			        			<option value="L">Laki-laki</option>
			        			<option value="P">Perempuan</option>
			        		</select>
			        	</div>
			        	<div class="form-group col-lg-6">
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
	</div>
</section>


<script src="<?=base_url('assets/plugins/jQuery/jquery-2.2.3.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/select2.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/DataTables/datatables.min.js')?>"></script>
    
<script type="text/javascript">
	$(document).ready(function(){
    $('#table_guru').DataTable();
  });
	
	function hapus(id) {
		alert("asdasd");
	}

	function update_guru(id) {
    //Ajax Load data from ajax
    $.ajax({
      url : "<?=base_url('Guru/getDetail')?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('[name="id_guru"]').val(data.id_guru);
        $('[name="nip"]').val(data.nip);
        $('[name="nama"]').val(data.nama);
        $('[name="alamat"]').val(data.alamat);
        $('[name="jk"]').val(data.jk);
        $('[name="agama"]').val(data.agama);
        $('[name="no_telp"]').val(data.no_telp);
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