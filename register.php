<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>User Registration</title>
        <script src="https://kit.fontawesome.com/d8306965cb.js" crossorigin="anonymous"></script>
        <style media="screen">
            *, *:before, *:after{
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }
            body{
                background-image: url('download.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-color: #080710;
            }
            form{
                height: 750px;
                width: 600px;
                background-color: rgba(0,0,0,0.5);
                position: absolute;
                transform: translate(-50%,-50%);
                top: 50%;
                left: 50%;
                border-radius: 16px;
                backdrop-filter: blur(10px);
                border: 2px solid rgba(255,255,255,0.1);
                box-shadow: 0 0 40px rgba(8,7,16,0.6);
                padding: 50px 35px;
                margin: auto;
            }
            form *{
                font-family: 'Poppins',sans-serif;
                color: #ffffff;
                letter-spacing: 0.5px;
                outline: none;
                border: none;
                width: 90%;
            }
            form h3{
                font-size: 32px;
                font-weight: 500;
                line-height: 42px;
                text-align: center;
            }
            .inputContainer i {
                position: absolute;
                margin-left: 20px;
                margin-top: 20px;
                width: 15px;
            }
            .inputContainer {
                width: 100%;
                margin-bottom: 15px;
            }
            .Field {
                width: 100%;
                padding: 10px;
                font-size: 20px;
                font-weight: 500;
                padding-left: 50px;
            }
            input{
                display: block;
                height: 50px;
                width: 100%;
                background-color: rgba(255,255,255,0.07);
                border-radius: 16px;
                padding: 0 10px;
                margin-top: 8px;
                font-size: 14px;
                font-weight: 300;
            }
            ::placeholder{
                color: #e5e5e5;
            }
            input[type="submit"]{
                margin-top: 50px;
                width: 100%;
                background-color: #ffffff;
                color: #080710;
                padding: 15px 0;
                font-size: 18px;
                font-weight: 600;
                border-radius: 50px;
                cursor: pointer;
            }
            
        </style>
    </head> 
    <body>
        <form method="POST" id="register-form" action="register.php">
            <h3>Sign Up</h3>
            <div class="inputContainer">
                <i class="fas fa-user"></i>
                <input class="Field" type="text" name="first_name" id="first_name" required="_required" placeholder="First Name"/>
            </div>
            <div class="inputContainer">
                <i class="fas fa-user"></i><i class="fas fa-user"></i>
                <input class="Field" type="text" name="last_name" id="last_name" required="_required" placeholder="Last Name"/>
            </div>
            <div class="inputContainer">
                <i class="fas fa-user"></i>
                <input class="Field" type="text" name="username" id="username" required="_required" placeholder="username"/>
            </div>
            <div class="inputContainer">
                <i class="fas fa-envelope"></i>
                <input class="Field" type="email" name="email" id="email" required="_required" placeholder="Your Email"/>
            </div>
            <div class="inputContainer">
                <i class="fas fa-phone"></i>
                <input class="Field" type="mobile" name="mobile" id="mobile"required="_required" placeholder="Your Mobile Number"/>
            </div>
            <div class="inputContainer">
                <i class="fas fa-key"></i>
                <input class="Field" type="password" name="password_1" id="password_1"required="_required" placeholder="Password"/>
            </div>
            <div class="inputContainer">
                <i class="fas fa-key"></i>
                <input class="Field" type="password" name="password_2" id="password_2"required="_required" placeholder="Confirm your password"/>
            </div>
            <?php  if (count($errors) > 0) : ?>
                <div class="error">
                    <?php foreach ($errors as $error) : ?>
                        <p><?php echo $error ?></p>
                    <?php endforeach ?>
                </div>
            <?php  endif ?>
            <div class="inputContainer">
                <input type="submit" name="reg_user" id="reg_user" class="form-submit" value="Register"/>
            </div> 
            <div>
                <a href="login.php">I am already user</a>
            </div>
        </form>
    </body>
</html>