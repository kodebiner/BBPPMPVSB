<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-large-right" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title uk-light" style="color: white;">&nbsp;&nbsp;Seminar</h3>
    </div>
    <div class="uk-card uk-card-default uk-margin-large-right">
        <div class="uk-width-1-1" style="margin-left: 45px;">
            <a style="background-color: rgba(60, 105, 151, .8); color:white" class="uk-button uk-botton-small uk-margin-top uk-light" href="dashboard/addseminar"><span uk-icon="icon: plus; ratio:0.8"></span>&nbsp;&nbsp;Seminar</a>
        </div>
        <div class="uk-card-body">
            <div class="uk-section uk-padding-remove-top uk-margin-right uk-overflow-auto">
                <?= view('Views/Auth/_message_block') ?>
                <table class="uk-table uk-table-small uk-table-striped">
                    <thead>
                        <tr>
                            <!-- <th>Penulis</th> -->
                            <th>Judul Seminar</th>
                            <!-- <th>Pendahulan</th>
                            <th>Isi</th>
                            <th>Ringkasan</th>
                            <th>Gambar</th> -->
                            <th class="uk-text-center">Kelola Seminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($berita as $news) { ?>
                            <tr id="rowberita<?=$news['id']?>">
                                <!-- </?php 
                                    $authors = "";
                                    foreach ($users as $author) {
                                        if($news['userid'] === $author['id']){
                                            $authors = $author['username'];
                                        }
                                    } 
                                ?> -->
                                <!-- <td></?=$authors?></td>
                                <td></?=$news['introtext']?></td>
                                <td></?=$news['fulltext']?></td>
                                <td></?=$news['description']?></td> -->
                                <td><?=$news['title']?></td>
                                <!-- <td>
                                    <div uk-lightbox>
                                        <a href="artista/foto/</?=$news['images']?>"><img width="50" height="50" src="</?=$news['images']?>" alt="</?=$news['images']?>"></a>
                                    </div>
                                </td> -->
                                <td class="uk-child-width-auto uk-flex-center uk-flex-middle uk-grid-row-small uk-grid-column-small uk-text-center" uk-grid>
                                    <div>
                                        <a style="background-color: rgba(60, 105, 151, .8); color: white;" class="uk-icon-button" href="dashboard/editseminar/<?=$news['id']?>" uk-icon="icon: file-edit; ratio:1"><span></span></a>
                                    </div>
                                    <div>
                                        <a style="background-color: red; color: white;" onclick="removeArtista<?= $news['id']; ?>()" class="uk-icon-button" uk-icon="icon: trash; ratio:1"><span></span></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
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

                <!-- Pagination -->
                <div class="uk-container uk-container-xlarge uk-margin-top">
                    <?= $pager->links('news', 'uikit_full') ?>
                </div>
                <!-- Pagination End -->
            </div>
        </div>
    </div>
<?= $this->endSection() ?>