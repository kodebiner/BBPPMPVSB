<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- Breadcrumb Section -->
<section>
    <div class="uk-container uk-container-xlarge">
        <nav aria-label="Breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="/">Beranda</a></li>
                <li><span>Hasil Survey</span></li>
            </ul>
        </nav>

        <hr>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Article Section -->
<section class="uk-section-default uk-section uk-section-xsmall uk-padding-remove-bottom">
    <div class="uk-text-center">
        <h3>Hasil Survey BBPPMPV Seni dan Budaya</h3>
        <?php if(!empty($surveys)) { ?>
            <object type="application/pdf" data="survey/<?= $surveys['file'] ?>" width="1500" height="1300"></object>
        <?php } ?>
    </div>
</section>
<!-- Article Section End -->
<?= $this->endSection() ?>