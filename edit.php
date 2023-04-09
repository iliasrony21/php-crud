<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-4">
            
            <!-- creating object of classes.php class  -->

            <?php
            include 'classes.php';
            $res = new Student;
            $id = $_GET['id'];
            $obj = $res->find_id_info($id);
            //------------------- obj_to_as_array --------------
            $data = $obj->fetch_assoc();

            if(isset($_POST['buttons'])){

                $res->updated($_POST,$id);
            }
          
            ?>

            <!---------------------- form part start ------------------------ -->

            <form method="POST" class="border border-dark   border-3 rounded mt-5 px-3 ">
                <div class="form-group my-3 ">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value ="<?php echo $data["name"]; ?>">
                </div>
                <div class="form-group my-3 ">
                    <label for="name">Email</label>
                    <input type="text" name="email" class="form-control" value ="<?php echo $data["email"]; ?>">
                </div>
                <div class="form-group my-3">
                    <label for="name">Phone</label>
                    <input type="number" name="phone" class="form-control" value ="<?php echo $data["phone"]; ?>">
                </div>
                <div class="form-group my-3 ">
                    <label for="name">Status</label><br>
                    <select name="status" id="" class="form-control">
                        <option value ="<?php echo $data["status"]; ?>">
                         <?php  if($data["status"] == 1){echo "Active";} else{echo "Inactive";}   ?>
                       </option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button name="buttons"  class="btn btn-dark text-white form-control mt-2 text-bold pt-2 mb-5  px-2">Update</button>
            </form>
            <!-------------------------------- form part end ------------------------>

        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>