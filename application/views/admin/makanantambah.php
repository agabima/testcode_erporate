<?php
$join = date("Y-m-d");

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Tambah MAKANAN
        <!--<small>Preview</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'admin/dashboardct';?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url().'admin/makananct';?>">MAKANAN</a></li>
        <li class="active">Tambah MAKANAN</li>
      </ol>
    </section>
     
    <!-- Main content -->
    <section class="content">
    <form name="member" method="post" action="<?php echo base_url().'admin/makananct/proses_tambah';?>">     
        <div class="box box-primary">

         
          
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
          <div class="box-header with-border">
              <h3 class="box-title">Data MAKANAN</h3>
            </div>
            <div class="col-md-4 col-sm-6">
			<div class="form-group"><label>makanan</label>
<input name="makanan" class="form-control" type="text" id="makanan" >
</div>
<div class="form-group"><label>harga_makanan</label>
<input name="harga_makanan" class="form-control" type="text" id="harga_makanan"  onKeyPress="return numeric_only(this, event)">
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
 function numeric_only(o,e){
  var whichCode = (window.Event) ? e.which : e.keyCode;
  if (whichCode==0 || whichCode==8){
    return true;
  }
  if ((whichCode < 48 || whichCode > 58) && whichCode!=45 && whichCode!=13 && whichCode!=44 && whichCode!=46) {
    return false;
  }
}
  </script>
