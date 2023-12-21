<!-- application/views/print/report.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <style>
        /* Add print-specific styling here */
        @media print {
            /* Define styles for printing */
            body {
                font-family: Arial, sans-serif;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }
        }
    </style>
</head>
<body>
    <h1><center>Laporan Transaksi</center></h1>
    <p>Tanggal: <?php echo date('d F Y'); ?></p>
    <table>
        <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;" width="30px">No. </th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Detail Order</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Tanggal</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Nama</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Alamat</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Telepon</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Jasa Pengiriman</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Total</th>
                <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
                <?php foreach ($content as $transaction): ?>
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 8px;" width="30px"><?= $i++; ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?= $transaction->invoice ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?= $transaction->date ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?= $transaction->name ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><p>Alamat : <?= $transaction->address ?>, <?= $transaction->city ?>, <?= $transaction->province ?></p></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?= $transaction->phone ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><?= $transaction->courier?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;">Rp.<?= number_format($transaction->total + $transaction->cost_courier, 0, ',', '.') ?></td>
                        <td style="border: 1px solid #ddd; padding: 8px;"><span class="status"><?= $transaction->status ?></span></td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
