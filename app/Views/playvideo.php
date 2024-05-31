<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- Breadcrumb Section -->
<section class="uk-section uk-section-xsmall">
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
<section class="uk-background-norepeat uk-background-cover uk-background-top-center uk-section uk-padding-remove-top" data-src="img/bg.svg" uk-img>
    <div class="uk-container uk-container-xlarge uk-margin">
        <div class="uk-h4 uk-text-secondary uk-text-center uk-text-bold uk-text-uppercase"><?= $galleries['title'] ?></div>
    </div>
    <div class="uk-container uk-container-large">
        <iframe src="https://www.youtube.com/embed/<?= $galleries['link'] ?>" width="1920" height="1080" allowfullscreen uk-responsive uk-video="automute: true"></iframe>
    </div>
</section>
<!-- Content Section End -->
<?= $this->endSection() ?>