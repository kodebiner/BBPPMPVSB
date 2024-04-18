<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>

    <div class="uk-card uk-card-small uk-card-body uk-margin-xlarge-right uk-light" style="background-color: rgba(60, 105, 151, .8);">
        <h3 class="uk-card-title">Ubah Data Artista</h3>
    </div>

    <div class="uk-card uk-card-default uk-margin-xlarge-right">
        <form action="save/artista/<?=$artista['id']?>" method="post">
            <div class="uk-card-body">

            </div>
            <div class="uk-card-footer">
                <p uk-margin class="uk-text-right">
                    <button class="uk-button uk-light" style="background-color: rgba(60, 105, 151, .8); color:white;" type="submit">Simpan</button>
                    <button class="uk-button uk-button-danger">Hapus</button>
                </p>
            </div>
        </form>
    </div>
    
<?= $this->endSection() ?>