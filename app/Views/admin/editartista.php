<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-primary uk-card-body uk-margin-xlarge-right">
        <h3 class="uk-card-title">Ubah Data Artista</h3>
    </div>

    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <div class="uk-card-body">
            <!-- <form class="uk-width-expand uk-margin"> -->
                <!-- <fieldset class="uk-fieldset">
                    <h5>Judul</h5>
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="Masukkan Judul..." aria-label="Input">
                    </div>
                </fieldset> -->

                <!-- Upload File -->
                <div class="uk-child-width-1-1@m" uk-grid>
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-body uk-text-center">
                                <h5><a href="artista/artikel/<?=$artista['file']?>"><span uk-icon="file-text"></span><?=$artista['file']?></a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>

                <h5 class="uk-margin-small-top">Upload File</h5>
                <div class="js-upload uk-placeholder uk-text-center" style="height: 20px;">
                    <span uk-icon="icon: cloud-upload"></span>
                    <span class="uk-text-middle">Tarik file kemari atau</span>
                    <div uk-form-custom>
                        <input type="file" multiple>
                        <span class="uk-link">Pilih satu</span>
                    </div>
                </div>
                <!-- End Of Upload File -->

                <!-- Upload Foto -->
                <div class="uk-child-width-1-1@m" uk-grid>
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top uk-text-center">
                                <img class="uk-margin-top uk-margin-bottom" src="images/artista/<?=$artista['photo']?>" width="180" height="120" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="uk-margin-small-top">Upload Foto</h5>
                <div id="js-upload-createfoto" class="js-upload uk-placeholder uk-text-center" style="height: 20px;">
                    <span uk-icon="icon: cloud-upload"></span>
                    <span class="uk-text-middle">Tarik dan lepas file disini atau</span>
                    <div uk-form-custom>
                        <input type="file" multiple>
                        <span class="uk-link">Pilih satu</span>
                    </div>
                </div>
                <progress id="js-upload-createfoto" class="uk-progress" value="0" max="100" hidden></progress>
                <!-- End Upload Foto -->

                <!-- <div class="uk-margin" id="image-container-createspk-</?= $project['id'] ?>">
                    <label class="uk-form-label" for="photocreate">Kirim File SPK</label>
                    <div class="uk-placeholder" id="placespk</?= $project['id'] ?>" hidden>
                        <div uk-grid>
                            <div class="uk-text-left uk-width-3-4">
                                <div id="upspk</?= $project['id'] ?>"></div>
                            </div>
                            <div class="uk-text-right uk-width-1-4">
                                <div id="closespk</?= $project['id'] ?>"></div>
                            </div>
                        </div>
                    </div>

                    <div id="image-containerspk-</?= $project['id'] ?>" class="uk-form-controls">
                        <input id="photocreatespk</?= $project['id'] ?>" name="spk" hidden />
                        <div id="js-upload-createspk-</?= $project['id'] ?>" class="js-upload-createspk-</?= $project['id'] ?> uk-placeholder uk-text-center">
                            <span uk-icon="icon: cloud-upload"></span>
                            <span class="uk-text-middle">Tarik dan lepas file disini atau</span>
                            <div uk-form-custom>
                                <input type="file">
                                <span class="uk-link uk-preserve-color">pilih satu</span>
                            </div>
                        </div>
                        <progress id="js-progressbar-createspk-</?= $project['id'] ?>" class="uk-progress" value="0" max="100" hidden></progress>
                    </div>
                </div> -->
            <!-- </form> -->

        </div>
        <div class="uk-card-footer">
        <p uk-margin class="uk-text-right">
            <button class="uk-button uk-button-primary">Simpan</button>
            <button class="uk-button uk-button-danger">Hapus</button>
        </p>
        </div>
    </div>


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

<!-- Upload Foto Script -->
    <script>

        var barfoto = document.getElementById('js-upload-createfoto');

        UIkit.upload('#js-upload-createfoto', {

            url: 'upload/foto',
            multiple: true,
            name: 'uploads',
            param: {
                lorem: 'ipsum'
            },
            method: 'POST',
            type: 'json',

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

                // if (document.getElementById('display-container-createspk-</?= $project['id'] ?>')) {
                //     document.getElementById('display-container-createspk-</?= $project['id'] ?>').remove();
                // };

                // document.getElementById('photocreatespk</?= $project['id'] ?>').value = filename;

                // document.getElementById('placespk</?= $project['id'] ?>').removeAttribute('hidden');

                // var uprev = document.getElementById('upspk</?= $project['id'] ?>');
                // var closed = document.getElementById('closespk</?= $project['id'] ?>');

                // var divuprev = document.createElement('h6');
                // divuprev.setAttribute('class', 'uk-margin-remove');
                // divuprev.setAttribute('id', 'spk</?= $project['id'] ?>');

                // var linkrev = document.createElement('a');
                // linkrev.setAttribute('href', 'img/revisi/' + filename);
                // linkrev.setAttribute('uk-icon', 'file-text');

                // var link = document.createElement('a');
                // link.setAttribute('href', 'img/revisi/' + filename);
                // link.setAttribute('target', '_blank');

                // var linktext = document.createTextNode(filename);

                // var divclosed = document.createElement('a');
                // divclosed.setAttribute('uk-icon', 'icon: close');
                // divclosed.setAttribute('onClick', 'removeImgCreatespk</?= $project['id'] ?>()');
                // divclosed.setAttribute('id', 'closedspk</?= $project['id'] ?>');

                // uprev.appendChild(divuprev);
                // divuprev.appendChild(linkrev);
                // divuprev.appendChild(link);
                // link.appendChild(linktext);
                // closed.appendChild(divclosed);

                // document.getElementById('js-upload-createspk-</?= $project['id'] ?>').setAttribute('hidden', '');
            },

            loadStart: function (e) {
                console.log('loadStart', arguments);

                barfoto.removeAttribute('hidden');
                barfoto.max = e.total;
                barfoto.value = e.loaded;
            },

            progress: function (e) {
                console.log('progress', arguments);

                barfoto.max = e.total;
                barfoto.value = e.loaded;
            },

            loadEnd: function (e) {
                console.log('loadEnd', arguments);

                barfoto.max = e.total;
                barfoto.value = e.loaded;
            },

            completeAll: function () {
                console.log('completeAll', arguments);

                setTimeout(function () {
                    barfoto.setAttribute('hidden', 'hidden');
                }, 1000);

                alert('Upload Completed');
            }

        });

    </script>
    <!-- End Upload Foto Script -->
    <!-- <script type="text/javascript">
                                        var barspk = document.getElementById('js-progressbar-createspk-</?= $project['id'] ?>');
                                        UIkit.upload('.js-upload-createspk-</?= $project['id'] ?>', {
                                            url: 'upload/spk',
                                            multiple: false,
                                            name: 'uploads',
                                            param: {
                                                lorem: 'ipsum'
                                            },
                                            method: 'POST',
                                            type: 'json',

                                            beforeSend: function() {
                                                console.log('beforeSend', arguments);
                                            },
                                            beforeAll: function() {
                                                console.log('beforeAll', arguments);
                                            },
                                            load: function() {
                                                console.log('load', arguments);
                                            },
                                            error: function() {
                                                console.log('error', arguments);
                                                var error = arguments[0].xhr.response.message.uploads;
                                                alert(error);
                                            },

                                            complete: function() {
                                                console.log('complete', arguments);

                                                var filename = arguments[0].response;
                                                console.log(filename);

                                                if (document.getElementById('display-container-createspk-</?= $project['id'] ?>')) {
                                                    document.getElementById('display-container-createspk-</?= $project['id'] ?>').remove();
                                                };

                                                document.getElementById('photocreatespk</?= $project['id'] ?>').value = filename;

                                                document.getElementById('placespk</?= $project['id'] ?>').removeAttribute('hidden');

                                                var uprev = document.getElementById('upspk</?= $project['id'] ?>');
                                                var closed = document.getElementById('closespk</?= $project['id'] ?>');

                                                var divuprev = document.createElement('h6');
                                                divuprev.setAttribute('class', 'uk-margin-remove');
                                                divuprev.setAttribute('id', 'spk</?= $project['id'] ?>');

                                                var linkrev = document.createElement('a');
                                                linkrev.setAttribute('href', 'img/revisi/' + filename);
                                                linkrev.setAttribute('uk-icon', 'file-text');

                                                var link = document.createElement('a');
                                                link.setAttribute('href', 'img/revisi/' + filename);
                                                link.setAttribute('target', '_blank');

                                                var linktext = document.createTextNode(filename);

                                                var divclosed = document.createElement('a');
                                                divclosed.setAttribute('uk-icon', 'icon: close');
                                                divclosed.setAttribute('onClick', 'removeImgCreatespk</?= $project['id'] ?>()');
                                                divclosed.setAttribute('id', 'closedspk</?= $project['id'] ?>');

                                                uprev.appendChild(divuprev);
                                                divuprev.appendChild(linkrev);
                                                divuprev.appendChild(link);
                                                link.appendChild(linktext);
                                                closed.appendChild(divclosed);

                                                document.getElementById('js-upload-createspk-</?= $project['id'] ?>').setAttribute('hidden', '');
                                            },

                                            loadStart: function(e) {
                                                console.log('loadStart', arguments);

                                                document.getElementById('js-progressbar-createspk-</?= $project['id'] ?>').removeAttribute('hidden');

                                                document.getElementById('js-progressbar-createspk-</?= $project['id'] ?>').max = e.total;
                                                document.getElementById('js-progressbar-createspk-</?= $project['id'] ?>').value = e.loaded;

                                            },

                                            progress: function(e) {
                                                console.log('progress', arguments);

                                                document.getElementById('js-progressbar-createspk-</?= $project['id'] ?>').max = e.total;
                                                document.getElementById('js-progressbar-createspk-</?= $project['id'] ?>').value = e.loaded;
                                            },

                                            loadEnd: function(e) {
                                                console.log('loadEnd', arguments);

                                                document.getElementById('js-progressbar-createspk-</?= $project['id'] ?>').max = e.total;
                                                document.getElementById('js-progressbar-createspk-</?= $project['id'] ?>').value = e.loaded;
                                            },

                                            completeAll: function() {
                                                console.log('completeAll', arguments);

                                                setTimeout(function() {
                                                    document.getElementById('js-progressbar-createspk-</?= $project['id'] ?>').setAttribute('hidden', 'hidden');
                                                    alert('</?= lang('Proses selesai, Silahkan Unggah Data.') ?>');
                                                }, 1000);
                                            }

                                        });

                                        function removeImgCreatespk</?= $project['id'] ?>() {
                                            $.ajax({
                                                type: 'post',
                                                url: 'upload/removespk',
                                                data: {
                                                    'spk': document.getElementById('photocreatespk</?= $project['id'] ?>').value
                                                },
                                                dataType: 'json',

                                                error: function() {
                                                    console.log('error', arguments);
                                                },

                                                success: function() {
                                                    console.log('success', arguments);

                                                    var pesan = arguments[0][1];

                                                    document.getElementById('spk</?= $project['id'] ?>').remove();
                                                    document.getElementById('closedspk</?= $project['id'] ?>').remove();
                                                    document.getElementById('placespk</?= $project['id'] ?>').setAttribute('hidden', '');
                                                    document.getElementById('photocreatespk</?= $project['id'] ?>').value = '';

                                                    document.getElementById('js-upload-createspk-</?= $project['id'] ?>').removeAttribute('hidden', '');
                                                    alert(pesan);
                                                }
                                            });
                                        };
                                    </script>
                                    <div class="uk-modal-footer uk-text-center">
                                        <button class="uk-button uk-button-primary" type="submit">Kirim</button>
                                    </div> -->
<?= $this->endSection() ?>