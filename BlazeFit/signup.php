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

if(isset($_POST['signup'])){
    $firstname= mysqli_real_escape_string($scon,$_POST['fname']);
    $lastname= mysqli_real_escape_string($scon,$_POST['lname']);
    $email= mysqli_real_escape_string($scon,$_POST['email']);
    $password= mysqli_real_escape_string($scon,$_POST['password']);
    $confirm= mysqli_real_escape_string($scon,$_POST['confpassword']);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $confi = password_hash($confirm, PASSWORD_BCRYPT);

    $emailquery = " select * from registration where email='$email' ";
    $query = mysqli_query($scon,$emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0)
    {
        ?>
        <script>
            alert("Email address already exists!");
        </script>
    <?php
    
    }
    elseif(strlen($_POST["password"]) < '6'){
        ?>
        <script>
            alert("Password Must Contain At Least 6 Characters!");
        </script>
    
    <?php    
    }else{
        if($password === $confirm){

            $insertquery = " insert into registration( firstname, lastname, email, password, confirm) values('$firstname', '$lastname', '$email', '$pass', '$confi')";

            $iquery = mysqli_query($scon, $insertquery);

            if($iquery){
                ?>
                <script>
                    alert(" thanks!, your account has been successfully created.");
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
                <h2>Signup</h2>
                <div class="input_txt">
                    <input type="text" name="fname" required />
                    <label for="fname" >First Name</label>
                </div>
                <div class="input_txt">
                    <input type="text" name="lname" required/>
                    <label for="lname" >Last Name</label>
                </div>
                <div class="input_txt">
                    <input type="email" name="email" required/>
                    <label for="email" >Email Address</label>
                </div>
                <div class="input_txt">
                    <input type="password" name="password" required/>
                    <label for="password" >password</label>
                    <p class="pass">
                     minimum 6 characters
                    </p>
                </div>
                <div class="input_txt">
                    <input type="password" name="confpassword"  required/>
                    <label for="confpassword" >Confirm</label>
                </div>
                <input type="submit" value="Sign up" name="signup" class="submit-bt" />
                <div class="member">
                    already a member?
                    <a href="login.php">login</a>
                </div>
            </form>
        </div>

    </body>
</html>

