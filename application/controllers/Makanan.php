<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Base_Controller.php';

class Makanan extends Base_Controller {
    var $data = [
        'nama'=>'',
        'harga'=>'',
        'gambar'=>'',
        'stok'=>'',
        'id_kantin'=>'',
    ];
    
    var $context = "makanan";

    public function __construct() {
        parent::__construct();
        $this->load->model('kantin_model','kantin');
        if(!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        $this->load->helper('date');
    }

    // public function index() {
    //     $data['hasil'] = $this->buku->TampilBuku();
    //     $this->load->view('buku/index',$data);
    // }

    function form() {
        $id = $this->uri->segment(3);
        if($id) {
            $this->data = $this->makanan->find_by_id($id);
        }
        $this->data['kantins'] = $this->kantin->find_all();
        $this->load->view('makanan/form',$this->data);
    }

    // function detail_buku($id){
    //     $data['details'] = $this->buku->TampilDetailBuku($id);
    //     $this->load->view('buku/detail',$data);
    // }

    function save() {
        $id = $this->input->post('id');
        $file_name = $this->input->post('gambar_lama');
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('harga','harga','required');
        $this->form_validation->set_rules('stok','stok','required');
        $this->data = [
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'id_kantin' => $this->input->post('id_kantin')
        ];

        if($_FILES['gambar']['name'] != "") {
            $config = array(
                'upload_path' => "./assets/uploads/",
                'allowed_types' => "*",
                'overwrite' => TRUE,
                'file_name' => "gambar_".date("YmdHis"),
                'max_size' => "2048000",
            );
            $this->load->library('upload',$config);
            if($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
            } else {
                log_message('ERROR','error');
            }
        }
        $this->data['gambar'] = $file_name;

        if($this->form_validation->run() == FALSE) {
            $this->form();
        } else {
            if($id == '') {
                $this->makanan->insert($this->data);
            } else {
                $this->makanan->update($id,$this->data);
            }
            redirect(base_url('makanan'));
        }
    }
}