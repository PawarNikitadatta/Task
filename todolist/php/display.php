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
  margin-top:3rem;
  border-bottom: 2px double rgb(0, 0, 0);
  border-top: 2px double rgb(0, 0, 0);
  width:18%;
  background-color: rgba(60, 117, 117, 0.3);
  border-radius: 5%;
  text-align:center;
}
.form input{
  width:90%;
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
</div>
<h1 class='head' style='font-size:1.5rem; margin-left:42%; margin-top:1rem'><u>TO DO TASK</u></h1>";
function fetch_data(){
 global $db;
  $query="SELECT * from todo ORDER BY id ASC";
  $exec=mysqli_query($db, $query);
  if(mysqli_num_rows($exec)>0){
    $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;  
        
  }else{
    return $row=[];
  }
}
$fetchData= fetch_data();
show_info($fetchData);
function show_info($fetchData){
 echo '<table border="1" style="margin:auto ; margin-top:10rem;background-color:rgba(69, 117, 117, 0.3);width:50%;padding:1rem">
        <tr>
            <th>Id</th>
            <th>Task</th>
            <th>Date And Time</th>
            <th>Status</th>
        </tr>';
 if(count($fetchData)>0){
      foreach($fetchData as $data){ 
  echo "<tr>
          <td>".$data['id']."</td>
          <td>".$data['task']."</td>
          <td>".$data['Date']."</td>
          <td>".$data['Status']."</td>
   </tr>";
     }
}else{
     
  echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>"; 
}
  echo "</table>";
}
echo'<form method=post action="http://localhost/Task/todolist/php/display.php" class="form">  
<label for="delete" >Completed Task</label> <br>
<input type="number" name="delete" id="delete"  placeholder="Enter task id of completed task"> <br>
<button type="submit">Submit</button>';
if(isset($_POST['delete'])){

    $task = $_POST['delete'];
    $sql="UPDATE `todo` SET Status='Complete' WHERE id=$task ";
    $runQuery = mysqli_query($conn,$sql);
    if($runQuery){

     
        echo "<script> alert('succcessfully UPDATED'); window.location.href='http://localhost/Task/todolist/html/todo.html'; </script>";
      }else{
        echo "<script> alert('something went wrong'); </script>";
      }
}
?>
