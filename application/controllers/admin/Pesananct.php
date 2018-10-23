<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pesananct extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();

		date_default_timezone_set('Asia/Jakarta');
        $this->load->model('admin/pesananmd');
		$this->load->model("admin/makananmd");
$this->load->model("admin/minumanmd");
$this->load->model('admin/Usersinmd');

        //$this->load->model('admin/settingmd');

    }
  function importdata() {
		$data['username'] = $this->session->userdata('username');
		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu');
		$this->load->view('pesananimp');
		$this->load->view('admin/footer');

  }

    //start tampil (Read) member
    public function index($id=NULL)
    {
		if ($id==NULL)
		{
//			$this->session->unset_userdata('sespesanan');
		}
		$perpage=clsnc($this->input->post("perpage"));
        $data['username'] = $this->session->userdata('username');
        $tanggal        = clsnc($this->input->post("rangeTanggal"));
        $periode_awal   = substr($tanggal, 0,10);
        $periode_akhir  = substr($tanggal, 13,10);

        //ubah periode menjadi Y-m-d
        $periode_awal    = date("Y-m-d",strtotime($periode_awal));
        $periode_akhir   = date("Y-m-d",strtotime($periode_akhir)); 
        
        $field1      = clsnc($this->input->post("field1"));
        $field2      = clsnc($this->input->post("field2"));
        $penghubung1 = clsnc($this->input->post("penghubung1"));
        $penghubung2 = clsnc($this->input->post("penghubung2"));
        $katakunci1  = clsnc($this->input->post("katakunci1"));
        $katakunci2  = clsnc($this->input->post("katakunci2"));
        if ($field1=="")
        {   
            $sestransaksi = $this->session->userdata('sespesanan');
            if ($sestransaksi!="") {
                $periode_awal = $sestransaksi["periode_awal"];
                $periode_akhir = $sestransaksi["periode_akhir"];
                $field1 = $sestransaksi["field1"];
                $field2 = $sestransaksi["field2"];
                $penghubung1 = $sestransaksi["penghubung1"];
                $penghubung2 = $sestransaksi["penghubung2"];
                $katakunci1 = $sestransaksi["katakunci1"];
                $katakunci2 = $sestransaksi["katakunci2"];
				if ($perpage=="" && isset($sestransaksi["perpage"]))
					$perpage=$sestransaksi["perpage"];
				
            }else {
				$periode_awal=date("Y-m-d");
				$periode_akhir=date("Y-m-d");
			}
        }else
		{
			$sestransaksi= $this->session->userdata('sespesanan');
			if ($perpage==""  && isset($sestransaksi["perpage"]))
				$perpage=$sestransaksi["perpage"];			
			if ($tanggal=="")
			{
				$periode_awal=date("Y-m-d");
				$periode_akhir=date("Y-m-d");
			}
		}
		if ($perpage=="")
			$perpage=10;		
        if ($field1=="")
            $field1="tglpesan";
        if ($field2=="")
            $field2="tglpesan";
        if ($penghubung1=="")
            $penghubung1="LIKE";
        if ($penghubung2=="")
            $penghubung2="LIKE";
        if ($katakunci1=="")
            $katakunci1="%";
        if ($katakunci2=="")
            $katakunci2="%";
        $data['periode_awal'] = $periode_awal;
        $data['periode_akhir'] = $periode_akhir;
        $data['field1'] = $field1;
        $data['field2'] = $field2;
        $data['penghubung1'] = $penghubung1;
        $data['penghubung2'] = $penghubung2;
        $data['katakunci1'] = $katakunci1;
        $data['katakunci2'] = $katakunci2;
		 $data['perpage'] = $perpage;
        $ses["sespesanan"] = $data;
        $this->session->set_userdata($ses);
        $jml = $this->pesananmd->cari_berdasarkan_katakunci1_katakunci2_count($data);

        //pengaturan pagination
         $config['base_url'] = base_url().'admin/pesananct/index';
         $config['total_rows'] = $jml;
         $config['per_page'] = $perpage;
         $config['first_page'] = 'Awal';
         $config['last_page'] = 'Akhir';
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
         $data['query'] = $this->pesananmd->ambil_transaksi($data,$config['per_page'], $offset);
         $this->load->view('admin/header',$data);
         $this->load->view('admin/menu');
         $this->load->view('admin/pesananvw');
         $this->load->view('admin/footer');
    }
    //end tampil (read) member

    
    public function tambah()
    {
        ini_set('memory_limit', '256M');
        
        //$data['setting'] = $this->settingmd->getall_setting()->row();
        $data['username'] = $this->session->userdata('username');        
		$data['qmakanan']=$this->makananmd->getalldata()->result();
$data['qminuman']=$this->minumanmd->getalldata()->result();

        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/pesanantambah');
        $this->load->view('admin/footer');
    }
    //end tampilan tambah member

    //proses tambah member
    public function proses_tambah()
    {
        date_default_timezone_get("Asia/Jakarta"); 
		$data["tglpesan"] = date("Y-m-d", strtotime(clsnc($this->input->post("tglpesan"))));
$data["nopesanan"] = clsnc($_POST["nopesanan"]);
$data["idmakanan"] = clsnc($_POST["idmakanan"]);
$data["idminuman"] = clsnc($_POST["idminuman"]);
$data["jumlah"] = clsnc($_POST["jumlah"]);
$data["statuspesanan"] = clsnc($_POST["statuspesanan"]);
$data["tglupdate"] = date("Y-m-d H:i:s");
$data["opupdate"] = $this->session->userdata("username");


       $this->pesananmd->tambah_transaksi($data);
          ?>
         <script type="text/javascript">
       //  alert("Data PESANAN berhasil di Tambahkan");
         window.location.href="<?php echo base_url().'admin/pesananct';?>";
         </script>
         <?php
    }

    public function ubah($id)
    {
        //$data['setting'] = $this->settingmd->getall_setting()->row();
        $data['username'] = $this->session->userdata('username');
        $data['member'] = $this->pesananmd->get_one($id)->row();
		$data['qmakanan']=$this->makananmd->getalldata()->result();
$data['qminuman']=$this->minumanmd->getalldata()->result();

        $this->load->view('admin/header',$data);
        $this->load->view('admin/menu');
        $this->load->view('admin/pesananubah');
        $this->load->view('admin/footer');
    }
    public function proses_ubah($idtrx)
    {
        date_default_timezone_get("Asia/Jakarta"); 
		$data["tglpesan"] = date("Y-m-d", strtotime(clsnc($this->input->post("tglpesan"))));
$data["nopesanan"] = clsnc($_POST["nopesanan"]);
$data["idmakanan"] = clsnc($_POST["idmakanan"]);
$data["idminuman"] = clsnc($_POST["idminuman"]);
$data["jumlah"] = clsnc($_POST["jumlah"]);
$data["statuspesanan"] = clsnc($_POST["statuspesanan"]);
$data["tglupdate"] = date("Y-m-d H:i:s");
$data["opupdate"] = $this->session->userdata("username");

         $this->pesananmd->update_transaksi($data,$idtrx);
         ?>
         <script type="text/javascript">
      //   alert("Data PESANAN berhasil di Ubah");
         window.location.href="<?php echo base_url().'admin/pesananct';?>";
         </script>
         <?php
        
    }

    public function hapus($id)
    {
        
        $this->pesananmd->hapus_transaksi($id);
         ?>
         <script type="text/javascript">
         alert("Data PESANAN berhasil di Hapus");
         window.location.href="<?php echo base_url().'admin/pesananct';?>";
         </script>
         <?php
    }

    public function excel($tipe)
    { 
        $tanggal        = clsnc($this->input->post("rangeTanggal"));
        $periode_awal   = substr($tanggal, 0,10);
        $periode_akhir  = substr($tanggal, 13,10);

        //ubah periode menjadi Y-m-d
        $periode_awal    = date("Y-m-d",strtotime($periode_awal));
        $periode_akhir   = date("Y-m-d",strtotime($periode_akhir)); 
        
        $field1      = clsnc($this->input->post("field1"));
        $field2      = clsnc($this->input->post("field2"));
        $penghubung1 = clsnc($this->input->post("penghubung1"));
        $penghubung2 = clsnc($this->input->post("penghubung2"));
        $katakunci1  = clsnc($this->input->post("katakunci1"));
        $katakunci2  = clsnc($this->input->post("katakunci2"));
        if ($field1=="")
        {   
            $sestransaksi = $this->session->userdata('sespesanan');
            if ($sestransaksi!="") {
                $periode_awal = $sestransaksi["periode_awal"];
                $periode_akhir = $sestransaksi["periode_akhir"];
                $field1 = $sestransaksi["field1"];
                $field2 = $sestransaksi["field2"];
                $penghubung1 = $sestransaksi["penghubung1"];
                $penghubung2 = $sestransaksi["penghubung2"];
                $katakunci1 = $sestransaksi["katakunci1"];
                $katakunci2 = $sestransaksi["katakunci2"];
            }
        }
        if ($tanggal=="")
        {
            $periode_awal="2011-01-01";
            $periode_akhir=date("Y-m-d");
        }
        if ($field1=="")
            $field1="tglpesan";
        if ($field2=="")
            $field2="tglpesan";
        if ($penghubung1=="")
            $penghubung1="LIKE";
        if ($penghubung2=="")
            $penghubung2="LIKE";
        if ($katakunci1=="")
            $katakunci1="%";
        if ($katakunci2=="")
            $katakunci2="%";
        $data['periode_awal'] = $periode_awal;
        $data['periode_akhir'] = $periode_akhir;
        $data['field1'] = $field1;
        $data['field2'] = $field2;
        $data['penghubung1'] = $penghubung1;
        $data['penghubung2'] = $penghubung2;
        $data['katakunci1'] = $katakunci1;
        $data['katakunci2'] = $katakunci2;
        $ses["sespesanan"] = $data;
        $this->session->set_userdata($ses);
        $data['query'] = $this->pesananmd->export($data)->result();
		$data['tipe']=$tipe;
		if (count($data['query'])<1) 
        {
            ?>
            <script type="text/javascript">
             alert("Maaf, tidak ada data");
             window.location.href="<?php echo base_url().'admin/pesananct';?>";
             </script>
             <?php
        }
        else 
        {	    
			$this->load->view('admin/pesananxc',$data);
		}	    
    }   
    
}
