<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- Breadcrumb Section -->
<section class="uk-section uk-section-xsmall">
    <div class="uk-container uk-container-xlarge">
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

<section>
    <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-small uk-grid-match uk-flex-middle" uk-grid>
        <?php
        foreach ($galleries as $key => $gallery) {
        ?>
            <div>
                <div class="uk-light uk-scrollspy-inview">
                    <a class="uk-inline-clip uk-transition-toggle uk-link-toggle" href="<?= $caturi ?>/<?= $gallery['id'] ?>">
                        <img src="<?= $gallery['images'] ?>" alt="<?= $gallery['title'] ?>" class="uk-transition-opaque">
                        <div class="uk-overlay-primary uk-transition-fade uk-position-cover"></div>
                        <div class="uk-position-center uk-transition-fade">
                            <div class="uk-overlay">
                                <div class="uk-h4 uk-margin-top uk-margin-remove-bottom uk-text-center"><?= $gallery['title'] ?></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>

<!-- Pagination -->
<div class="uk-container uk-container-xlarge uk-margin-top">
    <?= $pager ?>
</div>
<!-- Pagination End -->
<?= $this->endSection() ?>