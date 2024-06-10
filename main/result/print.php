<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
        require "../conn.php";

        $no_result = $_GET['no_result'];
        $sql = "SELECT * FROM tb_transaksi WHERE no_result='$no_result'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) :
            while($row = mysqli_fetch_assoc($result)) :
        ?>

    <div class="table-container">
        <h2 style="text-align:center;">Report Penggunaan Aset IT</h2>
        <h3 style="text-align:center;"><?= $row['no_result']; ?></h3>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Nomor Result</th>
                <th>Kode Barang</th>
                <th>Quantity</th>
                <th>Stok Barang</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
            <tr>
                <td style="text-align:center;"><?= $row['no_result']; ?></td>
                <td style="text-align:center;"><?= $row['kode_barang']; ?></td>
                <td style="text-align:center;"><?= $row['qty']; ?></td>
                <td style="text-align:center;"><?= $row['stok_barang']; ?></td>
                <td style="text-align:center;"><?= $row['tanggal']; ?></td>
                <td style="text-align:center;"><?= $row['status']; ?></td>
            </tr>
        <?php endwhile; endif;?>
        </table>
    </div>

    <script>
        window.print();
    </script>
</body>
</html>