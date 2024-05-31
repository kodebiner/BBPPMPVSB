<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- Breadcrumb Section -->
<section class="uk-section uk-section-xsmall">
    <div class="uk-container uk-container-xlarge">
        <nav aria-label="Breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="/">Beranda</a></li>
                <li><a href="<?= $caturi ?>"><?= $cattitle ?></a></li>
                <li><span><?= $article['title'] ?></span></li>
            </ul>
        </nav>

        <hr>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Article Section -->
<section class="uk-section-default uk-section uk-section-xsmall uk-padding-remove-bottom">
    <div class="uk-container">
        <div class="uk-container uk-container-xsmall">
            <div class="tm-grid-expand uk-child-width-1-1" uk-grid>
                <div>
                    <h3 class="uk-margin uk-text-center"><?= $article['title'] ?></h3>
                </div>
                <div class="uk-panel uk-text-lead uk-margin-large uk-text-center">
                    <div><p class="uk-text-justify"><?= $article['introtext'] ?></p></div>
                </div>
                <div class="uk-grid-match uk-grid-divider uk-child-width-auto uk-flex-center uk-text-meta uk-text-center uk-margin" uk-grid uk-height-match="target: > .match-content">
                    <div class="match-content uk-flex-middle">
                        <div id="updated_at"></div>
                    </div>
                    <div class="match-content uk-flex-middle">
                        <div><?= $user ?></div>
                    </div>
                    <div class="match-content uk-flex-middle">
                        <div>Dilihat Sebanyak : <?= $visitors ?></div>
                    </div>
                </div>
                <div class="uk-text-center">Bagikan :</div>
                <div class="uk-grid-match uk-child-width-auto uk-flex-center uk-text-meta uk-text-center uk-margin uk-grid-small uk-margin-small-top" uk-grid uk-height-match="target: > .match-media">
                    <div>
                        <a class="uk-icon-button" uk-icon="copy" onclick="CopyLink()"></a>
                        <script>
                            function CopyLink() {
                                // Copy the text inside the text field
                                navigator.clipboard.writeText(window.location.href);

                                // Alert the copied text
                                UIkit.notification({message: 'Link Telah Terduplikasi'})
                            }
                        </script>
                    </div>
                    <div>
                        <a class="uk-icon-button" data-href="<?=$url?>" uk-icon="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?=$urlencode?>&amp;src=sdkpreparse" target="_blank"></a>
                    </div>
                    <div>
                        <a class="uk-icon-button" data-href="<?=$url?>" uk-icon="whatsapp" href="https://wa.me/?text=<?= $urlencode ?>" target="_blank"></a>
                    </div>
                    <div>
                        <a class="uk-icon-button" data-href="<?=$url?>" uk-icon="telegram" href="https://telegram.me/share/url?url=<?= $urlencode ?>&text=<?= $article['title'] ?>" target="_blank"></a>
                    </div>
                    <div>
                        <a class="uk-icon-button" data-href="<?=$url?>" uk-icon="x" href="http://twitter.com/share?text=<?= $article['title'] ?>&url=<?= $urlencode ?>" target="_blank"></a>
                    </div>
                    <div>
                        <a class="uk-icon-button" data-href="<?=$url?>" uk-icon="linkedin" href="https://www.linkedin.com/feed/?shareActive=true&text=<?= $article['title'] ?> <?= $urlencode ?>" target="_blank"></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="uk-margin">
            <div class="uk-margin-small">
                <img src="<//?= $article['images'] ?>" class="uk-width-1-1">
            </div>
        </div> -->

        <div class="uk-container uk-container-xsmall">
            <img src="<?= $article['images'] ?>" class="uk-width-1-1">
            <div class="uk-panel uk-margin"><?= $article['fulltext'] ?></div>
        </div>
    </div>

    <div class="uk-container uk-container-xsmall">
        <div class="uk-float-left">
            <a class="uk-button uk-button-secondary" href="<?= $prevarticles ?>"><span uk-icon="chevron-left"></span> Sebelumnya</a>
        </div>
        <div class="uk-float-right">
            <a class="uk-button uk-button-secondary" href="<?= $nextarticles ?>">Selanjutnya <span uk-icon="chevron-right"></span></a>
        </div>
    </div>
</section>
<!-- Article Section End -->

<script>
    // Date In Indonesia
    var publishupdate   = "<?= $article['updated_at'] ?>";
    var thatdate        = publishupdate.split( /[- :]/ );
    thatdate[1]--;
    var publishthatdate = new Date( ...thatdate );
    var publishyear     = publishthatdate.getFullYear();
    var publishmonth    = publishthatdate.getMonth();
    var publishdate     = publishthatdate.getDate();
    var publishday      = publishthatdate.getDay();

    switch(publishday) {
        case 0: publishday     = "Minggu"; break;
        case 1: publishday     = "Senin"; break;
        case 2: publishday     = "Selasa"; break;
        case 3: publishday     = "Rabu"; break;
        case 4: publishday     = "Kamis"; break;
        case 5: publishday     = "Jum'at"; break;
        case 6: publishday     = "Sabtu"; break;
    }
    switch(publishmonth) {
        case 0: publishmonth   = "Januari"; break;
        case 1: publishmonth   = "Februari"; break;
        case 2: publishmonth   = "Maret"; break;
        case 3: publishmonth   = "April"; break;
        case 4: publishmonth   = "Mei"; break;
        case 5: publishmonth   = "Juni"; break;
        case 6: publishmonth   = "Juli"; break;
        case 7: publishmonth   = "Agustus"; break;
        case 8: publishmonth   = "September"; break;
        case 9: publishmonth   = "Oktober"; break;
        case 10: publishmonth  = "November"; break;
        case 11: publishmonth  = "Desember"; break;
    }

    var publishfulldate         = publishday + ", " + publishdate + " " + publishmonth + " " + publishyear;
    document.getElementById("updated_at").innerHTML = publishfulldate;
</script>
<?= $this->endSection() ?>