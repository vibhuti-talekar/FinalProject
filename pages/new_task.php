<?php
	if($_POST['task_submit']){
		$task_name = $_POST['task_name'];
		$task_body = $_POST['task_body'];
		$due_date = $_POST['due_date'];
		$list_id = $_POST['list_id'];

		//Instantiate Database object
		$database = new Database;

		$database->query('INSERT INTO tasks (task_name,task_body,due_date,list_id) VALUES(:task_name,:task_body,:due_date,:list_id)');
		$database->bind(':task_name',$task_name);
		$database->bind(':task_body',$task_body);
		$database->bind(':due_date',$due_date);
		$database->bind(':list_id',$list_id);
		$database->execute();
		if($database->lastInsertId()){
			echo '<p class="msg">Your task has been created</p>';
		}

	}

?>

<?php
//Instantiate Database object
$database = new Database;

//Get logged in user
$list_user = $_SESSION['username'];

//Query
$database->query('SELECT * FROM lists WHERE list_user = :list_user');
$database->bind(':list_user',$list_user);
$rows = $database->resultset();
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
					Add tasks
				</span>

				<div class="wrap-input100 validate-input" data-validate="Name is required" >
					<span class="label-input100">Task Name</span>
					<input class="input100" type="text"  name="task_name" placeholder="Enter Task name" required>
					<span class="focus-input100"></span>
				</div>

				<?php if($_GET['listid']) : ?>
		        <input type="hidden" name="list_id" value="<?php echo $_GET['listid']; ?>" />
	             <?php else : ?>

				<div class="wrap-input100 input100-select">
					<span class="label-input100">Select List</span>
					<div>
						<select class="selection-2" name="list_id">
							<option value ="0">Choose List</option>
							<?php foreach($rows as $list) : ?>
			                <option value ="<?php echo $list['id']; ?>"><?php echo $list['list_name']; ?></option>
		                    <?php endforeach; ?>
						</select>
					<?php endif; ?>
					</div>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Due Date</span>
					<input class="input100" type="date" name='due_date' >
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Description</span>
					<textarea class="input100" name="task_body" placeholder="Your description here..."></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						
							<span>
								<input type="submit" value="Create" name="task_submit" />
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
