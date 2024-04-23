<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title uk-light" style="color: white;">Daftar Majalah Artista</h3>
    </div>
    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <div class="uk-width-1-1"  style="margin-left: 45px;">
            <a style="background-color: rgba(60, 105, 151, .8); color:white" class="uk-button uk-botton-small uk-margin-top uk-light" href="dashboard/addartista"><span uk-icon="icon: plus; ratio:1"></span>&nbsp;&nbsp;Majalah Artista</a>
        </div>
        <div class="uk-card-body">
            <div class="uk-section uk-padding-remove-top uk-margin-right uk-overflow-auto">
                <table class="uk-table uk-table-small uk-table-striped">
                    <thead>
                        <tr>
                            <th>File</th>
                            <th>Foto</th>
                            <th class="uk-width-medium">Kelola Majalah Artista</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($artista as $art){ ?>
                            <tr id="artrow<?=$art['id']?>">
                                <td><a id="filepdf" href="artista/artikel/<?=$art['file']?>" target="_blank"><span uk-icon="file-text"></span><?=$art['file']?></a></td>
                                <td>
                                    <div uk-lightbox>
                                        <a href="artista/foto/<?=$art['photo']?>"><img width="50" height="50" src="artista/foto/<?=$art['photo']?>" alt="<?=$art['photo']?>"></a>
                                    </div>
                                </td>
                                <td>
                                    <a style="background-color: rgba(60, 105, 151, .8); color: white;" class="uk-button uk-botton-small uk-light" href="dashboard/editartista/<?=$art['id']?>" uk-toggle><span uk-icon="icon: file-edit; ratio:1"></span></a>
                                    <!-- <a style="background-color: red; color: white;" onclick="return confirm('<?= 'Anda yakin ingin menghapus data ini ?' ?>')" class="uk-button uk-botton-small uk-light" href="dashboard/editartista/</?=$art['id']?>" uk-toggle><span uk-icon="icon: trash; ratio:1"></span></a> -->
                                    <a style="background-color: red; color: white;" onclick="removeArtista<?= $art['id']; ?>()" class="uk-button uk-botton-small uk-light"><span uk-icon="icon: trash; ratio:1"></span></a>
                                    <script>
                                        function removeArtista<?= $art['id']; ?>() {
                                            let text = "Anda yakin ingin menghapus data Artista ini?";
                                            if (confirm(text) == true) {
                                                $.ajax({
                                                    url: "dashboard/removeartista/<?= $art['id'] ?>",
                                                    method: "POST",
                                                    data: {
                                                        artista: <?= $art['id'] ?>,
                                                    },
                                                    dataType: "json",
                                                    error: function() {
                                                        console.log('error', arguments);
                                                    },
                                                    success: function() {
                                                        console.log('success', arguments);
                                                        alert('data berhasil di hapus');
                                                        $("#artrow<?=$art['id']?>").remove();
                                                    },
                                                })
                                            }
                                        }
                                    </script>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="uk-container uk-container-xlarge uk-margin-top">
                    <?= $pager->links('news', 'uikit_full') ?>
                </div>
                <!-- Pagination End -->
            </div>
        </div>
    </div>
<?= $this->endSection() ?>