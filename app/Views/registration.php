<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- Breadcrumb Section -->
<section>
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
<section>
    <div class="uk-container uk-container-xlarge">
        <div class="uk-grid-match uk-child-width-1-3@l uk-child-width-1-2@m uk-child-width-1-1" uk-grid uk-height-match="target: > div > a > .uk-card">
            <?php
            foreach ($newses as $key => $news) {
            ?>
                <div>
                    <a class="uk-link-toggle" href="<?= $caturi .'/'. $news['id'] ?>">
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top">
                                <img src="<?= $news['images'] ?>" alt="<?= $news['title'] ?>">
                            </div>
                            <div class="uk-card-body">
                                <h5><?= $news['title'] ?></h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- Pagination -->
    <div class="uk-container uk-container-xlarge uk-margin-top">
        <?= $pager->links('news', 'uikit_full') ?>
    </div>
    <!-- Pagination End -->
</section>
<!-- Article Section End -->
<?= $this->endSection() ?>