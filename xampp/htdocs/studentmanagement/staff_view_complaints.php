<?php
error_reporting(0);
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

    $sql="SELECT * from complaints";
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
    <title>Staff Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>

<body>
    <?php
    include 'staff_sidebar.php'
    ?>

    <div class="content">
		
        <h1>All Complaints Posted by Students</h1>

        <?php
            if($_SESSION['message'])
            {
                echo $_SESSION['message'];
            }
            unset($_SESSION['message']);
        ?>

        <table border="1px">
            <tr>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Student Username</th>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Subject</th>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Description</th>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Date Submitted</th>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Resolved</th>

            </tr>

            <?php
            while($info= $result->fetch_assoc())
            {
            ?>

            <tr>
                <td style="padding: 10px; background-color:skyblue;">
                    <?php echo "{$info['username']}"; ?>
                </td>
                <td style="padding: 10px; background-color:skyblue;">
                    <?php echo "{$info['com_subject']}"; ?>
                </td>
                <td style="padding: 10px; background-color:skyblue;">
                    <?php echo "{$info['com_description']}"; ?>
                </td>
                </td>
                <td style="padding: 10px; background-color:skyblue;">
                    <?php echo "{$info['date']}"; ?>
                </td>
                <td style="padding: 10px; background-color:skyblue;">
                    <?php echo "<a class='btn btn-success' href='resolve_comlaints.php?com_id={$info['com_id']}'> Resolved </a>"; ?>
                </td>
                
            </tr>
            <?php
            }
            ?>

        </table>

    </div>
</body>
</html>