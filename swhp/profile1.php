<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Smart HomeWork Planner</title>
        <link rel="stylesheet" href="assets/CSS/style.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    </head>

    <body>
        <header>
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <h1>Smart Homework Planner</h1>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="#">Planner</a></li>
                            <li><a href="#">My Reminders</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        
        <main>
            <div class="container">
                <div class="showcase">
                    <div class="left_side_content">
                        <h2>HELLO!</h2>
                        <p>Welcome to your smart homework planner.</p>
                        <p>Your Smart HomeWork Planner helps to not just organize but also prioritize your tasks, set deadlines and set and meet targets, helping you to get your work done.</p>
                        <button class="form__button" type="button" onclick="auth3()">Start</button>
                    </div>
                    <div class="right_side_content">
                        <img src="assets/images/background4.png" alt="">
                    </div>
                </div>
                <div class="below_content">
                    <div class="social_icons">
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div class="dark mode">
                        <i class="fa-solid fa-moon"></i>
                    </div>
                </div>
            </div>
        </main>
        
        <script src="js/script.js"></script>
        <script>
            function auth3()
            {
                window.location.assign("profile2.php");
                return;
            }
        </script>
    </body>
</html>
