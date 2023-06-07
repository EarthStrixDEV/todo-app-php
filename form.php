<?php 
require_once "config.php";
session_start();

if (isset($_POST['submit'])) {
    $todo_track = $_POST['todo_track_input'];
    $todo_success = 0;

    if (empty($todo_track)) {
        $_SESSION['error'] = "Please enter a todo track before submitting";
        header("location: index.php");
    } else {
        try {
            $sql = "INSERT INTO todo_list (todo_track ,todo_success) VALUES (:todo_track ,:todo_success)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":todo_track" ,$todo_track ,PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":todo_success" ,$todo_success ,PDO::PARAM_BOOL);
            $stmt->execute();
            header("location:index.php");
        } catch (PDOException $e) {
            die("An error occurred". $e->getMessage());
        }
    }
    
}
?>