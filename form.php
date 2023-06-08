<?php 
require_once "config.php";
session_start();

if (isset($_POST['submit'])) {
    $todo_task = $_POST['todo_task_input'];
    $todo_success = 0;

    if (empty($todo_task)) {
        $_SESSION['error'] = "Please enter a todo task before submitting";
        header("location: index.php");
    } else {
        try {
            $sql = "INSERT INTO todo_list (todo_task ,todo_success) VALUES (:todo_task ,:todo_success)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":todo_task" ,$todo_task ,PDO::PARAM_STR_CHAR);
            $stmt->bindParam(":todo_success" ,$todo_success ,PDO::PARAM_BOOL);
            $stmt->execute();
            header("location:index.php");
        } catch (PDOException $e) {
            die("An error occurred". $e->getMessage());
        }
    }
    
}
?>