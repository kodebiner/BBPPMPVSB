<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <base href="<?= base_url(); ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png"><!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.19.4/dist/css/uikit.min.css" />
    
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.19.4/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.19.4/dist/js/uikit-icons.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/l80j1589vk3emf9jbxbfk7a8o9i5yzgzxjbdlo5fr71v26f6/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 25px;
    }
    
    .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
    }
    
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }
    
    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 4px;
        bottom: 3px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }
    
    input:checked + .slider {
        background-color: #2196F3;
    }
    
    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }
    
    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }
    
    .slider.round:before {
        border-radius: 50%;
    }

    .footer {
    position:fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: rgb(60, 105, 151);
    color: white;
    text-align: center;
    z-index: 2;
    }
</style>
<body style="margin-bottom: 100px;">
    <div uk-sticky="start: 150; animation: uk-animation-slide-top; sel-target: #navbar; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent">
        <nav id="navbar" class="uk-navbar-container uk-light" style="background-color: rgb(60, 105, 151)">
            <!-- <div class="uk-container uk-margin-medium-left"> -->
            <div class="uk-container uk-width-1-1">
                <div uk-navbar>
                
                    <div class="uk-navbar-left">
                        <ul class="uk-navbar-nav">
                            <li class="uk-active"><button class="uk-button uk-button-default uk-margin-top-small" uk-icon="icon:  menu" type="button" uk-toggle="target: #offcanvas-overlay"></button></li>
                            <!-- <li class="uk-active"><a class="uk-navbar-toggle uk-navbar-toggle-animate" uk-toggle="target: #offcanvas-overlay" uk-navbar-toggle-icon></a></li> -->
                            <!-- <a class="uk-navbar-toggle uk-navbar-toggle-animate" uk-navbar-toggle-icon uk-toggle="target: #offcanvas-overlay"></a> -->
                        </ul>
                    </div>

                    <div class="uk-navbar-right">
                        <ul class="uk-navbar-nav">
                            <li>
                                <a href="#"><span class="uk-margin-small-right" uk-icon="user"></span><?=$user['username']?></a>
                                <div class="uk-navbar-dropdown">
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <li><a href="#">Pengaturan Profil</a></li>
                                        <li><a href="logout">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </nav>
    </div>

    <div class="uk-section uk-preserve-color uk-margin-large-left">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- <div id="offcanvas-overlay" uk-offcanvas="mode: push"> -->
    <div id="offcanvas-overlay" uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar" style="background-color: #6489ae">
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            <h3 class="uk-text-uppercase"><span style="padding-right:10px; padding-top: 3px; display:inline-block;"><img src="/favicon/favicon-32x32.png"></img></span>bbppmpvsb</h3>
            <hr class="uk-divider-icon">
            <ul class="uk-iconnav uk-iconnav-vertical uk-nav-default" uk-nav>
                <li class="<?= (($uri->getSegment(1) === 'dashboard') && ($uri->getSegment(2) === '')) ? 'uk-active' : '' ?>"><a href="/dashboard"><span class="uk-margin-right" uk-icon="home"></span>Beranda</a></li>
                <li class="uk-nav-divider uk-margin-small <?= (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'berita') || (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'addberita') || (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'editberita') ? 'uk-active' : '' ?>"><a href="dashboard/berita"><span class="uk-margin-right" uk-icon="file-text"></span>Berita</a></li>
                <li class="uk-nav-divider uk-margin-small <?= (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'seminar') || (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'addseminar') || (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'editseminar') ? 'uk-active' : '' ?>"><a href="dashboard/seminar"><span class="uk-margin-right" uk-icon="comments"></span>Seminar</a></li>
                <!-- <li class="uk-nav-divider uk-margin-small <?= (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'berita') || (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'addberita') || (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'editberita') ? 'uk-active' : '' ?>"><a href="dashboard/berita"><span class="uk-margin-right" uk-icon="world"></span>Web Binar</a></li> -->
                <li class="uk-nav-divider uk-margin-small <?= (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'diklat') || (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'adddiklat') || (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'editdiklat') ? 'uk-active' : '' ?>"><a href="dashboard/diklat"><span class="uk-margin-right" uk-icon="file-edit"></span>Diklat</a></li>
                <li class="uk-nav-divider uk-margin-small <?= (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'artista') || (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'addartista') || (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'editartista') ? 'uk-active' : '' ?>"><a href="dashboard/artista"><span class="uk-margin-right" uk-icon="copy"></span>Artista</a></li>
                <li class="uk-nav-divider uk-margin-small <?= (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'jadwal') || (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'addjadwal') || (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'editjadwal') ? 'uk-active' : '' ?>"><a href="dashboard/jadwal"><span class="uk-margin-right" uk-icon="move"></span>Jadwal Kegiatan</a></li>
                <!-- <li class="uk-nav-divider uk-margin-small <?= (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'kategori') ? 'uk-active' : '' ?>"><a href="dashboard/kategori"><span class="uk-margin-right" uk-icon="thumbnails"></span>Kategori</a></li> -->
                <li class="uk-nav-divider uk-margin-small uk-parent <?= (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'video') || ($uri->getSegment(1) === 'dashboard') && ($uri->getSegment(2) === 'foto') || ($uri->getSegment(1) === 'dashboard') && ($uri->getSegment(2) === 'addvideo') || ($uri->getSegment(1) === 'dashboard') && ($uri->getSegment(2) === 'editvideo')  ? 'uk-active' : '' ?>">
                    <a href="#"><span class="uk-margin-right" uk-icon="grid"></span>Galeri<span uk-nav-parent-icon></span></a>
                    <ul class="uk-iconnav uk-iconnav-vertical uk-nav-sub">
                        <li class="<?= (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'galeri') || ($uri->getSegment(1) === 'dashboard') && ($uri->getSegment(2) === 'foto') ? 'uk-active' : '' ?>"><a href="dashboard/foto"><span class="uk-margin-right" uk-icon="image"></span>Foto</a></li>
                        <li class="uk-nav-divider uk-margin-small <?= (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'galeri') || ($uri->getSegment(1) === 'dashboard') && ($uri->getSegment(2) === 'video') || ($uri->getSegment(1) === 'dashboard') && ($uri->getSegment(2) === 'addvideo') || ($uri->getSegment(1) === 'dashboard') && ($uri->getSegment(2) === 'editvideo') ? 'uk-active' : '' ?>"><a href="dashboard/video"><span class="uk-margin-right" uk-icon="play-circle"></span>Video</a></li>
                    </ul>
                </li>
                <li class="uk-nav-divider <?= (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'slideshow') || ($uri->getSegment(1) === 'dashboard') && ($uri->getSegment(2) === 'addslideshow') || ($uri->getSegment(1) === 'dashboard') && ($uri->getSegment(2) === 'editslideshow') ? 'uk-active' : '' ?>"><a href="dashboard/slideshow"><span class="uk-margin-right" uk-icon="album"></span>Slideshow</a></li>
            </ul>
        </div>
    </div>

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

</body>
<div class="footer">
    <p class="uk-margin-top">Copyright &copy; <?php auto_copyright("2023"); ?><br />PT Kodebiner Teknologi Indonesia</p>
</div>
</html>