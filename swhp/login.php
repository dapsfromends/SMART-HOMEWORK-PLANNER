<?php
    include_once 'header.php';
    ?>

 
    <section class = "signup-form">
   
        <h1>Sign up </h1>  
        <form action="contains/login.smart.php" method="post">
			<div>

            <label for= "user_name"> Usersname </label>
            <input type="text" id="text" name="uid" placeholder="Username/ Email" required><br><br>
        
            <label for="password"> Password </label> 
			<input type="password" id="text" name="password" placeholder="password" required><br><br> 

            <label for="password"> Repeat Password </label>
			<input type="password" id="text" name="repeat_password" placeholder="repeat the password" required><br><br>

        <!-- Submit button -->
        <button type = "Submit" name = "Submit" > Log in </button><br><br>
        </form>
    </div>
    

</body>
include\include\login.smart.php
header.php