<?php
require "../conn.php";

$pic_it = $_POST['pic_it'];
$no_req = $_POST['no_req'];
$user = $_POST['user'];
$department = $_POST['department'];
$qty = $_POST['qty'];
$item = $_POST['item'];

$random = rand(1000, 9000);
$no_result = "RES/IT/2024/" . $random;

if($item === "Speaker") {
    $kode_barang = "SPK001";
    $stok_barang = 3;
} elseif ($item === "Scanner Barcode") {
    $kode_barang = "SCB001";
    $stok_barang = 8;
} elseif ($item === "LAN Tester") {
    $kode_barang = "LTS001";
    $stok_barang = 2;
} elseif ($item === "Proyektor") {
    $kode_barang = "PYT001";
    $stok_barang = 2;
} elseif ($item === "Web Cam") {
    $kode_barang = "WCA001";
    $stok_barang = 4;
} elseif ($item === "Kabel HDMI") {
    $kode_barang = "KHD001";
    $stok_barang = 15;
} elseif ($item === "Pointer") {
    $kode_barang = "PNT001";
    $stok_barang = 3;
} elseif ($item === "Modem Wireless") {
    $kode_barang = "MWR001";
    $stok_barang = 3;
}

$sql = "INSERT INTO tb_transaksi(pic_it, no_req, user, department, stok_barang, qty, item, no_result, kode_barang) VALUES('$pic_it', '$no_req', '$user', '$department', $stok_barang, $qty, '$item', '$no_result', '$kode_barang')";

if(mysqli_query($conn, $sql)) {
    echo "New record has been created";
    echo "<script>window.location='request.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);