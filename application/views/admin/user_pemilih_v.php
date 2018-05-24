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
			<a class="btn btn-primary" href="<?=base_url('User_polling/add')?>">Tambah Data <i class="fa fa-plus"></i></a>
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		        <thead>
		            <tr>
		            <th>NO</th>
		            <th>NAMA PEMILIH</th>
		            <th>USERNAME</th>
		            <th>PASSWORD</th>
		            <th>STATUS</th>
		            <th>AKSI</th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php if(!empty($isi) && is_array($isi)):?>
		            <?php $no=1; foreach($isi as $key => $data):?>
		            <tr>
		                <td><?=$no++;?></td>
		                <td><?=$data->id_pemilih_ref;?></td>
		                <td><?=$data->username;?></td>
		                <td><?=$data->password;?></td>
		                <td><?php if($data->status == 1){echo "<span class=\"label label-success\">Sudah</span>";}else{echo "<span class=\"label label-danger\">Belum</span>";}?></td>
		                <td>
		                	<!-- <button class="btn btn-success" onclick="get_edit(<?=$data->id_poli?>)"><i class="fa fa-pencil"></i></button> -->
		                	<button class="btn btn-info" onclick="detail(<?=$data->id_user?>)"><i class="fa fa-info-circle"></i></button>
		                	<a class="btn btn-success" href="<?=base_url('Calon/edit').'/'.$data->id_user?>"><i class="fa fa-pencil"></i></a>
		                	<button class="btn btn-danger" onclick="hapus(<?=$data->id_user?>)"><i class="fa fa-trash"></i></button>
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
			<div class="table-responsive">
			<a class="btn btn-primary" href="#">Selesai <i class="fa fa-check"></i></a>
			<div class="row">
        <!-- Left col -->
        <div class="nav-tabs-custom">
          <!-- Tabs within a box -->
          <ul class="nav nav-tabs pull-right">
            <li><a href="#guru" data-toggle="tab">Belum Memilih</a></li>
            <li><a href="#pegawai" data-toggle="tab">Sudah Memilih</a></li>
            <li class="active"><a href="#siswa" data-toggle="tab">Hasil Sementara</a></li>
            <li class="pull-left header"><i class="fa fa-inbox"></i> Diagram Perolehan</li>
          </ul>
          <div class="tab-content no-padding">
            <!-- Morris chart - Sales -->
            <table class="table table-bordered tab-pane active" style="position: relative;" id="siswa" width="100%" cellspacing="0">
			        <thead>
			            <tr>
			            <th>NO</th>
			            <th>NIS</th>
			            <th>NAMA SISWA</th>
			            <th>KELAS</th>
			            <th>TAHUN</th>
			            <th>STATUS</th>
			            <th>AKSI</th>
			            </tr>
			        </thead>
			        <tbody>
			            <?php if(!empty($data_siswaa) && is_array($data_siswaa)):?>
			            <?php $no=1; foreach($data_siswa as $key => $data):?>
			            <tr>
			                <td><?=$no++;?></td>
			                <td><?=$data->nis;?></td>
			                <td><?=$data->nama;?></td>
			                <td><?=$data->kelas;?></td>
			                <td><?=$data->tahun_masuk;?></td>
			                <td><?php if($data->status == 1){echo "<span class=\"label label-success\">Aktif</span>";}else{echo "<span class=\"label label-danger\">Tidak Aktif</span>";}?></td>
			                <td>
			                	<!-- <button class="btn btn-success" onclick="get_edit(<?=$data->id_poli?>)"><i class="fa fa-pencil"></i></button> -->
			                	<button class="btn btn-info" onclick="detail(<?=$data->nis?>)"><i class="fa fa-info-circle"></i></button>
			                	<a class="btn btn-success" href="<?=base_url('Calon/edit').'/'.$data->nis?>"><i class="fa fa-pencil"></i></a>
			                	<button class="btn btn-danger" onclick="hapus(<?=$data->nis?>)"><i class="fa fa-trash"></i></button>
			                </td>
			            </tr>
			            <?php endforeach;?>
			            <?php else: ?>
			                <h3>Tidak ada Data Siswa</h3>
			            <?php endif;?>
			        </tbody>
			  		</table>
			  		<table class="table table-bordered tab-pane" style="position: relative;" id="guru" width="100%" cellspacing="0">
			        <thead>
			            <tr>
			            <th>NO</th>
			            <th>NIS</th>
			            <th>NAMA SISWA</th>
			            <th>KELAS</th>
			            <th>TAHUN</th>
			            <th>STATUS</th>
			            <th>AKSI</th>
			            </tr>
			        </thead>
			        <tbody>
			            <?php if(!empty($data_siswaa) && is_array($data_siswaa)):?>
			            <?php $no=1; foreach($data_siswa as $key => $data):?>
			            <tr>
			                <td><?=$no++;?></td>
			                <td><?=$data->nis;?></td>
			                <td><?=$data->nama;?></td>
			                <td><?=$data->kelas;?></td>
			                <td><?=$data->tahun_masuk;?></td>
			                <td><?php if($data->status == 1){echo "<span class=\"label label-success\">Aktif</span>";}else{echo "<span class=\"label label-danger\">Tidak Aktif</span>";}?></td>
			                <td>
			                	<!-- <button class="btn btn-success" onclick="get_edit(<?=$data->id_poli?>)"><i class="fa fa-pencil"></i></button> -->
			                	<button class="btn btn-info" onclick="detail(<?=$data->nis?>)"><i class="fa fa-info-circle"></i></button>
			                	<a class="btn btn-success" href="<?=base_url('Calon/edit').'/'.$data->nis?>"><i class="fa fa-pencil"></i></a>
			                	<button class="btn btn-danger" onclick="hapus(<?=$data->nis?>)"><i class="fa fa-trash"></i></button>
			                </td>
			            </tr>
			            <?php endforeach;?>
			            <?php else: ?>
			                <h3>Tidak ada Data Guru</h3>
			            <?php endif;?>
			        </tbody>
			  		</table>
			  		<table class="table table-bordered tab-pane" style="position: relative;" id="pegawai" width="100%" cellspacing="0">
			        <thead>
			            <tr>
			            <th>NO</th>
			            <th>NIS</th>
			            <th>NAMA SISWA</th>
			            <th>KELAS</th>
			            <th>TAHUN</th>
			            <th>STATUS</th>
			            <th>AKSI</th>
			            </tr>
			        </thead>
			        <tbody>
			            <?php if(!empty($data_siswaa) && is_array($data_siswaa)):?>
			            <?php $no=1; foreach($data_siswa as $key => $data):?>
			            <tr>
			                <td><?=$no++;?></td>
			                <td><?=$data->nis;?></td>
			                <td><?=$data->nama;?></td>
			                <td><?=$data->kelas;?></td>
			                <td><?=$data->tahun_masuk;?></td>
			                <td><?php if($data->status == 1){echo "<span class=\"label label-success\">Aktif</span>";}else{echo "<span class=\"label label-danger\">Tidak Aktif</span>";}?></td>
			                <td>
			                	<!-- <button class="btn btn-success" onclick="get_edit(<?=$data->id_poli?>)"><i class="fa fa-pencil"></i></button> -->
			                	<button class="btn btn-info" onclick="detail(<?=$data->nis?>)"><i class="fa fa-info-circle"></i></button>
			                	<a class="btn btn-success" href="<?=base_url('Calon/edit').'/'.$data->nis?>"><i class="fa fa-pencil"></i></a>
			                	<button class="btn btn-danger" onclick="hapus(<?=$data->nis?>)"><i class="fa fa-trash"></i></button>
			                </td>
			            </tr>
			            <?php endforeach;?>
			            <?php else: ?>
			                <h3>Tidak ada Data Pegawai</h3>
			            <?php endif;?>
			        </tbody>
			  		</table>
            <!-- <div class="chart tab-pane active" id="siswa" style="position: relative; height: 300px;"></div>
            <div class="chart tab-pane" id="guru" style="position: relative; height: 300px;"></div>
            <div class="chart tab-pane" id="pegawai" style="position: relative; height: 300px;"></div> -->
          </div>
        </div>
      </div>
			
		</div>
		</section>
	<?php }elseif ($page_load == "edit") { ?>
		<?php 
			$periode = $data_calon->periode;
			$awal = explode(' - ', $periode);
		 ?>
		<section class="content">
			
		</section>
	<?php } ?>
</section>

<script src="<?=base_url('assets/plugins/jQuery/jquery-2.2.3.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/select2.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/DataTables/datatables.min.js')?>"></script>

<script type="text/javascript">
	$(document).ready(function(){
      $('#siswa').DataTable();
      $('#guru').DataTable();
      $('#pegawai').DataTable();
      $('#nis').select2();
    });

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