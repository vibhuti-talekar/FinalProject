<?php
	if($_POST['submit']){
		$task_id = $_GET['id'];
		$task_name = $_POST['task_name'];
		$task_body = $_POST['task_body'];
		$due_date = $_POST['due_date'];
		//$list_id = $_POST['list_id'];
		$is_complete = $_POST['is_complete'];
		
		//Instantiate Database object
		$database = new Database;
		
		$database->query('UPDATE tasks SET task_name=:task_name,task_body=:task_body,due_date=:due_date,is_complete=:is_complete WHERE id=:id');
		$database->bind(':task_name',$task_name);
		$database->bind(':task_body',$task_body);
		$database->bind(':due_date',$due_date);
		//$database->bind(':list_id',$list_id);
		$database->bind(':id',$task_id);
		$database->bind(':is_complete',$is_complete);
		$database->execute();
		if($database->rowCount()){
			echo '<p class="msg">Your task has been updated</p>';
		}
	}
?>
<?php
//Instantiate Database object
$database = new Database;
//Query
$database->query('SELECT * FROM lists');
$rows = $database->resultset();
?>

<?php
$task_id = $_GET['id'];

//Instantiate Database object
$database = new Database;

$list_id = $_GET['list_id'];

//Query
$database->query('SELECT * FROM tasks WHERE id = :id ');

$database->bind(':id',$task_id);
$row = $database->single();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Task</title>
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
					Edit Tasks
				</span>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Task Name</span>
					<input class="input100" type="text" name="task_name" value="<?php echo $row['task_name']; ?>">
					<span class="focus-input100"></span>
				</div>


				<div class="wrap-input100 validate-input" data-validate="Message is required">
					<span class="label-input100">Edit description</span>
					<textarea class="input100" name="task_body" placeholder="Your message here...">
						<?php echo $row['task_body']; ?>
					</textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Due Date</span>
					<input class="input100" type="date" name='due_date' value="<?php echo date($row['due_date']); ?>">
					<span class="focus-input100"></span>
				</div>

				 

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					Mark if Completed <input type="checkbox" name="is_complete" value="1" />
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						
							<span class="contact100-form-btn">
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
