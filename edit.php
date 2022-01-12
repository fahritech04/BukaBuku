<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>BukaBuku</title>

 <!-- font awesome -->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
 <!-- Css Bootstrap -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

 <!-- Css Sendiri -->
 <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
     include "./config.php";

     $query  = mysqli_query($koneksi, "SELECT * FROM books WHERE id='$_GET[id]'");
     $data   = mysqli_fetch_object($query);
  ?>

 <main>
    
 <div class="container text-center">
  <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook" style="color: #fca311;"></i>Edit BukaBuku</h1>

  <!-- Input Buku -->
   <div class="d-flex justify-content-center">
    <form action="update.php" method="POST" class="w-50">
    <input type="hidden" name="id" value="<?=$data->id ?>">
        <div class="pt-2">
          <label for="">Book Name</label>
          <i class="fas fa-book"></i>
          <input type="text" name="book_name" class="form-control" value="<?=$data->book_name?>">
        </div>

        <div class="row pt-2">
          <div class="col">
            <label for="">Penerbit</label>
            <i class="fas fa-people-carry"></i>
            <input type="text" name="book_publisher" class="form-control" value="<?=$data->book_publisher?>">
          </div>
          <div class="col">
            <label for="">Harga</label>
            <i class="fas fa-dollar-sign"></i>
            <input type="text" name="book_price" class="form-control" value="<?=$data->book_price?>">
          </div>
        </div>

        <div class="justify-content-center pt-3 mb-3">
          <div class="row pt-2 mb-3">
            <div class="col">
              <a href="index.php" class="btn btn-info">Batal</a>
              <input type="submit" value="simpan" class="btn btn-primary">
            </div>
          </div>
        </div>

    </form>
   </div>
  <!-- end Input Buku -->

 </div>
 </main>
 

</body>
</html>