<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- Breadcrumb Section -->
<section>
    <div class="uk-container uk-container-xlarge">
        <nav aria-label="Breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="/">Beranda</a></li>
                <li><span>Maklumat Pelayanan</span></li>
            </ul>
        </nav>

        <hr>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Article Section -->
<section class="uk-section-default uk-section">
    <div class="uk-container uk-container-xlarge">
        <?php if (!empty($article)) { ?>
            <?= $article['text'] ?></div>
        <?php } ?>
</section>
<!-- Article Section End -->
<?= $this->endSection() ?>