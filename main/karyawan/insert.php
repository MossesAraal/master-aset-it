<?php
require "../conn.php";

$nama = $_POST['nama'];
$npk = $_POST['npk'];
$kebutuhan = $_POST['kebutuhan'];
$item = $_POST['item'];
$department = $_POST['department'];
$keperluan = $_POST['keperluan'];
$random = rand(1000, 9000);
$no_req = "REQ/IT/2024/" . $random; 

if($_FILES['foto']['error'] === 4) {
    echo "foto tidak ada";
} else {
    $filename = $_FILES['foto']['name'];
    $filesize = $_FILES['foto']['size'];
    $tmpName = $_FILES['foto']['tmp_name'];

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

$sql = "INSERT INTO tb_master (no_req, nama, npk, kebutuhan, item, department, keperluan, foto) VALUES ('$no_req', '$nama', '$npk', '$kebutuhan', '$item', '$department', '$keperluan', '$newImgName')";

if(mysqli_query($conn, $sql)) {
    echo "New record has been created";
    echo "<script>window.location='karyawan.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>