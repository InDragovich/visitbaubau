<?= $this->extend('views/front-templates/index'); ?>

<?= $this->section('content'); ?>
<div class="overlay">
    <div id="breadcrumb" class="hoc clear">
        <!-- ################################################################################################ -->
        <h6 class="heading heading-top">ARTIKEL</h6>
        <br>
        <ul>

        </ul>
        <!-- ################################################################################################ -->
    </div>
</div>

<div class="wrapper row3">
    <main class="hoc container clear">
        <!-- main body -->
        <!-- ################################################################################################ -->
        <div class="content">
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <section class="blog-posts">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="all-blog-posts">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="blog-post">
                                            <div class="blog-thumb">
                                                <img src="/img/artikel/<?= $artikel['gambar_artikel']; ?>" alt="">
                                            </div>
                                            <div class="down-content">
                                                <h4><?= $artikel['judul_artikel']; ?></h4>
                                                <ul class="post-info">
                                                    <li>Admin</li>
                                                    <li><?= date('M d Y',strtotime($artikel['created_at'])); ?>
                                                    </li>
                                                </ul>
                                                <p class="paragraph"><?= $artikel['isi_artikel']; ?></p>
                                                <div class="post-options">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <ul class="post-share">
                                                                <li><i class="fa fa-share-alt"></i></li>
                                                                <li><a href="#">Facebook</a>,</li>
                                                                <li><a href="#"> Twitter</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sidebar">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="sidebar-item recent-posts">
                                            <div class="sidebar-heading">
                                                <h2>Artikel Terkini</h2>
                                            </div>
                                            <div class="content">
                                                <?php foreach ($artikelterkini as $a) : ?>
                                                <ul>
                                                    <li class="latest-artikel" style="margin-bottom: 30px;"><a
                                                            href="/view/detailartikel/<?= $a['slug']; ?>">
                                                            <h5><?= $a['judul_artikel']; ?></h5>
                                                            <span><?= $a['tgl_artikel']; ?></span>
                                                        </a></li>
                                                </ul>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
        <!-- / main body -->
    </main>
</div>

<?= $this->endSection(); ?>