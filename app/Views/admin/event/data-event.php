<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Data Event</b></h1>

    <!-- Alert -->
    <?php if(session()->getFlashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('success'); ?>
    </div>
    <?php endif; ?>
    <!-- /Alert -->

    <!-- Alert -->
    <?php if(session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
    <?php endif; ?>
    <!-- /Alert -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success" href="<?= base_url('admin/event/create'); ?>"><i class="fas fa-plus-circle"></i>
                Tambah Data</a>
            <a class="btn btn-primary" href="<?= base_url('admin/kategorievent'); ?>"><i class="fas fa-list"></i>
                Data Kategori Event</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTableEvent" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Penyelenggara</th>
                            <th>Lokasi</th>
                            <th>Kategori</th>
                            <th>Tanggal Diajukan</th>
                            <th>Tanggal Dimulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Status Event</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($event as $e) : ?>
                        <tr>
                            <td> <?= $e['nama_event']?></td>
                            <td> <?= $e['nama_penyelenggara']?></td>
                            <td> <?= $e['lokasi_event']?></td>
                            <td> <?= $e['nama_kategori_event']?></td>
                            <td> <?= $e['created_at']?></td>
                            <td> <?= $e['tgl_event_mulai']?></td>
                            <td> <?= $e['tgl_event_berakhir']?></td>
                            <td>
                                <?php if ($e['status_event'] == 0) {
                                  echo  '<p class="text-danger" disabled>Belum Disetujui</p>';
                                }else {
                                    echo '<p class="text-success" disabled>Disetujui</p>';
                                } ?>
                            </td>
                            <td>
                                <a type="button" class="btn btn-info"
                                    href="<?= base_url('admin/event/detail-event/'.$e['slug']); ?>">
                                    <i class="fas fa-info-circle"></i> Detail</a>
                                <?php if (!empty($e['proposal_event'])) {?>
                                <a type="button" target="_blank" class="btn btn-warning"
                                    href="<?= base_url('file/event/'. $e['proposal_event']); ?>">
                                    <i class="fas fa-file-pdf"></i> PDF</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>