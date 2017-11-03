<?php
/**
 * Created by PhpStorm.
 * User: gendos
 * Date: 9/27/17
 * Time: 21:01
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usersData = unserialize(file_get_contents('inc' . DS . $config['usersdb']));
    if (isset($usersData[trim($_POST['login'])])) {
        if ($usersData[trim($_POST['login'])]['password'] == sha1($_POST['password'] . $global['salt'])) {
            header('Location: ?page=main');
        }
    }
    $errors[] = 'Не верное имя пользователя или пароль';
}
?>
<div class="container">
    <main class="row">
        <div class="col-md-6 offset-md-3" style="text-align: center">
            <h1>Вход</h1>
            <form action="" method="post">
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <?= implode('<br>', $errors) ?>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <input name="login" type="text"
                           class="form-control"
                           placeholder="Логин">
                </div>
                <div class="form-group">
                    <input name="password" type="password"
                           class="form-control"
                           placeholder="Пароль">
                </div>
                <button type="submit" class="btn btn-primary">Войти</button><br>
                <div><a href="?page=registration">Регистрация пользователя</a></div>
            </form>
        </div>
    </main>
</div>
