<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Data Wisata</b></h1>

    <!-- Alert -->
    <?php if(session()->getFlashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('success'); ?>
    </div>
    <?php endif; ?>
    <!-- /Alert -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="<?= base_url('admin/wisata/create'); ?>"><i class="fas fa-plus-circle"></i>
                Tambah Data</a>
            <a class="btn btn-primary" href="<?= base_url('admin/kategoriwisata'); ?>"><i class="fas fa-list"></i>
                Data Kategori Wisata</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableWisata" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kategori Wisata</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($wisata as $w) : ?>
                        <tr>
                            <td class="nama_wisata"> <?= $w['nama_wisata']?></td>
                            <td> <?= $w['alamat_wisata']?></td>
                            <td> <?= $w['nama_kategori_wisata']?></td>
                            <td>
                                <a type="button" class="btn btn-info"
                                    href="<?= base_url('admin/wisata/detail-wisata/'.$w['slug']); ?>">
                                    <i class="fas fa-info-circle"></i> Detail</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kategori Wisata</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>