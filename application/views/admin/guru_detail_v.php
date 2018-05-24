<style type="text/css">
	.th{float: right;}
</style>
<section class="content">
	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h4 class="text-center">Detail <?=$isi->nama?></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
               		<tr>
						<th class="th">ID GURU</th>
						<td>:</td>
						<td><?=$isi->id_guru?></td>
					</tr>
					<tr>
						<th class="th">NOMOR INDUK PEGAWAI (NIP)</th>
						<td>:</td>
						<td>
							<?php 
								if ($isi->nip == null) {
									echo "-";
								}else{
									echo $isi->nip;
								}
							 ?>
						</td>
					</tr>
					<tr>
						<th class="th">NAMA LENGKAP</th>
						<td>:</td>
						<td><?=$isi->nama?></td>
					</tr>
					<tr>
						<th class="th">ALAMAT LENGKAP</th>
						<td>:</td>
						<td><?=$isi->alamat?></td>
					</tr>
					<tr>
						<th class="th">JENIS KELAMIN</th>
						<td>:</td>
						<td>
							<?php 
								if ($isi->jk == "L") {
									echo "Laki-laki";
								}else{
									echo "Perempuan";
								}
							 ?>
						</td>
					</tr>
					<tr>
						<th class="th">AGAMA</th>
						<td>:</td>
						<td><?=$isi->agama?></td>
					</tr>
					<tr>
						<th class="th">NO. TELP</th>
						<td>:</td>
						<td><?=$isi->no_telp?></td>
					</tr>
					<tr>
						<th class="th">STATUS</th>
						<td>:</td>
						<td>
							<?php 
								if ($isi->status == 1) {
									echo "Aktif";
								}else{
									echo "Tidak Aktif";
								}
							 ?>
						</td>
					</tr>
					<tr>
						<td colspan="3" class="text-center"><a class="btn btn-default" href="<?=base_url('guru')?>"><i class="fa fa-arrow-left" style="margin-right: 10px;"></i>Kembali</a></td>
					</tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</section>