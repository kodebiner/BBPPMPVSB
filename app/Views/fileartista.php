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
    <!-- <embed type="application/pdf" src="download/artista/<?= $article['file'] ?>" width="" height=""></embed> -->
    <div class="uk-text-center">
        <object type="application/pdf" data="download/artista/<?= $article['file'] ?>" width="1500" height="1300"></object>
    </div>
</section>
<!-- Article Section End -->
<?= $this->endSection() ?>