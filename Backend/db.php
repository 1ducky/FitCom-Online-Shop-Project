<?php
$host = 'localhost';
$username = 'root';
$password= '';
$db='shop';


try{
    $conn = mysqli_connect($host,$username,$password,$db);

}catch(mysqli_sql_exception){
    echo  'could not connect';
    mysqli_report(MYSQLI_REPORT_ERROR| MYSQLI_REPORT_STRICT);
}

?>