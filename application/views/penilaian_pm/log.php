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
            <a href="<?php echo base_url('pm/hasil_rangking') ?>"><button class="btn bg-navy"><i class="fa fa-chevron-left"></i> Back</button></a>
          </div>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

        <table class="table table-bordered table-striped">
          <tr>
            <td colspan="3" class="bg-primary" align="center"><b>Table Konversi</b></td>
          </tr>
          <tr>
            <th>Title</th>
            <th>Selisih</th>
            <th>Bobot</th>
          </tr>
          <?php foreach ($konversi_data as $kon): ?>
            <tr>
              <td><?php echo $kon['konversi_title'] ?></td>
              <td><?php echo $kon['konversi_selisih'] ?></td>
              <td><?php echo $kon['konversi_bobot_nilai'] ?></td>
            </tr>
          <?php endforeach ?>
        </table>

        <hr>

        <?php foreach ($karyawan_data as $kr): ?>
            
           <br/>

           <table class="table table-bordered">
             <tr>
               <td align="center" colspan="7" class="bg-success"><u><b><?php echo $kr['karyawan_nama'] ?></b></u></td>
             </tr>
           </table>

           <br/>

           <span class="bg-navy" style="padding: 0.2%;">Penilaian</span>

           <table class="table table-striped table-bordered">
             
             <tr>
               <th>Aspek</th>
               <th>Faktor</th>
               <th>Penilaian</th>
             </tr>

             <?php foreach ($penilaian_data as $pn): ?>

              <?php if ($kr['karyawan_id'] == $pn['penilaian_karyawan']): ?>
                
               <tr>
                 <td><?php echo $pn['aspek_title'] ?></td>
                 <td><?php echo $pn['faktor_title'] ?></td>
                 <td><?php echo $pn['penilaian_nilai'] ?></td>
               </tr>

              <?php endif ?>

             <?php endforeach ?>
             
           </table>

           <br/>

           <span class="bg-navy" style="padding: 0.2%;">GAP</span>

           <table class="table table-striped table-bordered">
             
             <tr>
               <th>Aspek</th>
               <th>Faktor</th>
               <th>GAP hasil</th>
             </tr>

             <?php foreach ($gap_data as $gap): ?>

              <?php if ($kr['karyawan_id'] == $gap['gap_karyawan']): ?>
                
               <tr>
                 <td><?php echo $gap['aspek_title'] ?></td>
                 <td><?php echo $gap['faktor_title'] ?></td>
                 <td><?php echo $gap['gap_hasil'] ?></td>
               </tr>

              <?php endif ?>

             <?php endforeach ?>
             
           </table>

           <br/>

           <span class="bg-navy" style="padding: 0.2%;">Hasil Konversi GAP</span>

           <table class="table table-striped table-bordered">
             
             <tr>
               <th>Aspek</th>
               <th>Faktor</th>
               <th>Hasil Konversi</th>
             </tr>

             <?php foreach ($gap_konversi_data as $gap_konversi): ?>

              <?php if ($kr['karyawan_id'] == $gap_konversi['hasil_konversi_karyawan']): ?>
                
               <tr>
                 <td><?php echo $gap_konversi['aspek_title'] ?></td>
                 <td><?php echo $gap_konversi['faktor_title'] ?></td>
                 <td><?php echo $gap_konversi['hasil_konversi_nilai'] ?></td>
               </tr>

              <?php endif ?>

             <?php endforeach ?>
             
           </table>

           <br/>

           <span class="bg-navy" style="padding: 0.2%;">Core Faktor & Secondary Faktor</span>

           <table class="table table-striped table-bordered">
             
             <tr>
               <th>Aspek</th>
               <th>Core Faktor</th>
               <th>Secondary Faktor</th>
               <th>Nilai</th>
             </tr>

             <?php foreach ($cfsf_data as $cfsf): ?>

              <?php if ($kr['karyawan_id'] == $cfsf['cfsf_karyawan']): ?>
                
               <tr>
                 <td><?php echo $cfsf['aspek_title'] ?></td>
                 <td><?php echo $cfsf['cfsf_cf'] ?></td>
                 <td><?php echo $cfsf['cfsf_sf'] ?></td>
                 <td><?php echo $cfsf['cfsf_nilai'] ?></td>
               </tr>

              <?php endif ?>

             <?php endforeach ?>
             
           </table>

           <br/>

           <span class="bg-navy" style="padding: 0.2%;">Hasil Profile Matching</span>

           <table class="table table-striped table-bordered">
             
             <tr>
               <th>Nilai Akhir</th>
             </tr>

             <?php foreach ($total_data as $tot): ?>

              <?php if ($kr['karyawan_id'] == $tot['total_karyawan']): ?>
                
               <tr>
                 <td><?php echo $tot['total_nilai'] ?></td>
               </tr>

              <?php endif ?>

             <?php endforeach ?>
             
           </table>

        <?php endforeach ?>
          
        </div>

        
      </div>
      <!-- /.box -->