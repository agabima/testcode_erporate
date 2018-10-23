<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Pesananmd extends CI_Model {

		//start ambil data dari database  
	public function ambil_transaksi($data_cari,$limit, $offset)
 	{
	 	$field1 			= $data_cari['field1'];
		$penghubung1		= $data_cari['penghubung1'];
		$katakunci1 		= $data_cari['katakunci1'];
		$field2 			= $data_cari['field2'];
		$penghubung2		= $data_cari['penghubung2'];
		$katakunci2 		= $data_cari['katakunci2'];
		$tanggal_awal 		= $data_cari['periode_awal'];
		$tanggal_akhir		= $data_cari['periode_akhir'];
			if (strcasecmp($penghubung1,"like")==0 || strcasecmp($penghubung1,"not like")==0)
				$katakunci1="%".$katakunci1."%";
			if (strcasecmp($penghubung2,"like")==0 || strcasecmp($penghubung2,"not like")==0)
				$katakunci2="%".$katakunci2."%";

		$hasil =  $this->db->query("SELECT pesanan.* FROM pesanan INNER JOIN makanan ON pesanan.idmakanan=makanan.idx INNER JOIN minuman ON pesanan.idminuman=minuman.idx
									 WHERE $field1 $penghubung1 '$katakunci1' 
									 AND $field2 $penghubung2 '$katakunci2'
									 AND tglpesan BETWEEN '$tanggal_awal' AND '$tanggal_akhir' 
									 ORDER BY idx DESC
									 LIMIT $offset,$limit");
		return $hasil->result();
 	}
	 public function getalldata()
	 {
		return $this->db->query("SELECT * FROM pesanan ORDER BY idx");
	 }		
public function cekkolom($data)
	{
     for ($c=0; $c < count($data); $c++) {
         $judul[$c]=$data[$c];
         //cek judul
         $st="show columns from pesanan where field='".$judul[$c]."'";
		 $hasil=$this->db->query($st);
//         $hasil=mysql_query($st);
  //       if (mysql_num_rows($hasil)==0)
		if ($hasil->num_rows()==0)
         {
                 return array(false,"<center><font color=red><b>Judul Kolom tidak benar : ".$judul[$c]."</b></font></center><br></table></section></div>");
         }
     }
	 return array(true,$judul);
	}
 	public function export($data_cari)
 	{
	 	$field1 			= $data_cari['field1'];
		$penghubung1		= $data_cari['penghubung1'];
		$katakunci1 		= $data_cari['katakunci1'];
		$field2 			= $data_cari['field2'];
		$penghubung2		= $data_cari['penghubung2'];
		$katakunci2 		= $data_cari['katakunci2'];
		$tanggal_awal 		= $data_cari['periode_awal'];
		$tanggal_akhir		= $data_cari['periode_akhir'];
			if (strcasecmp($penghubung1,"like")==0 || strcasecmp($penghubung1,"not like")==0)
				$katakunci1="%".$katakunci1."%";
			if (strcasecmp($penghubung2,"like")==0 || strcasecmp($penghubung2,"not like")==0)
				$katakunci2="%".$katakunci2."%";

		return  $this->db->query("SELECT pesanan.* FROM pesanan INNER JOIN makanan ON pesanan.idmakanan=makanan.idx INNER JOIN minuman ON pesanan.idminuman=minuman.idx
									 WHERE $field1 $penghubung1 '$katakunci1' 
									 AND $field2 $penghubung2 '$katakunci2'
									 AND tglpesan BETWEEN '$tanggal_awal' AND '$tanggal_akhir' 
									 ORDER BY pesanan.idx DESC");
 	}
 	
	 public function tambah_transaksi($data)
	 {
	 	return $this->db->insert("pesanan",$data);
	 }

	 public function get_one($id)
	 {
	 	return $this->db->query("SELECT * FROM pesanan WHERE idx='$id' ORDER BY idx");
	 }
	 public function update_transaksi($data,$idtrx)
	 {
	 	$this->db->where('idx',$idtrx);
        $this->db->update('pesanan',$data);
	 }
	 public function hapus_transaksi($idtrx)
	 {
	 	$this->db->where('idx',$idtrx);
        $this->db->delete('pesanan');
	 }

	


	public function cari_berdasarkan_periode($tanggal_awal,$tanggal_akhir)
	{
		return $this->db->query("SELECT pesanan.* FROM pesanan INNER JOIN makanan ON pesanan.idmakanan=makanan.idx INNER JOIN minuman ON pesanan.idminuman=minuman.idx
								 WHERE tglpesan BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY idx DESC");
	}

	public function cari_berdasarkan_katakunci($data_cari)
	{	
		$field 			= $data_cari['field'];
		$penghubung		= $data_cari['penghubung'];
		$katakunci 		= $data_cari['katakunci'];
		$tanggal_awal 	= $data_cari['periode_awal'];
		$tanggal_akhir	= $data_cari['periode_akhir'];

		return $this->db->query("SELECT pesanan.* FROM pesanan INNER JOIN makanan ON pesanan.idmakanan=makanan.idx INNER JOIN minuman ON pesanan.idminuman=minuman.idx WHERE $field $penghubung '$katakunci'
								 AND tglpesan BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY idx DESC");
	}
	public function cari_berdasarkan_katakunci1_katakunci2_count($data_cari)
	{	
		$field1 			= $data_cari['field1'];
		$penghubung1		= $data_cari['penghubung1'];
		$katakunci1 		= $data_cari['katakunci1'];
		$field2 			= $data_cari['field2'];
		$penghubung2		= $data_cari['penghubung2'];
		$katakunci2 		= $data_cari['katakunci2'];
		$tanggal_awal 		= $data_cari['periode_awal'];
		$tanggal_akhir		= $data_cari['periode_akhir'];
			if (strcasecmp($penghubung1,"like")==0 || strcasecmp($penghubung1,"not like")==0)
				$katakunci1="%".$katakunci1."%";
			if (strcasecmp($penghubung2,"like")==0 || strcasecmp($penghubung2,"not like")==0)
				$katakunci2="%".$katakunci2."%";

		$hasil =  $this->db->query("SELECT pesanan.* FROM pesanan INNER JOIN makanan ON pesanan.idmakanan=makanan.idx INNER JOIN minuman ON pesanan.idminuman=minuman.idx
									 WHERE $field1 $penghubung1 '$katakunci1' 
									 AND $field2 $penghubung2 '$katakunci2'
									 AND tglpesan BETWEEN '$tanggal_awal' AND '$tanggal_akhir' 
									 ORDER BY idx DESC");
		return $hasil->num_rows();
	}



}
