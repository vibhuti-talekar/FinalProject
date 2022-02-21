
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/dashboard.css">
    
    <title>dashboard</title>
</head>
<body>
  <!--header-->
  <header>
    <div class="logo">
      <a href="#"><b>Tasks</b><span>Go</span></a>
    </div>
    <nav class="navbar">
      <a href="index.php">Home</a>
      <a href="index.php#features">About Us</a>
      <?php if(!$_SESSION['logged_in']) : ?>
      <a href="redirect.php?page=register">Register</a>
      <?php else : ?>
      <a href="redirect.php?page=new_list">Add List</a>
      <a href="redirect.php?page=new_task">Add Task</a>
      <?php endif; ?>
    </nav>
  </header>
  <!--header ends-->
    <div class="tasks">
  <!-- title -->
  <h1>Your Lists </h1>

<?php
if($_SESSION['logged_in']){
//Instantiate Database object

$database = new Database;

//Get logged in user
$list_user = $_SESSION['username'];

//Query
$database->query('SELECT * FROM lists WHERE list_user=:list_user');
$database->bind(':list_user',$list_user);
$rows = $database->resultset();

if($rows){

foreach($rows as $list){
	echo "<input id='label-1' type='checkbox'  />
        <label for='label-1'>
        <h2>";
  echo   '<a class="element" style="text-decoration:none; font-color:#f6bd66;" href= "redirect.php?page=list&id='.$list['id'].'" >'.$list['list_name'].'</a>
        </h2>
        </label>';
}
	
} else {
	echo 'There are no lists available -<a href="redirect.php?page=new_list">Create One Now</a>';
}	
} else {
	echo "<p>myTasks is a small but helpful application where you can create and manage tasks to make your life easier. 
Just register and login and you can start adding tasks";
}
?>


<?php
if($_SESSION['logged_in']){
          echo' <form action="login.php" method="post">
		<input type="submit" value="Logout" name="logout_submit" class="btn"/>	';}	
?>
</form>


  
</div>
</body>
</html>