<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class PertanyaanModel extends Model {
    
	protected $table = 'pertanyaan';
	protected $primaryKey = 'id_pertanyaan';
	protected $useTimestamps = true;  
	protected $allowedFields = ['perihal','slug','isi_pertanyaan', 'nama','alamat','no_telepon','email','active'];

	// function countAll() {
	// 	return $this->db->table('pertanyaan')->countAll();
	//   }
	  
	public function getPertanyaan($slug = false)
	{
		if ($slug === false) {
			return $this->findAll();
		}
        return $this->where(['slug' => $slug])->first();
	}
    
	public function getPertanyaanById($id_pertanyaan = false)
    {
        if ($id_pertanyaan === false) {
            return $this->select('id_pertanyaan','perihal','isi_pertanyaan','nama','alamat','no_telepon','email','active')
        ->findAll();
        } else {
            return $this->where(['id_pertanyaan'=>$id_pertanyaan])->first();
        }
        
    }


}