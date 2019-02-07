<?php
class Master_model extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function get_one($table,$where)
        {
			$this->db->limit(1);
            $query = $this->db->get_where($table, $where);
            return $query->row_array();
        }
        public function get_all($table)
        {
            $query = $this->db->get($table);
            return $query->result();
        }
        public function get_all_where($table, $where)
        {
            $query = $this->db->get_where($table, $where);
            return $query->result();
        }
        public function insert($table,$data)
        {
            $this->db->insert($table, $data);
        }
        public function update($table,$data,$where)
        {
            $this->db->update($table, $data, $where);
        }

}
?>