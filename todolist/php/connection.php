<?php
$host= "localhost";
$dbUsername= "root";
$dbPassword= "";
$dbname= "todotask";
$conn = mysqli_connect($host,$dbUsername,$dbPassword,$dbname) or die();
if(!$conn){
    echo "connection faild";
}
?>