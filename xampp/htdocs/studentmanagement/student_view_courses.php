<?php
error_reporting(0);
session_start();

    if(!isset($_SESSION['username']))
    {
        header("location: login.php");
    }


    elseif($_SESSION['usertype']!='student')
    {
        header("location: login.php");
    }

    $host="localhost";
    $user="root";
    $password="";
    $db="studentmanagement";

    $data=mysqli_connect($host,$user,$password,$db);

    $user_id=$_SESSION['username'];

    $sql="SELECT courses.course_code, courses.name, courses.department,courses.description,courses.image, course_assign.semester FROM course_assign JOIN courses 
        ON course_assign.c_code = courses.course_code WHERE course_assign.student_id = '$user_id'";;
    $result=mysqli_query($data,$sql);


?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Dashboard</title>

    
    <?php

	include 'student_css.php'

	?>

</head>

<body>

	<?php

	include 'student_sidebar.php'

	?>

    <div class="content">
		<center>
		<h1>Courses Assigned to You</h1>
       
        <table border="1px">
            <tr>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Course Code</th>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Course Title</th>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Department</th>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">About Course</th>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Image</th>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Semester</th>
            </tr>

            <?php
            while($info= $result->fetch_assoc())
            {
            ?>

            <tr>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['course_code']}"; ?>
                </td>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['name']}"; ?>
                </td>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['department']}"; ?>
                </td>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['description']}"; ?>
                </td>
                <td style="padding: 20px; background-color:skyblue;">
                    <img height="100px" width="150px" src="<?php echo "{$info['image']}"; ?>">
                </td>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['semester']}"; ?>
                
            </tr>
            <?php
            }
            ?>

        </table>
        </center>

    </div>

</body>
</html>