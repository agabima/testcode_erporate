<?php
class Settingmd extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function getemailsender()
        {
                $hasil=$this->db->get('setting');
                foreach ($hasil->result() as $row) {
                        return $row->namasender;
                }
        }
        function kategori_home()
        {
                $this->db->order_by("urutan");
                $this->db->where("urutanhome >", 0);
                return $this->db->get('kategori');
        }

        public function get_last_ten_entries()
        {
                $query = $this->db->get('entries', 10);
                return $query->result();
        }

        public function insert_entry()
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('entries', $this);
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

}
?>