<?php
session_start();
// se connecter à la base de donnée
include("model/config.php"); 

if(isset($_SESSION['id']) AND $_SESSION['id'] > 0) {
    $getid = intval($_SESSION['id']);
    $requser = $pdo->prepare('SELECT * FROM student WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    <div align="center">
        <h1><?php echo $userinfo['username']; ?>'s Profile</h1>
            <table>
                <tr>
                    <td>
                        Username : 
                    </td>
                    <td>
                    <?php echo $userinfo['username'];?>
                    </td>
                </tr>
                <tr>
                    <td>
                        E-mail : 
                    </td>
                    <td>
                    <?php echo $userinfo['email'];?>
                    </td>
                </tr>
                <tr>
                    <td>
                         First-name : 
                    </td>
                    <td>
                        <?php echo $userinfo['first_name'];?>
                    </td>
                </tr> 
                <tr>
                    <td>
                         Last-name : 
                    </td>
                    <td>
                        <?php echo $userinfo['last_name'];?>
                    </td>
                </tr> 
                <tr>
                    <td>
                         LinkedIn : 
                    </td>
                    <td>
                        <?php echo $userinfo['linkedin'];?>
                    </td>
                </tr> 
                <tr>
                    <td>
                         Github : 
                    </td>
                    <td>
                        <?php echo $userinfo['github'];?>
                    </td>
                </tr>      
            </table>
        <?php
        if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
        ?>
            <a href="edit.php">Edit your profile</a>
            <a href="logout.php">Log Out</a>
        <?php
        }
        ?>
    </div>
</body>
</html>
<?php
}
?>

