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
		$data['title']="User";
		$this->load->view('template',$data);
	}
	public function edit(){
		$data['page']="edit";
		$data['title']="Edit User";
		$data['val']=$this->master_model->get_one("data_user",array("id"=>$this->session->uid));
		$this->load->view('template',$data);
	}
	public function save_edit(){
		$data['title']="Edit User";
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
		$data['title']="Forums";
		$this->load->view('template',$data);
	}
	public function managemen_dokumen(){
		$data['page']="managemen_dokumen";
		$data['title']="Management Dokumen";
		$data['dokumen']=$this->master_model->get_all("data_dokumen");
		$this->load->view('template',$data);
	}
	public function form_file(){
		$data['page']="submit_file";
		$data['title']="Submit Dokumen";
		$this->load->view('template',$data);
	}
	public function upload_file(){
		$this->set_validation_upload_file();
		if($this->form_validation->run() == FALSE){
            $data['page']="submit_file";
        } else { 
			$data = array(
                'name'    	=> $this->input->post('name'),
                'email'  => $this->input->post('email'),
                'author_name'  => $this->input->post('author_name'),
                'author_website'  => $this->input->post('author_website'),
                'download_titel'  => $this->input->post('download_titel')
            );
			
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'zip|rar|doc|docx|pdf';
			$config['max_size']             = 2048;
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('file_upload')){
					$error = array('error' => $this->upload->display_errors());
					//Redirect to pages error
					redirect(base_url()."user/form_file?pesan=".$error['error']."&type=error");
			}else{
				$data_upload = $this->upload->data();
				$data['file'] = $data_upload['file_name'];
				$data['size_file'] = $data_upload['file_size'];
				//Table Update
				$this->master_model->insert("data_dokumen",$data);
				//Redirect to pages success
				redirect(base_url()."user/managemen_dokumen?pesan=Submit File kamu berhasil...&type=sukses");
			}
		}
		$this->load->view('template',$data);
	}
	public function managemen_video(){
		$data['page']="managemen_video";
		$data['title']="Management Video";
		$data['video']=$this->master_model->get_all_where("data_video",array("acces"=>"true"));
		$data['video_play_now']=array('file'=>"");
		$this->load->view('template',$data);
	}
	public function form_video(){
		$data['page']="upload_video";
		$data['title']="Upload Video";
		$this->load->view('template',$data);
	}
	public function upload_video(){
		$this->set_validation_upload_video();
		if($this->form_validation->run() == FALSE){
            $data['page']="upload_video";
        } else { 
			$data = array(
                'tags'    	=> $this->input->post('tags'),
                'desc'  => $this->input->post('desc'),
                'acces'  => $this->input->post('acces'),
                'acces_download'  => $this->input->post('acces_download'),
                'download_titel'  => $this->input->post('download_titel')
            );
			
			$config['upload_path']          = './uploads/video/';
			$config['allowed_types']        = 'mp4';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('file_upload')){
					$error = array('error' => $this->upload->display_errors());
					//Redirect to pages error
					redirect(base_url()."user/form_video?pesan=".$error['error']."&type=error");
			}else{
				$data_upload = $this->upload->data();
				$data['file'] = $data_upload['file_name'];
				$data['size_file'] = $data_upload['file_size'];
				//Table Update
				$this->master_model->insert("data_video",$data);
				//Redirect to pages success
				redirect(base_url()."user/managemen_video?pesan=Upload Video kamu berhasil...&type=sukses");
			}
		}
		$this->load->view('template',$data);
	}
	public function play_now($id){
		$data['page']="managemen_video";
		$data['title']="Management Video";
		$data['video_play_now']=$this->master_model->get_one("data_video",array("id"=>$id));
		$data['video']=$this->master_model->get_all_where("data_video",array("acces"=>"true"));
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
	public function set_validation_upload_file(){
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('author_name','Author Name','trim|required');
		$this->form_validation->set_rules('author_website','Author Website','trim|required');
		$this->form_validation->set_rules('download_title','Download Title','trim|required');
		if(empty($_FILES['file_upload']['name'])){
			$this->form_validation->set_rules('file_upload','File','required');
		}
	}
	public function set_validation_upload_video(){
		$this->form_validation->set_rules('acces_download','Access Dwonload','trim|required');
		$this->form_validation->set_rules('desc','Description','trim|required');
		$this->form_validation->set_rules('tags','Keywords','trim|required');
		$this->form_validation->set_rules('acces','Access View','trim|required');
		$this->form_validation->set_rules('download_titel','Download Title','trim|required');
		if(empty($_FILES['file_upload']['name'])){
			$this->form_validation->set_rules('file_upload','File','required');
		}
	}
}