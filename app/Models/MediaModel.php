<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class MediaModel extends Model {
    
	protected $table = 'media';
	protected $primaryKey = 'id_media';
	protected $useTimestamps = true;  
	protected $allowedFields = ['link_facebook','link_instagram','link_tokopedia','link_shopee','link_bukalapak','created_at', 'updated_at'];


	public function getMedia($slug = 0, $id = 0)
	{
		if ($slug === 0) {
			// $this->where(['slug' => $slug])->first();
			$this->join('users', 'media.id_user = users.id');
			$this->where('users.id', $id);
			return $this->findAll();
		}
        return $this->where(['id_media' => $slug])->first();
	}

}