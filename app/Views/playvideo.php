<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- Breadcrumb Section -->
<section>
    <div class="uk-container uk-container-xlarge">
        <nav aria-label="Breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="/">Beranda</a></li>
                <li><a href="<?= $caturi ?>"><?= $cattitle ?></a></li>
                <li><span><?= $galleries['title'] ?></span></li>
            </ul>
        </nav>

        <hr>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Content Section -->
<section class="uk-background-norepeat uk-background-cover uk-background-top-center uk-section" data-src="img/bg.svg" uk-img>
    <div class="uk-container uk-container-xlarge">
        <div class="uk-flex-middle" uk-grid>
            <div class="uk-width-1-3@m uk-width-1-1">
                <h5 class="uk-text-secondary uk-text-justify"><?= $galleries['title'] ?></h5>
            </div>
            <div class="uk-width-2-3@m uk-width-1-1">
                <iframe src="https://www.youtube.com/embed/<?= $galleries['link'] ?>" width="1920" height="1080" allowfullscreen uk-responsive uk-video="automute: true"></iframe>
            </div>
        </div>
    </div>
</section>
<!-- Content Section End -->
<?= $this->endSection() ?>