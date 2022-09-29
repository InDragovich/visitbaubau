<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Detail Pertanyaan</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover table-bordered">
                        <tbody>
                            <tr>
                                <td width="20%" scope="row">Perihal</td>
                                <td><?= $pertanyaan['perihal']?></td>

                            </tr>
                            <tr>
                                <td scope="row">Penanya</td>
                                <td><?= $pertanyaan['nama']?> / <?= $pertanyaan['alamat'] ?>
                                    / Email : <a
                                        href="mailto:<?= $pertanyaan['email']; ?>?subject=<?= $pertanyaan['perihal'];  ?>&body=Halo%20 <?= $pertanyaan['nama'];  ?>.%20%0A%0ATerima%20kasih%20sudah%20menghubungi%20Dinas%20Pariwisata%20Kota%20Baubau.%20%0A%0ATerkait%20perihal%20<?= $pertanyaan['perihal'];  ?>%2C%0Abahwasannya..."><?= $pertanyaan['email']; ?></a>
                                    /
                                    No.Telepon :
                                    <a
                                        href="https://wa.me/<?= $pertanyaan['no_telepon']; ?>?text=Halo <?= $pertanyaan['nama'];  ?>! Terima kasih sudah menghubungi Dinas Pariwisata Kota Baubau. Terkait perihal <?= $pertanyaan['nama'];  ?> bahwasannya ... "><?= $pertanyaan['no_telepon']; ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">Deskripsi Pertanyaan</td>
                                <td><?= $pertanyaan['isi_pertanyaan']?></td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="btn btn-outline-primary" target="_blank"
                        href="mailto:<?= $pertanyaan['email']; ?>?subject=<?= $pertanyaan['perihal'];  ?>&body=Halo%20 <?= $pertanyaan['nama'];  ?>.%20%0A%0ATerima%20kasih%20sudah%20menghubungi%20Dinas%20Pariwisata%20Kota%20Baubau.%20%0A%0ATerkait%20perihal%20<?= $pertanyaan['perihal'];  ?>%2C%0Abahwasannya"><i
                            class="fa fa-envelope"></i>
                        Balas via Email</a> &nbsp;
                    <a class="btn btn-outline-success" target="_blank"
                        href="https://wa.me/<?= $pertanyaan['no_telepon']; ?>?text=Halo <?= $pertanyaan['nama'];  ?>! Terima kasih sudah menghubungi Dinas Pariwisata Kota Baubau. Terkait perihal <?= $pertanyaan['nama'];  ?> bahwasannya ... "><i
                            class="fa-brands fa-whatsapp"></i>
                        Balas via Whatsapp</a>
                </div>
            </div>
        </div>
    </div>

</div>


<?= $this->endSection(); ?>