<?php
$join = date("Y-m-d");
//var_dump($member->kolektor);
//die();
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Ubah PESANAN
        <!--<small>Preview</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'admin/dashboardct';?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url().'admin/pesananct';?>">PESANAN</a></li>
        <li class="active">Ubah PESANAN</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <form name="member" method="post" action="<?php echo base_url().'admin/pesananct/proses_ubah/'.$member->idx.'';?>">     
        <div class="box box-primary">
          
        <!-- /.box-header -->
         <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
          <div class="box-header with-border">
              <h3 class="box-title">Data PESANAN</h3>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="form-group"><label>tglpesan</label>
<div class="input-group date"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>  <input name="tglpesan" class="form-control pull-left" type="text" id="datepicker1" value="<?php echo date('m/d/Y', strtotime($member->tglpesan));?>" ></div>
</div>
<div class="form-group"><label>nopesanan</label>
<input name="nopesanan" class="form-control" type="text" id="nopesanan" value="<?php echo $member->nopesanan;?>" >
</div>
<div class="form-group"><label>idmakanan</label>
<select name="idmakanan" class="form-control select2" style="width: 100%;">
<option value="-">-- PILIH MAKANAN--</option>
<?php foreach ($qmakanan as $hasil) { ?>
<option value="<?php echo $hasil->idx;?>" <?=($hasil->idx==$member->idmakanan ? "selected" : "")?> ><?php echo $hasil->makanan;?></option>
<?php } ?>
</select>
</div>
<div class="form-group"><label>idminuman</label>
<select name="idminuman" class="form-control select2" style="width: 100%;">
<option value="-">-- PILIH MINUMAN--</option>
<?php foreach ($qminuman as $hasil) { ?>
<option value="<?php echo $hasil->idx;?>" <?=($hasil->idx==$member->idminuman ? "selected" : "")?> ><?php echo $hasil->minuman;?></option>
<?php } ?>
</select>
</div>
<div class="form-group"><label>jumlah</label>
<input name="jumlah" class="form-control" type="text" id="jumlah" value="<?php echo $member->jumlah;?>"  onKeyPress="return numeric_only(this, event)">
</div>
<div class="form-group"><label>statuspesanan</label>
<select name="statuspesanan" class="form-control select2" style="width: 100%;"><option value="Aktif" <?=($member->statuspesanan=="Aktif" ? "selected" : "")?>>Aktif</option>
<option value="Tidak Aktif" <?=($member->statuspesanan=="Tidak Aktif" ? "selected" : "")?>>Tidak Aktif</option>
</select></div>

            </div>
              
            </div>
          </div>
          <!-- /.row -->
        </div>
     <button type="submit" class="btn btn-primary">Simpan</button>
        <!-- /.col (right) -->
      
        </form>

      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
 
function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57)) 
        return false;
      return true;
    }
 function numeric_only(o,e){
  var whichCode = (window.Event) ? e.which : e.keyCode;
  if (whichCode==0 || whichCode==8){
    return true;
  }
  if ((whichCode < 48 || whichCode > 58)  && whichCode!=13 && whichCode!=45 && whichCode!=44 && whichCode!=46) {
    return false;
  }
}

  function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
