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
                  <th>Kode</th>
                  <th>Title</th>
                  <th>Bobot</th>
                  <th>CF</th>
                  <th>SF</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($data as $key): ?>
                                  
                  <tr>
                    <td><?php echo $key['aspek_kode'] ?></td>
                    <td><?php echo $key['aspek_title'] ?></td>
                    <td><?php echo $key['aspek_bobot'] ?></td>
                    <td><?php echo $key['aspek_cf'] ?></td>
                    <td><?php echo $key['aspek_sf'] ?></td>
                    <td style="width: 50px;">
                      <div>
                      <button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-edit<?php echo $key['aspek_id'] ?>"><i class="fa fa-edit"></i></button>
                      <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $key['aspek_id'] ?>"><i class="fa fa-trash"></i></button>

                      </div>
                    </td>
                  </tr>

                   <!--modal hapus-->
                      <div class="modal fade" id="modalHapus<?php echo $key['aspek_id'] ?>">
                        <div class="modal-dialog" align="center">
                          <div class="modal-content" style="max-width: 300px;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4>Confirmed ?</h4>
                              </div>
                            <div class="modal-body" align="center">
                               <a href="<?php echo base_url() ?>pm/delete_aspek/<?php echo $key['aspek_id'] ?>"><button class="btn btn-success" style="width: 49%;">Yes</button></a>
                               <button class="btn btn-danger" data-dismiss="modal" style="width: 49%;">No</button>
                            </div>
                          </div>
                        </div>
                       </div> 


                  <div class="modal fade" id="modal-edit<?php echo $key['aspek_id'] ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Edit Data</h4>
                        </div>
                        <div class="modal-body">
                          <form role="form" method="post" action="<?php echo base_url() ?>pm/update_aspek/<?php echo $key['aspek_id'] ?>" enctype="multipart/form-data">
                          <div class="box-body">
                            <div class="form-group">
		                      <label>Title</label>
		                      <input required="" type="text" name="aspek_title" class="form-control" placeholder="Title" value="<?php echo $key['aspek_title'] ?>">
		                    </div>
		                    <div class="form-group">
		                      <label>Bobot</label>
		                      <select id="bobot<?php echo $key['aspek_id'] ?>" required="" class="form-control" name="aspek_bobot">
		                      	<option value="" hidden="">-- Pilih --</option>
		                      	<?php for ($i=1; $i < 11; $i++): ?>
		                      		<option value="<?php echo $i.'0' ?>"><?php echo $i.'0' ?></option>
		                      	<?php endfor ?>
		                      	<script type="text/javascript">
		                      		$('#bobot<?php echo $key['aspek_id'] ?>').val(<?php echo $key['aspek_bobot'] ?>).change();
		                      	</script>
		                      </select>
		                    </div>
		                    <div class="form-group">
		                      <label>CF (Core factor)</label>
		                      <select id="cf<?php echo $key['aspek_id'] ?>" required="" class="form-control" name="aspek_cf">
		                      	<option value="" hidden="">-- Pilih --</option>
		                      	<?php for ($i=1; $i < 11; $i++): ?>
		                      		<option value="<?php echo $i.'0' ?>"><?php echo $i.'0' ?></option>
		                      	<?php endfor ?>
		                      	<script type="text/javascript">
		                      		$('#cf<?php echo $key['aspek_id'] ?>').val(<?php echo $key['aspek_cf'] ?>).change();
		                      	</script>
		                      </select>
		                    </div>
		                    <div class="form-group">
		                      <label>SF (Secondary factor)</label>
		                      <select id="sf<?php echo $key['aspek_id'] ?>" required="" class="form-control" name="aspek_sf">
		                      	<option value="" hidden="">-- Pilih --</option>
		                      	<?php for ($i=1; $i < 11; $i++): ?>
		                      		<option value="<?php echo $i.'0' ?>"><?php echo $i.'0' ?></option>
		                      	<?php endfor ?>
		                      	<script type="text/javascript">
		                      		$('#sf<?php echo $key['aspek_id'] ?>').val(<?php echo $key['aspek_sf'] ?>).change();
		                      	</script>
		                      </select>
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
                <form role="form" method="post" action="<?php echo base_url() ?>pm/add_aspek" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Title</label>
                      <input required="" type="text" name="aspek_title" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group">
                      <label>Bobot</label>
                      <select required="" class="form-control" name="aspek_bobot">
                      	<option value="" hidden="">-- Pilih --</option>
                      	<?php for ($i=1; $i < 11; $i++): ?>
                      		<option value="<?php echo $i.'0' ?>"><?php echo $i.'0' ?></option>
                      	<?php endfor ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>CF (Core factor)</label>
                      <select required="" class="form-control" name="aspek_cf">
                      	<option value="" hidden="">-- Pilih --</option>
                      	<?php for ($i=1; $i < 11; $i++): ?>
                      		<option value="<?php echo $i.'0' ?>"><?php echo $i.'0' ?></option>
                      	<?php endfor ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>SF (Secondary factor)</label>
                      <select required="" class="form-control" name="aspek_sf">
                      	<option value="" hidden="">-- Pilih --</option>
                      	<?php for ($i=1; $i < 11; $i++): ?>
                      		<option value="<?php echo $i.'0' ?>"><?php echo $i.'0' ?></option>
                      	<?php endfor ?>
                      </select>
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