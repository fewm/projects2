<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baseweb extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['page']="home";
		$data['title']="Home";
		$this->load->view('template',$data);
	}
	public function staf_kelas_karyawan(){
		$data['title']="Staf Kelas Karyawan";
		$data['page']="staf_kelas_karyawan";
		$this->load->view('template',$data);
	}
	public function knoledge(){
		$data['page']="knoledge";
		$data['title']="Knoledge";
		$this->load->view('template',$data);
	}
	public function administrator(){
		$data['page']="administrator";
		$data['title']="Administrator";
		$this->load->view('template',$data);
	}
}
