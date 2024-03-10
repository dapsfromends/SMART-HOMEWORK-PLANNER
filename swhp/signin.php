<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sign In</title>
        <link rel="stylesheet" href="assets/CSS/main.css" />
    </head>

    <body>
        <style>
            body
            {
                --color-primary:#345678;
                --color-primary-dark:#355680;
                --color-secondary:#375555;
                --color-error:#cc3333;
                --color-success:#4bb568;
                --border-radius: 4px;

                margin: 0;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 19px;
                background: url(assets/images/background.jpg);
                background-size: cover;
            }
        </style>
            <div class="container">
                <form class="form" id="login" action="assets/PHP/sign_in.php" method="POST" >
                    <fieldset>
                        <legend class="form__title" ><strong>Log In</strong></legend>
                        <table>
                            <tr>
                                <td><label for= "username"> Username </label></td>
                                <td><input type="username" class="form__input" id="text" name="username" autofocus required></td>
                            </tr> 
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>                                 
                            <tr>
                                <td><label for="password"> Password </label></td>
                                <td><input type="password" class="form__input" id="password" name="password" required></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr> 
                            <tr>
                                <td><br></td>
                                <td>Forgot your details? Reset <a href="reset.php">here<a></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr> 
                        </table>
                        <h3><button type = "Submit" class="form__button" name = "Submit" > Continue </button></h3>
                        <h3>Don't have an account yet? <a href="signup.php">Sign up</a></h3>
                    </fieldset>
                </form>
            </div> 
    </body>
</html>
