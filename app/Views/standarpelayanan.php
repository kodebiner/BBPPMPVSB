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
        <div class="uk-text-center uk-margin">
            <?php if ($ismobile === false) { ?>
                <h3>Standar Pelayanan Publik<br>Balai Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi Seni dan Budaya</h3>
            <?php } else { ?>
                <h3>Standar Pelayanan Publik BBPPMPVSB</h3>
            <?php } ?>
        </div>

        <!-- Tab Section -->
        <ul class="uk-flex-middle uk-text-center uk-child-width-1-3 uk-margin" uk-tab="connect: .switcher-standarpelayanan" uk-grid>
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
        <hr class="uk-margin">
        <!-- Divider End -->

        <!-- Switcher Section -->
        <ul class="uk-switcher switcher-standarpelayanan uk-margin-medium">
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

                    <div class="uk-margin-medium">
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

                        // Toggle Diklat Dasar Hukum
                        document.getElementById('1dh').addEventListener('click', function() {
                            if (document.getElementById('closediklat1dh').hasAttribute('hidden')) {
                                document.getElementById('closediklat1dh').removeAttribute('hidden');
                                document.getElementById('opendiklat1dh').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklat1dh').removeAttribute('hidden');
                                document.getElementById('closediklat1dh').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Sarpras
                        document.getElementById('2spf').addEventListener('click', function() {
                            if (document.getElementById('closediklat2spf').hasAttribute('hidden')) {
                                document.getElementById('closediklat2spf').removeAttribute('hidden');
                                document.getElementById('opendiklat2spf').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklat2spf').removeAttribute('hidden');
                                document.getElementById('closediklat2spf').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Kompetensi Pelaksanaan
                        document.getElementById('3kp').addEventListener('click', function() {
                            if (document.getElementById('closediklat3kp').hasAttribute('hidden')) {
                                document.getElementById('closediklat3kp').removeAttribute('hidden');
                                document.getElementById('opendiklat3kp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklat3kp').removeAttribute('hidden');
                                document.getElementById('closediklat3kp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Pengawasan Internal
                        document.getElementById('4pi').addEventListener('click', function() {
                            if (document.getElementById('closediklat4pi').hasAttribute('hidden')) {
                                document.getElementById('closediklat4pi').removeAttribute('hidden');
                                document.getElementById('opendiklat4pi').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklat4pi').removeAttribute('hidden');
                                document.getElementById('closediklat4pi').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Jumlah Pelaksana
                        document.getElementById('5jp').addEventListener('click', function() {
                            if (document.getElementById('closediklat5jp').hasAttribute('hidden')) {
                                document.getElementById('closediklat5jp').removeAttribute('hidden');
                                document.getElementById('opendiklat5jp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklat5jp').removeAttribute('hidden');
                                document.getElementById('closediklat5jp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Jaminan Pelayanan
                        document.getElementById('6jp').addEventListener('click', function() {
                            if (document.getElementById('closediklat6jp').hasAttribute('hidden')) {
                                document.getElementById('closediklat6jp').removeAttribute('hidden');
                                document.getElementById('opendiklat6jp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklat6jp').removeAttribute('hidden');
                                document.getElementById('closediklat6jp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Jaminan Keamanan
                        document.getElementById('7jkkp').addEventListener('click', function() {
                            if (document.getElementById('closediklat7jkkp').hasAttribute('hidden')) {
                                document.getElementById('closediklat7jkkp').removeAttribute('hidden');
                                document.getElementById('opendiklat7jkkp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklat7jkkp').removeAttribute('hidden');
                                document.getElementById('closediklat7jkkp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Evaluasi Kinerja Pelaksana
                        document.getElementById('8ekp').addEventListener('click', function() {
                            if (document.getElementById('closediklat8ekp').hasAttribute('hidden')) {
                                document.getElementById('closediklat8ekp').removeAttribute('hidden');
                                document.getElementById('opendiklat8ekp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklat8ekp').removeAttribute('hidden');
                                document.getElementById('closediklat8ekp').setAttribute('hidden', '');

                            }
                        });
                    </script>
                </div>
            </li>
            <!-- Diklat Berbasis Kerjasama Section End -->
            <!-- Penyewaan Fasilitas Section -->
            <li>
                <div>
                    <div>
                        <h4 class="uk-text-center">A. Penyampaian Layanan <i>(Service Delivery)</i></h4>
                        
                        <div style="color: #000;">
                            <a class="uk-link-reset" id="pf1pp" uk-toggle="target: #diklatpf1pp">
                                <h5>1. Persyaratan pelayanan <span id="closediklatpf1pp" uk-icon="chevron-down" hidden></span><span id="opendiklatpf1pp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatpf1pp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <p class="uk-h5 uk-margin-small">Persyaratan teknis pengguna :</p>
                                        <li class="uk-h5 uk-margin-small">Permohonan penyewaan fasilitas.</li>
                                        <li class="uk-h5 uk-margin-small">Melampirkan fotokopi Kartu Identitas.</li>
                                        <li class="uk-h5 uk-margin-small">Menaati syarat dan ketentuan dalam perjanjian sewa fasilitas</li>
                                    </ol>
                                </div>
                            </div>
                            
                            <a class="uk-link-reset" id="pf2smp" uk-toggle="target: #diklatpf2smp">
                                <h5>2. Sistem, mekanisme, dan prosedur <span id="closediklatpf2smp" uk-icon="chevron-down" hidden></span><span id="opendiklatpf2smp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatpf2smp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <p class="uk-h5 uk-margin-small">Tata cara pengajuan permohonan peminjaman fasilitas sebagai berikut :</p>
                                        <img src="img/diagrams/penyewaan-fasilitas.png" alt="penyewaan fasilitas" width="500" />
                                        <li class="uk-h5 uk-margin-small">Pemohon mengajukan surat permohonan kepada Kepala BBPPMPV Seni dan Budaya;</li>
                                        <li class="uk-h5 uk-margin-small">Kepala BBPPMPV Seni dan Budaya mendisposisikan surat ke Kepala Bagian TU;</li>
                                        <li class="uk-h5 uk-margin-small">Kepala Bagian TU mendisposisikan ke penanggungjawab kerumahtanggaan Balai;</li>
                                        <li class="uk-h5 uk-margin-small">Penanggungjawab kerumahtanggaan memastikaan ketersediaan fasilitas dan jadwal peminjaman fasilitas;</li>
                                        <li class="uk-h5 uk-margin-small">BBPPMPV Seni dan Budaya mengirimkan surat balasan terkait permohonan penyewaan fasilitas; dan</li>
                                        <li class="uk-h5 uk-margin-small">Jika permohonan diterima, maka Pemohon menyelesaikan proses administrasi penyewaan fasilitas sesuai dengan syarat dan ketentuan yang berlaku.</li>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="pf3jwp" uk-toggle="target: #diklatpf3jwp">
                                <h5>3. Jangka waktu penyelesaian <span id="closediklatpf3jwp" uk-icon="chevron-down" hidden></span><span id="opendiklatpf3jwp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatpf3jwp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <p class="uk-h5 uk-margin-small">10 Hari Kerja.</p>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="pf4b" uk-toggle="target: #diklatpf4b">
                                <h5>4. Biaya <span id="closediklatpf4b" uk-icon="chevron-down" hidden></span><span id="opendiklatpf4b" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatpf4b" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ul>
                                        <li class="uk-h5 uk-margin-small">Surat persetujuan KPKNL Nomor S-5/MK.6/KNL.0905/2024 tanggal 16 Januari 2024</li>
                                        <li class="uk-h5 uk-margin-small">Surat Keputusan Kepala BBPPMPV Seni dan Budaya Nomor 0115/D7.1/LK.01.02/2024</li>
                                    </ul>
                                    <p>DAFTAR TARIF SEWA FASILITAS BBPPMPV SENI DAN BUDAYA</p>
                                    <div class="uk-overflow-auto uk-margin">
                                        <table class="uk-table uk-table-large uk-table-justify uk-table-divider">
                                            <thead>
                                                <tr>
                                                    <td>Nama Gedung / Ruangan</td>
                                                    <td>Biaya</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Gedung Pertemuan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-left">Auditorium (kapasitas 300 orang)</div>
                                                    </td>
                                                    <td>Rp. 4.049.000/Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-left">Auditorium dan Lightning</div>
                                                    </td>
                                                    <td>Rp. 5.167.000/Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>Asrama/Mess/Wisma</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-left">Asrama A dan B (kapasitas 88 bed/asrama)</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-medium-left">Kamar 2 Bed</div>
                                                    </td>
                                                    <td>Rp. 153.000/Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-medium-left">Kamar 3 Bed</div>
                                                    </td>
                                                    <td>Rp. 166.000/Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-left">Asrama C (kapasitas 72 bed/asrama)</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-medium-left">Kamar 2 Bed</div>
                                                    </td>
                                                    <td>Rp. 187.000/Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-medium-left">Kamar 3 Bed</div>
                                                    </td>
                                                    <td>Rp. 200.000/Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-left">Mess/Wisma/Bungalow/Asrama D (kapasitas 56 bed)</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-medium-left">Kamar 2 Bed</div>
                                                    </td>
                                                    <td>Rp. 130.000/Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-left">Mess/Wisma/Bungalow (kapasitas 9 bed)</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-medium-left">Kamar Tengah</div>
                                                    </td>
                                                    <td>Rp. 275.000/Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-medium-left">Kamar Sayap</div>
                                                    </td>
                                                    <td>Rp. 275.000/Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>Ruang Sidang / Ruang Kelas</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-left">Ruang Nakula (40 orang) </div>
                                                    </td>
                                                    <td>Rp. 276.000/Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-left">Ruang Sadewa (40 orang)</div>
                                                    </td>
                                                    <td>Rp. 276.000/Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-left">Ruang Arjuna (40 orang)</div>
                                                    </td>
                                                    <td>Rp. 207.000/Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-left">Ruang Gatotkaca (80 orang)</div>
                                                    </td>
                                                    <td>Rp. 342.000/Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-left">Ruang Fungsional Bawah (80 orang)</div>
                                                    </td>
                                                    <td>Rp. 674.000/Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-left">Ruang Fungsional atas Sayap Kanan (40 orang)</div>
                                                    </td>
                                                    <td>Rp. 342.000/Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-left">Ruang Fungsional atas Sayap Kiri (40 orang)</div>
                                                    </td>
                                                    <td>Rp. 342.000/Hari</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="uk-margin-left">Ruang Makan (250 orang) </div>
                                                    </td>
                                                    <td>Rp. 2.371.000/Hari</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="pf5pp" uk-toggle="target: #diklatpf5pp">
                                <h5>5. Produk pelayanan <span id="closediklatpf5pp" uk-icon="chevron-down" hidden></span><span id="opendiklatpf5pp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatpf5pp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <p class="uk-h5 uk-margin-small">Layanan penggunaan fasilitas beserta pendukung dan perlengkapan sesuai perjanjian.</p>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="pf6p" uk-toggle="target: #diklatpf6p">
                                <h5>6. Pengaduan <span id="closediklatpf6p" uk-icon="chevron-down" hidden></span><span id="opendiklatpf6p" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatpf6p" style="color: #000;" hidden>
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

                    <div class="uk-margin-medium">
                        <h4 class="uk-text-center">B. Pengelolaan Pelayanan <i>(Manufacturing)</i></h4>
                        
                        <div style="color: #000;">
                            <a class="uk-link-reset" id="pf1dh" uk-toggle="target: #diklatpf1dh">
                                <h5>1. Dasar hukum <span id="closediklatpf1dh" uk-icon="chevron-down" hidden></span><span id="opendiklatpf1dh" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatpf1dh" style="color: #000;" hidden>
                                <div class="uk-margin-large-left uk-text-justify">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Undang-Undang Nomor 25 Tahun 2009 tentang Pelayanan Publik (Lembaran Negara Republik Indonesia Tahun 2009 Nomor 112);</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Pemerintah Nomor 96 Tahun 2012 tentang Pelaksanaan Undang-Undang Nomor 25 Tahun 2009 tentang Pelayanan Publik (Lembaran Negara Republik Indonesia Nomor 5357);</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Pemerintah Nomor 22 tahun 2023 tentang Jenis dan Tarif atas jenis Penerimaan Negara Bukan Pajak yang berlaku pada Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi (Lembaran Negara Republik Indonesia Tahun 2023 Nomor 48);</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 15 Tahun 2014 tentang Pedoman Standar Pelayanan (Berita Negara Republik Indonesia Tahun 2014 Nomor 615);</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Menteri Pendayagunaan Aparatur Negara Dan Reformasi Birokrasi Nomor 16 Tahun 2017 Tentang Pedoman Penyelenggaraan Forum Konsultasi Publik Di Lingkungan Unit Penyelenggara Pelayanan Publik (Berita Negara Republik Indonesia Tahun 2017 Nomor 765);</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Menteri Pendayagunaan Aparatur Negara Dan Reformasi Birokrasi Nomor 29 Tahun 2022 Tentang Pemantauan dan evaluasi kinerja penyelenggaraan pelayanan publik (Berita Negara Republik Indonesia Tahun 2022 Nomor 672); dan</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Menteri Pendidikan Kebudayaan Riset dan Teknologi Nomor 26 tahun 2020 tentang Organisasi dan Tata Kerja Unit Pelaksana Teknis pada Kementerian Pendidikan Kebudayaan, Riset dan Teknologi (Berita Negara Republik Indonesia Tahun 2020 Nomor 682);</li>
                                        <li class="uk-h5 uk-margin-small">Surat Menteri Keuangan No. S-124/MK.6/KNL.09.05/2022 tgl 28 Desember 2022 Perihal Persetujuan Sewa Tanah Kemendikbudristek c.q. BBPPMPV Seni dan Budaya;</li>
                                        <li class="uk-h5 uk-margin-small">Surat Menteri Keuangan No. S-5/MK.6/KNL.0905/2024 tanggal 12 Januari 2024 perihal Persetujuan Sewa atas sebagian Tanah dan atau Bangunan pada Satker BBPPMPV Seni dan Budaya; dan</li>
                                        <li class="uk-h5 uk-margin-small">Surat Keputusan Kepala BBPPMPV Seni dan Budaya No, 0115/D7.1/LK.01.02/2024 tentang Penetapan Tarif Penerimaan Negara Bukan Pajak (PNBP) di lingkungan BBPPMPV Seni dan Budaya.</li>
                                    </ol>
                                </div>
                            </div>
                            
                            <a class="uk-link-reset" id="pf2spf" uk-toggle="target: #diklatpf2spf">
                                <h5>2. Sarana, prasarana/fasilitas <span id="closediklatpf2spf" uk-icon="chevron-down" hidden></span><span id="opendiklatpf2spf" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatpf2spf" style="color: #000;" hidden>
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

                            <a class="uk-link-reset" id="pf3kp" uk-toggle="target: #diklatpf3kp">
                                <h5>3. Kompetensi pelaksanaan <span id="closediklatpf3kp" uk-icon="chevron-down" hidden></span><span id="opendiklatpf3kp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatpf3kp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Mengetahui tugas dan fungsi tentang struktur organisasi kemendikbudristek</li>
                                        <li class="uk-h5 uk-margin-small">Memahami informasi bidang organisasi dan tata laksana</li>
                                        <li class="uk-h5 uk-margin-small">Memahami prosedur terkait pemberian pelayanan publik</li>
                                        <li class="uk-h5 uk-margin-small">Komunikatif serta mampu memberikan solusi</li>
                                        <li class="uk-h5 uk-margin-small">Memiliki kemampuan dalam pengelolaan fasilitas</li>
                                        <li class="uk-h5 uk-margin-small">Melayani dengan senyum, sapa, salam, sopan dan santun (SS).</li>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="pf4pi" uk-toggle="target: #diklatpf4pi">
                                <h5>4. Pengawasan internal <span id="closediklatpf4pi" uk-icon="chevron-down" hidden></span><span id="opendiklatpf4pi" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatpf4pi" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Pengawasan langsung oleh Kepala BBPPMPV Seni dan Budaya</li>
                                        <li class="uk-h5 uk-margin-small">Pengawasan langsung oleh Kepala Bagian Tata Usaha BBPPMPV Seni dan Budaya</li>
                                        <li class="uk-h5 uk-margin-small">Pengawasan langsung oleh Tim SPI BBPPMPV Seni dan Budaya</li>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="pf5jp" uk-toggle="target: #diklatpf5jp">
                                <h5>5. Jumlah pelaksana <span id="closediklatpf5jp" uk-icon="chevron-down" hidden></span><span id="opendiklatpf5jp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatpf5jp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Penanggungjawab Rumah Tangga 1 Orang</li>
                                        <li class="uk-h5 uk-margin-small">Teknisi 8 orang</li>
                                        <li class="uk-h5 uk-margin-small">Petugas Asrama 6 orang</li>
                                        <li class="uk-h5 uk-margin-small">Petugas Kebersihan 44 orang</li>
                                        <li class="uk-h5 uk-margin-small">Satuan Pengamanan 23 orang</li>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="pf6jp" uk-toggle="target: #diklatpf6jp">
                                <h5>6. Jaminan pelayanan <span id="closediklatpf6jp" uk-icon="chevron-down" hidden></span><span id="opendiklatpf6jp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatpf6jp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Fasilitas bersih, aman, dan nyaman.</li>
                                        <li class="uk-h5 uk-margin-small">Waktu pelaksanaan kegiatan sesuai dengan waktu yang ditetapkan.</li>
                                        <li class="uk-h5 uk-margin-small">Penggunaan fasilitas penunjang menyesuaikan dengan standar ruangan.</li>
                                        <li class="uk-h5 uk-margin-small">Pelayanan dilaksanakan sesuai dengan standar yang telah ditetapkan.</li>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="pf7jkkp" uk-toggle="target: #diklatpf7jkkp">
                                <h5>7. Jaminan keamanan dan keselamatan pelayanan <span id="closediklatpf7jkkp" uk-icon="chevron-down" hidden></span><span id="opendiklatpf7jkkp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatpf7jkkp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Semua resiko penggunaan fasilitas telah diidentifikasikan dalam manajemen.</li>
                                        <li class="uk-h5 uk-margin-small">Tersedia pos jaga keamanan dengan petugas keamanan yang berjaga secara terjadwal selama 24 jam.</li>
                                        <li class="uk-h5 uk-margin-small">CCTV di area publik.</li>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="pf8ekp" uk-toggle="target: #diklatpf8ekp">
                                <h5>8. Evaluasi kinerja pelaksana <span id="closediklatpf8ekp" uk-icon="chevron-down" hidden></span><span id="opendiklatpf8ekp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatpf8ekp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <p>Evaluasi penerapan standar pelayanan ini dilakukan 1 (satu) kali dalam satu tahun. Selanjutnya dilakukan tindakan perbaikan untuk menjaga dan meningkatkan kinerja pelayanan.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        // Toggle Diklat Persyaratan Pelayanan
                        document.getElementById('pf1pp').addEventListener('click', function() {
                            if (document.getElementById('closediklatpf1pp').hasAttribute('hidden')) {
                                document.getElementById('closediklatpf1pp').removeAttribute('hidden');
                                document.getElementById('opendiklatpf1pp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatpf1pp').removeAttribute('hidden');
                                document.getElementById('closediklatpf1pp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Sistem, mekanisme, dan prosedur
                        document.getElementById('pf2smp').addEventListener('click', function() {
                            if (document.getElementById('closediklatpf2smp').hasAttribute('hidden')) {
                                document.getElementById('closediklatpf2smp').removeAttribute('hidden');
                                document.getElementById('opendiklatpf2smp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatpf2smp').removeAttribute('hidden');
                                document.getElementById('closediklatpf2smp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Jangka waktu penyelesaian
                        document.getElementById('pf3jwp').addEventListener('click', function() {
                            if (document.getElementById('closediklatpf3jwp').hasAttribute('hidden')) {
                                document.getElementById('closediklatpf3jwp').removeAttribute('hidden');
                                document.getElementById('opendiklatpf3jwp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatpf3jwp').removeAttribute('hidden');
                                document.getElementById('closediklatpf3jwp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Biaya
                        document.getElementById('pf4b').addEventListener('click', function() {
                            if (document.getElementById('closediklatpf4b').hasAttribute('hidden')) {
                                document.getElementById('closediklatpf4b').removeAttribute('hidden');
                                document.getElementById('opendiklatpf4b').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatpf4b').removeAttribute('hidden');
                                document.getElementById('closediklatpf4b').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Produk pelayanan
                        document.getElementById('pf5pp').addEventListener('click', function() {
                            if (document.getElementById('closediklatpf5pp').hasAttribute('hidden')) {
                                document.getElementById('closediklatpf5pp').removeAttribute('hidden');
                                document.getElementById('opendiklatpf5pp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatpf5pp').removeAttribute('hidden');
                                document.getElementById('closediklatpf5pp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Pengaduan
                        document.getElementById('pf6p').addEventListener('click', function() {
                            if (document.getElementById('closediklatpf6p').hasAttribute('hidden')) {
                                document.getElementById('closediklatpf6p').removeAttribute('hidden');
                                document.getElementById('opendiklatpf6p').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatpf6p').removeAttribute('hidden');
                                document.getElementById('closediklatpf6p').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Dasar Hukum
                        document.getElementById('pf1dh').addEventListener('click', function() {
                            if (document.getElementById('closediklatpf1dh').hasAttribute('hidden')) {
                                document.getElementById('closediklatpf1dh').removeAttribute('hidden');
                                document.getElementById('opendiklatpf1dh').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatpf1dh').removeAttribute('hidden');
                                document.getElementById('closediklatpf1dh').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Sarpras
                        document.getElementById('pf2spf').addEventListener('click', function() {
                            if (document.getElementById('closediklatpf2spf').hasAttribute('hidden')) {
                                document.getElementById('closediklatpf2spf').removeAttribute('hidden');
                                document.getElementById('opendiklatpf2spf').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatpf2spf').removeAttribute('hidden');
                                document.getElementById('closediklatpf2spf').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Kompetensi Pelaksanaan
                        document.getElementById('pf3kp').addEventListener('click', function() {
                            if (document.getElementById('closediklatpf3kp').hasAttribute('hidden')) {
                                document.getElementById('closediklatpf3kp').removeAttribute('hidden');
                                document.getElementById('opendiklatpf3kp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatpf3kp').removeAttribute('hidden');
                                document.getElementById('closediklatpf3kp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Pengawasan Internal
                        document.getElementById('pf4pi').addEventListener('click', function() {
                            if (document.getElementById('closediklatpf4pi').hasAttribute('hidden')) {
                                document.getElementById('closediklatpf4pi').removeAttribute('hidden');
                                document.getElementById('opendiklatpf4pi').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatpf4pi').removeAttribute('hidden');
                                document.getElementById('closediklatpf4pi').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Jumlah Pelaksana
                        document.getElementById('pf5jp').addEventListener('click', function() {
                            if (document.getElementById('closediklatpf5jp').hasAttribute('hidden')) {
                                document.getElementById('closediklatpf5jp').removeAttribute('hidden');
                                document.getElementById('opendiklatpf5jp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatpf5jp').removeAttribute('hidden');
                                document.getElementById('closediklatpf5jp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Jaminan Pelayanan
                        document.getElementById('pf6jp').addEventListener('click', function() {
                            if (document.getElementById('closediklatpf6jp').hasAttribute('hidden')) {
                                document.getElementById('closediklatpf6jp').removeAttribute('hidden');
                                document.getElementById('opendiklatpf6jp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatpf6jp').removeAttribute('hidden');
                                document.getElementById('closediklatpf6jp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Jaminan Keamanan
                        document.getElementById('pf7jkkp').addEventListener('click', function() {
                            if (document.getElementById('closediklatpf7jkkp').hasAttribute('hidden')) {
                                document.getElementById('closediklatpf7jkkp').removeAttribute('hidden');
                                document.getElementById('opendiklatpf7jkkp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatpf7jkkp').removeAttribute('hidden');
                                document.getElementById('closediklatpf7jkkp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Evaluasi Kinerja Pelaksana
                        document.getElementById('pf8ekp').addEventListener('click', function() {
                            if (document.getElementById('closediklatpf8ekp').hasAttribute('hidden')) {
                                document.getElementById('closediklatpf8ekp').removeAttribute('hidden');
                                document.getElementById('opendiklatpf8ekp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatpf8ekp').removeAttribute('hidden');
                                document.getElementById('closediklatpf8ekp').setAttribute('hidden', '');

                            }
                        });
                    </script>
                </div>
            </li>
            <!-- Penyewaan Fasilitas Section End -->
            <!-- Layanan Data dan Informasi Section -->
            <li>
                <div>
                    <div>
                        <h4 class="uk-text-center">A. Penyampaian Layanan <i>(Service Delivery)</i></h4>
                        
                        <div style="color: #000;">
                            <a class="uk-link-reset" id="ldi1pp" uk-toggle="target: #diklatldi1pp">
                                <h5>1. Persyaratan pelayanan <span id="closediklatldi1pp" uk-icon="chevron-down" hidden></span><span id="opendiklatldi1pp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatldi1pp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <p class="uk-h5 uk-margin-small">Layanan data dan informasi di ULP BBPPMPV Seni dan Budaya :</p>
                                        <li class="uk-h5 uk-margin-small">Menunjukkan Kartu Identitas.</li>
                                        <li class="uk-h5 uk-margin-small">Melampirkan surat tugas/surat permohonan (bagi yang mewakili lembaga/badan/organisasi).</li>
                                    </ol>
                                </div>
                            </div>
                            
                            <a class="uk-link-reset" id="ldi2smp" uk-toggle="target: #diklatldi2smp">
                                <h5>2. Sistem, mekanisme, dan prosedur <span id="closediklatldi2smp" uk-icon="chevron-down" hidden></span><span id="opendiklatldi2smp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatldi2smp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <p class="uk-h5 uk-margin-small">Pengajuan permohonan layanan data dan informasi di ULP BBPPMPV Seni dan Budaya :</p>
                                        <img src="img/diagrams/layanan-data.png" alt="Layanan Data dan Informasi" width="500" />
                                        <li class="uk-h5 uk-margin-small">Menyampaikan keperluan kepada petugas front office ULP dengan menunjukan kartu identitas dan surat tugas bagi yang mewakili lembaga/badan/organisasi serta mengisi formulir permohonan data atau informasi;</li>
                                        <li class="uk-h5 uk-margin-small">Petugas front office memverifikasi data pemohon dan permohonan informasi;</li>
                                        <li class="uk-h5 uk-margin-small">Petugas ULP menyampaikan informasi yang dibutuhkan. Pelayanan yang belum bisa selesai di front office dilanjutkan ke back office.</li>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="ldi3jwp" uk-toggle="target: #diklatldi3jwp">
                                <h5>3. Jangka waktu penyelesaian <span id="closediklatldi3jwp" uk-icon="chevron-down" hidden></span><span id="opendiklatldi3jwp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatldi3jwp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <p class="uk-h5 uk-margin-small">7 Hari Kerja</p>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="ldi4b" uk-toggle="target: #diklatldi4b">
                                <h5>4. Biaya <span id="closediklatldi4b" uk-icon="chevron-down" hidden></span><span id="opendiklatldi4b" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatldi4b" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <p class="uk-h5 uk-margin-small">Tidak berbayar</p>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="ldi5pp" uk-toggle="target: #diklatldi5pp">
                                <h5>5. Produk pelayanan <span id="closediklatldi5pp" uk-icon="chevron-down" hidden></span><span id="opendiklatldi5pp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatldi5pp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <p class="uk-h5 uk-margin-small">Layanan informasi, pengaduan, magang, kunjungan dan lain-lain</p>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="ldi6p" uk-toggle="target: #diklatldi6p">
                                <h5>6. Pengaduan <span id="closediklatldi6p" uk-icon="chevron-down" hidden></span><span id="opendiklatldi6p" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatldi6p" style="color: #000;" hidden>
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

                    <div class="uk-margin-medium">
                        <h4 class="uk-text-center">B. Pengelolaan Pelayanan <i>(Manufacturing)</i></h4>
                        
                        <div style="color: #000;">
                            <a class="uk-link-reset" id="ldi1dh" uk-toggle="target: #diklatldi1dh">
                                <h5>1. Dasar hukum <span id="closediklatldi1dh" uk-icon="chevron-down" hidden></span><span id="opendiklatldi1dh" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatldi1dh" style="color: #000;" hidden>
                                <div class="uk-margin-large-left uk-text-justify">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Undang-Undang Nomor 25 Tahun 2009 tentang Pelayanan Publik (Lembaran Negara Republik Indonesia Tahun 2009 Nomor 112);</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Pemerintah Nomor 96 Tahun 2012 tentang Pelaksanaan Undang-Undang Nomor 25 Tahun 2009 tentang Pelayanan Publik (Lembaran Negara Republik Indonesia Nomor 5357);</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 15 Tahun 2014 tentang Pedoman Standar Pelayanan (Berita Negara Republik Indonesia Tahun 2014 Nomor 615);</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Menteri Pendayagunaan Aparatur Negara Dan Reformasi Birokrasi Nomor 16 Tahun 2017 Tentang Pedoman Penyelenggaraan Forum Konsultasi Publik Di Lingkungan Unit Penyelenggara Pelayanan Publik (Berita Negara Republik Indonesia Tahun 2017 Nomor 765);</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Menteri Pendayagunaan Aparatur Negara Dan Reformasi Birokrasi Nomor 29 Tahun 2022 Tentang Pemantauan dan evaluasi kinerja penyelenggaraan pelayanan publik (Berita Negara Republik Indonesia Tahun 2022 Nomor 672); dan</li>
                                        <li class="uk-h5 uk-margin-small">Peraturan Menteri Pendidikan Kebudayaan Riset dan Teknologi Nomor 26 tahun 2020 tentang Organisasi dan Tata Kerja Unit Pelaksana Teknis pada Kementerian Pendidikan Kebudayaan, Riset dan Teknologi (Berita Negara Republik Indonesia Tahun 2020 Nomor 682);</li>
                                        <li class="uk-h5 uk-margin-small">Surat Keputusan Kepala Balai Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi Seni dan Budaya Nomor 0368/D7.1/DT.04.00/2024 tentang Pejabat Pengelola Informasi dan Dokumentasi di Lingkungan Balai Besar Pengembangan Penjaminan Mutu Pendidikan Vokasi Seni dan Budaya.</li>
                                    </ol>
                                </div>
                            </div>
                            
                            <a class="uk-link-reset" id="ldi2spf" uk-toggle="target: #diklatldi2spf">
                                <h5>2. Sarana, prasarana/fasilitas <span id="closediklatldi2spf" uk-icon="chevron-down" hidden></span><span id="opendiklatldi2spf" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatldi2spf" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Mesin Antrian</li>
                                        <li class="uk-h5 uk-margin-small">Ruang tunggu</li>
                                        <li class="uk-h5 uk-margin-small">Ruang Tamu</li>
                                        <li class="uk-h5 uk-margin-small">Ruang Laktasi</li>
                                        <li class="uk-h5 uk-margin-small">Arena Bermain</li>
                                        <li class="uk-h5 uk-margin-small">Akses khusus disabilitas</li>
                                        <li class="uk-h5 uk-margin-small">Toilet, termasuk toilet khusus disabilitas</li>
                                        <li class="uk-h5 uk-margin-small">Alat survei kepuasan layanan</li>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="ldi3kp" uk-toggle="target: #diklatldi3kp">
                                <h5>3. Kompetensi pelaksanaan <span id="closediklatldi3kp" uk-icon="chevron-down" hidden></span><span id="opendiklatldi3kp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatldi3kp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <p>Memiliki SDM yang kompeten dalam pengelolaan layanan data dan informasi (layanan informasi, pengaduan, magang, kunjungan dan lain-lain)</p>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="ldi4pi" uk-toggle="target: #diklatldi4pi">
                                <h5>4. Pengawasan internal <span id="closediklatldi4pi" uk-icon="chevron-down" hidden></span><span id="opendiklatldi4pi" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatldi4pi" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <p class="uk-h5 uk-margin-small">Pengawasan dilakukan oleh atasan langsung dan Tim SPI.</p>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="ldi5jp" uk-toggle="target: #diklatldi5jp">
                                <h5>5. Jumlah pelaksana <span id="closediklatldi5jp" uk-icon="chevron-down" hidden></span><span id="opendiklatldi5jp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatldi5jp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Penanggungjawab Humas, Persuratan dan Protokoler 1 orang.</li>
                                        <li class="uk-h5 uk-margin-small">Petugas resepsionis 2 orang.</li>
                                        <li class="uk-h5 uk-margin-small">Petugas front office 2 orang.</li>
                                        <li class="uk-h5 uk-margin-small">Personil back office 14 orang.</li>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="ldi6jp" uk-toggle="target: #diklatldi6jp">
                                <h5>6. Jaminan pelayanan <span id="closediklatldi6jp" uk-icon="chevron-down" hidden></span><span id="opendiklatldi6jp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatldi6jp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Petugas layanan yang kompeten.</li>
                                        <li class="uk-h5 uk-margin-small">Fasilitas layanan yang memadai.</li>
                                        <li class="uk-h5 uk-margin-small">Waktu layanan yang cepat.</li>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="ldi7jkkp" uk-toggle="target: #diklatldi7jkkp">
                                <h5>7. Jaminan keamanan dan keselamatan pelayanan <span id="closediklatldi7jkkp" uk-icon="chevron-down" hidden></span><span id="opendiklatldi7jkkp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatldi7jkkp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <ol>
                                        <li class="uk-h5 uk-margin-small">Semua resiko penggunaan fasilitas telah diidentifikasikan dalam manajemen.</li>
                                        <li class="uk-h5 uk-margin-small">Tersedia pos jaga keamanan dengan petugas keamanan yang berjaga secara terjadwal selama 24 jam.</li>
                                        <li class="uk-h5 uk-margin-small">CCTV di area publik.</li>
                                    </ol>
                                </div>
                            </div>

                            <a class="uk-link-reset" id="ldi8ekp" uk-toggle="target: #diklatldi8ekp">
                                <h5>8. Evaluasi kinerja pelaksana <span id="closediklatldi8ekp" uk-icon="chevron-down" hidden></span><span id="opendiklatldi8ekp" uk-icon="chevron-right"></span></h5>
                            </a>
                        
                            <div id="diklatldi8ekp" style="color: #000;" hidden>
                                <div class="uk-margin-large-left">
                                    <p>Evaluasi penerapan standar pelayanan ini dilakukan 1 (satu) kali dalam satu tahun. Selanjutnya dilakukan tindakan perbaikan untuk menjaga dan meningkatkan kinerja pelayanan.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        // Toggle Diklat Persyaratan Pelayanan
                        document.getElementById('ldi1pp').addEventListener('click', function() {
                            if (document.getElementById('closediklatldi1pp').hasAttribute('hidden')) {
                                document.getElementById('closediklatldi1pp').removeAttribute('hidden');
                                document.getElementById('opendiklatldi1pp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatldi1pp').removeAttribute('hidden');
                                document.getElementById('closediklatldi1pp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Sistem, mekanisme, dan prosedur
                        document.getElementById('ldi2smp').addEventListener('click', function() {
                            if (document.getElementById('closediklatldi2smp').hasAttribute('hidden')) {
                                document.getElementById('closediklatldi2smp').removeAttribute('hidden');
                                document.getElementById('opendiklatldi2smp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatldi2smp').removeAttribute('hidden');
                                document.getElementById('closediklatldi2smp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Jangka waktu penyelesaian
                        document.getElementById('ldi3jwp').addEventListener('click', function() {
                            if (document.getElementById('closediklatldi3jwp').hasAttribute('hidden')) {
                                document.getElementById('closediklatldi3jwp').removeAttribute('hidden');
                                document.getElementById('opendiklatldi3jwp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatldi3jwp').removeAttribute('hidden');
                                document.getElementById('closediklatldi3jwp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Biaya
                        document.getElementById('ldi4b').addEventListener('click', function() {
                            if (document.getElementById('closediklatldi4b').hasAttribute('hidden')) {
                                document.getElementById('closediklatldi4b').removeAttribute('hidden');
                                document.getElementById('opendiklatldi4b').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatldi4b').removeAttribute('hidden');
                                document.getElementById('closediklatldi4b').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Produk pelayanan
                        document.getElementById('ldi5pp').addEventListener('click', function() {
                            if (document.getElementById('closediklatldi5pp').hasAttribute('hidden')) {
                                document.getElementById('closediklatldi5pp').removeAttribute('hidden');
                                document.getElementById('opendiklatldi5pp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatldi5pp').removeAttribute('hidden');
                                document.getElementById('closediklatldi5pp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Pengaduan
                        document.getElementById('ldi6p').addEventListener('click', function() {
                            if (document.getElementById('closediklatldi6p').hasAttribute('hidden')) {
                                document.getElementById('closediklatldi6p').removeAttribute('hidden');
                                document.getElementById('opendiklatldi6p').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatldi6p').removeAttribute('hidden');
                                document.getElementById('closediklatldi6p').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Dasar Hukum
                        document.getElementById('ldi1dh').addEventListener('click', function() {
                            if (document.getElementById('closediklatldi1dh').hasAttribute('hidden')) {
                                document.getElementById('closediklatldi1dh').removeAttribute('hidden');
                                document.getElementById('opendiklatldi1dh').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatldi1dh').removeAttribute('hidden');
                                document.getElementById('closediklatldi1dh').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Sarpras
                        document.getElementById('ldi2spf').addEventListener('click', function() {
                            if (document.getElementById('closediklatldi2spf').hasAttribute('hidden')) {
                                document.getElementById('closediklatldi2spf').removeAttribute('hidden');
                                document.getElementById('opendiklatldi2spf').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatldi2spf').removeAttribute('hidden');
                                document.getElementById('closediklatldi2spf').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Kompetensi Pelaksanaan
                        document.getElementById('ldi3kp').addEventListener('click', function() {
                            if (document.getElementById('closediklatldi3kp').hasAttribute('hidden')) {
                                document.getElementById('closediklatldi3kp').removeAttribute('hidden');
                                document.getElementById('opendiklatldi3kp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatldi3kp').removeAttribute('hidden');
                                document.getElementById('closediklatldi3kp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Pengawasan Internal
                        document.getElementById('ldi4pi').addEventListener('click', function() {
                            if (document.getElementById('closediklatldi4pi').hasAttribute('hidden')) {
                                document.getElementById('closediklatldi4pi').removeAttribute('hidden');
                                document.getElementById('opendiklatldi4pi').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatldi4pi').removeAttribute('hidden');
                                document.getElementById('closediklatldi4pi').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Jumlah Pelaksana
                        document.getElementById('ldi5jp').addEventListener('click', function() {
                            if (document.getElementById('closediklatldi5jp').hasAttribute('hidden')) {
                                document.getElementById('closediklatldi5jp').removeAttribute('hidden');
                                document.getElementById('opendiklatldi5jp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatldi5jp').removeAttribute('hidden');
                                document.getElementById('closediklatldi5jp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Jaminan Pelayanan
                        document.getElementById('ldi6jp').addEventListener('click', function() {
                            if (document.getElementById('closediklatldi6jp').hasAttribute('hidden')) {
                                document.getElementById('closediklatldi6jp').removeAttribute('hidden');
                                document.getElementById('opendiklatldi6jp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatldi6jp').removeAttribute('hidden');
                                document.getElementById('closediklatldi6jp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Jaminan Keamanan
                        document.getElementById('ldi7jkkp').addEventListener('click', function() {
                            if (document.getElementById('closediklatldi7jkkp').hasAttribute('hidden')) {
                                document.getElementById('closediklatldi7jkkp').removeAttribute('hidden');
                                document.getElementById('opendiklatldi7jkkp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatldi7jkkp').removeAttribute('hidden');
                                document.getElementById('closediklatldi7jkkp').setAttribute('hidden', '');

                            }
                        });

                        // Toggle Diklat Evaluasi Kinerja Pelaksana
                        document.getElementById('ldi8ekp').addEventListener('click', function() {
                            if (document.getElementById('closediklatldi8ekp').hasAttribute('hidden')) {
                                document.getElementById('closediklatldi8ekp').removeAttribute('hidden');
                                document.getElementById('opendiklatldi8ekp').setAttribute('hidden', '');
                            } else {
                                document.getElementById('opendiklatldi8ekp').removeAttribute('hidden');
                                document.getElementById('closediklatldi8ekp').setAttribute('hidden', '');

                            }
                        });
                    </script>
                </div>
            </li>
            <!-- Layanan Data dan Informasi Section End -->
        </ul>
        <!-- Switcher Section End -->
    </div>
</section>
<!-- Header Section End -->

<?= $this->endSection() ?>