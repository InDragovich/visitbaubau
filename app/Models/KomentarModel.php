<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class KomentarModel extends Model {
    
	protected $table = 'komentar';
	protected $primaryKey = 'id_komentar';
	protected $useTimestamps = true;  
	protected $allowedFields = ['id_artikel','nama','email','komentar','created_at'];
	
	function countAll() {
		return $this->db->table('artikel')->countAll();
	  }
	  
	public function getKomentarArtikel($id_artikel = false)
	{
		if ($id_artikel === false) {
			// $this->where(['slug' => $slug])->first();
			$this->join('artikel', 'komentar.id_komentar = artikel.id_artikel');
			$this->where('id_artikel', $id_artikel);
			// $this->or_where('slug_produk', $slug);
			return $this->findAll();
		}
        return $this->where(['id_artikel' => $id_artikel])->first();
	}
}