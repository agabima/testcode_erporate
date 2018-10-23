<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usersinct extends CI_Controller 
{

	public function __construct()
	{
		parent:: __construct();

		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('admin/usersinmd');
		$this->load->model('admin/Usersinmd');
	}
  function importdata() {
		$data['username'] = $this->session->userdata('username');
		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu');
		$this->load->view('admin/usersinimp');
		$this->load->view('admin/footer');

  } 
 
	//start tampil (Read) kategori
	public function index($id=NULL)
	{	
		if ($id==NULL)
		{
//			$this->session->unset_userdata('sesusersin');
		}
		$perpage=clsnc($this->input->post("perpage"));
		$data['username'] = $this->session->userdata('username');
		$field1 	 = clsnc($this->input->post("field1"));
		$field2 	 = clsnc($this->input->post("field2"));
		$penghubung1 = clsnc($this->input->post("penghubung1"));
		$penghubung2 = clsnc($this->input->post("penghubung2"));
		$katakunci1  = clsnc($this->input->post("katakunci1"));
		$katakunci2  = clsnc($this->input->post("katakunci2"));
		if ($field1=="")
		{	
			$sesmember = $this->session->userdata('sesusersin');
			if ($sesmember!="") {
				$field1 = $sesmember["field1"];
				$field2 = $sesmember["field2"];
				$penghubung1 = $sesmember["penghubung1"];
				$penghubung2 = $sesmember["penghubung2"];
				$katakunci1 = $sesmember["katakunci1"];
				$katakunci2 = $sesmember["katakunci2"];
				if ($perpage=="" && isset($sesmember["perpage"]))
					$perpage=$sesmember["perpage"];
			}
		}else
		{
			$sesmember = $this->session->userdata('sesusersin');
			if ($perpage=="" && isset($sesmember["perpage"]))
				$perpage=$sesmember["perpage"];
		}
		if ($perpage=="")
			$perpage=10;		
		if ($field1=="")
			$field1="username";
		if ($field2=="")
			$field2="username";
		if ($penghubung1=="")
			$penghubung1="LIKE";
		if ($penghubung2=="")
			$penghubung2="LIKE";
		if ($katakunci1=="")
			$katakunci1="%";
		if ($katakunci2=="")
			$katakunci2="%";
		$data['field1'] = $field1;
		$data['field2'] = $field2;
		$data['penghubung1'] = $penghubung1;
		$data['penghubung2'] = $penghubung2;
		$data['katakunci1'] = $katakunci1;
		$data['katakunci2'] = $katakunci2;
		 $data['perpage'] = $perpage;
		$ses["sesusersin"] = $data;
		$this->session->set_userdata($ses);
		$jml = $this->usersinmd->cari_berdasarkan_katakunci1_katakunci2_count($data);
		//pengaturan pagination
		 $config['base_url'] = base_url().'admin/Usersinct/index';
		 $config['total_rows'] = $jml;
		 $config['per_page'] = $perpage;
		 $config['first_link'] = 'Awal';
		 $config['last_link'] = 'Akhir';
		 //$config['next_page'] = '&laquo;';
		 //$config['prev_page'] = '&raquo;';


		$config['first_tag_open'] = $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['first_tag_close'] = $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
         
        $config['cur_tag_open'] = "<li><span><b>";
        $config['cur_tag_close'] = "</b></span></li>";
		 $config['use_page_numbers']  = TRUE;

		if($id){
			$offset = ($id - 1) * $config['per_page'];
		}else{
			$offset = 0;
		}
		$data['number'] = $offset+1;
		//inisialisasi config
		 $this->pagination->initialize($config);
		 
		//buat pagination
		 $data['halaman'] = $this->pagination->create_links();
		

		//tamplikan data
		 $data['query'] = $this->usersinmd->ambil_member($data,$config['per_page'], $offset);
		 $this->load->view('admin/header',$data);
		 $this->load->view('admin/menu');
		 $this->load->view('admin/Usersinvw');
		 $this->load->view('admin/footer');
	}
	public function tambah()
	{
		$data['username'] = $this->session->userdata('username');
		$data['query']= $this->usersinmd->getlisthak();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu');
		$this->load->view('admin/usersintambah');
		$this->load->view('admin/footer');
	}
	//end tampilan tambah member

	
	//proses tambah member
	public function proses_tambah()
	{
		$data["username"] = clsnc($_POST["username"]);
		$data["password"] = clsnc($_POST["password"]);
		$data["nama"] = clsnc($_POST["nama"]);
		$data["jabatan"] = clsnc($_POST["jabatan"]);
		$data["status"] = clsnc($_POST["status"]);
		$hasil=$this->usersinmd->getlisthak();
		$cek = $this->usersinmd->ceknamauser($data["username"])->num_rows();
		
		if ($cek>0) 
		{
			?>
        	<script type="text/javascript">
        		alert("Username telah digunakan yang lain, Silahkan ganti dengan username lain");
        		window.history.back();
        	</script>
        	<?
		}
		else
		{
			foreach ($hasil->result() as $row)
		   	{
			   $data[$row->idhak]=$this->input->post($row->idhak);
		   	}
	        $result=$this->usersinmd->add($data);
	        
	        if ($result[0]==1)
	        {
	        	?>
	        	<script type="text/javascript">
	        		alert("Data Berhasil ditambahkan");
	        		window.location.href="<?php echo base_url().'admin/usersinct'.'';?>";
	        	</script>
	        	<?
	        } 
	        else 
	        {
	        	?>
	        	<script type="text/javascript">
	        		alert("Data Gagal ditambahkan");
	        		window.location.href="<?php echo base_url().'admin/usersinct/tambah'.'';?>";
	        	</script>
	        	<?
	        }	
		}	
	}

	public function ubah($id)
	{
		$data['username'] = $this->session->userdata('username');
		$data['member'] = $this->usersinmd->get_one($id)->row();	
		$data['hakop'] = $this->usersinmd->getlisthakop($data['username'])->result();
		$data['query']= $this->usersinmd->getlisthak();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu');
		$this->load->view('admin/usersinubah');
		$this->load->view('admin/footer');
	}
	public function proses_ubah($idmember)
	{
//		$data['member'] = $this->usersinmd->get_one($idmember)->row();
$data_member = $this->usersinmd->get_one($idmember)->row();
$data['pass_lama'] = $data_member->password;
$data['iduser']=$idmember;
//var_dump($data['iduser']);
//die();
		$data["username"] = clsnc($_POST["username"]);
$data["password"] = clsnc($this->input->post("password"));
$data["nama"] = clsnc($_POST["nama"]);
$data["jabatan"] = clsnc($_POST["jabatan"]);
$data["status"] = clsnc($_POST["status"]);
$hasil=$this->usersinmd->getlisthak(); 


 foreach ($hasil->result() as $row)
	    {
	    	$data[$row->idhak]=$this->input->post($row->idhak);
	    }
	   
	    $result=$this->usersinmd->edit($data);

		//if ($result){
		?>
		<script type="text/javascript">
			alert("Data Berhasil di Ubah");
			window.location.href="<?php echo base_url().'admin/usersinct'.'';?>";
		</script>
		<?	
		
	}


	public function hapus($id)
    {    	
        $this->usersinmd->hapus_member($id);
        ?>
		<script type="text/javascript">
		alert("Data USERSIN berhasil di Hapus");
		window.location.href="<?php echo base_url().'admin/usersinct';?>";
		</script>
		<?php
    }
	

	public function csv()
    { 
    	$sesmember = $this->session->userdata('sesusersin');

		$this->load->dbutil();
	    $this->load->helper('file');
	    $this->load->helper('download');
	    $delimiter = ";";
	    $newline = "\r\n";
	    $filename = "USERSIN.csv";
	    $field1 	 = clsnc($this->input->post("field1"));
		$field2 	 = clsnc($this->input->post("field2"));
		$penghubung1 = clsnc($this->input->post("penghubung1"));
		$penghubung2 = clsnc($this->input->post("penghubung2"));
		$katakunci1  = clsnc($this->input->post("katakunci1"));
		$katakunci2  = clsnc($this->input->post("katakunci2"));
		if ($field1=="")
		{	
			$sesmember = $this->session->userdata('sesusersin');
			if ($sesmember!="") {
				$field1 = $sesmember["field1"];
				$field2 = $sesmember["field2"];
				$penghubung1 = $sesmember["penghubung1"];
				$penghubung2 = $sesmember["penghubung2"];
				$katakunci1 = $sesmember["katakunci1"];
				$katakunci2 = $sesmember["katakunci2"];
			}
		}
		if ($field1=="")
			$field1="nama";
		if ($field2=="")
			$field2="nama";
		if ($penghubung1=="")
			$penghubung1="LIKE";
		if ($penghubung2=="")
			$penghubung2="LIKE";
		if ($katakunci1=="")
			$katakunci1="%";
		if ($katakunci2=="")
			$katakunci2="%";
		$data['field1'] = $field1;
		$data['field2'] = $field2;
		$data['penghubung1'] = $penghubung1;
		$data['penghubung2'] = $penghubung2;
		$data['katakunci1'] = $katakunci1;
		$data['katakunci2'] = $katakunci2;
		$ses["sesusersin"] = $data;
		$this->session->set_userdata($ses);

		$query = $this->usersinmd->exportcsv($data);
	    
	    $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
	    force_download($filename, $data);
    }	
    public function excel($tipe)
    { 
    	$sesmember = $this->session->userdata('sesusersin');

	    $field1 	 = clsnc($this->input->post("field1"));
		$field2 	 = clsnc($this->input->post("field2"));
		$penghubung1 = clsnc($this->input->post("penghubung1"));
		$penghubung2 = clsnc($this->input->post("penghubung2"));
		$katakunci1  = clsnc($this->input->post("katakunci1"));
		$katakunci2  = clsnc($this->input->post("katakunci2"));
		if ($field1=="")
		{	
			$sesmember = $this->session->userdata('sesusersin');
			if ($sesmember!="") {
				$field1 = $sesmember["field1"];
				$field2 = $sesmember["field2"];
				$penghubung1 = $sesmember["penghubung1"];
				$penghubung2 = $sesmember["penghubung2"];
				$katakunci1 = $sesmember["katakunci1"];
				$katakunci2 = $sesmember["katakunci2"];
			}
		}
		if ($field1=="")
			$field1="nama";
		if ($field2=="")
			$field2="nama";
		if ($penghubung1=="")
			$penghubung1="LIKE";
		if ($penghubung2=="")
			$penghubung2="LIKE";
		if ($katakunci1=="")
			$katakunci1="%";
		if ($katakunci2=="")
			$katakunci2="%";
		$data['field1'] = $field1;
		$data['field2'] = $field2;
		$data['penghubung1'] = $penghubung1;
		$data['penghubung2'] = $penghubung2;
		$data['katakunci1'] = $katakunci1;
		$data['katakunci2'] = $katakunci2;
		$ses["sesusersin"] = $data;
		$this->session->set_userdata($ses);
		$data['tipe']=$tipe;

		$data['query'] = $this->usersinmd->exportexcel($data)->result();
		if (count($data['query'])<1) 
        {
            ?>
            <script type="text/javascript">
             alert("Maaf, tidak ada data");
             window.location.href="<?php echo base_url().'admin/usersinct';?>";
             </script>
             <?php
        }
        else 
        {	    
			$this->load->view('admin/usersinxc',$data);
		}	    
    }	
}
