<?php
session_start();

    if(!isset($_SESSION['username']))
    {
        header("location: login.php");
    }
    elseif($_SESSION['usertype']!='admin')
    {
        header("location: login.php");
    }

    $host="localhost";
    $user="root";
    $password="";
    $db="studentmanagement";

    $data=mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['add_staff']))
    {
	    $username=$_POST['name'];
        $user_email=$_POST['email'];
        $user_phone=$_POST['phone'];
        $user_password=$_POST['password'];
        $usertype="staff";

        $check="SELECT * from user WHERE username='$username'";
        $check_user=mysqli_query($data,$check);

        $row_count=mysqli_num_rows($check_user);

        if($row_count==1)
        {
            echo "<script type='text/javascript'>
			    alert('Username already exist');
		        </script>"; 
        }
        else
        {

            $sql= "INSERT INTO user(username,phone,email,usertype,password) VALUES 
            ('$username','$user_phone','$user_email','$usertype','$user_password')";

            $result=mysqli_query($data,$sql);

            if($result)
            {
                echo "<script type='text/javascript'>
			    alert('Staff Added Succesfully');
		        </script>";
            }
            else
            {
                echo "<script type='text/javascript'>
			    alert('Staff Data Upload Failed');
		        </script>";  
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Admin Dashboard</title>

    <style type="text/css">
        label
        {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg
        {
            background-color: skyblue;
            width: 400px;
            padding-top: 50px;
            padding-bottom: 50px;
            
        }

    </style>


    <link rel="stylesheet" type="text/css" href="admin.css">
</head>

<body>
    
    <?php
        include 'admin_sidebar.php';
    ?>

    <div class="content">
		<center>
		<h1>Add Staff</h1>

        <div class="div_deg">
            <form action="#" method="POST">
                <div>
			        <label >Username</label>
			        <input type="text" name="name">
		        </div>

                <div>
			        <label >Email</label>
			        <input type="email" name="email">
		        </div>

                <div>
			        <label >Phone</label>
			        <input type="number" name="phone">
		        </div>

                <div>
			        <label >Password</label>
			        <input type="text" name="password">
		        </div>

                <div>
			        <input type="submit" class="btn btn-primary" name="add_staff" value="Add Staff">
		        </div>

            </form>
        </div>
        </center>
    </div>
</body>
</html>