<?= $this->extend('views/front-templates/index_market'); ?>

<?= $this->section('content'); ?>
<!-- <nav class="hide-nav-item bg-primary py">
    <div class="container">
        Some top header info for demo
    </div>
</nav> -->

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true" style="margin-top: 160px;">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/img/banner/banner.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="/img/banner/banner.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/banner/banner.png" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="category-menu">
    <div class="main-category">
        <?php foreach($kategori_produk as $kp) : ?>
        <a href="<?= base_url(); ?>/produk/kategori/<?= $kp['slug_kategori_produk']; ?>">
            <div class="item">
                <img src="/img/kategoriproduk/<?= $kp['gambar_kategori_produk']; ?>" class="rounded-circle"
                    style="width:50px ; height: 50px;">
                <p><?= $kp['nama_kategori_produk']; ?></p>

            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<div class="container">
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <form action="/view/marketplace/cari" method="post" target="_blank">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Produk..." name="cari">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </div>
            </form>
            <div>
                <div class="row">
                    <div class="col col-lg-auto">
                        <h2 class="title bold">Katalog Produk</h2>
                    </div>
                    <div class="col">
                        <span><a href="<?= base_url('/view/marketplace/katalog/'); ?>" class="btn-see-more">Lihat
                                Semua</a></span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-6 justify-content-center">
                <?php foreach (array_slice($produk , 0, 12) as $p) : ?>

                <div class="col mb-5">
                    <div class="card" style="height: 300px;">
                        <a href="<?= base_url('view/marketplace/detailproduk/'.$p['slug']); ?>"
                            class="stretched-link"></a>
                        <!-- Product image-->
                        <img class="card-img-top" src="/img/produk/<?= $p['gambar_produk']?>" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-3">
                            <div class="text-left">
                                <!-- Product name-->
                                <div class="title-product"><?= $p['nama_produk']?></div>
                                <!-- Product price-->
                                <div class="title-price">Rp. <?= str_replace(",",".",number_format($p['harga']));?>
                                </div>
                                <!-- Product store-->
                                <div class="title-store mt-2"><i class="fas fa-circle-user"></i>
                                    <?php if ($p['fullname'] == null) { ?>
                                    Merchant
                                    <?php } else { ?>
                                    <?= $p['fullname']?>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>


            </div>
        </div>
    </section>

</div>


<?= $this->endSection(); ?>