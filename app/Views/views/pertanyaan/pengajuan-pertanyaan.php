<?= $this->extend('views/front-templates/index'); ?>

<?= $this->section('content'); ?>
<div class="overlay">
    <div id="breadcrumb" class="hoc clear">

        <h6 class="heading heading-top">Halo Barakati Baubau</h6>
        <br>
        <ul>
            <li class="heading-top">Silahkan gunakan form ini untuk bertanya sesuatu terkait Kota baubau</li>
        </ul>
        <!-- ################################################################################################ -->
    </div>
</div>

<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->

        <!-- Alert -->
        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
        <!-- /Alert -->

        <form action="/view/savepertanyaan" method="POST" enctype="multipart/form-data">
            <?= csrf_field();?>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label>Perihal <span style="color: red;">*</span></label>
                        <input id="perihal" name="perihal" for="perihal" type="text" placeholder=""
                            value="<?= old('perihal'); ?>"
                            class="form-control <?= $validation->hasError('perihal') ? 'is-invalid' : ''; ?>" required
                            autofocus>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label>Deskripsi Pertanyaan <span style="color: red;">*</span></label>
                        <textarea id="isi_pertanyaan" name="isi_pertanyaan" for="isi_pertanyaan"
                            class="form-control <?= $validation->hasError('isi_pertanyaan') ? 'is-invalid' : ''; ?>"
                            placeholder="Sertakan juga alasan menanyakan hal tersebut"
                            value="<?= old('isi_pertanyaan'); ?>" rows="5" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label>Nama Lengkap <span style="color: red;">*</span></label>
                        <input id="nama" name="nama" for="nama" rows="5"
                            class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : ''; ?>"
                            placeholder="John Doe" value="<?= old('nama'); ?>" required></input>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label>Email <span style="color: red;">*</span></label>
                        <input id="email" name="email" for="email" rows="5"
                            class="form-control <?= $validation->hasError('email') ? 'is-invalid' : ''; ?>"
                            placeholder="emailanda@mail.com" value="<?= old('email'); ?>" type="email" required></input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-4">
                    <div class="form-group">
                        <label>Alamat <span style="color: red;">*</span></label>
                        <input id="alamat" name="alamat" for="alamat"
                            class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : ''; ?>"
                            placeholder="Alamat" value="<?= old('alamat'); ?>" type="text" required>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="form-group">
                        <label>Nomor Telepon <span style="color: red;">*</span></label>
                        <input id="no_telepon" name="no_telepon" for="no_telepon"
                            class="form-control <?= $validation->hasError('no_telepon') ? 'is-invalid' : ''; ?>"
                            placeholder="0822xxxx" value="<?= old('no_telepon'); ?>" type="number" maxlength="12"
                            required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-fill pull-right">Submit</button>
            <div class="clearfix"></div>
        </form>
        <!-- ################################################################################################ -->

        <!-- / main body -->
        <div class="clear"></div>
    </main>
</div>

<?= $this->endSection(); ?>