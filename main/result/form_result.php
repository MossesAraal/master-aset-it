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
            <h1>Master Aset IT - Form Result</h1>
        </div>
        <div class="item menu">
            <a href="../index.php"><div>Dashboard</div></a>
            <a href="../karyawan/karyawan.php"><div>Karyawan</div></a>
            <a href="../request/request.php"><div>Request</div></a>
            <a href="result.php"><div>Result</div></a>
        </div>
        <div class="item form-karyawan">
            <div>
            <?php
            require "../conn.php";
            $no_result = $_GET["no_result"];

            $tbMaster = "SELECT * FROM tb_transaksi WHERE no_result='$no_result'";
            $result = mysqli_query($conn, $tbMaster);

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
            ?>
                <h1>Form Result Aset IT</h1>
                <form action="update_result.php" method="post" enctype="multipart/form-data">
                    <label for="no_result">Nomor Result</label>
                    <input type="text" name="no_result" id="no_result" value="<?= $row['no_result']; ?>" readonly>

                    <label for="qty">Quantity</label>
                    <input type="text" name="qty" id="qty" value="<?= $row['qty']; ?>" readonly>
                    
                    <label for="kode_barang">Kode Barang</label>
                    <input type="text" name="kode_barang" id="kode_barang" value="<?= $row['kode_barang']; ?>" readonly>
                    
                    <!-- <input type="hidden" name="pic_it" id="pic_it" value="<?= $row['pic_it']; ?>">
                    
                    <input type="hidden" name="department" id="department" value="<?= $row['department']; ?>" readonly>
                    
                    <input type="hidden" name="user" id="user" value="<?= $row['user']; ?>" readonly> -->

                    <input type="hidden" name="no_req" id="no_req" value="<?= $row['no_req']; ?>" readonly>

                    <input type="hidden" name="item" id="item" value="<?= $row['item']; ?>" readonly>

                    <label for="stok_barang">Stok Barang</label>
                    <input type="text" name="stok_barang" id="stok_barang" value="<?= $row['stok_barang']; ?>" readonly>
            <?php
                }
            } else {
                echo "0";
            }   

            mysqli_close($conn);
            ?>
                    <label for="tanggal">Tanggal</label>
                    <br>
                    <input type="date" name="tanggal" id="tanggal">
                    <br>

                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="Approved">Approved</option>
                        <option value="Not Approved">Not Approved</option>
                    </select>

                    <label for="note">Note</label>
                    <br>
                    <textarea name="note" id="note" cols="70" rows="10"></textarea>
                    <br>

                    <label for="foto_item">Foto Item</label>
                    <input type="file" name="foto_item" id="foto_item">
                    <br>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>