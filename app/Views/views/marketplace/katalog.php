<?= $this->extend('views/front-templates/index_market'); ?>

<?= $this->section('content'); ?>
<!-- <nav class="hide-nav-item bg-primary py">
    <div class="container">
        Some top header info for demo
    </div>
</nav> -->

<div class="container">
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div>
                <div class="row">
                    <div class="col col-lg-auto">
                        <h2 class="title bold">Katalog Produk</h2>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar-sticky">
                        <form action="/view/marketplace/cari" method="post" target="_blank">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari Produk..." name="cari">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                                </div>
                            </div>
                        </form>
                        <!-- <br> -->
                        <div class="category-sidebar border">
                            <div class="top">
                                <p>Filter</p>
                            </div>
                            <div class="body p-3">
                                <?php foreach($kategori_produk as $kp) : ?>
                                <a href="<?= base_url(); ?>/produk/kategori/<?= $kp['slug_kategori_produk']; ?>"
                                    name="cari"><?= $kp['nama_kategori_produk'];?></a><br>
                                <?php endforeach; ?>
                                <hr>
                                <a href="<?= base_url('/view/marketplace/katalog/'); ?>"
                                    class="btn-danger text-light btn-sm">Reset Filter</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <!-- <div class="col-lg-8"> -->
                    <section class="tourism-posts">
                        <div class="all-tourism-posts">
                            <div class="row">
                                <?php if(count($produk) == 0){?>
                                <div class="alert alert-warning text-center" role="alert">
                                    Produk yang anda cari tidak ditemukan
                                </div>
                                <?php } ?>
                                <?php foreach ($produk as $p) : ?>
                                <div class="col-lg-3 mb-5">
                                    <div class="card" style="height: 300px;">
                                        <a href="<?= base_url('view/detailproduk/'.$p['slug']); ?>"
                                            class="stretched-link"></a>
                                        <!-- Product image-->
                                        <img class="card-img-top" src="/img/produk/<?= $p['gambar_produk']?>"
                                            alt="..." />
                                        <!-- Product details-->
                                        <div class="card-body p-3">
                                            <div class="text-left">
                                                <!-- Product name-->
                                                <div class="title-product"><?= $p['nama_produk']?></div>
                                                <!-- Product price-->
                                                <div class="title-price">Rp.
                                                    <?= str_replace(",",".",number_format($p['harga']));?>
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
                                <!-- DEBUG-VIEW START 1 APPPATH\Views\pagers\custom_pagination.php -->

                                <?= $pager-> links('produk','custom_pagination'); ?>

                            </div>
                        </div>
                        <!-- </div> -->
                    </section>
                </div>
            </div>
        </div>
    </section>


</div>



<?= $this->endSection(); ?>