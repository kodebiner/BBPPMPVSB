<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- Slideshow -->
<div class="uk-section">
    <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slideshow="animation: fade; autoplay: true; ratio:10:3; pause-on-hover: false; autoplay-interval: 5000;">
        <ul class="uk-slideshow-items">
            <?php foreach ($slideshows as $slideshow) { ?>
                <li>
                    <img src="img/slideshow/<?= $slideshow['file'] ?>" alt="" uk-cover>
                </li>
            <?php } ?>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slideshow-item="next"></a>
    </div>
</div>
<!-- Slideshow End -->

<!-- External Link Section -->
<!-- <section class="uk-section uk-section-default">
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
</section> -->
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
                        ?>
                        <div>
                            <a class="uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle" href="/informasi/seminarwebinar/<?= $workshop['alias'] ?>">
                                <img src="<?= $workshop['images'] ?>" width="610" height="420" alt="<?= $workshop['title'] ?>" class="uk-transition-scale-up uk-transition-opaque">
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
                            ?>
                            <li>
                                <a href="/berita/<?= $news['alias'] ?>">
                                    <div class="uk-inline">
                                        <div>
                                            <img src="<?= $news['images'] ?>" width="1800" height="1200" alt="">
                                        </div>
                                        <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-light">
                                            <h3 class="uk-margin-remove uk-text-bold uk-margin-remove"><?= $news['title'] ?></h3>
                                            <div class="uk-text-bold"><p><?= $news['introtext'] ?></p></div>
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
                ?>
                    <div>
                        <a class="uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle" href="/informasi/seminarwebinar/<?= $workshop['alias'] ?>">
                            <img src="<?= $workshop['images'] ?>" width="610" height="420" alt="<?= $workshop['title'] ?>" class="uk-transition-scale-up uk-transition-opaque">
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
            <div class="uk-margin uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="autoplay; true:">
                <ul class="uk-slider-items uk-child-width-1-1 uk-grid">
                    <?php
                    foreach ($newses as $key => $news) {
                    ?>
                    <li>
                        <a class="uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle" href="/berita/<?= $news['alias'] ?>">
                            <img src="<?= $news['images'] ?>" width="1800" height="1200" alt="">
                            <div class="uk-position-bottom-right uk-tile-default">
                                <div class="uk-overlay uk-padding-small uk-width-medium uk-margin-remove-first-child">
                                    <div class="uk-text-meta uk-margin-top">
                                        <span class="uk-text-primary"><?= $news['title'] ?></span>
                                    </div>
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
                ?>
                    <li>
                        <div class="uk-flex uk-flex-middle uk-height-medium">
                            <a class="uk-inline" href="<?= $schedule['images'] ?>" data-caption="<?= $schedule['title'] ?>">
                                <img src="<?= $schedule['images'] ?>" alt="<?= $schedule['title'] ?>">
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
                    <a href="/informasi/diklat" style="text-transform: uppercase; text-decoration-line: underline;">Diklat</a>
                </h3>
            </div>
            
            <?php if ($ismobile == false) { ?>
                <!-- Dekstop View -->
                <div class="uk-grid-match" uk-grid>
                    <div class="uk-width-2-5">
                        <a class="uk-inline-clip uk-transition-toggle uk-link-toggle" href="/informasi/diklat">
                            <img src="<?= $diklats[0]['images'] ?>" alt="<?= $diklats[0]['title'] ?>">
                            <div class="uk-overlay-primary uk-transition-fade uk-position-cover"></div>
                            <div class="uk-position-center uk-transition-fade">
                                <div class="uk-overlay">
                                    <div class="uk-h4 uk-margin-top uk-margin-remove-bottom uk-text-center" style="color: #fff;"><?= $diklats[0]['title'] ?></div>
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
                                ?>
                                    <div>
                                        <div class="uk-panel">
                                            <div class="uk-height-medium">
                                                <a href="/informasi/diklat">
                                                    <div class="uk-height-small@m uk-flex uk-flex-middle">
                                                        <img src="<?= $diklat['images'] ?>" alt="<?= $diklat['title'] ?>">
                                                    </div>
                                                    <div class="uk-h5 uk-text-justify uk-margin-top uk-margin-remove-bottom uk-text-bold" style="color: #fff;"><?= $diklat['title'] ?></div>
                                                </a>
                                            </div>
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
                    ?>
                        <div>
                            <a class="uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle" href="/informasi/diklat">
                                <img src="<?= $diklat['images'] ?>" width="610" height="420" alt="<?= $diklat['title'] ?>" class="uk-transition-scale-up uk-transition-opaque">
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