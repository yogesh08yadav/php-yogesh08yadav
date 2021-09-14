<?php

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'emailphp';

$con = mysqli_connect($server,$user,$password,$db); 

if($con){
    echo "Connection done";

}
else{
    echo " Conncetion not established";
}

?> 