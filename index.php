<?php 
    session_start();
    require 'model/config.php';

    //openConnection();

    if(isset($_POST['formregistration'])) {

        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);

        if(!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['password'])){

            $usernamelenght = strlen($username);

            if($usernamelenght <= 255){
                $searcheusername = $pdo->prepare("SELECT * FROM student WHERE username = ? ");
                $searcheusername->execute(array($username));
                $existusername = $searcheusername->rowCount();

                if($existusername == 0) {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $searchemail = $pdo->prepare("SELECT * FROM student WHERE email = ? ");
                        $searchemail->execute(array($mail));
                        $existemail = $searchemail->rowCount();

                        if($existemail == 0) {

                            $insertstudent = $pdo->prepare("INSERT INTO student (username, email, `password`) VALUES (?, ?, ?)");
                            $insertstudent->execute(array($username, $email, $password));

                            $_SESSION['accountcreated'] = "Your account has been succesfully created.";
                            header('Location: login.php');
                            exit;
                        }
                        else {
                            $error = "This email address has already been used.";
                        }
                    }
                    else {
                        $error = "Your email address is not valid.";
                    }
                }
                else {
                    $error = "This username has already been used.";
                }
            } else {
                $error = "Your username can't be longer then 255 characters.";
            }
        } else {
            $error = "All the fields must be completed.";
        }
    }
?>
<?php
if(isset($error)) {
    echo '<font color="red">'.$error.'</font>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <div align="center">
        <h1>Sign up</h1>
        <form action="index.php" method="post">
            <div class="form-style">
                <table>
                    <tr>
                        <td>
                            <label for="username">
                                Username : 
                            </label>
                        </td>
                        <td>
                            <input type="text" placeholder="Your username" id="username" name="username" alt="username" value="<?php if(isset($username)) { echo $username; } ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">
                                E-mail : 
                            </label>
                        </td>
                        <td>
                            <input type="email" placeholder="Your e-mail" id="email" name="email" alt="email" value="<?php if(isset($email)) { echo $email; } ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password">
                                Password : 
                            </label>
                        </td>
                        <td>
                            <input type="password" placeholder="Your password" id="password" name="password" alt="password">
                        </td>
                    </tr>      
                </table>
                <br>
                <input type="submit" name="formregistration" value="Sign Up">
            </div>
        </form>
    </div>
</body>
</html>