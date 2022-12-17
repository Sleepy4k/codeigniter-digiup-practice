<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Latihan extends CI_Controller {
    public function tampil() {
        $data['nama'] = "Apri Pandu Wicaksono";
        $this->load->view('v_latihan',$data);
    }
}