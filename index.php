<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>database testing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    
<h1 class=" text-center">Registration form</h1>

<div class="container">
    <div class="row">
        <div class="col-md-4 ">
            
            <!-- creating object of classes.php class  -->

            <?php
            include 'classes.php';
            // include 'edit.php';
            $res = new Student;
            if(isset($_POST['buttons'])){
                
                $res->info($_POST);
            }
            if(isset($_GET['active'])){
                $id= $_GET['active'];
                $res->active($id);
            }
            if(isset($_GET['inactive'])){
                $id= $_GET['inactive'];
                $res->inactive($id);
            }
            if(isset($_GET['delete'])){
                $id= $_GET['delete'];
                $res->delete($id);
            }
          
            ?>

            <!---------------------- form part start ------------------------ -->

            <form method="POST" class="border border-dark   border-3 rounded mt-5 px-3 ">
                <div class="form-group my-3 ">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group my-3 ">
                    <label for="name">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group my-3">
                    <label for="name">Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group my-3 ">
                    <label for="name">Status</label><br>
                    <select name="status" id="" class="form-control">
                        <option value="">-------------student status---------------</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button name="buttons"  class="btn btn-dark text-white form-control mt-2 text-bold pt-2 mb-5  px-2">Submit</button>
            </form>
            <!-------------------------------- form part end ------------------------>

        </div>


        <!---------------------------- table part start  ---------------------------->

        <div class="col-md-8  rounded">
            <h3 class="text-center mt-1">Show All members</h3>
       
            <table class="table table-dark table-striped w-100%">
            <thead>
                <tr>
                <th scope="col"class="text-center">ID</th>
                <th scope="col"class="text-center">Name</th>
                <th scope="col"class="text-center">Email</th>
                <th scope="col"class="text-center">Phone</th>
                <th scope="col"class="text-center">status</th>
                <th scope="col"class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                
                $array = $res->show();
                $sl = 1;
                while($data = $array->fetch_assoc()){
                    if($data["status"] == 1){
                       $status = '<a href="index.php?active='.$data["id"].'" class="badge badge-primary bg-primary">Active</a>';
                    }
                    else{
                        $status = '<a href="index.php?inactive='.$data["id"].'" class="badge badge-warning bg-warning">Inactive</a>';
                    }
                    echo '<tr>
                    <td class="text-center">'. $sl.'</td>
                    <td class="text-center">'. $data["name"].'</td>
                    <td class="text-center">'. $data["email"].'</td>
                    <td class="text-center">'. $data["phone"].'</td>
                    <td class="text-center">'. $status.'</td>
                    <td class="text-center">
                    <a href="edit.php?id='.$data["id"].'" class="btn btn-warning btn-sm mx-2"><i class="fa fa-edit"></i></a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete'.$data["id"].'"><i class="fa fa-trash"></i></button>
                    </td>
                    </tr>';
                    $sl++;
                    ?>
                    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="delete<?php echo $data["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">confirmation message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
        <a href="index.php?delete=<?php echo $data["id"] ?>" type="button" class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
</div>
             <?php   }
                
                ?>
                
            </tbody>
            </table>
        </div>

        <!--- table part end  -->
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>