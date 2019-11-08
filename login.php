<?php
session_start();
// se connecter à la base de donnée
include("model/config.php"); 

if(isset($_POST['formlogin'])) {
   $emailconnect = htmlspecialchars($_POST['emailconnect']);
   $passwordconnect = sha1($_POST['passwordconnect']);


   if(!empty($emailconnect) AND !empty($passwordconnect)) 
   {
       
      $requser = $pdo->prepare("SELECT * FROM student WHERE email=? AND password=?");
      $requser->execute(array($emailconnect, $passwordconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) 
      {
        $userinfo = $requser->fetch();
        $_SESSION['id'] = $userinfo['id'];
        $_SESSION['email'] = $userinfo['email'];
        header("Location: profile.php?id=".$_SESSION['id']);
      } else 
      {
        $error = "Wrong email or password !";
      }
   } 
   else 
   {
      $error= "All  fields must be completed !";
   }
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LogIn</title>
</head>
<body>
    <div align="center">
        <h1>Log In</h1>
        <form action="login.php" method="post">
            <table>
               
                <tr>
                    <td>
                        <label for="email">
                            E-mail : 
                        </label>
                    </td>
                    <td>
                        <input type="mail" placeholder="Your e-mail" id="email" name="emailconnect" alt="email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">
                            Password : 
                        </label>
                    </td>
                    <td>
                        <input type="password" placeholder="Your password" id="password" name="passwordconnect" alt="password">
                    </td>
                </tr>      
            </table>
            <br>
            <input type="submit" name="formlogin" value="Log In">
        </form>

        <?php
            if (isset($error))
            {
                echo $error;
            }
           
         
        ?>

    </div>
</body>
</html>