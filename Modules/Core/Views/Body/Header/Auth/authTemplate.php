<div>
<?php

if (isset($_SESSION['user'])) { ?>
    <p>Привет, <?= $_SESSION['user']?>!</p>
<?php } else { ?>    
    <p><a href="/login">Авторизация</a></p>
    <p><a href="/signup">Регистрация</a></p>
<?php }
?>
</div>