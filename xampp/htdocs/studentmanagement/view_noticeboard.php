
<?php

$host="localhost";
$user="root";
$password="";
$db="studentmanagement";

$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * from notice";
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
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="admin.css">

</head>
<body>
    <nav>
        
		<label class="logo">Notice Board</label>
        
        <div class="logout">
			<br>
			<a href="index.php" class="btn btn-primary">Home</a>

		</div>

        <div class="content">
        <table border="1px">
            <tr>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Notice Subject</th>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Notice Description</th>
                <th style="padding: 20px; background-color: rgb(0, 60, 100); color: white; font-size: 15px;">Post Date</th>
            </tr>

            <?php
            while($info= $result->fetch_assoc())
            {
            ?>

            <tr>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['subject']}"; ?>
                </td>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['description']}"; ?>
                </td>
                <td style="padding: 20px; background-color:skyblue;">
                    <?php echo "{$info['date']}"; ?>
                </td>
                
            </tr>
            <?php
            }
            ?>

        </table>
        </div>
    </nav>

</body>
</html>
