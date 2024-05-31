<?= $this->extend('dashboard') ?>
<?= $this->section('extraScript') ?>
    <link rel="stylesheet" href="css/select2.min.css"/>
    <script src="js/select2.min.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right uk-light" style="background-color:  rgba(60, 105, 151, .8);">
        <div class="uk-child-width-1-2" uk-grid>
            <div>
                <h3 class="uk-card-title">Ubah Diklat</h3>
            </div>
            <div class="uk-text-right">
                <a class="uk-icon-button uk-button-primary" href="#preview" uk-icon="eye" uk-toggle></a>
            </div>
        </div>
    </div>

    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <?= view('Views/Auth/_message_block') ?>
        <form action="save/diklat/<?=$news['id']?>" method="post">
            <div class="uk-card-body">

                <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Status Diklat</label>
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

                <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold">Deskripsi</label>
                <div class="uk-margin">
                    <textarea name="description" id="file-picker" placeholder="Masukkan Deskripsi.." onchange="preview()">
                        <?=$news['text']?>
                    </textarea>
                </div>

                <!-- Upload Foto -->
                <h5 class="uk-margin-small-top">Upload Foto Baru</h5>
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
                </div>

                <!-- Input Thumbnail -->
                <div class="uk-text-meta">Foto wajib diunggah dan wajib klik salah satu foto sebagai thumbnail</div>
                <input id="thumbnail" name="thumbnail" value="<?= $news['images'] ?>" required style="opacity:0; width:0;"/>
                <!-- Input Thumbnail End -->

                <div class="uk-child-width-1-1@m uk-margin" uk-grid>
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-media-top uk-text-center">
                                <div uk-grid class="uk-child-width-1-4@m uk-child-width-1-2 uk-flex-middle" id="list-foto">
                                    <?php foreach ($photos as $foto) { ?>
                                        <?php
                                        if ($news['images'] === $foto['file']) {
                                            $highlight = 'uk-background-primary';
                                        } else {
                                            $highlight = '';
                                        }
                                        ?>
                                        <div id="container-<?= $foto['id'] ?>">
                                            <div class="thumb-selector uk-inline uk-padding-small <?=$highlight?>" id="display-container-<?= $foto['id'] ?>">
                                                <input id="foto-<?= $foto['id'] ?>" name="foto-<?= $foto['id'] ?>" value="<?= $foto['file'] ?>" hidden />
                                                <a id="fileimagecontainer" onclick="choosenExistThumb(<?= $foto['id'] ?>)">
                                                    <img id="fileimage" src="<?=$foto['file']?>" width="300" height="300" alt="">
                                                </a>
                                                <div class="uk-position-small uk-position-top-right">
                                                    <a class="uk-icon-button uk-button-danger uk-light uk-icon" onclick="removeFoto(<?= $foto['id'] ?>)" uk-icon="close"></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
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

                <script>
                    // Upload Photo Script
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
                            var imgContainer = document.getElementById('list-foto');

                            for (i in filenames) {
                                var newcontainer    = document.createElement('div');
                                newcontainer.setAttribute('id', 'container-create-'+createCount);

                                var displayContainer = document.createElement('div');
                                displayContainer.setAttribute('class', 'thumb-selector uk-inline uk-padding-small');
                                displayContainer.setAttribute('id', 'display-container-create-'+createCount);

                                var displayImg = document.createElement('img');
                                displayImg.setAttribute('src', 'images/'+filenames);
                                displayImg.setAttribute('width', '300');
                                displayImg.setAttribute('height', '300');

                                var chooseThumb = document.createElement('a');
                                chooseThumb.setAttribute('onClick', 'choosenThumb('+createCount+')');

                                var inputhidden = document.createElement('input');
                                inputhidden.setAttribute('hidden', '');
                                inputhidden.setAttribute('id', 'foto-create-'+createCount);
                                inputhidden.setAttribute('name', 'foto-create['+createCount+']');
                                inputhidden.setAttribute('value', 'images/'+filenames);

                                var closeContainer = document.createElement('div');
                                closeContainer.setAttribute('class', 'uk-position-small uk-position-top-right');

                                var closeButton = document.createElement('a');
                                closeButton.setAttribute('class', 'uk-icon-button uk-button-danger uk-light');
                                closeButton.setAttribute('onClick', 'removeFotoCreate('+createCount+')');
                                closeButton.setAttribute('uk-icon', 'close');

                                chooseThumb.appendChild(displayImg);
                                closeContainer.appendChild(closeButton);
                                displayContainer.appendChild(inputhidden);
                                displayContainer.appendChild(chooseThumb);
                                displayContainer.appendChild(closeContainer);
                                newcontainer.appendChild(displayContainer);

                                var photo           = 'images/'+filenames;
                            }
                            imgContainer.appendChild(newcontainer);
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
                    // Upload Photo Script End

                    // Remove Created Photo Script
                    function removeFotoCreate(f) {
                        if ($('#thumbnail').val() === $('#foto-create-'+f).val()) {
                            $('#thumbnail').val('');
                        };

                        $.ajax({
                            type: 'post',
                            url: 'upload/removefotodiklat',
                            data: {
                                'foto': document.getElementById('foto-create-'+f).value
                            },
                            dataType: 'json',

                            error: function() {
                                console.log('error', arguments);
                            },

                            success: function() {
                                console.log('success', arguments);

                                var pesan = arguments[0][1];

                                document.getElementById('container-create-'+f).remove();
                                document.getElementById('previewimage-'+f).remove();

                                alert(pesan);
                            }
                        });
                    };
                    // Remove Created Photo Script End

                    // Remove Photo Exist
                    function removeFoto(id) {
                        if ('<?= $news['images'] ?>' == $('#foto-'+id).val()) {
                            $.ajax({
                                type:   'post',
                                url:    'upload/clearthumb',
                                data:   {
                                    'thumb':    document.getElementById('foto-'+id).value
                                },
                                dataType: 'json',

                                error: function() {
                                    console.log('error', arguments);
                                },

                                success: function() {
                                    console.log('success', arguments);

                                    var pesan = arguments[0][1];

                                    alert(pesan);
                                }
                            });
                        }

                        if ($('#thumbnail').val() === $('#foto-'+id).val()) {
                            $('#thumbnail').val('');
                        };

                        $.ajax({
                            type: 'post',
                            url: 'upload/removefotodiklatexist',
                            data: {
                                'foto': document.getElementById('foto-'+id).value
                            },
                            dataType: 'json',

                            error: function() {
                                console.log('error', arguments);
                            },

                            success: function() {
                                console.log('success', arguments);

                                var pesan = arguments[0][1];

                                document.getElementById('container-'+id).remove();
                                document.getElementById('previewimage-'+id).remove();

                                alert(pesan);
                            }
                        });
                    };
                    // Remove Photo Script End

                    // Choose Thumbnail Script
                    // Choose Uploaded Thumbnail
                    function choosenThumb(d) {
                        $('.thumb-selector').removeClass('uk-background-primary');
                        $('#display-container-create-'+d).addClass('uk-background-primary');
                        var thumbnail = $('#foto-create-'+d).val();
                        $('#thumbnail').val(thumbnail);
                    };
                    // Chooose Uploaded Thumbnail End

                    // Choose Exist Thumbnail
                    function choosenExistThumb(d) {
                        $('.thumb-selector').removeClass('uk-background-primary');
                        $('#display-container-'+d).addClass('uk-background-primary');
                        var thumbnail = $('#foto-'+d).val();
                        $('#thumbnail').val(thumbnail);
                    };
                    // Choose Exist Thumbnail End
                    // Choose Thumbnail Script End

                    // TinyMCE
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
                    // TinyMCE End
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

    <!-- Preview Modal -->
    <div class="uk-modal-full" id="preview" uk-modal>
        <div class="uk-modal-dialog" uk-height-viewport>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title">Preview Ubah Diklat</h2>
                <button class="uk-modal-close-default" type="button" uk-close></button>
            </div>

            <div class="uk-modal-body">
                <section class="uk-section-default uk-section uk-section-xsmall uk-padding-remove-bottom">
                    <div class="uk-margin">
                        <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 5000; pause-on-hover: false;" uk-height-match="target: > li > a > .uk-inline">
                            <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m" uk-grid uk-lightbox="animation: slide" id="previewfoto">
                                <?php
                                foreach ($photos as $photo) {
                                ?>
                                <li>
                                    <a class="uk-transition-toggle uk-link-toggle" href="<?= $photo['file'] ?>" data-caption="<?= $photo['file'] ?>">
                                        <div>
                                            <img src="<?= $photo['file'] ?>" width="1800" height="1200" alt="">
                                        </div>
                                    </a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next"></a>
                        </div>
                    </div>
                    <div class="uk-container uk-container-xlarge" id="previewcontent"><?=$news['text']?></div>
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