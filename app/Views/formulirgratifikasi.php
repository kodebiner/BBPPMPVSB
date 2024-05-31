<?= $this->extend('layout') ?>

<?= $this->section('main') ?>

<!-- Breadcrumb Section -->
<section class="uk-section uk-section-xsmall">
    <div class="uk-container uk-container-xlarge">
        <nav aria-label="Breadcrumb">
            <ul class="uk-breadcrumb">
                <li><a href="/">Beranda</a></li>
                <li><span><?= $cattitle ?></span></li>
            </ul>
        </nav>

        <hr>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Form Pengaduan Section -->
<section class="uk-section uk-section-default">
    <div class="uk-container uk-container-xlarge">
        <div class="uk-margin-bottom">
            <div class="uk-text-center">
                <h3>Formulir Lapor Gratifikasi</h3>
            </div>
        </div>

        <?= view('Views/_message_block') ?>
        
        <form class="uk-form-stacked" role="form" action="pengaduan/laporgratifikasi" method="post">
            <?php
            if (!empty($fieldgrats)) {
                foreach ($fieldgrats as $grat) {
                    if ($grat['wajib'] == '1') {
                        $required = 'required';
                    } else {
                        $required = '';
                    }
                    if ($grat['type'] == '1') { ?>
                        <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="<?= $grat['alias'] ?>"><?= $grat['name'] ?></label>
                        <div class="uk-margin">
                            <div class="uk-form-controls">
                                <input class="uk-input uk-box-shadow-small uk-border-rounded" id="<?= $grat['alias'] ?>" name="<?= $grat['alias'] ?>" type="text" placeholder="Masukkan <?= $grat['name'] ?>..." <?= $required ?>>
                            </div>
                        </div>
                    <?php }
                    elseif ($grat['type'] == '2') { ?>
                        <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="<?= $grat['alias'] ?>"><?= $grat['name'] ?></label>
                        <div class="uk-margin">
                            <div class="uk-form-controls">
                                <textarea class="uk-textarea uk-box-shadow-small uk-border-rounded" id="file-picker-<?= $grat['alias'] ?>" rows="5" name="<?= $grat['alias'] ?>" placeholder="Masukkan <?= $grat['name'] ?>..." aria-label="Textarea"></textarea>
                            </div>
                        </div>
                
                        <script>
                            tinymce.init({
                                selector:                   'textarea#file-picker-<?= $grat['alias'] ?>',
                                plugins:                    ' link code table lists wordcount image searchreplace fullscreen autolink help',
                                toolbar:                    ['undo redo | styles bold italic underline strikethrough subscript superscript | backcolor forecolor | table link image | alignleft aligncenter alignright alignjustify | numlist bullist | lineheight | indent outdent | searchreplace fullscreen help code'],
                                link_default_target:        '_blank',
                                link_default_protocol:      'https',
                                image_title:                false,
                                automatic_uploads:          true,
                                file_picker_types:          'image',
                                file_picker_callback:       (cb, value, meta) => {
                                                                const input = document.createElement('input');
                                                                input.setAttribute('type', 'file');
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
                    <?php }
                    elseif ($grat['type'] == '3') { ?>
                        <h5 class="uk-margin-small-top">Upload File <?= $grat['name'] ?></h5>
                        <div class="uk-margin" id="file-container-create-<?= $grat['alias'] ?>">
                            <div id="file-container-<?= $grat['alias'] ?>" class="uk-form-controls">
                                <div id="js-upload-file-<?= $grat['alias'] ?>" class="js-upload-file-<?= $grat['alias'] ?> uk-placeholder uk-text-center">
                                    <span uk-icon="icon: cloud-upload"></span>
                                    <span class="uk-text-middle">Tarik dan lepas file disini atau</span>
                                    <div uk-form-custom>
                                        <input type="file" multiple>
                                        <span class="uk-link uk-preserve-color">pilih satu</span>
                                    </div>
                                </div>
                                <progress id="js-upload-create-<?= $grat['alias'] ?>" class="uk-progress" value="0" max="100" hidden></progress>
                            </div>
                            <div id="list-file-<?= $grat['alias'] ?>"></div>
                        </div>

                        <script>
                            var barpdf = document.getElementById('js-upload-create-<?= $grat['alias'] ?>');
                            var createCount = 0;
                            UIkit.upload('.js-upload-file-<?= $grat['alias'] ?>', {
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

                                    createCount++;
                                    
                                    var pdfname = arguments[0].response;

                                    for (i in pdfname) {

                                        var FileContainer = document.getElementById('list-file-<?= $grat['alias'] ?>');

                                        var displayContainer = document.createElement('div');
                                        displayContainer.setAttribute('id', 'filecontainer-<?= $grat['alias'] ?>'+createCount);
                                        displayContainer.setAttribute('class', 'uk-inline uk-width-1-1');

                                        var displayFile = document.createElement('div');
                                        displayFile.setAttribute('class', 'uk-placeholder uk-text-center');

                                        var textfont = document.createElement('h6');

                                        var linkrev = document.createElement('span')
                                        linkrev.setAttribute('uk-icon', 'file-pdf');

                                        var link = document.createElement('a');
                                        link.setAttribute('href', 'gratifikasi/' + pdfname);
                                        link.setAttribute('target', '_blank');

                                        var inputhidden = document.createElement('input');
                                        inputhidden.setAttribute('hidden', '');
                                        inputhidden.setAttribute('id', '<?= $grat['alias'] ?>-'+createCount);
                                        inputhidden.setAttribute('name', '<?= $grat['alias'] ?>['+createCount+']');
                                        inputhidden.setAttribute('value', pdfname);

                                        var closeContainer = document.createElement('div');
                                        closeContainer.setAttribute('class', 'uk-position-small uk-position-right');

                                        var closeButton = document.createElement('a');
                                        closeButton.setAttribute('class', 'tm-img-remove uk-border-circle');
                                        closeButton.setAttribute('onClick', 'removeFile<?= $grat['id'] ?>('+createCount+')');
                                        closeButton.setAttribute('uk-icon', 'close');

                                        var linktext = document.createTextNode(pdfname);

                                        closeContainer.appendChild(closeButton);
                                        displayContainer.appendChild(inputhidden);
                                        displayContainer.appendChild(displayFile);
                                        displayContainer.appendChild(closeContainer);
                                        displayFile.appendChild(textfont);
                                        textfont.appendChild(link);
                                        link.appendChild(linkrev);
                                        link.appendChild(linktext);
                                    }
                                    FileContainer.appendChild(displayContainer);
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

                            function removeFile<?= $grat['id'] ?>(f) {
                                $.ajax({
                                    type: 'post',
                                    url: 'upload/removefile',
                                    data: {
                                        'file': document.getElementById('<?= $grat['alias'] ?>-'+f).value
                                    },
                                    dataType: 'json',

                                    error: function() {
                                        console.log('error', arguments);
                                    },

                                    success: function() {
                                        console.log('success', arguments);

                                        var pesan = arguments[0][1];

                                        document.getElementById('filecontainer-<?= $grat['alias'] ?>'+f).remove();

                                        alert(pesan);
                                    }
                                });
                            };
                        </script>
                    <?php }
                } ?>

                <div class="uk-margin">
                    <div class="uk-card uk-card-default uk-card-body">
                        <div class="uk-text-bold uk-text-justify">
                            Laporan gratifikasi ini saya sampaikan dengan sebenar-benarnya. Apabila ada yang sengaja tidak saya laporkan atau saya laporkan kepada BBPPMPV Seni dan Budaya secara tidak benar, maka saya bersedia mempertanggungjawabkan secara hukum sesuai dengan peraturan perundang-undangan yang berlaku dan saya bersedia memberikan keterangan lebih lanjut.
                        </div>
                    </div>
                </div>

                <hr>

                <div class="uk-margin uk-text-right">
                    <button type="submit" class="uk-button uk-button-primary">Simpan</button>
                </div>
            <?php
            }
            ?>
        </form>
    </div>
</section>
<!-- Form Pengaduan Section End -->

<?= $this->endSection() ?>