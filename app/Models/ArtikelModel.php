<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class ArtikelModel extends Model {
    
	protected $table = 'artikel';
	protected $primaryKey = 'id_artikel';
	protected $useTimestamps = true;  
	protected $allowedFields = ['judul_artikel','slug','isi_artikel', 'tgl_artikel','gambar_artikel','created_at', 'updated_at'];
	 
	// protected $db, $builder;

    // public function __construct()
    // {
    //     $this->db      = \Config\Database::connect();
    //     $this->builder = $this->db->table('artikel');
    // }

	function countAll() {
		return $this->db->table('artikel')->countAll();
	  }
	  
	public function getArtikel($slug = false)
	{
		
		if ($slug === false) {
			return $this->findAll();
		}
		// $counter = 1;
		// $this->select('viewer');
		// $this->set('viewer', 'viewer+1', false);
		// $this->where('id_artikel', ['slug' => $slug]);
		// $this->update('artikel');
        return $this->where(['slug' => $slug])->first();
		
	}
	public function getArtikelTerkini($slug = false)
	{
		if ($slug === false) {
			return $this->findAll();
		}
		$this->select('*');
		$this->from('artikel');
		$this->orderBy('tgl_artikel','DESC');
        return $this->where(['slug' => $slug])->findAll();
	}

	public function updateViewer($viewer){
		$result = $this->where('viewer',$viewer)->findAll();
$this->select ('viewer');
$cView = $result['viewer'] + 1;
$this->set('viewer', $cView);
$this->where('id_artikel', $result['id_artikel']);
$this->update('artikel');

        // $result = $this->where('id_artikel',['slug' => $slug])->findAll();
		// // $this->where('artikel', ['slug' => $slug])->row_array();
        // $newV = (int)$result['viewer'] + 1;
        // $this->set('viewer', $newV);
        // $this->where('id_artikel', $result['id_artikel']);
        // $this->update('artikel');
    }

// 	function get_komentar($slug)
//   {
//     $this->where('slug', $slug);
//     $this->join('komentar', 'artikel.id_artikel = komentar.id_artikel');
//     // $this->join('users', 'komentar.user_id = users.id');
//     return $this->db->get($this->table)->result();
//   }

}