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
            <h1>Master Aset IT - Request</h1>
        </div>
        <div class="item menu">
            <a href="../index.php"><div>Dashboard</div></a>
            <a href="../karyawan/karyawan.php"><div>Karyawan</div></a>
            <a href="request.php"><div>Request</div></a>
            <a href="../result/result.php"><div>Result</div></a>
        </div>
        
        <table class="table-request">
            <thead>
                <tr>
                    <th>PIC IT</th>
                    <th>Nomor Request</th>
                    <th>Department</th>
                    <th>User</th>
                    <th>Item</th>
                    <th>Quantity</th>
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
                <td><?= $row['pic_it']; ?></td>
                <td><?= $row['no_req']; ?></td>
                <td><?= $row['department']; ?></td>
                <td><?= $row['user']; ?></td>
                <td><?= $row['item']; ?></td>
                <td><?= $row['qty']; ?></td>
                <td>
                    <a href="delete_request.php?no_req=<?= $row['no_req']; ?>"><i class="fa-trash fa-solid" style="color:#3C5B6F;"></i></a> |
                    <a href="../result/form_result.php?no_result=<?= $row['no_result']; ?>"><i class="fa-solid fa-square-poll-horizontal"  style="color:#3C5B6F;"></i></a>
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