<?php 
error_reporting(-1);
ini_set('display_errors', 'On');
    session_start();
    include("model/config.php"); 

    try {
        if(isset($_SESSION['id'])) {
            $deleteuser = $pdo->prepare('DELETE FROM student WHERE id=?');
            $deleteuser->execute(array($_SESSION['id']));
            echo "Account deleted successfully";
        }

    }
    catch (PDOException $e) {
        echo $deleteuser . "<br>" . $e->getMessage();
    }
    exit;
?>