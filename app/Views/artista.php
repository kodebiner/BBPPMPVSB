<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<section>
    <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-small uk-grid-match uk-flex-middle" uk-grid uk-lightbox="animation: slide">
        <?php
        foreach ($artistas as $key => $artista) {
        ?>
            <div>
                <div class="uk-light uk-scrollspy-inview">
                    <a class="uk-inline-clip uk-transition-toggle uk-link-toggle" href="artista/artikel/<?= $artista['file'] ?>" data-caption="">
                        <img src="artista/foto/<?= $artista['photo'] ?>" alt="" class="uk-transition-opaque">
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