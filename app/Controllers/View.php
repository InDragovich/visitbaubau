<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Config\BaseConfig;

class View extends BaseController
{
  public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }
// Artikel
public function wisata()
{
  $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
    $cari = $this->request->getVar('cari'); 
    if ($cari) {
      $wisata = $this->wisataModel->get_cari_wisata($cari);
    } else {
      $wisata = $this->wisataModel;
    } 
  $kategori_wisata = $this->kategoriWisataModel->findAll();
  // $wisata = $this->wisataModel->findAll();
  $data = [
    'title' => 'Detail Wisata',
    'subTitle' => 'Wisata',
    'wisata' => $wisata->paginate(10, 'wisata'),
    'kategori_wisata' => $kategori_wisata,
    'pager'           => $this->wisataModel->pager,
    'currentPage'     =>$currentPage
  ];
  return view('views/wisata/index', $data);
}

 // Artikel
  public function artikel()
  {
    $kategori_wisata = $this->kategoriWisataModel->findAll();
    $artikel = $this->artikelModel->orderby('tgl_artikel','DESC')->findAll();
    $artikelterkini = $this->artikelModel->orderby('tgl_artikel','DESC')->getArtikelTerkini();
    $data = [
      'title' => 'Detail Artikel',
      'subTitle' => 'Artikel',
      'artikel' => $artikel,
      'artikelterkini' => $artikelterkini,
      'kategori_wisata' => $kategori_wisata
    ];
    return view('views/artikel/index', $data);
  }

 // Detail Artikel
  public function detailartikel($slug)
  {
    $viewer = $this->artikelModel->getArtikel($slug);
    $kategori_wisata = $this->kategoriWisataModel->findAll();
    $artikelterkini = $this->artikelModel->getArtikelTerkini();
    $data = [
      'title' => 'Detail Artikel',
      'subTitle' => 'Artikel',
      'artikel' => $this->artikelModel->getArtikel($slug),
      'kategori_wisata' => $kategori_wisata,
      'artikelterkini' => $artikelterkini,
      'komentar' => $this->komentarModel->getKomentarArtikel($slug),
      'viewer' => $viewer
      // 'komentar'=> $this->artikelModel->get_komentar($slug)
    ];
      return view('views/artikel/detail', $data);
  }

  // Artikel
  public function event()
  {
    $kategori_wisata = $this->kategoriWisataModel->findAll();
    $event = $this->eventModel->findAll();
    $data = [
      'title' => 'Detail Event',
      'subTitle' => 'Event',
      'event' => $event,
      'kategori_wisata' => $kategori_wisata
    ];
    return view('views/event/index', $data);
  }

 // Detail Event
  public function detailevent($slug)
  {
    $kategori_wisata = $this->kategoriWisataModel->findAll();
    $data = [
      'title' => 'Detail Event',
      'subTitle' => 'Event',
      'event' => $this->eventModel->getEvent($slug),
      'kategori_wisata' => $kategori_wisata
    ];
      return view('views/event/detail', $data);
  }

  // Pengajuan Event
  public function pengajuanevent()
  {
    $data = [
      'title' => 'Form Pengajuan Event',
      'subTitle' => 'Event',
      'kategori_event' => $this->kategoriEventModel->orderby('nama_kategori_event')->findAll(),
      'validation' => \Config\Services::validation()
    ];
    // dd($data);
    return view('views/event/pengajuan-event', $data);
  }


  public function savepengajuan(){

    // Validasi Data
    if (! $this->validate([
      'nama_event' => [
      'rules' => 'required|is_unique[event.nama_event]',
      'label' => 'Judul event',
      'errors' => [
        'required' => '{field} harus diisi',
        'is_unique' => '{field} sudah digunakan'
        ]
      ],
      'id_kategori_event' => [
        'rules' => 'required',
        'label' => 'Kategori Event',
        'errors' => [
          'required' => '{field} harus diisi'
          ]
          // '|is_natural_no_zero'
      ],
              'lokasi_event' => [
        'rules' => 'required',
        'label' => 'Lokasi event',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
          ]
        ],
        'gambar_event' => [
        'rules' =>	'max_size[gambar_event,1024]|is_image[gambar_event]',
        'errors' => [
          'max_size' => 'Ukuran gambar terlalu besar. Max 1 mb',
          'is_image' => 'Yang anda pilih bukan gambar',
          'mime_in' => 'Yang anda pilih bukan gambar',
          ]
        ],
        'proposal_event' => [
          'rules' =>	'max_size[proposal_event,3024]|uploaded[proposal_event]|mime_in[proposal_event,application/pdf]',
          'errors' => [
            'max_size' => 'Ukuran gambar terlalu besar. Max 3 mb',
            'mime_in' => 'File yang anda pilih bukan pdf',
            'uploaded' => 'hehe'
            ]
          ]
                  
    ])) {
      //Berisi fungsi redirect jika validasi tidak memenuhi
      // dd(\Config\Services::validation()->getErrors());
      
      return redirect()->to('/view/event/pengajuan-event')->withInput();
    }

  // ambil gambar

  $fileGambarEvent = $this->request->getFile('gambar_event');
  
  // dd($fileGambarEvent);

  // apakah tidak ada gambar yang diupload
  if ($fileGambarEvent->getError() == 4) {
    $namaFileGambarEvent = 'default.jpg';
  } else {
    // generate nama gambar random
  $namaFileGambarEvent = $fileGambarEvent->getRandomName();

  // pindahkan ke folder img
  $fileGambarEvent->move('img/event/', $namaFileGambarEvent);
  
  }

  $fileProposalEvent = $this->request->getFile('proposal_event');
  // dd($fileProposalEvent);
  $fileProposalEvent->move('file/event');
  $namaFileProposal = $fileProposalEvent->getName();
  
  // if ($fileProposalEvent = $this->request->getFile('proposal_event')) {
  //   $fileProposalEvent->move(WRITEPATH.'file/event/', $fileProposalEvent->getBasename());
  // }

  // $fileProposalEvent = $this->request->getFile('gambar_event');
  // dd($this->request->getVar());
  // $fileProposalEvent->move('img/event/', $namaFileGambarEvent);
 
    $user_id = user();
    $slug = url_title($this->request->getVar('nama_event'), '-', true);
    if($this->eventModel->save([
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'nama_event' => $this->request->getVar('nama_event'),
      'nama_penyelenggara' => $this->request->getVar('nama_penyelenggara'),
      'slug' => $slug,
      'id_kategori_event' => $this->request->getVar('id_kategori_event'),
          'lokasi_event' => $this->request->getVar('lokasi_event'),
          'tgl_event_mulai' => $this->request->getVar('tgl_event_mulai'),
          'tgl_event_berakhir' => $this->request->getVar('tgl_event_berakhir'),
          'deskripsi_event' => $this->request->getVar('deskripsi_event'),
          'proposal_event' => $namaFileProposal,   
          'gambar_event' => $namaFileGambarEvent,
          'status_event' => '0'   
    ])) {
      
    session()->setFlashdata('success', 'Event telah diajukan!');
    } else {
      session()->setFlashdata('error', 'Data gagal ditambahkan!');
    }
    return redirect()->to('/view/event');
  }

  public function strukturorganisasi()
  {
    $kategori_wisata = $this->kategoriWisataModel->findAll();
    $data = [
      'title' => 'Struktur Organisasi',
      'subTitle' => 'Struktur Organisasi',
      'kategori_wisata' => $kategori_wisata
    ];
      return view('views/profil/organisasi', $data);
  }

  public function visimisi()
  {
    $kategori_wisata = $this->kategoriWisataModel->findAll();
    $data = [
      'title' => 'Visi Misi',
      'subTitle' => 'Visi Misi',
      'kategori_wisata' => $kategori_wisata
    ];
      return view('views/profil/organisasi', $data);
  }

  public function login()
  {
    $kategori_wisata = $this->kategoriWisataModel->findAll();
    $data = [
      'title' => 'Visi Misi',
      'subTitle' => 'Visi Misi',
      'kategori_wisata' => $kategori_wisata,
      'config' => $this->config
    ];
      return view('\App\Views\Auth\login', $data);
  }
  
  public function register()
  {
    $kategori_wisata = $this->kategoriWisataModel->findAll();
    $data = [
      'title' => 'Visi Misi',
      'subTitle' => 'Visi Misi',
      'kategori_wisata' => $kategori_wisata,
      'config' => $this->config
    ];
      return view('\App\Views\Auth\register', $data);
  }

  public function marketplace()
  {
    // $produk = $this->produkModel->findAll();
    $produk = $this->produkModel->join('users', 'produk.id_user = users.id')->findAll();
    $kategori_produk = $this->kategoriProdukModel->findAll();
    $data = [
      'title' => 'Marketplace',
      'subTitle' => 'Marketplace',
      'kategori_produk' => $kategori_produk,
      'produk' => $produk
    ];
      return view('views/marketplace/index', $data);
  }

  public function profil($id)
  {
    $media = $this->mediaModel
		->join('users', 'media.id_user = users.id')
		->where('id_user', $id)->findAll();
    $data = 
    ['title' => 'Profil',
    'media' => $media
  ];
        $this->builder->select('users.id as userid, username, email, fullname, no_telepon, alamat, deskripsi, user_image, name, active');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->join('media', 'media.id_user = users.id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();

        if (empty($data['user'])) {
            redirect()->to('/marketplace');
        }
  
    // dd($data);
      return view('views/marketplace/profil',$data);
  }
  
  public function katalog()
  {
    $kategori_produk = $this->kategoriProdukModel->findAll();
    $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
    $cari = $this->request->getVar('cari'); 
    if ($cari) {
      $produk = $this->produkModel->get_cari_produk($cari);
    } else {
      $produk = $this->produkModel;
    }
    
    $data = [
      'title' => 'Katalog Produk',
      'subTitle' => 'Katalog Produk',
      'kategori_produk' => $kategori_produk,
      'produk' => $produk->join('users', 'produk.id_user = users.id')->paginate(20, 'produk'),
      'pager' => $this->produkModel->pager,
      'currentPage' =>$currentPage
    ];
      return view('views/marketplace/katalog', $data);
  }

  public function detailproduk($slug){
    $data = 
    ['title' => 'Detail Produk',
    'produk' => $this->produkModel->join('users', 'produk.id_user = users.id')->getProduk($slug),
  ];
  if (empty($data['produk'])) {
    throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk '. $slug . ' tidak ditemukan');
    }
    // dd($data);
    return view('views/marketplace/detail',$data);
  }

  public function detailwisata($slug){
    $data = 
    ['title' => 'Detail Wisata',
    'wisata' => $this->wisataModel->getWisata($slug),
  ];
  if (empty($data['wisata'])) {
    throw new \CodeIgniter\Exceptions\PageNotFoundException('wisata '. $slug . ' tidak ditemukan');
    }
    // dd($data);
    return view('views/wisata/detail',$data);
  }

  // Pengajuan Pertanyaan
  public function pertanyaan()
  {
    $data = [
      'title' => 'Halo Barakati Baubau',
      'subTitle' => 'Halo Barakati Baubau',
      'validation' => \Config\Services::validation()
    ];
    // dd($data);
    return view('views/pertanyaan/pengajuan-pertanyaan', $data);
  }

  public function savepertanyaan(){

// Validasi Data
if (! $this->validate([
'perihal' => [
'rules' => 'required',
'label' => 'Perihal',
'errors' => [
'required' => '{field} harus diisi'
]
],
'isi_pertanyaan' => [
'rules' => 'required',
'label' => 'Isi Pertanyaan',
'errors' => [
'required' => '{field} harus diisi'
]
],
'nama' => [
'rules' => 'required',
'label' => 'Nama',
'errors' => [
'required' => '{field} harus diisi'
]
],
'alamat' => [
'rules' => 'required',
'label' => 'Alamat',
'errors' => [
'required' => '{field} harus diisi'
]
],
'no_telepon' => [
'rules' => 'required',
'label' => 'Nomor Telepon',
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
]

])) {
//Berisi fungsi redirect jika validasi tidak memenuhi
// dd(\Config\Services::validation()->getErrors());

return redirect()->to('/view/pertanyaan/pertanyaan')->withInput();
}

$no_telepon = $this->request->getVar('no_telepon');
$no_telepon = trim($no_telepon);
//bersihkan dari karakter yang tidak perlu
$no_telepon = strip_tags($no_telepon);
// Berishkan dari spasi
$no_telepon= str_replace(" ","",$no_telepon);
// bersihkan dari bentuk seperti (022) 66677788
$no_telepon= str_replace("(","",$no_telepon);
// bersihkan dari format yang ada titik seperti 0811.222.333.4
$no_telepon= str_replace(".","",$no_telepon);

// cek apakah no hp mengandung karakter + dan 0-9
if(!preg_match('/[^+0-9]/',trim($no_telepon))){
// cek apakah no hp karakter 1-3 adalah +62
if(substr(trim($no_telepon), 0, 3)=='+62'){
$no_telepon = trim($no_telepon);
}
// cek apakah no hp karakter 1 adalah 0
elseif(substr(trim($no_telepon), 0, 1)=='0'){
$no_telepon = '62'.substr(trim($no_telepon), 1);
}
}

// dd($this->request->getVar());
$slug = url_title($this->request->getVar('perihal'), '-', true);
if($this->pertanyaanModel->save([
'perihal' => $this->request->getVar('perihal'),
'isi_pertanyaan' => $this->request->getVar('isi_pertanyaan'),
'nama' => $this->request->getVar('nama'),
'alamat' => $this->request->getVar('alamat'),
'no_telepon' => $no_telepon,
'email' => $this->request->getVar('email'),
'slug' => $slug,
'active' => 0
])) {
session()->setFlashdata('success', 'Pertanyaan telah diajukan!');
} else {
session()->setFlashdata('error', 'Pertanyaan gagal diajukan!');
}

    
return redirect()->to('/view/pertanyaan');
}


}