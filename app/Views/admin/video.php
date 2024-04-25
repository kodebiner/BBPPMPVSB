<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-large-right" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title uk-light" style="color: white;">&nbsp;&nbsp;Video</h3>
    </div>

    <div class="uk-card uk-card-default uk-margin-large-right">
        <div class="uk-width-1-1" style="margin-left: 45px;">
            <a style="background-color: rgba(60, 105, 151, .8); color:white" class="uk-button uk-botton-small uk-margin-top uk-light" href="dashboard/addvideo"><span uk-icon="icon: plus; ratio:0.8"></span>&nbsp;&nbsp;Video</a>
        </div>
        <div class="uk-card-body">
            <div class="uk-section uk-padding-remove-top uk-margin-right uk-overflow-auto">
                <?= view('Views/Auth/_message_block') ?>
                <table class="uk-table uk-table-small uk-table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Thumbnail Video</th>
                            <th>Kelola Video</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($photos as $foto) { ?>
                            <tr id="rowberita<?=$foto['id']?>">
                                <td><?=$foto['title']?></td>
                                <td>
                                    <div uk-lightbox>
                                        <a href="<?=$foto['images']?>">
                                        <img width="80" height="60" src="<?=$foto['images']?>" alt="<?=$foto['images']?>">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <a style="background-color: rgba(60, 105, 151, .8); color: white;" class="uk-button uk-botton-small uk-light" href="dashboard/editvideo/<?=$foto['id']?>" uk-toggle><span uk-icon="icon: file-edit; ratio:1"></span></a>
                                    <a style="background-color: red; color: white;" onclick="removeFoto<?= $foto['id']; ?>()" class="uk-button uk-botton-small uk-light"><span uk-icon="icon: trash; ratio:1"></span></a>
                                    <script>
                                        function removeFoto<?= $foto['id']; ?>() {
                                            let text = "Anda yakin ingin menghapus Video <?=$foto['title']?> ini?";
                                            if (confirm(text) == true) {
                                                $.ajax({
                                                    url: "dashboard/removefoto/<?= $foto['id'] ?>",
                                                    method: "POST",
                                                    data: {
                                                        artista: <?= $foto['id'] ?>,
                                                    },
                                                    dataType: "json",
                                                    error: function() {
                                                        console.log('error', arguments);
                                                    },
                                                    success: function() {
                                                        console.log('success', arguments);
                                                        alert('Video berhasil di hapus');
                                                        $("#rowberita<?=$foto['id']?>").remove();
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