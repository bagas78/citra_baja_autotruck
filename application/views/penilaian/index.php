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
               <span class="bg-navy" style="padding: 0.5%; color: white;" align="center">Perhitungan Metode AHP</span>
            </div>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

         <form method="POST" action="">

          <!--kriteria-->

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>KRITERIA</th>
                <?php foreach ($kriteria_data as $key): ?>
                  <td><?php echo $key['kriteria_title'] ?></td>
                <?php endforeach ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($kriteria_data as $key): ?>
              <tr>
                <td><?php echo $key['kriteria_title'] ?></td>

                <?php foreach ($kriteria_data as $val): ?>

                  <?php if ($key['kriteria_id'] == $val['kriteria_id']): ?>
                    <td><input required="" step="0.01" readonly="" id="<?php echo str_replace(' ','_', $key['kriteria_title']).'_'.str_replace(' ','_',$val['kriteria_title']) ?>" class="form-control <?php echo str_replace(' ','_', $val['kriteria_title']) ?>" type="number" name="" value="1"></td>
                  <?php else: ?>
                    <td><input required="" step="0.01" class="form-control <?php echo str_replace(' ','_',$val['kriteria_title']) ?>" type="number" name="" id="<?php echo str_replace(' ','_', $key['kriteria_title']).'_'.str_replace(' ','_',$val['kriteria_title']) ?>" onchange="kriteria('<?php echo str_replace(' ','_',$val['kriteria_title']).'_'.str_replace(' ','_',$key['kriteria_title']) ?>',this.value)"></td>  
                  <?php endif ?>
                    
                <?php endforeach ?>
                
              </tr>
              <?php endforeach ?>
              <tr>
                <th>JUMLAH</th>
                <?php foreach ($kriteria_data as $jml): ?>
                  <td><input id="<?php echo 'jum_'.str_replace(' ','_',$jml['kriteria_title']) ?>" class="form-control" readonly="" type="number" name="" value=""></td>
                <?php endforeach ?>
              </tr>
            </tbody>
          </table>

          <table class="table table-bordered" hidden="">
            <thead>
              <tr>
              <?php foreach ($kriteria_data as $key): ?>
                <th><?php echo $key['kriteria_title'] ?></th>
              <?php endforeach ?>
                <th>Jumlah</th>
                <th>Rata - Rata</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($kriteria_data as $key): ?>
                <tr>
                  <?php foreach ($kriteria_data as $v): ?>

                  <?php $s1 = str_replace(' ','_',$key['kriteria_title']); ?>
                  <?php $s2 = str_replace(' ','_',$v['kriteria_title']); ?>

                  <td><input readonly="" class="form-control eigen_<?php echo $s1 ?>" id="<?php echo 'eigen_'.$s1.'_'.$s2 ?>" type="number" name=""></td>
                  <?php endforeach ?>

                  <td><input readonly="" class="form-control" id="<?php echo 'jumlah_eigen_'.$s1 ?>" type="number" name=""></td>

                  <td><input readonly="" class="form-control" id="<?php echo 'rata_rata_'.$s1 ?>" type="number" name=""></td>

                </tr>
              <?php endforeach ?>
            </tbody>
          </table>

          <div id="lamda"></div>

            <div class="col-xs-6 row">
              <table class="table table-bordered" hidden="">
                <tbody>
                  <tr>
                    <th style="width:50%">Lamda Max</th>
                    <td><input class="form-control" type="number" readonly="" id="lamda_max" name=""></td>
                  </tr>
                  <tr>
                    <th style="width:50%">CI</th>
                    <td><input class="form-control" type="number" readonly="" id="ci" name=""></td>
                  </tr>
                  <tr>
                    <th style="width:50%">CR</th>
                    <td><input class="form-control" type="number" readonly="" id="cr" name=""></td>
                  </tr>
                </tbody>
              </table>
            </div>

          <div class="clearfix"></div>

          <hr><h4 align="center" class="text-navy"><b>-- SUB KRITERIA --</b></h4><hr>

          <!--alternatif-->

          <?php foreach ($kriteria_data as $kriteria): ?>

           <table class="table table-bordered">
            <thead>
              <tr>
                <th><?php echo strtoupper($kriteria['kriteria_title']) ?></th>
                <?php foreach ($sub_data as $key): ?>

                  <?php if ($kriteria['kriteria_id'] == $key['sub_kriteria']): ?>
                  
                  <td><?php echo $key['sub_title'] ?></td>

                  <?php endif ?>

                <?php endforeach ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($sub_data as $key): ?>

              <?php if ($kriteria['kriteria_id'] == $key['sub_kriteria']): ?>

                <tr>
                  <td><?php echo $key['sub_title'] ?></td>

                  <?php foreach ($sub_data as $val): ?>

                    <?php if ($kriteria['kriteria_id'] == $val['sub_kriteria']): ?>

                      <?php if ($key['sub_id'] == $val['sub_id']): ?>
                        <td><input required="" step="0.01" readonly="" id="<?php echo str_replace(' ','_',$kriteria['kriteria_title']).'_'.str_replace(' ','_',$key['sub_title']).'_'.str_replace(' ','_',$val['sub_title']) ?>" class="form-control <?php echo str_replace(' ','_',$kriteria['kriteria_title']).'_'.str_replace(' ','_',$val['sub_title']) ?>" type="number" name="" value="1"></td>
                      <?php else: ?>
                        <td><input required="" step="0.01" class="form-control <?php echo str_replace(' ','_',$kriteria['kriteria_title']).'_'.str_replace(' ','_',$val['sub_title']) ?>" type="number" name="" id="<?php echo str_replace(' ','_',$kriteria['kriteria_title']).'_'.str_replace(' ','_',$key['sub_title']).'_'.str_replace(' ','_',$val['sub_title']) ?>" onchange="kriteria('<?php echo str_replace(' ','_',$kriteria['kriteria_title']).'_'.str_replace(' ','_',$val['sub_title']).'_'.str_replace(' ','_',$key['sub_title']) ?>',this.value)"></td>  
                      <?php endif ?>

                    <?php endif ?>
                      
                  <?php endforeach ?>
                  
                </tr>

              <?php endif ?>

              <?php endforeach ?>

              <tr>
                <th>JUMLAH</th>
                <?php foreach ($sub_data as $jml): ?>

                  <?php if ($kriteria['kriteria_id'] == $jml['sub_kriteria']): ?>

                    <td><input id="<?php echo 'jum_'.str_replace(' ','_',$kriteria['kriteria_title']).'_'.str_replace(' ','_',$jml['sub_title']) ?>" class="form-control" readonly="" type="number" name="" value=""></td>

                  <?php endif ?>

                <?php endforeach ?>
              </tr>

            </tbody>
          </table>

          <table class="table table-bordered" hidden="">
            <thead>
              <tr>
              <?php foreach ($sub_data as $key): ?>
                <?php if ($kriteria['kriteria_id'] == $key['sub_kriteria']): ?>

                <th><?php echo $key['sub_title'] ?></th>
                
                <?php endif ?>

              <?php endforeach ?>
                <th>Jumlah</th>
                <th>Rata - Rata</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($sub_data as $key): ?>

                <?php if ($kriteria['kriteria_id'] == $key['sub_kriteria']): ?>

                  <tr>
                    <?php foreach ($sub_data as $v): ?>

                    <?php if ($kriteria['kriteria_id'] == $v['sub_kriteria']): ?>

                      <?php $s1 = str_replace(' ','_',$kriteria['kriteria_title']); ?>
                      <?php $p1 = str_replace(' ','_',$key['sub_title']); ?>
                      <?php $p2 = str_replace(' ','_',$v['sub_title']); ?>

                      <td><input readonly="" class="form-control <?php echo $s1 ?>_eigen_<?php echo $p1 ?>" id="<?php echo $s1.'_eigen_'.$p1.'_'.$p2 ?>" type="number" name=""></td>
                    
                    <?php endif  ?>

                    <?php endforeach ?>

                      <td><input readonly="" class="form-control" id="<?php echo $s1.'_jumlah_eigen_'.$p1 ?>" type="number" name=""></td>

                      <td><input readonly="" class="form-control" id="<?php echo $s1.'_rata_rata_'.$p1 ?>" type="number" name=""></td>

                  </tr>

              <?php endif  ?>

              <?php endforeach ?>
            </tbody>
          </table>

          <div id="<?php echo $s1 ?>_lamda"></div>

            <div class="col-xs-6 row">
              <table class="table table-bordered" hidden="">
                <tbody>
                  <tr>
                    <th style="width:50%">Lamda Max</th>
                    <td><input class="form-control" type="number" readonly="" id="<?php echo $s1 ?>_lamda_max" name=""></td>
                  </tr>
                  <tr>
                    <th style="width:50%">CI</th>
                    <td><input class="form-control" type="number" readonly="" id="<?php echo $s1 ?>_ci" name=""></td>
                  </tr>
                  <tr>
                    <th style="width:50%">CR</th>
                    <td><input class="form-control" type="number" readonly="" id="<?php echo $s1 ?>_cr" name=""></td>
                  </tr>
                </tbody>
              </table>
            </div>

          <?php endforeach ?>

          <div class="clearfix"></div>

          <hr><h4 align="center" class="text-navy"><b>-- PENILAIAN ALTERNATIF --</b></h4><hr>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Penilaian</th>
                <?php foreach ($kriteria_data as $key): ?>
                <td><?php echo $key['kriteria_title']; ?></td>
                <?php endforeach ?>
              </tr>
            </thead> 
            <tbody>
              <?php foreach ($karyawan_data as $key): ?>
              <tr>
                <td><?php echo $key['karyawan_nama']; ?></td>

                  <?php foreach ($kriteria_data as $k): ?>

                    <?php $kri = str_replace(' ','_',$k['kriteria_title']) ?>
                    <?php $pen = str_replace(' ','_',$key['karyawan_nama']) ?>

                    <td>
                      <select class="form-control" id="penilaian_<?php echo $pen.'_'.$kri ?>" required="">

                      <?php foreach ($sub_data as $s): ?>

                        <?php $sub = str_replace(' ','_',$s['sub_title']) ?>

                        <?php if ($k['kriteria_id'] == $s['sub_kriteria']): ?>
                          
                            <option value="<?php echo $kri."_rata_rata_".$sub.",rata_rata_".$kri ?>"><?php echo $s['sub_title'] ?></option>

                        <?php endif ?>
                      <?php endforeach ?>

                      </select>
                    </td>
                  <?php endforeach ?>

              </tr>
              <?php endforeach ?>
            </tbody>
          </table>

          <table class="table table-bordered" hidden="">
            <thead>
              <tr>
                <?php foreach ($karyawan_data as $key): ?>
                  <td><?php echo $key['karyawan_nama'] ?></td>
                <?php endforeach ?>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($kriteria_data as $kri): ?>
                <tr>
                  <?php foreach ($karyawan_data as $key): ?>

                    <?php $k = str_replace(' ','_',$kri['kriteria_title']); ?>
                    <?php $p = str_replace(' ','_',$key['karyawan_nama']); ?>

                    <td><input id="nilai_<?php echo $k.'_'.$p?>" class="form-control nilai_<?php echo $p?>" type="text" name="" readonly="" style="background-color: white;"></td>
                  <?php endforeach ?>
                </tr>

              <?php endforeach ?>

              <tr>
                <?php foreach ($karyawan_data as $key): ?>
                  <?php $p = str_replace(' ','_',$key['karyawan_nama']); ?>
                    <td><input id="sum_nilai_<?php echo $p?>" class="form-control" type="text" name="" readonly=""></td>
                  <?php endforeach ?>
              </tr>

            </tbody>
          </table>

          <div class="clearfix"></div>

          <hr>
         
          <div id="hasil_title"></div>
          <table class="table table-bordered"><tbody id="hasil"></tbody></table>

          <button type="button" onclick="proses()" class="btn btn-primary"><i class="fa fa-gear fa-spin"></i> Proses</button>
          <button type="button" disabled="" onclick="window.print()" id="print" class="btn btn-danger"><i class="fa fa-print"></i> Cetak</button>

         </form>
        </div>

        
      </div>
      <!-- /.box -->

<script type="text/javascript">
  function kriteria(id,val){

    var num = 1/val;
    $('#'+id).val(num.toFixed(3));

    //sum total kriteria
    <?php foreach ($kriteria_data as $key): ?>
       
      var sum_<?php echo str_replace(' ','_',$key['kriteria_title']) ?> = 0;        
      $(".<?php echo str_replace(' ','_',$key['kriteria_title']) ?>").each(function() 
      { 
        if(!isNaN(this.value) && this.value.length!=0) 
        {
          sum_<?php echo str_replace(' ','_',$key['kriteria_title']) ?> += parseFloat(this.value);            
        }         
      });

      $('#jum_<?php echo str_replace(' ','_',$key['kriteria_title']) ?>').val(sum_<?php echo str_replace(' ','_',$key['kriteria_title']) ?>);

    <?php endforeach ?>


    //sum total alternatif
    <?php foreach ($kriteria_data as $key): ?>

      <?php foreach ($sub_data as $p): ?>

        <?php if($key['kriteria_id'] == $p['sub_kriteria']): ?>
        
        var sum_<?php echo str_replace(' ','_',$key['kriteria_title']).'_'.str_replace(' ','_',$p['sub_title']) ?> = 0;        
        $(".<?php echo str_replace(' ','_',$key['kriteria_title']).'_'.str_replace(' ','_',$p['sub_title']) ?>").each(function() 
        { 
          if(!isNaN(this.value) && this.value.length!=0) 
          {
            sum_<?php echo str_replace(' ','_',$key['kriteria_title']).'_'.str_replace(' ','_',$p['sub_title']) ?> += parseFloat(this.value);            
          }         
        });

        //sum alternatif
        <?php foreach ($sub_data as $p): ?>

          <?php if($key['kriteria_id'] == $p['sub_kriteria']): ?>

          $('#jum_<?php echo str_replace(' ','_',$key['kriteria_title']).'_'.str_replace(' ','_',$p['sub_title']) ?>').val(sum_<?php echo str_replace(' ','_',$key['kriteria_title']).'_'.str_replace(' ','_',$p['sub_title']) ?>);

          <?php endif ?>

        <?php endforeach ?>

        <?php endif ?>

      <?php endforeach ?>

    <?php endforeach ?>
    
  }

  function proses(){

    ///////////////////-- KRITERIA --////////////////////////
    $('#lamda').empty();
    $('#rangking').empty();

    //buka hidden
    $('#print').removeAttr('disabled');
    $('table').removeAttr('hidden');

    <?php foreach ($kriteria_data as $s1): ?>

      <?php foreach ($kriteria_data as $s2): ?>
          
        //replace variable
        <?php $sub1 = str_replace(' ','_',$s1['kriteria_title']) ?>
        <?php $sub2 = str_replace(' ','_',$s2['kriteria_title']) ?>
          
        <?php if ($s1 == $s2): ?>

          //sama
          var num = $('#<?php echo $sub1.'_'.$sub2 ?>').val() / $('#<?php echo 'jum'.'_'.$sub2 ?>').val();
          $('#eigen_<?php echo $sub1.'_'.$sub2 ?>').val(num.toFixed(3));

        <?php else: ?>
          
          //tidak sama
          var num = $('#<?php echo $sub1.'_'.$sub2 ?>').val() / $('#<?php echo 'jum'.'_'.$sub2 ?>').val();
          $('#eigen_<?php echo $sub1.'_'.$sub2 ?>').val(num.toFixed(3));

        <?php endif ?>

      <?php endforeach ?>

      //sum eigen
      var sum_<?php echo $sub1 ?> = 0;        
        $(".eigen_<?php echo $sub1 ?>").each(function() 
        { 
          if(!isNaN(this.value) && this.value.length!=0) 
          {
            sum_<?php echo $sub1 ?> += parseFloat(this.value);            
          }         
        });

      var sumX = sum_<?php echo $sub1 ?>;
      $('#jumlah_eigen_<?php echo $sub1 ?>').val(sumX.toFixed(3));

      //rata-rata eigen
      var rata = sumX / <?php echo count($kriteria_data) ?>;
      $('#rata_rata_<?php echo $sub1 ?>').val(rata.toFixed(3));

      //lamda max
      var lamda = $('#jum_<?php echo $sub1 ?>').val() * $('#rata_rata_<?php echo $sub1 ?>').val();
      $('#lamda').append('<input type="text" hidden class="lamda" value="'+lamda.toFixed(3)+'"></input>');

      var sum_lamda = 0;        
        $(".lamda").each(function() 
        { 
          if(!isNaN(this.value) && this.value.length!=0) 
          {
            sum_lamda += parseFloat(this.value);            
          }         
        });

        $('#lamda_max').val(sum_lamda.toFixed(3));

      //CI
      var ci = (sum_lamda.toFixed(3) - <?php echo count($kriteria_data) ?>) / (<?php echo count($kriteria_data) ?> - 1);
      $('#ci').val(ci.toFixed(3));

      //CR
      var ir = ['','0','0','0.58','0.9','1.12','1.24','1.32','1.41','1.45','1.49','1.51','1.48','1.56','1.57','1.59'];

      var cr = ci.toFixed(3) / ir[<?php echo count($kriteria_data) ?>];
      $('#cr').val(cr.toFixed(3));

    <?php endforeach ?>

    //////////////////////-- END --//////////////////////////


    ///////////////////////////-- SUB KRITERIA --//////////////////////////////

   <?php foreach ($kriteria_data as $s): ?>

    $('#<?php echo str_replace(' ','_',$s['kriteria_title']) ?>_lamda').empty();

      <?php foreach ($sub_data as $p1): ?>

      <?php if ($s['kriteria_id'] == $p1['sub_kriteria']): ?>

        <?php foreach ($sub_data as $p2): ?>
          
          //replace variable
          <?php $sub = str_replace(' ','_',$s['kriteria_title']) ?>
          <?php $pen1 = str_replace(' ','_',$p1['sub_title']) ?>
          <?php $pen2 = str_replace(' ','_',$p2['sub_title']) ?>
            
          <?php if ($pen1 == $pen2): ?>

            //sama
            var num = $('#<?php echo $sub.'_'.$pen1.'_'.$pen2 ?>').val() / $('#<?php echo 'jum'.'_'.$sub.'_'.$pen2 ?>').val();
            $('#<?php echo $sub ?>_eigen_<?php echo $pen1.'_'.$pen2 ?>').val(num.toFixed(3));

          <?php else: ?>
            
            //tidak sama
            var num = $('#<?php echo $sub.'_'.$pen1.'_'.$pen2 ?>').val() / $('#<?php echo 'jum'.'_'.$sub.'_'.$pen2 ?>').val();
            $('#<?php echo $sub ?>_eigen_<?php echo $pen1.'_'.$pen2 ?>').val(num.toFixed(3));
            

          <?php endif ?>

        <?php endforeach ?>

        //sum eigen
        var sum_<?php echo $pen1 ?> = 0;        
          $(".<?php echo $sub ?>_eigen_<?php echo $pen1 ?>").each(function() 
          { 
            if(!isNaN(this.value) && this.value.length!=0) 
            {
              sum_<?php echo $pen1 ?> += parseFloat(this.value);            
            }         
          });

        var sumX = sum_<?php echo $pen1 ?>;
        $('#<?php echo $sub ?>_jumlah_eigen_<?php echo $pen1 ?>').val(sumX.toFixed(3));

        //where
        <?php $krid = $s['kriteria_id']; $co = $this->db->query("SELECT * FROM t_sub WHERE sub_kriteria = '$krid'")->num_rows(); ?>

        //rata-rata eigen
        var rata = sumX / <?php echo $co; ?>;
        $('#<?php echo $sub ?>_rata_rata_<?php echo $pen1 ?>').val(rata.toFixed(3));

        //lamda max
        var lamda = $('#jum_<?php echo $sub ?>_<?php echo $pen1 ?>').val() * $('#<?php echo $sub ?>_rata_rata_<?php echo $pen1 ?>').val();
        $('#<?php echo $sub ?>_lamda').append('<input type="text" hidden class="<?php echo $sub ?>_lamda" value="'+lamda.toFixed(3)+'"></input>');

        var sum_lamda = 0;        
          $(".<?php echo $sub ?>_lamda").each(function() 
          { 
            if(!isNaN(this.value) && this.value.length!=0) 
            {
              sum_lamda += parseFloat(this.value);            
            }         
          });

          $('#<?php echo $sub ?>_lamda_max').val(sum_lamda.toFixed(3));

        //kriteria id
        <?php 
          $kid = $s['kriteria_id']; 
          $xv = $this->db->query("SELECT * FROM t_sub WHERE sub_kriteria = '$kid'")->result_array();
        ?>


        //CI
        var ci = (sum_lamda.toFixed(3) - <?php echo count($xv) ?>) / (<?php echo count($xv) ?> - 1);
        $('#<?php echo $sub ?>_ci').val(ci.toFixed(3));

        //CR
        var ir = ['','0','0','0.58','0.9','1.12','1.24','1.32','1.41','1.45','1.49','1.51','1.48','1.56','1.57','1.59'];

        var cr = ci.toFixed(3) / ir[<?php echo count($xv) ?>];
        $('#<?php echo $sub ?>_cr').val(cr.toFixed(3));

      <?php endif ?>
 
      <?php endforeach ?>

    <?php endforeach ?>



    <?php foreach ($karyawan_data as $p): ?>
      
      <?php foreach ($kriteria_data as $k): ?>
        
        <?php $pen = str_replace(' ','_',$p['karyawan_nama']) ?>
        <?php $kri = str_replace(' ','_',$k['kriteria_title']) ?>

        var x = $('#penilaian_<?php echo $pen.'_'.$kri ?>').val();

        //array
        var a = x.split(',');

        var jum = $('#'+a[0]).val() * $('#'+a[1]).val();

        $('#nilai_<?php echo $kri.'_'.$pen ?>').val(jum.toFixed(3));

      <?php endforeach ?>

      //sum jumlah nilai
      var sum_<?php echo $pen ?> = 0;        
        $(".nilai_<?php echo $pen ?>").each(function() 
        { 
          if(!isNaN(this.value) && this.value.length!=0) 
          {
            sum_<?php echo $pen ?> += parseFloat(this.value);            
          }         
        });

        var v = sum_<?php echo $pen ?>;
        $('#sum_nilai_<?php echo $pen ?>').val(v.toFixed(3));


        //save
        $('#hasil').empty();
        $('#hasil_title').empty();

        $.ajax({
          url : "<?php echo base_url('penilaian/save_rangking') ?>",
          method : "POST",
          data : {'rangking_nilai':sum_<?php echo $pen ?>,'rangking_karyawan':'<?php echo $p['karyawan_id'] ?>'},
          async : false,
          dataType : 'json',
          success: function(data){
            //keluarkan rangking
            $('#hasil_title').append('<b>HASIL RANGKING <i class="fa fa-trophy"></i></b>');
            var i = 1;
            $.each(data, function(index) {

            $('#hasil').append('<tr>'+
                                  '<td>'+i+'</td>'+
                                  '<td>'+data[index].karyawan_nama+'</td>'+
                                  '<td>'+data[index].rangking_nilai+'</td>'+
                                  '</tr>');
                      i++;
                  });

          }
        });

    <?php endforeach ?>


    //////////////////////-- END --///////////////////////////

  }
</script>