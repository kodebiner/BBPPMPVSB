<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right uk-light" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title">Hasil Survey</h3>
    </div>

    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <?= view('Views/Auth/_message_block') ?>
        <form action="add/survey" method="post">
            <div class="uk-card-body">
                <!-- Upload File -->
                <h5 class="uk-margin-small-top">File Hasil Survey</h5>
                <div class="uk-child-width-1-1@m" uk-grid>
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-body uk-text-center">
                                <?php if (!empty($survey)) { ?>
                                    <h5 id="uppdf"><a id="filepdf" href="survey/<?=$survey['file']?>" target="_blank"><span uk-icon="file-text"></span><?=$survey['file']?></a></h5>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h5 class="uk-margin-small-top">Upload File</h5>
                <div class="uk-margin" id="file-container-createsurvey">
                    <div id="file-containersurvey" class="uk-form-controls">
                        <input id="file" name="file" hidden />
                        <div id="js-upload-filesurvey" class="js-upload-filesurvey uk-placeholder uk-text-center">
                            <span uk-icon="icon: cloud-upload"></span>
                            <span class="uk-text-middle">Tarik dan lepas file disini atau</span>
                            <div uk-form-custom>
                                <input type="file" multiple>
                                <span class="uk-link uk-preserve-color">pilih satu</span>
                            </div>
                        </div>
                        <progress id="js-upload-createfile" class="uk-progress" value="0" max="100" hidden></progress>
                    </div>
                </div>
                <!-- End Of Upload File -->
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
        var barpdf = document.getElementById('js-upload-createfile');
        UIkit.upload('.js-upload-filesurvey', {
            url: 'upload/pdfsurvey',
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

                var FileContainer = document.getElementById('file-container-createsurvey');

                var displayContainer = document.createElement('div');
                displayContainer.setAttribute('id', 'filecontainer');
                displayContainer.setAttribute('class', 'uk-inline uk-width-1-1');

                var displayFile = document.createElement('div');
                displayFile.setAttribute('class', 'uk-placeholder uk-text-center');

                var textfont = document.createElement('h6');

                var linkrev = document.createElement('span')
                linkrev.setAttribute('uk-icon', 'file-pdf');

                var link = document.createElement('a');
                link.setAttribute('href', 'survey/' + pdfname);
                link.setAttribute('target', '_blank');

                var closeContainer = document.createElement('div');
                closeContainer.setAttribute('class', 'uk-position-small uk-position-right');

                var closeButton = document.createElement('a');
                closeButton.setAttribute('class', 'tm-img-remove uk-border-circle');
                closeButton.setAttribute('onClick', 'removeFilesurvey()');
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

                document.getElementById('js-upload-filesurvey').setAttribute('hidden', '');
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

        function removeFilesurvey() {
            $.ajax({
                type: 'post',
                url: 'upload/removepdfsurvey',
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

                    document.getElementById('js-upload-filesurvey').removeAttribute('hidden', '');
                }
            });
        };
    </script>
    <!-- End Upload File Pdf -->
<?= $this->endSection() ?>