<?php 
require_once "config.php";
$id = $_GET['id'];
$sql = "DELETE FROM todo_list WHERE id = :id";
try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id",$id);
    $result = $stmt->execute();
    if($result){
        header('location:index.php');
    }
} catch (PDOException $e) {
    $_SESSION['error'] = "error while executing SQL statement ".$e->getMessage();
}
?>