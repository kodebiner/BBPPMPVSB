<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>
<div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-2@s uk-margin-right" uk-grid>
    <div>
        <div class="uk-card uk-card-default">
            <div class="uk-card-header" style="background-color: red;">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <!-- <div class="uk-width-auto">
                        <img class="uk-border-circle" width="40" height="40" src="images/avatar.jpg" alt="Avatar">
                    </div> -->
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-margin-remove-bottom" style="color: white;">Pengaduan Masyarakat</h3>
                        <p class="uk-text-meta uk-margin-remove-top">Daftar Aduan Masyarakat</p>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <table class="uk-table uk-table-striped">
                    <thead>
                        <tr>
                            <th>Table Heading</th>
                            <th>Table Heading</th>
                            <th>Table Heading</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="uk-card-footer">
                <a href="#" class="uk-button uk-button-text">Selengkapnya</a>
            </div>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-tile-primary">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <!-- <div class="uk-width-auto">
                        <img class="uk-border-circle" width="40" height="40" src="images/avatar.jpg" alt="Avatar">
                    </div> -->
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-margin-remove-bottom">Pelayanan Informasi</h3>
                        <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">Daftar Permohonan Informasi</time></p>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <table class="uk-table uk-table-striped">
                    <thead>
                        <tr>
                            <th>Table Heading</th>
                            <th>Table Heading</th>
                            <th>Table Heading</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="uk-card-footer">
                <a href="#" class="uk-button uk-button-text">Selengkapnya</a>
            </div>
        </div>
    </div>
    <!-- <div>
        <div class="uk-card uk-card-default uk-card-body">Item</div>
    </div>
    <div>
        <div class="uk-card uk-card-default uk-card-body">Item</div>
    </div>
    <div>
        <div class="uk-card uk-card-default uk-card-body">Item</div>
    </div>
    <div>
        <div class="uk-card uk-card-default uk-card-body">Item</div>
    </div> -->
</div>

<?= $this->endSection() ?>