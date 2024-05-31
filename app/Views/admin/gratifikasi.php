<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-large-right" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title uk-light" style="color: white;">&nbsp;&nbsp;Gratifikasi</h3>
    </div>
    <div class="uk-card uk-card-default uk-margin-large-right">
        <div class="uk-width-1-1" style="margin-left: 45px;">
            <a style="background-color: rgba(60, 105, 151, .8); color:white" class="uk-button uk-botton-small uk-margin-top uk-light" href="dashboard/addgratifikasi"><span uk-icon="icon: plus; ratio:0.8"></span>&nbsp;&nbsp;Gratifikasi</a>
        </div>
        <div class="uk-card-body">
            <div class="uk-section uk-padding-remove-top uk-margin-right uk-overflow-auto">
                <?= view('Views/Auth/_message_block') ?>
                <table class="uk-table uk-table-small uk-table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tipe Inputan Gratifikasi</th>
                            <th class="uk-text-center">Kelola Gratifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($berita as $news) { ?>
                            <tr id="rowgratifikasi<?=$news['id']?>">
                                <td><?=$news['name']?></td>
                                <td>
                                    <?php
                                    if ($news['type'] == '1') {
                                        echo 'Kalimat Singkat';
                                    } elseif ($news['type'] == '2') {
                                        echo 'Kalimat Panjang';
                                    } elseif ($news['type'] == '3') {
                                        echo 'Upload File';
                                    }
                                    ?>
                                </td>
                                <td class="uk-child-width-auto uk-flex-center uk-flex-middle uk-grid-row-small uk-grid-column-small uk-text-center" uk-grid>
                                    <div>
                                        <a style="background-color: rgba(60, 105, 151, .8); color: white;" class="uk-icon-button" href="dashboard/editgratifikasi/<?=$news['id']?>" uk-icon="icon: file-edit; ratio:1"><span></span></a>
                                    </div>
                                    <div>
                                        <a style="background-color: red; color: white;" onclick="removeGratifikasi<?= $news['id']; ?>()" class="uk-icon-button" uk-icon="icon: trash; ratio:1"><span></span></a>
                                    </div>
                                </td>
                            </tr>
                
                            <script>
                                function removeGratifikasi<?= $news['id']; ?>() {
                                    let text = 'Anda yakin ingin menghapus gratifikasi <?=$news['name']?> ini?';
                                    if (confirm(text) == true) {
                                        $.ajax({
                                            url: "dashboard/removegratifikasi/<?= $news['id'] ?>",
                                            method: "POST",
                                            data: {
                                                gratifikasi: <?= $news['id'] ?>,
                                            },
                                            dataType: "json",
                                            error: function() {
                                                console.log('error', arguments);
                                            },
                                            success: function() {
                                                console.log('success', arguments);
                                                alert('data berhasil di hapus');
                                                $("#rowgratifikasi<?=$news['id']?>").remove();
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
<?= $this->endSection() ?>