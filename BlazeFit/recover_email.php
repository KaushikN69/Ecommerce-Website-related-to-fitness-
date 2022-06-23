<?php

session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/recover_style.css" />
    </head>
    <body>
<?php

include 'dbcon.php';

if(isset($_POST['continue'])){
    
    $email= mysqli_real_escape_string($scon,$_POST['email']);
    

    $emailquery = " select * from registration where email='$email' ";
    $query = mysqli_query($scon,$emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount)
    {
        $_SESSION['email']=$email;

        ?>
        <script>
            location.replace("reset_password.php");
        </script>
    
     <?php
    }else{
        ?>

        <script>
            alert('Invalid email address!');
        </script>

        <?php
    }
}

?>
        <div class="logo">
                <h2 class="blaze">Blaze<span class="fit">Fit</span>
                </h2>
        </div> 
        <div class="recover_frm">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="form" class="form" method="POST">
                <img src="login_icon.png" alt=" "  />
                <h2>Recover Your Account</h2>
                
                <div class="input_txt">
                    <input type="email" name="email" required/>
                    <label for="email" >Email Address</label>
                </div>
                
                <input type="submit" value="continue" name="continue" class="submit-bt" />
                <div class="member">
                    back to login?
                    <a href="login.php">login</a>
                </div>
            </form>
        </div>

    </body>
</html>

