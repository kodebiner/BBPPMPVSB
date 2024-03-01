<!doctype html>
<html dir="ltr " lang="<?= $lang ?>" vocab="http://schema.org/">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?= base_url(); ?>">
    <!-- <title><?//= $title ?></title> -->
    <!-- <meta name="description" content="<?//= $description ?>"> -->
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
        <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; end: + *; offset: 80">
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
    </header>
    <!-- Header Section End -->

    <!-- Main Section -->
    <div class="uk-container uk-container-expand">
        <?= $this->renderSection('main') ?>
    </div>
    <!-- Main Section End -->

    <!-- Footer Section -->
    <!-- Footer Section End -->
</body>

</html>