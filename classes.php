<?php

class Student{

    private $con ="";
    function __construct(){
        $this->con = new mysqli('localhost','root','','first_database');
    }
    public function info($allData){
        $name = $allData['name'];
        $email = $allData['email'];
        $phone = $allData['phone'];
        $status = $allData['status']; 
       

        if($name == ""){
            echo '<div class="alert alert-danger">Name field is required</div>';
        }
        else if($email == ""){
            echo '<div class="alert alert-danger">email field is required</div>';
        }
        else if($phone == ""){
            echo '<div class="alert alert-danger">phone field is required</div>';
        }
        else if($status == ""){
            echo '<div class="alert alert-danger">status field is required</div>';
        }
        else if($this->con->query("INSERT INTO tbl_student(name,email,phone,status)VALUES('$name','$email','$phone','$status')")){
            echo '<div class="alert alert-success">Data Successfully submitted</div>';
            header("Location:index.php");
        }
        else{
            echo '<div class="alert alert-danger">Data not submitted</div>';
        }


    }

                            // table data show 
    public function show(){
        // $this->con = new mysqli('localhost','root','','first_database');
       return $this->con->query("SELECT * FROM tbl_student");
    }
    public function active($id){
       
        $com =  $this->con->query(" UPDATE tbl_student SET status='0' WHERE id='$id'");
       header("location: index.php");
    }
    public function inactive($id){
        
        $com =  $this->con->query(" UPDATE tbl_student SET status='1' WHERE id='$id'");
       header("location: index.php");
    }
    public function find_id_info($id){
        
        $com =  $this->con->query("  SELECT * FROM  tbl_student  WHERE id='$id'");
       return $com;
    }
    public function updated($allData,$id){
        $name = $allData['name'];
        $email = $allData['email'];
        $phone = $allData['phone'];
        $status = $allData['status']; 
       

        if($name == ""){
            echo '<div class="alert alert-danger">Name field is required</div>';
        }
        else if($email == ""){
            echo '<div class="alert alert-danger">email field is required</div>';
        }
        else if($phone == ""){
            echo '<div class="alert alert-danger">phone field is required</div>';
        }
        else if($status == ""){
            echo '<div class="alert alert-danger">status field is required</div>';
        }
        else{
            
            $qur = $this->con->query("UPDATE tbl_student SET name = '$name',email = '$email',phone = '$phone',status ='$status' WHERE id = '$id'");
            if($qur){
                
                header("Location: index.php");
            }
            else{
                echo "something is wrong";
            }
        }
         

    }
    public function delete($id){
        
        $com =  $this->con->query(" DELETE FROM  tbl_student  WHERE id='$id'");
        if($com){
            header("location: index.php");
        }
    }
}




?>