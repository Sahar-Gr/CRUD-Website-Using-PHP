<?php 
  session_start();
  $con = mysqli_connect("localhost","root","","data");
  if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="DELETE FROM `tb_data` WHERE id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo"Deleted successfull";

    //  echo"<script>alert('Deleted successfully');</script>";
          header('location:data1.php');
    }else{
        echo"<script>alert('Error');</script>";
    }
  }