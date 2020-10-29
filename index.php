<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Bootstrap 4 Example</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<style>
			.m_cont{
				height:800px;
				border:1px dashed red;
			}
			
		</style>	
	</head>
	<body>
		<div class="container-fluid m_cont">
			<div class="row">
				<div class="col-6 offset-xl-3">
					<?php
					
						//Check for submit
						if(isset($_GET['submit'])){
							//echo 'yes';
							//Receive data
							$username = $_GET['username'];
							$password = sha1($_GET['username']);
							
							//1.DB Connection Open
							$con = mysqli_connect('localhost','root','','phpbasics4_db') or die ('could not connect');
							
							//2.Build the query
							$sql = "SELECT * FROM users_tbl WHERE username='$username' AND password='$password'";
							
							//3.Execute the query
							$result = mysqli_query($con,$sql);
							
							$num_row = mysqli_num_rows($result);
							if($num_row == 0){
								echo 'Invalid Username and Password';
							}else{
								echo 'Welcome';
							}
							
							//5.DB Connection Close
							mysqli_close($con);
						}
					
					?>
				
				
					<form class="mt-5 p-5 bg-light">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-danger">
						</div>
					</form>
				</div>
			</div>
		</div>	
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</body>
</html>