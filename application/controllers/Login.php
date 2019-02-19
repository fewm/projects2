<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('login_model');
        // Your own constructor code
    }
	public function index()
	{
		$where = array(
            'username'  => $this->input->post('username'),
            'password'  => md5($this->input->post('password'))
        );
		$data_get = $this->login_model->get_one("data_user",$where);
		if(!empty($data_get['id'])){
			//Create Session
			$newdata = array(
				'uid'  => $data_get['id'],
				'logged_in' => TRUE,
				'email' => $data_get['email'],
				'level' => $data_get['status'],
				'uname' => $data_get['username']
			);
			$this->session->set_userdata($newdata);
			redirect(base_url()."?pesan=Login berhasil, Kamu sekarang dapat menggunakan Aplikasi sepenuhnya!!!&type=sukses");
		}else{
			redirect(base_url()."?pesan=Login Gagal, Username atau Password salah!!!&type=error");
		}
	}
	public function registrasi(){
		$data['title']="Registrasi";
		$data['page']="registrasi";
		$this->load->view('template',$data);
	}
	public function do_registrasi(){
		$this->set_validation();
		if($this->form_validation->run() == FALSE){
            $data['page']="registrasi";
        } else {
            //Create Data Array
            $data = array(
                'name'    	=> $this->input->post('nama'),
                'username'  => $this->input->post('username'),
                'password'  => md5($this->input->post('password')),
                'email'     => $this->input->post('email')
            );

            //Table Insert
            $this->login_model->insert("data_user",$data);

            //Redirect to pages
            redirect(base_url()."?pesan=Registrasi berhasil, silahkan login!!!&type=sukses");
        }
		$this->load->view('template',$data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url()."?pesan=Logout berhasil, Terima kasih telah menggunakan Aplikasi sepenuhnya!!!&type=sukses");
	}
	public function set_validation(){
		$this->form_validation->set_rules('nama','First Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');	}
	}
