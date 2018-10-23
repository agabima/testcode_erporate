   <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Import PESANAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'admin/dashboardct';?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url().'admin/pesananct';?>">PESANAN</a></li>
        <li class="active">Import PESANAN</li>
      </ol>
    </section>
     
    <!-- Main content -->
    <section class="content">
<table width="95%" border="0" cellpadding="0" cellspacing="3">
<form action="<?php echo base_url();?>admin/pesananct/importdata" method="post" enctype="multipart/form-data" name="csv" id="csv">
  <tr>
    <td height="30" bgcolor="#aacccc"><div align="center"><strong>IMPORT PESANAN</strong></div></td>
  </tr>

  <tr>
    <td>&nbsp;Delimiter :
      <input name="delimiter" type="text" id="delimiter" value=";" size="1" maxlength="1" />
      <br> gunakan judul kolom : tglpesan,nopesanan,idmakanan,idminuman,jumlah,statuspesanan,tglupdate,opupdate
	  <br>catatan : format tanggal menggunakan yyyy-mm-dd
    </td>
  </tr>
  <tr>
    <td>&nbsp;CSV file :
      <input type="file" name="csv" />
    <input type="hidden" name="go" value="1"/></td>
  </tr>
  <tr>
    <td ><label><input name="preview" type="radio" value="1" checked="checked" />
      Preview data only </label><br />
      <label><input name="preview" type="radio" value="2" />
      Store to database (append data) </label><br />
      <label><input name="preview" type="radio" value="3" />
      Store to database (reset/clear old data)</label> </td>
  </tr>
  <tr>
    <td bgcolor="#aacccc">    <div align="center">
      <input type="submit" name="Submit" value="Process" />
      <input type="hidden" name="pre" value="1" />
    </div></td>
  </tr>
  </form>
</table>

<?    if (isset($_REQUEST['pre']) && $_REQUEST['pre'] == "1") {
         $_REQUEST['header']="1";
        $delimiter = trim($_REQUEST['delimiter']);
		if ($_FILES['csv']['tmp_name']=="")
		{ ?>
				<script>
				alert("Mohon pilih file yang akan di import");
			</script>
			</section></div>
		<? 
		return;
		};
    $handle = fopen($_FILES['csv']['tmp_name'],'r');
        if(!$handle)
		{
			?>
			<script>
				alert("Mohon pilih file (Gagal Membuka File)");
			</script>
			</section></div>
			<?
			return;
//			die('Cannot open uploaded file.');
		}
                    if ($_REQUEST['preview'] == "1") {
	?>
<br/>
<table width="80%" border="0" align="left" cellpadding="4" cellspacing="2" bgcolor="#CCCCCC">
<?  if (($data = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
    $jumkol=count($data);
	$hasil=$this->pesananmd->cekkolom($data);
	if (!$hasil[0])
	{
		echo $hasil[1];return;
	}else
		$judul=$hasil[1];
}
 ?>

   <tr bgcolor="#aacccc">
      <td  height="30" colspan="<?=$jumkol+1?>" bgcolor="#aacccc"><div align="center"><strong><font color="#000000">PREVIEW DATA</font></strong></div></td>
  </tr>
  <tr bgcolor="#aacccc">
  	 <td  bgcolor="#FFFFE1"> <div align="center"><b><font color="#000000">No</font></b> <br>
    </div></td>
      <? for ($ix=0;$ix<$jumkol;$ix++)
      { ?>
  	 <td  bgcolor="#FFFFE1"> <div align="center"><b><font color="#000000"><?=$judul[$ix]?></font></b> <br>
    </div></td>
    <? } ?>
  </tr>
  <?php
  $_REQUEST['header']="0";
  	if ($_REQUEST['header'] == "1") {

  $i=0;
  while (($data = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
  	for ($c=0; $c < count($data); $c++) {

if ($i > 0) {
   ?>
  <tr bgcolor="#FFFFFF">
  	 <td height="21" bgcolor="#FFFFFF"> <div align="center">&nbsp;
      <?php echo $i;?>
    </td>
    <? for ($ix=0;$ix<$jumkol;$ix++)
    { ?>
    <td height="21" bgcolor="#FFFFFF"> <div align="center">&nbsp;
      <?php echo trim(clsnc($data[$c+$ix]));?>
    </td>
    <? } ?>
  </tr>
  <?php
  $c=$c+$jumkol;
  }
  }
  $i++;}
  } else {


$i=1;
  while (($data = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
  	for ($c=0; $c < count($data); $c++) {

   ?>
  <tr bgcolor="#FFFFFF">
  	 <td height="21" bgcolor="#FFFFFF"> <div align="center">&nbsp;
      <?php echo $i;?>
    </td>
    <? for ($ix=0;$ix<$jumkol;$ix++)
    { ?>
    <td height="21" bgcolor="#FFFFFF"> <div align="center">&nbsp;
      <?php echo trim(clsnc($data[$c+$ix]));?>
    </td>
    <? } ?>
  </tr>
  <?php
  $c=$c+$jumkol;
  }
  $i++;
  }

}
  ?>
  <tr><td colspan="3"><div align="center"><strong>Total Data :
        <?php if ($i < 0) {echo 0;} else {echo $i-1;}?>
  </strong></div></td></tr>
</table>

<?php
  }//end preview
   else {
// process to database
  if (($data = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
    $jumkol=count($data);
	$hasil=$this->pesananmd->cekkolom($data);
	if (!$hasil[0])
	{
		echo $hasil[1];return;
	}else
		$judul=$hasil[1];
}

$delimiter = trim($_REQUEST['delimiter']);
	if ($_REQUEST['preview'] == "2") {
//		if ($_REQUEST[header] == "1") {
		CSVImport("pesanan", $judul, "csv",$delimiter,"1","idx", "0");
//		} else {
//		CSVImport("phonebook", $judul, "csv",$grupid,$delimiter,"0","0");
//		}
	} else {
//		if ($_REQUEST[header] == "1") {
		CSVImport("pesanan", $judul, "csv",$delimiter,"1","idx","1");
//		} else {
//		CSVImport("phonebook", $judul, "csv",$grupid,$delimiter,"0","1");
//		}
	}

//	echo "<script language=\"JavaScript\">";
//echo "location.href=\"cp_kanan.php?cmd=".IMPORT_KECAMATAN."\";";
//echo "</script>";
}
    }//end
    ?>
  </section>
    <!-- /.content -->

  </div>
