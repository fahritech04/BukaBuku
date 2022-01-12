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
  <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook" style="color: #fca311;"></i>BukaBuku</h1>

  <!-- Input Buku -->
   <div class="d-flex justify-content-center">
    <form action="simpan.php" method="POST" class="w-50">


        <div class="pt-2">
          <label for="">Book Name</label>
          <i class="fas fa-book"></i>
          <input type="text" name="book_name" class="form-control">
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
  <!-- end Input Buku -->

  <!-- Bootstrap table -->  
  <div class="d-flex table-data">
    <?php
    
      include "./config.php";

      $query = mysqli_query($koneksi, 'SELECT * FROM books');
      
      $jumlah_buku = mysqli_num_rows($query);

      ?>      

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
        <?php $no=1;
        
        $batas   = 5;
        $halaman = @$_GET['halaman'];
            if(empty($halaman)){
                $posisi  = 0;
                $halaman = 1;
            }
            else{
                $posisi  = ($halaman-1) * $batas;
            }

        $no = $posisi+1;
        $sql="select * from books limit $posisi,$batas";
        $hasil=mysqli_query($koneksi,$sql);

        while($data = mysqli_fetch_array($hasil)){ ?>          
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
  <!-- end table -->

  <p>Jumlah data buku : <b><?php echo $jumlah_buku; ?></b></p>

  <!-- Pagination -->
  <?php

    $jmldata    = mysqli_num_rows($query);
    $jmlhalaman = ceil($jmldata/$batas);
    ?>
    <div class="text-center">
        <ul class="pagination">
            <?php
            for($i=1;$i<=$jmlhalaman;$i++) {
                if ($i != $halaman) {
                    echo "<li class='page-item'><a class='page-link' href='index.php?halaman=$i'>$i</a></li>";
                } else {
                    echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                }
            }
            ?>
        </ul>
    </div>
    <!-- end pagination -->

 </div>
 </main>
 
</body>
</html>