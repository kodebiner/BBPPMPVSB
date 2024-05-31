<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengaduan</title>
    <style>
        html {
            font-size: 8pt
        }

        hr {
            margin: 0;
        }

        table,
        th,
        td {
            /* border: 1pt solid black; */
            border-collapse: collapse;
            padding: 3px;
        }
    </style>
</head>

<body>
    <?php
	header("Content-type: application/vnd-ms-excel");
    $bulan  = date("m",strtotime($startdate));
    $tahun  = date("Y",strtotime($startdate));
    if ($bulan == 1) {
        $bulans = 'Bulan-Januari';
    }
    elseif ($bulan == 2) {
        $bulans = 'Bulan-Februari';
    }
    elseif ($bulan == 3) {
        $bulans = 'Bulan-Maret';
    }
    elseif ($bulan == 4) {
        $bulans = 'Bulan-April';
    }
    elseif ($bulan == 5) {
        $bulans = 'Bulan-Mei';
    }
    elseif ($bulan == 6) {
        $bulans = 'Bulan-Juni';
    }
    elseif ($bulan == 7) {
        $bulans = 'Bulan-Juli';
    }
    elseif ($bulan == 8) {
        $bulans = 'Bulan-Agustus';
    }
    elseif ($bulan == 9) {
        $bulans = 'Bulan-September';
    }
    elseif ($bulan == 10) {
        $bulans = 'Bulan-Oktober';
    }
    elseif ($bulan == 11) {
        $bulans = 'Bulan-November';
    }
    elseif ($bulan == 12) {
        $bulans = 'Bulan-Desember';
    }
	header("Content-Disposition: attachment; filename=Daftar-Pengaduan-".$bulans."-".$tahun.".xls");
	?>

    <div style="text-align: center; font-size: 30px; font-weight: 800;">Laporan Pengaduan Masyarakat</div>
    <div style="text-align: center; font-size: 20px; font-weight: 600;">
        <?php
            $month  = date("m",strtotime($startdate));
            $years  = date("Y",strtotime($startdate));
            if ($month == 1) {
                echo 'Bulan Januari '.$years;
            }
            elseif ($month == 2) {
                echo 'Bulan Februari '.$years;
            }
            elseif ($month == 3) {
                echo 'Bulan Maret '.$years;
            }
            elseif ($month == 4) {
                echo 'Bulan April '.$years;
            }
            elseif ($month == 5) {
                echo 'Bulan Mei '.$years;
            }
            elseif ($month == 6) {
                echo 'Bulan Juni '.$years;
            }
            elseif ($month == 7) {
                echo 'Bulan Juli '.$years;
            }
            elseif ($month == 8) {
                echo 'Bulan Agustus '.$years;
            }
            elseif ($month == 9) {
                echo 'Bulan September '.$years;
            }
            elseif ($month == 10) {
                echo 'Bulan Oktober '.$years;
            }
            elseif ($month == 11) {
                echo 'Bulan November '.$years;
            }
            elseif ($month == 12) {
                echo 'Bulan Desember '.$years;
            }
        ?>
    </div>

    <table>
        <tr></tr>
        <thead>
            <tr>
                <th style="margin: 15px;">Tanggal</th>
                <th style="margin: 15px;">Nama</th>
                <th style="margin: 15px;">Email</th>
                <th style="margin: 15px;">Nomor Telfon / WA</th>
                <th style="margin: 15px;">Jenis Aduan</th>
                <th style="margin: 15px;">Pengaduan</th>
                <th style="margin: 15px;">Penanggung Jawab</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pengaduan as $aduan) { ?>
                <tr>
                    <td style="margin: 15px;"><?= $aduan['created_at'] ?></td>
                    <td style="margin: 15px;"><?= $aduan['name'] ?></td>
                    <td style="margin: 15px;"><?= $aduan['email'] ?></td>
                    <td style="margin: 15px;"><?= $aduan['phone'] ?></td>
                    <td style="margin: 15px;">
                        <?php if ($aduan['type'] == 0) {
                            echo 'Saran';
                        } else {
                            echo 'Kerusakan';
                        } ?>
                    </td>
                    <td style="margin: 15px;"><?= $aduan['note'] ?></td>
                    <td style="margin: 15px;">
                        <?php if ($aduan['userid'] != null) {
                            foreach ($users as $name) {
                                if ($name['id'] === $aduan['userid']) {
                                    echo $name['username'];
                                }
                            }
                        } else {
                            echo 'Belum di Tindak Lanjuti';
                        } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>