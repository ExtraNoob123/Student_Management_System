
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

    $sql_students = "SELECT * FROM user WHERE usertype='student'";
    $result_students = mysqli_query($data,$sql_students);

    $sql_courses = "SELECT * FROM courses";
    $result_courses = mysqli_query($data,$sql_courses);

    if(isset($_POST['assign_course']))
    {
	    $student_id=$_POST['student_id'];
        $c_code=$_POST['course_code'];
        $semester=$_POST['semester'];
        
        $sql_assign = "INSERT INTO course_assign (student_id, c_code,semester) VALUES ('$student_id', '$c_code','$semester')";
        
        $result=mysqli_query($data,$sql_assign);

        if($result)
        {
            echo "<script type='text/javascript'>
			    alert('Course Assigned Successfully');
		        </script>";
        }

        else
        {
            echo "<script type='text/javascript'>
			    alert('Course Assign Failed');
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
            width: 500px;
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
		<h1>Assign Course</h1>

        <div class="div_deg">
            <form action="#" method="POST">
                <div>
			        <label for="student_id">Student Username:</label>
			        <select name="student_id">
                    <?php while ($row = $result_students->fetch_assoc()) { ?>
                        <option value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></option>
                    <?php } ?>
                    </select><br>
		        </div>

                <div>
			        <label for="course_code">Course Code:</label>
			        <select name="course_code">
                    <?php while ($row = $result_courses->fetch_assoc()) { ?>
                        <option value="<?php echo $row['course_code']; ?>"><?php echo $row['course_code']; ?></option>
                    <?php } ?>    
                    </select><br>
		        </div>

                <div>
			        <label >Semester:</label>
			        <input type="text" name="semester">
		        </div>

                <div>
			        <input type="submit" class="btn btn-primary" name="assign_course" value="Assign Course">
		        </div>

            </form>

        </center>


    </div>
</body>
</html>