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

    $sql="SELECT * from courses";
    $result=mysqli_query($data,$sql);

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
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>

<body>
    <?php

    include 'teacher_sidebar.php'

    ?>

    <div class="content">
		
		<h1>View All Courses</h1>

        <table border="1px">
            <tr>
                <th style="padding: 20px; font-size: 15px;">Course Code</th>
                <th style="padding: 20px; font-size: 15px;">Course Title</th>
                <th style="padding: 20px; font-size: 15px;">Department</th>
                <th style="padding: 20px; font-size: 15px;">About Course</th>
                <th style="padding: 20px; font-size: 15px;">Image</th>
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
                
            </tr>
            <?php
            }
            ?>

        </table>


    </div>
</body>
</html>