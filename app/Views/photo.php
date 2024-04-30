<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- Breadcrumb Section -->
<section>
    <div class="uk-container uk-container-xlarge">
        <nav aria-label="Breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="/">Beranda</a></li>
                <li><a href="<?= $caturi ?>"><?= $cattitle ?></a></li>
                <li><span><?= $photos['title'] ?></span></li>
            </ul>
        </nav>

        <hr>
    </div>
</section>
<!-- Breadcrumb Section End -->

<section>
    <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-small uk-grid-match uk-flex-middle" uk-grid uk-lightbox="animation: slide">
        <?php
        foreach ($galleries as $key => $gallery) {
        ?>
            <div>
                <div class="uk-light uk-scrollspy-inview">
                    <a class="uk-inline-clip uk-transition-toggle uk-link-toggle" href="<?= $gallery['file'] ?>" data-caption="<?= $gallery['file'] ?>">
                        <img src="<?= $gallery['file'] ?>" alt="<?= $gallery['file'] ?>" class="uk-transition-opaque">
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>
<?= $this->endSection() ?>