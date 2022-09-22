<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\KategorimediaModel;
// use App\Models\mediaModel;

class Media extends BaseController
{
	public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('media');
    }
	
	public function index(){
		$media = $this->mediaModel
		->join('users', 'media.id_user = users.id')
		->where('id_user', user_id())->findAll();
		$data = [
			'title' => 'Daftar Media',
			'subTitle' => 'Media',
			'media' => $media
		  ];
		//   dd($_SESSION);
	// dd($produk);
		return view('user/media/data-media',$data);
		}

		public function create()
    	{ 
			$data = 
			['title' => 'Media',
			'validation' => \Config\Services::validation()
		];
		
		// dd($data);
        // return view('user/index',$data);
        return view('user/media/create-media',$data);
    	}

		public function save(){

			if($this->mediaModel->save([
				'id_user'     => user_id(),
				'link_facebook' => $this->request->getVar('link_facebook'),
				'link_instagram' => $this->request->getVar('link_instagram'),
				'link_tokopedia' => $this->request->getVar('link_tokopedia'),
				'link_shopee' => $this->request->getVar('link_shopee'),
				'link_bukalapak' => $this->request->getVar('link_bukalapak')
			])) {
			// dd($_SESSION);
			dd($this->request->getVar());
			session()->setFlashdata('success', 'Data berhasil ditambahkan!');
			} else {
				session()->setFlashdata('error', 'Data gagal ditambahkan!');
			}
			return redirect()->to('/media');

		}

		public function edit($slug){
			$data = [
				'title' => 'Edit Media',
				'subTitle' => 'Media',
				'result' => $this->mediaModel->getMedia($slug),
				'media' => $this->mediaModel->findAll(),
				'validation' => \Config\Services::validation()
			  ];
		  
			  return view('user/media/edit-media', $data);
		}
        	
		public function update($id_media){

			// // Cek Nama Produk yang lama
			// $dataMediaLama = $this->mediaModel->getProduk($this->request->getVar('id_media'));
			// if($dataMediaLama['id_media'] == $this->request->getVar('id_media')) {
			// 	$rule_title = 'required';
			// } else {
			// 	$rule_title = 'required|is_unique[produk.nama_produk]';
			// }

			// Validasi Data
			// if (! $this->validate([
			// 	'link_facebook' => [
			// 	'rules' => 'required',
			// 	'label' => 'Link Facebook',
			// 	'errors' => [
			// 		'required' => '{field} harus diisi',
					
			// 		]
			// 	],
            //     'link_instagram' => [
            //         'rules' => 'required',
            //         'label' => 'Link Instagram',
            //         'errors' => [
            //             'required' => '{field} harus diisi',
                        
            //             ]
            //         ],
            //     'link_tokopedia' => [
            //             'rules' => 'required',
            //             'label' => 'Link Tokopedia',
            //             'errors' => [
            //                 'required' => '{field} harus diisi',
            //                 ]
            //             ],
            //             'link_shopee' => [
            //                 'rules' => 'required',
            //                 'label' => 'link_shopee',
            //                 'errors' => [
            //                     'required' => '{field} harus diisi',
                                
            //                     ]
            //                 ],
            //                 'link_bukalapak' => [
            //                     'rules' => 'required',
            //                     'label' => 'Link Bukalapak',
            //                     'errors' => [
            //                         'required' => '{field} harus diisi',
                                    
            //                         ]
            //                     ]
			// ])) {
			// 	//Berisi fungsi redirect jika validasi tidak memenuhi
			// 	dd(\Config\Services::validation()->getErrors());
			// 	return redirect()->to('/user/media/edit-media/' . $this->request->getVar('id_media'))->withInput();
			// }

			if($this->mediaModel->save([
				'id_media' => $id_media,
				'id_user'     => user_id(),
				'link_facebook' => $this->request->getVar('link_facebook'),
				'link_instagram' => $this->request->getVar('link_instagram'),
				'link_tokopedia' => $this->request->getVar('link_tokopedia'),
				'link_shopee' => $this->request->getVar('link_shopee'),
				'link_bukalapak' => $this->request->getVar('link_bukalapak'),
				
			])) {
			// dd($_SESSION);
			// dd($this->request->getVar());
			session()->setFlashdata('success', 'Data berhasil diperbarui!');
			} else {
				session()->setFlashdata('error', 'Data gagal diperbarui!');
			}
			return redirect()->to('/media')->withInput();
		}

		
		public function delete($id_media)
		{
			// cari gambar berdasarkan id
			$produk = $this->mediaModel->find($id_media);

			// cek jika file gambarnya default.jpg
			if($produk['gambar_produk'] != 'default.jpg'){
			//hapus gambar
			unlink('img/produk/' . $produk['gambar_produk']);
			}
			
		$this->mediaModel->delete($id_media);
		session()->setFlashdata('success', 'Data berhasil dihapus!');
		return redirect()->to('/produk')->withInput();
		}

		public function kategori($kw){
			// $cat = $this->wisataModel->get_wisata_by_kategory($kw);
			$currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
			$produk = $this->mediaModel->join('users', 'produk.id_user = users.id')->get_produk_by_kategory($kw);
			$kategori_produk = $this->kategorimediaModel->findAll();
		
			$data = [
				'title'           => 'Wisata',
				'subTitle'        => 'Wisata',
				'produk'          => $produk->paginate(10, 'produk'),
				'kategori_produk' => $kategori_produk,
				'pager'           => $this->mediaModel->pager,
				'currentPage'     =>$currentPage
			  ];
			// d($kw);
			return view('views/marketplace/katalog', $data);
			}
}	

	