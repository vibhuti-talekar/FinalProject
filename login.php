<?php

session_start();
//will store information that can be used across multiple pages

require 'config.php';
//config file has database configuration details 

require 'classes/database.php';
//connects the database and the php files using pdo method

$database=new Database;

?>
<?php
//LOG IN
if($_POST['login_submit']){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $enc_password = md5($password);
    //Query
    $database->query("SELECT * FROM users WHERE username = :username AND password = :password");
    $database->bind(':username',$username);
    $database->bind(':password',$enc_password);
    $rows = $database->resultset();
    $count = count($rows);
    if($count > 0){
        session_start();
        //Assign session variables
        $_SESSION['username']   = $username;
        $_SESSION['password']   = $password;
        $_SESSION['logged_in']  = 1;
    } else {
        $login_msg[] = 'Sorry, that login does not work';
    }
}


//LOG OUT
if($_POST['logout_submit']){
    if(isset($_SESSION['username']))
        unset($_SESSION['username']);
    if(isset($_SESSION['password']))
        unset($_SESSION['password']);
    if(isset($_SESSION['logged_in']))
        unset($_SESSION['logged_in']);
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="<?php $_SERVER['PHP_SELF']; ?>"  method="post">
					<span class="login100-form-title">
						Tasks Login
					</span>
					<?php if(!$_SESSION['logged_in']) : ?>
					<?php foreach($login_msg as $msg) : ?>
					<?php echo $msg.'<br />'; ?>
					<?php endforeach; ?>


					<div class="wrap-input100 validate-input" >
					
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" name="login_submit" value="Login">
					</div>
					
					<div class="text-center p-t-136">
						<a class="txt2" href="redirect.php?page=register">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
				<?php else : ?>
				<?php
				           header('Location: redirect.php?page=welcome');
				?>				
					<?php endif; ?>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>