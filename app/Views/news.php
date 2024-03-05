<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<?php if ($ismobile == false) { ?>
    <!-- Dekstop View -->
    <section>
        <div class="uk-container uk-container-xlarge">
            <div class="uk-grid-match uk-grid-divider uk-margin" uk-grid>
                <div class="uk-width-3-4">
                    <a href="/berita/<?= $newses[0]['alias'] ?>">
                        <?php $leadNewsImage = json_decode($newses[0]['images']); ?>
                        <div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover" data-src="<?= $leadNewsImage->image_intro ?>" uk-img></div>
                    </a>
                    <div class="uk-panel uk-margin">
                        <div class="uk-margin uk-child-width-1-2" uk-grid>
                            <div>
                                <h4 class="uk-margin-small"><?= $newses[0]['title'] ?></h4>
                            </div>
                            <div>
                                <div class="uk-text-meta uk-text-justify"><?= $newses[0]['introtext'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-4">
                    <a href="/berita/<?= $newses[1]['alias'] ?>">
                        <?php $leadNewsImage = json_decode($newses[1]['images']); ?>
                        <div class="uk-height-medium uk-flex uk-flex-center uk-flex-middle uk-background-cover" data-src="<?= $leadNewsImage->image_intro ?>" uk-img></div>
                    </a>
                    <div><?= $newses[1]['title'] ?></div>
                    <div class="uk-text-meta uk-text-justify"><?= $newses[1]['introtext'] ?></div>
                </div>
            </div>

            <div class="uk-width-1-1@m">
                <hr>
            </div>

            <div class="uk-grid-match uk-grid-divider uk-child-width-1-5 uk-margin" uk-grid>
                <?php
                foreach ($newses as $key => $news) {
                    if (($key > 2) && $key < 8) {
                        $images = json_decode($news['images']);
                ?>
                    <div>
                        <div class="uk-panel uk-margin">
                            <a href="/berita/<?= $news['alias'] ?>">
                                <div class="uk-height-small uk-flex uk-flex-center uk-flex-middle uk-background-cover" data-src="<?= $images->image_intro ?>" uk-img></div>
                            </a>
                            <div class="uk-height-small">
                                <h5 class="uk-margin-small-top uk-margin-remove-bottom">
                                    <a class="uk-link-heading" href="/berita/<?= $news['alias'] ?>"><?= $news['title'] ?></a>
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

            <div class="uk-width-1-1@m">
                <hr>
            </div>

            <div class="uk-grid-match uk-grid-divider" uk-grid>
                <div class="uk-width-4-5">
                    <div class="uk-panel uk-width-1-1">
                        <div class="uk-panel uk-margin uk-text-center@m">
                            <div class="uk-flex-middle" uk-grid>
                                <div class="uk-flex-last uk-flex-center uk-width-1-2">
                                    <a href="/berita/<?= $newses[8]['alias'] ?>">
                                        <?php $leadNewsImage = json_decode($newses[8]['images']); ?>
                                        <div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover" data-src="<?= $leadNewsImage->image_intro ?>" uk-img></div>
                                    </a>
                                </div>
                                <div class="uk-width-expand">
                                    <h4 class="uk-margin-top uk-margin-remove-bottom">
                                        <a class="uk-link-heading" href="/berita/<?= $newses[8]['alias'] ?>"><?= $newses[8]['title'] ?></a>
                                    </h4>
                                    <div class="uk-panel uk-text-left uk-dropcap uk-column-1-2 uk-margin-medium-top"><?= $newses[8]['introtext'] ?></div>
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
                                            <a class="uk-link-heading" href="/berita/<?= $news['alias'] ?>"><?= $news['title'] ?></a>
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
        </div>
    </section>
    <?= $pager->links('news', 'uikit_full') ?>
    <!-- Dekstop View End -->
<?php } ?>
<?= $this->endSection() ?>