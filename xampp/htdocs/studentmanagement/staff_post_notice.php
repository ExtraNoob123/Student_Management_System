
<?php
session_start();

    if(!isset($_SESSION['username']))
    {
        header("location: login.php");
    }
    elseif($_SESSION['usertype']!='staff')
    {
        header("location: login.php");
    }

    $host="localhost";
    $user="root";
    $password="";
    $db="studentmanagement";

    $data=mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['post_notice']))
    {
        $n_subject=$_POST['subject'];
        $n_description=$_POST['description'];

        $sql= "INSERT INTO notice(subject,description,date) VALUES 
            ('$n_subject','$n_description', CURDATE())";

            $result=mysqli_query($data,$sql);

            if($result)
            {
                echo "<script type='text/javascript'>
			    alert('Notice Posted Succesfully');
		        </script>";
            }
            else
            {
                echo "<script type='text/javascript'>
			    alert('Could Not Post Notice');
		        </script>";  
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
    <title>Staff Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin.css">

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
			width: 500px;
			padding-top: 70px;
			padding-bottom: 70px;
		}
	</style>
</head>

<body>
    <?php

    include 'staff_sidebar.php'

    ?>

    <div class="content">
		
        <center>
		<h1>Post Notice</h1>
        <div class="div_deg">
            <form action="#" method="POST" >
                <div>
			        <label >Subject:</label>
			        <input type="text" name="subject">
		        </div>

                <div>
			        <label >Notice Description:</label>
			        <textarea name="description"></textarea>
		        </div>

                <div>
			        <input type="submit" class="btn btn-primary" name="post_notice" value="Post Notice">
		        </div>

            </form>
        </div>
        </center>

    </div>
</body>
</html>