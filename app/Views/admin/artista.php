<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title uk-light">Daftar Majalah Artista</h3>
    </div>
    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <div class="uk-width-1-1">
            <a style="background-color: rgba(60, 105, 151, .8);" class="uk-button uk-botton-small uk-margin-top uk-margin-large-left uk-light" href="dashboard/addartista" uk-toggle><span uk-icon="icon: plus; ratio:0.8"></span>&nbsp;Majalah</a>
        </div>
        <div class="uk-card-body">
            <div class="uk-section uk-padding-remove-top uk-margin-right uk-overflow-auto">
                <table class="uk-table uk-table-small uk-table-striped">
                    <thead>
                        <tr>
                            <th>File</th>
                            <th>Judul</th>
                            <th>Foto</th>
                            <th class="uk-text-center">Ubah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($artista as $art){ ?>
                            <tr>
                                <td><?=$art['file']?></td>
                                <td><?=$art['file']?></td>
                                <td>
                                    <div uk-lightbox>
                                        <a href="images/artista/<?=$art['photo']?>"><img class="uk-border-circle" width="50" height="50" src="images/artista/<?=$art['photo']?>" alt="<?=$art['photo']?>"></a>
                                    </div>
                                </td>
                                <td class="uk-text-center"><a style="background-color: rgba(60, 105, 151, .8);" class="uk-button uk-botton-small uk-light" href="dashboard/editartista/<?=$art['id']?>" uk-toggle><span uk-icon="icon: file-edit; ratio:1"></span></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>