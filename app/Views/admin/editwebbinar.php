<?= $this->extend('dashboard') ?>
<?= $this->section('extraScript') ?>
    <link rel="stylesheet" href="css/select2.min.css"/>
    <script src="js/select2.min.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right uk-light" style="background-color:  rgba(60, 105, 151, .8);">
        <div class="uk-child-width-1-2" uk-grid>
            <div>
                <h3 class="uk-card-title">Ubah Webinar</h3>
            </div>
            <div class="uk-text-right">
                <a class="uk-icon-button uk-button-primary" href="#preview" uk-icon="eye" uk-toggle></a>
            </div>
        </div>
    </div>

    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <?= view('Views/Auth/_message_block') ?>
        <form action="save/webbinar/<?=$news['id']?>" method="post">
            <div class="uk-card-body">

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Status Webinar</label>
            <label class="switch uk-margin-small-left">
                <?php if ($news['status'] === "1"){?>
                    <input id="status" name="status" type="checkbox" checked>
                <?php }else{ ?>
                    <input id="status" name="status" type="checkbox">
                <?php } ?>
                <span class="slider round"></span>
            </label>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Judul</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <input class="uk-input uk-box-shadow-small uk-border-rounded" id="title" name="judul" value="<?=$news['title']?>" type="text" placeholder="Masukkan Judul..." onchange="preview()">
                </div>
            </div>
            
            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Ringkasan</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <textarea class="uk-textarea uk-box-shadow-small uk-border-rounded" id="ringkasan" rows="5" name="ringkasan" placeholder="Masukkan Ringkasan..." aria-label="Textarea" onchange="preview()"><?=$news['description']?></textarea>
                </div>
            </div>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Pendahuluan</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <textarea class="uk-textarea uk-box-shadow-small uk-border-rounded" id="pendahuluan" rows="5" name="pendahuluan" placeholder="Masukkan Pendahuluan..." aria-label="Textarea" onchange="preview()"><?=$news['introtext']?></textarea>
                </div>
            </div>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold">Isi</label>
            <div class="uk-margin">
                <textarea name="isi" id="file-picker" placeholder="Masukkan Isi.." onchange="preview()">
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
                    <input id="foto" name="foto" hidden value="<?=$news['images']?>" onchange="preview()" />
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

            <!-- Tags -->
            <div class="uk-margin">
                <label class="uk-form-label" for="findtags">Cari Tags yang sudah tersedia atau tambah Tags baru</label>
                <select id="tags-search" name="tags[]" class="js-example-data-array" multiple="multiple" style="width:100%;"></select>
            </div>

            <script>
                var data = [
                    <?php
                    foreach ($tags as $tag) {
                        echo '{';
                        echo 'id: '.$tag['id'].',';
                        echo 'text: "'.$tag['title'].'",';
                        foreach ($articletags as $articletag) {
                            if ($articletag['tagsid'] === $tag['id']) {
                                echo 'selected: true,';
                            }
                        }
                        echo '},';
                    }
                    ?>
                ];
                $("#tags-search").select2({
                    placeholder: 'Cari...',
                    data: data,
                    minimumInputLength: 3,
                    tags: true,
                });
                $('#tags-search').find(':selected').data('selected');
            </script>
            <!-- Tags End -->

            <!-- Upload Foto Script -->
            <script>

                var barfoto = document.getElementById('js-upload-createfoto');

                UIkit.upload('#js-upload-foto', {

                    url: 'upload/fotoberita',
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

                        var photo           = 'images/'+filename;

                        $('#previewimage').attr('src', photo);
                        $('#previewimage').attr('width', '300');
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

                            var photo           = '<?= $news['images'] ?>';

                            $('#previewimage').attr('src', photo);
                            $('#previewimage').attr('width', '300');
                        }
                    });
                };
            </script>
            <!-- End Upload Foto Sampul Script -->

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
                <h2 class="uk-modal-title">Preview Edit Webinar</h2>
                <button class="uk-modal-close-default" type="button" uk-close></button>
            </div>

            <div class="uk-modal-body">
                <section class="uk-section-default uk-section uk-section-xsmall uk-padding-remove-bottom">
                    <div class="uk-container">
                        <div class="uk-container uk-container-xsmall">
                            <div class="tm-grid-expand uk-child-width-1-1" uk-grid>
                                <div>
                                    <h3 class="uk-margin uk-text-center" id="previewtitle"><?=$news['title']?></h3>
                                </div>
                                <div class="uk-panel uk-text-lead uk-margin-large uk-text-center">
                                    <div><p id="previewintrotext" class="uk-text-justify"><?=$news['introtext']?></p></div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-grid-match uk-grid-divider uk-child-width-auto uk-flex-center uk-text-meta uk-text-center" uk-grid uk-height-match="target: > .match-content">
                                        <div class="match-content uk-flex-middle">
                                            <div id="previewdate"></div>
                                        </div>
                                        <div class="match-content uk-flex-middle">
                                            <div id="previewuser"></div>
                                        </div>
                                        <div class="match-content uk-flex-middle">
                                            <div>Dilihat Sebanyak : 1</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-text-center"><div>Bagikan :</div></div>
                                <div class="uk-margin uk-margin-small-top">
                                    <div class="uk-grid-match uk-child-width-auto uk-flex-center uk-text-meta uk-text-center uk-grid-small" uk-grid uk-height-match="target: > .match-media">
                                        <div>
                                            <a class="uk-icon-button" uk-icon="facebook" href="https://www.facebook.com/sharer/sharer.php?u=&amp;src=sdkpreparse" target="_blank"></a>
                                        </div>
                                        <div>
                                            <a class="uk-icon-button" uk-icon="whatsapp" href="https://wa.me/?text=" target="_blank"></a>
                                        </div>
                                        <div>
                                            <a class="uk-icon-button" uk-icon="telegram" href="https://telegram.me/share/url?url=&text=" target="_blank"></a>
                                        </div>
                                        <div>
                                            <a class="uk-icon-button" uk-icon="x" href="http://twitter.com/share?text=&url=" target="_blank"></a>
                                        </div>
                                        <div>
                                            <a class="uk-icon-button" uk-icon="linkedin" href="https://www.linkedin.com/feed/?shareActive=true&text=" target="_blank"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-margin-small">
                                <img id="previewimage" src="<?=$news['images']?>" class="uk-width-1-1" />
                            </div>
                        </div>

                        <div class="uk-container uk-container-xsmall">
                            <div class="uk-panel uk-margin" id="previewfulltext"><?=$news['fulltext']?></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        var username        = "<?= $user['username'] ?>";
        document.getElementById("previewuser").innerHTML = username;

        var publishthatdate = new Date();
        var publishyear     = publishthatdate.getFullYear();
        var publishmonth    = publishthatdate.getMonth();
        var publishdate     = publishthatdate.getDate();
        var publishday      = publishthatdate.getDay();

        switch(publishday) {
            case 0: publishday     = "Minggu"; break;
            case 1: publishday     = "Senin"; break;
            case 2: publishday     = "Selasa"; break;
            case 3: publishday     = "Rabu"; break;
            case 4: publishday     = "Kamis"; break;
            case 5: publishday     = "Jum'at"; break;
            case 6: publishday     = "Sabtu"; break;
        }
        switch(publishmonth) {
            case 0: publishmonth   = "Januari"; break;
            case 1: publishmonth   = "Februari"; break;
            case 2: publishmonth   = "Maret"; break;
            case 3: publishmonth   = "April"; break;
            case 4: publishmonth   = "Mei"; break;
            case 5: publishmonth   = "Juni"; break;
            case 6: publishmonth   = "Juli"; break;
            case 7: publishmonth   = "Agustus"; break;
            case 8: publishmonth   = "September"; break;
            case 9: publishmonth   = "Oktober"; break;
            case 10: publishmonth  = "November"; break;
            case 11: publishmonth  = "Desember"; break;
        }
        var publishfulldate         = publishday + ", " + publishdate + " " + publishmonth + " " + publishyear;
        document.getElementById("previewdate").innerHTML = publishfulldate;

        function preview(inst) {
            var title           = $('#title').val();
            var description     = $('#ringkasan').val();
            var introtext       = $('#pendahuluan').val();
            var fulltext        = $('#file-picker').val();

            $('#previewtitle').html(title);
            $('#previewintrotext').html(introtext);
            $('#previewfulltext').html(tinyMCE.activeEditor.getContent());
        };
    </script>
    <!-- Preview Modal End -->
<?= $this->endSection() ?>