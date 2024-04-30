<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- Breadcrumb Section -->
<section>
    <div class="uk-container uk-container-xlarge">
        <nav aria-label="Breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="/">Beranda</a></li>
                <li><a href="<?= $caturi ?>"><?= $cattitle ?></a></li>
                <li><span><?= $article['title'] ?></span></li>
            </ul>
        </nav>

        <hr>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Article Section -->
<section class="uk-section-default uk-section uk-section-xsmall uk-padding-remove-bottom">
    <div class="uk-margin">
        <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 5000; pause-on-hover: false;" uk-height-match="target: > li > a > .uk-inline">
            <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m" uk-grid uk-lightbox="animation: slide">
                <?php
                foreach ($photos as $photo) {
                ?>
                <li>
                    <a class="uk-transition-toggle uk-link-toggle" href="<?= $photo['file'] ?>" data-caption="<?= $photo['file'] ?>">
                        <div>
                            <img src="<?= $photo['file'] ?>" width="1800" height="1200" alt="">
                        </div>
                    </a>
                </li>
                <?php
                }
                ?>
            </ul>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
        </div>
    </div>
    <div class="uk-container uk-container-xlarge"><?= $article['text'] ?></div>
</section>
<!-- Article Section End -->
<?= $this->endSection() ?>