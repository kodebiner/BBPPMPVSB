<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

<div class="uk-card uk-card-small uk-card-body uk-margin-large-right" style="background-color: rgba(60, 105, 151, .8);">
    <h3 class="uk-card-title uk-light" style="color: white;">&nbsp;&nbsp;Kelola Pengguna</h3>
</div>
<div class="uk-card uk-card-default uk-margin-large-right">
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
                        <th>Email</th>
                        <th>Akun</th>
                        <th>Kelola Akun</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?= $user['name']?></td>
                            <td><?= $user['email']?></td>
                            <td><?= $user['group'] ?></td>
                            <td>
                                <div>
                                    <div class="uk-button-group">
                                    <a style="background-color: rgba(60, 105, 151, .8); color: white;" class="uk-button uk-botton-small uk-light" href="dashboard/editusers/<?= $user['id'] ?>"><span uk-icon="icon: file-edit; ratio:1"></span></a>
                                    <a style="background-color: red; color: white;" onclick="removeArtista" class="uk-button uk-botton-small uk-light uk-margin-small-left"><span uk-icon="trash"></span></a>
                                    </div>
                                </div>
                            </td>
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