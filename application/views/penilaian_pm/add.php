 <section class="content-header">
      <h1>
        <?php echo $title; ?>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section> 

    <!-- Main content --> 
    <section class="content">

    <?php if ($this->session->flashdata('gagal')): ?>
      <div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-close"></i>
        <?php echo $this->session->flashdata('gagal'); ?>
      </div>
    <?php endif ?>
 
    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-check"></i>
        <?php echo $this->session->flashdata('success'); ?>
      </div>
    <?php endif ?>

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

            <br/>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

          <form method="POST" action="<?php echo base_url('pm/penilaian_save') ?>">
            <div class="form-group col-md-12">
              <label>Karyawan</label>
              <select name="nama" class="form-control" required="" style="width: 40%;">
                <option value="" hidden="">-- Pilih --</option>
                <?php foreach ($karyawan_data as $kr): ?>
                  <option value="<?php echo $kr['karyawan_id'] ?>"><?php echo $kr['karyawan_nama'] ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <?php foreach ($aspek_data as $as): ?>
                  
                  <div class="form-group">
                    <label class="col-md-12"><?php echo $as['aspek_title'] ?></label>

                    <?php $i = 0; ?>
                    <?php foreach ($faktor_data as $fk): ?>
                      <?php if ($as['aspek_id'] == $fk['faktor_aspek']): ?>

                        <!--kode faktor-->
                        <input type="hidden" name="faktor<?php echo @$i ?>" value="<?php echo $fk['faktor_kode'] ?>">

                        <div class="col-md-8">
                          <input type="text" disabled="" class="form-control" value="<?php echo $fk['faktor_title'] ?>" style="margin-bottom: 1%;">
                        </div>
                        <div class="col-md-4">
                          <select class="form-control" required="" name="nilai<?php echo @$i ?>">
                            <option value="" hidden="">-- Nilai --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                        </div>
                      
                      <?php endif ?>
                    <?php $i++ ?>
                    <?php endforeach ?>

                  </div>

            <?php endforeach ?>

            <!--jumlah looping -->
            <input type="hidden" name="jumlah" value="<?php echo @$i ?>">

            <div class="form-group col-md-12" style="margin-top: 2%;">
              <button type="submit" class="btn btn-primary">Simpan <i class="fa fa-check"></i></button>
              <a href="<?php echo base_url('pm/penilaian') ?>"><button type="button" class="btn btn-danger">Batal <i class="fa fa-times"></i></button></a>
            </div>

          </form>

        </div>

        
      </div>
      <!-- /.box -->