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
                <table class="uk-table uk-table-small uk-table-striped">
                    <thead>
                        <tr>
                            <th>File</th>
                            <th>Foto</th>
                            <th class="uk-text-center">Ubah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="uk-text-center"><a style="background-color: rgba(60, 105, 151, .8); color: white;" class="uk-button uk-botton-small uk-light" href="" uk-toggle><span uk-icon="icon: file-edit; ratio:1"></span></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>