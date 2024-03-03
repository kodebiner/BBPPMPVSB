<?= $this->extend('layout') ?>

<?= $this->section('main') ?>
<!-- Berita Section -->
<section>
    <div class="uk-grid-match" uk-grid>
        <div class="uk-width-1-4">
            <div class="uk-child-width-1-1" uk-grid>
                <div>
                    <a class="uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle" href="/joomla/themes/summit.white-red/elearning/course">
                        <img src="img/news/Ibu.jpg" width="610" height="420" alt="" class="uk-transition-scale-up uk-transition-opaque">
                        <div class="uk-position-bottom-left uk-tile-default">
                            <div class="uk-overlay uk-padding-small uk-width-medium uk-margin-remove-first-child">
                                <div class="uk-text-meta uk-margin-top">
                                    <span class="uk-text-primary">BBPPMPV Seni dan Budaya Selenggarakan Pembinaan Pegawai Jelang Tutup Tahun</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div>
                    <a class="uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle" href="/joomla/themes/summit.white-red/elearning/course">
                        <img src="img/news/20231211103358_IMG_8576.jpg" width="610" height="420" alt="" class="uk-transition-scale-up uk-transition-opaque">
                        <div class="uk-position-bottom-left uk-tile-default">
                            <div class="uk-overlay uk-padding-small uk-width-medium uk-margin-remove-first-child">
                                <div class="uk-text-meta uk-margin-top">
                                    <span class="uk-text-primary">BBPPMPV Seni dan Budaya Terima penghargaan Terbaik Implementasi Tugas dan Fungsi.</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div>
                    <a class="uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle" href="/joomla/themes/summit.white-red/elearning/course">
                        <img src="img/news/SBYk3.jpg" width="610" height="420" alt="" class="uk-transition-scale-up uk-transition-opaque">
                        <div class="uk-position-bottom-left uk-tile-default">
                            <div class="uk-overlay uk-padding-small uk-width-medium uk-margin-remove-first-child">
                                <div class="uk-text-meta uk-margin-top">
                                    <span class="uk-text-primary">BBPPMPV Seni dan Budaya-Kepala Sekolah-Pemangku Pendidikan Vokasi Satukan Langkah</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="uk-width-3-4">
            <div class="uk-container uk-container-expand uk-background-cover uk-inline" data-src="img/news/Ditjen-Kebudayaanf.jpg" uk-img>
                <div class="uk-overlay uk-overlay-primary uk-position-bottom">
                    <h3 class="uk-margin-remove uk-text-bold" style="color: #000;">Ditjen Kebudayaan Koordinasi Pemutakhiran Skema Okupasi Profesi Seni Budaya</h3>
                    <p class="uk-margin-remove" style="color: #000;">Dalam rangka persiapan dan koordinasi pemutakhiran Skema Okupasi Profesi Seni Budaya, Direktorat Jenderal Kebudayaan mengadakan koordinasi terkait sinkronisasi dan pemutakhiran sertifikasi okupasi dalam ruang lingkup bidang kesenian dengan Balai Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi (BBPPMPV) Seni dan Budaya, Selasa (6/2/2024).</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Berita Section End -->

<hr>

<!-- Jadwal Kegiatan Section -->
<section>
    <h3>Jadwal Kegiatan</h3>
    <div class="uk-position-relative uk-visible-toggle uk-light uk-slider uk-slider-container" tabindex="-1" uk-slider>
        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@m uk-grid">
            <li>
                <div class="uk-panel">
                    <img src="img/schedule/1.jpeg" alt="">
                    <div class="uk-position-center uk-panel">
                        <h1>1</h1>
                    </div>
                </div>
            </li>
            <li>
                <div class="uk-panel">
                    <img src="img/schedule/2.jpg" alt="">
                    <div class="uk-position-center uk-panel">
                        <h1>2</h1>
                    </div>
                </div>
            </li>
            <li>
                <div class="uk-panel">
                    <img src="img/schedule/3.jpg" alt="">
                    <div class="uk-position-center uk-panel">
                        <h1>3</h1>
                    </div>
                </div>
            </li>
            <li>
                <div class="uk-panel">
                    <img src="img/schedule/4.jpg" alt="">
                    <div class="uk-position-center uk-panel">
                        <h1>4</h1>
                    </div>
                </div>
            </li>
            <li>
                <div class="uk-panel">
                    <img src="img/schedule/5.jpg" alt="">
                    <div class="uk-position-center uk-panel">
                        <h1>5</h1>
                    </div>
                </div>
            </li>
            <li>
                <div class="uk-panel">
                    <img src="img/schedule/6.jpeg" alt="">
                    <div class="uk-position-center uk-panel">
                        <h1>6</h1>
                    </div>
                </div>
            </li>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
    </div>
</section>
<!-- Jadwal Kegiatan Section End -->

<hr>

<!-- Diklat Section -->
<section>
    
</section>
<!-- Diklat Section End -->
<?= $this->endSection() ?>