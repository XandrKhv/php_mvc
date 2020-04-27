<h1>Страница авторизации</h1>

<form role="form" action="" method="post">
    <div class="form-group">
        <label for="inputLogin">Логин</label>
        <input type="text" class="form-control" name="login" id="inputLogin" placeholder="Введите логин">
    </div>
    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Пароль">
    </div>
    <?php
    extract($data);
    if ($login_status == "access_denied") {
        ?>
        <p style="color:red">Логин и/или пароль введены неверно.</p>
        <?php
    }
    ?>
    <button type="submit" name="btn" class="btn btn-default">Войти</button>
</form>