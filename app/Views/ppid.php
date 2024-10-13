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

<!-- Article Section -->
<section class="uk-section-default uk-section">
    <div class="uk-container uk-container-xlarge">
        <?php if (!empty($article)) { ?>
            <?= $article['content'] ?>
        <?php } ?>
    </div>
</section>
<!-- Article Section End -->
<?= $this->endSection() ?>