<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/bootstrap.php';
checkUserSession('index', '.');
?>
<!DOCTYPE html>
<html>

<?php require "components/index/head.php"; ?>

<body class="black">

<?php require "components/index/nav.php"; ?>

<main class="white-text">
    <div class="parallax-container">
        <div class="parallax">
            <img src="assets/images/index/desktop-bg.jpg" alt="PSX Journal" class="bg-image">
        </div>
    
        <div class="container">
            <div class="row">
                <div class="col s12 m6 offset-m3 center-align">
                    <h1>Login</h1>
                    <p class="lead">Welcome back!</p>
                </div>
            </div>
            <div class="row">
                <form action="#" id="login-form" class="col s12 m6 offset-m3 l4 offset-l4 form">
                    <div class="card grey darken-4">
                        <div class="row">
                            <div class="col s12">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="browser-default text-input" required>
                                <small class="helper-text red-text" id="email-error"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="browser-default text-input" required>
                                <small class="helper-text red-text" id="password-error"></small>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col s12">
                                <label>
                                    <input type="checkbox" name="stay-logged-in" id="stay-logged-in" value="stay-logged-in">
                                    <span>Stay logged in?</span>
                                </label>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col s12">
                                <input type="submit" value="Login" id="register-btn" class="center-align btn-small waves-light purple-blue-g-bg button-input">
                                <small class="right"><a href="resetpassword.php">Forgot your password?</a></small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require "components/index/scripts.html"; ?>
<script src="assets/js/ajax/login.js"></script>
</body>
</html>