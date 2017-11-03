<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03.11.2017
 * Time: 11:33
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post = array_map('trim', $_POST);
    $errors = [];
    if (strlen($post['login']) < 3) {
        $errors[] = 'Логин не должен быть меньше 3х символов';
    }
    if (strlen($post['password1']) < 3) {
        $errors[] = 'Пароль не может быть меньше 3х символов';
    }
    if ($post['password1'] != $post['password2']) {
        $errors[] = 'Пароли не совпадают';
    }
    if (!count($errors)) {
        $usersData = unserialize(file_get_contents('inc' . DS . $config['usersdb']));
        if (!is_array($usersData)) {
            $usersData = [];
        }
        if (isset($usersData[$post['login']])) {
            $errors[] = 'Пользователь с таким логином уже существует';
        } else {
            $usersData[$post['login']] = array(
                'name' => $post['login'],
                'password' => sha1($post['password1'] . $config['salt'])
            );
            $fp = fopen('inc' . DS . $config['usersdb'], 'w');
            fwrite($fp, serialize($usersData));
            fclose($fp);
            $_SESSION['auth'] = [
                'state' => true,
                'login' => $post['login'],
            ];
            header('Location: ?page=main');
        }
    }
}
?>
<div class="container">
    <main class="row">
        <div class="col-md-6 offset-md-3" style="text-align: center">
            <h1>Регистрация</h1>

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
                    <input name="password1" type="password"
                           class="form-control"
                           placeholder="Пароль">
                </div>
                <div class="form-group">
                    <input name="password2" type="password"
                           class="form-control"
                           placeholder="Подтвердите пароль">
                </div>
                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            </form>
        </div>
    </main>
</div>