<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-large-right" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title uk-light" style="color: white;">Daftar Majalah Artista</h3>
    </div>
    <div class="uk-card uk-card-default uk-margin-large-right">
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
                            <th class="uk-text-center">Kelola Majalah Artista</th>
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
                                <td class="uk-child-width-auto uk-flex-center uk-flex-middle uk-grid-row-small uk-grid-column-small uk-text-center" uk-grid>
                                    <div>
                                        <a style="background-color: rgba(60, 105, 151, .8); color: white;" class="uk-icon-button" href="dashboard/editartista/<?=$art['id']?>" uk-icon="icon: file-edit; ratio:1"></a>
                                    </div>
                                    <div>
                                        <a style="background-color: red; color: white;" onclick="removeArtista<?= $art['id']; ?>()" class="uk-icon-button" uk-icon="icon: trash; ratio:1"></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
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

                <!-- Pagination -->
                <div class="uk-container uk-container-xlarge uk-margin-top">
                    <?= $pager->links('news', 'uikit_full') ?>
                </div>
                <!-- Pagination End -->
            </div>
        </div>
    </div>
<?= $this->endSection() ?>