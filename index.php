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

 <main>

 <div class="container text-center">
  <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i>BukaBuku</h1>

   <div class="d-flex justify-content-center">
    <form action="simpan.php" method="POST" class="w-50">

        <div class="pt-2">
          <label for="">ID Buku</label>
          <i class="fas fa-id-badge"></i>
          <input type="number" name="book_id" class="form-control fas">
        </div>
        <div class="pt-2">
          <label for="">Book Name</label>
          <i class="fas fa-book"></i>
          <input type="text" name="book_name" class="form-control" >
        </div>

        <div class="row pt-2">
          <div class="col">
            <label for="">Penerbit</label>
            <i class="fas fa-people-carry"></i>
            <input type="text" name="book_publisher" class="form-control">
          </div>
          <div class="col">
            <label for="">Harga</label>
            <i class="fas fa-dollar-sign"></i>
            <input type="text" name="book_price" class="form-control">
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

   <!-- Bootstrap table -->

  <div class="d-flex table-data">
    <?php
    
      include "./config.php";

      $query = mysqli_query($koneksi, 'SELECT * FROM books')?>
      <table class="table table-striped table-dark">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>Book Name</th>
            <th>Publisher</th>
            <th>Book Price</th>
            <th>Edit</th>
          </tr>
        </thead>
        <?php $no=1; while($data = mysqli_fetch_array($query)){ ?>
          <tbody id="tbody">
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data['book_name'] ?></td>
              <td><?= $data['book_publisher'] ?></td>
              <td><?= $data['book_price'] ?></td>
              <td>
                <div class="btn-group">
                  <a href="edit.php?id=<?=$data["id"]?>" class="btn btn-success">Edit</a>
                  <a href='delete.php?id=<?=$data['id']?>' class="btn btn-danger">Delete</a>
                </div>
              </td>
            </tr>
          </tbody>
        <?php
        }?>
      </table>
  </div>

 </div>
 </main>


 

 <!-- Js Bootstrap -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>