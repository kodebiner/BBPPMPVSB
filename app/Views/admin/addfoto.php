<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right uk-light" style="background-color:  rgba(60, 105, 151, .8);;">
        <h3 class="uk-card-title">Tambah Foto</h3>
    </div>

    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <?= view('Views/Auth/_message_block') ?>
        <form action="add/fotogaleri" method="post">
            <div class="uk-card-body">
                <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Judul</label>
                <div class="uk-margin">
                    <div class="uk-form-controls">
                        <input class="uk-input uk-box-shadow-small uk-border-rounded" id="form-stacked-text" name="judul" type="text" placeholder="Masukkan Judul...">
                    </div>
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
                            }
                            imgContainer.appendChild(displayContainer);
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

                                alert(pesan);
                            }
                        });
                    };
                    // Remove Foto Script End

                    // Choose Thumbanil Script
                    function choosenThumb(d) {
                        $('.thumb-selector').removeClass('uk-background-primary');
                        $('#display-container-create-'+d).addClass('uk-background-primary');
                        var thumbnail = $('#foto-'+d).val();
                        $('#thumbnail').val(thumbnail);
                    };
                    // Choose Thumbanil Script End
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