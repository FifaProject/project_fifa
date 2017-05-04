<?php require(realpath(__DIR__) . '/templates/header.php'); ?>

    <div class="main-content">

        <div class="pagetitle">
            <div class="container">
                <div class="logo">
                   <img src="assets/img/logo3.png" alt="">
                </div>
            </div>
        </div>
        <div class="banner">
            <div class="container">
                <img src="assets/img/banner-logo2.png" alt="">
                <div class="loginscreen">
                        <form action="login.php">
                            <input type="text" id="username" placeholder="Username*">
                            <input type="password" id="password" placeholder="Password*">
                            <input class="loginbutton" type="button" value="Login">
                        </form>
                </div>
            </div>
        </div>
    </div>

<?php require(realpath(__DIR__) . '/templates/footer.php');
