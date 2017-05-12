<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>

</body>
</html>

<div class="wrapper">
    <div class="menu">
        <ul>
            <li><a href="back-end/#">home</a></li>
            <li><a href="back-end/#">view teams</a></li>
            <li><a href="back-end/#">add teams</a></li>
            <li><a href="back-end/#">add user</a></li>
            <li><a href="back-end/#">add pouls</a></li>
        </ul>
    </div>
</div>
<div class="wrapper">
    <div class="title-bar">
        <h2>register</h2>
    </div>
</div>
<div class="message">
    <?php
    require_once('back-end/register-handler.php');

if (isset($_GET['message']))
{
    echo '<p>' . $_GET['message'] . '</p>';
    unset($_GET['message']);

}
    ?>
</div>

<div class="wrapper">
    <div class="input">
        <form action="back-end/register-handler.php" method="post">

             <div class="item">
                 <label id="naam" for="username">Gebru. naam</label>
                 <div class="box">
                <input type="text" name="username" id="username"  >
                 </div>
             </div>
             <div class="item">
                <label id="naam" for="password">  Wachtwoord   </label>
                 <div class="box">
                <input type="password" name="password" id="password" >
                 </div>
             </div>
             <div class="item">
                <input type="submit" name="send" value="versturen">
             </div>
        </form>
    </div>
</div>


</body>
</html>
