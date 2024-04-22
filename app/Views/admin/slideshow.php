<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title uk-light uk-text-uppercase" style="color: white;">&nbsp;&nbsp;Slide Show</h3>
    </div>
    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <div class="uk-width-1-1" style="margin-left: 45px;">
            <a style="background-color: rgba(60, 105, 151, .8); color:white" class="uk-button uk-botton-small uk-margin-top uk-light" href="dashboard/addslideshow"><span uk-icon="icon: plus; ratio:0.8"></span>&nbsp;&nbsp;Slide show</a>
        </div>
        <div class="uk-card-body">
            <div class="uk-section uk-padding-remove-top uk-margin-right uk-overflow-auto">
                <?= view('Views/Auth/_message_block') ?>
                <table class="uk-table uk-table-small uk-table-striped">
                    <thead>
                        <tr>
                            <th>File</th>
                            <th>Gambar</th>
                            <th class="uk-text-center">Status</th>
                            <th class="uk-text-center">Ubah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($slideshow as $slide) { ?>
                            <tr id="rowslide<?=$slide['id']?>">
                                <td><?=$slide['file']?></td>
                                <td>
                                    <div uk-lightbox>
                                        <a href="img/slideshow/<?=$slide['file']?>"><img width="50" height="50" src="img/slideshow/<?=$slide['file']?>" alt="<?=$slide['file']?>"></a>
                                    </div>
                                </td>
                                <td class="uk-text-center">
                                    <?php 
                                    $status="";
                                    if($slide['status'] === "1"){
                                        $status = "Aktif";
                                    }else{
                                        $status = "Tidak Aktif";
                                    }?>
                                    <?=$status?>
                                </td>
                                <td class="uk-text-center">
                                    <a style="background-color: rgba(60, 105, 151, .8); color: white;" class="uk-button uk-botton-small uk-light" href="dashboard/editslideshow/<?=$slide['id']?>" uk-toggle><span uk-icon="icon: file-edit; ratio:1"></span></a>
                                    <a style="background-color: red; color: white;" onclick="removeSlide<?= $slide['id']; ?>()" class="uk-button uk-botton-small uk-light"><span uk-icon="icon: trash; ratio:1"></span></a>
                                    <script>
                                        function removeSlide<?= $slide['id']; ?>() {
                                            let text = "Anda yakin ingin menghapus slide <?=$slide['file']?> ini?";
                                            if (confirm(text) == true) {
                                                $.ajax({
                                                    url: "dashboard/removeslideshow/<?= $slide['id'] ?>",
                                                    method: "POST",
                                                    data: {
                                                        artista: <?= $slide['id'] ?>,
                                                    },
                                                    dataType: "json",
                                                    error: function() {
                                                        console.log('error', arguments);
                                                    },
                                                    success: function() {
                                                        console.log('success', arguments);
                                                        alert('Slideshow berhasil di hapus');
                                                        $("#rowslide<?=$slide['id']?>").remove();
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