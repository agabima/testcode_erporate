<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Minumanmd extends CI_Model {

		//start ambil data dari database  
	public function ambil_member($data_cari,$limit, $offset)
 	{

			$field1 			= $data_cari['field1'];
			$penghubung1		= $data_cari['penghubung1'];
			$katakunci1 		= $data_cari['katakunci1'];
			$field2 			= $data_cari['field2'];
			$penghubung2		= $data_cari['penghubung2'];
			$katakunci2 		= $data_cari['katakunci2'];
			if (strcasecmp($penghubung1,"like")==0 || strcasecmp($penghubung1,"not like")==0)
				$katakunci1="%".$katakunci1."%";
			if (strcasecmp($penghubung2,"like")==0 || strcasecmp($penghubung2,"not like")==0)
				$katakunci2="%".$katakunci2."%";
			$hasil =  $this->db->query("SELECT minuman.* FROM minuman 
									WHERE $field1 $penghubung1 '$katakunci1' 
									AND $field2 $penghubung2 '$katakunci2'
									ORDER BY minuman.idx
									LIMIT $offset, $limit");	
			return $hasil->result();
 	}
 	public function exportcsv($data_cari)
 	{

			$field1 			= $data_cari['field1'];
			$penghubung1		= $data_cari['penghubung1'];
			$katakunci1 		= $data_cari['katakunci1'];
			$field2 			= $data_cari['field2'];
			$penghubung2		= $data_cari['penghubung2'];
			$katakunci2 		= $data_cari['katakunci2'];
			if (strcasecmp($penghubung1,"like")==0 || strcasecmp($penghubung1,"not like")==0)
				$katakunci1="%".$katakunci1."%";
			if (strcasecmp($penghubung2,"like")==0 || strcasecmp($penghubung2,"not like")==0)
				$katakunci2="%".$katakunci2."%";
			return  $this->db->query("SELECT minuman.* FROM minuman 
									WHERE $field1 $penghubung1 '$katakunci1' 
									AND $field2 $penghubung2 '$katakunci2'
									ORDER BY minuman.idx");	
	}
	 public function getalldata()
	 {
		return $this->db->query("SELECT * FROM minuman ORDER BY idx");
	 }	
	public function cekkolom($data)
	{
     for ($c=0; $c < count($data); $c++) {
         $judul[$c]=$data[$c];
         //cek judul
         $st="show columns from minuman where field='".$judul[$c]."'";
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
 	public function exportexcel($data_cari)
 	{

			$field1 			= $data_cari['field1'];
			$penghubung1		= $data_cari['penghubung1'];
			$katakunci1 		= $data_cari['katakunci1'];
			$field2 			= $data_cari['field2'];
			$penghubung2		= $data_cari['penghubung2'];
			$katakunci2 		= $data_cari['katakunci2'];
			if (strcasecmp($penghubung1,"like")==0 || strcasecmp($penghubung1,"not like")==0)
				$katakunci1="%".$katakunci1."%";
			if (strcasecmp($penghubung2,"like")==0 || strcasecmp($penghubung2,"not like")==0)
				$katakunci2="%".$katakunci2."%";
			return  $this->db->query("SELECT minuman.* FROM minuman 
									WHERE $field1 $penghubung1 '$katakunci1' 
									AND $field2 $penghubung2 '$katakunci2'
									ORDER BY minuman.idx");	
 	}
 	


 	public function cari_berdasarkan_katakunci1_katakunci2_count($data_cari)
	{
			$field1 			= $data_cari['field1'];
			$penghubung1		= $data_cari['penghubung1'];
			$katakunci1 		= $data_cari['katakunci1'];
			$field2 			= $data_cari['field2'];
			$penghubung2		= $data_cari['penghubung2'];
			$katakunci2 		= $data_cari['katakunci2'];
			if (strcasecmp($penghubung1,"like")==0 || strcasecmp($penghubung1,"not like")==0)
				$katakunci1="%".$katakunci1."%";
			if (strcasecmp($penghubung2,"like")==0 || strcasecmp($penghubung2,"not like")==0)
				$katakunci2="%".$katakunci2."%";
			$hasil =  $this->db->query("SELECT minuman.* FROM minuman 
									WHERE $field1 $penghubung1 '$katakunci1' 
									AND $field2 $penghubung2 '$katakunci2'
									ORDER BY minuman.idx");
			
			return $hasil->num_rows();

	}

 	public function tambah_member($data)
 	{
	 	return $this->db->insert("minuman",$data);
 	}

 	public function get_one($id)
 	{
	 	return $this->db->query("SELECT * FROM minuman WHERE idx='$id' ORDER BY idx");
 	}

 	public function update_member($data,$idmember)
 	{
	 	$this->db->where('idx',$idmember);
        $this->db->update('minuman',$data);
 	}
 	public function hapus_member($idmember)
 	{
	 	$this->db->where('idx',$idmember);
        $this->db->delete('minuman');
 	}
}
