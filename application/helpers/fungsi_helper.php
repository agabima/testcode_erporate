<?

function back_normal($judul)
{
  $judul=str_replace("_space"," ",$judul);
  $judul=str_replace("_plus","+",$judul);
  $judul=str_replace('_coma',',',$judul);
  $judul=str_replace('_openb','(',$judul);
  $judul=str_replace('_closeb',')',$judul);
  $judul=str_replace('_slash','/',$judul);
  return $judul;

}

function cari_total($data,$tipe,$barisproduk)
{	
	//var_dump($data);
	//die();
	$total =0;
	for ($mm=0;$mm<$barisproduk;$mm++)
	{
		$ar=$data[$mm];
		if ($ar['tipe']==$tipe)
		{
			$total+=$ar['subtotal'];
		}
	}
	return $total;
}
function makedigit($angka,$digit)
{
  $mm=1;
  $tmp=$angka;
  $isfind=false;
  for ($i=2;$i<=$digit+1;$i++)
  {
    $mm=$mm*10;
    if ($angka<$mm && !$isfind) {
      for ($j=1;$j<=$digit-$i+1;$j++)
        $tmp="0".$tmp;
      $isfind=true;
    }
  }
  return $tmp;
}

function make4digit($no)
    {
        if ($no<10)
            return "000".$no;
        else if ($no<100)
            return "00".$no;
        else if ($no<1000)
        	return "0".$no;
        else
            return $no;
    }
function make3digit($no)
    {
        if ($no<10)
            return "00".$no;
        else
        if ($no<100)
            return "0".$no;
        else
            return $no;
    }
function cari_item($data,$tipe,$barisproduk)
{
	$total = 0;
	for ($mm=0;$mm<$barisproduk;$mm++)
	{
		$ar=$data[$mm];
		if ($ar['tipe']==$tipe)
		{
			$total+=count($ar['idproduk']);
		}
	}
	return $total;
}

function cari_tipe($data)
{	
	$barisproduk = count($data);
	echo $barisproduk;
	$tipe="";
	//var_dump($cartdata->contents());
	//die();
	for ($mm=0;$mm<$barisproduk;$mm++)
		{
			$ar=$data[$mm]; 
			{
				$tipe=$ar['tipe'];
			}
		}
		if(barisproduk==0)
		return $tipe;
}


function cari_link($data,$tipe,$barisproduk)
{
	$link ="cart";
	for ($mm=0;$mm<$barisproduk;$mm++)
	{
		$ar=$data[$mm];
		if ($ar['tipe']==$tipe)
		{
			$link =$ar['link'];
		}
	}
	return $link;
}

function clsnc($kata)
{
        $kata=str_replace("'","",$kata);
        $kata=str_replace('"','',$kata);
        $kata=str_replace('\\','',$kata);
    return $kata;
}

function formatTanggal($tanggal)
  {
    if($tanggal!="")
    {
    $bulanIndo = array("Januari","Februari","Maret","April","Mei",
               "Juni","Juli","Agustus","September",
               "Oktober","November","Desember");

    $tahun = substr($tanggal,0,4);
    $bulan = substr($tanggal,5,2);
    $tgl   = substr($tanggal,8,2);

    $hasil = $tgl." ".$bulanIndo[(int)$bulan-1]." ".$tahun;
    return ($hasil);
  }
}
function tampil_bulan($x) {
    switch ($x) {
        case 1  : $bulan = "Januari";
           break;
        case 2  : $bulan = "Februari";
           break;
        case 3  : $bulan = "Maret";
           break;
        case 4  : $bulan = "April";
           break;
        case 5  : $bulan = "Mei";
           break;
        case 6  : $bulan = "Juni";
           break;
        case 7  : $bulan = "Juli";
           break;
        case 8  : $bulan = "Agustus";
           break;
        case 9  : $bulan = "September";
           break;
        case 10 : $bulan = "Oktober";
           break;
        case 11 : $bulan = "November";
           break;
        case 12 : $bulan = "Desember";
           break;
    }
    return $bulan;
}

function namakolektor($idkolektor)
{
       $st = "SELECT namakolektor FROM member where id='$idkolektor'";
	//echo $st;
	$hasil = mysql_query($st);
	if ($row=mysql_fetch_row($hasil))
		{
			if ($row[0]=="")
				return "";
			else
				return $row[0];
		}
	else
			return "";
}
function replace_judul($judul)
{
 	$judul=str_replace(" ","~",$judul);
 	$judul=str_replace("+","^",$judul);
  $judul=str_replace('(','_',$judul);
  $judul=str_replace(')','_',$judul);
  $judul=str_replace(',','_',$judul);
  return $judul;
}

/*

function cari_link($data,$link,$barisproduk)
{
	$link="cart";
	for ($mm=0;$mm<$barisproduk;$mm++)
	{
		$ar=$data[$mm];
		if ($ar['link']==$link)
		{
			$link=$ar['link'];
		}
	}
		return $link;

}
/*
function cari_item($cartdata,$tipe)
{

	for ($mm=0;$mm<$barisproduk;$mm++)
				{
					$ar=$this->session->userdata("data[$mm]");
					if ($ar['tipe']==$tipe)
					{
						$mm+=$ar['qty'];
					}
		}
		return $mm;
}

*/
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}
?>