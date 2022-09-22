<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Komentar extends BaseController
{
    public function index()
    {
        $komentar = $this->komentarModel
		->join('artikel', 'komentar.id_komentar = artikel.id_artikel')->findAll();
		// ->where('id_user', user_id())->findAll();
    $artikel = $this->artikelModel->getArtikel();
		$data = [
			'title' => 'Daftar komentar',
			'subTitle' => 'komentar',
      'artikel' => $artikel,
			'komentar' => $komentar
		  ];
          return view('/view/artikel/detailartikel',$artikel);
    }

    public function create()
    	{ 
			$data = 
			['title' => 'Komentar',
			'komentar' => $this->komentarModel->findAll(),
			'validation' => \Config\Services::validation()
		];
		
		// dd($data);
        // return view('user/index',$data);
        return view('user/komentar/create-komentar',$data);
    	}

        public function save(){

            // Validasi Data
            if (! $this->validate([
              'nama' => [
              'rules' => 'required',
              'label' => 'Nama',
              'errors' => [
                'required' => '{field} harus diisi'
                ]
              ],
              'email' => [
                'rules' => 'required',
                'label' => 'Email',
                'errors' => [
                  'required' => '{field} harus diisi'
                  ]
              ],
                      'komentar' => [
                'rules' => 'required',
                'label' => 'Komentar',
                'errors' => [
                  'required' => '{field} harus diisi'
                  ]
                ]                 
            ])) {
              //Berisi fungsi redirect jika validasi tidak memenuhi
              // dd(\Config\Services::validation()->getErrors());
              
              return redirect()->to('/view/event/pengajuan-event')->withInput();
            }
            $id_artikel = $this->artikelModel->getArtikel($this->request->getVar('slug'));
            // dd($this->request->getVar('nama'));
            
            if($this->komentarModel->save([
                'id_artikel' => $this->request->uri->getSegment(3),
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'komentar' => $this->request->getVar('komentar')
            ])) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
            } else {
              session()->setFlashdata('error', 'Data gagal ditambahkan!');
            }
            return redirect()->to('/view/artikel/detailartikel/'.$id_artikel);
          }

}