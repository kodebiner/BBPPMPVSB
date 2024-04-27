<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right uk-light" style="background-color:  rgba(60, 105, 151, .8);;">
        <h3 class="uk-card-title">Ubah Jadwal</h3>
    </div>

    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <?= view('Views/Auth/_message_block') ?>
        <form action="save/jadwal/<?=$news['id']?>" method="post">
            <div class="uk-card-body">

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Judul</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <input class="uk-input uk-box-shadow-small uk-border-rounded" id="form-stacked-text" name="judul" value="<?=$news['title']?>" type="text" placeholder="Masukkan Judul...">
                </div>
            </div>
            
            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Ringkasan</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <textarea class="uk-textarea uk-box-shadow-small uk-border-rounded" rows="5" name="ringkasan" placeholder="Masukkan Ringkasan..." aria-label="Textarea"><?=$news['description']?></textarea>
                </div>
            </div>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Pendahuluan</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <textarea class="uk-textarea uk-box-shadow-small uk-border-rounded" rows="5" name="pendahuluan" placeholder="Masukkan Pendahuluan..." aria-label="Textarea"><?=$news['introtext']?></textarea>
                </div>
            </div>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold">Isi</label>
            <div class="uk-margin">
                <textarea name="isi" id="file-picker" placeholder="Masukkan Isi..">
                    <?=$news['fulltext']?>
                </textarea>
            </div>

            <!-- Upload Foto -->
            <div class="uk-child-width-1-1@m uk-margin" uk-grid>
                <div>
                    <div class="uk-card uk-card-default">
                        <div class="uk-card-media-top uk-text-center">
                            <div uk-lightbox>
                                <a class="uk-inline" id="fileimagecontainer" href="<?=$news['images']?>" data-caption="<?=$news['images']?>">
                                    <img id="fileimage" class="uk-margin-top uk-margin-bottom" src="<?=$news['images']?>" width="300" height="150" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h5 class="uk-margin-small-top">Upload Foto Baru</h5>
            <div class="uk-margin" id="image-container-create">
                <div id="image-container" class="uk-form-controls">
                    <progress id="js-upload-createfoto" class="uk-progress" value="0" max="100" hidden></progress>
                    <input id="foto" name="foto" hidden value="<?=$news['images']?>"/>
                    <div id="js-upload-foto" class="js-upload uk-placeholder uk-text-center">
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

            <!-- Upload Foto Script -->
            <script>

                var barfoto = document.getElementById('js-upload-createfoto');

                UIkit.upload('#js-upload-foto', {

                    url: 'upload/fotojadwal',
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

                        if (document.getElementById('imagecontainer')) {
                            document.getElementById('imagecontainer').remove();
                        };

                        document.getElementById('foto').value = filename;

                        var imgContainer = document.getElementById('image-container-create');

                        var displayContainer = document.createElement('div');
                        displayContainer.setAttribute('id', 'imagecontainer');
                        displayContainer.setAttribute('class', 'uk-inline uk-width-1-1');

                        var displayImg = document.createElement('div');
                        displayImg.setAttribute('class', 'uk-placeholder uk-text-center');
                        displayImg.setAttribute('uk-lightbox', '');

                        var linkimg = document.createElement('a');
                        linkimg.setAttribute('id','imagecontainer');
                        linkimg.setAttribute('class','uk-inline');
                        linkimg.setAttribute('href','images/'+filename);
                        linkimg.setAttribute('data-caption', filename);

                        var imagetag = document.createElement('img');
                        imagetag.setAttribute('id','fileimage');
                        imagetag.setAttribute('class','uk-margin-top uk-margin-bottom');
                        imagetag.setAttribute('src','images/'+filename);
                        imagetag.setAttribute('width','120');
                        imagetag.setAttribute('heigth','180');
                        imagetag.setAttribute('alt', filename);

                        var closeContainer = document.createElement('div');
                        closeContainer.setAttribute('class', 'uk-position-small uk-position-right');

                        var closeButton = document.createElement('a');
                        closeButton.setAttribute('class', 'tm-img-remove uk-border-circle');
                        closeButton.setAttribute('onClick', 'removeFoto()');
                        closeButton.setAttribute('uk-icon', 'close');

                        var linktext = document.createTextNode(filename);

                        closeContainer.appendChild(closeButton);
                        displayContainer.appendChild(displayImg);
                        displayContainer.appendChild(closeContainer);
                        displayImg.appendChild(linkimg);
                        linkimg.appendChild(imagetag);
                        imgContainer.appendChild(displayContainer);

                        document.getElementById('js-upload-foto').setAttribute('hidden', '');
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

                function removeFoto() {
                    $.ajax({
                        type: 'post',
                        url: 'upload/removefotoberita',
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

                            document.getElementById('js-upload-foto').removeAttribute('hidden', '');
                        }
                    });
                };
            </script>
            <!-- End Upload Foto Sampul Script -->

            <script>
                tinymce.init({
                selector: 'textarea#file-picker',
                plugins: ' link ',
                toolbar: ['undo redo | styles bold italic | alignnone aligncenter alignjustify alignleft alignright | indent outdent',
                'link']
                });
            </script>

            </div>
            <div class="uk-card-footer">
                <p uk-margin class="uk-text-right">
                    <button class="uk-button uk-light" style="background-color: rgba(60, 105, 151, .8); color:white;" type="submit">Simpan</button>
                </p>
            </div>
        </form>
    </div>


<?= $this->endSection() ?>