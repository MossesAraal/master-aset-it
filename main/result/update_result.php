<?php
require "../conn.php";

// $pic_it = $_POST['pic_it'];
$no_req = $_POST['no_req'];
// $user = $_POST['user'];
// $department = $_POST['department'];
$qty = $_POST['qty'];
$item = $_POST['item'];
$status = $_POST['status'];
$note = $_POST['note'];

$random = rand(1000, 9000);
$no_result = "RES/IT/2024/" . $random;

$tanggal = $_POST['tanggal'];

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

if($_FILES['foto_item']['error'] === 4) {
    echo "foto tidak ada";
} else {
    $filename = $_FILES['foto_item']['name'];
    $filesize = $_FILES['foto_item']['size'];
    $tmpName = $_FILES['foto_item']['tmp_name'];

    $validImgExt = ["jpg", "jpeg", "png"];
    $imgExt = explode(".", $filename);
    $imgExt = strtolower(end($imgExt));
    if(!in_array($imgExt, $validImgExt)) {
        echo "file bukan foto";
    } elseif($filesize > 2000000) {
        echo "file terlalu besar";
    } else {
        $newImgName = uniqid();
        $newImgName .= "." . $imgExt;
        $folder = "../../assets/";

        move_uploaded_file($tmpName, $folder . $newImgName);
    }
}

$sql = "UPDATE tb_transaksi SET no_result='$no_result', qty=$qty, kode_barang='$kode_barang', stok_barang=$stok_barang, tanggal='$tanggal', status='$status', note='$note', foto_barang='$newImgName' WHERE no_req='$no_req'";

if(mysqli_query($conn, $sql)) {
    echo "Record has been updated";
    echo "<script>window.location='result.php';</script>";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);