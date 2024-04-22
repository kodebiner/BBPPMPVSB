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
            <div class="uk-child-width-1-1 uk-child-width-1-2@m uk-flex-middle" uk-grid>
                <div>
                    <h3 class="uk-text-secondary"><?= $galleries['title'] ?></h3>
                </div>
                <div>
                    <iframe src="<?= $galleries['link'] ?>" width="1920" height="1080" allowfullscreen uk-responsive uk-video="automute: true"></iframe>
                </div>
            </div>
        </div>
</section>
<!-- Content Section End -->
<?= $this->endSection() ?>