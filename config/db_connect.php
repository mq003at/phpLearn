<?php
// make a connection to the db. 
$qCon = mysqli_connect('localhost', 'quan', '1234', 'namelist');

if(!$qCon){
    echo 'Connection error: ' . mysqli_connect_error();
}
?>