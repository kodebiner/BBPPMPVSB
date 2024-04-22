<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title uk-light" style="color: white;">&nbsp;&nbsp;Seminar</h3>
    </div>
    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <div class="uk-width-1-1" style="margin-left: 45px;">
            <a style="background-color: rgba(60, 105, 151, .8); color:white" class="uk-button uk-botton-small uk-margin-top uk-light" href="dashboard/addseminar"><span uk-icon="icon: plus; ratio:0.8"></span>&nbsp;&nbsp;Seminar</a>
        </div>
        <div class="uk-card-body">
            <div class="uk-section uk-padding-remove-top uk-margin-right uk-overflow-auto">
                <?= view('Views/Auth/_message_block') ?>
                <table class="uk-table uk-table-small uk-table-striped">
                    <thead>
                        <tr>
                            <th>Penulis</th>
                            <th>Judul</th>
                            <th>Pendahulan</th>
                            <th>Isi</th>
                            <th>Ringkasan</th>
                            <th>Gambar</th>
                            <th class="uk-text-center">Ubah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($berita as $news) { ?>
                            <tr id="rowberita<?=$news['id']?>">
                                <?php 
                                    $authors = "";
                                    foreach ($users as $author) {
                                        if($news['userid'] === $author['id']){
                                            $authors = $author['username'];
                                        }
                                    } 
                                ?>
                                <td><?=$authors?></td>
                                <td><?=$news['title']?></td>
                                <td><?=$news['introtext']?></td>
                                <td><?=$news['fulltext']?></td>
                                <td><?=$news['description']?></td>
                                <td>
                                    <div uk-lightbox>
                                        <a href="artista/foto/<?=$news['images']?>"><img width="50" height="50" src="<?=$news['images']?>" alt="<?=$news['images']?>"></a>
                                    </div>
                                </td>
                                <td class="uk-text-center">
                                    <a style="background-color: rgba(60, 105, 151, .8); color: white;" class="uk-button uk-botton-small uk-light" href="dashboard/editseminar/<?=$news['id']?>" uk-toggle><span uk-icon="icon: file-edit; ratio:1"></span></a>
                                    <a style="background-color: red; color: white;" onclick="removeArtista<?= $news['id']; ?>()" class="uk-button uk-botton-small uk-light"><span uk-icon="icon: trash; ratio:1"></span></a>
                                    <script>
                                        function removeArtista<?= $news['id']; ?>() {
                                            let text = "Anda yakin ingin menghapus seminar <?=$news['title']?> ini?";
                                            if (confirm(text) == true) {
                                                $.ajax({
                                                    url: "dashboard/removeseminar/<?= $news['id'] ?>",
                                                    method: "POST",
                                                    data: {
                                                        artista: <?= $news['id'] ?>,
                                                    },
                                                    dataType: "json",
                                                    error: function() {
                                                        console.log('error', arguments);
                                                    },
                                                    success: function() {
                                                        console.log('success', arguments);
                                                        alert('data berhasil di hapus');
                                                        $("#rowberita<?=$news['id']?>").remove();
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