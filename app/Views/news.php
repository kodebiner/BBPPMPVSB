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
        <?php if ($ismobile == false) { ?>
            <!-- Dekstop View -->
            <!-- Article Section 1 -->
            <div class="uk-grid-match uk-grid-divider uk-margin" uk-grid>
                <div class="uk-width-3-4">
                    <a href="/<?= $caturi ?>/<?= $newses[0]['alias'] ?>">
                        <?php $leadNewsImage = json_decode($newses[0]['images']); ?>
                        <div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover" data-src="<?= $leadNewsImage->image_intro ?>" uk-img></div>
                    </a>
                    <div class="uk-panel uk-margin">
                        <div class="uk-margin uk-child-width-1-2" uk-grid>
                            <div>
                                <a class="uk-link-reset" href="/<?= $caturi ?>/<?= $newses[0]['alias'] ?>">
                                    <h4 class="uk-margin-small"><?= $newses[0]['title'] ?></h4>
                                </a>
                            </div>
                            <div>
                                <div class="uk-text-meta uk-text-justify"><?= $newses[0]['introtext'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($count > 1) { ?>
                <div class="uk-width-1-4">
                    <a href="/<?= $caturi ?>/<?= $newses[1]['alias'] ?>">
                        <?php $leadNewsImage = json_decode($newses[1]['images']); ?>
                        <div class="uk-height-medium uk-flex uk-flex-center uk-flex-middle uk-background-cover" data-src="<?= $leadNewsImage->image_intro ?>" uk-img></div>
                    </a>
                    <a class="uk-link-reset" href="/<?= $caturi ?>/<?= $newses[1]['alias'] ?>">
                        <div><?= $newses[1]['title'] ?></div>
                    </a>
                    <div class="uk-text-meta uk-text-justify"><?= $newses[1]['introtext'] ?></div>
                </div>
                <?php } ?>
            </div>
            <!-- Article Section 1 End -->

            <div class="uk-width-1-1@m">
                <hr>
            </div>

            <!-- Article Section 2 -->
            <?php if ($count > 2) { ?>
            <div class="uk-grid-match uk-grid-divider uk-child-width-1-5 uk-margin" uk-grid uk-height-match="target: > div > .uk-panel > .section-2-title">
                <?php
                foreach ($newses as $key => $news) {
                    if (($key > 1) && $key < 7) {
                        $images = json_decode($news['images']);
                ?>
                    <div>
                        <div class="uk-panel uk-margin">
                            <a href="/<?= $caturi ?>/<?= $news['alias'] ?>">
                                <div class="uk-height-small uk-flex uk-flex-center uk-flex-middle uk-background-cover" data-src="<?= $images->image_intro ?>" uk-img></div>
                            </a>
                            <div class="section-2-title uk-margin-small">
                                <h5 class="uk-margin-small-top uk-margin-remove-bottom">
                                    <a class="uk-link-heading" href="/<?= $caturi ?>/<?= $news['alias'] ?>"><?= $news['title'] ?></a>
                                </h5>
                            </div>
                            <div class="uk-text-meta uk-text-justify"><?= $news['introtext'] ?></div>
                        </div>
                    </div>
                <?php
                    }
                }
                ?>
            </div>
            <?php } ?>
            <!-- Article Section 2 End -->
            <div class="uk-width-1-1@m">
                <hr>
            </div>

            <!-- Article Section 3 -->
            <?php if ($count > 7) { ?>
            <div class="uk-grid-match uk-grid-divider" uk-grid>
                <div class="uk-width-4-5">
                    <div class="uk-panel uk-width-1-1">
                        <div class="uk-panel uk-margin uk-text-center@m">
                            <div class="uk-flex-middle" uk-grid>
                                <div class="uk-flex-last uk-flex-center uk-width-1-2">
                                    <a href="/<?= $caturi ?>/<?= $newses[7]['alias'] ?>">
                                        <?php $leadNewsImage = json_decode($newses[7]['images']); ?>
                                        <div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover" data-src="<?= $leadNewsImage->image_intro ?>" uk-img></div>
                                    </a>
                                </div>
                                <div class="uk-width-expand">
                                    <h4 class="uk-margin-top uk-margin-remove-bottom">
                                        <a class="uk-link-heading" href="/<?= $caturi ?>/<?= $newses[7]['alias'] ?>"><?= $newses[7]['title'] ?></a>
                                    </h4>
                                    <div class="uk-panel uk-text-left uk-dropcap uk-column-1-2 uk-margin-medium-top"><?= $newses[7]['introtext'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-5">
                    <div class="uk-margin">
                        <div class="uk-child-width-1-1 uk-grid-divider uk-grid-match" uk-grid>
                            <?php
                            foreach ($newses as $key => $news) {
                                if ($key > 7) {
                            ?>
                                <div>
                                    <div class="uk-panel">
                                        <h6 class="uk-margin-small-top uk-margin-remove-bottom">
                                            <a class="uk-link-heading" href="/<?= $caturi ?>/<?= $news['alias'] ?>"><?= $news['title'] ?></a>
                                        </h6>
                                    </div>
                                    <div class="uk-panel uk-margin-top uk-text-meta"><?= $news['introtext'] ?></div>
                                </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- Article Section 3 End -->
            <!-- Dekstop View End -->
        <?php } else { ?>
            <!-- Mobile View -->
            <!-- Article Section 1 -->
            <div class="uk-grid-match uk-grid-divider uk-child-width-1-1 uk-margin" uk-grid>
                <?php
                foreach ($newses as $key => $news) {
                    if ($key < 7) {
                        $images = json_decode($news['images']);
                ?>
                    <div>
                        <div class="uk-panel uk-margin">
                            <a href="/<?= $caturi ?>/<?= $news['alias'] ?>">
                                <img src="<?= $images->image_intro ?>" class="uk-width-1-1 uk-flex uk-flex-center uk-flex-middle uk-background-cover">
                            </a>
                            <div class="uk-margin-small">
                                <h5 class="uk-margin-small-top uk-margin-remove-bottom">
                                    <a class="uk-link-heading" href="/<?= $caturi ?>/<?= $news['alias'] ?>"><?= $news['title'] ?></a>
                                </h5>
                            </div>
                            <div class="uk-text-meta uk-text-justify"><?= $news['introtext'] ?></div>
                        </div>
                    </div>
                <?php
                    }
                }
                ?>
            </div>
            <!-- Article Section 1 End -->

            <div class="uk-width-1-1@m">
                <hr>
            </div>

            <!-- Article Section 2 -->
            <div class="uk-grid-match uk-grid-divider uk-child-width-1-1" uk-grid>
                <div>
                    <div class="uk-panel uk-width-1-1">
                        <div class="uk-panel uk-margin uk-text-center@m">
                            <div class="uk-flex-middle uk-child-width-1-1" uk-grid>
                                <div class="uk-flex-center">
                                    <a href="/<?= $caturi ?>/<?= $newses[7]['alias'] ?>">
                                        <?php $leadNewsImage = json_decode($newses[7]['images']); ?>
                                        <img src="<?= $leadNewsImage->image_intro ?>" class="uk-width-1-1 uk-flex uk-flex-center uk-flex-middle uk-background-cover">
                                    </a>
                                </div>
                                <div class="uk-width-expand">
                                    <h4 class="uk-margin-top uk-margin-remove-bottom">
                                        <a class="uk-link-heading" href="/<?= $caturi ?>/<?= $newses[7]['alias'] ?>"><?= $newses[7]['title'] ?></a>
                                    </h4>
                                    <div class="uk-panel uk-text-left uk-dropcap uk-margin-medium-top uk-text-meta"><?= $newses[7]['introtext'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-margin">
                        <div class="uk-child-width-1-1 uk-grid-divider uk-grid-match" uk-grid>
                            <?php
                            foreach ($newses as $key => $news) {
                                if ($key > 7) {
                            ?>
                                <div>
                                    <div class="uk-panel">
                                        <h5 class="uk-margin-small-top uk-margin-remove-bottom">
                                            <a class="uk-link-heading" href="/<?= $caturi ?>/<?= $news['alias'] ?>"><?= $news['title'] ?></a>
                                        </h5>
                                    </div>
                                    <div class="uk-panel uk-margin-top uk-text-meta"><?= $news['introtext'] ?></div>
                                </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Article Section 2 End -->
            <!-- Mobile View End -->
        <?php } ?>
    </div>

    <!-- Pagination -->
    <div class="uk-container uk-container-xlarge uk-margin-top">
        <?= $pager->links('news', 'uikit_full') ?>
    </div>
    <!-- Pagination End -->
</section>
<!-- Article Section End -->
<?= $this->endSection() ?>