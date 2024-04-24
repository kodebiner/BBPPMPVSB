<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

<div class="uk-card uk-card-small uk-card-body uk-margin-large-right uk-light" style="background-color:  rgba(60, 105, 151, .8);;">
    <h3 class="uk-card-title">Ubah Data Pengguna</h3>
</div>

<div class="uk-card uk-card-default uk-margin-large-right">
    <?= view('Views/Auth/_message_block') ?>

    <form action="add/users" method="post">
        <div class="uk-card-body">

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Nama</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <input class="uk-input uk-box-shadow-small uk-border-rounded" id="form-stacked-text" name="username" value="" type="text" placeholder="Masukkan Nama...">
                </div>
            </div>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Email</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <input class="uk-input uk-box-shadow-small uk-border-rounded" id="form-stacked-text" name="email" type="email" placeholder="Masukkan Email..." required>
                </div>
            </div>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Level Akun</label>
            <div class="uk-margin">
                <select class="uk-select" aria-label="Select">
                    <option>Option 01</option>
                    <option>Option 02</option>
                </select>
            </div>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Kata Sandi</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <input class="uk-input uk-box-shadow-small uk-border-rounded" id="form-stacked-text" name="password" type="password" placeholder="Masukkan Kata Sandi..." required>
                </div>
            </div>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Ulangi Kata Sandi</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <input class="uk-input uk-box-shadow-small uk-border-rounded" id="form-stacked-text" name="password_confirm" type="password" placeholder="Konfirmasi Kata Sandi..." required>
                </div>
            </div>

        </div>
        <div class="uk-card-footer">
            <p uk-margin class="uk-text-right">
                <button class="uk-button uk-light" style="background-color: rgba(60, 105, 151, .8); color:white;" type="submit">Simpan</button>
            </p>
        </div>
    </form>
</div>


<?= $this->endSection() ?>