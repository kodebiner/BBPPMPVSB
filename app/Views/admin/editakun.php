<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

<div class="uk-card uk-card-small uk-card-body uk-margin-large-right uk-light" style="background-color:  rgba(60, 105, 151, .8);;">
    <h3 class="uk-card-title">Ubah Profil</h3>
</div>

<div class="uk-card uk-card-default uk-margin-large-right">
    <?= view('Views/Auth/_message_block') ?>

    <form action="save/akun" method="post">
        <div class="uk-card-body">

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Nama</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <input class="uk-input uk-box-shadow-small uk-border-rounded" id="form-stacked-text" name="username" value="<?= $users['name'] ?>" type="text" placeholder="Masukkan Nama...">
                </div>
            </div>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Email</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <input class="uk-input uk-box-shadow-small uk-border-rounded" id="form-stacked-text" name="email" value="<?= $users['email'] ?>" type="email" placeholder="Masukkan Email..." required>
                </div>
            </div>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Level Akun</label>
            <div class="uk-margin">
                <select class="uk-select" name="level" aria-label="Select">
                    <?php
                    foreach ($level as $lev) {
                        if (strcmp($lev, $users['group']) !== 0) {
                            $selected = "";
                        }
                        else {
                            $selected = "selected";
                        }
                    ?>
                        <option value="<?= $lev ?>" <?= $selected ?>><?= $lev ?></option>
                    <?php } ?>
                </select>
            </div>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Kata Sandi Lama</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <input class="uk-input uk-box-shadow-small uk-border-rounded" id="form-stacked-text" value="<?=$users['password']?>" name="current_pass" type="password" placeholder="Masukkan Kata Sandi Lama...">
                </div>
            </div>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Kata Sandi Baru</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <input class="uk-input uk-box-shadow-small uk-border-rounded" id="form-stacked-text" value="<?=$users['password']?>" name="password" type="password" placeholder="Masukkan Kata Sandi...">
                </div>
            </div>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Ulangi Kata Sandi Baru</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <input class="uk-input uk-box-shadow-small uk-border-rounded" id="form-stacked-text" value="<?=$users['password']?>" name="password_confirm" type="password" placeholder="Konfirmasi Kata Sandi...">
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