<?php
$host = 'localhost';
$username = 'root';
$password= '';
$db='green-core';


try{
    $conn = mysqli_connect($host,$username,$password,$db);

}catch(mysqli_sql_exception){
    return 0;
}

?>