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

<!-- Header Section -->
<section class="uk-section-default uk-margin-top">
    <div class="uk-container uk-container-xlarge">
        <div class="uk-text-center uk-margin">
            <?php if ($ismobile === false) { ?>
                <h3>Standar Pelayanan Publik<br>Balai Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi Seni dan Budaya</h3>
            <?php } else { ?>
                <h3>Standar Pelayanan Publik BBPPMPVSB</h3>
            <?php } ?>

            <?php if(!empty($sp)) { ?>
                <object type="application/pdf" data="standarpelayanan/<?= $sp['file'] ?>" width="1500" height="1300"></object>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Header Section End -->

<?= $this->endSection() ?>