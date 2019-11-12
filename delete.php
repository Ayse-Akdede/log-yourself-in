<?php 
    session_start();
    include("model/config.php"); 
    if(isset($_SESSION['id'])) {
        $requser = $pdo->prepare('SELECT * FROM student WHERE id = ?');
        $requser->execute(array($_SESSION['id']));
        $user = $requser->fetch();

        $deleteuser = "DELETE FROM student WHERE id=?";
        if ($pdo->query($deleteuser) === TRUE) {
            echo "Account deleted successfully";
        } else {
            echo "Error deleting account: " . $pdo->error;
        }
    } else {
        echo "error";
    }
    exit;
?>