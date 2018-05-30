<style type="text/css">
	.btn_menu{
		margin-bottom: 20px;
	}
	div#alert_info{
		font-size: 20px;
	}
</style>
<section class="content">
	 <div class="alert alert-info" id="alert_info">
	  <strong>Informasi!</strong> Silahkan pilih menu untuk memanage keperluan dalam voting.
	</div>
	<div class="row btn_menu">
		<div class="col-lg-6">
			<a class="btn btn-success btn-lg" style="width: 100%;" href="<?=base_url('calon')?>">Manage Calon</a>
		</div>
		<div class="col-lg-6">
			<a class="btn btn-success btn-lg" style="width: 100%;" href="<?=base_url('user_polling')?>">Manage User Polling</a>
		</div>
	</div>
	<div class="row btn_menu">
		<div class="col-lg-4">
			<a class="btn btn-success btn-lg" style="width: 100%;" href="<?=base_url('siswa')?>">Manage Data Siswa</a>
		</div>
		<div class="col-lg-4">
			<a class="btn btn-success btn-lg" style="width: 100%;" href="<?=base_url('guru')?>">Manage Data Guru</a>
		</div>
		<div class="col-lg-4">
			<a class="btn btn-success btn-lg" style="width: 100%;" href="<?=base_url('pegawai')?>">Manage Pegawai</a>
		</div>
	</div>
	<div class="row btn_menu">
		<div class="col-lg-4">
			<a class="btn btn-success btn-lg" style="width: 100%;" href="<?=base_url('siswa')?>">Laporan Jumlah Suara</a>
		</div>
		<div class="col-lg-4">
			<a class="btn btn-success btn-lg" style="width: 100%;" href="<?=base_url('guru')?>">Sudah Memilih</a>
		</div>
		<div class="col-lg-4">
			<a class="btn btn-success btn-lg" style="width: 100%;" href="<?=base_url('pegawai')?>">Belum Memilih</a>
		</div>
	</div>
</section>