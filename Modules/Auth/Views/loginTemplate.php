<div>
    <form name="login" action="/login" method="post">
        <p><label>Введите e-mail: <input type="text" name="loginemail"></label></p>
        <p><label>Введите пароль: <input type="password" name="loginpass"></label></p>
        <p><input type="submit" name="loginsubmit" value="Войти"></p>
    </form>
    <?php
    
    if ($messages) {
        foreach ($messages as $message) {
            echo "<p>{$message}</p>";
        }
    }   
    
    ?>
    <p><a href="/">На главную страницу</a></p>
</div>