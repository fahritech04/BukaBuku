<?php
include "./config.php";

 $book_name      = $_POST['book_name'];
 $book_publisher = $_POST['book_publisher'];
 $book_price     = $_POST['book_price'];

 mysqli_query($koneksi, "INSERT INTO
 books (book_name, book_publisher, book_price)
 VALUE ('$book_name', '$book_publisher', '$book_price')");

 header('Location: index.php');


?>