<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
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
                height: 520px;
                width: 400px;
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
            }
            form *{
                font-family: 'Poppins',sans-serif;
                color: #ffffff;
                letter-spacing: 0.5px;
                outline: none;
                border: none;
            }
            form h3{
                font-size: 32px;
                font-weight: 500;
                line-height: 42px;
                text-align: center;
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
            .social{
                margin-top: 30px;
                display: flex;
            }
            .social div{
                background: red;
                width: 180px;
                border-radius: 3px;
                padding: 10px 10px 10px 10px;
                background-color: rgba(255,255,255,0.27);
                color: #eaf0fb;
                text-align: center;
            }
            .social *{
                margin: 0 5px;
            }
            .social div:hover{
                background-color: rgba(255,255,255,0.47);
            }
            div{
                margin-top: 30px;
            }
        </style>
    </head>
    <body>
        <form method="POST" action="login.php" id="login-form">
            <?php  if (count($errors) > 0) : ?>
            <div class="error">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error ?></p>
                <?php endforeach ?>
            </div>
            <?php  endif ?>
            <h3>Login Here</h3>
            <input type="text" name="username" id="username" required="_required"placeholder="Username"/>
            <input type="password" name="password" id="password" required="_required" placeholder="Password"/>
            <input type="submit" name="submit" id="submit" value="Log in"/>
            
            <div class="social">
                <div class="go"><i class="fab fa-google fa-lg"></i> <br> Google</div>
                <div class="fb"><i class="fab fa-facebook fa-lg"></i> <br> Facebook</div>
                <div class="tw"><i class="fab fa-twitter fa-lg"></i> <br> Twitter</div>
            </div>
            <div>
                <a href="register.php">Or Create an account</a>
            </div>
        </form>
    </body>
</html>