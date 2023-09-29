
<?php

error_reporting(0);


$host="localhost";
$user="root";
$password="";
$db="studentmanagement";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = $_POST['username'];
	$pass = $_POST['password'];
	$sql="select * from user where username='".$name."' AND password='".$pass."'  ";

	$result=mysqli_query($data,$sql);
	$row=mysqli_fetch_array($result);

    if($row["usertype"]=="student")
		{
			session_start();
            $_SESSION['username']=$name;
			$_SESSION['usertype']="student";
			header("location:studenthome.php");
        }
    
    elseif($row["usertype"]=="admin")
		{	
            session_start();
			$_SESSION['username']=$name;
			$_SESSION['usertype']="admin";
			header("location:adminhome.php");
		}
    
    elseif($row["usertype"]=="teacher")
		{	
            session_start();
			$_SESSION['username']=$name;
			$_SESSION['usertype']="teacher";
			header("location:teacherhome.php");
		}

    elseif($row["usertype"]=="staff")
		{	
            session_start();
			$_SESSION['username']=$name;
			$_SESSION['usertype']="staff";
			header("location:staffhome.php");
		}
    
    else
		{   
            session_start();
			$message= "username or password do not match";
			$_SESSION['loginMessage']=$message;
			header("location:login.php");
        }
		
}

?>