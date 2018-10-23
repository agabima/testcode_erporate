<style type="text/css">
.halaman
 {
 margin:10px;
 font-size:10px;
 }

.halaman a
 {
 padding:5px;
 background:#990000;
 -moz-border-radius:5px;
 -webkit-border-radius:5px;
 border:1px solid #FFA500;
 font-size:10px;
 font-weight:bold;
 color:#FFF;
 text-decoration:none;
}
</style>
<?php

$sestransaksi = $this->session->userdata('sespesanan');
if ($sestransaksi!="") {
$periode_awal = $sestransaksi["periode_awal"];
$periode_akhir = $sestransaksi["periode_akhir"];
$field1 = $sestransaksi["field1"];
$field2 = $sestransaksi["field2"];
$penghubung1 = $sestransaksi["penghubung1"];
$penghubung2 = $sestransaksi["penghubung2"];
$katakunci1 = $sestransaksi["katakunci1"];
$katakunci2 = $sestransaksi["katakunci2"];
$tgl1=date("m/d/Y",strtotime($periode_awal));
$tgl2=date("m/d/Y",strtotime($periode_akhir));
//var_dump($tgl1);
// die();
}

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       PESANAN
        <!--<small>preview of simple tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'admin/dashboardct';?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">PESANAN</li>
      </ol>
       <!-- /.box-header -->
       <form action="<?php echo site_url('admin/pesananct')?>" method="post">
        <div class="box-body"> 
         <!-- /.row -->
          <div class="row">
            <div class="col-md-8 col-sm-6">              
              <div class="form-group">
                <label>Date range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation" name="rangeTanggal" value="<?=$tgl1." - ".$tgl2?>">
                </div>
                <!-- /.input group -->
              </div>     
            </div>             
            </div>       
          <div class="row">
            <div class="col-md-3 col-sm-6">              
              <div class="form-group">
                <label for="field1">Pencarian Berdasarkan</label>
                <select name="field1" class="form-control">
                  <option value="nopesanan" <?=($field1=="nopesanan" ? "selected" : "") ?> >nopesanan</option>
<option value="idmakanan" <?=($field1=="idmakanan" ? "selected" : "") ?> >idmakanan</option>
<option value="idminuman" <?=($field1=="idminuman" ? "selected" : "") ?> >idminuman</option>
<option value="jumlah" <?=($field1=="jumlah" ? "selected" : "") ?> >jumlah</option>
<option value="statuspesanan" <?=($field1=="statuspesanan" ? "selected" : "") ?> >statuspesanan</option>
<option value="tglupdate" <?=($field1=="tglupdate" ? "selected" : "") ?> >tglupdate</option>
<option value="opupdate" <?=($field1=="opupdate" ? "selected" : "") ?> >opupdate</option>
	
                  </select>
              </div>             
            </div>
            <div class="col-md-2 col-sm-6">
              <div class="form-group">
                <label for="penghubung1"><br/></label>
                <select name="penghubung1" class="form-control">
                  <option value="LIKE" <?=($penghubung1=="LIKE" ? "selected" : "") ?>>LIKE</option>
                  <option value="NOT LIKE" <?=($penghubung1=="NOT LIKE" ? "selected" : "") ?>>NOT LIKE</option>
                  <option value="=" <?=($penghubung1=="=" ? "selected" : "") ?>>=</option>
                  <option value=">" <?=($penghubung1==">" ? "selected" : "") ?>>></option>
                  <option value="<" <?=($penghubung1=="<" ? "selected" : "") ?>><</option>
                  <option value="<>" <?=($penghubung1=="<>" ? "selected" : "") ?>><></option>
                </select>
              </div> 
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="form-group">
                <label for="hpref"><br/></label>
                <input type="text" placeholder="Kata Kunci" class="form-control" name="katakunci1" value="<?=$katakunci1?>">
              </div>                     
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-3 col-sm-6">              
              <div class="form-group">
                <label for="field2">Dan</label>
                <select name="field2" class="form-control">                 
                        <option value="nopesanan" <?=($field2=="nopesanan" ? "selected" : "") ?> >nopesanan</option>
<option value="idmakanan" <?=($field2=="idmakanan" ? "selected" : "") ?> >idmakanan</option>
<option value="idminuman" <?=($field2=="idminuman" ? "selected" : "") ?> >idminuman</option>
<option value="jumlah" <?=($field2=="jumlah" ? "selected" : "") ?> >jumlah</option>
<option value="statuspesanan" <?=($field2=="statuspesanan" ? "selected" : "") ?> >statuspesanan</option>
<option value="tglupdate" <?=($field2=="tglupdate" ? "selected" : "") ?> >tglupdate</option>
<option value="opupdate" <?=($field2=="opupdate" ? "selected" : "") ?> >opupdate</option>
	
                  </select>
              </div>             
            </div>
            <div class="col-md-2 col-sm-6">
              <div class="form-group">
                <label for="hpref"><br/></label>
                <select name="penghubung2" class="form-control">
                 <option value="LIKE" <?=($penghubung2=="LIKE" ? "selected" : "") ?>>LIKE</option>
                  <option value="NOT LIKE" <?=($penghubung2=="NOT LIKE" ? "selected" : "") ?>>NOT LIKE</option>
                  <option value="=" <?=($penghubung2=="=" ? "selected" : "") ?>>=</option>
                  <option value=">" <?=($penghubung2==">" ? "selected" : "") ?>>></option>
                  <option value="<" <?=($penghubung2=="<" ? "selected" : "") ?>><</option>
                  <option value="<>" <?=($penghubung2=="<>" ? "selected" : "") ?>><></option>
                </select>
              </div> 
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="form-group">
                <label for="hpref"><br/></label>
                <input type="text" placeholder="Kata Kunci" class="form-control" name="katakunci2" value="<?=$katakunci2?>">
                
              </div> 

            </div>
            
            <div class="col-md-1 col-sm-6">
              <div class="form-group">
                <label for="hpref"><br/></label>
                <button type="submit" class="pull-right btn btn-default" id="cari">Cari
                <i class="fa fa-search"></i></button>
                
              </div> 
            </div>            
            </div>
          </div>
          <!-- /.row -->

          </form>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
              <?php   
              if ($this->Usersinmd->ishakok($username,'tpesanan'))
                { ?>
             <button type="button" class="btn bg-navy margin" onclick="location.href='<?php echo site_url('admin/pesananct/tambah');?>'">
                <i class="fa fa-fw fa-plus-square"></i> 
                  <b>Tambah PESANAN</b>
              </button>
              <?php } ?>
              <button type="button" class="btn bg-olive margin" onclick="location.href='<?php echo site_url('admin/pesananct/excel/0');?>'" target="_blank">
                <i class="fa fa-fw fa-file-excel-o"></i> 
                  <b>Export Excel</b>
              </button>
                        
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-bordered">
                <tr>
                  <th>No</th>
                				<th field="tglpesan">tglpesan</th>
				<th field="nopesanan">nopesanan</th>
				<th field="idmakanan">idmakanan</th>
				<th field="idminuman">idminuman</th>
				<th field="jumlah">jumlah</th>
				<th field="statuspesanan">statuspesanan</th>
				<th field="tglupdate">tglupdate</th>
				<th field="opupdate">opupdate</th>
                    
                  <th class="pull-center">Aksi</th>
                </tr>
               
                <?php
                //$no = 1;
                foreach ($query as $hasil) 
                {
                  ?>
                   <tr>
                   <td><?php echo $number++;?></td>
                    <td><?=$hasil->tglpesan?></td>
<td><?=$hasil->nopesanan?></td>
<td><?=$hasil->idmakanan?></td>
<td><?=$hasil->idminuman?></td>
<td><?=$hasil->jumlah?></td>
<td><?=$hasil->statuspesanan?></td>
<td><?=$hasil->tglupdate?></td>
<td><?=$hasil->opupdate?></td>

                       <td> <div class="btn-group">
                         <?php   
              if ($this->Usersinmd->ishakok($username,'upesanan'))
                { ?>
                  <a class="btn btn-default btn-sm" href="<?php echo base_url().'admin/pesananct/ubah/'.$hasil->idx.'';?>"><i class="fa fa-pencil-square-o"></i></a>
                    <?php } ?>
                    <?php   
              if ($this->Usersinmd->ishakok($username,'hpesanan'))
                { ?>
                  <a onclick="return konfirmasi()" class="btn btn-default btn-sm" href="<?php echo base_url().'admin/pesananct/hapus/'.$hasil->idx.'';?>"><i class="fa fa-trash-o"></i></a>
                <?php } ?>
                </div></td>
                  </tr>
                  <?php
                }
                ?>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
            <form action="<?=base_url().'admin/pesananct'?>" name="fperpage" method="post"> <input type="text" name="perpage" value="<?=$perpage?>" size="2" onblur="fperpage.submit()"> per page
<ul class="pagination pagination-sm no-margin pull-right">
            <!--
            <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
              -->  
              <?php echo $halaman;?>                
              </ul>
</form>                
            </div>
          </div>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
   <script type="text/javascript">

function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57)) 
        return false;
      return true;
    }
 function konfirmasi()
 {
 tanya = confirm("Apakah Anda Yakin Akan Menghapus Data ini?");
 if (tanya == true) return true;
 else return false;
 }
  </script>
