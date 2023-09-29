<?php
session_start();

    if(!isset($_SESSION['username']))
    {
        header("location: login.php");
    }
    elseif($_SESSION['usertype']!='teacher')
    {
        header("location: login.php");
    }

    $host="localhost";
    $user="root";
    $password="";
    $db="studentmanagement";

    $data=mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['add_course']))
    {
        $c_code=$_POST['course_code'];
        $c_name=$_POST['name'];
        $c_department=$_POST['department'];
        $c_description=$_POST['description'];
        $c_file=$_FILES['image']['name'];

        $dst= "./image/".$c_file;
        $dst_db= "image/".$c_file;

        move_uploaded_file($_FILES['image']['tmp_name'], $dst);

        
        $check="SELECT * from courses WHERE course_code='$c_code'";
        $check_user=mysqli_query($data,$check);

        $row_count=mysqli_num_rows($check_user);

        if($row_count==1)
        {
            echo "<script type='text/javascript'>
			    alert('Course already exist');
		        </script>"; 
        }
        else
        {
            $sql="INSERT INTO courses (course_code,name,department,description,image) VALUES 
            ('$c_code','$c_name','$c_department','$c_description','$dst_db')";

            $result=mysqli_query($data,$sql);

            if($result)
            {
                echo "<script type='text/javascript'>
			    alert('Course Added Succesfully');
		        </script>";
                #header('location:teacher_add_courses.php');
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
    <title>Teacher Dashboard</title>

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
            padding-top: 50px;
            padding-bottom: 50px;
            
        }
    </style>

    <link rel="stylesheet" type="text/css" href="admin.css">
</head>

<body>
    
    <?php

        include 'teacher_sidebar.php'

    ?>    

    <div class="content">
		
        <center>
		<h1>Add Courses</h1>

        <div class="div_deg">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
			        <label >Course Code:</label>
			        <input type="text" name="course_code">
		        </div>

                <div>
			        <label >Course Name:</label>
			        <input type="text" name="name">
		        </div>

                <div>
			        <label >Department:</label>
			        <input type="text" name="department">
		        </div>

                <div>
			        <label >Description:</label>
			        <textarea name="description"></textarea>
		        </div>

                <div>
			        <label >Image:</label>
			        <input type="file" name="image">
		        </div>

                <div>
			        <input type="submit" class="btn btn-primary" name="add_course" value="Add Course">
		        </div>

            </form>
        </div>
        </center>


    </div>
</body>
</html>