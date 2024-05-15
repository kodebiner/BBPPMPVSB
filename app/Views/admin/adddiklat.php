<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right uk-light" style="background-color:  rgba(60, 105, 151, .8);">
        <div class="uk-child-width-1-2" uk-grid>
            <div>
                <h3 class="uk-card-title">Tambah Diklat</h3>
            </div>
            <div class="uk-text-right">
                <a class="uk-icon-button uk-button-primary" href="#preview" uk-icon="eye" uk-toggle></a>
            </div>
        </div>
    </div>

    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <?= view('Views/Auth/_message_block') ?>
        <form action="add/diklat" method="post">
            <div class="uk-card-body">
                <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Judul</label>
                <div class="uk-margin">
                    <div class="uk-form-controls">
                        <input class="uk-input uk-box-shadow-small uk-border-rounded" id="title" name="judul" type="text" placeholder="Masukkan Judul..." onchange="preview()">
                    </div>
                </div>

                <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold">Deskripsi</label>
                <div class="uk-margin">
                    <textarea name="description" id="file-picker" placeholder="Masukkan Deskrispi.." onchange="preview()"></textarea>
                </div>

                <!-- Upload Foto -->
                <h5 class="uk-margin-small-top">Upload Foto</h5>
                <div class="uk-margin" id="image-container-create">
                    <div id="image-container" class="uk-form-controls">
                        <progress id="js-upload-createfoto" class="uk-progress" value="0" max="100" hidden></progress>
                        <div id="js-upload-foto" class="js-upload uk-placeholder uk-text-center">
                            <span uk-icon="icon: cloud-upload"></span>
                            <span class="uk-text-middle">Tarik dan lepas file disini atau</span>
                            <div uk-form-custom>
                                <input type="file" multiple>
                                <span class="uk-link uk-preserve-color">pilih di sini</span>
                            </div>
                        </div>
                    </div>
                    <div class="uk-text-meta">Foto wajib diunggah dan wajib klik salah satu foto sebagai thumbnail</div>
                    <div id="list-foto"></div>
                    <input id="thumbnail" name="thumbnail" required style="opacity:0; width:0;"/>
                </div>
                <!-- End Upload Foto -->

                <script>
                    // Upload Foto Script
                    var barfoto = document.getElementById('js-upload-createfoto');
                    var createCount = 0;

                    UIkit.upload('#js-upload-foto', {

                        url: 'upload/fotodiklat',
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

                            createCount++;

                            var filenames = arguments[0].response;

                            for (i in filenames) {
                                var imgContainer = document.getElementById('list-foto');

                                var displayContainer = document.createElement('div');
                                displayContainer.setAttribute('id', 'display-container-create-'+createCount);
                                displayContainer.setAttribute('class', 'thumb-selector uk-inline uk-padding-small');

                                var displayImg = document.createElement('img');
                                displayImg.setAttribute('src', 'images/'+filenames);
                                displayImg.setAttribute('width', '300');
                                displayImg.setAttribute('height', '300');

                                var chooseThumb = document.createElement('a');
                                chooseThumb.setAttribute('onClick', 'choosenThumb('+createCount+')');

                                var inputhidden = document.createElement('input');
                                inputhidden.setAttribute('hidden', '');
                                inputhidden.setAttribute('id', 'foto-'+createCount);
                                inputhidden.setAttribute('name', 'foto['+createCount+']');
                                inputhidden.setAttribute('value', filenames);

                                var closeContainer = document.createElement('div');
                                closeContainer.setAttribute('class', 'uk-position-small uk-position-top-right');

                                var closeButton = document.createElement('a');
                                closeButton.setAttribute('class', 'uk-icon-button uk-button-danger uk-light');
                                closeButton.setAttribute('onClick', 'removeFoto('+createCount+')');
                                closeButton.setAttribute('uk-icon', 'close');

                                chooseThumb.appendChild(displayImg);
                                closeContainer.appendChild(closeButton);
                                displayContainer.appendChild(inputhidden);
                                displayContainer.appendChild(chooseThumb);
                                displayContainer.appendChild(closeContainer);

                                var photo           = 'images/'+filenames;
                            }
                            imgContainer.appendChild(displayContainer);
                            $( '<li id="previewimage-'+createCount+'"><a class="uk-transition-toggle uk-link-toggle" href="'+photo+'" data-caption="'+photo+'"><div><img src="'+photo+'" width="1800" height="1200" alt="" /></div></a></li>' ).appendTo( '#previewfoto' );
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
                    // Upload Foto Script End

                    // Remove Foto Script
                    function removeFoto(f) {
                        if ($('#thumbnail').val() === $('#foto-'+f).val()) {
                            $('#thumbnail').val('');
                        };

                        $.ajax({
                            type: 'post',
                            url: 'upload/removefotoberita',
                            data: {
                                'foto': document.getElementById('foto-'+f).value
                            },
                            dataType: 'json',

                            error: function() {
                                console.log('error', arguments);
                            },

                            success: function() {
                                console.log('success', arguments);

                                var pesan = arguments[0][1];

                                document.getElementById('display-container-create-'+f).remove();
                                document.getElementById('previewimage-'+f).remove();

                                alert(pesan);
                            }
                        });
                    };
                    // Remove Foto Script End

                    // Choose Thumbnail Script
                    function choosenThumb(d) {
                        $('.thumb-selector').removeClass('uk-background-primary');
                        $('#display-container-create-'+d).addClass('uk-background-primary');
                        var thumbnail = $('#foto-'+d).val();
                        $('#thumbnail').val(thumbnail);
                    };
                    // Choose Thumbnail Script End
                </script>

                <script>
                    tinymce.init({
                        selector:                   'textarea#file-picker',
                        plugins:                    ' link code table lists wordcount image searchreplace fullscreen autolink help',
                        toolbar:                    ['undo redo | styles bold italic underline strikethrough subscript superscript | backcolor forecolor | table link image | alignleft aligncenter alignright alignjustify | numlist bullist | lineheight | indent outdent | searchreplace fullscreen help code'],
                        link_default_target:        '_blank',
                        link_default_protocol:      'https',
                        image_title:                false,
                        automatic_uploads:          true,
                        file_picker_types:          'image',
                        setup:                      (ed) => {
                                                        ed.on('change', (e) => {
                                                            preview();
                                                        })
                                                    },
                        file_picker_callback:       (cb, value, meta) => {
                                                        const input = document.createElement('input');
                                                        input.setAttribute('type', 'file');
                                                        input.setAttribute('accept', 'images/*');

                                                        input.addEventListener('change', (e) => {
                                                        const file = e.target.files[0];

                                                        const reader = new FileReader();
                                                        reader.addEventListener('load', () => {
                                                            /*
                                                            Note: Now we need to register the blob in TinyMCEs image blob
                                                            registry. In the next release this part hopefully won't be
                                                            necessary, as we are looking to handle it internally.
                                                            */
                                                            const id = 'blobid' + (new Date()).getTime();
                                                            const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                                                            const base64 = reader.result.split(',')[1];
                                                            const blobInfo = blobCache.create(id, file, base64);
                                                            blobCache.add(blobInfo);

                                                            /* call the callback and populate the Title field with the file name */
                                                            cb(blobInfo.blobUri(), { title: file.name });
                                                        });
                                                        reader.readAsDataURL(file);
                                                        });

                                                        input.click();
                                                    },

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

    <!-- Preview Modal -->
    <div class="uk-modal-full" id="preview" uk-modal>
        <div class="uk-modal-dialog" uk-height-viewport>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title">Preview Tambah Diklat</h2>
                <button class="uk-modal-close-default" type="button" uk-close></button>
            </div>

            <div class="uk-modal-body">
                <section class="uk-section-default uk-section uk-section-xsmall uk-padding-remove-bottom">
                    <div class="uk-margin">
                        <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 5000; pause-on-hover: false;" uk-height-match="target: > li > a > .uk-inline">
                            <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m" uk-grid uk-lightbox="animation: slide" id="previewfoto"></ul>
                            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
                        </div>
                    </div>
                    <div class="uk-container uk-container-xlarge" id="previewcontent"></div>
                </section>
            </div>
        </div>
    </div>

    <script>
        function preview(inst) {
            var title           = $('#title').val();
            var fulltext        = $('#file-picker').val();

            $('#previewtitle').html(title);
            $('#previewcontent').html(tinyMCE.activeEditor.getContent());
        };
    </script>
    <!-- Preview Modal End -->
<?= $this->endSection() ?>