<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Media</h1>

    <!-- Alert -->
    <?php if(session()->getFlashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('success'); ?>
    </div>
    <?php endif; ?>
    <!-- /Alert -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php if (!empty($media['media'])) { ?>
            <a class="btn btn-success" href="<?= base_url('user/media/create'); ?>"><i class="fas fa-plus-circle"></i>
                Tambah Data</a>
            <?php } ?>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Facebook</th>
                            <th>Instagram</th>
                            <th>Tokopedia</th>
                            <th>Shopee</th>
                            <th>Bukalapak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i= 1 ?>
                        <?php foreach($media as $m) : ?>
                        <tr>
                            <td> <?= $i++; ?></td>
                            <?php if (empty($m['link_facebook'])) { ?>
                            <td> Link kosong</td>
                            <?php } else { ?>
                            <td> <?= $m['link_facebook']?></td>
                            <?php } ?>
                            <?php if (empty($m['link_instagram'])) { ?>
                            <td> Link kosong</td>
                            <?php } else { ?>
                            <td> <?= $m['link_instagram']?></td>
                            <?php } ?>
                            <?php if (empty($m['link_tokopedia'])) { ?>
                            <td> Link kosong</td>
                            <?php } else { ?>
                            <td> <?= $m['link_tokopedia']?></td>
                            <?php } ?>
                            <?php if (empty($m['link_shopee'])) { ?>
                            <td> Link kosong</td>
                            <?php } else { ?>
                            <td> <?= $m['link_shopee']?></td>
                            <?php } ?>
                            <?php if (empty($m['link_bukalapak'])) { ?>
                            <td> Link kosong</td>
                            <?php } else { ?>
                            <td> <?= $m['link_bukalapak']?></td>
                            <?php } ?>
                            <td>
                                <a type="button" class="btn btn-warning"
                                    href="<?= base_url('user/media/edit-media/'.$m['id_media']); ?>">
                                    <i class="fas fa-pen"></i> Edit
                                </a>
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