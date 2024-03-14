<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- External Link Section -->
<section class="uk-section uk-section-default">
    <div class="uk-container uk-container-expand">
        <div class="uk-child-width-1-1 uk-child-width-1-2@m uk-child-width-1-3@l uk-grid-match uk-flex-middle" uk-grid>
            <div></div>
            <div>
                <a href="http://kemdikbud.lapor.go.id/" target="_blank">
                    <img src="img/ExternalLink/1.jpeg" class="uk-width-1-1">
                </a>
            </div>
            <div></div>
        </div>
    </div>
</section>
<!-- External Link Section End -->

<!-- Berita Section -->
<section>
    <?php if ($ismobile == false) { ?>
        <!-- Dekstop View -->
        <div class="uk-container uk-container-expand">
            <div class="uk-grid-match" uk-grid>
                <div class="uk-width-1-4">
                    <div class="uk-child-width-1-1" uk-grid>
                        <?php
                        foreach ($workshops as $key => $workshop) {
                            $images = json_decode($workshop['images']);
                        ?>
                        <div>
                            <a class="uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle" href="/berita/<?= $workshop['alias'] ?>">
                                <img src="<?= $images->image_intro ?>" width="610" height="420" alt="<?= $workshop['title'] ?>" class="uk-transition-scale-up uk-transition-opaque">
                                <div class="uk-position-bottom-left uk-tile-default">
                                    <div class="uk-overlay uk-padding-small uk-width-medium uk-margin-remove-first-child">
                                        <div class="uk-text-meta uk-margin-top">
                                            <span class="uk-text-primary"><?= $workshop['title'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="uk-width-3-4">
                    <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="autoplay; true:">
                        <ul class="uk-slider-items uk-child-width-1-1 uk-grid">
                            <?php
                            foreach ($newses as $key => $news) {
                                $images = json_decode($news['images']);
                            ?>
                            <li>
                                <a href="/berita/<?= $news['alias'] ?>">
                                    <div class="uk-inline">
                                        <div>
                                            <img src="<?= $images->image_intro ?>" width="1800" height="1200" alt="">
                                        </div>
                                        <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-light">
                                            <h3 class="uk-margin-remove uk-text-bold uk-margin-remove"><?= $news['title'] ?></h3>
                                            <div class="uk-text-bold"><?= $news['introtext'] ?></div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dekstop View End -->
    <?php } else { ?>
        <!-- Mobile View -->
        <div class="uk-container uk-container-expand">
            <div class="uk-grid-match uk-child-width-1-1" uk-grid>
                <?php
                foreach ($workshops as $key => $workshop) {
                    $images = json_decode($workshop['images']);
                ?>
                    <div>
                        <a class="uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle" href="/berita/<?= $workshop['alias'] ?>">
                            <img src="<?= $images->image_intro ?>" width="610" height="420" alt="<?= $workshop['title'] ?>" class="uk-transition-scale-up uk-transition-opaque">
                            <div class="uk-position-bottom-left uk-tile-default">
                                <div class="uk-overlay uk-padding-small uk-width-medium uk-margin-remove-first-child">
                                    <div class="uk-text-meta uk-margin-top">
                                        <span class="uk-text-primary"><?= $workshop['title'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- Mobile View End -->
    <?php } ?>
</section>
<!-- Berita Section End -->

<hr>

<!-- Jadwal Kegiatan Section -->
<section>
    <div class="uk-container uk-container-expand">
        <?php if ($ismobile == false) { ?>
            <div class="uk-child-width-1-2@m uk-child-width-1-1 uk-flex uk-flex-middle" uk-grid>
                <div>
                    <h3 class="uk-text-primary">Jadwal Kegiatan</h3>
                </div>
                <div class="uk-text-right uk-text-primary">
                    <a class="uk-h6" href="/jadwal-kegiatan" uk-icon="chevron-right">Selengkapnya</a>
                </div>
            </div>
        <?php } else { ?>
            <h3 class="uk-text-primary">Jadwal Kegiatan</h3>
        <?php } ?>
        <div class="uk-position-relative uk-visible-toggle uk-light uk-slider uk-slider-container" tabindex="-1" uk-slider="autoplay: true;">
            <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-4@m" uk-grid uk-lightbox="animation: scale">
                <?php
                foreach ($schedules as $key => $schedule) {
                    $images = json_decode($schedule['images']);
                ?>
                    <li>
                        <div class="uk-flex uk-flex-middle uk-height-medium">
                            <a class="uk-inline" href="<?= $images->image_intro ?>" data-caption="<?= $schedule['title'] ?>">
                                <img src="<?= $images->image_intro ?>" alt="<?= $schedule['title'] ?>">
                            </a>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
        </div>
        <?php if ($ismobile == true) { ?>
            <div class="uk-text-right uk-text-primary">
                <a class="uk-h6" href="/jadwal-kegiatan" uk-icon="chevron-right">Selengkapnya</a>
            </div>
        <?php } ?>
    </div>
</section>
<!-- Jadwal Kegiatan Section End -->

<hr>

<!-- Diklat Section -->
<section class="uk-section-default uk-section-overlap">
    <div data-src="img/bg.svg" uk-img class="uk-background-norepeat uk-background-cover uk-background-top-center uk-section uk-section-small">
        <div class="uk-container uk-container-expand uk-margin">
            <div class="uk-text-center uk-margin">
                <h3 class="uk-text-primary">
                    <a href="/diklat/artikel" style="text-transform: uppercase; text-decoration-line: underline;">Diklat</a>
                </h3>
            </div>
            
            <?php if ($ismobile == false) { ?>
                <!-- Dekstop View -->
                <div class="uk-grid-match" uk-grid>
                    <div class="uk-width-2-5">
                        <?php $leadDiklatImage = json_decode($diklats[0]['images']); ?>
                        <a class="uk-container uk-container-expand uk-background-cover uk-inline" data-src="<?= $leadDiklatImage->image_intro ?>" uk-img href="/diklat/artikel/<?= $diklats[0]['alias'] ?>">
                            <div class="uk-position-bottom">
                                <div class="uk-panel uk-overlay uk-overlay-primary uk-text-center">
                                    <h4 class="uk-text-bold" style="color: #fff;"><?= $diklats[0]['title'] ?></h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="uk-width-3-5">
                        <div class="uk-margin">
                            <div class="uk-child-width-1-3" uk-grid>
                                <?php
                                foreach ($diklats as $key => $diklat) {
                                    if ($key > 0) {
                                        $images = json_decode($diklat['images']);
                                ?>
                                    <div>
                                        <div class="uk-panel">
                                            <div class="uk-height-medium">
                                                <a href="/diklat/artikel/<?= $diklat['alias'] ?>">
                                                    <div class="uk-height-small@m uk-flex uk-flex-middle">
                                                        <img src="<?= $images->image_intro ?>" alt="<?= $diklat['title'] ?>">
                                                    </div>
                                                    <div class="uk-h5 uk-text-justify uk-margin-top uk-margin-remove-bottom uk-text-bold" style="color: #fff;"><?= $diklat['title'] ?></div>
                                                </a>
                                            </div>
                                            <h6 class="uk-margin-remove uk-text-justify uk-text-meta" style="color: #000;"><?= $diklat['introtext'] ?></h6>
                                        </div>
                                    </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dekstop View End -->
            <?php } else { ?>
                <!-- Mobile View -->
                <div class="uk-grid-match uk-child-width-1-1" uk-grid>
                    <?php
                    foreach ($diklats as $key => $diklat) {
                        $images = json_decode($diklat['images']);
                    ?>
                        <div>
                            <a class="uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle" href="/diklat/<?= $diklat['alias'] ?>">
                                <img src="<?= $images->image_intro ?>" width="610" height="420" alt="<?= $diklat['title'] ?>" class="uk-transition-scale-up uk-transition-opaque">
                                <div class="uk-position-bottom uk-light uk-text-center">
                                    <div class="uk-overlay uk-overlay-primary uk-padding-small uk-margin-remove-first-child">
                                        <div class="uk-text-meta uk-margin-top">
                                            <span class="uk-text-primary"><?= $diklat['title'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <!-- Mobile View End -->
            <?php } ?>
        </div>
    </div>
</section>
<!-- Diklat Section End -->
<?= $this->endSection() ?>