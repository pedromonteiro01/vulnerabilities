<?php 
	session_start();
	include('includes/header.php');
	include('connection.php'); 
?> 

<!-- Navbar ================================================== -->
<?php include('includes/navbar.php') ?>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<?php include('includes/sidebar.php') ?>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Login</li>
    </ul>
	<h3> Login</h3>	
	<hr class="soft"/>
	
	<div class="row">
		<div class="span4">
			<div class="well">
			<h5>CREATE YOUR ACCOUNT</h5><br/>
			<form method="POST" enctype="multipart/form-data">
			  <div class="control-group">
			  	<label class="control-label" for="inputEmail0">Profile Image</label>
				<div class="controls">
				  <input class="span3"  type="file" name="fileToUpload" id="fileToUpload">
				</div>
				<br>
				<label class="control-label" for="inputEmail0">Email</label>
				<div class="controls">
				  <input class="span3"  type="text" name="register_email" id="inputEmail0" placeholder="Email">
				</div>
				<label class="control-label" for="inputEmail0">Password</label>
				<div class="controls">
				  <input class="span3"  type="password" name="register_pw" id="inputPassword0" placeholder="Password">
				</div>
			  </div>
			  <?php
				if (isset($_POST['btnRegister'])) {
					$email = $_POST['register_email'];
					$pw = $_POST['register_pw'];
					$sql = "INSERT INTO users VALUES (0, '$email', '$pw',0)";
					$result = $conn->query($sql);

					if ($result === TRUE) {
						echo "Registered Successfully!";
					} else {
						if (mysqli_error($conn)) {
							echo "Email already registed!";
						}
					}

					$target = "uploads/" . basename($_FILES['fileToUpload']['name']);
				}
			   ?>
			  <div class="controls">
			  <button type="submit" name="btnRegister" class="btn block">Create Your Account</button>
			  </div>
			</form>
		</div>
		</div>
		<div class="span1"> &nbsp;</div>
		<div class="span4">
			<div class="well">
			<h5>ALREADY REGISTERED ?</h5>
			<form method="POST">
			  <div class="control-group">
				<label class="control-label" for="inputEmail1">Email</label>
				<div class="controls">
				  <input class="span3"  name="login_email" type="text" id="inputEmail1" placeholder="Email">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword1">Password</label>
				<div class="controls">
				  <input type="password" name="login_pw" class="span3"  id="inputPassword1" placeholder="Password">
				</div>
			  </div>
			  <div class="control-group">
			  <?php
				if (isset($_POST['btnLogin'])) {
					$sql = "SELECT * FROM users WHERE email='".$_POST["login_email"]."' AND password ='".$_POST["login_pw"]."'";
					$result = $conn->query($sql);

					if ($result) {
						while ($row = $result->fetch_assoc()) {
							$id = $row["id"];
						}
					}
					else {
						if (mysqli_error($conn)) {
							echo mysqli_error($conn);
						}
					}

					if (isset($id)) {
						$_SESSION['login'] = $id;
						//echo "<script type=\"text/javascript\">window.location.href = '/faq.php';</script>";
						echo "<script type=\"text/javascript\"> 
							window.localStorage.setItem('loggedIn', 1);
							window.location.href = '/';
						</script>";
					} else {
						echo "Incorrect credentials!";
					}
				}
				?>
				<div class="controls">
				  <button type="submit" name="btnLogin" onclick="getInputValue();" class="btn">Sign in</button> <a href="forgetpass.php">Forget password?</a>
				</div>
				<script>
					function getInputValue(){
						var email = document.getElementById("inputEmail1").value;
						// Creating a cookie after the document is ready
						$(document).ready(function () {
							createCookie("email", email, "10");
						});
						
						// Function to create the cookie
						function createCookie(name, value, days) {
							var expires;
							
							if (days) {
								var date = new Date();
								date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
								expires = "; expires=" + date.toGMTString();
							}
							else {
								expires = "";
							}
							
							document.cookie = escape(name) + "=" + 
								escape(value) + expires + "; path=/";
						}
					}
				</script>
			  </div>
			</form>
		</div>
		</div>
	</div>	
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
<?php include('includes/footer.php') ?>