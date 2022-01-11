<?php
include "./config.php";


 mysqli_query($koneksi, "DELETE FROM books where id='$_GET[id]'");

 header('Location: index.php');

?>