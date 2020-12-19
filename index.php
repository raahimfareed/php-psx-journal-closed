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
                <div class="col s12">
                    <h1><span class="green-text text-darken-2">P</span><span class="green-text">S</span><span class="green-text text-lighten-2">X</span> - Journal</h1>
                    <!-- <hr> -->
                    <h3>Save your stocks and trading data!</h3>
                    <a href="/register.php" class="btn-small blue">Join today</a>
                    <a href="/login.php" class="btn-small green darken-2">Existing User?</a>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <h4>Follow Us!</h4>
                </div>
                <div class="col s12 m6 l3">
                    <div class="collection with-header">
                        <a href="https://github.com/raahimfareed/psx-journal" class="collection-item black-text">GITHUB</a>
                        <a href="https://twitter.com/raahimwho" class="collection-item black-text">TWITTER</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php require "components/index/scripts.html"; ?>

</body>
</html>