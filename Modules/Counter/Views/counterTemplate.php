<div>
    <form name="counter" method="post" action="/counter">
        <div>
            <p><input type="submit" name="minus" value="Уменьшить на 1"></p>
            <p><input type="submit" name="plus" value="Увеличить на 1"></p>
        </div>
    </form>
    <p>Текущий показатель счётчика равен: <?= $counterValue ?></p>
    <p><a href="/logout">Выйти из системы</a></p>
</div>