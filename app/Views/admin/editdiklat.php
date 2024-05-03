<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right uk-light" style="background-color:  rgba(60, 105, 151, .8);;">
        <h3 class="uk-card-title">Ubah Diklat</h3>
    </div>

    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <?= view('Views/Auth/_message_block') ?>
        <form action="save/diklat/<?=$news['id']?>" method="post">
            <div class="uk-card-body">

            <label class="uk-form-label uk-text-default uk-margin-small-left uk-text-bold" for="form-stacked-text">Judul</label>
            <div class="uk-margin">
                <div class="uk-form-controls">
                    <input class="uk-input uk-box-shadow-small uk-border-rounded" id="form-stacked-text" name="judul" value="<?=$news['title']?>" type="text" placeholder="Masukkan Judul...">
                </div>
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
                                    <div>
                                        <div class="thumb-selector uk-inline uk-padding-small <?=$highlight?>">
                                            <input id="foto-<?= $foto['id'] ?>" name="foto-<?= $foto['id'] ?>" value="<?= $foto['file'] ?>" hidden />
                                            <a id="fileimagecontainer" onclick="choosenThumb()">
                                                <img id="fileimage" src="<?=$foto['file']?>" width="300" height="300" alt="">
                                            </a>
                                            <div class="uk-position-small uk-position-top-right">
                                                <a class="uk-icon-button uk-button-danger uk-light uk-icon" onclick="removeFoto()" uk-icon="close"></a>
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

            <!-- Upload Foto Script -->
            <script>
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

                        // var filename = arguments[0].response;

                        // if (document.getElementById('imagecontainer')) {
                        //     document.getElementById('imagecontainer').remove();
                        // };

                        // document.getElementById('foto').value = filename;

                        // var imgContainer = document.getElementById('image-container-create');

                        // var displayContainer = document.createElement('div');
                        // displayContainer.setAttribute('id', 'imagecontainer');
                        // displayContainer.setAttribute('class', 'uk-inline uk-width-1-1');

                        // var displayImg = document.createElement('div');
                        // displayImg.setAttribute('class', 'uk-placeholder uk-text-center');
                        // displayImg.setAttribute('uk-lightbox', '');

                        // var linkimg = document.createElement('a');
                        // linkimg.setAttribute('id','imagecontainer');
                        // linkimg.setAttribute('class','uk-inline');
                        // linkimg.setAttribute('href','images/'+filename);
                        // linkimg.setAttribute('data-caption', filename);

                        // var imagetag = document.createElement('img');
                        // imagetag.setAttribute('id','fileimage');
                        // imagetag.setAttribute('class','uk-margin-top uk-margin-bottom');
                        // imagetag.setAttribute('src','images/'+filename);
                        // imagetag.setAttribute('width','120');
                        // imagetag.setAttribute('heigth','180');
                        // imagetag.setAttribute('alt', filename);

                        // var closeContainer = document.createElement('div');
                        // closeContainer.setAttribute('class', 'uk-position-small uk-position-right');

                        // var closeButton = document.createElement('a');
                        // closeButton.setAttribute('class', 'tm-img-remove uk-border-circle');
                        // closeButton.setAttribute('onClick', 'removeFoto()');
                        // closeButton.setAttribute('uk-icon', 'close');

                        // var linktext = document.createTextNode(filename);

                        // closeContainer.appendChild(closeButton);
                        // displayContainer.appendChild(displayImg);
                        // displayContainer.appendChild(closeContainer);
                        // displayImg.appendChild(linkimg);
                        // linkimg.appendChild(imagetag);
                        // imgContainer.appendChild(displayContainer);

                        // document.getElementById('js-upload-foto').setAttribute('hidden', '');

                        createCount++;

                        var filenames = arguments[0].response;
                        var imgContainer = document.getElementById('list-foto');

                        for (i in filenames) {
                            var newcontainer    = document.createElement('div');
                            newcontainer.setAttribute('id', 'display-container-create-'+createCount);

                            var displayContainer = document.createElement('div');
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
                            inputhidden.setAttribute('value', 'images/'+filenames);

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
                            newcontainer.appendChild(displayContainer);
                        }
                        imgContainer.appendChild(newcontainer);
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

                function removeFoto(f) {
                    $.ajax({
                        type: 'post',
                        url: 'upload/removefotodiklat',
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


<?= $this->endSection() ?>