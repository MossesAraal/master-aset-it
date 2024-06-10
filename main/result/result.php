<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../icon/css/all.min.css">
    <title>Dashboard - Asset IT</title>
</head>
<body>
    <div class="container">
        <div class="item title">
            <h1>Master Aset IT</h1>
        </div>
        <div class="item header">
            <h1>Master Aset IT - Result</h1>
        </div>
        <div class="item menu">
            <a href="../index.php"><div>Dashboard</div></a>
            <a href="../karyawan/karyawan.php"><div>Karyawan</div></a>
            <a href="../request/request.php"><div>Request</div></a>
            <a href="result.php"><div>Result</div></a>
        </div>
        
        <table class="table-request">
            <thead>
                <tr>
                    <th>Nomor Result</th>
                    <th>Quantity</th>
                    <th>Kode Barang</th>
                    <th>Stok Barang</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Note</th>
                    <th>Foto Item</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            require "../conn.php";

            $sql = "SELECT * FROM tb_transaksi";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
            ?>    
            <tbody>
                <td><?= $row['no_result']; ?></td>
                <td><?= $row['qty']; ?></td>
                <td><?= $row['kode_barang']; ?></td>
                <td><?= $row['stok_barang']; ?></td>
                <td><?= $row['tanggal']; ?></td>
                <td><?= $row['status']; ?></td>
                <td><?= $row['note']; ?></td>
                <td><img src="../../assets/<?= $row['foto_barang']; ?>" width="150px"></td>
                <td>
                    <a href="print.php?no_result=<?= $row['no_result']; ?>" target="_blank"><i class="fa-solid fa-print" style="color:#3C5B6F;"></i></a>
                </td>
            </tbody>    
            <?php
                }
            } else {
                echo "0";
            }   

            mysqli_close($conn);
            ?>  
        </table>
    </div>
</body>
</html>