<?php

session_start();

$host="localhost";
$user="root";
$password="";
$db="studentmanagement";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}

if(isset($_POST['apply']))
{
    $data_name= $_POST['name'];
    $data_email= $_POST['email'];
    $data_phone= $_POST['phone'];

    $sql= "INSERT INTO admission(name,email, phone) VALUES ('$data_name','$data_email','$data_phone')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']= "Your Application is Succesful!";
        header("location:index.php");
    }

    else
    {
       echo "Apply Failed!";
    }

}

?>