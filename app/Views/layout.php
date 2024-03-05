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
            <div class="uk-padding uk-padding-remove-bottom">
                <div class="uk-container uk-container-xlarge">
                    <div class="uk-position-relative uk-flex uk-flex-center uk-flex-middle">
                        <div class="uk-position-center-left uk-position-z-index-high">
                            <div id="curentdate"></div>
                            <div id="curenttime"></div>
                        </div>
                        <a href="" class="uk-logo">
                            <img width="200" src="img/logo.png">
                        </a>
                        <div class="uk-position-center-right uk-position-z-index-high">
                            <form class="uk-search uk-search-default">
                                <span class="uk-search-icon-flip" uk-search-icon></span>
                                <input class="uk-search-input" type="search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Section End -->
            <!-- Navbar Section -->
            <div uk-sticky="" media="@l" cls-active="uk-navbar-sticky" sel-target=".uk-navbar-container" class="uk-sticky">
                <nav class="uk-navbar-container">
                    <div class="uk-container">
                        <div uk-navbar>
                            <div class="uk-navbar-center">
                                <ul class="uk-navbar-nav">
                                    <li><a href="#">Beranda</a></li>
                                    <li><a href="#">Berita</a></li>
                                    <li>
                                        <a href="#">Diklat</a>
                                        <div class="uk-navbar-dropdown">
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li class="uk-active"><a href="#">Artikel Diklat</a></li>
                                                <li><a href="#">Pendaftaran Diklat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="#">Seminar</a></li>
                                    <li><a href="#">Webinar</a></li>
                                    <li>
                                        <a href="#">Galeri</a>
                                        <div class="uk-navbar-dropdown">
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li class="uk-active"><a href="#">Galeri Foto</a></li>
                                                <li><a href="#">Galeri Video</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="#">Profil</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Navbar Section End -->
            <script>
                // Live Clock
                var curenttime          = document.getElementById("curenttime");
                function clock() {
                    var curentdate      = new Date();
                    var hour            = curentdate.getHours();
                    var minute          = curentdate.getMinutes();
                    var second          = curentdate.getSeconds();
                    curenttime.textContent = 
                        ("0" + hour).substr(-2) + ":" + ("0" + minute).substr(-2) + ":" + ("0" + second).substr(-2);
                }
                setInterval(clock, 1000);

                // Date In Indonesia
                var curentdate      = new Date();
                var year            = curentdate.getFullYear();
                var month           = curentdate.getMonth();
                var date            = curentdate.getDate();
                var day             = curentdate.getDay();

                switch(day) {
                    case 0: day     = "Minggu"; break;
                    case 1: day     = "Senin"; break;
                    case 2: day     = "Selasa"; break;
                    case 3: day     = "Rabu"; break;
                    case 4: day     = "Kamis"; break;
                    case 5: day     = "Jum'at"; break;
                    case 6: day     = "Sabtu"; break;
                }
                switch(month) {
                    case 0: month   = "Januari"; break;
                    case 1: month   = "Februari"; break;
                    case 2: month   = "Maret"; break;
                    case 3: month   = "April"; break;
                    case 4: month   = "Mei"; break;
                    case 5: month   = "Juni"; break;
                    case 6: month   = "Juli"; break;
                    case 7: month   = "Agustus"; break;
                    case 8: month   = "September"; break;
                    case 9: month   = "Oktober"; break;
                    case 10: month  = "November"; break;
                    case 11: month  = "Desember"; break;
                }

                var fulldate        = day + ", " + date + " " + month + " " + year;
                document.getElementById("curentdate").innerHTML = fulldate;
            </script>
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
                                    <img alt="BBPPMPVSB" width="170" height="30" uk-svg="" src="img/logo.png">
                                </a>
                            </div>
                            <div class="uk-navbar-right">
                                <a uk-toggle="" href="#tm-dialog-mobile" class="uk-navbar-toggle" role="button" aria-label="Open menu">
                                    <div uk-navbar-toggle-icon="" class="uk-icon uk-navbar-toggle-icon">

                                    </div>
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
                                <div class="uk-panel">
                                    <form class="uk-search uk-search-default">
                                        <a href="" uk-search-icon></a>
                                        <input class="uk-search-input" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                            <div>
                                <div class="uk-panel">
                                    <ul class="uk-nav-default" uk-nav>
                                        <li class="uk-nav-divider uk-active">
                                            <a href="#">Beranda</a>
                                        </li>
                                        <li class="uk-nav-divider uk-active">
                                            <a href="#">Berita</a>
                                        </li>
                                        <li class="uk-parent uk-nav-divider uk-active">
                                            <a href="#">Diklat <span uk-nav-parent-icon></span></a>
                                            <ul class="uk-nav-sub">
                                                <li class="uk-active">
                                                    <a href="#">Artikel Diklat</a>
                                                </li>
                                                <li class="uk-active">
                                                    <a href="#">Pendaftaran Diklat</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="uk-nav-divider uk-active">
                                            <a href="#">Seminar</a>
                                        </li>
                                        <li class="uk-nav-divider uk-active">
                                            <a href="#">Webinar</a>
                                        </li>
                                        <li class="uk-parent uk-nav-divider uk-active">
                                            <a href="#">Galeri <span uk-nav-parent-icon></span></a>
                                            <ul class="uk-nav-sub">
                                                <li class="uk-active">
                                                    <a href="#">Galeri Foto</a>
                                                </li>
                                                <li class="uk-active">
                                                    <a href="#">Galeri Video</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="uk-nav-divider uk-active">
                                            <a href="#">Profil</a>
                                        </li>
                                    </ul>
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
    <section class="uk-section uk-section-default"></section>
    <!-- Footer Section End -->
</body>

</html>