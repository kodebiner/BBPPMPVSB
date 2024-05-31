<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- Breadcrumb Section -->
<section class="uk-section uk-section-xsmall">
    <div class="uk-container uk-container-expand">
        <nav aria-label="Breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="/">Beranda</a></li>
                <li><span><?= $cattitle ?></span></li>
            </ul>
        </nav>

        <hr>
    </div>
</section>
<!-- Breadcrumb Section End -->

<section class="uk-section-default uk-section uk-section-xsmall uk-padding-remove-bottom">
    <div class="uk-container uk-container-expand">
        <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-4@m uk-grid-large uk-grid-match uk-flex-middle" uk-grid>
            <?php
            foreach ($artistas as $key => $artista) {
            ?>
                <div>
                    <!-- <div class="">
                        <a class="" href="artista/<?= $artista['alias'] ?>" target="_blank">
                            <img src="images/artista/<?= $artista['photo'] ?>" alt="<?= $artista['title'] ?>">
                        </a>
                    </div> -->
                    <div class="uk-light uk-scrollspy-inview">
                        <a class="uk-inline-clip uk-transition-toggle uk-link-toggle" href="publikasi/artista/<?= $artista['alias'] ?>">
                            <img src="artista/foto/<?= $artista['photo'] ?>" alt="<?= $artista['title'] ?>">
                            <div class="uk-overlay-primary uk-transition-fade uk-position-cover"></div>
                            <div class="uk-position-center uk-transition-fade">
                                <div class="uk-overlay">
                                    <div class="uk-h4 uk-margin-top uk-margin-remove-bottom uk-text-center"><?= $artista['title'] ?></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>

<!-- Pagination -->
<div class="uk-container uk-container-xlarge uk-margin-top">
    <?= $pager ?>
</div>
<!-- Pagination End -->
<?= $this->endSection() ?>