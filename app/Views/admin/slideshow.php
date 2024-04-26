<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-large-right" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title uk-light uk-text-uppercase" style="color: white;">&nbsp;&nbsp;Slide Show</h3>
    </div>
    <div class="uk-card uk-card-default uk-margin-large-right">
        <div class="uk-width-1-1" style="margin-left: 45px;">
            <a style="background-color: rgba(60, 105, 151, .8); color:white" class="uk-button uk-botton-small uk-margin-top uk-light" href="dashboard/addslideshow"><span uk-icon="icon: plus; ratio:0.8"></span>&nbsp;&nbsp;Slide show</a>
        </div>
        <div class="uk-card-body">
            <div class="uk-section uk-padding-remove-top uk-margin-right uk-overflow-auto">
                <?= view('Views/Auth/_message_block') ?>
                <table class="uk-table uk-table-small uk-table-striped">
                    <thead>
                        <tr>
                            <!-- <th>File</th> -->
                            <th>Gambar</th>
                            <th>Status</th>
                            <th class="uk-text-center">Kelola Slide Show</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($slideshow as $slide) { ?>
                            <tr id="rowslide<?=$slide['id']?>">
                                <!-- <td></?=$slide['file']?></td> -->
                                <td>
                                    <div uk-lightbox>
                                        <a href="img/slideshow/<?=$slide['file']?>"><img width="50" height="50" src="img/slideshow/<?=$slide['file']?>" alt="<?=$slide['file']?>"></a>
                                    </div>
                                </td>
                                <td>
                                    <?php 
                                    $status="";
                                    if($slide['status'] === "1"){
                                        $status = "Aktif";
                                    }else{
                                        $status = "Tidak Aktif";
                                    }?>
                                    <?=$status?>
                                </td>
                                <td class="uk-child-width-auto uk-flex-center uk-flex-middle uk-grid-row-small uk-grid-column-small uk-text-center" uk-grid>
                                    <div>
                                        <a style="background-color: rgba(60, 105, 151, .8); color: white;" class="uk-icon-button" href="dashboard/editslideshow/<?=$slide['id']?>" uk-icon="icon: file-edit; ratio:1"></a>
                                    </div>
                                    <div>
                                        <a style="background-color: red; color: white;" onclick="removeSlide<?= $slide['id']; ?>()" class="uk-icon-button" uk-icon="icon: trash; ratio:1"></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
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

                <!-- Pagination -->
                <div class="uk-container uk-container-xlarge uk-margin-top">
                    <?= $pager->links('news', 'uikit_full') ?>
                </div>
                <!-- Pagination End -->
            </div>
        </div>
    </div>
<?= $this->endSection() ?>