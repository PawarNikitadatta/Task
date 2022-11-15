<?php
include "connection.php";
if(isset($_POST['task'])){

      $task = $_POST['task'];

      $query = "INSERT INTO `todo`(`task`,`Status`) VALUES ('$task','Incomplete') ";
      $runQuery = mysqli_query($conn,$query);
      if($runQuery){

       
        echo "<script> alert('succcessfully added'); window.location.href='http://localhost/Task/todolist/html/todo.html'; </script>";
      }else{
        echo "<script> alert('something went wrong'); </script>";
      }

    
}
?>