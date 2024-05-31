<?= $this->extend('dashboard') ?>

<?= $this->section('content') ?>
<div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-2@s uk-margin-right" uk-grid uk-height-match="target: div > .uk-card;">
    <div>
        <div class="uk-card uk-card-default">
            <div class="uk-card-header" style="background-color: red;">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-1-2@m">
                        <h3 class="uk-card-title uk-margin-remove-bottom" style="color: white;">Pengaduan Masyarakat</h3>
                        <p class="uk-text-meta uk-margin-remove-top uk-light">Daftar Aduan Masyarakat</p>
                    </div>
                    <div class="uk-width-1-2@m uk-text-right@m uk-text-center">
                        <a class="uk-button uk-button-primary" href="dashboard/exportaduan" target="_blank">Export Pengaduan</a>
                    </div>
                </div>
            </div>
            <div class="uk-card-body uk-overflow-auto">
                <table class="uk-table uk-table-striped">
                    <thead>
                        <tr>
                            <th class="uk-table-expand">Tanggal</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No.Telefon</th>
                            <th class="uk-table-expand">Jenis Aduan</th>
                            <th>Pengaduan</th>
                            <th class="uk-table-expand">Penanggung Jawab</th>
                            <th class="uk-text-center">Detail</th>
                            <th class="uk-text-center">Aksi</th>
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
                                <td id="dateaduan<?= $aduan['id'] ?>"></td>
                                <td><?=$aduan['name']?></td>
                                <td><?=$aduan['email']?></td>
                                <td><a class='uk-link-reset' href='https://wa.me/+62<?=$aduan['phone']?>?text=Selemat%20Siang%20bapak%2Fibu%20<?=$aduan['name']?>.%0ASehubungan%20dengan%20pengaduan%20<?=$aduan['note']?>.' target='_blank'><?=$aduan['phone']?></a></td>
                                <td>
                                    <?php if ($aduan['type'] == 0) {
                                        echo 'Saran';
                                    } else {
                                        echo 'Kerusakan';
                                    } ?>
                                </td>
                                <td class="uk-text-truncate"><?=$aduan['note']?></td>
                                <td id="pj<?= $aduan['id'] ?>">
                                    <?php foreach ($users as $name) {
                                        if ($name['id'] === $aduan['userid']) {
                                            echo $name['username'];
                                        }
                                    } ?>
                                </td>
                                <td class="uk-text-center"><a href="#modal-aduan<?=$aduan['id']?>" uk-toggle><span uk-icon="eye"></span></a></td>
                                <td>
                                    <a class="uk-icon-button" uk-icon="icon: trash; ratio:1" href="dashboard/pengaduan/delete/<?= $aduan['id'] ?>" style="background-color: red; color: white;" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                </td>
                            </tr>
                            <script>
                                // Date In Indonesia
                                var publishupdate   = "<?= $aduan['created_at'] ?>";
                                var thatdate        = publishupdate.split( /[- :]/ );
                                thatdate[1]--;
                                var publishthatdate = new Date( ...thatdate );
                                var publishyear     = publishthatdate.getFullYear();
                                var publishmonth    = publishthatdate.getMonth();
                                var publishdate     = publishthatdate.getDate();
                                var publishday      = publishthatdate.getDay();

                                switch(publishday) {
                                    case 0: publishday     = "Minggu"; break;
                                    case 1: publishday     = "Senin"; break;
                                    case 2: publishday     = "Selasa"; break;
                                    case 3: publishday     = "Rabu"; break;
                                    case 4: publishday     = "Kamis"; break;
                                    case 5: publishday     = "Jum'at"; break;
                                    case 6: publishday     = "Sabtu"; break;
                                }
                                switch(publishmonth) {
                                    case 0: publishmonth   = "Januari"; break;
                                    case 1: publishmonth   = "Februari"; break;
                                    case 2: publishmonth   = "Maret"; break;
                                    case 3: publishmonth   = "April"; break;
                                    case 4: publishmonth   = "Mei"; break;
                                    case 5: publishmonth   = "Juni"; break;
                                    case 6: publishmonth   = "Juli"; break;
                                    case 7: publishmonth   = "Agustus"; break;
                                    case 8: publishmonth   = "September"; break;
                                    case 9: publishmonth   = "Oktober"; break;
                                    case 10: publishmonth  = "November"; break;
                                    case 11: publishmonth  = "Desember"; break;
                                }
                                
                                var publishfulldate         = publishday + ", " + publishdate + " " + publishmonth + " " + publishyear;
                                document.getElementById("dateaduan<?= $aduan['id'] ?>").innerHTML = publishfulldate;

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

                                    var elementaduan = document.getElementById("buttonaduan<?= $aduan['id'] ?>");
                                    elementaduan.remove();

                                    var bodyaduan       = document.getElementById('bodyaduan<?= $aduan['id'] ?>');

                                    var aduangrid       = document.createElement('div');
                                    aduangrid.setAttribute('uk-grid', '');
                                    aduangrid.setAttribute('class', 'uk-margin-small-top');

                                    var divgrid1        = document.createElement('div');
                                    divgrid1.setAttribute('class', 'uk-width-1-4@m')

                                    var divgrid2        = document.createElement('div');
                                    divgrid2.setAttribute('class', 'uk-width-expand@m')

                                    var divcontent      = document.createElement('div');
                                    divcontent.setAttribute('class', 'uk-text-bolder')
                                    divcontent.innerHTML    = "Penanggung Jawab"

                                    var divuser         = document.createElement('div');
                                    divuser.setAttribute('class', '');
                                    divuser.innerHTML   = '<?= $user['username'] ?>';
                                    
                                    divgrid1.appendChild(divcontent);
                                    divgrid2.appendChild(divuser);
                                    aduangrid.appendChild(divgrid1);
                                    aduangrid.appendChild(divgrid2);
                                    bodyaduan.appendChild(aduangrid);

                                    var namepj          = document.getElementById('pj<?= $aduan['id'] ?>');
                                    namepj.innerHTML    = '<?= $user['username'] ?>';
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
                    <div class="uk-width-1-2@m">
                        <h3 class="uk-card-title uk-margin-remove-bottom">Daftar Permohonan</h3>
                        <p class="uk-text-meta uk-margin-remove-top uk-light">Daftar Permohonan Informasi</p>
                    </div>
                    <div class="uk-width-1-2@m uk-text-right@m uk-text-center">
                        <a class="uk-button uk-button-primary" href="dashboard/exportpermohonan" target="_blank">Export Permohonan</a>
                    </div>
                </div>
            </div>
            <div class="uk-card-body uk-overflow-auto">
                <table class="uk-table uk-table-striped">
                    <thead>
                        <tr>
                            <th class="uk-table-expand">Tanggal</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th class="uk-table-expand">Pekerjaan</th>
                            <th>No.Telefon</th>
                            <th>Permohonan</th>
                            <th>Penanggung Jawab</th>
                            <th class="uk-text-center">Detail</th>
                            <th class="uk-text-center">Aksi</th>
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
                                <td id="datemohon<?= $mohon['id'] ?>"></td>
                                <td><?=$mohon['name']?></td>
                                <td class="uk-text-truncate"><?=$mohon['address']?></td>
                                <td><?=$mohon['jobs']?></td>
                                <td><a class='uk-link-reset' href='https://wa.me/+62<?=$mohon['phone']?>?text=Selemat%20Siang%20bapak%2Fibu%20<?=$mohon['name']?>.%0ASehubungan%20dengan%20permohonan%20informasi%20<?=$mohon['note']?>.' target='_blank'><?=$mohon['phone']?></a></td>
                                <td class="uk-text-truncate"><?=$mohon['note']?></td>
                                <td id="pjmohon<?= $mohon['id'] ?>">
                                    <?php foreach ($users as $name) {
                                        if ($name['id'] === $mohon['userid']) {
                                            echo $name['username'];
                                        }
                                    } ?>
                                </td>
                                <td class="uk-text-center"><a href="#modal-permohonan<?=$mohon['id']?>" uk-toggle><span uk-icon="eye"></span></a></td>
                                <td>
                                    <a class="uk-icon-button" uk-icon="icon: trash; ratio:1" href="dashboard/permohonan/delete/<?= $mohon['id'] ?>" style="background-color: red; color: white;" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                </td>
                            </tr>
                            <script>
                                // Date In Indonesia
                                var publishupdate   = "<?= $mohon['created_at'] ?>";
                                var thatdate        = publishupdate.split( /[- :]/ );
                                thatdate[1]--;
                                var publishthatdate = new Date( ...thatdate );
                                var publishyear     = publishthatdate.getFullYear();
                                var publishmonth    = publishthatdate.getMonth();
                                var publishdate     = publishthatdate.getDate();
                                var publishday      = publishthatdate.getDay();

                                switch(publishday) {
                                    case 0: publishday     = "Minggu"; break;
                                    case 1: publishday     = "Senin"; break;
                                    case 2: publishday     = "Selasa"; break;
                                    case 3: publishday     = "Rabu"; break;
                                    case 4: publishday     = "Kamis"; break;
                                    case 5: publishday     = "Jum'at"; break;
                                    case 6: publishday     = "Sabtu"; break;
                                }
                                switch(publishmonth) {
                                    case 0: publishmonth   = "Januari"; break;
                                    case 1: publishmonth   = "Februari"; break;
                                    case 2: publishmonth   = "Maret"; break;
                                    case 3: publishmonth   = "April"; break;
                                    case 4: publishmonth   = "Mei"; break;
                                    case 5: publishmonth   = "Juni"; break;
                                    case 6: publishmonth   = "Juli"; break;
                                    case 7: publishmonth   = "Agustus"; break;
                                    case 8: publishmonth   = "September"; break;
                                    case 9: publishmonth   = "Oktober"; break;
                                    case 10: publishmonth  = "November"; break;
                                    case 11: publishmonth  = "Desember"; break;
                                }

                                var publishfulldate         = publishday + ", " + publishdate + " " + publishmonth + " " + publishyear;
                                document.getElementById("datemohon<?= $mohon['id'] ?>").innerHTML = publishfulldate;

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

                                    var elementmohon = document.getElementById("buttonmohon<?= $mohon['id'] ?>");
                                    elementmohon.remove();

                                    var bodymohon       = document.getElementById('bodymohon<?= $mohon['id'] ?>');

                                    var mohongrid       = document.createElement('div');
                                    mohongrid.setAttribute('uk-grid', '');
                                    mohongrid.setAttribute('class', 'uk-margin-small-top');

                                    var gridmohon1        = document.createElement('div');
                                    gridmohon1.setAttribute('class', 'uk-width-1-4@m')

                                    var gridmohon2        = document.createElement('div');
                                    gridmohon2.setAttribute('class', 'uk-width-expand@m')

                                    var mohoncontent      = document.createElement('div');
                                    mohoncontent.setAttribute('class', 'uk-text-bolder')
                                    mohoncontent.innerHTML    = "Penanggung Jawab"

                                    var mohonuser         = document.createElement('div');
                                    mohonuser.setAttribute('class', '');
                                    mohonuser.innerHTML   = '<?= $user['username'] ?>';
                                    
                                    gridmohon1.appendChild(mohoncontent);
                                    gridmohon2.appendChild(mohonuser);
                                    mohongrid.appendChild(gridmohon1);
                                    mohongrid.appendChild(gridmohon2);
                                    bodymohon.appendChild(mohongrid);

                                    var pjmohon          = document.getElementById('pjmohon<?= $mohon['id'] ?>');
                                    pjmohon.innerHTML    = '<?= $user['username'] ?>';
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
    <div>
        <div class="uk-card uk-card-default">
            <div class="uk-card-header" style="background-color: orange;">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-1-1">
                        <h3 class="uk-card-title uk-margin-remove-bottom" style="color: white;">Laporan Gratifikasi</h3>
                        <p class="uk-text-meta uk-margin-remove-top uk-light">Daftar Laporan Gratifikasi</p>
                    </div>
                    <!-- <div class="uk-width-1-2 uk-text-right">
                        <a class="uk-button uk-button-primary" href="dashboard/exportgratifikasi" target="_blank">Export Gratifikasi</a>
                    </div> -->
                </div>
            </div>
            <div class="uk-card-body uk-overflow-auto">
                <table class="uk-table uk-table-striped">
                    <thead>
                        <tr>
                            <th class="uk-table-expand">Tanggal</th>
                            <th class="uk-table-expand">Jam</th>
                            <th class="uk-table-expand">Penanggung Jawab</th>
                            <th class="uk-text-center">Detail</th>
                            <th class="uk-text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($gratifikasi as $grat) {?>
                        <?php
                        $bold = ""; 
                        if($grat['status'] === "0"){
                            $bold = "uk-text-bolder";
                        }
                        ?>
                            <tr id="rowgratifikasi<?=$grat['id']?>" class="<?=$bold?>">
                                <td id="dategratifikasi<?= $grat['id'] ?>"></td>
                                <td id="clock<?= $grat['id'] ?>"></td>
                                <td id="pjgrat<?= $grat['id'] ?>">
                                    <?php foreach ($users as $name) {
                                        if ($name['id'] === $grat['userid']) {
                                            echo $name['username'];
                                        }
                                    } ?>
                                </td>
                                <td class="uk-text-center"><a href="#modal-gratifikasi<?=$grat['id']?>" uk-toggle><span uk-icon="eye"></span></a></td>
                                <td>
                                    <a class="uk-icon-button" uk-icon="icon: trash; ratio:1" href="dashboard/gratifikasi/delete/<?= $grat['id'] ?>" style="background-color: red; color: white;" onclick="return confirm('Anda yakin ingin menghapus data ini?')"></a>
                                </td>
                            </tr>
                            <script>
                                // Date In Indonesia
                                var publishupdate   = "<?= $grat['created_at'] ?>";
                                var thatdate        = publishupdate.split( /[- :]/ );
                                thatdate[1]--;
                                var publishthatdate = new Date( ...thatdate );
                                var publishyear     = publishthatdate.getFullYear();
                                var publishmonth    = publishthatdate.getMonth();
                                var publishdate     = publishthatdate.getDate();
                                var publishday      = publishthatdate.getDay();
                                var publishhour     = publishthatdate.getHours();
                                var publishminutes  = publishthatdate.getMinutes();
                                if (publishminutes < 10) {
                                    publishminutes = '0' + publishminutes;
                                } else {
                                    publishminutes = publishminutes + '';
                                }

                                switch(publishday) {
                                    case 0: publishday     = "Minggu"; break;
                                    case 1: publishday     = "Senin"; break;
                                    case 2: publishday     = "Selasa"; break;
                                    case 3: publishday     = "Rabu"; break;
                                    case 4: publishday     = "Kamis"; break;
                                    case 5: publishday     = "Jum'at"; break;
                                    case 6: publishday     = "Sabtu"; break;
                                }
                                switch(publishmonth) {
                                    case 0: publishmonth   = "Januari"; break;
                                    case 1: publishmonth   = "Februari"; break;
                                    case 2: publishmonth   = "Maret"; break;
                                    case 3: publishmonth   = "April"; break;
                                    case 4: publishmonth   = "Mei"; break;
                                    case 5: publishmonth   = "Juni"; break;
                                    case 6: publishmonth   = "Juli"; break;
                                    case 7: publishmonth   = "Agustus"; break;
                                    case 8: publishmonth   = "September"; break;
                                    case 9: publishmonth   = "Oktober"; break;
                                    case 10: publishmonth  = "November"; break;
                                    case 11: publishmonth  = "Desember"; break;
                                }
                                
                                var publishfulldate         = publishday + ", " + publishdate + " " + publishmonth + " " + publishyear;
                                var publishfullclock        = publishhour + ":" + publishminutes;
                                document.getElementById("dategratifikasi<?= $grat['id'] ?>").innerHTML = publishfulldate;
                                document.getElementById("clock<?= $grat['id'] ?>").innerHTML = publishfullclock;

                                function statusGrat<?= $grat['id']; ?>() {
                                    $.ajax({
                                        url: "dashboard/laporgratifikasi/<?= $grat['id'] ?>",
                                        method: "POST",
                                        data: {
                                            grat: <?= $grat['id'] ?>,
                                        },
                                        dataType: "json",
                                        error: function() {
                                            console.log('error', arguments);
                                        },
                                        success: function() {
                                            console.log('success', arguments);
                                            $("#rowgratifikasi<?=$grat['id']?>").removeAttr("class");
                                        },
                                    })

                                    var elementgrat = document.getElementById("buttongrat<?= $grat['id'] ?>");
                                    elementgrat.remove();

                                    var bodygrat       = document.getElementById('bodygrat<?= $grat['id'] ?>');

                                    var gratgrid       = document.createElement('div');
                                    gratgrid.setAttribute('uk-grid', '');
                                    gratgrid.setAttribute('class', 'uk-margin-small-top');

                                    var divgrid1        = document.createElement('div');
                                    divgrid1.setAttribute('class', 'uk-width-1-4@m')

                                    var divgrid2        = document.createElement('div');
                                    divgrid2.setAttribute('class', 'uk-width-expand@m')

                                    var divcontent      = document.createElement('div');
                                    divcontent.setAttribute('class', 'uk-text-bolder')
                                    divcontent.innerHTML    = "Penanggung Jawab"

                                    var divuser         = document.createElement('div');
                                    divuser.setAttribute('class', '');
                                    divuser.innerHTML   = '<?= $user['username'] ?>';
                                    
                                    divgrid1.appendChild(divcontent);
                                    divgrid2.appendChild(divuser);
                                    gratgrid.appendChild(divgrid1);
                                    gratgrid.appendChild(divgrid2);
                                    bodygrat.appendChild(gratgrid);

                                    var namepjgrat          = document.getElementById('pjgrat<?= $grat['id'] ?>');
                                    namepjgrat.innerHTML    = '<?= $user['username'] ?>';
                                }
                            </script>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="uk-card-footer">
                 <!-- Pagination -->
                <div class="uk-container uk-container-large">
                    <?= $pagergratifikasi->links('gratifikasi', 'uikit_full') ?>
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
                <div class="uk-modal-body" id="bodyaduan<?= $aduan['id'] ?>">
                    <div uk-grid>
                        <div class="uk-width-1-4@m">
                            <div class="uk-text-bolder">Tanggal</div>
                        </div>
                        <div class="uk-width-expand@m">
                            <div id="tanggaladuan<?= $aduan['id'] ?>"></div>
                        </div>
                    </div>
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
                    <?php if ($aduan['status'] == '1') { ?>
                        <div class="uk-margin-small-top" uk-grid>
                            <div class="uk-width-1-4@m">
                                <div class="uk-text-bolder">Penanggung Jawab</div>
                            </div>
                            <div class="uk-width-expand@m">
                                <div class="">
                                    <?php foreach ($users as $name) {
                                        if ($name['id'] === $aduan['userid']) {
                                            echo $name['username'];
                                        }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php if ($aduan['status'] == '0') { ?>
                    <div class="uk-modal-footer">
                        <div class="uk-text-right">
                            <button class="uk-button uk-button-primary" onclick="statusAduan<?=$aduan['id']; ?>()" id="buttonaduan<?= $aduan['id'] ?>">Tindak Lanjuti</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <script>
            // Date In Indonesia
            var publishupdate   = "<?= $aduan['created_at'] ?>";
            var thatdate        = publishupdate.split( /[- :]/ );
            thatdate[1]--;
            var publishthatdate = new Date( ...thatdate );
            var publishyear     = publishthatdate.getFullYear();
            var publishmonth    = publishthatdate.getMonth();
            var publishdate     = publishthatdate.getDate();
            var publishday      = publishthatdate.getDay();

            switch(publishday) {
                case 0: publishday     = "Minggu"; break;
                case 1: publishday     = "Senin"; break;
                case 2: publishday     = "Selasa"; break;
                case 3: publishday     = "Rabu"; break;
                case 4: publishday     = "Kamis"; break;
                case 5: publishday     = "Jum'at"; break;
                case 6: publishday     = "Sabtu"; break;
            }
            switch(publishmonth) {
                case 0: publishmonth   = "Januari"; break;
                case 1: publishmonth   = "Februari"; break;
                case 2: publishmonth   = "Maret"; break;
                case 3: publishmonth   = "April"; break;
                case 4: publishmonth   = "Mei"; break;
                case 5: publishmonth   = "Juni"; break;
                case 6: publishmonth   = "Juli"; break;
                case 7: publishmonth   = "Agustus"; break;
                case 8: publishmonth   = "September"; break;
                case 9: publishmonth   = "Oktober"; break;
                case 10: publishmonth  = "November"; break;
                case 11: publishmonth  = "Desember"; break;
            }
            
            var publishfulldate         = publishday + ", " + publishdate + " " + publishmonth + " " + publishyear;
            document.getElementById("tanggaladuan<?= $aduan['id'] ?>").innerHTML = publishfulldate;
        </script>
    <?php } ?>
    <!-- End Modal Pengaduan -->

    <!-- Modal Permohonan -->
    <?php foreach($permohonan as $mohon) {?>
        <div id="modal-permohonan<?=$mohon['id']?>" uk-modal>
            <div class="uk-modal-dialog">
                <button class="uk-modal-close-default uk-light" type="button" uk-close></button>
                <div class="uk-modal-header" style="background-color: #1e87f0;">
                    <h2 class="uk-card-title uk-text-bolder" style="color: white;">Detail Permohonan</h2>
                </div>
                <div class="uk-modal-body" id="bodymohon<?= $mohon['id'] ?>">
                    <div uk-grid>
                        <div class="uk-width-1-4@m">
                            <div class="uk-text-bolder">Tanggal</div>
                        </div>
                        <div class="uk-width-expand@m">
                            <div id="tanggalmohon<?= $mohon['id'] ?>"></div>
                        </div>
                    </div>
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
                    <?php if ($mohon['status'] == '1') { ?>
                        <div class="uk-margin-small-top" uk-grid>
                            <div class="uk-width-1-4@m">
                                <div class="uk-text-bolder">Penanggung Jawab</div>
                            </div>
                            <div class="uk-width-expand@m">
                                <div class="">
                                    <?php foreach ($users as $name) {
                                        if ($name['id'] === $mohon['userid']) {
                                            echo $name['username'];
                                        }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php if ($mohon['status'] == '0') { ?>
                    <div class="uk-modal-footer">
                        <div class="uk-text-right">
                            <button class="uk-button uk-button-primary" onclick="permohonan<?=$mohon['id']; ?>()" id="buttonmohon<?= $mohon['id'] ?>">Tindak Lanjuti</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <script>
            // Date In Indonesia
            var publishupdate   = "<?= $mohon['created_at'] ?>";
            var thatdate        = publishupdate.split( /[- :]/ );
            thatdate[1]--;
            var publishthatdate = new Date( ...thatdate );
            var publishyear     = publishthatdate.getFullYear();
            var publishmonth    = publishthatdate.getMonth();
            var publishdate     = publishthatdate.getDate();
            var publishday      = publishthatdate.getDay();

            switch(publishday) {
                case 0: publishday     = "Minggu"; break;
                case 1: publishday     = "Senin"; break;
                case 2: publishday     = "Selasa"; break;
                case 3: publishday     = "Rabu"; break;
                case 4: publishday     = "Kamis"; break;
                case 5: publishday     = "Jum'at"; break;
                case 6: publishday     = "Sabtu"; break;
            }
            switch(publishmonth) {
                case 0: publishmonth   = "Januari"; break;
                case 1: publishmonth   = "Februari"; break;
                case 2: publishmonth   = "Maret"; break;
                case 3: publishmonth   = "April"; break;
                case 4: publishmonth   = "Mei"; break;
                case 5: publishmonth   = "Juni"; break;
                case 6: publishmonth   = "Juli"; break;
                case 7: publishmonth   = "Agustus"; break;
                case 8: publishmonth   = "September"; break;
                case 9: publishmonth   = "Oktober"; break;
                case 10: publishmonth  = "November"; break;
                case 11: publishmonth  = "Desember"; break;
            }

            var publishfulldate         = publishday + ", " + publishdate + " " + publishmonth + " " + publishyear;
            document.getElementById("tanggalmohon<?= $mohon['id'] ?>").innerHTML = publishfulldate;
        </script>
    <?php } ?>
    <!-- End Modal Permohonan -->

    <!-- Modal Gratifikasi -->
    <?php foreach ($gratifikasi as $grat) {
        $content    = json_decode($grat['content']);
        $arrcontent = (array)$content;
        // print_r($arrcontent);
        // $title      = ucfirst(preg_replace('/\s+/', ' ', $arrcontent['nama_pengirim'])) ?>
        <div id="modal-gratifikasi<?=$grat['id']?>" uk-modal>
            <div class="uk-modal-dialog">
                <button class="uk-modal-close-default uk-light" type="button" uk-close></button>
                <div class="uk-modal-header" style="background-color: orange;">
                    <h2 class="uk-card-title uk-text-bolder" style="color: white;">Detail Gratifikasi</h2>
                </div>
                <div class="uk-modal-body" id="bodygrat<?= $grat['id'] ?>">
                    <div class="uk-margin" uk-grid>
                        <div class="uk-width-1-4@m">
                            <div class="uk-text-bolder">Tanggal</div>
                        </div>
                        <div class="uk-width-expand@m">
                            <div id="tanggalgrat<?= $grat['id'] ?>"></div>
                        </div>
                    </div>
                    <div class="uk-margin" uk-grid>
                        <div class="uk-width-1-4@m">
                            <div class="uk-text-bolder">Jam</div>
                        </div>
                        <div class="uk-width-expand@m">
                            <div id="jamgrat<?= $grat['id'] ?>"></div>
                        </div>
                    </div>
                    <?php
                    foreach ($arrcontent as $title => $value) {
                        $val = (array)$value; ?>
                        <div class="uk-margin uk-margin-small-bottom" uk-grid>
                            <div class="uk-width-1-4@m">
                                <div class="uk-text-bolder"><?= preg_replace('/\s\s+/', ' ', ucfirst($title)) ?></div>
                            </div>
                            <div class="uk-width-1-1@m uk-margin-small">
                                <div>
                                    <?php
                                    foreach ($val as $key => $data) { ?>
                                        <a class="uk-link-reset" href="gratifikasi/<?= $data ?>" target="_blank"><?= $data ?></a>
                                    <?php
                                    }
                                    ?>    
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <?php if ($grat['status'] == '1') { ?>
                        <div class="uk-margin-small-top" uk-grid>
                            <div class="uk-width-1-4@m">
                                <div class="uk-text-bolder">Penanggung Jawab</div>
                            </div>
                            <div class="uk-width-expand@m">
                                <div class="">
                                    <?php foreach ($users as $name) {
                                        if ($name['id'] === $grat['userid']) {
                                            echo $name['username'];
                                        }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php if ($grat['status'] == '0') { ?>
                    <div class="uk-modal-footer">
                        <div class="uk-text-right">
                            <button class="uk-button uk-button-primary" onclick="statusGrat<?=$grat['id']; ?>()" id="buttongrat<?= $grat['id'] ?>">Tindak Lanjuti</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <script>
            // Date In Indonesia
            var publishupdate   = "<?= $grat['created_at'] ?>";
            var thatdate        = publishupdate.split( /[- :]/ );
            thatdate[1]--;
            var publishthatdate = new Date( ...thatdate );
            var publishyear     = publishthatdate.getFullYear();
            var publishmonth    = publishthatdate.getMonth();
            var publishdate     = publishthatdate.getDate();
            var publishday      = publishthatdate.getDay();
            var publishhour     = publishthatdate.getHours();
            var publishminutes  = publishthatdate.getMinutes();
            if (publishminutes < 10) {
                publishminutes = '0' + publishminutes;
            } else {
                publishminutes = publishminutes + '';
            }

            switch(publishday) {
                case 0: publishday     = "Minggu"; break;
                case 1: publishday     = "Senin"; break;
                case 2: publishday     = "Selasa"; break;
                case 3: publishday     = "Rabu"; break;
                case 4: publishday     = "Kamis"; break;
                case 5: publishday     = "Jum'at"; break;
                case 6: publishday     = "Sabtu"; break;
            }
            switch(publishmonth) {
                case 0: publishmonth   = "Januari"; break;
                case 1: publishmonth   = "Februari"; break;
                case 2: publishmonth   = "Maret"; break;
                case 3: publishmonth   = "April"; break;
                case 4: publishmonth   = "Mei"; break;
                case 5: publishmonth   = "Juni"; break;
                case 6: publishmonth   = "Juli"; break;
                case 7: publishmonth   = "Agustus"; break;
                case 8: publishmonth   = "September"; break;
                case 9: publishmonth   = "Oktober"; break;
                case 10: publishmonth  = "November"; break;
                case 11: publishmonth  = "Desember"; break;
            }
            
            var publishfulldate         = publishday + ", " + publishdate + " " + publishmonth + " " + publishyear;
            var publishfullclock        = publishhour + ":" + publishminutes;
            document.getElementById("tanggalgrat<?= $grat['id'] ?>").innerHTML = publishfulldate;
            document.getElementById("jamgrat<?= $grat['id'] ?>").innerHTML = publishfullclock;
        </script>
    <?php } ?>
    <!-- End Modal Gratifikasi -->

</div>

<?= $this->endSection() ?>