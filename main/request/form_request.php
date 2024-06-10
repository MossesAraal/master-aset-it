<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Dashboard - Asset IT</title>
</head>
<body>
    <div class="container">
        <div class="item title">
            <h1>Master Aset IT</h1>
        </div>
        <div class="item header">
            <h1>Master Aset IT - Form Request</h1>
        </div>
        <div class="item menu">
            <a href="../index.php"><div>Dashboard</div></a>
            <a href="../karyawan/karyawan.php"><div>Karyawan</div></a>
            <a href="request.php"><div>Request</div></a>
            <a href="../result/result.php"><div>Result</div></a>
        </div>
        <div class="item form-karyawan">
            <div>
            <?php
            require "../conn.php";
            $npk = $_GET["npk"];

            $tbMaster = "SELECT * FROM tb_master WHERE npk=$npk";
            $result = mysqli_query($conn, $tbMaster);

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
            ?>
                <h1>Form Request Aset IT</h1>
                <form action="insert_request.php" method="post" enctype="multipart/form-data">
                    <label for="no_req">Nomor Request</label>
                    <input type="text" name="no_req" id="no_req" value="<?= $row['no_req']; ?>" readonly>
                    <label for="department">Department</label>
                    <input type="text" name="department" id="department" value="<?= $row['department']; ?>" readonly>
                    <label for="user">User</label>
                    <input type="text" name="user" id="user" value="<?= $row['nama']; ?>" readonly>
                    <label for="item">Item</label>
                    <input type="text" name="item" id="item" value="<?= $row['item']; ?>" readonly>
            <?php
                }
            } else {
                echo "0";
            }   

            mysqli_close($conn);
            ?>  
                    <label for="pic_it">PIC IT</label>
                    <select name="pic_it" id="pic_it">
                        <option value="Mosses Araal De Sela">Mosses Araal De Sela</option>
                        <option value="Arya Pratama Putra">Arya Pratama Putra</option>
                        <option value="Debora Hizkhia Pardede">Debora Hizkhia Pardede</option>
                    </select>

                    <label for="qty">Quantity</label>
                    <input type="text" name="qty" id="qty">

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>