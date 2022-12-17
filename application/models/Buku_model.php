<?php

require_once 'Base_model.php';

class Buku_model extends Base_Model {
    // nama tabel
    var $table = "tbl_buku";

    public function find_all() {
        // return $this->db->select('tbl_buku.id AS idbuku, tbl_buku.isbn, tbl_buku.judul, tbl_buku.pengarang, tbl_buku.tanggal_rilis, tbl_buku.jumlah_halaman, tbl_buku.sinopsis, tbl_buku.gambar, tbl_buku.tersedia, tbl_penerbit.id AS idpenerbit, tbl_penerbit.nama, tbl_penerbit.alamat, tbl_penerbit.telpon, tbl_penerbit.email')
        //             ->from('tbl_buku')
        //             ->join('tbl_penerbit', 'tbl_penerbit.id = tbl_buku.id_penerbit')
        //             ->get()
        //             ->result();

        return $this->db->query("
            SELECT tbl_buku.*, tbl_penerbit.nama, tbl_penerbit.nama as nama_penerbit FROM tbl_buku
            INNER JOIN tbl_penerbit ON tbl_penerbit.id = tbl_buku.id_penerbit")->result_array();
    }

    public function find_by_id($id) {
        // $this->db->order_by('tbl_buku.id','ASC');
        // return $this->db->from('tbl_buku')
        //             ->join('tbl_penerbit', 'tbl_penerbit.id = tbl_buku.id_penerbit')
        //             ->where('tbl_buku.id',$id)
        //             ->get()
        //             ->result();
        return $this->db->query("
            SELECT tbl_buku.*, tbl_penerbit.nama, tbl_penerbit.nama as nama_penerbit FROM tbl_buku
            INNER JOIN tbl_penerbit ON tbl_penerbit.id = tbl_buku.id_penerbit WHERE tbl_buku.id = '$id';")->row_array();
    }

    public function pagination($limit, $start) {
        return $this->db->query("
            SELECT tbl_buku.*, tbl_penerbit.nama as nama_penerbit FROM tbl_buku
            INNER JOIN tbl_penerbit ON tbl_penerbit.id = tbl_buku.id_penerbit LIMIT $start, $limit
        ")->result_array();
    }

    public function search($kw, $limit, $start) {
        if($kw != '') {
            return $this->db->query("
            SELECT tbl_buku.*, tbl_penerbit.nama, tbl_penerbit.nama as nama_penerbit FROM tbl_buku
            INNER JOIN tbl_penerbit ON tbl_penerbit.id = tbl_buku.id_penerbit WHERE tbl_buku.judul LIKE '%$kw%' LIMIT $start, $limit;
            ")->result_array();
        }
        return $this->pagination($limit, $start);
    }

    public function get_total_search($kw) {
        $rows = $this->db->query("SELECT tbl_buku.*, tbl_penerbit.nama, tbl_penerbit.nama as nama_penerbit FROM tbl_buku
        INNER JOIN tbl_penerbit ON tbl_penerbit.id = tbl_buku.id_penerbit WHERE tbl_buku.judul LIKE '%$kw%'")->result_array();

        return count($rows);
    }

}