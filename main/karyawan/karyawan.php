<?php
require "../conn.php";

$tbMasterBarang = "SELECT * FROM tb_master_barang";
$resultBarang = mysqli_query($conn, $tbMasterBarang);

if(mysqli_num_rows($resultBarang)) :
?>

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
            <h1>Master Aset IT - Karyawan</h1>
        </div>
        <div class="item menu">
            <a href="../index.php"><div>Dashboard</div></a>
            <a href="karyawan.php"><div>Karyawan</div></a>
            <a href="../request/request.php"><div>Request</div></a>
            <a href="../result/result.php"><div>Result</div></a>
        </div>
        <div class="item form-karyawan">
            <div>
                <h1>Form Peminjaman/Permintaan Aset IT</h1>
                <form action="insert.php" method="post" enctype="multipart/form-data">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama">

                    <label for="npk">NPK</label>
                    <input type="text" name="npk" id="npk">

                    <label for="kebutuhan">Kebutuhan</label>
                    <br>
                    <input type="radio" name="kebutuhan" id="kebutuhan" value="Peminjaman Aset"> Peminjaman Aset
                    <input type="radio" name="kebutuhan" id="kebutuhan" value="Permintaan Aset"> Permintaan Aset
                    <br>

                    <label for="item">Item</label>
                    <select name="item" id="item">
                    <?php while($row = mysqli_fetch_assoc($resultBarang)) : ?>
                        <option value="<?= $row["nama_barang"] ?>"><?= $row["nama_barang"] ?></option>
                    <?php endwhile; endif; ?>
                    </select>

                    <label for="department">Department</label>
                    <select name="department" id="department">
                        <option value="Engineering">Engineering</option>
                        <option value="QC">QC</option>
                        <option value="Produksi">Produksi</option>
                        <option value="General Affair">General Affair</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="PPIC">PPIC</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Finance">Finance</option>
                        <option value="HRD">HRD</option>
                        <option value="Purchasing">Purchasing</option>
                    </select>

                    <label for="keperluan">Keperluan</label>
                    <br>
                    <textarea name="keperluan" id="keperluan" cols="70" rows="10" style="padding:15px;"></textarea>
                    <br>
                    
                    <label for="foto">Foto Karyawan</label>
                    <br>
                    <input type="file" name="foto" id="foto">
                    <br>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>

        <table class="table-karyawan">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>NPK</th>
                    <th>Kebutuhan</th>
                    <th>Item</th>
                    <th>Department</th>
                    <th>Keperluan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $tbMaster = "SELECT * FROM tb_master";
            $result = mysqli_query($conn, $tbMaster);

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
            ?>    
            <tbody>
                <td><img src="../../assets/<?= $row['foto']; ?>" width="100px"></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['npk']; ?></td>
                <td><?= $row['kebutuhan']; ?></td>
                <td><?= $row['item']; ?></td>
                <td><?= $row['department']; ?></td>
                <td><?= $row['keperluan']; ?></td>
                <td>
                    <a href="delete.php?npk=<?= $row['npk']; ?>"><i class="fa-solid fa-trash" style="color:#3C5B6F;font-size:15px;"></i></a> |
                    <a href="form_update.php?npk=<?= $row['npk']; ?>"><i class="fa-solid fa-pen-to-square" style="color:#3C5B6F;"></i></a> |
                    <a href="../request/form_request.php?npk=<?= $row['npk']; ?>"><i class="fa-solid fa-clipboard-user" style="color:#3C5B6F;"></i></a> |
                    <a href="print.php?npk=<?= $row['npk']; ?>" target="_blank  "><i class="fa-solid fa-print" style="color:#3C5B6F;"></i></a>
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