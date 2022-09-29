<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Data Pertanyaan</b></h1>

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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Perihal</th>
                            <th>Tanggal Diajukan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        <?php foreach($pertanyaan as $pe) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td> <?= $pe['nama']?></td>
                            <td> <?= $pe['perihal']?></td>
                            <td> <?= date('d F Y',strtotime($pe['created_at'])); ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-circle btn-active-users"
                                    data-id="<?= $pe['id_pertanyaan'];?>"
                                    data-active="<?= $pe['active'] == 1 ? 1 : 0 ;?>"
                                    title="Klik centang jika sudah membalas pertanyaan">
                                    <?= $pe['active'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>' ; ?>
                                </a>
                            </td>
                            <td>
                                <a type="button" class="btn btn-info"
                                    href="<?= base_url('admin/pertanyaan/'.$pe['slug']); ?>">
                                    <i class="fas fa-info-circle"></i> Detail</a>
                                <a type='button' class="btn btn-danger" href="#" data-toggle="modal"
                                    data-target="#hapusModal">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php if (!empty($pertanyaan)) { ?>
    <!-- Hapus Modal-->

    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus data ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang anda hapus tidak dapat
                    kembali.</div>

                <div class="modal-footer">
                    <form action="/pertanyaan/delete/<?= $pe['id_pertanyaan']; ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger" href="">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- </form> -->
    <?php } ?>
    <!-- Status Modal -->
    <form action="<?= base_url(); ?>/pertanyaan/activate" method="post">
        <div class="modal fade" id="activateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Status</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Ya" untuk mengupdate Status</div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="id">
                        <input type="hidden" name="active" class="active">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- </form> -->
</div>
<?= $this->endSection(); ?>