<?php
require "../conn.php";

$no_req = $_GET["no_req"];
echo $no_req;

$sql = "DELETE FROM tb_transaksi WHERE no_req='$no_req'";

if(mysqli_query($conn, $sql)) {
    echo "Record has been deleted";
    echo "<script>window.location='request.php'</script>";
} else {
    echo "Connection failed: " . mysqli_error($conn);
}

mysqli_close($conn);
?>