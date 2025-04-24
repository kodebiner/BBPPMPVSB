<!doctype html>
<html dir="ltr " lang="id" vocab="http://schema.org/">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?= base_url(); ?>">
    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>">
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="author" content="PT. Kodebiner Teknologi Indonesia">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/joomla-alert.min.css">
    <link rel="stylesheet" href="css/joomla-fontawesome.min.css">
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <script src="js/core.min.js"></script>
    <script src="js/messages.min.js"></script>
    <script src="js/newsletter.min.js"></script>
    <script src="js/theme.js"></script>
    
    <!-- Tiny MCE Js  -->
    <script src="https://cdn.tiny.cloud/1/fbtmdxwnanfjdicy4oh9uxzzp0idhv1sdbyxml3t9lgz0v6r/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Extra Script Section -->
    <?= $this->renderSection('extraScript') ?>
    <!-- Extra Script Section end -->

</head>

<body>
    <!-- Header Section -->
    <header uk-header>
        <?php if ($ismobile == false) { ?>
            <!-- Dekstop View -->
            <!-- Header Section -->
            <div class="uk-width-1-1">
                <img src="img/header/HeaderWebsite.jpeg">
            </div>
            <!-- Header Section End -->
            <!-- Navbar Section -->
            <div uk-sticky="" media="@l" cls-active="uk-navbar-sticky" sel-target=".uk-navbar-container" class="uk-sticky">
                <nav class="uk-navbar-container">
                    <div class="uk-container uk-container-expand" style="background: #3C6997 !important;">
                        <div class="uk-flex-middle" uk-navbar>
                            <div class="uk-navbar-center">
                                <ul class="uk-navbar-nav">
                                    <li class="<?= ($uri->getSegment(1) === '') ? 'uk-active' : '' ?>">
                                        <a class="uk-text-bold uk-text-uppercase" href="" style="color: #fff;">Beranda</a>
                                    </li>
                                    <li class="<?= ($uri->getSegment(1) === 'profil') ? 'uk-active' : '' ?>">
                                        <a class="uk-text-bold uk-text-uppercase" href="profil" style="color: #fff;">Profil</a>
                                    </li>
                                    <!-- <li class="uk-parent </?= ($uri->getSegment(1)==='kemitraan') && ($uri->getSegment(2)==='')?'uk-active':'(:any)' ?>">
                                        <a class="uk-text-bold uk-text-uppercase" href="" style="color: #fff;">Kemitraan</a>
                                        <div class="uk-navbar-dropdown">
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                </?php
                                                foreach ($kemitraans as $kemitraan)
                                                {
                                                ?>
                                                    <li class="</?= ($uri->getSegment(1)==='kemitraan') && ($uri->getSegment(2) === $kemitraan['alias'])?'uk-active':'' ?>">
                                                        <a href="kemitraan/</?= $kemitraan['alias'] ?>"></?= $kemitraan['title'] ?></a>
                                                    </li>
                                                </?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </li> -->
                                    <li class="<?= ($uri->getSegment(1) === 'berita') ? 'uk-active':''?> ">
                                        <a class="uk-text-bold uk-text-uppercase" href="berita" style="color: #fff;">Berita</a>
                                    </li>
                                    <li class="uk-parent <?= ($uri->getSegment(1)==='layanan') && ($uri->getSegment(2)==='formulirpermohonan')?'uk-active':'' ?><?= ($uri->getSegment(1)==='layanan') && ($uri->getSegment(2)==='standarpelayanan')?'uk-active':'' ?><?= ($uri->getSegment(1)==='layanan') && ($uri->getSegment(2)==='maklumat')?'uk-active':'' ?><?= ($uri->getSegment(1)==='layanan') && ($uri->getSegment(2)==='survey')?'uk-active':'' ?>">
                                        <a class="uk-text-bold uk-text-uppercase" href="" style="color: #fff;">Layanan</a>
                                        <div class="uk-navbar-dropdown">
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li class="<?= ($uri->getSegment(1)==='layanan') && ($uri->getSegment(2)==='formulirpermohonan')?'uk-active':'' ?>">
                                                    <a href="layanan/formulirpermohonan">Permohonan Informasi</a>
                                                </li>
                                                <li class="<?= ($uri->getSegment(1)==='layanan') && ($uri->getSegment(2)==='standarpelayanan')?'uk-active':'' ?>">
                                                    <a href="layanan/standarpelayanan">Standar Pelayanan</a>
                                                </li>
                                                <li class="<?= ($uri->getSegment(1)==='layanan') && ($uri->getSegment(2)==='maklumat')?'uk-active':'' ?>">
                                                    <a href="layanan/maklumat">Maklumat Layanan</a>
                                                </li>
                                                <li class="<?= ($uri->getSegment(1)==='layanan') && ($uri->getSegment(2)==='survey')?'uk-active':'' ?>">
                                                    <a href="layanan/survey">Hasil Survey</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="uk-parent <?= ($uri->getSegment(1)==='pengaduan') && ($uri->getSegment(2)==='formulirpengaduan')?'uk-active':'' ?> <?= ($uri->getSegment(1)==='pengaduan') && ($uri->getSegment(2)==='formulirgratifikasi')?'uk-active':'' ?>">
                                        <a class="uk-text-bold uk-text-uppercase" href="" style="color: #fff;">Pengaduan</a>
                                        <div class="uk-navbar-dropdown">
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li>
                                                    <a href="https://www.lapor.go.id/" target="_blank">SP4N-Lapor</a>
                                                </li>
                                                <li>
                                                    <a href="https://wbs.kemdikbud.go.id/" target="_blank">Whistle Blowing System</a>
                                                </li>
                                                <li class="<?= ($uri->getSegment(1)==='pengaduan') && ($uri->getSegment(2)==='formulirpengaduan')?'uk-active':'' ?>">
                                                    <a href="pengaduan/formulirpengaduan">Pengaduan Masyarakat</a>
                                                </li>
                                                <li class="<?= ($uri->getSegment(1)==='pengaduan') && ($uri->getSegment(2)==='formulirgratifikasi')?'uk-active':'' ?>">
                                                    <a href="pengaduan/formulirgratifikasi">Lapor Gratifikasi</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="uk-parent <?= ($uri->getSegment(1)==='rbi') && ($uri->getSegment(2)==='')?'uk-active':'(:any)' ?>">
                                        <a class="uk-text-bold uk-text-uppercase" href="" style="color: #fff;">RBI</a>
                                        <div class="uk-navbar-dropdown">
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <?php
                                                foreach ($parentrbis as $parent)
                                                {
                                                ?>
                                                    <li class="<?= ($uri->getSegment(1)==='rbi') && ($uri->getSegment(2) === $parent['alias'])?'uk-active':'' ?>">
                                                        <a href="rbi/<?= $parent['alias'] ?>"><?= $parent['title'] ?></a>
                                                        <div class="uk-navbar-dropdown" style="--uk-position-shift-offset: 100px; --uk-position-viewport-offset: 100px;">
                                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                                <?php
                                                                foreach ($subparents as $subparent)
                                                                {
                                                                    if ($subparent['parentid'] == $parent['id'])
                                                                    {
                                                                    ?>
                                                                        <li class="<?= ($uri->getSegment(1)==='rbi') && ($uri->getSegment(2) === $subparent['alias'])?'uk-active':'' ?>">
                                                                            <a href="rbi/<?= $subparent['alias'] ?>"><?= $subparent['title'] ?></a>
                                                                            <div class="uk-navbar-dropdown" style="--uk-position-shift-offset: 100px; --uk-position-viewport-offset: 100px;">
                                                                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                                                                    <?php
                                                                                    foreach ($childs as $child)
                                                                                    {
                                                                                        if ($child['parentid'] == $subparent['id'])
                                                                                        {
                                                                                        ?>
                                                                                            <li class="<?= ($uri->getSegment(1)==='rbi') && ($uri->getSegment(2) === $child['alias'])?'uk-active':'' ?>">
                                                                                                <a href="rbi/<?= $child['alias'] ?>"><?= $child['title'] ?></a>
                                                                                            </li>
                                                                                        <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="<?= ($uri->getSegment(1) === 'ppid') ? 'uk-active' : '' ?>">
                                        <a class="uk-text-bold uk-text-uppercase" href="ppid" style="color: #fff;">PPID</a>
                                    </li>
                                    <!-- <li class="uk-parent </?= ($uri->getSegment(1)==='publikasi') && ($uri->getSegment(2)==='artista')?'uk-active':'' ?>">
                                        <a class="uk-text-bold uk-text-uppercase" href="" style="color: #fff;">Publikasi</a>
                                        <div class="uk-navbar-dropdown">
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li>
                                                    <a href="https://sendikraf.kemdikbud.go.id" target="_blank">Jurnal Sendikraf</a>
                                                </li>
                                                <li class="</?= ($uri->getSegment(1)==='publikasi') && ($uri->getSegment(2)==='artista')?'uk-active':'' ?>">
                                                    <a href="publikasi/artista">Majalah Artista</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li> -->
                                    <!-- <li class="uk-parent </?= ($uri->getSegment(1)==='informasi') && ($uri->getSegment(2)==='diklat')?'uk-active':'' ?></?= ($uri->getSegment(1)==='informasi') && ($uri->getSegment(2)==='seminarwebinar')?'uk-active':'' ?>">
                                        <a class="uk-text-bold uk-text-uppercase" href="" style="color: #fff;">Informasi Kegiatan</a>
                                        <div class="uk-navbar-dropdown">
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li class="</?= ($uri->getSegment(1)==='informasi') && ($uri->getSegment(2)==='diklat')?'uk-active':'' ?>">
                                                    <a href="informasi/diklat">Diklat / Pelatihan</a>
                                                </li>
                                                <li class="</?= ($uri->getSegment(1)==='informasi') && ($uri->getSegment(2)==='seminarwebinar')?'uk-active':'' ?>">
                                                    <a href="informasi/seminarwebinar">Seminar / Webinar</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li> -->
                                    <!-- <li class="uk-parent </?= ($uri->getSegment(1)==='galeri') && ($uri->getSegment(2)==='foto')?'uk-active':'' ?></?= ($uri->getSegment(1)==='galeri') && ($uri->getSegment(2)==='video')?'uk-active':'' ?>">
                                        <a class="uk-text-bold uk-text-uppercase" href="" style="color: #fff;">Galeri</a>
                                        <div class="uk-navbar-dropdown">
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li class="</?= ($uri->getSegment(1)==='galeri') && ($uri->getSegment(2)==='foto')?'uk-active':'' ?>">
                                                    <a href="galeri/foto">Galeri Foto</a>
                                                </li>
                                                <li class="</?= ($uri->getSegment(1)==='galeri') && ($uri->getSegment(2)==='video')?'uk-active':'' ?>">
                                                    <a href="galeri/video">Galeri Video</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="uk-parent </?= ($uri->getSegment(1)==='othermenu') && ($uri->getSegment(2)==='')?'uk-active':'(:any)' ?>">
                                        <a class="uk-text-bold uk-text-uppercase" href="" style="color: #fff;">Menu Lainnya</a>
                                        <div class="uk-navbar-dropdown">
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                </?php
                                                foreach ($othermenus as $othermenu)
                                                {
                                                ?>
                                                    <li class="</?= ($uri->getSegment(1)==='othermenu') && ($uri->getSegment(2) === $othermenu['alias'])?'uk-active':'' ?>">
                                                        <a href="othermenu/</?= $othermenu['alias'] ?>"></?= $othermenu['title'] ?></a>
                                                    </li>
                                                </?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </li> -->
                                    <!-- <li class="uk-parent </?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2)==='kemitraan')?'uk-active':'(:any)' ?></?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2)==='publikasi')?'uk-active':'(:any)' ?></?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2)==='informasi')?'uk-active':'(:any)' ?></?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2)==='galeri')?'uk-active':'(:any)' ?></?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2)==='othermenu')?'uk-active':'(:any)' ?>">
                                        <a class="uk-text-bold uk-text-uppercase" href="" style="color: #fff;">Lainnya</a>
                                        <div class="uk-navbar-dropdown">
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li class="</?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2) === 'kemitraan')?'uk-active':'' ?>">
                                                    <a href="">Kemitraan</a>
                                                    <div class="uk-navbar-dropdown" style="--uk-position-shift-offset: 100px; --uk-position-viewport-offset: 100px;">
                                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                                            </?php
                                                            foreach ($kemitraans as $kemitraan)
                                                            {
                                                            ?>
                                                                <li class="</?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2) === 'kemitraan') && ($uri->getSegment(3) === $kemitraan['alias'])?'uk-active':'' ?>">
                                                                    <a href="lainnya/kemitraan/</?= $kemitraan['alias'] ?>"></?= $kemitraan['title'] ?></a>
                                                                </li>
                                                            </?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="</?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2) === 'publikasi')?'uk-active':'' ?>">
                                                    <a href="">Publikasi</a>
                                                    <div class="uk-navbar-dropdown" style="--uk-position-shift-offset: 100px; --uk-position-viewport-offset: 100px;">
                                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                                            <li>
                                                                <a href="https://sendikraf.kemdikbud.go.id" target="_blank">Jurnal Sendikraf</a>
                                                            </li>
                                                            <li class="</?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2)==='publikasi') && ($uri->getSegment(3)==='artista')?'uk-active':'' ?>">
                                                                <a href="lainnya/publikasi/artista">Majalah Artista</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="</?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2) === 'informasi') && ($uri->getSegment(3) === 'diklat')?'uk-active':'' ?></?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2) === 'informasi') && ($uri->getSegment(3) === 'seminarwebinar')?'uk-active':'' ?>">
                                                    <a href="">Informasi Kegiatan</a>
                                                    <div class="uk-navbar-dropdown" style="--uk-position-shift-offset: 100px; --uk-position-viewport-offset: 100px;">
                                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                                            <li class="</?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2)==='informasi') && ($uri->getSegment(3)==='diklat')?'uk-active':'' ?>">
                                                                <a href="lainnya/informasi/diklat">Diklat / Pelatihan</a>
                                                            </li>
                                                            <li class="</?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2)==='informasi') && ($uri->getSegment(3)==='seminarwebinar')?'uk-active':'' ?>">
                                                                <a href="lainnya/informasi/seminarwebinar">Seminar / Webinar</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="</?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2)==='galeri')?'uk-active':'(:any)' ?>">
                                                    <a href="">Galeri</a>
                                                    <div class="uk-navbar-dropdown" style="--uk-position-shift-offset: 100px; --uk-position-viewport-offset: 100px;">
                                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                                            <li class="</?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2)==='galeri') && ($uri->getSegment(3)==='foto')?'uk-active':'(:any)' ?>">
                                                                <a href="lainnya/galeri/foto">Galeri Foto</a>
                                                            </li>
                                                            <li class="</?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2)==='galeri') && ($uri->getSegment(3)==='video')?'uk-active':'(:any)' ?>">
                                                                <a href="lainnya/galeri/video">Galeri Video</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="</?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2) === 'othermenu')?'uk-active':'' ?>">
                                                    <a href="">Menu Lainnya</a>
                                                    <div class="uk-navbar-dropdown" style="--uk-position-shift-offset: 100px; --uk-position-viewport-offset: 100px;">
                                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                                            </?php
                                                            foreach ($othermenus as $othermenu)
                                                            {
                                                            ?>
                                                                <li class="</?= ($uri->getSegment(1)==='lainnya') && ($uri->getSegment(2) === 'othermenu') && ($uri->getSegment(2) === $othermenu['alias'])?'uk-active':'' ?>">
                                                                    <a href="lainnya/othermenu/</?= $othermenu['alias'] ?>"></?= $othermenu['title'] ?></a>
                                                                </li>
                                                            </?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                            <div class="uk-navbar-right">
                                <div>
                                    <a class="uk-navbar-toggle" href uk-search-icon style="color: #fff;"></a>
                                    <div class="uk-navbar-dropdown" uk-drop="mode: click; cls-drop: uk-navbar-dropdown; boundary: !.uk-navbar; flip: false">
                                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                                            <div class="uk-width-expand">
                                                <form class="uk-margin" id="searchform" action="search" method="GET">
                                                    <input class="uk-input uk-form-width-medium" id="search" name="search" placeholder="Cari" <?= (isset($input['search']) ? 'value="' . $input['search'] . '"' : '') ?> />
                                                </form>
                                            </div>
                                            <div class="uk-width-auto">
                                                <a class="uk-drop-close" href="#" uk-close></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Navbar Section End -->
            <!-- Dekstop View End -->
        <?php } else { ?>
            <!-- Mobile View -->
            <!-- Header Section -->
            <div uk-sticky="" show-on-up="" animation="uk-animation-slide-top" cls-active="uk-navbar-sticky" sel-target=".uk-navbar-container" class="uk-sticky">
                <div class="uk-navbar-container">
                    <div class="uk-container uk-container-expand">
                        <nav class="uk-navbar" uk-navbar="{align: left, container: .tm-header-mobile > [uk-sticky], boundary: .tm-header-mobile .uk-navbar-container}">
                            <div class="uk-navbar-left">
                                <a href="" aria-label="Back to home" class="uk-logo uk-navbar-item">
                                    <img alt="BBPPMPVSB" width="170" height="30" uk-svg="" src="img/logofix.png">
                                </a>
                            </div>
                            <div class="uk-navbar-right">
                                <a uk-toggle="" href="#tm-dialog-mobile" class="uk-navbar-toggle" role="button" aria-label="Open menu">
                                    <div uk-navbar-toggle-icon="" class="uk-icon uk-navbar-toggle-icon"></div>
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Header Section End -->
            <!-- Offcanvas Navbar Section -->
            <div id="tm-dialog-mobile" uk-offcanvas="container: true; overlay: true" mode="slide" flip="" class="uk-offcanvas">
                <div class="uk-offcanvas-bar uk-flex uk-flex-column" role="dialog" aria-modal="true">
                    <!-- Button Close -->
                    <button class="uk-offcanvas-close" type="button" uk-close></button>
                    <!-- Button Close End -->
                    <div class="uk-margin">
                        <div class="uk-child-width-1-1" uk-grid>
                            <div>
                                <form class="uk-margin" id="searchform" action="search" method="GET">
                                    <input class="uk-input uk-form-width-medium" id="search" name="search" placeholder="Cari" <?= (isset($input['search']) ? 'value="' . $input['search'] . '"' : '') ?> />
                                </form>
                            </div>
                            <div>
                                <div class="uk-panel">
                                    <ul class="uk-nav-default" uk-nav>
                                        <li class="uk-nav-divider <?= ($uri->getSegment(1) === '') ? 'uk-active' : '' ?>">
                                            <a href="">Beranda</a>
                                        </li>
                                        <li class="uk-nav-divider <?= ($uri->getSegment(1) === 'profil') ? 'uk-active' : '' ?>">
                                            <a href="profil">Profil</a>
                                        </li>
                                        <li class="uk-parent uk-nav-divider <?= ($uri->getSegment(1) === 'kemitraan') && ($uri->getSegment(2)=== '')?'uk-active':'' ?>">
                                            <a href="">Kemitraan <span uk-nav-parent-icon></span></a>
                                            <ul class="uk-nav-sub">
                                                <?php
                                                foreach ($kemitraans as $kemitraan)
                                                {
                                                ?>
                                                    <li class="<?= ($uri->getSegment(1) === 'kemitraan') && ($uri->getSegment(2)=== $kemitraan['alias'])?'uk-active':'' ?>">
                                                        <a href="kemitraan/<?= $kemitraan['alias'] ?>"><?= $kemitraan['title'] ?></a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <li class="uk-nav-divider <?= ($uri->getSegment(1) === 'berita') ? 'uk-active' : '' ?>">
                                            <a href="berita">Berita</a>
                                        </li>
                                        <li class="uk-parent uk-nav-divider <?= ($uri->getSegment(1) === 'layanan') && ($uri->getSegment(2)=== 'formulirpermohonan')?'uk-active':'' ?><?= ($uri->getSegment(1)==='layanan') && ($uri->getSegment(2)==='standarpelayanan')?'uk-active':'' ?><?= ($uri->getSegment(1)==='layanan') && ($uri->getSegment(2)==='maklumat')?'uk-active':'' ?><?= ($uri->getSegment(1)==='layanan') && ($uri->getSegment(2)==='survey')?'uk-active':'' ?>">
                                            <a href="">Layanan <span uk-nav-parent-icon></span></a>
                                            <ul class="uk-nav-sub">
                                                <li class="<?= ($uri->getSegment(1)==='layanan') && ($uri->getSegment(2)==='formulirpermohonan')?'uk-active':'' ?>">
                                                    <a href="layanan/formulirpermohonan">Permohonan Informasi</a>
                                                </li>
                                                <li class="<?= ($uri->getSegment(1)==='layanan') && ($uri->getSegment(2)==='standarpelayanan')?'uk-active':'' ?>">
                                                    <a href="layanan/standarpelayanan">Standar Pelayanan</a>
                                                </li>
                                                <li class="<?= ($uri->getSegment(1) === 'layanan') && ($uri->getSegment(2)=== 'maklumat')?'uk-active':'' ?>">
                                                    <a href="layanan/maklumat">Maklumat Layanan</a>
                                                </li>
                                                <li class="<?= ($uri->getSegment(1) === 'layanan') && ($uri->getSegment(2)=== 'survey')?'uk-active':'' ?>">
                                                    <a href="layanan/survey">Hasil Survey</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="uk-parent uk-nav-divider <?= ($uri->getSegment(1) === 'pengaduan') && ($uri->getSegment(2)=== 'formulirpengaduan')?'uk-active':'' ?><?= ($uri->getSegment(1) === 'pengaduan') && ($uri->getSegment(2)=== 'formulirgratifikasi')?'uk-active':'' ?>">
                                            <a href="">Pengaduan <span uk-nav-parent-icon></span></a>
                                            <ul class="uk-nav-sub">
                                                <li>
                                                    <a href="https://www.lapor.go.id/" target="_blank">SP4N-Lapor</a>
                                                </li>
                                                <li>
                                                    <a href="https://wbs.kemdikbud.go.id/" target="_blank">Whistle Blowing System</a>
                                                </li>
                                                <li class="<?= ($uri->getSegment(1) === 'pengaduan') && ($uri->getSegment(2)=== 'formulirpengaduan')?'uk-active':'' ?>">
                                                    <a href="pengaduan/formulirpengaduan">Pengaduan Masyarakat</a>
                                                </li>
                                                <li class="<?= ($uri->getSegment(1) === 'pengaduan') && ($uri->getSegment(2)=== 'formulirgratifikasi')?'uk-active':'' ?>">
                                                    <a href="pengaduan/formulirgratifikasi">Lapor Gratifikasi</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="uk-parent uk-nav-divider <?= ($uri->getSegment(1) === 'rbi') && ($uri->getSegment(2)=== '')?'uk-active':'' ?>">
                                            <a href="">RBI <span uk-nav-parent-icon></span></a>
                                            <ul class="uk-nav-sub">
                                                <?php
                                                foreach ($parentrbis as $parentrbi)
                                                {
                                                ?>
                                                    <li class="<?= ($uri->getSegment(1) === 'rbi') && ($uri->getSegment(2)=== $parentrbi['alias'])?'uk-active':'' ?>">
                                                        <a href="rbi/<?= $parentrbi['alias'] ?>"><?= $parentrbi['title'] ?></a>
                                                        <ul class="uk-nav-sub">
                                                            <?php
                                                            foreach ($subparents as $subparent)
                                                            {
                                                                if ($subparent['parentid'] == $parentrbi['id'])
                                                                {
                                                            ?>
                                                                <li class="<?= ($uri->getSegment(1) === 'rbi') && ($uri->getSegment(2)=== $subparent['alias'])?'uk-active':'' ?>">
                                                                    <a href="rbi/<?= $subparent['alias'] ?>"><?= $subparent['title'] ?></a>
                                                                    <ul class="uk-nav-sub">
                                                                        <?php
                                                                        foreach ($childs as $child)
                                                                        {
                                                                            if ($child['parentid'] == $subparent['id'])
                                                                            {
                                                                            ?>
                                                                                <li class="<?= ($uri->getSegment(1) === 'rbi') && ($uri->getSegment(2)=== $child['alias'])?'uk-active':'' ?>">
                                                                                    <a href="rbi/<?= $child['alias'] ?>"><?= $child['title'] ?></a>
                                                                                </li>
                                                                            <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </ul>
                                                                </li>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <li class="uk-nav-divider <?= ($uri->getSegment(1) === 'ppid') ? 'uk-active' : '' ?>">
                                            <a href="profil">PPID</a>
                                        </li>
                                        <li class="uk-parent uk-nav-divider <?= ($uri->getSegment(1) === 'publikasi') && ($uri->getSegment(2)=== 'artista')?'uk-active':'' ?>">
                                            <a href="">Publikasi <span uk-nav-parent-icon></span></a>
                                            <ul class="uk-nav-sub">
                                                <li>
                                                    <a href="https://sendikraf.kemdikbud.go.id" target="_blank">Jurnal Sendikraft</a>
                                                </li>
                                                <li class="<?= ($uri->getSegment(1) === 'publikasi') && ($uri->getSegment(2) === 'artista')?'uk-active':'' ?>">
                                                    <a href="publikasi/artista">Majalah Artista</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="uk-parent uk-nav-divider <?= ($uri->getSegment(1) === 'informasi') && ($uri->getSegment(2)=== 'diklat')?'uk-active':'' ?><?= ($uri->getSegment(1) === 'informasi') && ($uri->getSegment(2) === 'seminarwebinar')?'uk-active':'' ?>">
                                            <a href="">Informasi Kegiatan <span uk-nav-parent-icon></span></a>
                                            <ul class="uk-nav-sub">
                                                <li class="<?= ($uri->getSegment(1) === 'informasi') && ($uri->getSegment(2)=== 'diklat')?'uk-active':'' ?>">
                                                    <a href="informasi/diklat">Diklat / Pelatihan</a>
                                                </li>
                                                <li class="<?= ($uri->getSegment(1) === 'informasi') && ($uri->getSegment(2) === 'seminarwebinar')?'uk-active':'' ?>">
                                                    <a href="informasi/seminarwebinar">Seminar / Webinar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="uk-parent uk-nav-divider <?= ($uri->getSegment(1) === 'galeri') && ($uri->getSegment(2)=== 'foto')?'uk-active':'' ?><?= ($uri->getSegment(1) === 'galeri') && ($uri->getSegment(2) === 'video')?'uk-active':'' ?>">
                                            <a href="">Galeri <span uk-nav-parent-icon></span></a>
                                            <ul class="uk-nav-sub">
                                                <li class="<?= ($uri->getSegment(1) === 'galeri') && ($uri->getSegment(2)=== 'foto')?'uk-active':'' ?>">
                                                    <a href="galeri/foto">Galeri Foto</a>
                                                </li>
                                                <li class="<?= ($uri->getSegment(1) === 'galeri') && ($uri->getSegment(2) === 'video')?'uk-active':'' ?>">
                                                    <a href="galeri/video">Galeri Video</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="uk-parent uk-nav-divider <?= ($uri->getSegment(1) === 'othermenu') && ($uri->getSegment(2)=== '')?'uk-active':'' ?>">
                                            <a href="">Menu Lainnya <span uk-nav-parent-icon></span></a>
                                            <ul class="uk-nav-sub">
                                                <?php
                                                foreach ($othermenus as $othermenu)
                                                {
                                                ?>
                                                    <li class="<?= ($uri->getSegment(1) === 'othermenu') && ($uri->getSegment(2)=== $othermenu['alias'])?'uk-active':'' ?>">
                                                        <a href="othermenu/<?= $othermenu['alias'] ?>"><?= $othermenu['title'] ?></a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="uk-panel">
                                    <div class="uk-text-emphasis">Pengunjung :</div>
                                    <div class="uk-text-emphasis uk-margin-left">Hari ini <span class="uk-float-right uk-margin-left uk-text-secondary"><?= $dailyvisit; ?></span></div>
                                    <div class="uk-text-emphasis uk-margin-left">Bulan ini <span class="uk-float-right uk-margin-left uk-text-secondary"><?= $monthlyvisit; ?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Offcanvas Navbar Section End -->
            <!-- Mobile View End -->
        <?php } ?>
    </header>
    <!-- Header Section End -->

    <!-- Main Section -->
    <style class="uk-margin-remove-adjacent">#page\#0 > div { border-top: 150px solid transparent; background-origin: border-box; } </style>
    <?= $this->renderSection('main') ?>
    <!-- Main Section End -->
    
    <!-- Footer Section -->
    <section class="uk-section uk-section-default">
        <div class="uk-container uk-container-xlarge">
            <?php if ($ismobile == false) { ?>
                <div class="uk-margin uk-flex-middle uk-grid-divider uk-child-width-1-5" uk-grid>
                    <div>
                        <h5 class="uk-text-uppercase uk-text-bold">Kemitraan</h5>
                        <?php
                        foreach ($kemitraans as $kemitraan) { ?>
                            <div class="uk-margin-left">
                                <a href="kemitraan/<?= $kemitraan['alias'] ?>"><?= $kemitraan['title'] ?></a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div>
                        <h5 class="uk-text-uppercase uk-text-bold">Publikasi</h5>
                        <div class="uk-margin-left">
                            <a href="https://sendikraf.kemdikbud.go.id" target="_blank">Jurnal Sendikraf</a>
                        </div>
                        <div class="uk-margin-left">
                            <a href="lainnya/publikasi/artista">Majalah Artista</a>
                        </div>
                    </div>
                    <div>
                        <h5 class="uk-text-uppercase uk-text-bold">Informasi Kegiatan</h5>
                        <div class="uk-margin-left">
                            <a href="lainnya/informasi/diklat">Diklat / Pelatihan</a>
                        </div>
                        <div class="uk-margin-left">
                            <a href="lainnya/informasi/seminarwebinar">Seminar / Webinar</a>
                        </div>
                    </div>
                    <div>
                        <h5 class="uk-text-uppercase uk-text-bold">Galeri</h5>
                        <div class="uk-margin-left">
                            <a href="lainnya/galeri/foto">Galeri Foto</a>
                        </div>
                        <div class="uk-margin-left">
                            <a href="lainnya/galeri/video">Galeri Video</a>
                        </div>
                    </div>
                    <div>
                        <h5 class="uk-text-uppercase uk-text-bold">Menu Lainnya</h5>
                        <?php
                        foreach ($othermenus as $othermenu) { ?>
                            <div class="uk-margin-left">
                                <a href="lainnya/othermenu/<?= $othermenu['alias'] ?>"><?= $othermenu['title'] ?></a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php } ?>
            <div class="uk-grid-large uk-margin uk-flex-middle uk-flex-right@m" uk-grid>
                <div class="uk-width-1-1 uk-width-2-5@m">
                    <div class="uk-margin">
                        <img src="img/logofix.png" />
                    </div>
                    <div class="uk-margin">
                        <a class="uk-text-justify uk-link-reset" href="https://maps.app.goo.gl/CmDkU3P1z9rqL3Cy9" target="_blank">
                            <div>Jl. Kaliurang KM. 12,5 Klidon Sukoharjo Ngaglik, Klidon, Sukoharjo, Sleman, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581</div>
                        </a>
                    </div>
                    <div>
                        <a href="mailto:bbppmpvsb@kemdikbud.go.id" class="uk-link-reset" target="_blank"><span uk-icon="mail"></span> bbppmpvsb@kemdikbud.go.id</a>
                    </div>
                    <div>
                        <a href="https://wa.me/628112934704" class="uk-link-reset" target="_blank"><span uk-icon="whatsapp"></span> +628112934704</a>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-width-2-5@m">
                    <h5 class="uk-text-uppercase uk-text-bold uk-text-center">Daftar Tag :</h5>
                    <div class="uk-child-width-auto uk-grid-small uk-flex-center" uk-grid>
                        <?php
                        foreach ($tags as $tag) { ?>
                            <div>
                                <a class="uk-button uk-button-primary uk-button-small" href="tag?tag=<?= $tag['title'] ?>">#<?= $tag['title'] ?></a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-width-1-5@m">
                    <div class="uk-flex-center uk-child-width-auto uk-grid-collapse" uk-grid>
                        <div>
                            <a href="https://www.linkedin.com/company/bbppmpv-seni-dan-budaya/?originalSubdomain=id" class="uk-icon-button" uk-icon="linkedin" target="_blank"></a>
                        </div>
                        <div>
                            <a href="https://www.tiktok.com/@bbppmpv_senibudaya" class="uk-icon-button" uk-icon="tiktok" target="_blank"></a>
                        </div>
                        <div>
                            <a href="https://twitter.com/bbppmpvsb" class="uk-icon-button" uk-icon="x" target="_blank"></a>
                        </div>
                        <div>
                            <a href="https://www.instagram.com/bbppmpvsenibudaya.kemdikbud/" class="uk-icon-button" uk-icon="instagram" target="_blank"></a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="uk-text-center">
                <div class="uk-width-1-1">
                    <div class="uk-panel uk-text-small uk-text-muted">©
                        <?php
                        function auto_copyright($year = 'auto')
                        {
                            if (intval($year) == 'auto') {
                                $year = date('Y');
                            }
                            if (intval($year) == date('Y')) {
                                echo intval($year);
                            }
                            if (intval($year) < date('Y')) {
                                echo intval($year) . ' - ' . date('Y');
                            }
                            if (intval($year) > date('Y')) {
                                echo date('Y');
                            }
                        }
                        ?>
                        <?php auto_copyright("2024"); ?> BBPPMPV Seni dan Budaya.<br class="uk-hidden@s"> Developed by <a class="uk-link-muted" href="https://binary111.com/" target="_blank">PT Kodebiner Teknologi Indonesia</a>.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->
</body>

</html>