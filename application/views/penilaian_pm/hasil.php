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

            <div align="left">
              <a href="<?php echo base_url('pm/penilaian_log') ?>"><button class="btn bg-navy"><i class="fa fa-file-text"></i> Lihat Detail Perhitungan</button></a>
            </div>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         
          <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Rangking</th>
                  <th>Total Nilai</th>
                </tr>
                </thead>
                <tbody>

                <?php $i = 1; ?>
                <?php foreach ($data as $key): ?>
                                  
                  <tr>
                    <td><?php echo $key['karyawan_nama'] ?></td>
                    <td><?php echo $i ?></td>
                    <td><?php echo $key['total_nilai'] ?></td>
                  </tr>

                <?php $i++ ?>
                <?php endforeach ?>

                </tfoot>
              </table>

        </div>

        
      </div>
      <!-- /.box -->