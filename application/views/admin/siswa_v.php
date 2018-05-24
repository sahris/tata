<section class="content" style="margin-left: 10px;">
  <div class="row">
    <a href="#form-siswa" data-toggle="modal" class="btn btn-success"><i style="margin-right: 5px;" class="fa fa-plus"></i>Tambah Data Siswa</a>
     <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
        <th>NO</th>
        <th>NAMA LENGKAP</th>
        <th>KELAS</th>
        <th>TAHUN</th>
        <th>STATUS</th>
        <th style="width:125px;">AKSI</p></th>
        </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach($isi as $row){?>
               <tr>
                  <td><?=$no++;?></td>
                  <td><?php echo $row->nama;?></td>
                  <td><?php echo $row->kelas;?></td>
                  <td><?php echo $row->tahun_masuk;?></td>
                  <td>
                    <?php 
                      if ($row->status == 1) {
                        echo "<label class=\"label label-success\">Aktif</label>";
                      }else{
                        echo "<label class=\"label label-danger\">Tidak aktif</label>";
                      }
                     ?>
                  </td>
                  <td>
                    <a class="btn btn-warning" href="<?=base_url().'Siswa/edit/'.$row->nis?>"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a class="btn btn-danger" href="<?=base_url().'Siswa/delete/'.$row->nis?>"><i class="glyphicon glyphicon-remove"></i></a>
                  </td>
                </tr>
               <?php }?>
        </tbody>
        <tfoot>
        <tr>
        <th>NO</th>
        <th>NAMA LENGKAP</th>
        <th>KELAS</th>
        <th>TAHUN</th>
        <th>STATUS</th>
        <th style="width:125px;">AKSI</p></th>
        </tr>
      </tfoot>
    </table>
  </div>
  <script type="text/javascript" src="<?=base_url('assets/DataTables/datatables.min.js')?>"></script>
  <!-- <script type="text/javascript" src="<?=base_url('assets/DataTables/datatables.js')?>"></script> -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('#table_id').DataTable();
    });
  </script>
</section>

<div class="modal fade" role="dialog" id="form-siswa" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Input Data Guru</h4>
        </div>
      <center><p id="view_pesan" role="alert"></p></center>
      <input class="form-control" type="hidden" name="id_guru">
      <table class="table">
        <tr>
          <td>NIS</td>
          <td><input class="form-control" type="text" name="nis" placeholder="Nomor Induk Siswa"></td>
        </tr>
        <tr>
          <td>Nama Lengkap</td>
          <td><input class="form-control" type="text" name="nama" placeholder="Nama Lengkap"></td>
        </tr>
        <tr>
          <td>Kelas</td>
          <td><input class="form-control" type="text" name="kelas" placeholder="Kelas"></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><input class="form-control" type="text" name="alamat" placeholder="Alamat"></td>
        </tr>
        <tr>
          <td>Tanggal Lahir</td>
          <td><input class="form-control" type="date" name="tgl_lahir" placeholder="Tanggal Lahir"></td>
        </tr>
        <tr>
          <td>Kota Lahir</td>
          <td><input class="form-control" type="text" name="kota_lhr" placeholder="Kota Lahir"></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>
            <select name="jk" class="form-control">
              <option value="L">Laki - laki</option>
              <option value="P">Perempuan</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Agama</td>
          <td><input class="form-control" type="text" name="agama" placeholder="Agama"></td>
        </tr>
        <tr>
          <td>Tahun Masuk</td>
          <td>
            <select name="thn_masuk" class="form-control">
              <?php 
                for ($i=2010; $i <= 2030; $i++) { ?>
                 <option value="<?=$i?>"><?=$i?></option> 
                <?php }
               ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Status</td>
          <td>
            <select name="status" class="form-control">
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <button type="button" id="btn-tambah" class="btn btn-success">Simpan</button>
            <!-- <button type="button" id="btn-ubah" class="btn btn-primary">Simpan Perubahan</button> -->
            <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
          </td>
        </tr>                                   
      </table>

    </div>
  </div>
</div>