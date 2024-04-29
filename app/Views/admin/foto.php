<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-large-right" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title uk-light" style="color: white;">&nbsp;&nbsp;Foto</h3>
    </div>

    <div class="uk-card uk-card-default uk-margin-large-right">
        <div class="uk-width-1-1" style="margin-left: 45px;">
            <a style="background-color: rgba(60, 105, 151, .8); color:white" class="uk-button uk-botton-small uk-margin-top uk-light" href="dashboard/addfoto"><span uk-icon="icon: plus; ratio:0.8"></span>&nbsp;&nbsp;Foto</a>
        </div>
        <div class="uk-card-body">
            <div class="uk-section uk-padding-remove-top uk-margin-right uk-overflow-auto">
                <?= view('Views/Auth/_message_block') ?>
                <table class="uk-table uk-table-small uk-table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th class="uk-text-center">Kelola Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($photos as $foto) { ?>
                            <tr id="rowfoto<?=$foto['id']?>">
                                <td><?=$foto['title']?></td>
                                <td>
                                    <div uk-lightbox>
                                        <a href="<?=$foto['images']?>"><img width="50" height="50" src="<?=$foto['images']?>" alt="<?=$foto['images']?>"></a>
                                    </div>
                                </td>
                                <td class="uk-child-width-auto uk-flex-center uk-flex-middle uk-grid-row-small uk-grid-column-small uk-text-center" uk-grid>
                                    <div>
                                        <a style="background-color: rgba(60, 105, 151, .8); color: white;" class="uk-icon-button" href="dashboard/editfoto/<?=$foto['id']?>" uk-icon="icon: file-edit; ratio:1"></a>
                                    </div>
                                    <div>
                                        <a style="background-color: red; color: white;" onclick="removeFoto<?= $foto['id']; ?>()" class="uk-icon-button" uk-icon="icon: trash; ratio:1"></a>
                                    </div>
                                </td>
                            </tr>
                
                            <script>
                                function removeFoto<?= $foto['id']; ?>() {
                                    let text = "Anda yakin ingin menghapus Foto <?=$foto['title']?> ini?";
                                    if (confirm(text) == true) {
                                        $.ajax({
                                            url: "dashboard/removefoto/<?= $foto['id'] ?>",
                                            method: "POST",
                                            data: {
                                                foto: <?= $foto['id'] ?>,
                                            },
                                            dataType: "json",
                                            error: function() {
                                                console.log('error', arguments);
                                            },
                                            success: function() {
                                                console.log('success', arguments);
                                                alert('Foto berhasil di hapus');
                                                $("#rowfoto<?=$foto['id']?>").remove();
                                            },
                                        })
                                    }
                                }
                            </script>
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
    <!-- <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <div class="uk-width-1-1" style="margin-left: 45px;">
            <a style="background-color: rgba(60, 105, 151, .8); color:white" class="uk-button uk-botton-small uk-margin-top uk-light" href="dashboard/addfoto"><span uk-icon="icon: plus; ratio:0.8"></span>&nbsp;&nbsp;Foto</a>
        </div>
        <div class="uk-card-body uk-padding-small-top">
            <div class="uk-section uk-padding-remove-top uk-margin-right uk-overflow-auto">
                </?= view('Views/Auth/_message_block') ?>
                <div class="uk-child-width-1-3@m" uk-grid>
                    </?php foreach($photos as $photo) {?>
                    <div>
                        <div uk-lightbox>
                            <a class="uk-inline" href="artista/foto/</?=$photo['images']?>" data-caption="</?=$photo['title']?>">
                                <img class="uk-object-scale-down" src="artista/foto/</?=$photo['images']?>" alt="</?=$photo['images']?>" width="1800" height="1200">
                            </a>
                        </div>
                        <div class="uk-card-footer" style="background-color: rgba(60, 105, 151, .8);">
                            <div class="uk-child-width-expand@s uk-text-center" uk-grid>
                                <div>
                                    <div><a href="dashboard/editfoto/</?=$photo['id']?>" class="uk-button uk-button-text" style="color: white;">Ubah Foto</a></div>
                                </div>
                                <div>
                                    <div><a href="#" class="uk-button uk-button-text" style="color: white;">Hapus Foto</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </?php } ?>
                </div>
            </div>
        </div>
    </div> -->
<?= $this->endSection() ?>