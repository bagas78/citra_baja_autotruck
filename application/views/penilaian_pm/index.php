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
              <a href="<?php echo base_url('pm/penilaian_add') ?>"><button class="btn bg-navy"><i class="fa fa-plus"></i> Tambah Data</button></a>

              <a href="<?php echo base_url('pm/penilaian_rangking') ?>"><button class="btn bg-navy"><i class="fa fa-trophy"></i> Mulai Rangking</button></a>
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
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($data as $key): ?>
                                  
                  <tr>
                    <td><?php echo $key['karyawan_nama'] ?></td>
                    <td><?= ($key['total_nilai'] == '')?'Belum Di Rangking <i class="fa fa-times text-danger">':'Sudah Di Rangking <i class="fa fa-check text-success">' ?></i></td>
                    <td style="width: 50px;">
                      <div>
                      <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $key['matching_id'] ?>"><i class="fa fa-trash"></i></button>

                      </div>
                    </td>
                  </tr>

                   <!--modal hapus-->
                      <div class="modal fade" id="modalHapus<?php echo $key['matching_id'] ?>">
                        <div class="modal-dialog" align="center">
                          <div class="modal-content" style="max-width: 300px;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4>Confirmed ?</h4>
                              </div>
                            <div class="modal-body" align="center">
                               <a href="<?php echo base_url() ?>pm/penilaian_delete/<?php echo $key['matching_karyawan'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
                               <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
                            </div>
                          </div>
                        </div>
                       </div>
                <?php endforeach ?>

                </tfoot>
              </table>

        </div>

        
      </div>
      <!-- /.box -->