<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baseweb extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('master_model');
    }
	public function index()
	{
		if($this->session->uid){
			$data['page']="home";
			$data['title']="Home";			
		}else{
			$data['page']="form_login";
			$data['title']="Login Page";
		}
		$this->load->view('template',$data);
	}
	public function staf_kelas_karyawan(){
		$data['title']="Staf Kelas Karyawan";
		$data['page']="staf_kelas_karyawan";
		$this->load->view('template',$data);
	}
	public function knoledge($page="1",$limit="3"){
		$data['kword']=$this->session->knowledge;
		if($this->input->post('keyword')!="" && $this->input->post('submit')=="Search"){
			$newdata = array(
				'knowledge'  => $this->input->post('keyword')
			);
			$this->session->set_userdata($newdata);
			$data['kword']=$this->input->post('keyword');
		}
		if($this->input->post('reset')=="Reset"){
			$newdata = array(
				'knowledge'  => ""
			);
			$this->session->set_userdata($newdata);
			$data['kword']="";
		}
		$table = "v_data_dokumen_video_audio";
		$data['page']="knoledge";
		$data['title']="Knowledge";
		$limit_calcul = $page*$limit;
		if($data['kword']!=""){
			$where = "";
			$like = array("download_titel"=>$data['kword']);
			$data['knowledge']['data']=$this->master_model->get_page_where($table,$where,$like,$page,$limit_calcul);
			$data['knowledge']['total']=$this->master_model->get_total_all_where($table,$where,$like);
		}else{
			$data['knowledge']['data']=$this->master_model->get_page($table,$page,$limit_calcul);
			$data['knowledge']['total']=$this->master_model->get_total_all($table);
		}
		$data['knowledge']['show_more']=(($page*$limit) < $data['knowledge']['total'])?true:false;
		$data['page_now'] = $page;
		$this->load->view('template',$data);
	}
	public function administrator(){
		$data['page']="administrator";
		$data['title']="Administrator";
		$this->load->view('template',$data);
	}
}
