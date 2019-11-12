<?php
error_reporting(-1);
ini_set('display_errors', 'On');

session_start();
// se connecter à la base de donnée
include("model/config.php"); 

if(isset($_SESSION['id']))
{
    $requser = $pdo->prepare('SELECT * FROM student WHERE id = ?');
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    if(isset($_POST['newusername']) AND !empty($_POST['newusername']) AND $_POST['newusername'] != $user['username']) {
        $newusername = htmlspecialchars($_POST['newusername']);
        $insertuser = $pdo->prepare("UPDATE student SET username = ? WHERE id = ?");
        $insertuser->execute(array($newusername, $_SESSION['id']));
        header('Location: profile.php?id='.$_SESSION['id']);
        exit;
    }
    if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $user['email']) {
        $newemail = htmlspecialchars($_POST['newemail']);
        $insertemail = $pdo->prepare("UPDATE student SET email = ? WHERE id = ?");
        $insertemail->execute(array($newemail, $_SESSION['id']));
        header('Location: profile.php?id='.$_SESSION['id']);
        exit;
    }
    if(isset($_POST['newfirstname']) AND !empty($_POST['newfirstname']) AND $_POST['newfirstname'] != $user['first_name']) {
        $newfirstname = htmlspecialchars($_POST['newfirstname']);
        $insertfirst = $pdo->prepare("UPDATE student SET first_name = ? WHERE id = ?");
        $insertfirst->execute(array($newfirstname, $_SESSION['id']));
        header('Location: profile.php?id='.$_SESSION['id']);
        exit;
    }
    if(isset($_POST['newlastname']) AND !empty($_POST['newlastname']) AND $_POST['newlastname'] != $user['last_name']) {
        $newlastname = htmlspecialchars($_POST['newlastname']);
        $insertlast = $pdo->prepare("UPDATE student SET last_name = ? WHERE id = ?");
        $insertlast->execute(array($newlastname, $_SESSION['id']));
        header('Location: profile.php?id='.$_SESSION['id']);
        exit;
    }
    if(isset($_POST['newlinkedin']) AND !empty($_POST['newlinkedin']) AND $_POST['newlinkedin'] != $user['linkedin']) {
        $newlinkedin = htmlspecialchars($_POST['newlinkedin']);
        $insertlinked = $pdo->prepare("UPDATE student SET linkedin = ? WHERE id = ?");
        $insertlinked->execute(array($newlinkedin, $_SESSION['id']));
        header('Location: profile.php?id='.$_SESSION['id']);
        exit;
    }
    if(isset($_POST['newgithub']) AND !empty($_POST['newgithub']) AND $_POST['newgithub'] != $user['github']) {
        $newgithub = htmlspecialchars($_POST['newgithub']);
        $insertgit = $pdo->prepare("UPDATE student SET github = ? WHERE id = ?");
        $insertgit->execute(array($newgithub, $_SESSION['id']));
        header('Location: profile.php?id='.$_SESSION['id']);
        exit;
    }
    if ($_POST['newpw1'] == $_POST['newpw2']) {
        $newpw1 = sha1($_POST['newpw1']);
        $newpw1 = sha1($_POST['newpw2']);
        if(isset($_POST['newpw1']) AND !empty($_POST['newpw1']) AND $_POST['newpw1'] != $user['password']) {
        
        $insertpwone = $pdo->prepare("UPDATE student SET password = ? WHERE id = ?");
        $insertpwone->execute(array($newpw1, $_SESSION['id']));
        header('Location: profile.php?id='.$_SESSION['id']);
        exit;
        }   
    } else {
        $error = "password not same !";
    }
  
 ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <div align="center">
        <h1>Edit you profile</h1>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>
                        <label for="newemail">
                            New E-mail : 
                        </label>
                    </td>
                    <td>
                        <input type="mail" id="newemail" name="newemail" alt="new email" value="<?php echo $user["email"];?>" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="newusername">
                            Username : 
                        </label>
                    </td>
                    <td>
                        <input type="text" placeholder="Your new username" id="newusername" name="newusername" alt="new username" value="<?php echo $user["username"];?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="newfirstname">
                            firstname : 
                        </label>
                    </td>
                    <td>
                        <input type="text" placeholder="Your new firstname" id="newfirstname" name="newfirstname" alt="new firstame" value="<?php echo $user["first_name"];?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="newlastname">
                            lastname : 
                        </label>
                    </td>
                    <td>
                        <input type="text" placeholder="Your new lastname" id="newlastname" name="newlastname" alt="new lastname" value="<?php echo $user["last_name"];?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="newlinkedin">
                            linkedIn : 
                        </label>
                    </td>
                    <td>
                        <input type="url" placeholder="Your new linkedin" id="newlinkedin" name="newlinkedin" alt="new linkedin" value="<?php echo $user["linkedin"];?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="newgithub">
                            github : 
                        </label>
                    </td>
                    <td>
                        <input type="url" placeholder="Your new github" id="newgithub" name="newgithub" alt="new github" value="<?php echo $user["github"]; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="newpw1">
                            New Password : 
                        </label>
                    </td>
                    <td>
                        <input type="password" placeholder="Your new password" id="newpw1" name="newpw1" alt="new newpw1">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="newpw2">
                            Password confirmation : 
                        </label>
                    </td>
                    <td>
                        <input type="password" placeholder="Confirm your new password" id="newpw2" name="newpw2" alt="new newpw2">
                    </td>
                </tr>
                
      
            </table>
            <br>
            <input type="submit" value="Update my profile">
        </form>


          
        <?php


        if (isset($error))
        {
            echo $error;
        }

        if(isset($_SESSION['id'])) {
        ?>

        <a href="#">Editer mon profile</a>
        <a href="logout.php">Se déconnecter</a>
        <?php
        }
        ?>
    </div>
</body>
</html>
<?php
}
else 
{
    header("Location:login.php");
}

?>


