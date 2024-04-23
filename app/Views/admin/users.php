<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title uk-light" style="color: white;">&nbsp;&nbsp;Kelola Pengguna</h3>
    </div>
    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <div class="uk-width-1-1" style="margin-left: 45px;">
            <a style="background-color: rgba(60, 105, 151, .8); color:white" class="uk-button uk-botton-small uk-margin-top uk-light" href="dashboard/addusers"><span uk-icon="icon: plus; ratio:0.8"></span>&nbsp;&nbsp;Pengguna</a>
        </div>
        <div class="uk-card-body">
            <div class="uk-section uk-padding-remove-top uk-margin-right uk-overflow-auto">
                <?= view('Views/Auth/_message_block') ?>
                <table class="uk-table uk-table-striped">
                    <thead>
                        <tr>
                            <th>nama</th>
                            <th>Table Heading</th>
                            <th>Table Heading</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) {?>
                        <tr>
                            <td><?=$user->username?></td>
                            <td><?=$user->secret?></td>
                            <td>Table Data</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- Pagination -->
                <!-- <div class="uk-container uk-container-xlarge uk-margin-top">
                    </?= $pager->links('news', 'uikit_full') ?>
                </div> -->
                <!-- Pagination End -->
            </div>
        </div>
    </div>
<?= $this->endSection() ?>