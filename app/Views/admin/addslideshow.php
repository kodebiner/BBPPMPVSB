<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right uk-light" style="background-color:  rgba(60, 105, 151, .8);;">
        <h3 class="uk-card-title">Tambah Slide Show</h3>
    </div>

    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <?= view('Views/Auth/_message_block') ?>
        <form action="add/slideshow" method="post">
            <div class="uk-card-body">

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Status Slide Show</label>
            <label class="switch uk-margin-small-left">
                <input id="status" name="status" type="checkbox">
                <span class="slider round"></span>
            </label>

            <!-- Upload Foto -->
            <div class="uk-child-width-1-1@m uk-margin" uk-grid>
                <div>
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top uk-text-center">
                            <div id="lightbox" uk-lightbox>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold">Upload Gambar</label>
            <div id="js-upload-foto" class="js-upload uk-placeholder uk-text-center" style="height: 20px;">
                <span uk-icon="icon: cloud-upload"></span>
                <span class="uk-text-middle">Tarik dan lepas file disini atau</span>
                <div uk-form-custom>
                    <input type="file" multiple>
                    <input type="hidden" id="foto" name="gambar" value="">
                    <span class="uk-link">Pilih satu</span>
                </div>
            </div>
            <progress id="js-upload-createfoto" class="uk-progress" value="0" max="100" hidden></progress>
            <!-- End Upload Foto -->

            <!-- Upload Foto Sampul Script -->
            <script>
                    var barfoto = document.getElementById('js-upload-createfoto');

                UIkit.upload('#js-upload-foto', {

                    url: 'upload/fotoslideshow',
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

                        var filename = arguments[0].response;
                        console.log(filename);

                        if (document.getElementById('imagecontainer')) {
                            document.getElementById('imagecontainer').remove();
                        };

                        // var containerimage = document.getElementById('imagecontainer');
                        var lightbox = document.getElementById('lightbox');

                        var linkimg = document.createElement('a');
                        linkimg.setAttribute('id','imagecontainer');
                        linkimg.setAttribute('class','uk-inline');
                        linkimg.setAttribute('href','artista/foto/'+filename);
                        linkimg.setAttribute('data-caption', filename);


                        var imagetag = document.createElement('img');
                        imagetag.setAttribute('id','fileimage');
                        imagetag.setAttribute('class','uk-margin-top uk-margin-bottom');
                        imagetag.setAttribute('src','artista/foto/'+filename);
                        imagetag.setAttribute('width','300');
                        imagetag.setAttribute('heigth','150');
                        imagetag.setAttribute('alt', filename);

                        lightbox.appendChild(linkimg);
                        linkimg.appendChild(imagetag);

                        document.getElementById("foto").value = filename;
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

                        alert('Upload Selesai');
                    }

                });
            </script>
            <!-- End Upload Foto Sampul Script -->

            </div>
            <div class="uk-card-footer">
                <p uk-margin class="uk-text-right">
                    <button class="uk-button uk-light" style="background-color: rgba(60, 105, 151, .8); color:white;" type="submit">Simpan</button>
                </p>
            </div>
        </form>
    </div>


<?= $this->endSection() ?>