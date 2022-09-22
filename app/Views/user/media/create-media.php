<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Media</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/media/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field();?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="link_facebook"><b>Link Facebook</b></label><input id="link_facebook"
                            name="link_facebook" for="link_facebook" class="form-control" type="url"
                            placeholder="Masukkan alamat link/url penjual facebook"
                            value="<?= old('link_facebook'); ?>">
                    </div>
                    <div class="col">
                        <label for="link_instagram"><b>Link Instagram</b></label><input id="link_instagram"
                            name="link_instagram" for="link_instagram" class="form-control" type="url"
                            placeholder="Masukkan alamat link/url penjual instagram"
                            value="<?= old('link_instagram'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="link_tokopedia"><b>Link Tokopedia</b></label><input id="link_tokopedia"
                            name="link_tokopedia" for="link_tokopedia" class="form-control" type="url"
                            placeholder="Masukkan alamat link/url penjual instagram"
                            value="<?= old('link_tokopedia'); ?>">
                    </div>
                    <div class="col">
                        <label for="link_shopee"><b>Link Shopee</b>&nbsp;&nbsp;</label><input id="link_shopee"
                            name="link_shopee" for="link_shopee" class="form-control" type="url"
                            placeholder="Masukkan alamat link/url penjual shopee" value="<?= old('link_shopee'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="link_bukalapak"><b>Link Bukalapak</b></label><input id="link_bukalapak"
                            name="link_bukalapak" for="link_bukalapak" class="form-control" type="url"
                            placeholder="Masukkan alamat link/url penjual bukalapak"
                            value="<?= old('link_bukalapak'); ?>">
                    </div>
                </div>

                <button type='submit' class="btn btn-primary" href="/media/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>