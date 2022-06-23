<?php

session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/login_style.css"/>
    </head>
    <body>

    <?php

        include 'dbcon.php';

        if(isset($_POST['login'])){
            $email = $_POST['loginemail'];
            $password = $_POST['loginpassword'];

            $email_search = " select * from registration where email='$email' ";
            $query = mysqli_query($scon,$email_search);

            $email_count = mysqli_num_rows($query);

            if($email_count){
                $email_pass = mysqli_fetch_assoc($query);

                $db_pass = $email_pass['password'];

                $_SESSION['id'] = $email_pass['id'];

                $_SESSION['firstname'] = $email_pass['firstname'];

                $_SESSION['lastname'] = $email_pass['lastname'];

                $_SESSION['Email'] = $email_pass['email'];

                $pass_decode = password_verify($password, $db_pass);

                if($pass_decode){
                    ?>

                    <script>
                        alert('login successful!');
                        location.replace("blazefit.php");
                    </script>

                    <?php
                }else{
                    ?>

                    <script>
                        alert('Incorrect Password! please try again.');
                    </script>

                    <?php
                }
            }else{
                ?>

                <script>
                    alert('Invalid Email!');
                </script>

                <?php
            }
        }


    ?>




        <div class="logo">
           
                <h2 class="blaze">Blaze<span class="fit">Fit</span>
                </h2>
            
        </div>
       
        <div class="login_frm">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="form" method="POST">
                <img src="login_icon.png" class="image"/>
                <h2 >Login</h2>
                <div class="input-gp">
                    <input type="email" name="loginemail"  required>
                    <label for="loginemail">Email</label>
                </div>
                <div class="input-gp">
                    <input type="password" name="loginpassword"  required>
                    <label for="loginpassword" >password</label>
                </div>

               
                <input type="submit" name="login" value="login" class="submit_btn">
                <a href="recover_email.php" class="forgot-pw" style="color: #f5634b;">forgot password?</a>
                <div class="member">
                    <br/>
                    not a member?
                    <a href="signup.php" style="color: #f5634b;">sign up</a>
                </div>
            </form>
        </div>
        
            


    </body>
</html>

