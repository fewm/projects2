<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

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
		$data['page']="pesan";
		$this->load->view('template',$data);
	}
	public function pesan_baru(){
		$data['page']="pesan_baru";
		$this->load->view('template',$data);
	}
	public function kontak_masuk(){
		$data['page']="kontak_masuk";
		$this->load->view('template',$data);
	}
	public function kontak_keluar(){
		$data['page']="kontak_keluar";
		$this->load->view('template',$data);
	}
}
