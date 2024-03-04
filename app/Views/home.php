<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- Dekstop View -->
<?php if ($ismobile == false) { ?>
    <!-- Berita Section -->
    <section>
        <div class="uk-container uk-container-expand">
            <div class="uk-grid-match" uk-grid>
                <div class="uk-width-1-4@l">
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
                <div class="uk-width-3-4@l">
                    <div class="uk-container uk-container-expand uk-background-cover uk-inline" data-src="img/news/Ditjen-Kebudayaanf.jpg" uk-img>
                        <div class="uk-overlay uk-overlay-primary uk-position-bottom">
                            <h3 class="uk-margin-remove uk-text-bold" style="color: #fff;">Ditjen Kebudayaan Koordinasi Pemutakhiran Skema Okupasi Profesi Seni Budaya</h3>
                            <p class="uk-margin-remove" style="color: #fff;">Dalam rangka persiapan dan koordinasi pemutakhiran Skema Okupasi Profesi Seni Budaya, Direktorat Jenderal Kebudayaan mengadakan koordinasi terkait sinkronisasi dan pemutakhiran sertifikasi okupasi dalam ruang lingkup bidang kesenian dengan Balai Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi (BBPPMPV) Seni dan Budaya, Selasa (6/2/2024).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Berita Section End -->

    <hr>

    <!-- Jadwal Kegiatan Section -->
    <section>
        <div class="uk-container uk-container-expand">
            <h3>Jadwal Kegiatan</h3>
            <div class="uk-position-relative uk-visible-toggle uk-light uk-slider uk-slider-container" tabindex="-1" uk-slider="autoplay: true;">
                <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@m" uk-grid uk-lightbox="animation: scale">
                    <li>
                        <div class="uk-flex uk-flex-middle uk-height-medium">
                            <a class="uk-inline" href="img/schedule/1.jpeg" data-caption="Workshop Persiapan Pengembangan Produk Kreatif">
                                <img src="img/schedule/1.jpeg" alt="">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="uk-flex uk-flex-middle uk-height-medium">
                            <a class="uk-inline" href="img/schedule/2.jpg" data-caption="Workshop Bimbingan Penulisan Artikel Jurnal">
                                <img src="img/schedule/2.jpg" alt="">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="uk-flex uk-flex-middle uk-height-medium">
                            <a class="uk-inline" href="img/schedule/3.jpg" data-caption="Rakor Link dan Match BBPPMPV Seni dan Budaya dengan DUDI">
                                <img src="img/schedule/3.jpg" alt="">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="uk-flex uk-flex-middle uk-height-medium">
                            <a class="uk-inline" href="img/schedule/4.jpg" data-caption="Pembuatan Sistem Informasi Manajemen Diklat Untuk Mendukung E-Administarasi">
                                <img src="img/schedule/4.jpg" alt="">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="uk-flex uk-flex-middle uk-height-medium">
                            <a class="uk-inline" href="img/schedule/5.jpg" data-caption="Workshop Rencana Operasional Tahun 2021">
                                <img src="img/schedule/5.jpg" alt="">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="uk-flex uk-flex-middle uk-height-medium">
                            <a class="uk-inline" href="img/schedule/6.jpeg" data-caption="Pendaftaran Pelatihan Upskilling dan Reskilling Guru SMK">
                                <img src="img/schedule/6.jpeg" alt="">
                            </a>
                        </div>
                    </li>
                </ul>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
            </div>
        </div>
    </section>
    <!-- Jadwal Kegiatan Section End -->

    <hr>

    <!-- Diklat Section -->
    <section>
        <div data-src="img/bg.svg" uk-img class="uk-background-norepeat uk-background-cover uk-background-top-center uk-section uk-section-small">
            <div class="uk-container uk-container-expand uk-margin">
                <h3 style="text-transform: uppercase;">Diklat</h3>
                
                <div class="uk-grid-match" uk-grid>
                    <div class="uk-width-2-5@m">
                        <div class="uk-container uk-container-expand uk-background-cover uk-inline" data-src="img/diklat/batiktulis.jpg" uk-img>
                            <a href="">
                                <div class="uk-position-bottom">
                                    <div class="uk-panel uk-overlay uk-overlay-primary uk-text-center">
                                        <h4 class="uk-text-bold" style="color: #fff;">15 Guru Ikuti Diklat Daring Batik Tulis</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="uk-width-3-5@m">
                        <div class="uk-margin">
                            <div class="uk-child-width-1-1 uk-child-width-1-3@m" uk-grid>
                                <div>
                                    <div class="uk-panel">
                                        <div class="uk-height-medium">
                                            <a href="">
                                                <div class="uk-height-small@m uk-flex uk-flex-middle">
                                                    <img src="img/diklat/pembukaan_interior_dkv.jpg" alt="">
                                                </div>
                                                <div class="uk-h5 uk-text-justify uk-margin-top uk-margin-remove-bottom uk-light uk-text-bold">BBPPMPV Seni dan Budaya Selenggarakan Diklat Daring Desain Interior, Produksi Kulit dan DKV</div>
                                            </a>
                                        </div>
                                        <h6 class="uk-margin-remove uk-text-justify uk-text-meta" style="color: #000;">BALAI Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi (BBPPMPV) Seni dan Budaya menggelar Diklat Daring Peningkatan Kompetensi Pendidikan dan Tenaga Kependidikan Seni dan Budaya meliputi Desain Interior dan Teknik Furniture, Membuat Desain Produk Kulit dan Desain Komunikasi Visual (DKV) pada tanggal 24 Agustus s.d. 1 September 2020.</h6>
                                    </div>
                                </div>
                                <div>
                                    <div class="uk-panel">
                                        <div class="uk-height-medium">
                                            <a href="">
                                                <div class="uk-height-small@m uk-flex uk-flex-middle">
                                                    <img src="img/diklat/SELARAS3tutup_3.jpg" alt="">
                                                </div>
                                                <div class="uk-h5 uk-text-justify uk-margin-top uk-margin-remove-bottom uk-light uk-text-bold">Diklat Selaras 3, Terpilih Tiga Karya Terbaik</div>
                                            </a>
                                        </div>
                                        <h6 class="uk-margin-remove uk-text-justify uk-text-meta" style="color: #000;">SUKSES dengan gelaran Diklat Selaras 1 dan 2 maka Balai Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi Seni dan Budaya (BBPPMPV) Seni dan Budaya resmi menutup kegiatan diklat Pembelajaran Daring “Selaras” 3 (Semua Belajar Cerdas). Kegiatan ditutup secara resmi oleh Koordinator Bidang Fasilitasi Peningkatan Kompetensi Drs. Rahayu Windarto, M.M. bertempat di ruang Bima, 6 Agustus 2020.</h6>
                                    </div>
                                </div>
                                <div>
                                    <div class="uk-panel">
                                        <div class="uk-height-medium">
                                            <a href="">
                                                <div class="uk-height-small@m uk-flex uk-flex-middle">
                                                    <img src="img/diklat/Darmasiswa20_2.jpg" alt="">
                                                </div>
                                                <div class="uk-h5 uk-text-justify uk-margin-top uk-margin-remove-bottom uk-light uk-text-bold">Diklat Darmasiswa Berakhir, Mahasiswa Asing Bisa Membatik dan Karawitan</div>
                                            </a>
                                        </div>
                                        <h6 class="uk-margin-remove uk-text-justify uk-text-meta" style="color: #000;">DIKLAT Darmasiswa bagi Mahasiswa asing bidang seni dan budaya resmi ditutup pada 3 Agustus 2020. kegiatan ditutup secara resmi oleh Plt Kepala BBPPMPV Seni dan Budaya Drs. Joko Sarosa, M.Or. kegiatan berlangsung di ruang pameran, diikuti oleh 10 orang.</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Diklat Section End -->
<!-- Dekstop View End -->
<?php } else { ?>
    <!-- Berita Section -->
    <section>
        <div class="uk-container uk-container-expand">
            <div class="uk-grid-match uk-child-width-1-1" uk-grid>
                <div>
                    <a class="uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle" href="/joomla/themes/summit.white-red/elearning/course">
                        <img src="img/news/Ditjen-Kebudayaanf.jpg" width="610" height="420" alt="" class="uk-transition-scale-up uk-transition-opaque">
                        <div class="uk-position-bottom-left uk-tile-default">
                            <div class="uk-overlay uk-padding-small uk-width-medium uk-margin-remove-first-child">
                                <div class="uk-text-meta uk-margin-top">
                                    <span class="uk-text-primary">Ditjen Kebudayaan Koordinasi Pemutakhiran Skema Okupasi Profesi Seni Budaya</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
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
    </section>
    <!-- Berita Section End -->

    <hr>

    <!-- Jadwal Kegiatan Section -->
    <section>
        <div class="uk-container uk-container-expand">
            <h3>Jadwal Kegiatan</h3>
            <div class="uk-position-relative uk-visible-toggle uk-light uk-slider uk-slider-container" tabindex="-1" uk-slider="autoplay: true;">
                <ul class="uk-slider-items uk-child-width-1-2" uk-grid uk-lightbox="animation: scale">
                    <li>
                        <div class="uk-flex uk-flex-middle uk-height-medium">
                            <a class="uk-inline" href="img/schedule/1.jpeg" data-caption="Workshop Persiapan Pengembangan Produk Kreatif">
                                <img src="img/schedule/1.jpeg" alt="">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="uk-flex uk-flex-middle uk-height-medium">
                            <a class="uk-inline" href="img/schedule/2.jpg" data-caption="Workshop Bimbingan Penulisan Artikel Jurnal">
                                <img src="img/schedule/2.jpg" alt="">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="uk-flex uk-flex-middle uk-height-medium">
                            <a class="uk-inline" href="img/schedule/3.jpg" data-caption="Rakor Link dan Match BBPPMPV Seni dan Budaya dengan DUDI">
                                <img src="img/schedule/3.jpg" alt="">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="uk-flex uk-flex-middle uk-height-medium">
                            <a class="uk-inline" href="img/schedule/4.jpg" data-caption="Pembuatan Sistem Informasi Manajemen Diklat Untuk Mendukung E-Administarasi">
                                <img src="img/schedule/4.jpg" alt="">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="uk-flex uk-flex-middle uk-height-medium">
                            <a class="uk-inline" href="img/schedule/5.jpg" data-caption="Workshop Rencana Operasional Tahun 2021">
                                <img src="img/schedule/5.jpg" alt="">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="uk-flex uk-flex-middle uk-height-medium">
                            <a class="uk-inline" href="img/schedule/6.jpeg" data-caption="Pendaftaran Pelatihan Upskilling dan Reskilling Guru SMK">
                                <img src="img/schedule/6.jpeg" alt="">
                            </a>
                        </div>
                    </li>
                </ul>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
            </div>
        </div>
    </section>
    <!-- Jadwal Kegiatan Section End -->

    <hr>

    <!-- Diklat Section -->
    <section>
        <div data-src="img/bg.svg" uk-img class="uk-background-norepeat uk-background-cover uk-background-top-center uk-section uk-section-small">
            <div class="uk-container uk-container-expand uk-margin">
                <h3 style="text-transform: uppercase;">Diklat</h3>
                
                <div class="uk-grid-match uk-child-width-1-1" uk-grid>
                    <div>
                        <a class="uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle" href="/joomla/themes/summit.white-red/elearning/course">
                            <img src="img/diklat/batiktulis.jpg" width="610" height="420" alt="" class="uk-transition-scale-up uk-transition-opaque">
                            <div class="uk-position-bottom uk-light uk-text-center">
                                <div class="uk-overlay uk-overlay-primary uk-padding-small uk-margin-remove-first-child">
                                    <div class="uk-text-meta uk-margin-top">
                                        <span class="uk-text-primary">15 Guru Ikuti Diklat Daring Batik Tulis</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a class="uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle" href="/joomla/themes/summit.white-red/elearning/course">
                            <img src="img/diklat/pembukaan_interior_dkv.jpg" width="610" height="420" alt="" class="uk-transition-scale-up uk-transition-opaque">
                            <div class="uk-position-bottom uk-light uk-text-center">
                                <div class="uk-overlay uk-overlay-primary uk-padding-small uk-margin-remove-first-child">
                                    <div class="uk-text-meta uk-margin-top">
                                        <span class="uk-text-primary">BBPPMPV Seni dan Budaya Selenggarakan Diklat Daring Desain Interior, Produksi Kulit dan DKV</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a class="uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle" href="/joomla/themes/summit.white-red/elearning/course">
                            <img src="img/diklat/SELARAS3tutup_3.jpg" width="610" height="420" alt="" class="uk-transition-scale-up uk-transition-opaque">
                            <div class="uk-position-bottom uk-light uk-text-center">
                                <div class="uk-overlay uk-overlay-primary uk-padding-small uk-margin-remove-first-child">
                                    <div class="uk-text-meta uk-margin-top">
                                        <span class="uk-text-primary">Diklat Selaras 3, Terpilih Tiga Karya Terbaik</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div>
                        <a class="uk-cover-container uk-transition-toggle uk-display-block uk-link-toggle" href="/joomla/themes/summit.white-red/elearning/course">
                            <img src="img/diklat/Darmasiswa20_2.jpg" width="610" height="420" alt="" class="uk-transition-scale-up uk-transition-opaque">
                            <div class="uk-position-bottom uk-light uk-text-center">
                                <div class="uk-overlay uk-overlay-primary uk-padding-small uk-margin-remove-first-child">
                                    <div class="uk-text-meta uk-margin-top">
                                        <span class="uk-text-primary">Diklat Darmasiswa Berakhir, Mahasiswa Asing Bisa Membatik dan Karawitan</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Diklat Section End -->
<?php } ?>
<?= $this->endSection() ?>