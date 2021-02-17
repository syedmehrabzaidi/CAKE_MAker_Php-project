
<?php 
	
	session_start();
	if(!isset($_SESSION['username'])) {
        header("location: index.php");
    }

    ?>
<?php 

	require "includes/functions.php";
	require "includes/db.php";
	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Cake Makers</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


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
	
	<script>
	
		function check() {
			
			return confirm("Are you sure you want to delete this record");
			
		}
		
		function func_call(id) {
			
			var value = document.getElementById(id).value;
			
			if(value != "") {
				
				$.ajax({
					
					url: 'get_item.php',
					type: 'post',
					data: {order_id : value},
					success: function(data) {
						//alert(data);
						$("#details_display").html(data);
					}
				});
				
			}
			
		}
		
		function change_stat(id) {
			
			var option = document.getElementById(id).value;
			
			$.ajax({
					
				url: 'get_item.php',
				type: 'post',
				data: {status : option},
				success: function(data) {
					alert(data);
				}
			});
			
		}
	
	</script>
	
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="#000" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<?php require "includes/side_wrapper.php"; ?>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed" style="background: #521038f2;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar" style="background: #fff;"></span>
                        <span class="icon-bar" style="background: #fff;"></span>
                        <span class="icon-bar" style="background: #fff;"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="color: #fff;">Admin | <?php echo $_SESSION["username"]  ?>
                    	

             
                    </a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                     
                            <a href="logout.php" name="logout" style="color: #fff;">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

                <?php
                if(isset($_POST['logout'])){
                    session_destroy();
                    header('location:login.php');
                }
    
                ?>

       <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title" style="text-align: center">Order List</h4>
                            </div>
                            
															
				<div class="panel-body no-padding" style="display: block;">
					<table class="table table-striped" style="text-align: center;">
						<thead>
							<tr class="warning">
								<th style="text-align: center; background: #227ab9e0; color: #fff; border-right: 1px solid #fff; font-size: 15px; font-family:cafifornia;">customer ID</th>
								<th style="text-align: center; background: #227ab9e0; color: #fff; border-right: 1px solid #fff;font-size: 15px; font-family:cafifornia;">customer email</th>
	

		<th style="text-align: center; background: #227ab9e0; color: #fff; border-right: 1px solid #fff;font-size: 15px; font-family:cafifornia;">Customer address</th>
		<th style="text-align: center; background: #227ab9e0; color: #fff; border-right: 1px solid #fff;font-size: 15px; font-family:cafifornia;">Total</th>
<th style="text-align: center; background: #227ab9e0; color: #fff; border-right: 1px solid #fff;font-size: 15px; font-family:cafifornia;">Delivered</th>
	</tr>

<?php

if(isset($_REQUEST['submit'])){

	$sql = "DELETE FROM basket WHERE id ={$_REQUEST['id']}";
	if(mysqli_query($db, $sql)){
		
	}

	
} 

$sql = "select * from basket";

$result = $db->query($sql);

while($row = $result->fetch_array())
{
    echo "<tr class='table-striped' style='text-align: center; border-right: 1px solid #fff; font-size: 15px; font-family:cafifornia;'>";
    echo "<td style='text-align: center; border-right: 1px solid #fff; font-size: 15px; font-family:cafifornia;'>". $row["id"] . "</td>";
    echo "<td style='text-align: center; border-right: 1px solid #fff; font-size: 15px; font-family:cafifornia;'>". $row["email"] . "</td>";
    echo "<td style='text-align: center; border-right: 1px solid #fff; font-size: 15px; font-family:cafifornia;'>". $row["address"] . "</td>";
   echo "<td style='text-align: center; border-right: 1px solid #fff; font-size: 15px; font-family:cafifornia;'>". $row["total"] . "</td>";
    echo '<td ><form action="" method="POST"><input class="btn btn-danger" type="hidden" name="id" value=' . $row['id'] .'><input type="submit" style="  background-color: #521038f2;
  color: white;font-family:cafifornia;
  border: none;
  color: white;
  border-radius:80px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;" name="submit" value="Delivered"></form></td>';
   
    echo "</tr>";

}




?>
						
								
								
								
								
							</tr>
						</tbody>
					</table>
				
		

    <!-- /.table-responsive -->
  </div>
  </div>	
                        </div>
                    </div>                    

                </div>
            </div>
        </div>



						
								
			
			
        <footer class="footer">
            <div class="container-fluid">
                
                <p class="copyright pull-right">
                    &copy; 2016 <a href="index.php" style="color: #521038f2;">Cake Makers</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
	
	<script type="text/javascript">
    	$(document).ready(function(){
			
			/*notice = $("#notify").val();
			
			//alert(notice);
			
        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: notice

            },{
                type: 'danger',
                timer: 7000
            });

    	});*/
	</script>

</html>
