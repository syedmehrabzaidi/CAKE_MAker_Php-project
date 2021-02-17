
<?php
include('db.php');
session_start();
?>
      <?php
                if (isset($_POST['submit'])) {
                    $email = $_POST['Email'];
                    $password = $_POST['Password'];

                    $query = "select * from admin where email ='$email' and password ='$password'";
                    $result = $db->query($query);
                    $row = mysqli_num_rows($result);
                    if ($row > 0) {
                        while ($row2 = $result->fetch_array()) {
                            $_SESSION["username"] = $row2[1];
                            $_SESSION["email"] = $row2[2];
                        }
                      
                             header('location:orders.php');
                               $data="good";
                              } else {

                        echo "<script>alert('Invalid Crediontals');</script>";
                    }
                }

                ?>

<!doctype html>
<html lang="en">
<head> 
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <script src="sweetalert.min.js"></script>
    <script src="sweetalert.js"></script>
        <script src="sweetalert.css"></script>
	<title>Cake Maker's </title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	
	<link href="assets/css/style.css" rel="stylesheet" />
	
</head>
<body>

<div class="login_wrapper">
	
	<div class="login_holder">
			
		<form method="post" action="">
			
			<div class="header">
				<h4 style="border-bottom: 1px solid #521038f2;" class="title">Login Form</h4>
			</div>
			
			<div class="form-group" method="post" action="">
				<label>Username</label>
				<input type="text" name="Email"  type="email" class="form-control" placeholder="Enter Username" autofocus  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
			</div>
			
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="Password" class="form-control"  placeholder="Password" required pattern=".{8,}" title="format: Passsword must be 8 characters long">
			</div>
			
			<!--<p><a style="color: #FF5722;" href="register.php">No account yet! Click Here to register</a></p>-->
			
			<input type="submit" name="submit" value="Login" class="btn btn-info btn-fill pull-right" style="background: #521038f2; border-color: white;" />
			<div class="clearfix"></div>
			
		</form>
		
	</div>
	
</div>
   <script src="sweetalert.min.js"></script>
</body>

</html>