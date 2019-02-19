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
	public function edit($table="",$id=""){
		if($table==""){
			$data['page']="edit";
			$data['title']="Edit User";
			$data['val']=$this->master_model->get_one("data_user",array("id"=>$this->session->uid));
		}else{
			$arrtable = array("data_dokumen"=>array("edit_dokumen","Edit Dokumen"),"data_video"=>array("edit_video","Edit Video"),"data_audio"=>array("edit_audio","Edit Audio"));
			$data['page']=$arrtable[$table][0];
			$data['title']=$arrtable[$table][1];
			$data['val']=$this->master_model->get_one($table,array("id"=>$id));
		}
		$this->load->view('template',$data);
	}
	public function save_edit(){
		$data['title']="Edit User";
		$this->set_validation($this->input->post("password"));
		$data['val']=$this->master_model->get_one("data_user",array("id"=>$this->session->uid));
		if($this->form_validation->run() == FALSE){
            $data['page']="edit";
        } else {
			if($this->input->post('id')!=""){
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
						$this->master_model->update("data_user",$data,array("id"=>$this->input->post('id')));
						//Redirect to pages success
						redirect(base_url()."user/edit?pesan=Data kamu berhasil diedit...&type=sukses");
					}else{
						//Redirect to pages error
						redirect(base_url()."user/edit?pesan=Password lama yang kamu masukan salah, silahka coba kembali!!!&type=error");
					}
				}else{
					unset($data['password']);
					//Table Update
					$this->master_model->update("data_user",$data,array("id"=>$this->input->post('id')));
					//Redirect to pages success
					redirect(base_url()."user/edit?pesan=Data kamu berhasil diedit...&type=sukses");
				}
			}else{
				$data = array(
					'name'    	=> $this->input->post('nama'),
					'username'  => $this->input->post('username'),
					'password'  => md5($this->input->post('password')),
					'status'    => $this->input->post('status'),
					'email'     => $this->input->post('email')
					);
				$this->master_model->insert("data_user",$data);
				redirect(base_url()."user/managemen_user?pesan=Data kamu berhasil ditambah...&type=sukses");
			}
        }
		$this->load->view('template',$data);
	}
	public function save_add(){
		$this->set_validation($this->input->post("password"));
		if($this->form_validation->run() == FALSE){
			$data['page']="add";
			$data['title']="Penambahan User";
        } else {
			$data = array(
				'name'    	=> $this->input->post('nama'),
				'username'  => $this->input->post('username'),
				'password'  => md5($this->input->post('password')),
				'status'    => $this->input->post('status'),
				'email'     => $this->input->post('email')
			);
			$this->master_model->insert("data_user",$data);
			$this->set_validation($this->input->post("password"));
			redirect(base_url()."user/managemen_user?pesan=Data kamu berhasil ditambah...&type=sukses");
		}
		$this->load->view('template',$data);
	}
	public function add_user(){
		$data['page']="add";
		$data['title']="Penambahan User";
		$data['val']="";
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
		$data['dokumen']=$this->master_model->get_all_where("data_dokumen",array("name"=>$this->session->uname));
		$this->load->view('template',$data);
	}
	public function form_file(){
		$data['page']="submit_file";
		$data['title']="Submit Dokumen";
		$this->load->view('template',$data);
	}
	public function upload_file(){
		$id = empty($this->input->post('id'))?"":$this->input->post('id');
		$msg = empty($id)?"Submit File kamu berhasil...":"Update data File kamu berhasil...";
		$this->set_validation_upload_file($id);
		if($this->form_validation->run() == FALSE){
            $data['page']=$id==""?"submit_file":"edit_dokumen";
        } else { 
			$data = array(
                'name'    	=> $this->session->uname,
                'email'  => $this->input->post('email'),
                'author_name'  => $this->input->post('author_name'),
                'author_website'  => $this->input->post('author_website'),
                'download_titel'  => $this->input->post('download_titel')
            );
			
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'pdf|PDF';
			$config['max_size']             = 20048;
			$this->load->library('upload', $config);
			if(!empty($_FILES['file_upload']['name'])){
				if ( ! $this->upload->do_upload('file_upload')){
						$error = array('error' => $this->upload->display_errors());
						//Redirect to pages error
						redirect(base_url()."user/form_file?pesan=".$error['error']."&type=error");
				}else{
					$data_upload = $this->upload->data();
					$data['file'] = $data_upload['file_name'];
					$data['size_file'] = $data_upload['file_size'];
					//Table Update
					if($id!=""){
						$this->master_model->update("data_dokumen",$data,array("id"=>$id));
					}else{
						$this->master_model->insert("data_dokumen",$data);
					}
						//Redirect to pages success
					redirect(base_url()."user/managemen_dokumen?pesan=".$msg."&type=sukses");
				}
			}else{
				if($id!=""){
					$this->master_model->update("data_dokumen",$data,array("id"=>$id));
				}else{
					$this->master_model->insert("data_dokumen",$data);
				}
				//Redirect to pages success
				redirect(base_url()."user/managemen_dokumen?pesan=".$msg."&type=sukses");
			}
		}
		$this->load->view('template',$data);
	}
	public function managemen_video(){
		$data['page']="managemen_video";
		$data['title']="Management Video";
		$data['kword']="";
		$keyword = !empty($this->input->post("keyword"))?$this->input->post("keyword"):"";
		if($keyword != ""){
			$data['video']=$this->master_model->get_all_where("data_video",array("acces"=>"true","name"=>$this->session->uname),array("tags"=>$keyword,"download_titel"=>$keyword));
			$data['kword']=$keyword;
		}else{
			$data['video']=$this->master_model->get_all_where("data_video",array("acces"=>"true","name"=>$this->session->uname));
		}
		$data['video_play_now']=array('file'=>"");
		$this->load->view('template',$data);
	}
	public function form_video(){
		$data['page']="upload_video";
		$data['title']="Upload Video";
		$this->load->view('template',$data);
	}
	public function upload_video(){
		$id = empty($this->input->post('id'))?"":$this->input->post('id');
		$msg = empty($id)?"Upload Video kamu berhasil":"Update Video kamu berhasil";
		$this->set_validation_upload_video($id);
		if($this->form_validation->run() == FALSE){
			if($id!=""){
				$data['val']=$this->master_model->get_one("data_video",array("id"=>$id));
			}
            $data['page']=$id==""?"upload_video":"edit_video";
        } else { 
			$data = array(
                'name'    	=> $this->session->uname,
                'tags'    	=> $this->input->post('tags'),
                'desc'  => $this->input->post('desc'),
                'acces'  => $this->input->post('acces'),
                'acces_download'  => $this->input->post('acces_download'),
                'download_titel'  => $this->input->post('download_titel')
            );
			
			$config['upload_path']          = './uploads/video/';
			$config['allowed_types']        = 'mp4|MP4';
			$this->load->library('upload', $config);
			if(!empty($_FILES['file_upload']['name'])){
				if ( ! $this->upload->do_upload('file_upload')){
						$error = array('error' => $this->upload->display_errors());
						//Redirect to pages error
						redirect(base_url()."user/form_video?pesan=".$error['error']."&type=error");
				}else{
					$data_upload = $this->upload->data();
					$data['file'] = $data_upload['file_name'];
					$data['size_file'] = $data_upload['file_size'];
					//Table Update
					if($id!=""){
						$this->master_model->update("data_video",$data,array("id"=>$id));
					}else{
						$this->master_model->insert("data_video",$data);
					}
					//Redirect to pages success
					redirect(base_url()."user/managemen_video?pesan=".$msg."...&type=sukses");
				}
			}else{
				if($id!=""){
					$this->master_model->update("data_video",$data,array("id"=>$id));
				}else{
					$this->master_model->insert("data_video",$data);
				}
				redirect(base_url()."user/managemen_video?pesan=".$msg."...&type=sukses");
			}
		}
		$this->load->view('template',$data);
	}
	public function play_now($id){
		$data['kword']="";
		$data['page']="managemen_video";
		$data['title']="Management Video";
		$data['video_play_now']=$this->master_model->get_one("data_video",array("id"=>$id));
		$data['video']=$this->master_model->get_all_where("data_video",array("acces"=>"true"));
		$this->load->view('template',$data);
	}
	public function managemen_audio(){
		$data['page']="managemen_audio";
		$data['title']="Management Audio";
		$data['kword']="";
		$keyword = !empty($this->input->post("keyword"))?$this->input->post("keyword"):"";
		if($keyword != ""){
			$data['audio']=$this->master_model->get_all_where("data_audio",array("acces"=>"true"),array("tags"=>$keyword,"download_titel"=>$keyword));
			$data['kword']=$keyword;
		}else{
			$data['audio']=$this->master_model->get_all_where("data_audio",array("acces"=>"true","name"=>$this->session->uname));
		}
		$data['audio_play_now']=array('file'=>"");
		$this->load->view('template',$data);
	}
	public function form_audio(){
		$data['page']="upload_audio";
		$data['title']="Upload Audio";
		$this->load->view('template',$data);
	}
	public function upload_audio(){
		$id = empty($this->input->post('id'))?"":$this->input->post('id');
		$msg = empty($id)?"Upload audio kamu berhasil":"Update audio kamu berhasil";
		$this->set_validation_upload_video($id);
		if($this->form_validation->run() == FALSE){
			if($id!=""){
				$data['val']=$this->master_model->get_one("data_audio",array("id"=>$id));
			}
            $data['page']=$id==""?"upload_audio":"edit_audio";
        } else {
			$data = array(
                'name'    	=> $this->session->uname,
                'tags'    	=> $this->input->post('tags'),
                'desc'  => $this->input->post('desc'),
                'acces'  => $this->input->post('acces'),
                'acces_download'  => $this->input->post('acces_download'),
                'download_titel'  => $this->input->post('download_titel')
            );			
			$config['upload_path']          = './uploads/audio/';
			$config['allowed_types']        = 'mp3';
			$this->load->library('upload', $config);
			if(!empty($_FILES['file_upload']['name'])){
				if ( ! $this->upload->do_upload('file_upload')){
						$error = array('error' => $this->upload->display_errors());
						//Redirect to pages error
						redirect(base_url()."user/form_audio?pesan=".$error['error']."&type=error");
				}else{
					$data_upload = $this->upload->data();
					$data['file'] = $data_upload['file_name'];
					$data['size_file'] = $data_upload['file_size'];
					if($id!=""){
						$this->master_model->update("data_audio",$data,array("id"=>$id));
					}else{
						$this->master_model->insert("data_audio",$data);
					}
					redirect(base_url()."user/managemen_audio?pesan=".$msg."...&type=sukses");
				}
			}else{
				if($id!=""){
					$this->master_model->update("data_audio",$data,array("id"=>$id));
				}else{
					$this->master_model->insert("data_audio",$data);
				}
				redirect(base_url()."user/managemen_audio?pesan=".$msg."...&type=sukses");
			}
		}
		$this->load->view('template',$data);
	}
	public function play_now_audio($id){
		$data['kword']="";
		$data['page']="managemen_audio";
		$data['title']="Management Audio";
		$data['audio_play_now']=$this->master_model->get_one("data_audio",array("id"=>$id));
		$data['audio']=$this->master_model->get_all_where("data_audio",array("acces"=>"true"));
		$this->load->view('template',$data);
	}
	public function managemen_user(){
		$data['page']="managemen_user";
		$data['title']="Management User";
		if($this->session->level!='1'){			
			$data['user']=$this->master_model->get_all("data_user");
		}else{
			$data['user']=$this->master_model->get_all_where("data_user",array("status"=>'0'));
		}
		$this->load->view('template',$data);
	}
	public function edit_user($id=""){
		if($id!=""){
			$data['title']="Edit User";
			$data['val']=$this->master_model->get_one("data_user",array("id"=>$id));
		}else{
			$data['title']="Penambahan User";
			$data['val']="";
		}
		$data['page']="edit";
		$this->load->view('template',$data);
	}
	public function hapus_user($id=""){
		$this->master_model->delete_where("data_user",array("id"=>$id));
		redirect(base_url()."user/managemen_user?pesan=Penghapusan user berhasil...&type=sukses");
		
	}
	public function delete($table="",$id=""){
		$arrtable = array("data_dokumen"=>array("managemen_dokumen","Dokumen"),"data_video"=>array("managemen_video","Video"),"data_audio"=>array("managemen_audio","Audio"));
		$this->master_model->delete_where($table,array("id"=>$id));
		redirect(base_url()."user/".$arrtable[$table][0]."?pesan=Penghapusan data ".$arrtable[$table][1]." berhasil...&type=sukses");
		
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
	public function set_validation_upload_file($checkfile=""){
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('author_name','Author Name','trim|required');
		$this->form_validation->set_rules('author_website','Author Website','trim|required');
		$this->form_validation->set_rules('download_titel','Title','trim|required');
		if(empty($_FILES['file_upload']['name']) && $checkfile==""){
			$this->form_validation->set_rules('file_upload','File','required');
		}
	}
	public function set_validation_upload_video($checkfile=""){
		$this->form_validation->set_rules('acces_download','Access Dwonload','trim|required');
		$this->form_validation->set_rules('desc','Description','trim|required');
		$this->form_validation->set_rules('tags','Keywords','trim|required');
		$this->form_validation->set_rules('acces','Access View','trim|required');
		$this->form_validation->set_rules('download_titel','Download Title','trim|required');
		if(empty($_FILES['file_upload']['name']) && $checkfile==""){
			$this->form_validation->set_rules('file_upload','File','required');
		}
	}
}