<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class KategoriProdukModel extends Model {
    
	protected $table = 'kategori_produk';
	protected $primaryKey = 'id_kategori_produk';
    protected $allowedFields = ['nama_kategori_produk','gambar_kategori_produk','slug_kategori_produk'];

	public function getKategoriProduk($slug = false)
	{
		if ($slug === false) {
			return $this->findAll();
		}
        return $this->where(['slug_kategori_produk' => $slug])->first();
	}
}