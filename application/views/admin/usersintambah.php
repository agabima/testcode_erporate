<?php
$join = date("Y-m-d");

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Tambah USERSIN
        <!--<small>Preview</small>--> 
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'admin/dashboardct';?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url().'admin/usersinct';?>">USERSIN</a></li>
        <li class="active">Tambah USERSIN</li>
      </ol>
    </section>
      
    <!-- Main content -->
    <section class="content">
    <form name="member" method="post" action="<?php echo base_url().'admin/usersinct/proses_tambah';?>">     
        <div class="box box-primary">

         
          
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
          <div class="box-header with-border">
              <h3 class="box-title">Data USERSIN</h3>
            </div>
            <div class="col-md-4 col-sm-6">
			<div class="form-group"><label>username</label>
<input name="username" class="form-control" type="text" id="username" >
</div>
<div class="form-group"><label>nama</label>
<input name="nama" class="form-control" type="text" id="nama" >
</div>
<div class="form-group"><label>jabatan</label>
<input name="jabatan" class="form-control" type="text" id="jabatan" >
</div>
<div class="form-group"><label>password</label>
<input name="password" class="form-control" type="password" id="password" >
</div>

<div class="form-group"><label>status</label>
            <select name="status" class="form-control select2" style="width: 100%;">
            <option value="Aktif" selected="selected">Aktif</option>
            <option value="Tidak" >Tidak</option>
            </select>
            </div>

            <div class="form-group">
              <label>Hak Akses yang diijinkan</label>
                <?php 
                  $pembagi=2;          
                  $m=0;
                  ?>
                  <table cellpadding=0 width=520 cellspacing=0 bgcolor="#b2e1f1" align="center"><tr><td colspan=<?=$pembagi?> align='left'><font size="-1"><a href="#" onclick="checkall(true,<?=$query->num_rows()?>)">CheckAll</a> &nbsp;/&nbsp;<a href="#" onclick="checkall(false,<?=$query->num_rows()?>)">UncheckAll</a> </font></td></tr><tr>

                  <?php 
                  foreach ($query->result() as $row)
                  {
                    if ($m%$pembagi==0 && $m!=0)
                    echo "</tr><tr>";
                    $sel="";
                  //    $this->userammd->ishakok($
                    echo "<td><div class='checkbox'><label><input name='$row->idhak' id='cek$m' type='checkbox'  value=1> $row->namahak</label></div></td>";
                    $m++;
                  }
                  $sisa=$m%$pembagi;
                  for ($k=0;$k<$sisa;$k++)
                  echo "<td> &nbsp; </td>";
                  echo "</tr></table>";
                  ?>
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

function checkall(nilai,jumlah)
  {
      for (i=0;i<jumlah;i++)
      document.getElementById('cek'+i).checked=nilai;
  };
  </script>

