<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php  

if (!isset($_SESSION['index_no'])) {
    header('Location: login.php');
}
else if(strlen($_SESSION['index_no'])!= 7){
	header('Location: login.php');
}
else{
	$query = "SELECT * FROM students WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
    $result_set = mysqli_query($connection, $query);
    $result = mysqli_fetch_assoc($result_set);
    $year = $result['year'];
    $sql = "SELECT * FROM modules WHERE year = '{$year}'";
    $record_set = mysqli_query($connection, $sql);
    $record = mysqli_fetch_all($record_set);
}

    
?>