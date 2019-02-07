<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->model('master_model');
        // Your own constructor code
    }
	public function index()
	{
		$data['page']="pesan";
		$this->load->view('template',$data);
	}
	public function pesan_baru(){
		$data['page']="pesan_baru";
		$data['user']=$this->master_model->get_all("data_user");
		$this->load->view('template',$data);
	}
	public function save_pesan(){
		$this->set_validation();
		if($this->form_validation->run() == FALSE){
            $data['page']="pesan_baru";
        } else {
            //Create Data Array
			$email[] = $this->input->post("kepada");
			if(!empty($email)){
				foreach($email as $val){
					$data_insert = array(
						'email_from' => $this->session->email,
						'email'      => $val,
						'subject'   => $this->input->post('subject'),
						'pesan'   => $this->input->post('pesan')
					);
					//Table Insert
					$this->master_model->insert("data_pesan",$data_insert);
					redirect(base_url()."pesan/pesan_baru?pesan=Pesan berhasil dikirim...&type=sukses");
				}
			}else{
				redirect(base_url()."pesan/pesan_baru?pesan=Pesan gagal dikirim...&type=error");
			}
        }
		$data['page']="pesan_baru";
		$data['user']=$this->master_model->get_all("data_user");
		$this->load->view('template',$data);
	}
	public function kontak_masuk(){
		$data['page']="kontak_masuk";
		$data['pesan']=$this->master_model->get_all("data_pesan",array("email",$this->session->email));
		$this->load->view('template',$data);
	}
	public function kontak_keluar(){
		$data['page']="kontak_keluar";
		$data['pesan']=$this->master_model->get_all("data_pesan",array("email_from",$this->session->email));
		$this->load->view('template',$data);
	}
	public function set_validation(){
		$this->form_validation->set_rules('kepada','Email To','trim|required');
		$this->form_validation->set_rules('subject','Subject','trim|required|max_length[160]');
		$this->form_validation->set_rules('pesan','Pesan','trim|required|min_length[3]|max_length[160]');
	}
}
