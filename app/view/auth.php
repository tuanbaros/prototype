<!DOCTYPE html>
<html>
<head>
    <?php require_once 'app/view/partial/meta.php'; ?>
    <title>Auth</title>
    <?php require_once 'app/view/partial/css.php'; ?>
    <link rel="stylesheet" href="res/css/auth.css">
    <?php if (isset($_SESSION['error'])) {
        echo '<link rel="stylesheet" href="res/css/register.css">';
    } ?>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <form class="register-form" action="<?php echo Route::action('auth', 'register'); ?>" method="post">
                <input type="text" class="name-input" placeholder="name" name="name" value="<?php 
                    if (isset($_SESSION['name'])) {
                        echo $_SESSION['name'];
                    }
                ?>"/>
                <input type="email" class="email-input" placeholder="email address" name="email" value="<?php 
                    if (isset($_SESSION['email'])) {
                        echo $_SESSION['email'];
                    }
                ?>"/>
                <input type="password" class="password-input" placeholder="password" name="password" />
                <input type="password" class= "repassword-input" placeholder="re-password"/>
                <button class="register-button" name="create">create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form" action="<?php echo Route::action('auth', 'login'); ?>" method="post">
                <input type="email" placeholder="email" class="login-email-input" name="email" value="<?php 
                    if (isset($_SESSION['email'])) {
                        echo $_SESSION['email'];
                    }
                ?>" />
                <input type="password" placeholder="password" class="login-password-input" name="password" />
                <button class="login-button" name="login">login</button>
                <div class="open-id">
                    <button class="login-facebook" name="login">Login with Facebook</button>
                    <button class="login-google" name="login">Login with Google</button>
                </div>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
        </div>
    </div>
    <?php require_once 'app/view/partial/js.php'; ?>
    <script src="res/js/auth.js"></script>
    <?php if (isset($_SESSION['error'])) {
        echo '<script src="res/js/register.js"></script>';
    } ?>
    <?php if (isset($_SESSION['login'])) {
        echo '<script src="res/js/login.js"></script>';
    } ?>
    <?php session_destroy(); ?>
</body>
</html>
