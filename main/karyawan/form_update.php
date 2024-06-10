<?php
require "../conn.php";

$npk = $_GET['npk'];
$tbMaster = "SELECT * FROM tb_master WHERE npk=$npk";

$resultMaster = mysqli_query($conn, $tbMaster);

if(mysqli_num_rows($resultMaster) > 0) :
?>

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
                <form action="update.php" method="post" enctype="multipart/form-data">
                    <?php while($row = mysqli_fetch_assoc($resultMaster)) : ?>
                    <input type="hidden" name="no_req" value=<?= $row["no_req"]; ?>>

                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" value="<?= $row['nama']; ?>">

                    <label for="npk">NPK</label>
                    <input type="text" name="npk" id="npk" value="<?= $row['npk']; ?>">

                    <label for="kebutuhan">Kebutuhan</label>
                    <br>
                    <?php if($row['kebutuhan'] === "Peminjaman Aset") { ?>
                    <input type="radio" name="kebutuhan" id="kebutuhan" value="Peminjaman Aset" checked> Peminjaman Aset
                    <input type="radio" name="kebutuhan" id="kebutuhan" value="Permintaan Aset"> Permintaan Aset
                    <?php } else { ?>
                    <input type="radio" name="kebutuhan" id="kebutuhan" value="Peminjaman Aset"> Peminjaman Aset
                    <input type="radio" name="kebutuhan" id="kebutuhan" value="Permintaan Aset" checked> Permintaan Aset
                    <?php } ?>
                    <br>

                    <label for="item">Item</label>
                    <select name="item" id="item">
                        <?php if($row['item'] === "Speaker") { ?>
                        <option value="Speaker" selected>Speaker</option>
                        <option value="Scanner Barcode">Scanner Barcode</option>
                        <option value="LAN Tester">LAN Tester</option>
                        <option value="Proyektor">Proyektor</option>
                        <option value="Web Cam">Web Cam</option>
                        <option value="Kabel HDMI">Kabel HDMI</option>
                        <option value="Pointer">Pointer</option>
                        <option value="Modem Wireless">Modem Wireless</option>
                        <?php } elseif($row['item'] === "Scanner Barcode") {?>
                        <option value="Speaker">Speaker</option>
                        <option value="Scanner Barcode" selected>Scanner Barcode</option>
                        <option value="LAN Tester">LAN Tester</option>
                        <option value="Proyektor">Proyektor</option>
                        <option value="Web Cam">Web Cam</option>
                        <option value="Kabel HDMI">Kabel HDMI</option>
                        <option value="Pointer">Pointer</option>
                        <option value="Modem Wireless">Modem Wireless</option>
                        <?php } elseif($row['item'] === "LAN Tester") {?>
                        <option value="Speaker">Speaker</option>
                        <option value="Scanner Barcode">Scanner Barcode</option>
                        <option value="LAN Tester" selected>LAN Tester</option>
                        <option value="Proyektor">Proyektor</option>
                        <option value="Web Cam">Web Cam</option>
                        <option value="Kabel HDMI">Kabel HDMI</option>
                        <option value="Pointer">Pointer</option>
                        <option value="Modem Wireless">Modem Wireless</option>
                        <?php } elseif($row['item'] === "Proyektor") {?>
                        <option value="Speaker">Speaker</option>
                        <option value="Scanner Barcode">Scanner Barcode</option>
                        <option value="LAN Tester">LAN Tester</option>
                        <option value="Proyektor" selected>Proyektor</option>
                        <option value="Web Cam">Web Cam</option>
                        <option value="Kabel HDMI">Kabel HDMI</option>
                        <option value="Pointer">Pointer</option>
                        <option value="Modem Wireless">Modem Wireless</option>
                        <?php } elseif($row['item'] === "Web Cam") {?>
                        <option value="Speaker">Speaker</option>
                        <option value="Scanner Barcode">Scanner Barcode</option>
                        <option value="LAN Tester">LAN Tester</option>
                        <option value="Proyektor">Proyektor</option>
                        <option value="Web Cam" selected>Web Cam</option>
                        <option value="Kabel HDMI">Kabel HDMI</option>
                        <option value="Pointer">Pointer</option>
                        <option value="Modem Wireless">Modem Wireless</option>
                        <?php } elseif($row['item'] === "Kabel HDMI") {?>
                        <option value="Speaker">Speaker</option>
                        <option value="Scanner Barcode">Scanner Barcode</option>
                        <option value="LAN Tester">LAN Tester</option>
                        <option value="Proyektor">Proyektor</option>
                        <option value="Web Cam">Web Cam</option>
                        <option value="Kabel HDMI" selected>Kabel HDMI</option>
                        <option value="Pointer">Pointer</option>
                        <option value="Modem Wireless">Modem Wireless</option>
                        <?php } elseif($row['item'] === "Pointer") {?>
                        <option value="Speaker">Speaker</option>
                        <option value="Scanner Barcode">Scanner Barcode</option>
                        <option value="LAN Tester">LAN Tester</option>
                        <option value="Proyektor">Proyektor</option>
                        <option value="Web Cam">Web Cam</option>
                        <option value="Kabel HDMI">Kabel HDMI</option>
                        <option value="Pointer" selected>Pointer</option>
                        <option value="Modem Wireless">Modem Wireless</option>
                        <?php } elseif($row['item'] === "Modem Wireless") {?>
                        <option value="Speaker">Speaker</option>
                        <option value="Scanner Barcode">Scanner Barcode</option>
                        <option value="LAN Tester">LAN Tester</option>
                        <option value="Proyektor">Proyektor</option>
                        <option value="Web Cam">Web Cam</option>
                        <option value="Kabel HDMI">Kabel HDMI</option>
                        <option value="Pointer">Pointer</option>
                        <option value="Modem Wireless"  selected>Modem Wireless</option>
                        <?php } ?>
                    </select>

                    <label for="department">Department</label>
                    <select name="department" id="department">
                        <?php if($row['department'] === "Engineering") { ?>
                        <option value="Engineering" selected>Engineering</option>
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
                        <?php } elseif($row['department'] === "QC") { ?>
                        <option value="Engineering">Engineering</option>
                        <option value="QC" selected>QC</option>
                        <option value="Produksi">Produksi</option>
                        <option value="General Affair">General Affair</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="PPIC">PPIC</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Finance">Finance</option>
                        <option value="HRD">HRD</option>
                        <option value="Purchasing">Purchasing</option>
                        <?php } elseif($row['department'] === "Produksi") { ?>
                        <option value="Engineering">Engineering</option>
                        <option value="QC">QC</option>
                        <option value="Produksi" selected>Produksi</option>
                        <option value="General Affair">General Affair</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="PPIC">PPIC</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Finance">Finance</option>
                        <option value="HRD">HRD</option>
                        <option value="Purchasing">Purchasing</option>
                        <?php } elseif($row['department'] === "General Affair") { ?>
                        <option value="Engineering">Engineering</option>
                        <option value="QC">QC</option>
                        <option value="Produksi">Produksi</option>
                        <option value="General Affair" selected>General Affair</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="PPIC">PPIC</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Finance">Finance</option>
                        <option value="HRD">HRD</option>
                        <option value="Purchasing">Purchasing</option>
                        <?php } elseif($row['department'] === "Marketing") { ?>
                        <option value="Engineering">Engineering</option>
                        <option value="QC">QC</option>
                        <option value="Produksi">Produksi</option>
                        <option value="General Affair">General Affair</option>
                        <option value="Marketing" selected>Marketing</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="PPIC">PPIC</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Finance">Finance</option>
                        <option value="HRD">HRD</option>
                        <option value="Purchasing">Purchasing</option>
                        <?php } elseif($row['department'] === "Maintenance") { ?>
                        <option value="Engineering">Engineering</option>
                        <option value="QC">QC</option>
                        <option value="Produksi">Produksi</option>
                        <option value="General Affair">General Affair</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Maintenance" selected>Maintenance</option>
                        <option value="PPIC">PPIC</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Finance">Finance</option>
                        <option value="HRD">HRD</option>
                        <option value="Purchasing">Purchasing</option>
                        <?php } elseif($row['department'] === "PPIC") { ?>
                        <option value="Engineering">Engineering</option>
                        <option value="QC">QC</option>
                        <option value="Produksi">Produksi</option>
                        <option value="General Affair">General Affair</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="PPIC" selected>PPIC</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Finance">Finance</option>
                        <option value="HRD">HRD</option>
                        <option value="Purchasing">Purchasing</option>
                        <?php } elseif($row['department'] === "Accounting") { ?>
                        <option value="Engineering">Engineering</option>
                        <option value="QC">QC</option>
                        <option value="Produksi">Produksi</option>
                        <option value="General Affair">General Affair</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="PPIC">PPIC</option>
                        <option value="Accounting" selected>Accounting</option>
                        <option value="Finance">Finance</option>
                        <option value="HRD">HRD</option>
                        <option value="Purchasing">Purchasing</option>
                        <?php } elseif($row['department'] === "Finance") { ?>
                        <option value="Engineering">Engineering</option>
                        <option value="QC">QC</option>
                        <option value="Produksi">Produksi</option>
                        <option value="General Affair">General Affair</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="PPIC">PPIC</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Finance" selected>Finance</option>
                        <option value="HRD">HRD</option>
                        <option value="Purchasing">Purchasing</option>
                        <?php } elseif($row['department'] === "HRD") { ?>
                        <option value="Engineering">Engineering</option>
                        <option value="QC">QC</option>
                        <option value="Produksi">Produksi</option>
                        <option value="General Affair">General Affair</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="PPIC">PPIC</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Finance">Finance</option>
                        <option value="HRD" selected>HRD</option>
                        <option value="Purchasing">Purchasing</option>
                        <?php } elseif($row['department'] === "Purchasing") { ?>
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
                        <option value="Purchasing"  selected>Purchasing</option>
                        <?php } ?>
                    </select>

                    <label for="keperluan">Keperluan</label>
                    <br>
                    <textarea name="keperluan" id="keperluan" cols="70" rows="10" style="padding:15px;" value=""><?= $row['keperluan']; ?></textarea>
                    <br>

                    <button type="submit">Submit</button>

                    <?php endwhile; endif; ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>