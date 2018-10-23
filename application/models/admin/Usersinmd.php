<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class usersinmd extends CI_Model {

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
			$hasil =  $this->db->query("SELECT user.* FROM user 
									WHERE $field1 $penghubung1 '$katakunci1' 
									AND $field2 $penghubung2 '$katakunci2'
									ORDER BY user.nama
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
			return  $this->db->query("SELECT user.* FROM user 
									WHERE $field1 $penghubung1 '$katakunci1' 
									AND $field2 $penghubung2 '$katakunci2'
									ORDER BY user.nama");	
	}
	 public function getalldata()
	 {
		return $this->db->query("SELECT * FROM user ORDER BY nama");
	 }	
	public function cekkolom($data)
	{
     for ($c=0; $c < count($data); $c++) {
         $judul[$c]=$data[$c];
         //cek judul
         $st="show columns from user where field='".$judul[$c]."'";
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
			return  $this->db->query("SELECT user.* FROM user 
									WHERE $field1 $penghubung1 '$katakunci1' 
									AND $field2 $penghubung2 '$katakunci2'
									ORDER BY user.nama");	
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
			$hasil =  $this->db->query("SELECT user.* FROM user 
									WHERE $field1 $penghubung1 '$katakunci1' 
									AND $field2 $penghubung2 '$katakunci2'
									ORDER BY user.nama");
			
			return $hasil->num_rows();

	}

	function ishakok($iduser,$idhak)
	{
			$st="SELECT idx FROM hakuser WHERE hak='$idhak' AND namauser='".$iduser."' AND status=1";
			$hasil=$this->db->query($st);
			return $hasil->num_rows()>0;
	}

	public function getlisthak()
	{
		return $this->db->query("SELECT idhak,namahak FROM listhak ORDER BY idx");
	}

	public function getlisthakop($nama)
	{
		return $this->db->query("SELECT * from hakuser WHERE namauser='$nama'");
	}

	function updatehak($iduser,$idhak,$nilai)
	{
			$st="SELECT idx FROM hakuser WHERE hak='$idhak' AND namauser='".$iduser."'";
			$hasil=$this->db->query($st);
			$rsub=$hasil->result();
			if ($hasil->num_rows()>0)		
			 $st="UPDATE hakuser SET status='".$nilai."' WHERE idx='".$rsub[0]->idx."'";
			else 
		     $st="INSERT INTO hakuser (namauser,hak,status) VALUES ('".$iduser."','".$idhak."','".$nilai."')"; 
		    $this->db->query($st); 				
	}

 	public function add($data)
	{
		
		$hasil=$this->getlisthak();
		foreach ($hasil->result() as $row)
		{
//			echo "MASUKKKKKKKKKKKKKKKKKKK";
			if ($data[$row->idhak]=="") 
				$data[$row->idhak]=0;
			$this->updatehak($data['username'],$row->idhak,$data[$row->idhak]);
		}
		$st="INSERT INTO user (username,password,nama,jabatan,status) values ('".clsnc($data["username"])."',md5('".clsnc($data["password"])."'),'".clsnc($data["nama"])."','".clsnc($data["jabatan"])."','".clsnc($data["status"])."')";
		//var_dump($data);
		//die();
		$this->db->query($st);		
		return array(1,"berhasil");		
	}

 	public function get_one($id)
 	{
	 	return $this->db->query("SELECT * FROM user WHERE nama='$id' ORDER BY nama");
 	}

 	function edit($data)
	{
		//var_dump($data);
		//die();
		if($data['password']==$data['pass_lama'])
		{
			$st="UPDATE user set username='".clsnc($data["username"])."',nama='".clsnc($data["nama"])."',jabatan='".clsnc($data["jabatan"])."',status='".clsnc($data["status"])."'  WHERE username='".clsnc($data['iduser'])."'";
		}
		else
		{
			$st="UPDATE user set username='".clsnc($data["username"])."', password='".md5(clsnc($data['password']))."',nama='".clsnc($data["nama"])."',jabatan='".clsnc($data["jabatan"])."',status='".clsnc($data["status"])."'  WHERE username='".clsnc($data['iduser'])."'";
			
		}
		$hasil=$this->getlisthak();
		
		foreach ($hasil->result() as $row)
		{
			$this->updatehak($data['username'], $row->idhak, $data[$row->idhak]);
		}
		return $this->db->query($st);		
	}
 	public function hapus_member($idmember)
 	{
	 	$this->db->where('nama',$idmember);
        $this->db->delete('user');
 	}

 	public function ceknamauser($nama)
	{
		return $this->db->query("SELECT * from user WHERE username='$nama'");
	}
}
