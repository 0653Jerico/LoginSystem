<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">

        <?php

        include("php/config.php");
        if(isset($_POST['submit'])){
            $username = $POST['username'];
            $email = $POST['email'];
            $age = $POST['age'];
            $password = $POST['password'];

            // verifying the unique email

        $verify_query = mysql_query($con, "SELECT Email FROM users WHERE Email='$email'");

        if(mysqli_num_rows($verify_query) !=0){
            echo "<div class='message'>
                    <p>This email is used, Try another One please!</p>
                    </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";

        }else{
            mysli_query($con,"INSERT INTO user(Username,Email,Age,Password) VALUES('$username', '$email', '$age', '$password',)") or die ("Error Occurred");
            echo "<div class='message'>
                    <p>Registered Successfully!</p>
                    </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login now</button>";
        }

        }else{

        ?>

            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>
                
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>
                
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Sign Up">
                </div>

                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>