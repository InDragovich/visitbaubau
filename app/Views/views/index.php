<?= $this->extend('views/front-templates/index'); ?>

<?= $this->section('content'); ?>
<div class="overlay">
    <div id="pageintro" class="hoc clear">

        <article>
            <h3 class="heading"><span class="heading-bold">Visit Baubau</span> </h3>
            <p>INFORMASI SEPUTAR PARIWISATA, EVENT DAN UMKM YANG ADA DI KOTA BAUBAU</p>
            <footer>
                <a class="btn btn1" href="#title-about">
                    <span class="button-text">Tentang Kota Baubau</span>
                    <span class="button-icon"><i class="fa-solid fa-angles-right"></i></span>
                </a>
            </footer>
            <!-- <footer><a class="btn" href="wisata.php">LOGIN ADMIN</a></footer> -->
        </article>

    </div>
</div>

<div id="title-about" class="wrapper row3">
    <main id="title-about" class="hoc clear">
        <!-- main body -->
        <div class="title-about">
            <div class="sectiontitle">
                <p class="heading underline font-x2">Tentang Kota Baubau</p>
            </div>

            <div class="title-about-text">
                <p>Kota Baubau berada di Pulau Buton yang terletak di sebelah tenggara jazirah Pulau Sulawesi. Pulau ini
                    diapit oleh lautan, yaitu Laut Banda di sebelah utara dan timur, kemudian Laut Flores di sebelah
                    selatannya, sedangkan di sebelah barat terdapat Selat Buton dan Teluk Bone.
                </p>
                <p>Dari sisi letak secara
                    nasional, Kota Baubau merupakan kota yang memiliki letak strategis. Kota Baubau adalah daerah
                    penghubung (connecting area) antara Kawasan Barat Indonesia (KBI) dengan Kawasan Timur Indonesia
                    (KTI). Selain itu bagi masyarakat daerah hinterlandnya (Kabupaten Buton, Kabupaten Muna, Kabupaten
                    Wakatobi, Kabupaten Bombana, Kabupaten Buton Tengah dan Kabupaten Buton Selatan), Kota Baubau
                    berperan sebagai daerah akumulator hasil produksi dan distributor kebutuhan daerah tersebut. Kota
                    Baubau yang berada pada Selat Baubau dan merupakan mulut Tenggara dari wilayah Laut Teluk Bone
                    berada pada pergeseran titik episentrum ekonomi kelautan kawasan pasifik sebagai masa depan bagi
                    pertumbuhan kawasan Timur Indonesia.</p>
            </div>
        </div>


        <hr class="btmspace-80">
        <div class="sectiontitle home">
            <p class="heading underline font-x2">Destinasi Wisata</p>
        </div>


        <section id="introblocks">
            <ul class="blocks nospace group btmspace-80 d-flex justify-content-evenly">
                <?php foreach (array_slice($wisata , 0, 3) as $w) : ?>
                <li class="one_third">
                    <figure><a class="" href="<?= base_url('view/detailwisata/'.$w['slug']); ?>"><img class="img-wisata"
                                style="height: 340px; width: fit-content; object-fit:cover;"
                                src="/img/wisata/<?= $w['gambar_wisata']; ?>" alt=""></a>
                        <figcaption>
                            <h6 class="heading"><?= $w['nama_wisata']; ?></h6>
                        </figcaption>
                    </figure>
                </li>
                <?php endforeach; ?>
            </ul>
            <a href="/view/wisata" style="font-size: 18px;">Lihat Selengkapnya</a>
        </section>

        <hr class="btmspace-80">
        <div class="sectiontitle home">
            <p class="heading underline font-x2">Event</p>
        </div>

        <!-- <section class="event group">
            <div class="one_half first"><img class="inspace-15 borderedbox " src="/images/ramadan.jpg" alt=""></div>
            <div class="one_half">
            </div>
        </section> -->

        <div class="event_content">
            <div>

            </div>
        </div>
        <!-- <section class=" event group"> -->
        <div class="one_half first"><img class="inspace-15 borderedbox " src="/img/event/adwi.jpg" alt=""></div>
        <div class="one_half">
            <ul class="nospace group inspace-15">

                <?php foreach (array_slice($event,0,2) as $e) : ?>
                <li class="one_half first btmspace-50">
                    <article>
                        <h6 class="heading"><a href="#"><?= $e['nama_event']; ?></a></h6>
                        <p class="nospace">Berlokasi di <?= $e['lokasi_event']; ?></p>
                        <p class="nospace">Mulai pada Tanggal <?= $e['tgl_event_mulai']; ?></p>
                        <p class="nospace">Berakhir pada Tanggal <?= $e['tgl_event_berakhir']; ?></p>
                        <a class="">READ MORE</a>
                    </article>
                </li>

                <?php endforeach; ?>
            </ul>
        </div>
        <hr class="btmspace-80">
        <!-- </section> -->

        <!-- / main body -->
        <div class="clear"></div>

        <section class="hoc clear">

            <div class="sectiontitle">
                <p class="heading underline font-x2">Artikel</p>
            </div>
            <ul class="blocks nospace group d-flex justify-content-evenly">
                <?php foreach (array_slice($artikel , 0, 3) as $a) : ?>
                <li class="one_third event first">
                    <article>
                        <figure><a class="" href="#"><img src="/img/artikel/<?= $a['gambar_artikel']; ?>" alt=""
                                    style="height: 175px;" class="object-fit_cover"></a></a>
                            <figcaption>
                                <h6 class="heading"><b><a href="/view/artikel/detailartikel/<?= $a['slug']; ?>"
                                            class="stretched-link"><?= $a['judul_artikel']; ?></b></a>
                                </h6>
                            </figcaption>
                        </figure>
                        <p class="note-status-output"><?= word_limiter($a['isi_artikel'],40); ?></p>
                <li>
                    <time datetime="d-m-Y"><?= date('M d Y',strtotime($a['created_at'])); ?></time>
                </li>
                </article>
                </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <div class="wrapper row3">
            <section class="hoc clear ">

                <div class="sectiontitle">
                    <p class="heading underline font-x2">UMKM</p>
                </div>

                <section id="introblocks">
                    <ul class="blocks nospace group btmspace-80 d-flex justify-content-evenly">
                        <?php foreach (array_slice($produk , 0, 3) as $p) : ?>
                        <li class="one_third">
                            <figure><a class="" href=""><img class="img-wisata"
                                        style="height: 340px; width: fit-content; object-fit:cover;"
                                        src="/img/produk/<?= $p['gambar_produk']; ?>" alt=""></a>
                                <figcaption>
                                    <h6 class="heading"><?= $p['nama_produk']; ?></h6>
                                </figcaption>
                            </figure>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- <a href="/pages/wisata" style="font-size: 18px;">Lihat Selengkapnya</a> -->
                </section>

            </section>
        </div>


        <div class="wrapper row3">
            <section class="hoc clear ">

                <div class="sectiontitle">
                    <p class="heading underline font-x2">Media Sosial</p>
                </div>
                <div data-mc-src="fe167207-28a1-422a-9303-8575ba8c148d#instagram"></div>

                <script src="https://cdn2.woxo.tech/a.js#62ea2cbc64b2e4b089d14ec5" async data-usrc>
                </script>
            </section>
        </div>
        <hr class="btmspace-80">
    </main>
</div>





<div class="wrapper row3">

</div>


<?= $this->endSection(); ?>