<?php if($_POST['register_submit']){
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$errors = array();

		//Check passwords match
		if($password != $password2){
			$errors[] = "Your passwords do not match";
		} 
		//Check first name
		if(empty($first_name)){
			$errors[] = "First Name is Required";
		} 
		//Check email
		if(empty($email)){
			$errors[] = "Email is Required";
		} 
		//Check username
		if(empty($username)){
			$errors[] = "Username is Required";
		} 
		//Match passwords
		if(empty($password)){
			$errors[] = "Password is Required";
		} 


		//Instantiate Database object
		$database = new Database;

		/* Check to see if username has been used */

		//Query
		$database->query('SELECT username FROM users WHERE username = :username');
		$database->bind(':username', $username);  
		//Execute
		$database->execute();
		if($database->rowCount() > 0){
			$errors[] = "Sorry, that username is taken";
		}

		/* Check to see if email has been used */

		//Query
		$database->query('SELECT email FROM users WHERE email = :email');
		$database->bind(':email', $email);  
		//Execute
		$database->execute();
		if($database->rowCount() > 0){
			$errors[] = "Sorry, that email is taken";
		}

		//If there are no errors, proceed with registration
		if(empty($errors)){
			//Encrypt Password
			$enc_password = md5($password);

			//Query
			$database->query('INSERT INTO users (first_name,last_name,email,username,password)
			              VALUES(:first_name,:last_name,:email,:username,:password)');
			//Bind Values
			$database->bind(':first_name', $first_name);  
			$database->bind(':last_name', $last_name);   
			$database->bind(':email', $email);  
			$database->bind(':username', $username);  
			$database->bind(':password', $enc_password);  

			//Execute
			$database->execute();

			//If row was inserted
			if($database->lastInsertId()){
				echo '<p class="msg">You are now registered! Please Log In</p>';
			} else {
				echo '<p class="error">Sorry, something went wrong. Contact the site admin</p>';
			}
		}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">

                    <?php
                    if(!empty($errors)){
                    	echo "<ul>";
                     	foreach($errors as $error){
                    		echo "<li class=\"error\">".$error."</li>";
                    	}
                    	echo "</ul>";
                    }
                    ?>



                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="first_name" value="<?php if($_POST['first_name'])echo $_POST['first_name'] ?>" id="name" placeholder="First Name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="last_name" value="<?php if($_POST['first_name'])echo $_POST['last_name'] ?>"  placeholder="Last LName" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" value="<?php if($_POST['email'])echo $_POST['email'] ?>"  id="email" placeholder=" Email"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" value="<?php if($_POST['username'])echo $_POST['username'] ?>"  placeholder=" Username" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" value="<?php if($_POST['password'])echo $_POST['password'] ?>" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password2" value="<?php if($_POST['password2'])echo $_POST['password2'] ?>" id="re_password" placeholder="Repeat your password"/>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" value="Register" name="register_submit" />
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>