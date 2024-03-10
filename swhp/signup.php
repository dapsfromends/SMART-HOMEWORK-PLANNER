<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sign Up</title>
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
            <form class="form" id="createAccount" action="assets/PHP/sign_up.php" method="POST">
                <h1 class="form__title">Create Account</h1>
                <div class="form__message form__message--error"></div>
                <div class="form__input-group">
                    <input type="username" id="username" name="username" value="" class="form__input" autofocus placeholder="Username"/>
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <input type="email" id="email" name="email" value="" class="form__input" autofocus placeholder="Email Address"/>
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <input type="password" id="password" name="password" value="" class="form__input" autofocus placeholder="Password"/>
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <input type="password" name="password" value=""class="form__input" autofocus placeholder="password"/>
                    <div class="form__input-error-message"></div>
                </div>
                <button class="form__button" type="submit">Continue</button>
                <p class="form__text"><a class="form__link" id="linkLogin">Already have an account? <a href="signin.php">Sign in</a></a></p>
            </form>
        </div>
    </body>
</html>        
