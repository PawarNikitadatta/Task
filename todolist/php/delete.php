<?php
include "connection.php";
$db=$conn;
echo "<title>DISPLAY DATA</title>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>
  <script src='https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js'></script>
<style>
.nav{
  margin-top: 1rem;
  justify-content: center;
}
.nav{
  color: black;
}
.form{
  margin-left:42%;
  margin-top:13rem;
  border-bottom: 2px double rgb(0, 0, 0);
  border-top: 2px double rgb(0, 0, 0);
  width:18%;
  background-color: rgba(60, 117, 117, 0.3);
  border-radius: 5%;
  padding:2rem;
  text-align:center;
}
.form input{
  width:90%;
  text-align:center;
}
.form button{
  margin-top:1rem;
  marging-bottom:1rem;
}
</style>
";
echo"<div class='nav'>
<ul class='nav nav-tabs'>
    <li class='nav-item'>
      <a class='nav-link active' href='http://localhost/Task/todolist/html/todo.html'>HOME</a>
    </li>
    <li class='nav-item'>
      <a class='nav-link' href='http://localhost/Task/todolist/php/display.php'>TO DO TASK</a>
    </li>
    <li class='nav-item'>
      <a class='nav-link' href='http://localhost/Task/todolist/php/completed.php'>COMPLETED</a>
    </li>
    <li class='nav-item'>
      <a class='nav-link' href='http://localhost/Task/todolist/php/edit.php'>EDIT TASK</a>
    </li>
    <li class='nav-item'>
      <a class='nav-link' href='http://localhost/Task/todolist/php/delete.php'>DELETE TASK</a>
    </li>
  </ul>
</div>";
echo'
<form method=post action="http://localhost/Task/todolist/php/delete.php" class="form">  
  <h1 class="head" style="font-size:1rem;"><u>TASK TO BE DELETED</u></h1>
    <label for="id" style="margin:auto;">ID</label> <br>
    <input type="number" name="id" id="id"  placeholder="Enter Task Id"> <br>
    <button type="submit">Submit</button>';
    if(isset($_POST['id'])){
        $id=$_POST['id'];
        $sql="DELETE FROM `todo` WHERE id='$id'";
        $runQuery = mysqli_query($conn,$sql);
        if($runQuery){
            echo "<script> alert('succcessfully deleted'); window.location.href='http://localhost/Task/todolist/html/todo.html'; </script>";
          }else{
            echo "<script> alert('something went wrong'); </script>";
          }
    }
?>