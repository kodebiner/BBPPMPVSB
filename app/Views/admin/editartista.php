<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right uk-light" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title">Ubah Data Artista</h3>
    </div>

    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <?= view('Views/Auth/_message_block') ?>
        <form action="save/artista/<?=$artista['id']?>" method="post">
            <div class="uk-card-body">
                <!-- Input Title -->
                <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Judul</label>
                <div class="uk-margin">
                    <div class="uk-form-controls">
                        <input class="uk-input uk-box-shadow-small uk-border-rounded" id="form-stacked-text" name="judul" value="<?=$artista['title']?>" type="text" placeholder="Masukkan Judul...">
                    </div>
                </div>

                <!-- Upload File -->
                <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Link Flipbook</label>
                <div class="uk-margin">
                    <div class="uk-form-controls">
                        <input class="uk-input uk-box-shadow-small uk-border-rounded" id="form-stacked-text" name="file" value="<?=$artista['file']?>" type="text" placeholder="salin dan tempel link flipbook (https://online.fliphtml5.com/segbs/frqk/)">
                    </div>
                </div>
                <!-- <h5 class="uk-margin-small-top">File Artista</h5>
                <div class="uk-child-width-1-1@m" uk-grid>
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-body uk-text-center">
                                <h5 id="uppdf"><a id="filepdf" href="artista/artikel/<?=$artista['file']?>" target="_blank"><span uk-icon="file-text"></span><?=$artista['file']?></a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h5 class="uk-margin-small-top">Upload File Baru</h5>
                <div class="uk-margin" id="file-container-createartista">
                    <div id="file-containerartista" class="uk-form-controls">
                        <progress id="js-upload-createfile" class="uk-progress" value="0" max="100" hidden></progress>
                        <input id="file" name="file" hidden value="<?=$artista['file']?>" />
                        <div id="js-upload-fileartista" class="js-upload-fileartista uk-placeholder uk-text-center">
                            <span uk-icon="icon: cloud-upload"></span>
                            <span class="uk-text-middle">Tarik dan lepas file disini atau</span>
                            <div uk-form-custom>
                                <input type="file" multiple>
                                <span class="uk-link uk-preserve-color">pilih satu</span>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- End Of Upload File -->

                <!-- Upload Foto -->
                <h5 class="uk-margin-small-top">Foto Artista</h5>
                <div class="uk-child-width-1-1@m" uk-grid>
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top uk-text-center">
                                <div uk-lightbox>
                                    <a class="uk-inline" id="fileimagecontainer" href="artista/foto/<?=$artista['photo']?>" data-caption="<?=$artista['photo']?>">
                                        <img id="fileimage" class="uk-margin-top uk-margin-bottom" src="artista/foto/<?=$artista['photo']?>" width="180" height="120" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="uk-margin-small-top">Upload Foto Baru</h5>
                <div class="uk-margin" id="image-container-createartista">
                    <div id="image-containerartista" class="uk-form-controls">
                        <progress id="js-upload-createfoto" class="uk-progress" value="0" max="100" hidden></progress>
                        <input id="foto" name="foto" hidden value="<?=$artista['photo']?>" />
                        <div id="js-upload-fotoartista" class="js-upload uk-placeholder uk-text-center">
                            <span uk-icon="icon: cloud-upload"></span>
                            <span class="uk-text-middle">Tarik dan lepas file disini atau</span>
                            <div uk-form-custom>
                                <input type="file">
                                <span class="uk-link uk-preserve-color">pilih satu</span>
                            </div>
                        </div>
                    </div>
                </div>
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
        var barpdf = document.getElementById('js-upload-createfoto');
        UIkit.upload('.js-upload-fileartista', {
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
                var error = arguments[0].xhr.response.message.upload;
                alert(error);
            },
            complete: function () {
                console.log('complete', arguments);

                var pdfname = arguments[0].response;

                if (document.getElementById('filecontainer')) {
                    document.getElementById('filecontainer').remove();
                };

                document.getElementById('file').value = pdfname;

                var FileContainer = document.getElementById('file-container-createartista');

                var displayContainer = document.createElement('div');
                displayContainer.setAttribute('id', 'filecontainer');
                displayContainer.setAttribute('class', 'uk-inline uk-width-1-1');

                var displayFile = document.createElement('div');
                displayFile.setAttribute('class', 'uk-placeholder uk-text-center');

                var textfont = document.createElement('h6');

                var linkrev = document.createElement('span')
                linkrev.setAttribute('uk-icon', 'file-pdf');

                var link = document.createElement('a');
                link.setAttribute('href', 'artista/artikel/' + pdfname);
                link.setAttribute('target', '_blank');

                var closeContainer = document.createElement('div');
                closeContainer.setAttribute('class', 'uk-position-small uk-position-right');

                var closeButton = document.createElement('a');
                closeButton.setAttribute('class', 'tm-img-remove uk-border-circle');
                closeButton.setAttribute('onClick', 'removeFileArtista()');
                closeButton.setAttribute('uk-icon', 'close');

                var linktext = document.createTextNode(pdfname);

                closeContainer.appendChild(closeButton);
                displayContainer.appendChild(displayFile);
                displayContainer.appendChild(closeContainer);
                displayFile.appendChild(textfont);
                textfont.appendChild(link);
                link.appendChild(linkrev);
                link.appendChild(linktext);
                FileContainer.appendChild(displayContainer);

                document.getElementById('js-upload-fileartista').setAttribute('hidden', '');
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

        function removeFileArtista() {
            $.ajax({
                type: 'post',
                url: 'upload/removefile',
                data: {
                    'file': document.getElementById('file').value
                },
                dataType: 'json',

                error: function() {
                    console.log('error', arguments);
                },

                success: function() {
                    console.log('success', arguments);

                    var pesan = arguments[0][1];

                    document.getElementById('filecontainer').remove();
                    document.getElementById('file').value = '';

                    alert(pesan);

                    document.getElementById('js-upload-fileartista').removeAttribute('hidden', '');
                }
            });
        };
    </script>
    <!-- End Upload File Pdf -->

    <!-- Upload Foto Script -->
    <script>
        var barfoto = document.getElementById('js-upload-createfoto');
        UIkit.upload('#js-upload-fotoartista', {
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

                var filename = arguments[0].response;

                if (document.getElementById('imagecontainer')) {
                    document.getElementById('imagecontainer').remove();
                };

                document.getElementById('foto').value = filename;

                var imgContainer = document.getElementById('image-container-createartista');

                var displayContainer = document.createElement('div');
                displayContainer.setAttribute('id', 'imagecontainer');
                displayContainer.setAttribute('class', 'uk-inline uk-width-1-1');

                var displayImg = document.createElement('div');
                displayImg.setAttribute('class', 'uk-placeholder uk-text-center');
                displayImg.setAttribute('uk-lightbox', '');

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

                var closeContainer = document.createElement('div');
                closeContainer.setAttribute('class', 'uk-position-small uk-position-right');

                var closeButton = document.createElement('a');
                closeButton.setAttribute('class', 'tm-img-remove uk-border-circle');
                closeButton.setAttribute('onClick', 'removeFotoArtista()');
                closeButton.setAttribute('uk-icon', 'close');

                var linktext = document.createTextNode(filename);

                closeContainer.appendChild(closeButton);
                displayContainer.appendChild(displayImg);
                displayContainer.appendChild(closeContainer);
                displayImg.appendChild(linkimg);
                linkimg.appendChild(imagetag);
                imgContainer.appendChild(displayContainer);

                document.getElementById('js-upload-fotoartista').setAttribute('hidden', '');
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

        function removeFotoArtista() {
            $.ajax({
                type: 'post',
                url: 'upload/removefoto',
                data: {
                    'foto': document.getElementById('foto').value
                },
                dataType: 'json',

                error: function() {
                    console.log('error', arguments);
                },

                success: function() {
                    console.log('success', arguments);

                    var pesan = arguments[0][1];

                    document.getElementById('imagecontainer').remove();
                    document.getElementById('foto').value = '';

                    alert(pesan);

                    document.getElementById('js-upload-fotoartista').removeAttribute('hidden', '');
                }
            });
        };
    </script>
<?= $this->endSection() ?>