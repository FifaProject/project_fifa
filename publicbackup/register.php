
<?php require 'templates/header.php';
session_start();

?>





<div class="wrapper">

        <form action="../app/fifa_register/back-end/register-handler.php" method="post">
            <div class="toprow">
                 <div class="item">
                     <label id="naam" for="username"><h3>Gebru. naam:</label></h3>
                     <div class="box">
                    <input type="text" name="username" id="username">
                     </div>
                 </div>
                 <div class="item">
                     <label id="naam" for="password"><h3>Wachtwoord:</label></h3>
                     <div class="box">
                    <input type="password" name="password" id="password">
                     </div>
                 </div>
                <div class="item">
                    <label id="naam" for="password-confirm"><h3>Wachtwoord bevestigen:</label></h3>
                    <div class="box">
                        <input type="password" name="password-confirm" id="password-confirm">
                    </div>
                </div>

                 <div class="item">
                    <input type="submit" name="send" value="versturen">
                 </div>
                <div class="message">
                    <?php
                    if(isset($_GET['message']))
                    {
                        echo '<p>' . $_GET['message'] . '</p>';
                    }

                    ?>
            </div>
        </form>




</div>


<?php require(realpath(__DIR__) . '/templates/footer.php');

?>


