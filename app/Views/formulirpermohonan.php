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

<!-- Form Pengaduan Section -->
<section class="uk-section uk-section-default">
    <div class="uk-container uk-container-xlarge">
        <div class="uk-margin-bottom">
            <div class="uk-text-center">
                <h3>Formulir Permohonan Informasi</h3>
            </div>
        </div>

        <?= view('Views/_message_block') ?>
        
        <form class="uk-form-stacked" role="form" action="layanan/permohonaninformasi" method="post">
            <?= csrf_field() ?>

            <div class="uk-margin-bottom">
                <label class="uk-form-label" for="name">Nama</label>
                <div class="uk-form-controls">
                    <input type="text" class="uk-input <?php if (session('errors.name')) : ?>tm-form-invalid<?php endif ?>" id="name" name="name" placeholder="contoh : Andriana Kusuma"/>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="email">Email</label>
                <div class="uk-form-controls">
                    <input type="email" name="email" id="email" placeholder="contoh : andriana.kusuma@gmail.com" class="uk-input <?php if (session('errors.email')) : ?>tm-form-invalid<?php endif ?>" />
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="jobs">Pekerjaan</label>
                <div class="uk-form-controls">
                    <input name="jobs" id="jobs" placeholder="contoh : Wiraswata" class="uk-input <?php if (session('errors.jobs')) : ?>tm-form-invalid<?php endif ?>" />
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="address">Alamat</label>
                <div class="uk-form-controls">
                    <input name="address" id="address" placeholder="contoh : Jl. Kaliurang KM 12,5 Klidon, Sukoharjo, Ngaglik, Sleman, DI Yogyakarta, Indonesia 55581" class="uk-input <?php if (session('errors.address')) : ?>tm-form-invalid<?php endif ?>" />
                </div>
            </div>

            <div class="uk-margin-bottom">
                <label class="uk-form-label" for="phone">Nomor HP/WA</label>
                <div class="uk-form-controls">
                    <input class="uk-input <?php if (session('errors.phone')) : ?>tm-form-invalid<?php endif ?>" id="phone" name="phone" type="number" placeholder="contoh : 08123456789" aria-label="Not clickable icon"/>
                </div>
            </div>

            <div class="uk-margin-bottom">
                <label class="uk-form-label" for="note">Informasi Yang Dibutuhkan</label>
                <textarea class="uk-textarea <?php if (session('errors.note')) : ?>tm-form-invalid<?php endif ?>" rows="5" id="note" name="note" placeholder="Informasi Yang Dibutuhkan" aria-label="Textarea"></textarea>
            </div>

            <hr>

            <div class="uk-margin uk-text-right">
                <button type="submit" class="uk-button uk-button-primary">Simpan</button>
            </div>
        </form>
    </div>
</section>
<!-- Form Pengaduan Section End -->

<?= $this->endSection() ?>