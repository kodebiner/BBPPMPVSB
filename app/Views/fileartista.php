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
<!-- <section class="uk-section-default uk-section uk-section-xsmall uk-padding-remove-bottom">
    <div class="uk-text-center"> -->
        <!-- <object type="application/pdf" data="artista/artikel/<?= $article['file'] ?>" width="1500" height="1300"></object> -->
        <!-- <iframe src="<?= $article['file'] ?>" frameborder="0" class="iframeDom" data-v-81b37a33="" style="width: 100%; height: 100%; max-width: 100%; max-height: 100%;"></iframe> -->
    <!-- </div>
</section> -->
<div style="position:relative;padding-top:max(60%,324px);width:100%;height:0;">
    <iframe style="position:absolute;border:none;width:100%;height:100%;left:0;top:0;" src="<?= $article['file'] ?>"  seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" ></iframe>
</div>
<!-- Article Section End -->
<?= $this->endSection() ?>