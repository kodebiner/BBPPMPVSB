<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- Breadcrumb Section -->
<section class="uk-section uk-section-xsmall">
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

<?php if (empty($article)) { ?>
    <!-- About Section -->
    <section class="uk-section-default uk-margin-top">
        <div class="uk-background-norepeat uk-background-center-center uk-section uk-section-large" data-src="/img/bgabout.svg" uk-img>
            <div class="uk-container uk-container-large">
                <h3 class="uk-text-center">Tentang BBPPMPV Seni dan Budaya</h3>
                <?php if ($ismobile == false) { ?>
                    <div class="tm-grid-expand uk-grid-large uk-grid-margin-large uk-child-width-1-2 uk-grid-match" uk-grid>
                        <div>
                            <div class="uk-margin">
                                <img src="images\/bbppmpv.jpg">
                            </div>
                            <div class="uk-h6 uk-text-right@m uk-text-justify uk-text-emphasis">
                                <p>Pusat Pengembangan dan Pemberdayaan Pendidik dan Tenaga Kependidikan (PPPPTK) Seni dan Budaya dirintis sejak 1 september 1983 dengan nama PPPG Kesenian. Berdasarkan SK Mendikbud Nomor 0529/1993, PPPPG Kesenin ditetapkan sebagai Unit Pelaksana Teknis di lingkungan Direktorat Pendidikan Dasar dan Menengah dengan tugas dan fungsi utama membina, mengembangkan, meningkatkan SMK khusus di bidang seni dan kriya.</p>
                            </div>
                        </div>
                        <div>
                            <h6 class="uk-margin-medium uk-text-justify">
                                <p>Berdasarkan Keputusan Menteri Pendidikan Nasional Nomor 8 Tahun 2007 tentang Organisasi dan Tata Kerja PPPPTK, PPPG Kesenian berubah nama menjadi Pusat Pengembangan dan Pemberdayan Pendidik dan Tenaga Kependidikan (PPPPTK) Seni dan Budaya. Kedudukan PPPPTK Seni dan Budaya saat itu berada di bawah Badan Pengembangan Sumber Daya Manusia Pendidikan dan Kebudayaan dan Penjaminan Mutu Pendidikan (BPSDMPK-PMP). Pada tanggal 9 Juni 2015 terbit peraturan baru yaitu Peraturan Menteri Pendidikan dan Kebudayaan Indonesia Nomor 16 Tahun 2015 tentang Organisasi dan Tata Kerja PPPPTK yang menyatakan bahwa PPPPTK berada di bawah dan beranggungjawab kepada Direktorat Jenderal Guru dan Tenaga Kependidikan.</p>
                                <p>Pada tanggal 9 Juli 2020 PPPPTK Seni dan Budaya melalui Peraturan Menteri Pendidikan dan Kebudayaan Nomor 26 tahun 2020 berubah menjadi Balai Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi (BBPPMPV) Seni dan Budaya. Berada dibawah dan bertanggungjawab kepada Direktorat Jenderal Pendidikan Vokasi BBPPMPV Seni dan Budaya bertugas untuk melaksanakan pengembangan penjaminan mutu pendidikan vokasi di bidang seni dan budaya.</p>
                            </h6>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="uk-text-center uk-margin">
                        <button class="uk-button uk-button-default uk-button-small" type="button" uk-toggle="target: #about">Baca Selengkapnya</button>
                    </div>
                    <div id="about" hidden>
                        <div class="uk-margin">
                            <img src="images\/bbppmpv.jpg">
                        </div>
                        <div class="uk-h6 uk-text-right@m uk-text-justify uk-text-emphasis">
                            <p>Pusat Pengembangan dan Pemberdayaan Pendidik dan Tenaga Kependidikan (PPPPTK) Seni dan Budaya dirintis sejak 1 september 1983 dengan nama PPPG Kesenian. Berdasarkan SK Mendikbud Nomor 0529/1993, PPPPG Kesenin ditetapkan sebagai Unit Pelaksana Teknis di lingkungan Direktorat Pendidikan Dasar dan Menengah dengan tugas dan fungsi utama membina, mengembangkan, meningkatkan SMK khusus di bidang seni dan kriya.</p>
                            <p>Berdasarkan Keputusan Menteri Pendidikan Nasional Nomor 8 Tahun 2007 tentang Organisasi dan Tata Kerja PPPPTK, PPPG Kesenian berubah nama menjadi Pusat Pengembangan dan Pemberdayan Pendidik dan Tenaga Kependidikan (PPPPTK) Seni dan Budaya. Kedudukan PPPPTK Seni dan Budaya saat itu berada di bawah Badan Pengembangan Sumber Daya Manusia Pendidikan dan Kebudayaan dan Penjaminan Mutu Pendidikan (BPSDMPK-PMP). Pada tanggal 9 Juni 2015 terbit peraturan baru yaitu Peraturan Menteri Pendidikan dan Kebudayaan Indonesia Nomor 16 Tahun 2015 tentang Organisasi dan Tata Kerja PPPPTK yang menyatakan bahwa PPPPTK berada di bawah dan beranggungjawab kepada Direktorat Jenderal Guru dan Tenaga Kependidikan.</p>
                            <p>Pada tanggal 9 Juli 2020 PPPPTK Seni dan Budaya melalui Peraturan Menteri Pendidikan dan Kebudayaan Nomor 26 tahun 2020 berubah menjadi Balai Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi (BBPPMPV) Seni dan Budaya. Berada dibawah dan bertanggungjawab kepada Direktorat Jenderal Pendidikan Vokasi BBPPMPV Seni dan Budaya bertugas untuk melaksanakan pengembangan penjaminan mutu pendidikan vokasi di bidang seni dan budaya.</p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Tugas Pokok dan Fungsi Section -->
    <section class="uk-section uk-section-default">
        <div class="uk-container uk-container-large">
            <?php if ($ismobile == false) { ?>
                <div class="uk-width-1-1">
                    <h3 class="uk-text-center">Tugas Pokok dan Fungsi</h3>

                    <hr class="uk-divider-small uk-text-center uk-margin">

                    <div class="uk-margin-remove-top uk-child-width-1-2 uk-flex-middle uk-text-justify" uk-grid>
                        <div>
                            <p>Peraturan Menteri Pendidikan dan Kebudayaan No. 26 Tahun 2020 tentang Organisasi dan Tata Kerja BBPPMPV Seni dan Budaya menyatakan bahwa BBPPMPV Seni dan Budaya mempunyai tugas melaksanakan pengembangan penjaminan mutu pendidikan vokasi di bidang seni dan budaya.</p>
                        </div>
                        <div>
                            <p>Sedangkan fungsi BBPPMPV Seni dan Budaya adalah sebagai berikut:</p>
                            <ol>
                                <li>Penyusunan program pengembangan penjaminan mutu pendidikan vokasi;</li>
                                <li>Pelaksanaan penjaminan mutu peserta didik, sarana prasarana, dan tata kelola pendidikan vokasi;</li>
                                <li>Pelaksanaan penyelarasan pendidikan vokasi sesuai dengan kebutuhan dunia usaha dan dunia industri;</li>
                                <li>Pelaksanaan fasilitasi dan peningkatan kompetensi pendidik dan tenaga kependidikan pada Pendidikan vokasi;</li>
                                <li>Pengelolaan data dan informasi;</li>
                                <li>Pelaksanaan kerja sama di bidang pengembangan penjaminan mutu pendidikan vokasi;</li>
                                <li>Pelaksanaan evaluasi pengembangan penjaminan mutu pendidikan vokasi; dan</li>
                                <li>Pelaksanaan urusan administrasi.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="uk-margin-medium-top">
                    <ul class="uk-flex-center" uk-tab="connect: .switcher-tugaspokokfungsi">
                        <li class="uk-active">
                            <a class="uk-h4" href="#">Tugas Pokok</a>
                        </li>
                        <li class="uk-active">
                            <a class="uk-h4" href="#">Fungsi</a>
                        </li>
                    </ul>
                </div>

                <ul class="uk-switcher switcher-tugaspokokfungsi uk-margin">
                    <li>
                        <div class="uk-text-justify uk-padding">
                            <p>Peraturan Menteri Pendidikan dan Kebudayaan No. 26 Tahun 2020 tentang Organisasi dan Tata Kerja BBPPMPV Seni dan Budaya menyatakan bahwa BBPPMPV Seni dan Budaya mempunyai tugas melaksanakan pengembangan penjaminan mutu pendidikan vokasi di bidang seni dan budaya.</p>
                        </div>
                    </li>
                    <li>
                        <div class="uk-text-justify uk-padding">
                            <ol>
                                <li>Penyusunan program pengembangan penjaminan mutu pendidikan vokasi;</li>
                                <li>Pelaksanaan penjaminan mutu peserta didik, sarana prasarana, dan tata kelola pendidikan vokasi;</li>
                                <li>Pelaksanaan penyelarasan pendidikan vokasi sesuai dengan kebutuhan dunia usaha dan dunia industri;</li>
                                <li>Pelaksanaan fasilitasi dan peningkatan kompetensi pendidik dan tenaga kependidikan pada Pendidikan vokasi;</li>
                                <li>Pengelolaan data dan informasi;</li>
                                <li>Pelaksanaan kerja sama di bidang pengembangan penjaminan mutu pendidikan vokasi;</li>
                                <li>Pelaksanaan evaluasi pengembangan penjaminan mutu pendidikan vokasi; dan</li>
                                <li>Pelaksanaan urusan administrasi.</li>
                            </ol>
                        </div>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </section>
    <!-- Tugas Pokok dan Fungsi Section End -->

    <!-- Stuktur Organisasi Section -->
    <section class="uk-section-default uk-margin-top">
        <div class="uk-background-norepeat uk-section uk-section-large" data-src="/img/bgteam.svg" uk-img>
            <div class="uk-container uk-container-large">

                <?php if ($ismobile == false) { ?>
                    <h3 class="uk-text-center">Struktur Organisasi</h3>
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
                <?php } else { ?>
                    <a class="uk-link-reset" id="team" uk-toggle="target: #toggleteam">
                        <h3 class="uk-text-center">Struktur Organisasi <span id="closeteam" uk-icon="chevron-down" hidden></span><span id="openteam" uk-icon="chevron-right"></span></h3>
                    </a>
                    <div class="uk-margin">
                        <img src="images/WhatsApp_Image_2022-02-17_at_09.59.28.jpeg" alt="Struktur Organisasi" width="1000" height="750" />
                    </div>


                    <div id="toggleteam" class="uk-text-justify" style="color: #000;" hidden>
                        <p class="uk-margin-small-bottom">Berikut ini uraian tugas pokok dan fungsi dari masing-masing unit berdasarkan Organisasi dan Tata Kerja di Lingkungan BBPPMPV Seni dan Budaya yang terdiri atas:</p>
                        <p class="uk-text-center">a. Kepala BBPPMPV Seni dan Budaya</p>
                        <p>Kepala Balai Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi Seni Dan Budaya mempunyai tugas merencanakan, mengkoordinasikan, mengarahkan, memonitor, mengevaluasi pelaksanaan kegiatan, dan mempertanggungjawabkan serta melaporkan kinerja institusi dalam melaksanakan pengembangan mutu pendidikan vokasi di bidang seni dan budaya</p>
                        <p>Dalam melaksanakan tugas dan fungsi, Kepala BBPPMPV Seni dan Budaya wajib menyampaikan laporan akuntabilitas kinerja institusi kepada Direktorat Jenderal Pendidikan Vokasi.</p>
                        <p class="uk-text-center">b. Bagian Tata Usaha</p>
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

                    <script type="text/javascript">
                        // Toggle Team
                        document.getElementById('team').addEventListener('click', function() {
                            if (document.getElementById('closeteam').hasAttribute('hidden')) {
                                document.getElementById('closeteam').removeAttribute('hidden');
                                document.getElementById('openteam').setAttribute('hidden', '');
                            } else {
                                document.getElementById('openteam').removeAttribute('hidden');
                                document.getElementById('closeteam').setAttribute('hidden', '');

                            }
                        });
                    </script>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Stuktur Organisasi Section End -->

    <!-- Visi Misi Section -->
    <section class="uk-section uk-section-default">
        <div class="uk-container uk-container-large">
            <?php if ($ismobile == false) { ?>
                <div class="uk-margin-remove-top uk-child-width-1-2 uk-text-justify" uk-grid>
                    <div>
                        <h3 class="uk-text-center">VISI</h3>
                        <hr class="uk-divider-small uk-text-center uk-margin">
                        
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
                        <hr class="uk-divider-small uk-text-center uk-margin">
                        
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
            <?php } else { ?>
                <div class="uk-margin-medium-top">
                    <ul class="uk-flex-center" uk-tab="connect: .switcher-visimisi">
                        <li class="uk-active">
                            <a class="uk-h4" href="#">VISI</a>
                        </li>
                        <li class="uk-active">
                            <a class="uk-h4" href="#">MISI</a>
                        </li>
                    </ul>
                </div>

                <ul class="uk-switcher switcher-visimisi uk-margin">
                    <li>
                        <div class="uk-text-justify uk-padding">
                            <p>Balai Besar Pengembangan dan Penjaminan Mutu Pendidikan Vokasi (BBPPMPV) Seni dan Budaya sebagai salah satu Unit Pelaksana Teknis (UPT) dari Direktorat Jenderal Pendidikan Vokasi Kementerian Pendidikan dan Kebudayaan, berdasarkan Permendikbud No. 26 Tahun 2020 mempunyai tugas melaksanakan pengembangan penjaminan mutu pendidikan vokasi sesuai dengan bidangnya.</p>
                            <p><strong>Visi Direktorat Jenderal Pendidikan Vokasi, yaitu:</strong></p>
                            <p><em>"Membangun rakyat Indonesia yang menjadi pembelajar seumur hidup yang unggul, terus berkembang, sejahtera, dan berakhlak mulia dengan menumbuhkan nilai-nilai budaya Indonesia dan Pancasila"</em></p>
                            <p>akan didukung oleh BBPMPV Seni dan Budaya, sehingga Visi BBPPMPV Seni dan Budaya :</p>
                            <p><em>"Mewujudkan Pendidikan Vokasi Bidang Seni dan Budaya yang berkualitas dan berdaya saing global sesuai dengan standar kebutuhan dunia usaha dan dunia Industri kekinian"</em></p>
                            <p>Berikut uraian Visi BBPPMPV Seni dan Budaya:</p>
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
                    </li>
                    <li>
                        <div class="uk-text-justify uk-padding">
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
                    </li>
                </ul>
            <?php } ?>
        </div>
    </section>
    <!-- Visi Misi Section End -->

    <!-- Kompetensi Keahlian Section -->
    <section class="uk-section uk-section-default">
        <div class="uk-container uk-container-large">
            <div class="uk-width-1-1">
                <h3 class="uk-text-center">Kompetensi Keahlian</h3>
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
                <?php if ($ismobile == false) { ?>
                    <div class="uk-grid-match tm-grid-expand uk-flex-middle" uk-grid>
                        <div class="uk-width-2-3 uk-flex-last">
                            <div class="uk-card uk-card-default uk-card-large uk-card-body uk-padding-remove">
                                <div class="tm-map-responsive">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3953.8296379621315!2d110.4259007!3d-7.701424!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5c0239d65a45%3A0xcc60a71076466259!2sBalai%20Besar%20Pengembangan%20Penjaminan%20Mutu%20Pendidikan%20Vokasi%20Seni%20dan%20Budaya!5e0!3m2!1sen!2sid!4v1710397120664!5m2!1sen!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-3">
                            <div class="uk-panel">
                                <h3 class="uk-width-xlarge uk-margin-auto uk-text-right">Peta Lokasi <span class="uk-text-bold">BBPPMPV <br><span class="uk-text-secondary">Seni dan Budaya</span></span></h3>
                                <div class="uk-text-emphasis uk-text-justify">
                                    <p>Balai Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi (BBPPMPV) Seni dan Budaya Direktorat Jenderal Pendidikan Vokasi Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Jl. Kaliurang KM 12,5 Klidon, Sukoharjo, Ngaglik, Sleman, DI Yogyakarta, Indonesia 55581</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div>
                        <h3 class="uk-text-center">Peta Lokasi <span class="uk-text-bold">BBPPMPV <br><span class="uk-text-secondary">Seni dan Budaya</span></span></h3>
                    </div>
                    <div class="uk-card uk-card-default uk-card-large uk-card-body uk-padding-remove uk-margin">
                        <div class="tm-map-responsive">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3953.8296379621315!2d110.4259007!3d-7.701424!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5c0239d65a45%3A0xcc60a71076466259!2sBalai%20Besar%20Pengembangan%20Penjaminan%20Mutu%20Pendidikan%20Vokasi%20Seni%20dan%20Budaya!5e0!3m2!1sen!2sid!4v1710397120664!5m2!1sen!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="uk-text-emphasis uk-text-justify">
                        <p>Balai Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi (BBPPMPV) Seni dan Budaya Direktorat Jenderal Pendidikan Vokasi Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Jl. Kaliurang KM 12,5 Klidon, Sukoharjo, Ngaglik, Sleman, DI Yogyakarta, Indonesia 55581</p>
                    </div>
                    <!-- <div class="">
                        <div class="uk-card uk-card-default uk-card-large uk-card-body uk-padding-remove">
                            <div class="tm-map-responsive">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3953.8296379621315!2d110.4259007!3d-7.701424!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5c0239d65a45%3A0xcc60a71076466259!2sBalai%20Besar%20Pengembangan%20Penjaminan%20Mutu%20Pendidikan%20Vokasi%20Seni%20dan%20Budaya!5e0!3m2!1sen!2sid!4v1710397120664!5m2!1sen!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-3">
                        <div class="uk-panel">
                            <div class="uk-text-emphasis uk-text-justify">
                                <p>Balai Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi (BBPPMPV) Seni dan Budaya Direktorat Jenderal Pendidikan Vokasi Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Jl. Kaliurang KM 12,5 Klidon, Sukoharjo, Ngaglik, Sleman, DI Yogyakarta, Indonesia 55581</p>
                            </div>
                        </div>
                    </div> -->
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Location Section End -->
<?php } else { ?>
    <section class="uk-section-default uk-section">
        <div class="uk-container uk-container-xlarge">
            <?php if (!empty($article)) { ?>
                <?= $article['content'] ?>
            <?php } ?>
        </div>
    </section>
<?php } ?>

<?= $this->endSection() ?>