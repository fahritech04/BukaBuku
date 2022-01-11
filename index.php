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
    <form action="" method="POST" class="w-50">

        <div class="pt-2">
          <label for="">ID Buku</label>
          <input type="number" name="book_id" class="form-control" <i class="fas fa-id-badge"></i>>
        </div>
        <div class="pt-2">
          <label for="">Book Name</label>
          <input type="text" name="book_name" class="form-control" <i class="fas fa-book"></i>>
        </div>

        <div class="row pt-2">
          <div class="col">
            <label for="">Penerbit</label>
            <input type="text" name="book_publisher" class="form-control" <i class="fas fa-people-carry"></i>>
          </div>
          <div class="col">
            <label for="">Harga</label>
            <input type="text" name="book_price" class="form-control" <i class="fas fa-dollar-sign"></i>>
          </div>
        </div>

        <div class="d-flex justify-content-center">
            <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
            <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
            <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
            <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
            <?php deleteBtn();?>
        </div>

    </form>
   </div>

   <!-- Bootstrap table -->
   <div class="d-flex table-data">
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
        <tbody id="tbody">
            <?php
              if(isset($_POST['read'])){
                $result = getData();

                if($result){
                  while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_name']; ?></td>
                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_publisher']; ?></td>
                        <td data-id="<?php echo $row['id']; ?>"><?php echo '$' . $row['book_price']; ?></td>
                        <td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i></td>
                    </tr>
            <?php
                  }
                }
              }
            ?>
        </tbody>
      </table>
   </div>

 </div>
 </main>


 

 <!-- Js Bootstrap -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>