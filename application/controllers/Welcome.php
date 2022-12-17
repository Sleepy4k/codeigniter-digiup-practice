<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('makanan_model','makanan');
		$this->load->helper('text');
		$this->load->helper('date');
	}

	//http://localhost/ekatalog/index.php/welcome/index
	public function index(){
		$kw = $this->input->get('search');
		$data = array();
		$limit_per_page = 2;
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->makanan->get_total();
		$data['records'] = $this->makanan->find_all();
		if(!empty($kw)) {
			$data['records'] = $this->makanan->get_total_search($kw);
		}
		if($total_records > 0) {
			$data["records"] = $this->makanan->pagination($limit_per_page, $start_index);
			if(!empty($kw)) {
				$data["records"] = $this->makanan->search($kw, $limit_per_page, $start_index);
			}
			$config['base_url'] = base_url() . "welcome/index";
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config['uri_segment'] = 3;
			$config['full_tag_open'] ='<ul class="pagination">';
			$config['full_tag_close'] = '<ul/>'; 
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['first_tag_close'] = '</span></li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="page-item"><span class="page-link>"';
			$config['prev_tag_close'] = '</span></li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['next_tag_close'] = '</span></li>';
			$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['last_tag_close'] = '</span></li>';
			$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li ckass="page-item"><span class="page-link">';
			$config['num_tag_close'] = "</span></li>";
			/*
			end
			add boostrap class and styles
			*/
			$this->pagination->initialize($config);
			//build paging links
			$data["links"] = $this->pagination->create_links();
			$data['search'] = $kw;
		}
		$this->load->view('welcome_message', $data);
	}

	public function detail() {
		$id = $this->uri->segment(3);
		$data = $this->makanan->find_by_id($id);
		$this->load->view('detail',$data);
	}

	//http://localhost/ekatalog/index.php/welcome/hello
	public function hello(){
		$data['nama'] = "Denny";
		$data['nim'] = "123456";
		//mendapatkan variabel $_GET[]
		$data['word'] = $this->input->get('word');
		//passing data ke view
		$this->load->view('hello',$data);
	}

	//TODO : Buat view untuk ini
	//http://localhost/ekatalog/index.php/welcome/profile
	public function profile(){
		//load view di folder profile kemudian file index.php
		$this->load->view('profile/index');
	}

	public function nilai(){
		$nilai1 = $this->uri->segment(3);
		$nilai2 = $this->uri->segment(4);
		echo $nilai1;
	}
}
