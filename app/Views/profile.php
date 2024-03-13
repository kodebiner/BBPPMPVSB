<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- Breadcrumb Section -->
<section>
    <div class="uk-container uk-container-xlarge">
        <nav aria-label="Breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="/">Beranda</a></li>
                <li><span><?= $cattitle ?></span></li>
            </ul>
        </nav>

        <hr>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- About Section -->
<section class="uk-section-default uk-margin-top">
    <div class="uk-background-norepeat uk-background-center-center uk-section uk-section-large" data-src="/img/bgabout.svg" uk-img>
        <div class="uk-container uk-container-large">
            <h2 class="uk-text-center"><?= $profiles[5]['title'] ?></h2>
            <div class="tm-grid-expand uk-grid-large uk-grid-margin-large uk-child-width-1-2 uk-grid-match" uk-grid>
                <div>
                    <?php $leadProfileImage = json_decode($profiles[5]['images']); ?>
                    <div class="uk-margin">
                        <img src="<?= $leadProfileImage->image_intro ?>">
                    </div>
                    <div class="uk-h6 uk-text-right@m uk-text-justify uk-text-emphasis"><?= $profiles[5]['introtext'] ?></div>
                </div>
                <div>
                    <h6 class="uk-margin-medium uk-text-justify"><?= $profiles[5]['fulltext'] ?></h6>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Tugas Pokok dan Fungsi Section -->
<section class="uk-section uk-section-default">
    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h2 class="uk-text-center"><?= $profiles[4]['title'] ?></h2>

            <hr class="uk-divider-small uk-text-center uk-margin">

            <div class="uk-margin-remove-top uk-child-width-1-2 uk-flex-middle uk-text-justify" uk-grid>
                <div>
                    <?= $profiles[4]['introtext'] ?>
                </div>
                <div>
                    <?= $profiles[4]['fulltext'] ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tugas Pokok dan Fungsi Section End -->

<!-- Stuktur Organisasi Section -->
<section class="uk-section-default uk-margin-top">
    <div class="uk-background-norepeat uk-section uk-section-large" data-src="/img/bgteam.svg" uk-img>
        <div class="uk-container uk-container-large uk-flex-center">
            <h2 class="uk-text-center"><?= $profiles[3]['title'] ?></h2>

            <div class="uk-child-width-1-2 uk-flex-middle" uk-grid>
                <div>
                    <img src="images/WhatsApp_Image_2022-02-17_at_09.59.28.jpeg" alt="Struktur Organisasi" width="1000" height="750" />
                </div>

                <div>
                    <div class="uk-text-justify" style="color: #000;">
                        <p class="uk-margin-small-bottom">Berikut ini uraian tugas pokok dan fungsi dari masing-masing unit berdasarkan Organisasi dan Tata Kerja di Lingkungan BBPPMPV Seni dan Budaya yang terdiri atas:</p>
                    </div>
                    <div class="uk-text-justify" style="color: #000;">
                        <p>a. Kepala BBPPMPV Seni dan Budaya</p>
                        <p>Kepala Balai Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi Seni Dan Budaya mempunyai tugas merencanakan, mengkoordinasikan, mengarahkan, memonitor, mengevaluasi pelaksanaan kegiatan, dan mempertanggungjawabkan serta melaporkan kinerja institusi dalam melaksanakan pengembangan mutu pendidikan vokasi di bidang seni dan budaya</p>
                        <p>Dalam melaksanakan tugas dan fungsi, Kepala BBPPMPV Seni dan Budaya wajib menyampaikan laporan akuntabilitas kinerja institusi kepada Direktorat Jenderal Pendidikan Vokasi.</p>
                        <p>b. Bagian Tata Usaha</p>
                        <p>Bagian tata usaha BBPPMPV Seni dan Budaya berdasarkan Permendikbud Nomor No. 26 Tahun 2020 mempunyai tugas dan menyelenggarakan fungsi:</p>
                        <ul>
                            <li>Pelaksanaan urusan penyusunan rencana program dan anggaran;</li>
                            <li>Pelaksanaan urusan keuangan;</li>
                            <li>Pelaksanaan urusan persuratan dan kearsipan</li>
                            <li>Pelaksanaan urusan kerumahtanggaan dan hubungan masyarakat;</li>
                            <li>Pelaksanaan urusan ketatalaksanaan dan kepegawaian; dan</li>
                            <li>Pelaksanaan urusan barang milik negara</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Stuktur Organisasi Section End -->

<!-- Visi Misi Section -->
<section class="uk-section uk-section-default">
    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h2 class="uk-text-center"><?= $profiles[2]['title'] ?></h2>

            <hr class="uk-divider-small uk-text-center uk-margin">

            <div class="uk-margin-remove-top uk-child-width-1-2 uk-text-justify" uk-grid>
                <div>
                    <h3 class="uk-text-center">VISI</h3>
                    <p>Balai Besar Pengembangan dan Penjaminan Mutu Pendidikan Vokasi (BBPPMPV) Seni dan Budaya sebagai salah satu Unit Pelaksana Teknis (UPT) dari Direktorat Jenderal Pendidikan Vokasi Kementerian Pendidikan dan Kebudayaan, berdasarkan Permendikbud No. 26 Tahun 2020 mempunyai tugas melaksanakan pengembangan penjaminan mutu pendidikan vokasi sesuai dengan bidangnya.</p>
                    <p class="uk-text-center"><strong>Visi Direktorat Jenderal Pendidikan Vokasi, yaitu:</strong></p>
                    <p><em>"Membangun rakyat Indonesia yang menjadi pembelajar seumur hidup yang unggul, terus berkembang, sejahtera, dan berakhlak mulia dengan menumbuhkan nilai-nilai budaya Indonesia dan Pancasila"</em></p>
                    <p class="uk-text-center">akan didukung oleh BBPMPV Seni dan Budaya, sehingga Visi BBPPMPV Seni dan Budaya :</p>
                    <p><em>"Mewujudkan Pendidikan Vokasi Bidang Seni dan Budaya yang berkualitas dan berdaya saing global sesuai dengan standar kebutuhan dunia usaha dan dunia Industri kekinian"</em></p>
                    <p class="uk-text-center">Berikut uraian Visi BBPPMPV Seni dan Budaya:</p>
                    <ul style="list-style-type: disc;">
                        <li>
                            <p>Mutu pengelolaan berstandar nasional dengan mengacu standar Reformasi Birokrasi dalam rangka mendukung pencapaian tujuan dan target untuk memperkuat 6 area perubahan dan atau ZI/WBK dan WBBM;</p>
                        </li>
                        <li>
                            <p>Materi diklat relevan dengan kebutuhan peningkatan kompetensi PTK berbasis dunia usaha dan dunia industri sesuai kebutuhan pengembangan daerah dalam mendukung kesepakatan global;</p>
                        </li>
                        <li>
                            <p>Tersedianya akses layanan yang merata bagi seluruh unsur pendidikan seni dan budaya di Indonesia;</p>
                        </li>
                        <li>
                            <p>Layanan dalam proses diklat dilakukan cepat, tepat, dan memberikan kepuasan pelanggan.</p>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="uk-text-center">MISI</h3>
                    <p class="uk-text-center">Untuk mencapai Visi tersebut, maka Misi BBPPMPV Seni dan Budaya adalah:</p>
                    <ol>
                        <li>
                            <p>Mewujudkan program peningkatan kompetensi pendidik dan tenaga kependidikan vokasi bidang seni dan budaya yang berkualitas dan berdaya saing global sesuai standar dunia usaha dan dunia industri;</p>
                        </li>
                        <li>
                            <p>Mewujudkan program kemitraan dan penyelarasan pengembangan mutu pendidikan vokasi bidang seni dan budaya dengan dunia usaha dan dunia industri;</p>
                        </li>
                        <li>
                            <p>Mewujudkan keterjangkauan dan perluasan akses layanan program peningkatan kompetensi pendidik dan tenaga kependidikan vokasi bidang seni dan budaya;</p>
                        </li>
                        <li>
                            <p>Mewujudkan sistem tata kelola lembaga yang akuntabel dan transparan.</p>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Visi Misi Section End -->

<!-- Kompetensi Keahlian Section -->
<section class="uk-section uk-section-default">
    <div class="uk-container uk-container-large">
        <div class="uk-width-1-1">
            <h2 class="uk-text-center"><?= $profiles[1]['title'] ?></h2>
            <div tabindex="-1" uk-slider="autoplay: true;">
                <div class="uk-position-relative">
                    <div class="uk-slider-container uk-light">
                        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-4@m" uk-grid uk-lightbox="animation: scale">
                            <li>
                                <div class="uk-flex uk-flex-middle uk-height-medium">
                                    <a class="uk-inline" href="images/seni_rupa.jpg" data-caption="Program Keahlian Seni Rupa">
                                        <img src="images/seni_rupa.jpg" alt="seni rupa">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="uk-flex uk-flex-middle uk-height-medium">
                                    <a class="uk-inline" href="images/kriya.jpg" data-caption="Program Keahlian Desain dan Produk Kreatif Kriya">
                                        <img src="images/kriya.jpg" alt="kriya">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="uk-flex uk-flex-middle uk-height-medium">
                                    <a class="uk-inline" href="images/musik-dan-karawitan.jpg" data-caption="Program Keahlian Seni Musik & Program Keahlian Seni Karawitan">
                                        <img src="images/musik-dan-karawitan.jpg" alt="musik dan karawitan">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="uk-flex uk-flex-middle uk-height-medium">
                                    <a class="uk-inline" href="images/tari-dan-teater.jpg" data-caption="Program Keahlian Seni Tari & Program Keahlian Seni Teater">
                                        <img src="images/tari-dan-teater.jpg" alt="tari dan teater">
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="uk-flex uk-flex-middle uk-height-medium">
                                    <a class="uk-inline" href="images/pedalangan-dan-broadcasting.jpg" data-caption="Program Keahlian Seni Pedalangan & Program Keahlian Seni Broadcasting dan Film">
                                        <img src="images/pedalangan-dan-broadcasting.jpg" alt="pedalangan dan broadcasting">
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="uk-hidden@s uk-light">
                        <a class="uk-position-center-left uk-position-small" href uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small" href uk-slidenav-next uk-slider-item="next"></a>
                    </div>
                    <div class="uk-visible@s">
                        <a class="uk-position-center-left-out uk-position-small" href uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right-out uk-position-small" href uk-slidenav-next uk-slider-item="next"></a>
                    </div>
                </div>
            </div>

            <div uk-slider="autoplay: true;">
                <div class="uk-position-relative">
                    <div class="uk-slider-container">
                        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m uk-grid-match" uk-height-match="target: > li > .uk-card > .uk-card-header">
                            <li>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-header">
                                        <h5 class="uk-text-secondary uk-text-center">Program Keahlian Seni Rupa</h5>
                                    </div>
                                    <div class="uk-card-body">
                                        <ol class="uk-margin-small-top">
                                            <li>Seni Lukis</li>
                                            <li>Seni Patung</li>
                                            <li>Desain Komunikasi Visual</li>
                                            <li>Desain Interior dan Teknik Furnitur</li>
                                            <li>Animasi</li>
                                        </ol>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-header">
                                        <h5 class="uk-text-secondary uk-text-center">Program Keahlian Desain dan Produk Kreatif Kriya</h5>
                                    </div>
                                    <div class="uk-card-body">
                                        <ol class="uk-margin-small-top">
                                            <li>Kriya Kreatif Batik dan Tekstil</li>
                                            <li>Kriya Kreatif Kulit dan Imitasi</li>
                                            <li>Kriya Kreatif Keramik</li>
                                            <li>Kriya Kreatif Logam dan Perhiasan</li>
                                            <li>Kriya Kreatif Kayu dan Rotan</li>
                                        </ol>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-header">
                                        <h5 class="uk-text-secondary uk-text-center">Program Keahlian Seni Musik</h5>
                                    </div>
                                    <div class="uk-card-body">
                                        <ol class="uk-margin-small-top">
                                            <li>Seni Musik Klasik</li>
                                            <li>Seni Musik Populer</li>
                                        </ol>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-header">
                                        <h5 class="uk-text-secondary uk-text-center">Program Keahlian Seni Karawitan</h5>
                                    </div>
                                    <div class="uk-card-body">
                                        <ol class="uk-margin-small-top">
                                            <li>Seni Karawitan</li>
                                            <li>Penataan Karawitan</li>
                                        </ol>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-header">
                                        <h5 class="uk-text-secondary uk-text-center">Program Keahlian Seni Tari</h5>
                                    </div>
                                    <div class="uk-card-body">
                                        <ol class="uk-margin-small-top">
                                            <li>Seni Tari</li>
                                            <li>Teater Penataan Tari</li>
                                        </ol>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-header">
                                        <h5 class="uk-text-secondary uk-text-center">Program Keahlian Seni Teater</h5>
                                    </div>
                                    <div class="uk-card-body">
                                        <ol class="uk-margin-small-top">
                                            <li>Pemeranan</li>
                                            <li>Tata Artistik Teater</li>
                                        </ol>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-header">
                                        <h5 class="uk-text-secondary uk-text-center">Program Keahlian Seni Pedalangan</h5>
                                    </div>
                                    <div class="uk-card-body">
                                        <ol class="uk-margin-small-top">
                                            <li>Seni Pedalangan</li>
                                        </ol>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-header">
                                        <h5 class="uk-text-secondary uk-text-center">Program Keahlian Seni Broadcasting dan Film</h5>
                                    </div>
                                    <div class="uk-card-body">
                                        <ol class="uk-margin-small-top">
                                            <li>Produksi Film dan Program Televisi</li>
                                            <li>Produksi dan Siaran Program Telivisi</li>
                                            <li>Produksi dan Siaran Program Radio</li>
                                            <li>Produksi Film</li>
                                        </ol>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="uk-hidden@s uk-light">
                        <a class="uk-position-center-left uk-position-small" href uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small" href uk-slidenav-next uk-slider-item="next"></a>
                    </div>

                    <div class="uk-visible@s">
                        <a class="uk-position-center-left-out uk-position-small" href uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right-out uk-position-small" href uk-slidenav-next uk-slider-item="next"></a>
                    </div>

                </div>
                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
            </div>
        </div>
    </div>
</section>
<!-- Kompetensi Keahlian Section End -->

<!-- Location Section -->
<section class="uk-section-default uk-section-overlap">
    <div class="uk-background-norepeat uk-background-cover uk-background-top-center uk-section" data-src="img/bg.svg" uk-img>
        <div class="uk-container uk-container-large">
            <div class="tm-grid-expand" uk-grid>

            </div>
        </div>
    </div>
</section>
<!-- Location Section End -->

<?= $this->endSection() ?>