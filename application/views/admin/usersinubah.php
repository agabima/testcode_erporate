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
        Form Ubah User
        <!--<small>Preview</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'admin/dashboardct';?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url().'admin/usersinct';?>">User</a></li>
        <li class="active">Ubah User</li>
      </ol> 
    </section>
    <!-- Main content -->   
    <section class="content">
    <form name="member" method="post" action="<?php echo base_url().'admin/usersinct/proses_ubah/'.$member->nama.'';?>">     
        <div class="box box-primary">
          
        <!-- /.box-header -->
         <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
          <div class="box-header with-border">
              <h3 class="box-title">Data User</h3>
            </div>
            <div class="col-md-4 col-sm-6">
            <div class="form-group"><label>username</label>
<input name="username" class="form-control" type="text" id="username" value="<?php echo $member->username;?>" >
</div>
<div class="form-group"><label>password</label>
<input name="password" class="form-control" type="password" id="password" value="<?php echo $member->password;?>" >
</div>
<div class="form-group"><label>nama</label>
<input name="nama" class="form-control" type="text" id="nama" value="<?php echo $member->nama;?>" >
</div>
<div class="form-group"><label>jabatan</label>
<input name="jabatan" class="form-control" type="text" id="jabatan" value="<?php echo $member->jabatan;?>" >
</div>
                <div class="form-group"><label>status</label>
                <select name="status" class="form-control select2" style="width: 100%;">
                <option value="Aktif" <?=($member->status=="Aktif" ? "selected" : "")?>>Aktif</option>
                <option value="Tidak Aktif" <?=($member->status=="Tidak Aktif" ? "selected" : "")?>>Tidak Aktif</option>
                </select>
                </div>

                <div class="form-group">
              <label>Hak Akses yang diijinkan</label>
            <?php 
            $pembagi=2;          
            $m=0;
            ?>
            <table cellpadding=0 width=520 cellspacing=0 bgcolor="#b2e1f1"><tr><td colspan=<?=$pembagi ?> align='left'><font size="-1"><a href="#" onclick="checkall(true,<?=$query->num_rows()?>)">CheckAll</a> &nbsp;/&nbsp;<a href="#" onclick="checkall(false,<?=$query->num_rows()?>)">UncheckAll</a> </font></td></tr><tr>

            <?php                    

        //var_dump($query->result());
        //die();
            foreach ($query->result() as $row)
            {                                       
              
              if ($m%$pembagi==0 && $m!=0)

              echo "</tr><tr>";
              $sel="";

                $cek = $this->usersinmd->ishakok($member->username,$row->idhak);
                if($cek==1)
                  $sel="checked";
              echo "<td><div class='checkbox'><label><input name='$row->idhak' id='cek$m' type='checkbox' value=1 $sel>$row->namahak</label></div></td>";
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

function checkall(nilai,jumlah)
  {
      for (i=0;i<jumlah;i++)
      document.getElementById('cek'+i).checked=nilai;
  };
</script>
