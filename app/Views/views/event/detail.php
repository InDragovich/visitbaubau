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
        <div class="content">
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
                <p class="heading underline font-x2"><?= $event['nama_event']; ?></p>
            </div>
            <section class="group">
                <div class="one_half first"><img class="inspace-15 borderedbox"
                        src="/img/event/<?= $event['gambar_event']; ?>" alt=""></div>
                <div class="one_half">
                    <ul class="nospace group inspace-15">
                        <li>
                            <article>
                                <table>
                                    <div class="scrollable">
                                        <tr>
                                            <td>
                                                <p><?= $event['deskripsi_event']; ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Lokasi : <?= $event['lokasi_event']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal : <?= date('M d Y',strtotime($event['tgl_event_mulai'])); ?> -
                                                <? date('M d Y',strtotime($event['tgl_event_berakhir'])); ?>
                                            </td>
                                        </tr>
                                    </div>
                                </table>

                            </article>
                        </li>
                    </ul>
                </div>
            </section> <br> <br>
            <!-- ################################################################################################ -->
            <hr class="btmspace-80">
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->

        </div>
</div>


<?= $this->endSection(); ?>