<?php
include "./config.php";

 $id             = $_POST['id'];
 $book_name      = $_POST['book_name'];
 $book_publisher = $_POST['book_publisher'];
 $book_price     = $_POST['book_price'];

 mysqli_query($koneksi, "UPDATE books SET book_name='$book_name', book_publisher='$book_publisher', book_price='$book_price' WHERE id='$id'");

 header('Location: index.php');

?>