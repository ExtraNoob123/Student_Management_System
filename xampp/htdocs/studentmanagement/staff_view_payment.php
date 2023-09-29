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

    $sql="SELECT * from payment";
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
		
        <h1>Payment Details of Students</h1>

        <table border="1px">
            <tr>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Transaction ID</th>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Student Username</th>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Semester</th>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Amount</th>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Payment Update</th>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Account Info</th>

            </tr>

            <?php
            while($info= $result->fetch_assoc())
            {
            ?>

            <tr>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['transaction_id']}"; ?>
                </td>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['student_name']}"; ?>
                </td>
                </td>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['semester']}"; ?>
                </td>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['amount']}"; ?>
                </td>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['pay_update']}"; ?>
                </td>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['account_info']}"; ?>
                </td>
                
            </tr>
            <?php
            }
            ?>

        </table>

    </div>
</body>
</html>