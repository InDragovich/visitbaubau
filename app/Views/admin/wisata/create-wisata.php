<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Tambah Data Wisata</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/wisata/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field();?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama_wisata"><b>Nama Wisata</b>&nbsp;&nbsp;<span
                                class="badge badge-light bg-gray-200"
                                style="color: grey;"><b>Wajib</b></span></label><input id="nama_wisata"
                            name="nama_wisata" for="nama_wisata"
                            class="form-control <?= $validation->hasError('nama_wisata') ? 'is-invalid' : ''; ?>"
                            type="text" placeholder="" value="<?= old('nama_wisata'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('nama_wisata'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alamat_wisata"><b>Alamat</b>&nbsp;&nbsp;<span class="badge badge-light bg-gray-200"
                                style="color: grey;"><b>Wajib</b></span></label><input id="alamat_wisata"
                            name="alamat_wisata" for="alamat_wisata"
                            class="form-control <?= $validation->hasError('alamat_wisata') ? 'is-invalid' : ''; ?>"
                            type="text" placeholder="" value="<?= old('alamat_wisata'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation-> getError('alamat_wisata'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="deskripsi_wisata"><b>Deskripsi</b>&nbsp;&nbsp;<span
                                class="badge badge-light bg-gray-200"
                                style="color: grey;"><b>Wajib</b></span></label><textarea
                            class="form-control summernote <?= $validation->hasError('deskripsi_wisata') ? 'is-invalid' : ''; ?>"
                            id="deskripsi_wisata" name="deskripsi_wisata" for='deskripsi_wisata' rows="3"
                            value="<?= old('deskripsi_wisata'); ?>"><?= old('deskripsi_wisata'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation-> getError('deskripsi_wisata'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="id_kategori_wisata"><b>Kategori</b>&nbsp;&nbsp;<span
                                class="badge badge-light bg-gray-200" style="color: grey;"><b>Wajib</b></span></label>
                        <select
                            class="form-control <?= $validation->hasError('id_kategori_wisata') ? 'is-invalid' : ''; ?>"
                            id="id_kategori_wisata" name="id_kategori_wisata">

                            <option value="">- Pilih Kategori Wisata -</option>
                            <?php foreach($kategori_wisata as $kw) : ?>
                            <option value="<?= $kw['id_kategori_wisata']; ?>" id="id_kategori_wisata"
                                <?= old('id_kategori_wisata') == $kw['id_kategori_wisata'] ? 'selected' : ''; ?>>
                                <?= $kw['nama_kategori_wisata']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation-> getError('id_kategori_wisata'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="custom-file">
                            <input type="file"
                                class="custom-file-input <?= $validation->hasError('gambar_wisata') ? 'is-invalid' : ''; ?>"
                                id="gambar_wisata" value="gambar_wisata" name="gambar_wisata"
                                onchange="previewImgWisata()">
                            <div class="invalid-feedback">
                                <?= $validation-> getError('gambar_wisata'); ?>
                            </div>
                            <label class="custom-file-label" for="customFile">Upload Gambar</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p>Preview Gambar<br>
                            <img id="imgPreview" width="200px" src="/img/wisata/default.jpg"
                                class="img-thumbnail img-preview">
                        </p>
                    </div>
                </div>
                <button type='submit' class="btn btn-primary" href="/wisata/create">Tambah Data</button>
                <button class="btn btn-danger" type="reset">Batal</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>