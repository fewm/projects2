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
        public function get_all_where($table, $where, $kword="")
        {
			if($kword!=""){
				foreach($kword as $k => $v){
					$this->db->or_like($k,$v);
				}
            }
            if($where!=""){
                $query = $this->db->get_where($table, $where);
            }else{
                $query = $this->db->get($table);
            }
            return $query->result();
        }
        public function get_page($table,$page,$limit)
        {
            $this->db->order_by("time_stamp","desc");
            $this->db->limit($limit);
            $query = $this->db->get($table);
            return $query->result();
        }
        public function get_page_where($table,$where,$kword="",$page,$limit)
        {
			if($kword!=""){
				foreach($kword as $k => $v){
					$this->db->or_like($k,$v);
				}
			}
            $this->db->order_by("time_stamp","desc");
            $this->db->limit($limit);
            if($where!=""){
                $query = $this->db->get_where($table, $where);
            }else{
                $query = $this->db->get($table);
            }
            return $query->result();
        }
        public function get_total_all($table)
        {
            $query = $this->db->query("select count(*) as total from ".$table." ")->row_array();
            return $query['total'];
        }
        public function get_total_all_where($table,$where,$kword)
        {
			if($kword!=""){
				foreach($kword as $k => $v){
					$this->db->or_like($k,$v);
				}
			}
            $query = $this->db->query("select count(*) as total from ".$table." ")->row_array();
            return $query['total'];
        }
        public function insert($table,$data)
        {
            $this->db->insert($table, $data);
        }
        public function update($table,$data,$where)
        {
            $this->db->update($table, $data, $where);
        }
		public function delete_where($table, $where)
		{
			$this->db->delete($table,$where);
		}

}
?>