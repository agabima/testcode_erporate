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
        Form Ubah MINUMAN
        <!--<small>Preview</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'admin/dashboardct';?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url().'admin/minumanct';?>">MINUMAN</a></li>
        <li class="active">Ubah MINUMAN</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <form name="member" method="post" action="<?php echo base_url().'admin/minumanct/proses_ubah/'.$member->idx.'';?>">     
        <div class="box box-primary">
          
        <!-- /.box-header -->
         <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
          <div class="box-header with-border">
              <h3 class="box-title">Data MINUMAN</h3>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="form-group"><label>minuman</label>
<input name="minuman" class="form-control" type="text" id="minuman" value="<?php echo $member->minuman;?>" >
</div>
<div class="form-group"><label>harga_minuman</label>
<input name="harga_minuman" class="form-control" type="text" id="harga_minuman" value="<?php echo $member->harga_minuman;?>"  onKeyPress="return numeric_only(this, event)">
</div>

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
