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

<!-- Header Section -->
<section class="uk-section-default uk-margin-top">
    <div class="uk-container uk-container-xlarge">
        <div class="uk-text-center">
            <?php if ($ismobile === false) { ?>
                <h3>Standar Pelayanan Publik<br>Balai Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi Seni dan Budaya</h3>
            <?php } else { ?>
                <h3>Standar Pelayanan Publik BBPPMPVSB</h3>
            <?php } ?>
        </div>

        <!-- Divider -->
        <hr>
        <!-- Divider End -->

        <!-- Tab Section -->
        <ul class="uk-flex-middle uk-text-center uk-child-width-1-3" uk-tab="connect: .switcher-standarpelayanan" uk-grid>
            <?php if ($ismobile === false) { ?>
                <li class="uk-active">
                    <a class="uk-h4" href="#">Diklat Berbasis Kerjasama</a>
                </li>
                <li class="uk-active">
                    <a class="uk-h4" href="#">Penyewaan Fasilitas</a>
                </li>
                <li class="uk-active">
                    <a class="uk-h4" href="#">Layanan Data dan Informasi</a>
                </li>
            <?php } else { ?>
                <li class="uk-active">
                    <a href="#">Diklat Berbasis Kerjasama</a>
                </li>
                <li class="uk-active">
                    <a href="#">Penyewaan Fasilitas</a>
                </li>
                <li class="uk-active">
                    <a href="#">Layanan Data dan Informasi</a>
                </li>
            <?php } ?>
        </ul>
        <!-- Tab Section End -->

        <!-- Divider -->
        <hr class="uk-margin-remove-top">
        <!-- Divider End -->

        <!-- Switcher Section -->
        <ul class="uk-switcher switcher-standarpelayanan uk-margin">
            <!-- Diklat Berbasis Kerjasama Section -->
            <li>
                <div>
                    <div>
                        <h4 class="uk-text-center">A. Penyampaian Layanan <i>(Service Delivery)</i></h4>
                        
                        <div style="color: #000;">
                            <a class="uk-link-reset" id="1pp" uk-toggle="target: #diklat1pp">
                                <h5>1. Persyaratan pelayanan <span id="closediklat1pp" uk-icon="chevron-down" hidden></span><span id="opendiklat1pp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklat1pp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <p class="uk-h5 uk-margin-small">Persyaratan Administratif :</p>
                                        <li class="uk-h5 uk-margin-small">Surat permohonan kerja sama.</li>
                                        <li class="uk-h5 uk-margin-small">Proposal kerja sama sesuai yang dibutuhkan.</li>
                                    </ol>
                                </div>
                            </div>
                            
                            <a class="uk-link-reset" id="2smp" uk-toggle="target: #diklat2smp">
                                <h5>2. Sistem, mekanisme, dan prosedur <span id="closediklat2smp" uk-icon="chevron-down" hidden></span><span id="opendiklat2smp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklat2smp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <p class="uk-h5 uk-margin-small">Tata cara pengajuan permohonan diklat berbasis kerja sama :</p>
                                        <img src="img/diagrams/DIKLAT-BERBASIS-KERJA-SAMA.png" alt="DIKLAT-BERBASIS-KERJA-SAMA" width="500" />
                                        <li class="uk-h5 uk-margin-small">Pemohon mengajukan surat permohonan kepada Kepala BBPPMPV Seni dan Budaya;</li>
                                        <li class="uk-h5 uk-margin-small">Kepala BBPPMPV Seni dan Budaya mendisposisikan surat permohonan ke Kepala Bagian TU dan Tim kerja Sistem Informasi, Pengembangan, dan Kemitraan;</li>
                                        <li class="uk-h5 uk-margin-small">Tim Kerja Sistem Informasi Pengembangan dan Kemitraan memeriksa ketersediaan SDM, jadwal, dan fasilitas kediklatan;</li>
                                        <li class="uk-h5 uk-margin-small">BBPPMPV Seni dan Budaya mengirimkan surat balasan terkait pengajuan Diklat berbasis kerja sama;</li>
                                        <li class="uk-h5 uk-margin-small">Jika permohonan diterima, maka Pemohon menyelesaikan proses administrasi (proposal dan perjanjian kerjasama) terkait diklat berbasis kerja sama sesuai dengan syarat dan ketentuan yang berlaku;</li>
                                        <li class="uk-h5 uk-margin-small">Tim Fasilitasi Peningkatan Kompetensi melaksanakan diklat berbasis Kerjasama;</li>
                                        <li class="uk-h5 uk-margin-small">Tim Fasilitasi Peningkatan Kompetensi melaksanakan evaluasi dan sertifikasi diklat berbasis Kerjasama;</li>
                                        <li class="uk-h5 uk-margin-small">Tim Fasilitasi Peningkatan Kompetensi melaksanakan penyelesaian administrasi diklat berupa sertifikat dan laporan kegiatan diklat berbasis Kerjasama.</li>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="3jwp" uk-toggle="target: #diklat3jwp">
                                <h5>3. Jangka waktu penyelesaian <span id="closediklat3jwp" uk-icon="chevron-down" hidden></span><span id="opendiklat3jwp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklat3jwp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <p class="uk-h5 uk-margin-small">30 Hari Kerja</p>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="4b" uk-toggle="target: #diklat4b">
                                <h5>4. Biaya <span id="closediklat4b" uk-icon="chevron-down" hidden></span><span id="opendiklat4b" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklat4b" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <p class="uk-h5 uk-margin-small">Biaya /tarif Sesuai tarif PNBP fungsional berdasarkan Peraturan Pemerintah Nomor 22 tahun 2023 tentang Jenis dan Tarif atas jenis Penerimaan Negara Bukan Pajak yang berlaku pada Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi.</p>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="5pp" uk-toggle="target: #diklat5pp">
                                <h5>5. Produk pelayanan <span id="closediklat5pp" uk-icon="chevron-down" hidden></span><span id="opendiklat5pp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklat5pp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <p class="uk-h5 uk-margin-small">Layanan Diklat Berbasis Kerja Sama</p>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="6p" uk-toggle="target: #diklat6p">
                                <h5>6. Pengaduan <span id="closediklat6p" uk-icon="chevron-down" hidden></span><span id="opendiklat6p" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklat6p" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <p class="uk-h5 uk-margin-small">Pengaduan layanan dapat menyampaikan pengaduan saran dan masukan secara tertulis ditujukan kepada :</p>
                                        <li class="uk-h5 uk-margin-small">Unit Layanan Publik BBPPMPV Seni dan Budaya Jl. Kaliurang Km 12,5 Klidon, Ngaglik, Sleman, D.I. Yogyakarta 55581,<br>Telepon : (0274)895803,<br>Faksimile : (0274)895804,<br>SMS : 08112934704,<br>WA : 08112934704<br>surel : bbppmpvsb@kemdikbud.go.id</li>
                                        <li class="uk-h5 uk-margin-small">Kanal <a href="https://pengaduan.lapor.go.id/" target="_blank">SP4NLapor</a> atau melalui aplikasi SP4NLapor!</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4 class="uk-text-center">B. Pengelolaan Pelayanan <i>(Manufacturing)</i></h4>
                        
                        <div style="color: #000;">
                            <a class="uk-link-reset" id="1dh" uk-toggle="target: #diklat1dh">
                                <h5>1. Dasar hukum <span id="closediklat1dh" uk-icon="chevron-down" hidden></span><span id="opendiklat1dh" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklat1dh" style="color: #000;" hidden>
                                <div class="uk-margin-large-left uk-text-justify">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Undang-Undang Nomor 25 Tahun 2009 tentang Pelayanan Publik (Lembaran Negara Republik Indonesia Tahun 2009 Nomor 112);</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Pemerintah Nomor 96 Tahun 2012 tentang Pelaksanaan Undang-Undang Nomor 25 Tahun 2009 tentang Pelayanan Publik (Lembaran Negara Republik Indonesia Nomor 5357);</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Pemerintah Nomor 22 tahun 2023 tentang Jenis dan Tarif atas jenis Penerimaan Negara Bukan Pajak yang berlaku pada Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi (Lembaran Negara Republik Indonesia Tahun 2023 Nomor 48);</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 15 Tahun 2014 tentang Pedoman Standar Pelayanan (Berita Negara Republik Indonesia Tahun 2014 Nomor 615);</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Menteri Pendayagunaan Aparatur Negara Dan Reformasi Birokrasi Nomor 16 Tahun 2017 Tentang Pedoman Penyelenggaraan Forum Konsultasi Publik Di Lingkungan Unit Penyelenggara Pelayanan Publik (Berita Negara Republik Indonesia Tahun 2017 Nomor 765);</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Menteri Pendayagunaan Aparatur Negara Dan Reformasi Birokrasi Nomor 29 Tahun 2022 Tentang Pemantauan dan evaluasi kinerja penyelenggaraan pelayanan publik (Berita Negara Republik Indonesia Tahun 2022 Nomor 672); dan</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Menteri Pendidikan Kebudayaan Riset dan Teknologi Nomor 26 tahun 2020 tentang Organisasi dan Tata Kerja Unit Pelaksana Teknis pada Kementerian Pendidikan Kebudayaan, Riset dan Teknologi (Berita Negara Republik Indonesia Tahun 2020 Nomor 682);</li>
                                    </ol>
                                </div>
                            </div>
                            
                            <a class="uk-link-reset" id="2spf" uk-toggle="target: #diklat2spf">
                                <h5>2. Sarana, prasarana/fasilitas <span id="closediklat2spf" uk-icon="chevron-down" hidden></span><span id="opendiklat2spf" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklat2spf" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Bangunan dan Gedung</li>
                                        <ol type="a">
                                            <li>Asrama</li>
                                            <li>Wisma/Mess/Bungalow</li>
                                            <li>Bangunan Gedung Pertemuan Permanen (Auditorium)</li>
                                            <li>Bangunan Gedung Pendidikan Permanen</li>
                                            <li>Perpustakaan</li>
                                        </ol>
                                        <li class="uk-h5 uk-margin-small">Parkir dan Ruang Tunggu</li>
                                        <ol type="a">
                                            <li>Sarana Front Office</li>
                                            <ul>
                                                <li>Petugas Khusus</li>
                                                <li>Televisi</li>
                                                <li>Bahan Bacaan</li>
                                                <li>AC/pendingin ruangan</li>
                                                <li>Air Minum</li>
                                                <li>Hotspot/wifi</li>
                                                <li>Ruang ibadah/mushola</li>
                                            </ul>
                                            <li>Sarana Parkir</li>
                                            <ul>
                                                <li>Penjaga Keamanan 24 jam</li>
                                                <li>CCTV Keamanan</li>
                                            </ul>
                                        </ol>
                                        <li class="uk-h5 uk-margin-small">Sarana dan prasarana berkebutuhan khusus</li>
                                        <ol type="a">
                                            <li>Toilet Khusus kelompok rentan</li>
                                            <li>Ruang Tunggu Khusus</li>
                                            <li>Parkir Khusus Disabilitas</li>
                                            <li>Kursi roda/tongkat/kruk</li>
                                            <li>Pintu masuk yang mudah diakses</li>
                                            <li>Step lobby/ramp/jalan landai</li>
                                            <li>Arena bermain anak</li>
                                            <li>Ruang laktasi</li>
                                        </ol>
                                        <li class="uk-h5 uk-margin-small">Sarana Penunjang Lain</li>
                                        <ol type="a">
                                            <li>Kantin</li>
                                            <li>Mesin foto kopi</li>
                                            <li>Koperasi</li>
                                            <li>Hotspot/wifi gratis</li>
                                        </ol>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="3kp" uk-toggle="target: #diklat3kp">
                                <h5>3. Kompetensi pelaksanaan <span id="closediklat3kp" uk-icon="chevron-down" hidden></span><span id="opendiklat3kp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklat3kp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Memiliki SDM yang kompeten dalam pendidikan dan pelatihan sesuai bidangnya.</li>
                                        <li class="uk-h5 uk-margin-small">Memiliki SDM yang kompeten dalam mengelola fasilitas.</li>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="4pi" uk-toggle="target: #diklat4pi">
                                <h5>4. Pengawasan internal <span id="closediklat4pi" uk-icon="chevron-down" hidden></span><span id="opendiklat4pi" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklat4pi" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <p class="uk-h5 uk-margin-small">Pengawasan dilakukan oleh atasan langsung dan Tim SPI.</p>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="5jp" uk-toggle="target: #diklat5jp">
                                <h5>5. Jumlah pelaksana <span id="closediklat5jp" uk-icon="chevron-down" hidden></span><span id="opendiklat5jp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklat5jp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Penanggungjawab kegiatan 4 orang</li>
                                        <li class="uk-h5 uk-margin-small">Pengajar/Fasilitator 57 orang</li>
                                        <li class="uk-h5 uk-margin-small">Koordinator Kegiatan 14 orang</li>
                                        <li class="uk-h5 uk-margin-small">Administrasi 111 0rang</li>
                                        <li class="uk-h5 uk-margin-small">Teknisi 20 orang</li>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="6jp" uk-toggle="target: #diklat6jp">
                                <h5>6. Jaminan pelayanan <span id="closediklat6jp" uk-icon="chevron-down" hidden></span><span id="opendiklat6jp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklat6jp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Fasilitas bersih, aman, dan nyaman.</li>
                                        <li class="uk-h5 uk-margin-small">Waktu pelaksanaan kegiatan sesuai dengan waktu yang ditetapkan.</li>
                                        <li class="uk-h5 uk-margin-small">Penggunaan fasilitas penunjang menyesuaikan dengan standar ruangan.</li>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="7jkkp" uk-toggle="target: #diklat7jkkp">
                                <h5>7. Jaminan keamanan dan keselamatan pelayanan <span id="closediklat7jkkp" uk-icon="chevron-down" hidden></span><span id="opendiklat7jkkp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklat7jkkp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Semua resiko penggunaan fasilitas telah diidentifikasikan dalam manajemen.</li>
                                        <li class="uk-h5 uk-margin-small">Tersedia pos jaga keamanan dengan petugas keamanan yang berjaga secara terjadwal selama 24 jam.</li>
                                        <li class="uk-h5 uk-margin-small">CCTV di area publik.</li>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="8ekp" uk-toggle="target: #diklat8ekp">
                                <h5>8. Evaluasi kinerja pelaksana <span id="closediklat8ekp" uk-icon="chevron-down" hidden></span><span id="opendiklat8ekp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklat8ekp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <p>Evaluasi penerapan standar pelayanan ini dilakukan 1 (satu) kali dalam satu tahun. Selanjutnya dilakukan tindakan perbaikan untuk menjaga dan meningkatkan kinerja pelayanan</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        // Toggle Diklat Persyaratan Pelayanan
                        document.getElementById('1pp').addEventListener('click', function() {
                            if (document.getElementById('closediklat1pp').hasAttribute('hidden')) {
                                document.getElementById('closediklat1pp').removeAttribute('hidden');
                                document.getElementById('opendiklat1pp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklat1pp').removeAttribute('hidden');
                                document.getElementById('closediklat1pp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Sistem, mekanisme, dan prosedur
                        document.getElementById('2smp').addEventListener('click', function() {
                            if (document.getElementById('closediklat2smp').hasAttribute('hidden')) {
                                document.getElementById('closediklat2smp').removeAttribute('hidden');
                                document.getElementById('opendiklat2smp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklat2smp').removeAttribute('hidden');
                                document.getElementById('closediklat2smp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Jangka waktu penyelesaian
                        document.getElementById('3jwp').addEventListener('click', function() {
                            if (document.getElementById('closediklat3jwp').hasAttribute('hidden')) {
                                document.getElementById('closediklat3jwp').removeAttribute('hidden');
                                document.getElementById('opendiklat3jwp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklat3jwp').removeAttribute('hidden');
                                document.getElementById('closediklat3jwp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Biaya
                        document.getElementById('4b').addEventListener('click', function() {
                            if (document.getElementById('closediklat4b').hasAttribute('hidden')) {
                                document.getElementById('closediklat4b').removeAttribute('hidden');
                                document.getElementById('opendiklat4b').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklat4b').removeAttribute('hidden');
                                document.getElementById('closediklat4b').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Produk pelayanan
                        document.getElementById('5pp').addEventListener('click', function() {
                            if (document.getElementById('closediklat5pp').hasAttribute('hidden')) {
                                document.getElementById('closediklat5pp').removeAttribute('hidden');
                                document.getElementById('opendiklat5pp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklat5pp').removeAttribute('hidden');
                                document.getElementById('closediklat5pp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Pengaduan
                        document.getElementById('6p').addEventListener('click', function() {
                            if (document.getElementById('closediklat6p').hasAttribute('hidden')) {
                                document.getElementById('closediklat6p').removeAttribute('hidden');
                                document.getElementById('opendiklat6p').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklat6p').removeAttribute('hidden');
                                document.getElementById('closediklat6p').setAttribute('hidden', '');

                            }
                        });
                    </script>
                </div>
            </li>
            <!-- Diklat Berbasis Kerjasama Section End -->
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
        <!-- Switcher Section End -->
    </div>
</section>
<!-- Header Section End -->

<?= $this->endSection() ?>