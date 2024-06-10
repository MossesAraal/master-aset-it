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

        $npk = $_GET['npk'];
        $sql = "SELECT * FROM tb_master WHERE npk=$npk";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) :
            while($row = mysqli_fetch_assoc($result)) :
        ?>

    <div class="table-container">
        <h2 style="text-align:center;">Pengajuan Penggunaan Aset IT</h2>
        <h3 style="text-align:center;"><?= $row['no_req']; ?></h3>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Nama</th>
                <th>NPK</th>
                <th>Kebutuhan</th>
                <th>Item</th>
                <th>Department</th>
                <th>Keperluan</th>
            </tr>
            <tr>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['npk']; ?></td>
                <td><?= $row['kebutuhan']; ?></td>
                <td><?= $row['item']; ?></td>
                <td><?= $row['department']; ?></td>
                <td><?= $row['keperluan']; ?></td>
            </tr>
        <?php endwhile; endif;?>
        </table>
    </div>

    <script>
        window.print();
    </script>
</body>
</html>