<?php
//header("Content-type: application/octet-stream");

$tglsekarang = formatTanggal(date("Y-m-d"));
if ($tipe==0)
{
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=".str_replace(" ","","MAKANAN".$tglsekarang).".xls");
	header("Pragma: no-cache");
	header("Expires: 0");
}else
{
	set_time_limit(0);
$nama_dokumen='PDF'; //Beri nama file PDF hasil.
define('_MPDF_PATH','mpdf/');
//include(_MPDF_PATH . "mpdf.php");
include("mpdf/mpdf.php");
//if (!defined('_MPDF_PATH')) define('_MPDF_PATH', base_url().'application/libraries/mpdf/');
//include(_MPDF_PATH . "mpdf.php");
//if (!defined('_MPDF_PATH')) define('_MPDF_PATH',base_url().'libraries/mpdf/');
//include(_MPDF_PATH . "mpdf.php");
//if (!defined('_MPDF_PATH')) define('_MPDF_PATH','mpdf/');
//include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'Legal', 9.5, 'arial'); // Membuat file mpdf baru
ob_start();

}

?>
<h2>MAKANAN</h2>
<table border='1' width="100%" cellpadding="0" cellspacing="0">
<tr bgcolor="#dddddd">
<td>No.</td>
<td>makanan</td>
<td>harga_makanan</td>
<td>tglupdate</td>
<td>opupdate</td>

</tr>
<?
$no=1;
foreach($query as $hasil) {
?>
<tr>
<td><?=$no++?></td>
<td><?=$hasil->makanan?></td>
<td><?=$hasil->harga_makanan?></td>
<td><?=$hasil->tglupdate?></td>
<td><?=$hasil->opupdate?></td>

<? } ?>
</table>
<? if ($tipe==1)
{
	$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
	ob_end_clean();
	//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
	$mpdf->WriteHTML(utf8_encode($html));
	$mpdf->Output($nama_dokumen.".pdf" ,'I');
}
?>
