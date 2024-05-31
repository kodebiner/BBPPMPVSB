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
<section class="uk-section-default uk-section uk-padding-remove-top">
    <div class="uk-container uk-container-xlarge">
        <div class="uk-margin-large uk-text-center">
            <label class="uk-text-bold uk-h4">Hasil Penelusuran Berdasarkan Tag</br><span class="uk-text-secondary"><?= $cattitle ?></span></label>
        </div>
        <div class="uk-child-width-1-1" uk-grid>
            <?php
            foreach ($result as $res) {
            ?>
                <div>
                    <a href="<?= $res['url'] ?>">
                        <div class="uk-flex-middle" uk-grid>
                            <div class="uk-width-1-6">
                                <img src="<?= $res['images'] ?>" />
                            </div>
                            <div class="uk-width-5-6@m uk-width-1-1 uk-text-justify">
                                <h4><?= $res['title'] ?></h4>
                                <h5 class="uk-text-meta uk-margin-small"><?= $res['text'] ?></h5>
                            </div>
                        </div>
                    </a>
                </div>
                <hr class="uk-hidden@m">
            <?php
            }
            ?>
        </div>
        <?= $pager_links ?>
    </div>
</section>
<!-- Article Section End -->
<?= $this->endSection() ?>