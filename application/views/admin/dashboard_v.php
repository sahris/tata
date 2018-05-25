<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>
              <h4>Jumlah Suara</h4>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>
              <h4>Suara Masuk</h4>
            </div>
            <!-- <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>44<sup style="font-size: 20px">%</sup></h3>
              <h4>Suara Belum Masuk</h4>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <?php foreach ($data_calon as $key => $data): ?>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box bg-green">
              <span class="info-box-icon"><img style="width: 100px; height: auto;" src="<?=base_url('img_calon/').$data->foto_c_ket;?>"></span>
              <div class="info-box-content">
                <span class="info-box-text"><?=$data->c_ket.' dan '.$data->cw_ket;?></span>
                <span class="info-box-number">20<sup style="font-size: 10px">%</sup></span>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
      <!-- /.row (main row) -->
    </section>