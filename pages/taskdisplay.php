<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Animated Login Form | CodingNepal</title>
    <link rel="stylesheet" href="pages/style.css">
</head>

<body>

    <div class="center">
        <?php
        $task_id = $_GET['id'];
        
        
        //Instantiate Database object
        $database = new Database;
        //Query
        $database->query('SELECT * FROM tasks WHERE id = :id');
        $database->bind(':id',$task_id);
        $row = $database->single();

        echo '<h1>'.$row['task_name'].'</h1>';
        echo '<h3>Task Description</h3>';
        echo '<p>'.$row['task_body'].'</p>';
       
       

    echo '<h3>Due Date</h3>';
    echo '<p>'.$row['due_date'].'</p>';
        
        if($row['is_complete'] == 1){
        echo 'Status: <strong>Complete</strong>';
        } else {
        echo 'Status: <strong>Incomplete</strong>';
        }
  ?>     

    <br />
    <br />
    <a href="?page=edit_task&id=<?php echo $row['id']; ?>">Edit Task</a>


    </div>

</body>

</html>