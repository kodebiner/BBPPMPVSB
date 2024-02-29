<!doctype html>
<html dir="ltr " lang="<?= $lang ?>" vocab="http://schema.org/" style="overflow-y: hidden;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?= base_url(); ?>">
    <!-- <title><?//= $title ?></title> -->
    <!-- <meta name="description" content="<?//= $description ?>"> -->
    <meta name="author" content="PT. Kodebiner Teknologi Indonesia">
    <link rel="stylesheet" href="css/theme.css">
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>

    <!-- Extra Script Section -->
    <?= $this->renderSection('extraScript') ?>
    <!-- Extra Script Section end -->

</head>

<body>
    <!-- Header Section -->
    <header uk-header>
        <div class="uk-padding">
            <div class="uk-container uk-container-xlarge">
                <div class="uk-position-relative uk-flex uk-flex-center uk-flex-middle">
                    <div class="uk-position-center-left uk-position-z-index-high">Lorem</div>
                    <a href="" class="uk-logo">
                        <img width="100" height="50" uk-svg="" src="img/logo.png">
                    </a>
                    <div class="uk-position-center-right uk-position-z-index-high">Ipsum</div>
                </div>
            </div>
        </div>
        <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; end: + *; offset: 80">
            <nav class="uk-navbar-container">
                <div class="uk-container">
                    <div uk-navbar>
                        <div class="uk-navbar-center">
                            <ul class="uk-navbar-nav">
                                <li class="uk-active"><a href="#">Active</a></li>
                                <li>
                                    <a href="#">Parent</a>
                                    <div class="uk-navbar-dropdown">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            <li class="uk-active"><a href="#">Active</a></li>
                                            <li><a href="#">Item</a></li>
                                            <li><a href="#">Item</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="#">Item</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        
    </header>
    <!-- Header Section end -->

    <!-- Main Section -->
    <!-- Main Section end -->
</body>

</html>