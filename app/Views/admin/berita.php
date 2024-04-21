<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title uk-light" style="color: white;">&nbsp;&nbsp;Berita</h3>
    </div>
    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <div class="uk-width-1-1" style="margin-left: 45px;">
            <a style="background-color: rgba(60, 105, 151, .8); color:white" class="uk-button uk-botton-small uk-margin-top uk-light" href="dashboard/addberita"><span uk-icon="icon: plus; ratio:0.8"></span>&nbsp;&nbsp;Berita</a>
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
                        <tr id="rowberita">
                            <td><?=$news['user']?></td>
                            <td><?=$news['judul']?></td>
                            <td><?=$news['pendahuluan']?></td>
                            <td><?=$news['isi']?></td>
                            <td><?=$news['ringkasan']?></td>
                            <td>
                                <div uk-lightbox>
                                    <a href="artista/foto/<?=$news['foto']?>"><img width="50" height="50" src="artista/foto/<?=$news['foto']?>" alt="<?=$news['foto']?>"></a>
                                </div>
                            </td>
                            <td class="uk-text-center">
                                <a style="background-color: rgba(60, 105, 151, .8); color: white;" class="uk-button uk-botton-small uk-light" href="dashboard/editberita/<?=$news['id']?>" uk-toggle><span uk-icon="icon: file-edit; ratio:1"></span></a>
                                <a style="background-color: red; color: white;" onclick="removeArtista<?= $news['id']; ?>()" class="uk-button uk-botton-small uk-light"><span uk-icon="icon: trash; ratio:1"></span></a>
                                <script>
                                    function removeArtista<?= $news['id']; ?>() {
                                        let text = "Anda yakin ingin menghapus berita <?=$news['judul']?> ini?";
                                        if (confirm(text) == true) {
                                            $.ajax({
                                                url: "dashboard/removeberita/<?= $news['id'] ?>",
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>