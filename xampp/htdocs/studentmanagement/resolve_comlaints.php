<?php

session_start();

$host="localhost";
$user="root";
$password="";
$db="studentmanagement";

$data=mysqli_connect($host,$user,$password,$db);

if($_GET['com_id'])
{
    $com_id= $_GET['com_id'];
    $sql="DELETE FROM complaints WHERE com_id='$com_id' ";
    $result=mysqli_query($data,$sql);

    if($result)
    {
        echo 'Succesfully deleted the resolved complaint';
        #header("location: view_student.php");
    }
}

?>