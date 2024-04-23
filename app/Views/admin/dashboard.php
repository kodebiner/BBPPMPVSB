<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>
<div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-2@s uk-margin-right" uk-grid>
    <div>
        <div class="uk-card uk-card-default">
            <div class="uk-card-header" style="background-color: red;">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-margin-remove-bottom" style="color: white;">Pengaduan Masyarakat</h3>
                        <p class="uk-text-meta uk-margin-remove-top">Daftar Aduan Masyarakat</p>
                    </div>
                </div>
            </div>
            <div class="uk-card-body uk-overflow-auto">
                <table class="uk-table uk-table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No.Telefon</th>
                            <th>Pengaduan</th>
                            <th class="uk-text-center">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengaduan as $aduan) {?>
                        <?php
                        $bold = ""; 
                        if($aduan['status'] === "0"){
                            $bold = "uk-text-bolder";
                        }
                        ?>
                            <tr>
                                <td class="<?=$bold?>"><?=$aduan['name']?></td>
                                <td class="<?=$bold?>"><?=$aduan['email']?></td>
                                <td class="<?=$bold?>"><?=$aduan['phone']?></td>
                                <td class="uk-text-truncate <?=$bold?>"><?=$aduan['note']?></td>
                                <td class="uk-text-center"><a href="#modal-aduan<?=$aduan['id']?>"><span uk-icon="eye"></span></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="uk-card-footer">
                 <!-- Pagination -->
                <div class="uk-container uk-container-large">
                    <?= $pager->links('pengaduan', 'uikit_full') ?>
                </div>
                <!-- Pagination End -->
            </div>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-default">
            <div class="uk-card-header uk-tile-primary">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-margin-remove-bottom">Pelayanan Informasi</h3>
                        <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">Daftar Permohonan Informasi</time></p>
                    </div>
                </div>
            </div>
            <div class="uk-card-body uk-overflow-auto">
                <table class="uk-table uk-table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Alamat</th>
                            <th>Pekerjaan</th>
                            <th>No.Telefon</th>
                            <th>Permohonan</th>
                            <th class="uk-text-center">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($permohonan as $mohon){ ?>
                            <tr>
                                <td><?=$mohon['name']?></td>
                                <td class="uk-text-truncate"><?=$mohon['address']?></td>
                                <td><?=$mohon['jobs']?></td>
                                <td><?=$mohon['phone']?></td>
                                <td class="uk-text-truncate"><?=$mohon['note']?></td>
                                <td class="uk-text-center"><span uk-icon="eye"></span></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="uk-card-footer">
                 <!-- Pagination -->
                 <div class="uk-container uk-container-xlarge uk-margin-top">
                    <?= $pagerpermohonan->links('permohonan', 'uikit_full') ?>
                </div>
                <!-- Pagination End -->
            </div>
        </div>
    </div>

    <?php ?>
    <div id="#modal-aduan<?=$aduan['id']?>" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title">Modal Title</h2>
            </div>
            <div class="uk-modal-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary" type="button">Save</button>
            </div>
        </div>
    </div>

    
    
    <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/5anLPw0Efmo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
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