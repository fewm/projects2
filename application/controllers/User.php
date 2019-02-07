<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('master_model');
        // Your own constructor code
    }
	public function index()
	{
		$data['page']="user";
		$this->load->view('template',$data);
	}
	public function edit(){
		$data['page']="edit";
		$data['val']=$this->master_model->get_one("data_user",array("id"=>$this->session->uid));
		$this->load->view('template',$data);
	}
	public function save_edit(){
		$this->set_validation($this->input->post("password"));
		$data['val']=$this->master_model->get_one("data_user",array("id"=>$this->session->uid));
		if($this->form_validation->run() == FALSE){
            $data['page']="edit";
        } else {
            //Create Data Array
            $data = array(
                'name'    	=> $this->input->post('nama'),
                'username'  => $this->input->post('username'),
                'password'  => md5($this->input->post('password')),
                'email'     => $this->input->post('email')
            );
			if($this->input->post('old_password')!="" or $this->input->post('password')!=""){
				$where = array("password"=>md5($this->input->post('old_password')),"id"=>$this->session->uid);
				$checkoldpwd = $this->master_model->get_one("data_user",$where);
				if($checkoldpwd['id']!=""){
					//Table Update
					$this->master_model->update("data_user",$data,array("id"=>$this->session->uid));
					//Redirect to pages success
					redirect(base_url()."user/edit?pesan=Data kamu berhasil diedit...&type=sukses");
				}else{
					//Redirect to pages error
					redirect(base_url()."user/edit?pesan=Password lama yang kamu masukan salah, silahka coba kembali!!!&type=error");
				}
			}else{
				unset($data['password']);
				//Table Update
				$this->master_model->update("data_user",$data,array("id"=>$this->session->uid));
				//Redirect to pages success
				redirect(base_url()."user/edit?pesan=Data kamu berhasil diedit...&type=sukses");
			}
        }
		$this->load->view('template',$data);
	}
	public function forum(){
		$data['page']="forum";
		$this->load->view('template',$data);
	}
	public function managemen_dokumen(){
		$data['page']="managemen_dokumen";
		$this->load->view('template',$data);
	}
	public function managemen_video(){
		$data['page']="managemen_video";
		$this->load->view('template',$data);
	}
	public function set_validation($opsi=""){
		$this->form_validation->set_rules('nama','First Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
		if($opsi!=""){
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');
		}
	}
}