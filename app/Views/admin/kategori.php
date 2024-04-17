<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>
    <div class="uk-child-width-expand@s uk-margin-large-right" uk-grid>
        <div class="uk-grid-item-match">
            <div>
                <h3 class="uk-margin">Kelola Ketegori</h3>
            </div>
        </div>
        <div class="uk-text-right">
            <a class="uk-button uk-button-primary uk-border-rounded" href="#modal-add" uk-toggle><span uk-icon="icon: plus; ratio:0.8"></span>&nbsp;Kategori</a>
        </div>
    </div>
    <!-- <hr class="uk-divider-icon"> -->
    <div class="uk-section uk-padding-remove-top uk-margin-right uk-overflow-auto">
        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>File</th>
                    <th>Foto</th>
                    <th class="uk-text-center">Ubah</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td></td>
                        <td>
                            <div uk-lightbox>
                                <a href="images/artista/"><img class="uk-border-circle" width="50" height="50" src="images/artista/" alt="<?=$art['photo']?>"></a>
                            </div>
                        </td>
                        <td class="uk-text-center"><a class="uk-button uk-button-primary uk-border-rounded" href="#modal-edit" uk-toggle><span uk-icon="icon: file-edit;"></span></a></td>
                    </tr>
            </tbody>
        </table>
    </div>

    <div id="modal-add" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title">Tambah Data</h2>
            </div>
            <div class="uk-modal-body">
                <div class="uk-margin-top">
                    <textarea id="file-add">
                        Welcome to TinyMCE!
                    </textarea>
                </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="button">Save</button>
            </div>
        </div>
    </div>

    <!-- modal add script tinymce -->
    <script>
        tinymce.init({
        selector: 'textarea#file-add',
        plugins: 'image code',
        toolbar: 'undo redo | link image | code',
        image_title: true,
        automatic_uploads: true,
        file_picker_types: 'image',
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.onchange = function () {
            var file = this.files[0];

            var reader = new FileReader();
            reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                cb(blobInfo.blobUri(), { title: file.name });
            };
            reader.readAsDataURL(file);
            };

            input.click();
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>

    <script type="text/javascript">
        $(document).on('focusin', function(e) {
            if ($(event.target).closest(".mce-window").length) {
                e.stopImmediatePropagation();
            }
        });
        $(document).on('focusin', function(e) {
            if ($(e.target).closest(".tox-dialog").length) {
                e.stopImmediatePropagation();
            }
        });
    </script>
<?= $this->endSection() ?>