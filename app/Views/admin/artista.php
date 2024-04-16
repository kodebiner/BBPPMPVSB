<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>
<div class="uk-child-width-expand@s uk-margin-large-right" uk-grid>
    <div class="uk-grid-item-match">
        <div>
            <h3 class="uk-margin">Kelola Artista</h3>
        </div>
     </div>
    <div class="uk-text-right">
        <a class="uk-button uk-button-primary uk-border-rounded" href="#modal-add" uk-toggle><span uk-icon="icon: plus; ratio:0.8"></span>&nbsp;Artista</a>
    </div>
</div>
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
            <?php foreach($artista as $art){ ?>
                <tr>
                    <td><?=$art['file']?></td>
                    <td>
                        <div uk-lightbox>
                            <a href="images/artista/<?=$art['photo']?>"><img class="uk-border-circle" width="50" height="50" src="images/artista/<?=$art['photo']?>" alt="<?=$art['photo']?>"></a>
                        </div>
                    </td>
                    <td class="uk-text-center"><a class="uk-button uk-button-primary uk-border-rounded" href="#modal-edit" uk-toggle><span uk-icon="icon: file-edit;"></span></a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div id="modal-add" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h2 class="uk-modal-title">Ubah Data</h2>
        </div>
        <div class="uk-modal-body">
            <div class="uk-margin-top">
                <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
                <script>
                    tinymce.init({
                    selector: 'textarea#file-add',
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
<?= $this->endSection() ?>