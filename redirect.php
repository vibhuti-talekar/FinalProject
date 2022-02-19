<?php
//Start Session
session_start();
//Config File
require 'config.php';
//Database Class
require 'classes/database.php';

$database = new Database;


?>
<?php
if($_GET['msg'] == 'listdeleted'){
    echo '<p class="msg">Your list has been deleted</p>';
}
if($_GET['page'] == 'welcome' || $_GET['page'] == ""){
    include 'pages/dashboard.php';
} elseif($_GET['page'] == 'list'){
    include 'pages/listdisplay.php';
} elseif($_GET['page'] == 'task'){
    include 'pages/taskdisplay.php';
} elseif($_GET['page'] == 'new_task'){
    include 'pages/new_task.php';
} elseif($_GET['page'] == 'new_list'){
    include 'pages/new_list.php';
} elseif($_GET['page'] == 'edit_task'){
    include 'pages/edit_task.php';
} elseif($_GET['page'] == 'edit_list'){
    include 'pages/edit_list.php';
} elseif($_GET['page'] == 'register'){
   include 'pages/register.php';
} elseif($_GET['page'] == 'delete_list'){
    include 'pages/delete_list.php';
}
elseif($_GET['page'] == 'signup'){
    include 'login.php';
}
?>

