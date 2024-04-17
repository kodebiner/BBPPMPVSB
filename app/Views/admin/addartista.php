<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right uk-light" style="background-color:  rgba(60, 105, 151, .8);;">
        <h3 class="uk-card-title">Tambah Data Artista</h3>
    </div>

    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <div class="uk-card-body">
            <form class="uk-width-expand uk-margin">
                <fieldset class="uk-fieldset">
                    <h5>Judul</h5>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Masukkan Judul" aria-label="Input">
                    </div>

                </fieldset>

                <h5 class="uk-margin-small-top">Upload File</h5>
                <div class="js-upload uk-placeholder uk-text-center" style="height: 20px;">
                    <span uk-icon="icon: cloud-upload"></span>
                    <span class="uk-text-middle">Tarik file kemari atau</span>
                    <div uk-form-custom>
                        <input type="file" multiple>
                        <span class="uk-link">Pilih satu</span>
                    </div>
                </div>

                <h5 class="uk-margin-small-top">Upload Foto</h5>
                <div class="js-upload uk-placeholder uk-text-center" style="height: 20px;">
                    <span uk-icon="icon: cloud-upload"></span>
                    <span class="uk-text-middle">Tarik file kemari atau</span>
                    <div uk-form-custom>
                        <input type="file" multiple>
                        <span class="uk-link">Pilih satu</span>
                    </div>
                </div>
            </form>

        </div>
        <div class="uk-card-footer">
        <p uk-margin class="uk-text-right">
            <button class="uk-button uk-light" style="background-color:  rgba(60, 105, 151, .8);;">Simpan</button>
        </p>
        </div>
    </div>

    <progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>

    <script>

        var bar = document.getElementById('js-progressbar');

        UIkit.upload('.js-upload', {

            url: '',
            multiple: true,

            beforeSend: function () {
                console.log('beforeSend', arguments);
            },
            beforeAll: function () {
                console.log('beforeAll', arguments);
            },
            load: function () {
                console.log('load', arguments);
            },
            error: function () {
                console.log('error', arguments);
            },
            complete: function () {
                console.log('complete', arguments);
            },

            loadStart: function (e) {
                console.log('loadStart', arguments);

                bar.removeAttribute('hidden');
                bar.max = e.total;
                bar.value = e.loaded;
            },

            progress: function (e) {
                console.log('progress', arguments);

                bar.max = e.total;
                bar.value = e.loaded;
            },

            loadEnd: function (e) {
                console.log('loadEnd', arguments);

                bar.max = e.total;
                bar.value = e.loaded;
            },

            completeAll: function () {
                console.log('completeAll', arguments);

                setTimeout(function () {
                    bar.setAttribute('hidden', 'hidden');
                }, 1000);

                alert('Upload Completed');
            }

        });

    </script>

    <progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>

    <script>

        var bar = document.getElementById('js-progressbar');

        UIkit.upload('.js-upload', {

            url: '',
            multiple: true,

            beforeSend: function () {
                console.log('beforeSend', arguments);
            },
            beforeAll: function () {
                console.log('beforeAll', arguments);
            },
            load: function () {
                console.log('load', arguments);
            },
            error: function () {
                console.log('error', arguments);
            },
            complete: function () {
                console.log('complete', arguments);
            },

            loadStart: function (e) {
                console.log('loadStart', arguments);

                bar.removeAttribute('hidden');
                bar.max = e.total;
                bar.value = e.loaded;
            },

            progress: function (e) {
                console.log('progress', arguments);

                bar.max = e.total;
                bar.value = e.loaded;
            },

            loadEnd: function (e) {
                console.log('loadEnd', arguments);

                bar.max = e.total;
                bar.value = e.loaded;
            },

            completeAll: function () {
                console.log('completeAll', arguments);

                setTimeout(function () {
                    bar.setAttribute('hidden', 'hidden');
                }, 1000);

                alert('Upload Completed');
            }

        });

    </script>
<?= $this->endSection() ?>