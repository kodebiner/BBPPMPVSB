<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right uk-light" style="background-color:  rgba(60, 105, 151, .8);;">
        <h3 class="uk-card-title">Tambah Webinar</h3>
    </div>

    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <?= view('Views/Auth/_message_block') ?>
        <form action="add/webbinar" method="post">
            <div class="uk-card-body">

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Judul</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <input class="uk-input uk-box-shadow-small uk-border-rounded" id="form-stacked-text" name="judul" type="text" placeholder="Masukkan Judul...">
                </div>
            </div>
            
            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Ringkasan</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <textarea class="uk-textarea uk-box-shadow-small uk-border-rounded" rows="5" name="ringkasan" placeholder="Masukkan Ringkasan..." aria-label="Textarea"></textarea>
                </div>
            </div>
            
            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold">Pendahulan</label>
            <div class="uk-margin">
                <textarea name="pendahuluan" id="file-picker" placeholder="Masukkan Pendahuluan...">
                </textarea>
            </div>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold">Isi</label>
            <div class="uk-margin">
                <textarea name="isi" id="file-picker" placeholder="Masukkan Isi..">
                </textarea>
            </div>

            <!-- Upload Foto -->
            <h5 class="uk-margin-small-top">Upload Foto</h5>
            <div class="uk-margin" id="image-container-create">
                <div id="image-container" class="uk-form-controls">
                    <progress id="js-upload-createfoto" class="uk-progress" value="0" max="100" hidden></progress>
                    <input id="foto" name="foto" hidden />
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

            <!-- Upload Foto Sampul Script -->
            <script>
                var barfoto = document.getElementById('js-upload-createfoto');

                UIkit.upload('#js-upload-foto', {

                    url: 'upload/fotoseminar',
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
                    plugins: 'image code',
                    toolbar: 'undo redo | link image | code',
                    /* enable title field in the Image dialog*/
                    image_title: true,
                    /* enable automatic uploads of images represented by blob or data URIs*/
                    automatic_uploads: true,
                    /*
                        URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
                        images_upload_url: 'postAcceptor.php',
                        here we add custom filepicker only to Image dialog
                    */
                    file_picker_types: 'image',
                    /* and here's our custom image picker*/
                    file_picker_callback: function (cb, value, meta) {
                        var input = document.createElement('input');
                        input.setAttribute('type', 'file');
                        input.setAttribute('accept', 'image/*');

                        /*
                        Note: In modern browsers input[type="file"] is functional without
                        even adding it to the DOM, but that might not be the case in some older
                        or quirky browsers like IE, so you might want to add it to the DOM
                        just in case, and visually hide it. And do not forget do remove it
                        once you do not need it anymore.
                        */

                        input.onchange = function () {
                        var file = this.files[0];

                        var reader = new FileReader();
                        reader.onload = function () {
                            /*
                            Note: Now we need to register the blob in TinyMCEs image blob
                            registry. In the next release this part hopefully won't be
                            necessary, as we are looking to handle it internally.
                            */
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            /* call the callback and populate the Title field with the file name */
                            cb(blobInfo.blobUri(), { title: file.name });
                        };
                        reader.readAsDataURL(file);
                        };

                        input.click();
                    },
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
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