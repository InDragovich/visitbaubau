<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;

class Pertanyaan extends BaseController
{
	public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('pertanyaan');
    }
	public function index(){
		$pertanyaan = $this->pertanyaanModel->getPertanyaan();
		$data = [
			'title' => 'Daftar Pertanyaan',
			'subTitle' => 'Pertanyaan',
			'pertanyaan' => $pertanyaan
		  ];
// dd($pertanyaan);
// var_dump($pertanyaan);
		return view('admin/pertanyaan/data-pertanyaan',$data);
		}

		public function detail($slug){
			$data = 
			['title' => 'Detail Pertanyaan',
			'pertanyaan' => $this->pertanyaanModel->getPertanyaan($slug)
		];
		if (empty($data['pertanyaan'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Pertanyaan '. $slug . ' tidak ditemukan');
		  }	
		  return view('admin/pertanyaan/detail-pertanyaan', $data);
		}
		
		public function delete($id_pertanyaan)
		{
			if (empty($id_pertanyaan['id_pertanyaan'])) {
				
			}
		$this->pertanyaanModel->delete($id_pertanyaan);
		session()->setFlashdata('success', 'Data berhasil dihapus!');
		return redirect()->to('admin/pertanyaan')->withInput();
		}

		public function activate()
    {
        $pertanyaan = new PertanyaanModel();
 
        $data = [ 
            'active' => $this->request->getVar('active') == '0' || '' ? '1' : '0',
        ];
		// dd($data);
        $pertanyaan->update($this->request->getVar('id_pertanyaan'), $data);        
 
        return redirect()->to(base_url('admin/pertanyaan'));
 
    }
}	