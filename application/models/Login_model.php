<?php
class Login_model extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function get_one($table,$where)
        {
			$this->db->limit(1);
            $query = $this->db->get_where($table, $where);
            return $query->row_array();
        }

        public function insert($table,$data)
        {
                $this->db->insert($table, $data);
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