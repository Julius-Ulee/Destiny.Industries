<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f6f9fc;
        }

        .container {
            width: 100%;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow-x: auto;
        }

        h1 {
            text-align: center;
            color: #333333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #e0e6ed;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #f4f7fa;
            font-weight: 500;
            color: #555555;
            text-transform: uppercase;
        }

        table td {
            color: #333333;
        }

        .status {
            font-weight: bold;
            color: #007bff;
        }
        .transaksi th {
        padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Laporan Transaksi</h1>
        <p>Tanggal: <?php echo date('d F Y'); ?></p>
        <table class="transaksi">
            <thead>
                <tr>
                    <th width="30px">No. </th>
                    <th width="125px">Detail Order</th>
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
                        <td width="30px"><?= $i++; ?></td>
                        <td width="125px"><?= $transaction->invoice ?></td>
                        <td><?= $transaction->date ?></td>
                        <td><?= $transaction->name ?></td>
                        <td><p>Alamat : <?= $transaction->address ?>, <?= $transaction->city ?>, <?= $transaction->province ?></p></td>
                        <td><?= $transaction->phone ?></td>
                        <td><?= $transaction->courier?></td>
                        <td>Rp.<?= number_format($transaction->total + $transaction->cost_courier, 0, ',', '.') ?></td>
                        <td><span><?= $transaction->status ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
