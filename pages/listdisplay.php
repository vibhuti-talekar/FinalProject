<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>List</title>
    <link rel="stylesheet" href="pages/style.css">
</head>

<body>
    
    <div class="center">
        <?php
        $list_id = $_GET['id'];
        
        //Instantiate Database object
        $database = new Database;
        //Query
        $database->query('SELECT * FROM lists WHERE id = :id');
        $database->bind(':id',$list_id);
        $row = $database->single();

        echo '<h1>'.$row['list_name'].'</h1>';
        echo '<p>'.$row['list_body'].'</p>';
       
        echo '<div class="signup_link">
            <a href="redirect.php?page=edit_list&id='.$row['id'].'">Edit List</a> |
            <a href="redirect.php?page=delete_list&id='.$row['id'].'">Delete List</a>
        </div>';

        //Instantiate Database object
        $database = new Database;
        //Query
        $database->query('SELECT * FROM tasks WHERE list_id = :list_id AND is_complete = :is_complete');
        $database->bind(':list_id',$list_id);
        $database->bind(':is_complete',0);
        $rows = $database->resultset();
        
         echo' <h2>Tasks</h2>';
        if($rows){
         echo '<ul class="items">';
        foreach($rows as $task){
        echo '<li><a href="?page=task&id='.$task['id'].'">'.$task['task_name'].'</a></li>';
        }
        echo '</ul>';

        echo '<button>Back</button>';
        } else {
        echo 'No tasks for this list - <a href="redirect.php?page=new_task">Create One Now</a>';
        }

?>

            
    </div>

</body>

</html>