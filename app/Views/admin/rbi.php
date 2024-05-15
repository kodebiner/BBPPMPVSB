<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-large-right" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title uk-light" style="color: white;">&nbsp;&nbsp;RBI</h3>
    </div>
    <div class="uk-card uk-card-default uk-margin-large-right">
        <div class="uk-width-1-1" style="margin-left: 45px;">
            <a style="background-color: rgba(60, 105, 151, .8); color:white" class="uk-button uk-botton-small uk-margin-top uk-light" href="dashboard/addrbi"><span uk-icon="icon: plus; ratio:0.8"></span>&nbsp;&nbsp;RBI</a>
        </div>
        <div class="uk-card-body">
            <div class="uk-section uk-padding-remove-top uk-margin-right uk-overflow-auto">
                <?= view('Views/Auth/_message_block') ?>
                <table class="uk-table uk-table-small uk-table-striped">
                    <thead>
                        <tr>
                            <th class="uk-width-small">No. Urut</th>
                            <th class="uk-width-small">Detail</th>
                            <th class="uk-width-auto">Judul RBI</th>
                            <th class="uk-width-auto uk-text-center">Kelola RBI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($parents as $parent) { ?>
                            <tr id="rowrbi<?=$parent['id']?>">
                                <td class="uk-width-small">
                                    <select class="uk-select uk-form-width-xsmall" aria-label="Parent" id="parentList<?= $parent['id'] ?>" >
                                        <?php
                                        for ($x = 1; $x <= $count; $x++) {
                                            if ($x == $parent['ordering']) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                            echo '<option value="'.$x.'" '.$selected.'>'.$x.'</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td class="uk-width-small">
                                    <?php if (!empty($rbidata[$parent['id']]['subparent'])) { ?>
                                        <a class="uk-link-reset" id="toggleparent<?= $parent['id'] ?>" uk-toggle="target: .toggleparent<?= $parent['id'] ?>">
                                            <span id="closeparent<?= $parent['id'] ?>" uk-icon="chevron-down" hidden></span>
                                            <span id="openparent<?= $parent['id'] ?>" uk-icon="chevron-right"></span>
                                        </a>
                                    <?php } ?>
                                </td>
                                <td class="uk-width-auto"><div><?=$parent['title']?></div></td>
                                <td class="uk-width-auto uk-width-auto uk-child-width-auto uk-flex-center uk-flex-middle uk-grid-row-small uk-grid-column-small uk-text-center" uk-grid>
                                    <div>
                                        <a style="background-color: rgba(60, 105, 151, .8); color: white;" class="uk-icon-button" href="dashboard/editrbi/<?=$parent['id']?>" uk-icon="icon: file-edit; ratio:1"></a>
                                    </div>
                                    <div>
                                        <a style="background-color: red; color: white;" onclick="removeRBI(<?= $parent['id']; ?>)" class="uk-icon-button" uk-icon="icon: trash; ratio:1"></a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            $subparentCount = count($rbidata[$parent['id']]['subparent']);
                            foreach ($rbidata[$parent['id']]['subparent'] as $subparent) {
                            ?>
                                <tr id="rowrbi<?=$subparent['id']?>" class="toggleparent<?= $parent['id'] ?>" hidden>
                                    <td class="uk-width-small">
                                        <select class="uk-select uk-form-width-xsmall uk-margin-left" aria-label="Subparent" id="subparentList<?= $subparent['id'] ?>" >
                                            <?php
                                            for ($x = 1; $x <= $subparentCount; $x++) {
                                                if ($x == $subparent['ordering']) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                                echo '<option value="'.$x.'" '.$selected.'>'.$x.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td class="uk-width-small">
                                        <?php if (!empty($subparent['child'])) { ?>
                                            <a class="uk-link-reset uk-margin-left" id="togglesubparent<?= $subparent['id'] ?>" uk-toggle="target: .togglesubparent<?= $subparent['id'] ?>">
                                                <span id="closesubparent<?= $subparent['id'] ?>" uk-icon="chevron-down" hidden></span>
                                                <span id="opensubparent<?= $subparent['id'] ?>" uk-icon="chevron-right"></span>
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td class="uk-width-auto"><div class="uk-margin-left"><?=$subparent['title']?></div></td>
                                    <td class="uk-width-auto uk-child-width-auto uk-flex-center uk-flex-middle uk-grid-row-small uk-grid-column-small uk-text-center" uk-grid>
                                        <div>
                                            <a style="background-color: rgba(60, 105, 151, .8); color: white;" class="uk-icon-button" href="dashboard/editrbi/<?=$subparent['id']?>" uk-icon="icon: file-edit; ratio:1"></a>
                                        </div>
                                        <div>
                                            <a style="background-color: red; color: white;" onclick="removeRBI(<?= $subparent['id']; ?>)" class="uk-icon-button" uk-icon="icon: trash; ratio:1"></a>
                                        </div>
                                    </td>
                                </tr>

                                <?php
                                $childCount = count($subparent['child']);
                                foreach ($subparent['child'] as $child) {
                                ?>
                                    <tr id="rowrbi<?=$child['id']?>" class="togglesubparent<?= $subparent['id'] ?>" hidden>
                                        <td class="uk-width-small">
                                            <select class="uk-select uk-form-width-xsmall uk-margin-large-left" aria-label="Child" id="childList<?= $child['id'] ?>" >
                                                <?php
                                                for ($x = 1; $x <= $childCount; $x++) {
                                                    if ($x == $child['ordering']) {
                                                        $selected = 'selected';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                    echo '<option value="'.$x.'" '.$selected.'>'.$x.'</option>';
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="uk-width-small"></td>
                                        <td class="uk-width-auto"><div class="uk-margin-large-left"><?=$child['title']?></div></td>
                                        <td class="uk-width-auto uk-child-width-auto uk-flex-center uk-flex-middle uk-grid-row-small uk-grid-column-small uk-text-center" uk-grid>
                                            <div>
                                                <a style="background-color: rgba(60, 105, 151, .8); color: white;" class="uk-icon-button" href="dashboard/editrbi/<?=$child['id']?>" uk-icon="icon: file-edit; ratio:1"></a>
                                            </div>
                                            <div>
                                                <a style="background-color: red; color: white;" onclick="removeRBI(<?= $child['id']; ?>)" class="uk-icon-button" uk-icon="icon: trash; ratio:1"></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <script>
                                        // Reposiition Child List
                                        $('#childList<?= $child['id'] ?>').change(function() {
                                            $.ajax({
                                                type: 'POST',
                                                url: "upload/reorderingchild",
                                                data: {
                                                    id: <?= $child['id'] ?>,
                                                    parent: <?= $subparent['id'] ?>,
                                                    order: $("#childList<?= $child['id'] ?>").val()
                                                },
                                                dataType: "json",
                                                error: function(childOrder) {
                                                    console.log('error', arguments);
                                                },
                                                success: function(childOrder) {
                                                    console.log(childOrder);
                                                    location.reload();
                                                }
                                            });
                                        });
                                    </script>
                                <?php } ?>

                                <script>
                                    <?php if (!empty($subparent['child'])) { ?>
                                        // Dropdown Child
                                        document.getElementById('togglesubparent<?= $subparent['id'] ?>').addEventListener('click', function() {
                                            if (document.getElementById('closesubparent<?= $subparent['id'] ?>').hasAttribute('hidden')) {
                                                document.getElementById('closesubparent<?= $subparent['id'] ?>').removeAttribute('hidden');
                                                document.getElementById('opensubparent<?= $subparent['id'] ?>').setAttribute('hidden', '');
                                            } else {
                                                document.getElementById('opensubparent<?= $subparent['id'] ?>').removeAttribute('hidden');
                                                document.getElementById('closesubparent<?= $subparent['id'] ?>').setAttribute('hidden', '');
                                            }
                                        });
                                    <?php } ?>

                                    // Reposiition Subparent List
                                    $('#subpaketList<?= $subparent['id'] ?>').change(function() {
                                        $.ajax({
                                            type: 'POST',
                                            url: "upload/reorderingsubparent",
                                            data: {
                                                id: <?= $subparent['id'] ?>,
                                                parent: <?= $parent['id'] ?>,
                                                order: $("#subparentList<?= $subparent['id'] ?>").val()
                                            },
                                            dataType: "json",
                                            error: function(subparentOrder) {
                                                console.log('error', arguments);
                                            },
                                            success: function(subparentOrder) {
                                                console.log(subparentOrder);
                                                location.reload();
                                            }
                                        });
                                    });
                                </script>
                            <?php } ?>

                            <script>
                                <?php if (!empty($rbidata[$parent['id']]['subparent'])) { ?>
                                    // Dropdown Subparent
                                    document.getElementById('toggleparent<?= $parent['id'] ?>').addEventListener('click', function() {
                                        if (document.getElementById('closeparent<?= $parent['id'] ?>').hasAttribute('hidden')) {
                                            document.getElementById('closeparent<?= $parent['id'] ?>').removeAttribute('hidden');
                                            document.getElementById('openparent<?= $parent['id'] ?>').setAttribute('hidden', '');
                                        } else {
                                            document.getElementById('openparent<?= $parent['id'] ?>').removeAttribute('hidden');
                                            document.getElementById('closeparent<?= $parent['id'] ?>').setAttribute('hidden', '');
                                        }
                                    });
                                <?php } ?>

                                // Reposiition Parent List
                                $('#parentList<?= $parent['id'] ?>').change(function() {
                                    $.ajax({
                                        type: 'POST',
                                        url: "upload/reorderingparent",
                                        data: {
                                            id: <?= $parent['id'] ?>,
                                            order: $("#parentList<?= $parent['id'] ?>").val()
                                        },
                                        dataType: "json",
                                        error: function(parentOrder) {
                                            console.log('error', arguments);
                                        },
                                        success: function(parentOrder) {
                                            console.log(parentOrder);
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
                    function removeRBI(d) {
                        let text = 'Anda yakin ingin menghapus RBI ini?';
                        if (confirm(text) == true) {
                            $.ajax({
                                url: "dashboard/removerbi",
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
                    <?= $pager->links('rbi', 'uikit_full') ?>
                </div>
                <!-- Pagination End -->
            </div>
        </div>
    </div>
<?= $this->endSection() ?>