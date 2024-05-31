<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right uk-light" style="background-color:  rgba(60, 105, 151, .8);">
        <div class="uk-child-width-auto" uk-grid>
            <div>
                <h3 class="uk-card-title">Tambah Gratifikasi</h3>
            </div>
        </div>
    </div>

    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <?= view('Views/Auth/_message_block') ?>
        <form action="add/gratifikasi" method="post">
            <div class="uk-card-body">
                <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="name">Nama</label>
                <div class="uk-margin">
                    <div class="uk-form-controls">
                        <input type="text" class="uk-input uk-box-shadow-small uk-border-rounded" id="name" name="name" placeholder="Masukkan Nama...">
                    </div>
                </div>

                <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="type">Tipe Inputan Gratifikasi</label>
                <div class="uk-margin">
                    <select class="uk-select" name="type" id="type" >
                        <option selected disabled>Tipe Inputan Gratifikasi</option>
                        <option value="1">Kalimat Singkat (Nama, Nama Lengkap, Alamat, Tempat/Tanggal Lahir dll)</option>
                        <option value="2">Kalimat Panjang (Uraian, Alasan, dll)</option>
                        <option value="3">Upload File (Berkas, Dokumen, PDF)</option>
                    </select>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="wajib">Wajib Diisi atau Tidak</label>
                    <label class="switch uk-margin-small-left">
                        <input id="wajib" name="wajib" type="checkbox">
                        <span class="slider round"></span>
                    </label>
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