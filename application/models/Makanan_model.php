<?php

require_once 'Base_model.php';

class Makanan_model extends Base_Model {
    // nama tabel
    var $table = "tbl_makanan";

    public function find_all() {
        // return $this->db->select('tbl_buku.id AS idbuku, tbl_buku.isbn, tbl_buku.judul, tbl_buku.pengarang, tbl_buku.tanggal_rilis, tbl_buku.jumlah_halaman, tbl_buku.sinopsis, tbl_buku.gambar, tbl_buku.tersedia, tbl_penerbit.id AS idpenerbit, tbl_penerbit.nama, tbl_penerbit.alamat, tbl_penerbit.telpon, tbl_penerbit.email')
        //             ->from('tbl_buku')
        //             ->join('tbl_penerbit', 'tbl_penerbit.id = tbl_buku.id_penerbit')
        //             ->get()
        //             ->result();

        return $this->db->query("
            SELECT tbl_makanan.*, tbl_kantin.nama as nama_kantin FROM tbl_makanan
            INNER JOIN tbl_kantin ON tbl_kantin.id = tbl_makanan.id_kantin")->result_array();
    }

    public function find_by_id($id) {
        // $this->db->order_by('tbl_buku.id','ASC');
        // return $this->db->from('tbl_buku')
        //             ->join('tbl_penerbit', 'tbl_penerbit.id = tbl_buku.id_penerbit')
        //             ->where('tbl_buku.id',$id)
        //             ->get()
        //             ->result();
        return $this->db->query("
            SELECT tbl_makanan.*, tbl_kantin.nama as nama_kantin FROM tbl_makanan
            INNER JOIN tbl_kantin ON tbl_kantin.id = tbl_makanan.id_kantin WHERE tbl_makanan.id = '$id';")->row_array();
    }

    public function pagination($limit, $start) {
        return $this->db->query("
            SELECT tbl_makanan.*, tbl_kantin.nama as nama_kantin FROM tbl_makanan
            INNER JOIN tbl_kantin ON tbl_kantin.id = tbl_makanan.id_kantin LIMIT $start, $limit
        ")->result_array();
    }

    public function search($kw, $limit, $start) {
        if($kw != '') {
            return $this->db->query("
            SELECT tbl_makanan.*, tbl_kantin.nama as nama_kantin FROM tbl_makanan
            INNER JOIN tbl_kantin ON tbl_kantin.id = tbl_makanan.id_kantin WHERE tbl_makanan.nama LIKE '%$kw%' LIMIT $start, $limit;
            ")->result_array();
        }
        return $this->pagination($limit, $start);
    }

    public function get_total_search($kw) {
        $rows = $this->db->query("SELECT tbl_makanan.*, tbl_kantin.nama as nama_penerbit FROM tbl_makanan
        INNER JOIN tbl_kantin ON tbl_kantin.id = tbl_makanan.id_kantin WHERE tbl_makanan.nama LIKE '%$kw%';")->result_array();

        return count($rows);
    }

}