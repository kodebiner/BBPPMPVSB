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
                            <tr id="rowaduan<?=$aduan['id']?>" class="<?=$bold?>">
                                <td><?=$aduan['name']?></td>
                                <td><?=$aduan['email']?></td>
                                <td><?=$aduan['phone']?></td>
                                <td class="uk-text-truncate"><?=$aduan['note']?></td>
                                <td class="uk-text-center"><a onclick="statusAduan<?=$aduan['id']; ?>()" href="#modal-aduan<?=$aduan['id']?>" uk-toggle><span uk-icon="eye"></span></a></td>
                            </tr>
                            <script>
                                function statusAduan<?= $aduan['id']; ?>() {
                                    $.ajax({
                                        url: "dashboard/pengaduan/<?= $aduan['id'] ?>",
                                        method: "POST",
                                        data: {
                                            aduan: <?= $aduan['id'] ?>,
                                        },
                                        dataType: "json",
                                        error: function() {
                                            console.log('error', arguments);
                                        },
                                        success: function() {
                                            console.log('success', arguments);
                                            $("#rowaduan<?=$aduan['id']?>").removeAttr("class");
                                        },
                                    })
                                }
                            </script>
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
                        <h3 class="uk-card-title uk-margin-remove-bottom">Daftar Permohonan</h3>
                        <p class="uk-text-meta uk-margin-remove-top">Daftar Permohonan Informasi</p>
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
                            <?php
                                $bolder = ""; 
                                if($mohon['status'] === "0"){
                                    $bolder = "uk-text-bolder";
                                }
                            ?>
                            <tr id="rowpermohonan<?=$mohon['id']?>" class="<?=$bolder?>">
                                <td><?=$mohon['name']?></td>
                                <td class="uk-text-truncate"><?=$mohon['address']?></td>
                                <td><?=$mohon['jobs']?></td>
                                <td><?=$mohon['phone']?></td>
                                <td class="uk-text-truncate"><?=$mohon['note']?></td>
                                <td class="uk-text-center"><a href="#modal-permohonan<?=$mohon['id']?>" onclick="permohonan<?=$mohon['id']; ?>()" uk-toggle><span uk-icon="eye"></span></a></td>
                            </tr>
                            <script>
                                function permohonan<?= $mohon['id']; ?>() {
                                    $.ajax({
                                        url: "dashboard/permohonan/<?= $mohon['id'] ?>",
                                        method: "POST",
                                        data: {
                                            aduan: <?= $mohon['id'] ?>,
                                        },
                                        dataType: "json",
                                        error: function() {
                                            console.log('error', arguments);
                                        },
                                        success: function() {
                                            console.log('success', arguments);
                                            $("#rowpermohonan<?=$mohon['id']?>").removeAttr("class");
                                        },
                                    })
                                }
                            </script>
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

    <!-- Modal Pengaduan -->
    <?php foreach($pengaduan as $aduan) {?>
        <div id="modal-aduan<?=$aduan['id']?>" uk-modal>
            <div class="uk-modal-dialog">
                <button class="uk-modal-close-default uk-light" type="button" uk-close></button>
                <div class="uk-modal-header" style="background-color: red;">
                    <h2 class="uk-card-title uk-text-bolder" style="color: white;">Detail Pengaduan</h2>
                </div>
                <div class="uk-modal-body">
                    <div uk-grid>
                        <div class="uk-width-1-4@m">
                            <div class="uk-text-bolder">Nama</div>
                        </div>
                        <div class="uk-width-expand@m">
                            <div class=""><?=$aduan['name']?></div>
                        </div>
                    </div>
                    <div class="uk-margin-small-top" uk-grid>
                        <div class="uk-width-1-4@m">
                            <div class="uk-text-bolder">Email</div>
                        </div>
                        <div class="uk-width-expand@m">
                            <div class=""><?=$aduan['email']?></div>
                        </div>
                    </div>
                    <div class="uk-margin-small-top" uk-grid>
                        <div class="uk-width-1-4@m">
                            <div class="uk-text-bolder">No.Telefon</div>
                        </div>
                        <div class="uk-width-expand@m">
                            <div class=""><?=$aduan['phone']?></div>
                        </div>
                    </div>
                    <div class="uk-margin-small-top" uk-grid>
                        <div class="uk-width-1-4@m">
                            <div class="uk-text-bolder">Pengaduan</div>
                        </div>
                        <div class="uk-width-expand@m">
                            <div class=""><?=$aduan['note']?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- End Modal Pengaduan -->

    <!-- Permohonan -->
    <?php foreach($permohonan as $mohon) {?>
        <div id="modal-permohonan<?=$mohon['id']?>" uk-modal>
            <div class="uk-modal-dialog">
                <button class="uk-modal-close-default uk-light" type="button" uk-close></button>
                <div class="uk-modal-header" style="background-color: #1e87f0;">
                    <h2 class="uk-card-title uk-text-bolder" style="color: white;">Detail Permohonan</h2>
                </div>
                <div class="uk-modal-body">
                    <div uk-grid>
                        <div class="uk-width-1-4@m">
                            <div class="uk-text-bolder">Nama</div>
                        </div>
                        <div class="uk-width-expand@m">
                            <div class=""><?=$mohon['name']?></div>
                        </div>
                    </div>
                    <div class="uk-margin-small-top" uk-grid>
                        <div class="uk-width-1-4@m">
                            <div class="uk-text-bolder">Pekerjaan</div>
                        </div>
                        <div class="uk-width-expand@m">
                            <div class=""><?=$mohon['jobs']?></div>
                        </div>
                    </div>
                    <div class="uk-margin-small-top" uk-grid>
                        <div class="uk-width-1-4@m">
                            <div class="uk-text-bolder">No.Telefon</div>
                        </div>
                        <div class="uk-width-expand@m">
                            <div class=""><?=$mohon['phone']?></div>
                        </div>
                    </div>
                    <div class="uk-margin-small-top" uk-grid>
                        <div class="uk-width-1-4@m">
                            <div class="uk-text-bolder">Permohonan</div>
                        </div>
                        <div class="uk-width-expand@m">
                            <div class=""><?=$mohon['note']?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- End Modal Permohonan -->

</div>

<?= $this->endSection() ?>