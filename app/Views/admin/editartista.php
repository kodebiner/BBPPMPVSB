<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right uk-light" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title">Ubah Data Artista</h3>
    </div>

    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <form action="save/artista/<?=$artista['id']?>" method="post">
            <div class="uk-card-body">
                <!-- Upload File -->
                <div class="uk-child-width-1-1@m" uk-grid>
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-body uk-text-center">
                                <h5 id="uppdf"><a id="filepdf" href="artista/artikel/<?=$artista['file']?>" target="_blank"><span uk-icon="file-text"></span><?=$artista['file']?></a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h5 class="uk-margin-small-top">Upload File</h5>
                <div class="js-upload uk-placeholder uk-text-center" style="height: 20px;">
                    <span uk-icon="icon: cloud-upload"></span>
                    <span class="uk-text-middle">Tarik file kemari atau</span>
                    <div uk-form-custom>
                        <input type="file" multiple>
                        <input type="hidden" id="file" name="file" value="<?=$artista['file']?>">
                        <span class="uk-link">Pilih satu</span>
                    </div>
                </div>
                <progress id="js-progressbarpdf" class="uk-progress" value="0" max="100" hidden></progress>
                <!-- End Of Upload File -->

                <!-- Upload Foto -->
                <div class="uk-child-width-1-1@m" uk-grid>
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top uk-text-center">
                                <div uk-lightbox>
                                    <a class="uk-inline" id="imagecontainer" href="artista/foto/<?=$artista['photo']?>" data-caption="<?=$artista['photo']?>">
                                        <img id="fileimage" class="uk-margin-top uk-margin-bottom" src="artista/foto/<?=$artista['photo']?>" width="180" height="120" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="uk-margin-small-top">Upload Foto</h5>
                <div id="js-upload-foto" class="js-upload uk-placeholder uk-text-center" style="height: 20px;">
                    <span uk-icon="icon: cloud-upload"></span>
                    <span class="uk-text-middle">Tarik dan lepas file disini atau</span>
                    <div uk-form-custom>
                        <input type="file" multiple>
                        <input type="hidden" id="foto" name="foto" value="<?=$artista['photo']?>">
                        <span class="uk-link">Pilih satu</span>
                    </div>
                </div>
                <progress id="js-upload-createfoto" class="uk-progress" value="0" max="100" hidden></progress>
                <!-- End Upload Foto -->

            </div>
            <div class="uk-card-footer">
                <p uk-margin class="uk-text-right">
                    <button class="uk-button uk-light" style="background-color: rgba(60, 105, 151, .8); color:white;" type="submit">Simpan</button>
                </p>
            </div>
        </form>
    </div>


    <!-- Upload File Pdf -->
    <script>

        var barpdf = document.getElementById('js-progressbarpdf');

        UIkit.upload('.js-upload', {

            url: 'upload/pdf',
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
                var error = arguments[0].xhr.response.message.uploads;
                alert(error);
            },
            complete: function () {
                console.log('complete', arguments);

                var filename = arguments[0].response;
                console.log(filename);

                if (document.getElementById('filepdf')) {
                    document.getElementById('filepdf').remove();
                };

                var containpdf = document.getElementById('uppdf');

                var pdffile = document.createElement('a');
                pdffile.setAttribute('id','filepdf');
                pdffile.setAttribute('href','artista/artikel/'+filename);

                var iconpdf = document.createElement('span');
                iconpdf.setAttribute('uk-icon','file-text');

                var pdftext = document.createTextNode(filename);

                containpdf.appendChild(pdffile);
                pdffile.appendChild(iconpdf);
                pdffile.appendChild(pdftext);

                document.getElementById("file").value = filename;
            },

            loadStart: function (e) {
                console.log('loadStart', arguments);

                barpdf.removeAttribute('hidden');
                barpdf.max = e.total;
                barpdf.value = e.loaded;
            },

            progress: function (e) {
                console.log('progress', arguments);

                barpdf.max = e.total;
                barpdf.value = e.loaded;
            },

            loadEnd: function (e) {
                console.log('loadEnd', arguments);

                barpdf.max = e.total;
                barpdf.value = e.loaded;
            },

            completeAll: function () {
                console.log('completeAll', arguments);

                setTimeout(function () {
                    barpdf.setAttribute('hidden', 'hidden');
                }, 1000);

                alert('Upload Selesai');
            }

        });

    </script>
    <!-- End Upload File Pdf -->

    <!-- Upload Foto Script -->
    <script>

        var barfoto = document.getElementById('js-upload-createfoto');

        UIkit.upload('#js-upload-foto', {

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
                var error = arguments[0].xhr.response.message.upload;
                alert(error);
            },
            complete: function () {
                console.log('complete', arguments);

                var filename = arguments[0].response;
                console.log(filename);

                if (document.getElementById('fileimage')) {
                    document.getElementById('fileimage').remove();
                };

                var containerimage = document.getElementById('imagecontainer');

                var linkimg = document.createElement('a');
                linkimg.setAttribute('id','imagecontainer');
                linkimg.setAttribute('class','uk-inline');
                linkimg.setAttribute('href','artista/foto/'+filename);
                linkimg.setAttribute('data-caption', filename);


                var imagetag = document.createElement('img');
                imagetag.setAttribute('id','fileimage');
                imagetag.setAttribute('class','uk-margin-top uk-margin-bottom');
                imagetag.setAttribute('src','artista/foto/'+filename);
                imagetag.setAttribute('width','120');
                imagetag.setAttribute('heigth','180');
                imagetag.setAttribute('alt', filename);

                containerimage.appendChild(linkimg);
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
    
<?= $this->endSection() ?>