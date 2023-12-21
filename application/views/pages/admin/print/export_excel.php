<?php 
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=".$judul.".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px;
        }

        .table-data th {
            background-color: grey;
        }

        h3 {
            font-family: Verdana;
        }
    </style>
</head>
<body>
    <h3><center>Laporan Transaksi</center></h3>
    <p>Tanggal: <?php echo date('d F Y'); ?></p>
    <br/>
    <table class="table-data">
        <thead>
            <tr>
                <th width="30px">No.</th>
                <th>Detail Order</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Jasa Pengiriman</th>
                <th>Total</th>
                <th>Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($content as $transaction): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $transaction->invoice ?></td>
                    <td><?= $transaction->date ?></td>
                    <td><?= $transaction->name ?></td>
                    <td>
                        <p>Alamat: <?= $transaction->address ?>, <?= $transaction->city ?>, <?= $transaction->province ?></p>
                    </td>
                    <td><?= $transaction->phone ?></td>
                    <td><?= $transaction->courier ?></td>
                    <td>Rp.<?= number_format($transaction->total + $transaction->cost_courier, 0, ',', '.') ?></td>
                    <td><span class="status"><?= $transaction->status ?></span></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
