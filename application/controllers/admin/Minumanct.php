<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Minumanct extends CI_Controller 
{

	public function __construct()
	{
		parent:: __construct();

		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('admin/minumanmd');
		$this->load->model('admin/Usersinmd');
	}
  function importdata() {
		$data['username'] = $this->session->userdata('username');
		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu');
		$this->load->view('admin/minumanimp');
		$this->load->view('admin/footer');

  }

	//start tampil (Read) kategori
	public function index($id=NULL)
	{	
		if ($id==NULL)
		{
//			$this->session->unset_userdata('sesminuman');
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
			$sesmember = $this->session->userdata('sesminuman');
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
			$sesmember = $this->session->userdata('sesminuman');
			if ($perpage=="" && isset($sesmember["perpage"]))
				$perpage=$sesmember["perpage"];
		}
		if ($perpage=="")
			$perpage=10;		
		if ($field1=="")
			$field1="minuman";
		if ($field2=="")
			$field2="minuman";
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
		$ses["sesminuman"] = $data;
		$this->session->set_userdata($ses);
		$jml = $this->minumanmd->cari_berdasarkan_katakunci1_katakunci2_count($data);
		//pengaturan pagination
		 $config['base_url'] = base_url().'admin/Minumanct/index';
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
		 $data['query'] = $this->minumanmd->ambil_member($data,$config['per_page'], $offset);
		 $this->load->view('admin/header',$data);
		 $this->load->view('admin/menu');
		 $this->load->view('admin/Minumanvw');
		 $this->load->view('admin/footer');
	}
	public function tambah()
	{
		$data['username'] = $this->session->userdata('username');
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu');
		$this->load->view('admin/minumantambah');
		$this->load->view('admin/footer');
	}
	//end tampilan tambah member

	
	//proses tambah member
	public function proses_tambah()
	{
		$data["minuman"] = clsnc($_POST["minuman"]);
$data["harga_minuman"] = clsnc($_POST["harga_minuman"]);
$data["tglupdate"] = date("Y-m-d H:i:s");
$data["opupdate"] = $this->session->userdata("username");

		 $this->minumanmd->tambah_member($data);
		 ?>
		 <script type="text/javascript">
//		 alert("Data MINUMAN berhasil di Tambahkan");
		 window.location.href="<?php echo base_url().'admin/minumanct';?>";
		 </script>
		 <?php
		
	}

	public function ubah($id)
	{
		$data['username'] = $this->session->userdata('username');
		$data['member'] = $this->minumanmd->get_one($id)->row();	
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu');
		$this->load->view('admin/minumanubah');
		$this->load->view('admin/footer');
	}
	public function proses_ubah($idmember)
	{
//		$data['member'] = $this->minumanmd->get_one($idmember)->row();

		$data["minuman"] = clsnc($_POST["minuman"]);
$data["harga_minuman"] = clsnc($_POST["harga_minuman"]);
$data["tglupdate"] = date("Y-m-d H:i:s");
$data["opupdate"] = $this->session->userdata("username");

			 $this->minumanmd->update_member($data,$idmember);
			 ?>
			 <script type="text/javascript">
//			 alert("Data MINUMAN berhasil di Ubah");
			 window.location.href="<?php echo base_url().'admin/minumanct';?>";
			 </script>
			 <?php		
		
	}

	public function hapus($id)
    {    	
        $this->minumanmd->hapus_member($id);
        ?>
		<script type="text/javascript">
		alert("Data MINUMAN berhasil di Hapus");
		window.location.href="<?php echo base_url().'admin/minumanct';?>";
		</script>
		<?php
    }
	

	public function csv()
    { 
    	$sesmember = $this->session->userdata('sesminuman');

		$this->load->dbutil();
	    $this->load->helper('file');
	    $this->load->helper('download');
	    $delimiter = ";";
	    $newline = "\r\n";
	    $filename = "MINUMAN.csv";
	    $field1 	 = clsnc($this->input->post("field1"));
		$field2 	 = clsnc($this->input->post("field2"));
		$penghubung1 = clsnc($this->input->post("penghubung1"));
		$penghubung2 = clsnc($this->input->post("penghubung2"));
		$katakunci1  = clsnc($this->input->post("katakunci1"));
		$katakunci2  = clsnc($this->input->post("katakunci2"));
		if ($field1=="")
		{	
			$sesmember = $this->session->userdata('sesminuman');
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
			$field1="minuman";
		if ($field2=="")
			$field2="minuman";
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
		$ses["sesminuman"] = $data;
		$this->session->set_userdata($ses);

		$query = $this->minumanmd->exportcsv($data);
	    
	    $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
	    force_download($filename, $data);
    }	
    public function excel($tipe)
    { 
    	$sesmember = $this->session->userdata('sesminuman');

	    $field1 	 = clsnc($this->input->post("field1"));
		$field2 	 = clsnc($this->input->post("field2"));
		$penghubung1 = clsnc($this->input->post("penghubung1"));
		$penghubung2 = clsnc($this->input->post("penghubung2"));
		$katakunci1  = clsnc($this->input->post("katakunci1"));
		$katakunci2  = clsnc($this->input->post("katakunci2"));
		if ($field1=="")
		{	
			$sesmember = $this->session->userdata('sesminuman');
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
			$field1="minuman";
		if ($field2=="")
			$field2="minuman";
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
		$ses["sesminuman"] = $data;
		$this->session->set_userdata($ses);
		$data['tipe']=$tipe;

		$data['query'] = $this->minumanmd->exportexcel($data)->result();
		if (count($data['query'])<1) 
        {
            ?>
            <script type="text/javascript">
             alert("Maaf, tidak ada data");
             window.location.href="<?php echo base_url().'admin/minumanct';?>";
             </script>
             <?php
        }
        else 
        {	    
			$this->load->view('admin/minumanxc',$data);
		}	    
    }	
}
