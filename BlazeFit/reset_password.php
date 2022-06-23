<?php

session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/signup_style.css" />
    </head>
    <body>
<?php

include 'dbcon.php';

if(isset($_POST['reset'])){
   
    $email=$_SESSION['email'];
    $newpassword= mysqli_real_escape_string($scon,$_POST['password']);
    $confirm= mysqli_real_escape_string($scon,$_POST['confpassword']);

    $pass = password_hash($newpassword, PASSWORD_BCRYPT);
    $confi = password_hash($confirm, PASSWORD_BCRYPT);

    if(strlen($_POST["password"]) < '6'){
        ?>
        <script>
            alert("Password Must Contain At Least 6 Characters!")
        </script>
    
    <?php    
    }else{
        if($newpassword === $confirm){

            $updatequery = " update registration set password='$pass', confirm='$confi' where email='$email' ";

            $iquery = mysqli_query($scon, $updatequery);

            if($iquery){
                ?>
                <script>
                    alert(" thanks!, your Password has been successfully updated.");
                    location.replace('login.php');
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("sorry, there was a problem with your request");
                </script>
                <?php
            }

        }else{
            ?>
            <script>
                    alert("Password not matching!");
            </script>

        <?php
        }
    }

}
?>
        <div class="logo">
                <h2 class="blaze">Blaze<span class="fit">Fit</span>
                </h2>
        </div> 
        <div class="sign_frm">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="form" class="form" method="POST">
                <img src="login_icon.png" alt=" "  />
                <h2>Reset Password</h2>
                <div class="input_txt">
                    <input type="password" name="password" required/>
                    <label for="password" >New password</label>
                    <p class="pass">
                     minimum 6 characters
                    </p>
                </div>
                <div class="input_txt">
                    <input type="password" name="confpassword"  required/>
                    <label for="confpassword" >Confirm Password</label>
                </div>
                <input type="submit" value="Update Password" name="reset" class="submit-bt" />
                <div class="member">
                    already a member?
                    <a href="login.php">login</a>
                </div>
            </form>
        </div>

    </body>
</html>

