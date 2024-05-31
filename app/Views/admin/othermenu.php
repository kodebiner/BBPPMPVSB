<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-large-right" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title uk-light" style="color: white;">&nbsp;&nbsp;Menu Lainnya</h3>
    </div>
    <div class="uk-card uk-card-default uk-margin-large-right">
        <div class="uk-width-1-1" style="margin-left: 45px;">
            <a style="background-color: rgba(60, 105, 151, .8); color:white" class="uk-button uk-botton-small uk-margin-top uk-light" href="dashboard/addothermenu"><span uk-icon="icon: plus; ratio:0.8"></span>&nbsp;&nbsp;Menu Lainnya</a>
        </div>
        <div class="uk-card-body">
            <div class="uk-section uk-padding-remove-top uk-margin-right uk-overflow-auto">
                <?= view('Views/Auth/_message_block') ?>
                <table class="uk-table uk-table-small uk-table-striped">
                    <thead>
                        <tr>
                            <th class="uk-width-small">No. Urut</th>
                            <th class="uk-width-auto">Judul Menu</th>
                            <th class="uk-width-auto uk-text-center">Kelola Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($othermenus as $othermenu) { ?>
                            <tr id="rowother<?=$othermenu['id']?>">
                                <td class="uk-width-small">
                                    <select class="uk-select uk-form-width-xsmall" aria-label="Menu Lainnya" id="otherList<?= $othermenu['id'] ?>" >
                                        <?php
                                        for ($x = 1; $x <= $count; $x++) {
                                            if ($x == $othermenu['ordering']) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                            echo '<option value="'.$x.'" '.$selected.'>'.$x.'</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td class="uk-width-auto"><div><?=$othermenu['title']?></div></td>
                                <td class="uk-width-auto uk-width-auto uk-child-width-auto uk-flex-center uk-flex-middle uk-grid-row-small uk-grid-column-small uk-text-center" uk-grid>
                                    <div>
                                        <a style="background-color: rgba(60, 105, 151, .8); color: white;" class="uk-icon-button" href="dashboard/editothermenu/<?=$othermenu['id']?>" uk-icon="icon: file-edit; ratio:1"></a>
                                    </div>
                                    <div>
                                        <a style="background-color: red; color: white;" onclick="removeOtherMenu(<?= $othermenu['id']; ?>)" class="uk-icon-button" uk-icon="icon: trash; ratio:1"></a>
                                    </div>
                                </td>
                            </tr>

                            <script>
                                // Reposiition Parent List
                                $('#otherList<?= $othermenu['id'] ?>').change(function() {
                                    $.ajax({
                                        type: 'POST',
                                        url: "upload/reorderingothermenu",
                                        data: {
                                            id: <?= $othermenu['id'] ?>,
                                            order: $("#otherList<?= $othermenu['id'] ?>").val()
                                        },
                                        dataType: "json",
                                        error: function(othermenuOrder) {
                                            console.log('error', arguments);
                                        },
                                        success: function(othermenuOrder) {
                                            console.log(othermenuOrder);
                                            location.reload();
                                        }
                                    });
                                });
                            </script>
                        <?php } ?>
                    </tbody>
                </table>

                <script>
                    // Remove RBI
                    function removeOtherMenu(d) {
                        let text = 'Anda yakin ingin menghapus Menu ini?';
                        if (confirm(text) == true) {
                            $.ajax({
                                url: "dashboard/removeothermenu",
                                method: "POST",
                                data: {
                                    id: d,
                                },
                                dataType: "json",
                                error: function() {
                                    console.log('error', arguments);
                                },
                                success: function() {
                                    console.log('success', arguments);
                                    alert('data berhasil di hapus');
                                    location.reload();
                                },
                            })
                        }
                    }
                </script>

                <!-- Pagination -->
                <div class="uk-container uk-container-xlarge uk-margin-top">
                    <?= $pager->links('othermenu', 'uikit_full') ?>
                </div>
                <!-- Pagination End -->
            </div>
        </div>
    </div>
<?= $this->endSection() ?>