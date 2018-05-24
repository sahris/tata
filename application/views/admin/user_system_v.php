<section class="content" style="margin-left: 10px;">
  <div class="row">
    <?php 
      if ($this->session->flashdata('success') != "") { ?>
        <div class="alert alert-success"><?=$this->session->userdata('success')?></div>
      <?php }elseif($this->session->flashdata('error') != ""){ ?>
        <div class="alert alert-danger"><?=$this->session->userdata('error')?></div>
      <?php }
     ?>
    <a href="#form-user" data-toggle="modal" class="btn btn-success"><i style="margin-right: 5px;" class="fa fa-plus"></i>Registrasi</a>
     <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
        <th>NO</th>
        <th>USERNAME</th>
        <th>HAK AKSES</th>
        <th>STATUS</th>
        <th style="width:125px;">AKSI</p></th>
        </tr>
        </thead>
        <tbody>
          <?php 
            if ($isi != null) {
              $no = 1;
              foreach($isi as $row) { ?>
               <tr>
                  <td><?=$no++;?></td>
                  <td><?php echo $row->username;?></td>
                  <td>
                    <?php 
                      if ($row->hak_akses == 1) {
                        echo "Super Admin";
                      }elseif ($row->hak_akses == 2) {
                        echo "Admin";
                      }elseif ($row->hak_akses == 3) {
                        echo "Operator";
                      }
                     ?>
                  </td>
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
                    <button class="btn btn-warning" onclick="get(<?=$row->id_user?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                    <button class="btn btn-danger" onclick="getData(<?=$row->id_user?>)"><i class="glyphicon glyphicon-remove"></i></button>
                  </td>
                </tr>
               <?php }
            }else{
              echo "<tr><td colspan=5>Tidak ada data</td></tr>";
            }
          ?>
        </tbody>
    </table>
  </div>

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

  <script src="<?=base_url('assets/plugins/jQuery/jquery-2.2.3.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/select2.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/DataTables/datatables.min.js')?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#table_id').DataTable();
      $('#nis').select2();
    });

    function getData(id) {
      $.ajax({
        url: "<?=base_url('user_system/get')?>/" +id,
        method: "GET",
        dataType: "JSON",
        success: function(data) {
          console.log(data);
          $('#nama_user_system').text(data.username);
          $('[name="id_user_system"]').val(data.id_user);
          $('#myModalDelete').modal('show');
        },error:function(a,s,d) {
          alert("Error get data from ajax");
        }
      });
    }

    function get(id) {
      
      $.ajax({
      url: "<?=base_url('user_system/get')?>/" +id,
      method: "GET",
      dataType: "JSON",
      success: function(data) {
        console.log(data);
        $('[name="id_user"]').val(data.id_user);
        $('[name="nis"]').val(data.nis);
        $('[name="username"]').val(data.username);
        $('[name="password"]').val(data.password);
        $('[name="hak_akses"]').val(data.hak_akses);
        $('[name="status"]').val(data.status);
        $('#btn-tambah').hide();
        $('#btn-ubah').show();
        $('#form-user').modal('show');
      },error:function(a,s,d) {
        alert("Error get data from ajax");
      }
    });
  }
  </script>
</section>

<div class="modal fade" role="dialog" id="form-user" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Registrasi Pengguna</h4>
        </div>
      <center><p id="view_pesan" role="alert"></p></center>
      <form action="<?=base_url('adduser')?>" method="post">
        <table class="table">
        <tr>
          <td><input class="form-control" type="hidden" name="id_user" value=""></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>
            <select name="nis" id="nis" class="form-control">
              <?php foreach ($nis as $n) { ?>
                <option value="<?=$n->nis?>"><?=$n->nama?></b></option>
              <?php } ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Username</td>
          <td><input class="form-control" type="text" name="username" placeholder="Username"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input class="form-control" type="password" name="password" placeholder="Password"></td>
        </tr>
        <tr>
          <td>Hak Akses</td>
          <td>
            <select name="hak_akses" class="form-control">
              <?php foreach ($hak_akses as $hak) { ?>
                <option value="<?=$hak->id_hak_akses?>"><?=$hak->hak_akses?></option>
              <?php } ?>
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
            <button type="submit" name="simpan" id="btn-tambah" class="btn btn-success">Simpan</button>
            <button type="button" id="btn-ubah" class="btn btn-primary" style="display: none;">Simpan Perubahan</button>
            <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
          </td>
        </tr>                                   
      </table>
      </form>
    </div>
  </div>
</div>