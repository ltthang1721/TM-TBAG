<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC ";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>

<header style=" margin-bottom:-40px ; margin-top:0px">
<?php
include('page/header.php');
?>
</header>

