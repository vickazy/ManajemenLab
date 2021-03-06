<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_lab extends CI_Model {
	
	public function __construct() {
		//Call the CI_Model constructor
		parent::__construct();
	}
	
	public function insertmanagelab($kode_barang, $nama_barang, $tanggal_transaksi, $kondisi_barang, $lokasibarang_awal, $lokasibarang_akhir, $Deskripsi){
		$data = array(
		'kode_barang' => $kode_barang,
		'nama_barang' => $nama_barang,
		'tanggal_transaksi' => $tanggal_transaksi,
		'kondisi_barang' => $kondisi_barang,
		'lokasibarang_awal' => $lokasibarang_awal,
		'lokasibarang_akhir' => $lokasibarang_akhir,
		'Deskripsi' => $Deskripsi,
		);
		
		$this->db->insert('manajemen_barang',$data);
		
		$data1 = array(
               'lokasi_komp' => $lokasibarang_akhir
            );

		$this->db->where('kode_barangkomp', $kode_barang);
		$this->db->update('komputer', $data1); 
	} 
	public function gettablemanajemen_barang(){
		return $this->db->get('manajemen_barang');
		}
		
	public function getKomputer(){
		$query =  $this->db->get('komputer');
		return $query->result();
		}	
		
	public function getKomputerByKodeBarang($kode_barang){
		$this->db->where("kode_barangkomp",$kode_barang);
        $this->db->from('komputer'); 
        $query = $this->db->get();

        return $query->result();
	}	
}