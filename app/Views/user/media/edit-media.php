<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Media</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/media/update/<?= $result['id_media']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field();?>
                <input type="hidden" name="slug" value="<?= $result['id_media']; ?>" name="slug">
                <div class="row mb-3">
                    <div class="col">
                        <label for="link_facebook"><b>Link Facebook</b>
                        </label><input id="link_facebook" name="link_facebook" for="link_facebook" class="form-control"
                            type="url" placeholder="" value="<?= old('link_facebook', $result['link_facebook']); ?>">
                    </div>
                    <div class="col">
                        <label for="link_tokopedia"><b>Link Tokopedia</b>
                        </label><input id="link_tokopedia" name="link_tokopedia" for="link_tokopedia"
                            class="form-control" type="url" placeholder=""
                            value="<?= old('link_tokopedia', $result['link_tokopedia']); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="link_instagram"><b>Link Instagram</b>
                        </label><input id="link_instagram" name="link_instagram" for="link_instagram"
                            class="form-control " type="url" placeholder=""
                            value="<?= old('link_instagram', $result['link_instagram']); ?>">
                    </div>
                    <div class="col">
                        <label for="link_shopee"><b>Link Shopee</b>
                        </label><input id="link_shopee" name="link_shopee" for="link_shopee" class="form-control"
                            type="url" placeholder="" value="<?= old('link_shopee', $result['link_shopee']); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="link_bukalapak"><b>Link Bukalapak</b>
                        </label><input id="link_bukalapak" name="link_bukalapak" for="link_bukalapak"
                            class="form-control" type="url" placeholder=""
                            value="<?= old('link_bukalapak', $result['link_bukalapak']); ?>">
                    </div>
                </div>

                <button type='submit' class="btn btn-primary" href="/media/create">Update</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>