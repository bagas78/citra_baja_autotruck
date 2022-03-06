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
              <button class="btn bg-navy" data-toggle="modal" data-target="#modal-album"><i class="fa fa-plus"></i> Tambah Data</button>
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
                  <th>NIK</th>
                  <th>Nama Karyawan</th>
                  <th>Departement</th>
                  <th>Jabatan</th>
                  <th>TTL</th>
                  <th>Alamat</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($data as $key): ?>
                                  
                  <tr>
                    <td><?php echo $key['karyawan_nik'] ?></td>
                    <td><?php echo $key['karyawan_nama'] ?></td>
                    <td><?php echo $key['karyawan_departement'] ?></td>
                    <td><?php echo $key['karyawan_jabatan'] ?></td>
                    <td><?php echo $key['karyawan_tempat_lahir'].', '.$key['karyawan_tanggal_lahir'] ?></td>
                    <td><?php echo $key['karyawan_alamat'] ?></td>
                    <td style="width: 50px;">
                      <div>
                      <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo $key['karyawan_id'] ?>"><i class="fa fa-edit"></i></button>
                      <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $key['karyawan_id'] ?>"><i class="fa fa-trash"></i></button>

                      </div>
                    </td>
                  </tr>

                   <!--modal hapus-->
                      <div class="modal fade" id="modalHapus<?php echo $key['karyawan_id'] ?>">
                        <div class="modal-dialog" align="center">
                          <div class="modal-content" style="max-width: 300px;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4>Confirmed ?</h4>
                              </div>
                            <div class="modal-body" align="center">
                               <a href="<?php echo base_url() ?>karyawan/delete/<?php echo $key['karyawan_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
                               <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
                            </div>
                          </div>
                        </div>
                       </div> 


                  <div class="modal fade" id="modal-edit<?php echo $key['karyawan_id'] ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Edit Data</h4>
                        </div>
                        <div class="modal-body">
                          <form role="form" method="post" action="<?php echo base_url() ?>karyawan/update/<?php echo $key['karyawan_id'] ?>" enctype="multipart/form-data">
                          <div class="box-body">
                            <div class="form-group">
                              <label>NIK</label>
                              <input required="" readonly="" value="<?= $key['karyawan_nik'] ?>" type="number" name="karyawan_nik" class="form-control" placeholder="NIK">
                            </div>
                            <div class="form-group">
                              <label>Nama</label>
                              <input required="" type="text" value="<?= $key['karyawan_nama'] ?>" name="karyawan_nama" class="form-control" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                              <label>Departement</label>
                              <input required="" type="text" value="<?= $key['karyawan_departement'] ?>" name="karyawan_departement" class="form-control" placeholder="Departement">
                            </div>
                            <div class="form-group">
                              <label>Jabatan</label>
                              <input required="" type="text" value="<?= $key['karyawan_jabatan'] ?>" name="karyawan_jabatan" class="form-control" placeholder="Jabatan">
                            </div>
                            <div class="form-group">
                              <label>Temopat Lahir</label>
                              <input required="" type="text" value="<?= $key['karyawan_tempat_lahir']  ?>" name="karyawan_tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                            </div>
                            <div class="form-group">
                              <label>Tanggal Lahir</label>
                              <input required="" type="date" value="<?= $key['karyawan_tanggal_lahir']  ?>" name="karyawan_tanggal_lahir" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Alamat</label>
                              <input required="" value="<?= $key['karyawan_alamat'] ?>" type="text" name="karyawan_alamat" class="form-control" placeholder="Alamat">
                            </div>
                          </div>
                          <!-- /.box-body -->

                            <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                               <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                          </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                <?php endforeach ?>

                </tfoot>
              </table>

        </div>

        
      </div>
      <!-- /.box -->


  <div class="modal fade" id="modal-album">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data</h4>
              </div>
              <div class="modal-body">
                <form role="form" method="post" action="<?php echo base_url() ?>karyawan/add" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label>NIK</label>
                      <input required="" type="number" name="karyawan_nik" class="form-control" placeholder="NIK">
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input required="" type="text" name="karyawan_nama" class="form-control" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                      <label>Departement</label>
                      <input required="" type="text" value="" name="karyawan_departement" class="form-control" placeholder="Departement">
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <input required="" type="text" value="" name="karyawan_jabatan" class="form-control" placeholder="Jabatan">
                    </div>
                    <div class="form-group">
                      <label>Temopat Lahir</label>
                      <input required="" type="text" name="karyawan_tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input required="" type="date" name="karyawan_tanggal_lahir" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <input required="" type="text" name="karyawan_alamat" class="form-control" placeholder="Alamat">
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                     <button type="reset" class="btn btn-danger">Reset</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  


    
      