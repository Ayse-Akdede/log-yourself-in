<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hackers Poulette</title>
</head>
<body>
    <div align="center">
        <h1>Sign up</h1>
        <form action="index.php" method="post">
            <table>
                <tr>
                    <td>
                        <label for="username">
                            Username : 
                        </label>
                    </td>
                    <td>
                        <input type="text" placeholder="Your username" id="username" name="username" alt="username">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">
                            E-mail : 
                        </label>
                    </td>
                    <td>
                        <input type="email" placeholder="Your e-mail" id="email" name="email" alt="email">
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
            <input type="submit" value="Sign Up">
        </form>

        <?php 
            
        ?>

    </div>
</body>
</html>