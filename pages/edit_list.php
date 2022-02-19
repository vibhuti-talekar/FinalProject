<?php
	if($_POST['submit']){
		$list_id = $_GET['id'];
		$list_name = $_POST['list_name'];
		$list_body = $_POST['list_body'];
		
		//Instantiate Database object
		$database = new Database;
		
		$database->query('UPDATE lists SET list_name = :list_name,list_body = :list_body WHERE id = :id');
		$database->bind(':list_name',$list_name);
		$database->bind(':list_body',$list_body);
		$database->bind(':id',$list_id);
		$database->execute();
		if($database->rowCount()){
			echo '<p class="msg">Your list has been updated</p>';
		}
	}
?>

<?php
$list_id = $_GET['id'];

//Instantiate Database object
$database = new Database;
//Query
$database->query('SELECT * FROM lists WHERE id = :id');
$database->bind(':id',$list_id);
$row = $database->single();
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V4</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/cmain.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
				<span class="contact100-form-title">
					Edit List
				</span>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">List Name</span>
					<input class="input100" type="text" name="list_name" value="<?php echo $row['list_name'];?>" placeholder="Enter your name">
					<span class="focus-input100"></span>
				</div>

				

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Description</span>
					<textarea class="input100" name="list_body" placeholder="Your description here...">
						<?php echo $row['list_body']; ?>
					</textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						
							<span>
								<input type="submit" value="Update" name="submit" />
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						
					</div>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/cmain.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
