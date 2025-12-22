<?php
require_once 'connection.php';

// Query untuk mengambil data mhs
$sql = "SELECT * FROM mhs ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Query Error: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Mahasiswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f6f9;
        }

        .container {
            background: white;
            padding: 30px;
            margin: 0 auto;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
        }

        .header h1 {
            font-size: 24px;
            color: #667eea;
            margin-bottom: 5px;
        }

        .header p {
            color: #666;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        table thead {
            background-color: #667eea;
            color: white;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            font-weight: bold;
            text-align: center;
            background-color: #667eea;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f0f0f0;
        }

        table td {
            font-size: 13px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            color: #666;
            font-size: 12px;
        }

        .print-info {
            background-color: #e7f3ff;
            border-left: 4px solid #667eea;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .print-info p {
            color: #333;
            font-size: 13px;
            margin: 5px 0;
        }

        @media print {
            body {
                background-color: white;
                padding: 0;
            }

            .container {
                box-shadow: none;
                padding: 0;
                max-width: 100%;
            }

            .print-info {
                display: none;
            }

            .no-print {
                display: none !important;
            }

            table {
                page-break-inside: avoid;
            }

            table tr {
                page-break-inside: avoid;
            }
        }

        .button-group {
            margin-top: 20px;
            text-align: center;
            gap: 10px;
        }

        .button-group a,
        .button-group button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }

        .btn-print {
            background-color: #667eea;
            color: white;
            height: 40px;
        }

        .btn-print:hover {
            background-color: #5563c1;
        }

        .btn-back {
            background-color: #868e96;
            color: white;
        }

        .btn-back:hover {
            background-color: #748385;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Laporan Data Mahasiswa</h1>
        <p>Data Mahasiswa Program Studi</p>
    </div>

    <div class="print-info no-print">
        <p><strong>Tanggal Cetak:</strong> <?php echo date('d F Y H:i:s'); ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 12%;">NIM</th>
                <th style="width: 18%;">Nama Lengkap</th>
                <th style="width: 12%;">No. HP</th>
                <th style="width: 8%;">Umur</th>
                <th style="width: 15%;">Kota</th>
                <th style="width: 12%;">Jenis Kelamin</th>
                <th style="width: 18%;">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $no; ?></td>
                        <td><?php echo htmlspecialchars($row['nim'] ?? '-'); ?></td>
                        <td><?php echo htmlspecialchars($row['nama'] ?? '-'); ?></td>
                        <td style="text-align: center;"><?php echo htmlspecialchars($row['no_hp'] ?? '-'); ?></td>
                        <td style="text-align: center;"><?php echo htmlspecialchars($row['umur'] ?? '-'); ?></td>
                        <td><?php echo htmlspecialchars($row['kota'] ?? '-'); ?></td>
                        <td style="text-align: center;"><?php echo htmlspecialchars($row['jk'] ?? '-'); ?></td>
                        <td><?php echo htmlspecialchars($row['email'] ?? '-'); ?></td>
                    </tr>
                    <?php
                    $no++;
                }
            } else {
                ?>
                <tr>
                    <td colspan="8" style="text-align: center; color: #999;">Tidak ada data mahasiswa</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <!-- <div class="footer">
        <p>Laporan ini dicetak otomatis dari sistem informasi mahasiswa</p>
        <p>Halaman ini akan ditampilkan dengan lebih baik ketika dicetak ke PDF</p>
    </div> -->

    <div class="button-group no-print">
        <button class="btn-print" onclick="window.print()">Cetak / Simpan sebagai PDF</button>
        <a href="tampilDataMhs.php" class="btn-back">Kembali</a>
    </div>
</div>

</body>
</html>

<?php
mysqli_close($conn);
?>
