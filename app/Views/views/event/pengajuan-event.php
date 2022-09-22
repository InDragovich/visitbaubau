<?= $this->extend('views/front-templates/index'); ?>

<?= $this->section('content'); ?>
<div class="overlay">
    <div id="breadcrumb" class="hoc clear">
        <!-- ################################################################################################ -->
        <h6 class="heading heading-top">Event</h6>
        <br>
        <ul>
            <li class="heading-top">Event seputar Kota Baubau dan sekitarnya</li>
        </ul>
        <!-- ################################################################################################ -->
    </div>
</div>

<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->

        <form action="/view/savepengajuan" method="POST" enctype="multipart/form-data">
            <?= csrf_field();?>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label>Nama Event</label>
                        <input id="nama_event" name="nama_event" for="nama_event" type="text" placeholder=""
                            value="<?= old('nama_event'); ?>"
                            class="form-control <?= $validation->hasError('nama_event') ? 'is-invalid' : ''; ?>"
                            placeholder="Masukan Nama Event" required autofocus>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label>Penyelenggara Event</label>
                        <input id="nama_penyelenggara" name="nama_penyelenggara" for="nama_penyelenggara" type="text"
                            class="form-control <?= $validation->hasError('nama_penyelenggara') ? 'is-invalid' : ''; ?>"
                            placeholder="" value="<?= old('nama_penyelenggara'); ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label for="id_kategori_event"><b>Kategori</b></label>
                        <select
                            class="form-control <?= $validation->hasError('id_kategori_event') ? 'is-invalid' : ''; ?>"
                            id="id_kategori_event" name="id_kategori_event">

                            <option value="">- Pilih Kategori Event -</option>
                            <?php foreach($kategori_event as $ke) : ?>
                            <option value="<?= $ke['id_kategori_event']; ?>" id="id_kategori_event"
                                <?= old('id_kategori_event') == $ke['id_kategori_event'] ? 'selected' : ''; ?>>
                                <?= $ke['nama_kategori_event']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation-> getError('id_kategori_event'); ?>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-group">
                        <label><b>Lokasi Event </b></label>
                        <input id="lokasi_event" name="lokasi_event" for="lokasi_event" rows="5"
                            class="form-control <?= $validation->hasError('lokasi_event') ? 'is-invalid' : ''; ?>"
                            placeholder="" value="<?= old('lokasi_event'); ?>" required></input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-4">
                    <div class="form-group">
                        <label>Tanggal Event Mulai</label>
                        <input id="tgl_event_mulai" name="tgl_event_mulai" for="tgl_event_mulai" type="date"
                            class="form-control <?= $validation->hasError('tgl_event_mulai') ? 'is-invalid' : ''; ?>"
                            placeholder="" value="<?= old('tgl_event_mulai'); ?>" required>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="form-group">
                        <label>Tanggal Event berakhir</label>
                        <input id="tgl_event_berakhir" name="tgl_event_berakhir" for="tgl_event_berakhir" type="date"
                            class="form-control <?= $validation->hasError('tgl_event_berakhir') ? 'is-invalid' : ''; ?>"
                            placeholder="" value="<?= old('tgl_event_berakhir'); ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label>Deskripsi Event</label>
                        <textarea id="deskripsi_event" name="deskripsi_event" for="deskripsi_event"
                            class="form-control <?= $validation->hasError('nama_penyelenggara') ? 'is-invalid' : ''; ?>"
                            placeholder="" value="<?= old('deskripsi_event'); ?>" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label>Gambar Event</label>
                        <input type="file"
                            class="custom-file-input <?= $validation->hasError('gambar_event') ? 'is-invalid' : ''; ?>"
                            id="gambar_event" value="gambar_event" name="gambar_event"
                            onchange="previewImgPengajuanEvent()" required>
                        <div class="invalid-feedback">
                            <?= $validation-> getError('gambar_event'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <p>Preview Gambar<br>
                            <img id="imgPreview" width="200px" src="/img/event/default.jpg"
                                class="img-thumbnail img-preview">
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="form-group">
                        <label>File Proposal Event</label>
                        <input type="file"
                            class="custom-file-input <?= $validation->hasError('proposal_event') ? 'is-invalid' : ''; ?>"
                            id="proposal_event" value="proposal_event" name="proposal_event"
                            onchange="previewImgPengajuanEvent()" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('proposal_event'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-5">
                    <input type="checkbox" name="checkbox3" value="yes" style="display: inline;" required>
                    <label style="display: inline;" for="">By checking the box, I certify that have read the above
                        disclaimers and agree to
                        the rules.</label>
                    </input>
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