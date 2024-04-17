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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color:rgba(60, 105, 151, .8);
   color: white;
   text-align: center;
}
</style>
<body>
    <nav class="uk-navbar-container uk-light" style="background-color: rgba(60, 105, 151, .8);">
        <!-- <div class="uk-container uk-margin-medium-left"> -->
        <div class="uk-container uk-width-1-1">
            <div uk-navbar>
            
                <div class="uk-navbar-left">
                    <ul class="uk-navbar-nav">
                        <li class="uk-active"><button class="uk-button uk-button-default uk-margin-top-small" uk-icon="icon:  menu" type="button" uk-toggle="target: #offcanvas-overlay"></button></li>
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

    <div class="uk-section uk-preserve-color uk-margin-large-left">
        <?= $this->renderSection('content') ?>
    </div>

    <div id="offcanvas-overlay" uk-offcanvas="mode: push">
    <!-- <div id="offcanvas-overlay" uk-offcanvas="overlay: true"> -->
        <div class="uk-offcanvas-bar" style="background-color: #3c6997">
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            <h3 class="uk-text-uppercase"><span style="padding-right:10px; padding-top: 3px; display:inline-block;"><img src="/favicon/favicon-32x32.png"></img></span>bbppmpvsb</h3>
            <hr class="uk-divider-icon">
            <ul class="uk-iconnav uk-iconnav-vertical uk-nav-default">
                <li class="<?= (($uri->getSegment(1) === 'dashboard') && ($uri->getSegment(2) === '')) ? 'uk-active' : '' ?>"><a href="/dashboard"><span class="uk-margin-right" uk-icon="home"></span>Beranda</a></li>
                <li class="uk-nav-divider uk-margin-small <?= (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'artista') || (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'addartista') || (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'editartista') ? 'uk-active' : '' ?>"><a href="dashboard/artista"><span class="uk-margin-right" uk-icon="file-text"></span>Artista</a></li>
                <li class="uk-nav-divider uk-margin-small <?= (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'kategori') ? 'uk-active' : '' ?>"><a href="dashboard/kategori"><span class="uk-margin-right" uk-icon="list"></span>Kategori</a></li>
                <li class="uk-nav-divider uk-margin-small <?= (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'galeri') ? 'uk-active' : '' ?>"><a href="dashboard/galeri"><span class="uk-margin-right" uk-icon="image"></span>Galeri</a></li>
                <li class="uk-nav-divider <?= (($uri->getSegment(1) === 'dashboard')) && ($uri->getSegment(2) === 'galeri') ? 'uk-active' : '' ?>"><a href="slideshow"><span class="uk-margin-right" uk-icon="album"></span>Slideshow</a></li>
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

    <div class="footer">
        <p class="uk-margin-top">Copyright &copy; <?php auto_copyright("2023"); ?><br />PT.Kode Biner Teknologi Indonesia</p>
    </div>
</body>
</html>