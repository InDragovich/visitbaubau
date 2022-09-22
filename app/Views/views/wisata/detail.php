<?= $this->extend('views/front-templates/index'); ?>

<?= $this->section('content'); ?>
<div class="overlay" style="background-image: url(/img/wisata/<?= $wisata['gambar_wisata']; ?>);height: 700px;">

</div>
<!-- <div id="breadcrumb" class="hoc clear"> -->
<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->
        <div class="content">
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
                <p class="heading underline font-x2"><?= $wisata['nama_wisata']; ?></p>
            </div>
            <section class="group">
                <!-- <div class="one_half"> -->
                <ul class="nospace group">
                    <li>
                        <article>
                            <table>
                                <div class="">
                                    <tr>
                                        <td>
                                            <p>Alamat : <?= $wisata['alamat_wisata']; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p> Deskripsi : <?= $wisata['deskripsi_wisata']; ?></p>
                                        </td>
                                    </tr>
                                </div>
                            </table>
                        </article>
                    </li>
                </ul>
                <!-- </div> -->
            </section>
        </div>
    </main>
</div>
<!-- </div> -->

<?= $this->endSection(); ?>