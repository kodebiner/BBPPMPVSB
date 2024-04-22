<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- Breadcrumb Section -->
<section>
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
                    <div><?= $article['description'] ?></div>
                </div>
                <div class="uk-grid-match uk-grid-divider uk-child-width-1-3 uk-flex-center uk-text-meta uk-text-center uk-margin" uk-grid uk-height-match="target: > .match-content">
                    <div class="match-content uk-flex-middle">
                        <div id="updated_at"></div>
                    </div>
                    <div class="match-content uk-flex-middle">
                        <div><?= $user['name'] ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-margin-small">
                <img src="<?= $article['images'] ?>" class="uk-width-1-1">
            </div>
        </div>

        <div class="uk-container uk-container-xsmall">
            <div class="uk-panel uk-margin"><?= $article['fulltext'] ?></div>
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