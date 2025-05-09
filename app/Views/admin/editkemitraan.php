<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right uk-light" style="background-color:  rgba(60, 105, 151, .8);">
        <div class="uk-child-width-1-2" uk-grid>
            <div>
                <h3 class="uk-card-title">Ubah Menu <?=$kemitraans['title']?></h3>
            </div>
            <div class="uk-text-right">
                <a class="uk-icon-button uk-button-primary" href="#preview" uk-icon="eye" uk-toggle></a>
            </div>
        </div>
    </div>

    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <?= view('Views/Auth/_message_block') ?>
        <form action="save/kemitraan/<?=$kemitraans['id']?>" method="post">
            <div class="uk-card-body">

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Judul</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <input class="uk-input uk-box-shadow-small uk-border-rounded" id="title" name="title" type="text" value="<?=$kemitraans['title']?>" placeholder="Masukkan Judul..." onchange="preview()">
                </div>
            </div>

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold">Konten</label>
            <div class="uk-margin">
                <textarea name="content" id="file-picker" placeholder="Masukkan Konten.." onchange="preview()">
                    <?=$kemitraans['content']?>
                </textarea>
            </div>

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
                <h2 class="uk-modal-title">Preview Edit Menu <?=$kemitraans['title']?></h2>
                <button class="uk-modal-close-default" type="button" uk-close></button>
            </div>

            <div class="uk-modal-body">
                <section class="uk-section-default uk-section">
                    <div class="uk-container uk-container-xlarge">
                        <h2 class="uk-text-center" id="previewtitle"><?=$kemitraans['title']?></h2>
                        <div id="previewcontent"><?=$kemitraans['content']?></div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        function preview(inst) {
            var title = $('#title').val();
            var content = $('#file-picker').val();
            $('#previewtitle').html(title);
            $('#previewcontent').html(tinyMCE.activeEditor.getContent());
        };
    </script>
    <!-- Preview Modal End -->
<?= $this->endSection() ?>